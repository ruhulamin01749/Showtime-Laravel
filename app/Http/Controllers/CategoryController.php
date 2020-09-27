<?php

namespace App\Http\Controllers;

use App\category;
use Illuminate\Http\Request;
use App\Http\Requests;
use Redirect;
use Session;
use DB;
session_start();

class CategoryController extends Controller
{

    public function index(){
       $data = array();
       $data['title'] = "Manage Movie Category";
       $data['categories'] = category::get();
       return view('admin.movie_category',$data);
    }

    public function store(Request $request){
        $this->validate($request,["category_name" => "required|unique:categories"]);
        $data = array();
        $data['category_name'] = $request->category_name;
        $save = category::create($data);
        if($save){
            Session::flash("success","Successfully Saved");
        }else{
            Session::flash("error","Failed to Saved");
        }
        return Redirect::to("/manage-movie-category");
    }

    public function edit($category_id){
        $data = array();
       $data['title'] = "Edit-Movie-Category";
       $data['categories'] = category::get();
       $data['category'] = category::find($category_id);
       return view('admin.movie_category',$data);
    }

    public function update(Request $request){
        $this->validate($request,["category_name" => "required"]);
        $category_id = $request->category_id;
        $single = category::find($category_id);
        $single->category_name = $request->category_name;
        $update = $single->save();
        if($update){
            Session::flash("success","Successfully Updated");
        }else{
            Session::flash("error","Failed to Update");
        }
        return Redirect::to("/manage-movie-category");
    }
    public function delete($category_id){
        $delete = category::where("category_id",$category_id)->delete();
        if($delete){
            Session::flash("success","Successfully Deleted");
        }else{
            Session::flash("error","Failed to Delete");
        }
        return Redirect::to("/manage-movie-category");
    }
}
