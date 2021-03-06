<?php

namespace App\Models;

use App\Models\User;
use App\Models\Review;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "author",
        "genre",
        "published",
    ];

    public function user () {
        return $this->belongsTo(User::class);
    }

    //review relationship
    public function reviews(){
        return $this->hasMany(Review::class);
    }

   
}
