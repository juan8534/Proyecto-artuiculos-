<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Article extends Model
{

    protected $table = "articles";

    protected $fillable = ['tittle', 'content', 'category_id','user_id'];

    public function category()
    {
      return $this->belongsTo('App\Category');
    }

    public function user()
    {
      return $this->belongsTo('App\User');
    }

    public function images()
    {
      return $this->hasMany('App\Image');
    }

    public function tags()
    {
      return $this->belongsToMAny('App\Tag')->withTimestamps();
    }

    public function scopeSearch($query, $tittle)
    {
      return $query->where('tittle', 'LIKE', "%$tittle%");
    }
    public function scopeSearchArticle($query, $tittle)
    {
      return $query->where('tittle', '=', $tittle);
    }


}
