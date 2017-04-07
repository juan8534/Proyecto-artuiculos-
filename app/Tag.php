<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $tabl = "tags";

    protected $fillable = ['name'];

    public function articles()
    {
      return $this->belongsToMAny('App\Article')->withTimestamps();
    }

    public function scopeSearch($query, $name)
    {
      return $query->where('name', 'LIKE', "%$name%");
    }

    public function scopeSearchTag($query, $name)
    {
      return $query->where('name', '=', $name);
    }
}
