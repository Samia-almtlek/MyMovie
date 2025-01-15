<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
use HasFactory;
    protected $fillable=[
        'title' ,'slug','description' ,'my_review','image_path','genre','release_year','user_id'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comments()
{
    return $this->hasMany(Comment::class);
}

}