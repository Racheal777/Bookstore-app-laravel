<?php

namespace App\Models;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment',
        'ratings'
    ];

    //relationship

    public function user(){
        return $this->belongsTo(User::class);
    }

    //book relationship
    public function book(){
        return $this->belongsTo(Book::class);
    }
}
