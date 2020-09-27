<?php

namespace App\Http\Controllers;

use App\genre;
use Illuminate\Http\Request;
use App\Http\Requests;
use Redirect;
use Session;
use DB;
session_start();

class GenreController extends Controller
{
    public function index(){
       $data = array();
       $data['title'] = "Manage Movie Genre";
       $data['genres'] = genre::get();
       return view('admin.movie_genre',$data);
    }

    public function store(Request $request){
        $this->validate($request,["genre_name" => "required|unique:genres"]);
        $data = array();
        $data['genre_name'] = $request->genre_name;
        $save = genre::create($data);
        if($save){
            Session::flash("success","Successfully Saved");
        }else{
            Session::flash("error","Failed to Saved");
        }
        return Redirect::to("/manage-genre");
    }

    public function edit($genre_id){
        $data = array();
       $data['title'] = "Edit-Movie-Genre";
       $data['genres'] = genre::get();
       $data['genre'] = genre::find($genre_id);
       return view('admin.movie_genre',$data);
    }

    public function update(Request $request){
        $this->validate($request,["genre_name" => "required"]);
        $genre_id = $request->genre_id;
        $single = genre::find($genre_id);
        $single->genre_name = $request->genre_name;
        $update = $single->save();
        if($update){
            Session::flash("success","Successfully Updated");
        }else{
            Session::flash("error","Failed to Update");
        }
        return Redirect::to("/manage-genre");
    }
    public function delete($genre_id){
        $delete = genre::where("genre_id",$genre_id)->delete();
        if($delete){
            Session::flash("success","Successfully Deleted");
        }else{
            Session::flash("error","Failed to Delete");
        }
        return Redirect::to("/manage-genre");
    }
}
