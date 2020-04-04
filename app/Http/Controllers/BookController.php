<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Illuminate\Support\Facades\Log;

class BookController extends Controller
{
    public function all(){
        return Book::all();
    }

    public function add(Request $request){
        $book = new Book;
        $book->title = $request->title;
        $book->author = $request->author;
        $book->availability = true;

        $book->save();
        
        return redirect('/book');
    }

    public function delete($id){
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect('/book');
    }

    public function changeAvailabilty($id){
        Log::alert('profit');
        $book = Book::findOrFail($id);
        $book->availability = !$book->availability;

        $book->save();

        return redirect('/book');
    }
}
