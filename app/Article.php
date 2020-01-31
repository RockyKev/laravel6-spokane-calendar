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

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
}


//an article has many tags. And tags can have many articles.
//if you have a tag

// Article is Learn Laravel
// so tags may be - php, laravel, work, education 
