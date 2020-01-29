<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    protected $fillable = ['title', 'excerpt', 'body'];

    // this is to find the slug name rather than ID
    // public function getRouteKeyname()
    // {
    //     return 'slug'; // Article::where('slug', $article)->first() 
    // }
}
