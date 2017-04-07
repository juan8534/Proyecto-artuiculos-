<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use Carbon\Carbon;
use App\Category;
use App\Tag;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
      Carbon::setlocale('es'); //metodo constructor carbon en español
    }

    public function index()
    {
        $articles = Article::orderBy('id', 'DESC')->paginate(4);
        $articles->each(function($articles){
          $articles->category;
          $articles->images;
        });
        return view('front.index')
            ->with('articles', $articles);
    }

    public function searchCategory($name)
    {
      $category = Category::searchCategory($name)->first();
      $articles = $category->articles()->paginate(4);
      $articles->each(function($articles){
        $articles->category;
        $articles->images;
      });
      return view('front.index')
          ->with('articles', $articles);
    }

    public function searchTag($name)
    {
      $tag = Tag::searchTag($name)->first();
      $articles = $tag->articles()->paginate(4);
      $articles->each(function($articles){
        $articles->category;
        $articles->images;
      });
      return view('front.index')
          ->with('articles', $articles);
    }

    public function viewArticle($id)
    {
        $articles = Article::find($id);
        $articles->category;
        $categories = Category::orderBy('name','DESC')->lists('name', 'id'); //esta es una lista y no un objeto completo
        $tags = Tag::orderBy('name','DESC')->lists('name', 'id'); //esta es una lista y no un objeto completo

        $my_tags = $articles->tags->lists('id')->ToArray();

        return view('front.article')->with('articles', $articles);
    }



}
