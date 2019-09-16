<?php

namespace App\Models;

use \Eloquent;
use \App\User;

class Post extends Eloquent
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'contents', 'published_date','status','user_id','image','views','tags'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function author()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}

Post::saving(function($post){
    if(\Auth::check()) {
        $post->author()->attach(\Auth::user()->id);
    }
    //dd($post->tags);
    $post->tags = json_encode(array_map('trim', explode(',',$post->tags)));
    $post->views = 0;
});
