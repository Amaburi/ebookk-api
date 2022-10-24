<?php

namespace App\Http\Controllers;

use App\Models\book;
use Illuminate\Http\Request;

class bookcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data = book::all();
       return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = new book;
        $book->title = $request->title;
        $book->desc = $request->desc;
        $book->author = $request->author;
        $book->publisher = $request->publisher;

        $book->save();
        return response()-> json(['message'=>'Book has been saved'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $book = book::find($id);
        if($book){
            $book->title = $request->title;
            $book->desc = $request->desc;
            $book->author = $request->author;
            $book->publisher = $request->publisher;
    

            $book->update();
            return response()-> json(['message'=>'book has been updated...'],200);
        }else{
            return response()-> json(['message'=>'cant find the book...'],404);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = book::find($id);
        if($book){
            $book->delete();
            return response()-> json(['message'=>'book has been deleted...'],200);

        }else{
            return response()-> json(['message'=>'cant find the book...'],404);

        }
    }
}
