<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\Tag;
use App\Article;
use App\Image;
use App\Http\Requests\ArticleRequest;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $articles = Article::search($request->tittle)->orderBy('id','DESC')->paginate(5);
        $articles->each(function($articles){
          $articles->category;
          $articles->user;
        });
        return view('admin.articles.index')
              ->with('articles', $articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name','ASC')->lists('name','id');
        $tags = Tag::orderBy('name','ASC')->lists('name','id');

        return view('admin.articles.create')
        ->with('categories', $categories)
        ->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {

        //Manipulacion de imagenes

        if($request->file('image'))
        {
          $file = $request->file('image');
          $name = 'blogfacilito_' . time() . '.' .$file->getClientOriginalExtension();
          $path = public_path() . '/images/articles';
          $file->move($path, $name);
        }

        //metod para tomar el user_id de la tabla usuarios
        $article = new Article($request->all());
        $article->user_id = \Auth::user()->id;
        $article->save();

        //metodo para llenar la tabal pivote
        $article->tags()->sync($request->tags);

        //metodo para llenar la tabla imagenes
        $image = new Image();
        $image->name = $name;
        $image->article()->associate($article);
        $image->save();

        return redirect()->route('admin.articles.index')->with('message',
         'Se a creado el artiulo de manera satisfactoria');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        $article->category;
        $categories = Category::orderBy('name','DESC')->lists('name', 'id'); //esta es una lista y no un objeto completo
        $tags = Tag::orderBy('name','DESC')->lists('name', 'id'); //esta es una lista y no un objeto completo

        $my_tags = $article->tags->lists('id')->ToArray(); //Esta linea me convierte el objeto tags en un array

        return view('admin.articles.edit')
            ->with('categories',$categories)
            ->with('article', $article)
            ->with('tags', $tags)
            ->with('my_tags', $my_tags);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        $article->fill($request->all());
        $article->save();

        $article->tags()->sync($request->tags);

        return redirect()->route('admin.articles.index')->with('message',
        'Se a editado el articulo de manera exitosa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();

        return redirect()->route('admin.articles.index')->with('message',
         'El articulo se ha eliminado correctamente!');

    }
}
