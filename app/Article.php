<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    protected $fillable = ['title', 'excerpt', 'body'];

    //To throw caution to the wind
    // protected $guarded = []; 

    public function path()
    {
        return route('articles.show', $this);
    }

    // this is to find the slug name rather than ID
    // public function getRouteKeyname()
    // {
    //     return 'slug'; // Article::where('slug', $article)->first() 
    // }
}
