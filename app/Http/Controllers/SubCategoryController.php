<?php

namespace App\Http\Controllers;

use App\sub_category;
use App\category; //For Get Category
use Illuminate\Http\Request;
use App\Http\Requests;
use Redirect;
use Session;
use DB;
session_start();

class SubCategoryController extends Controller
{
      public function index(){
       $data = array();
       $data['title'] = "Manage Movie Category";
       $data['categories'] = category::get();
       $data['sub_categories'] = sub_category::get();
       return view('admin.movie_sub_category',$data);
    }

    public function store(Request $request){
        $this->validate($request,[
            "sub_category_name" => "required|unique:sub_categories",
            "category_id" => "required"
        ]);
        $data = array();
        $data['sub_category_name'] = $request->sub_category_name;
        $data['category_id'] = $request->category_id;
        $save = sub_category::create($data);
        if($save){
            Session::flash("success","Successfully Saved");
        }else{
            Session::flash("error","Failed to Saved");
        }
        return Redirect::to("/manage-sub-category");
    }

    public function edit($sub_category_id){
        $data = array();
       $data['title'] = "Edit-Sub-Category";
       $data['categories'] = category::get();
       $data['sub_categories'] = sub_category::get();
       $data['sub_category'] = sub_category::find($sub_category_id);
       return view('admin.movie_sub_category',$data);
    }

    public function update(Request $request){
        $this->validate($request,[
            "sub_category_name" => "required",
            "category_id" => "required"
        ]);
        $sub_category_id = $request->sub_category_id;
        $single = sub_category::find($sub_category_id);
        $single->sub_category_name = $request->sub_category_name;
        $single->category_id = $request->category_id;
        $update = $single->save();
        if($update){
            Session::flash("success","Successfully Updated");
        }else{
            Session::flash("error","Failed to Update");
        }
        return Redirect::to("/manage-sub-category");
    }
    public function delete($sub_category_id){
        $delete = sub_category::where("sub_category_id",$sub_category_id)->delete();
        if($delete){
            Session::flash("success","Successfully Deleted");
        }else{
            Session::flash("error","Failed to Delete");
        }
        return Redirect::to("/manage-sub-category");
    }
    
}
