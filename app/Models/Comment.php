<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['body', 'post_id', 'user_id'];

    // relatie with post
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    // relatie with user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}