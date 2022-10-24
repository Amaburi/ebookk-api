<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\siswa;

class siswacontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = siswa::all();
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $siswa = new siswa;
        $siswa->name = $request->name;
        $siswa->gender = $request->gender;
        $siswa->age = $request->age;

        $siswa->save();
        return response()-> json(['message'=>'data has been saved'],200);
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
        $siswa = siswa::find($id);
        if($siswa){
            $siswa->name = $request->name;
            $siswa->gender = $request->gender;
            $siswa->age = $request->age;

            $siswa->update();
            return response()-> json(['message'=>'data has been updated...'],200);
        }else{
            return response()-> json(['message'=>'cant find the data...'],404);

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
        $siswa = siswa::find($id);
        if($siswa){
            $siswa->delete();
            return response()-> json(['message'=>'data has been deleted...'],404);

        }else{
            return response()-> json(['message'=>'cant find the data...'],404);

        }
    }
}
