<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //table name
    protected $table = 'posts';
    //primary key
    public $primaryKey ='id';
    //timestamps
    public $timestamps =true;

    public function user(){
     return $this->belongsTo('App\User');
    }
    public function Tags(){
        return $this->belongsToMany('App\Tag');
    }
    public function comments(){
        return $this->hasMany('App\Comment');
    }
}