<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Like;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static $rules = [
        'message' => 'required | max:120'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function Likes()
    {
        return $this->belongsTo(Like::class);
    }

    public function comments()
    {
        return $this->belongsToMany(User::class)->withPivot('comment');
    }
}
