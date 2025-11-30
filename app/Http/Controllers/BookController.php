<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use function PHPUnit\Framework\returnArgument;

class BookController extends Controller
{
    public function index(){
        return Book::query()->get();
    }
    public function show($book){
        $book=Book::findOrFail($book);
        return response()->json([
            'message'=>'book created successfully',
            'data'=>$book,
            'status'=>200,
        ]);
    }
    public function store(Request $request){
        $validatedData=$request->validate([
            'title'=>'required|string|max:255',
            'author'=>'required|string|max:255',
            'publication_year'=>'required|date|digits:4'
        ]);
        Book::create($validatedData);
        return response()->json([
            'message'=>'book created successfully',
            'status'=>200,
        ]);
    }

    // it work with raw json but not with form data i am still working to find why is that happening
    public function update(Request $request,$book){
        $book=Book::findOrFail($book);

        $request->validate([
            'title'=>'required|string|max:255',
        ]);
        $newbook=$book->update([
            'title'=>$request->title,
        ]);

        // $book->title=>$request->title;
        return response()->json([
            'message'=>'book updated successfully',
            'data'=>$newbook,
        ]);
    }
    public function destroy($book){
        Book::where('id',$book)->delete();
        return response()->json([
            'message'=>'book deleted successfully',
            'status'=>200,
        ]);
    }
}
