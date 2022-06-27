<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookCollection;
use App\Http\Resources\BookResource;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use App\Models\Book;
use Psy\Readline\Hoa\Console;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $book = Book::all();

        //query
        // $book = Book::
        // where('published', true)
        // ->where('author', 'Abigail Gold')
        // ->where('genre', 'Health')
        // ->get();

        $book = Book::
        where([
            ['published', false], 
            ['author', 'Abigail Gold']
        ])
        ->get();

        // return BookResource::collection($book);

        return new BookCollection($book);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $book = new Book();
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->genre = $request->input('genre');
        $book->published = $request->input('published');
        $book->user_id = $request->input('user_id');
        $book->save();
        
        return  new BookResource($book) ;

        // $user = new User();
        // $user->name = $request->input('name');
        // $user->email = $request->input('email');
        // $user->password = Hash::make($request-> input('password')); 
        // $user->save();

        // return $user;
            
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //binding
    public function show(Book $book)
    {
        //
        return $book;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    //
    }
}
