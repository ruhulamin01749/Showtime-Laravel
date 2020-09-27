<?php

namespace App\Http\Controllers;

use App\software;
use Illuminate\Http\Request;
use App\Http\Requests;
use Redirect;
use Session;
use DB;
session_start();

class SoftwareController extends Controller
{
    public function index(){
       $data = array();
       $data['title'] = "Manage Software";
       $data['softs'] = software::get();
       $data['main_categories'] = DB::table('soft_main_category')->get();
       $data['categories'] = DB::table('soft_categories')->get();
       return view('admin.soft.manage_soft',$data);
    }

    public function store(Request $request){
        $this->validate($request,[
            "software_name" => "required|unique:software",
            "main_soft_cat_id" => "required",
            "category_id" => "required",
            "software_size" => "required",
            "software_link" => "required|url"
        ]);
        $data = array();
        $data['software_name'] = $request->software_name;
        $data['main_category'] = $request->main_soft_cat_id;
        $data['category_id'] = $request->category_id;
        $data['software_size'] = $request->software_size;
        $data['software_link'] = $request->software_link;
        $data['uploader'] = $request->uploader;

        $save = software::create($data);
        if($save){
            Session::flash("success","Successfully Saved");
        }else{
            Session::flash("error","Failed to Saved");
        }
        return Redirect::to("/manage-software");
    }

    public function edit($id){
        $data = array();
       $data['title'] = "Edit-Software";
       $data['softs'] = software::get();
       $data['main_categories'] = DB::table('soft_main_category')->get();
       $data['categories'] = DB::table('soft_categories')->get();
       $data['soft'] = software::find($id);
       return view('admin.soft.manage_soft',$data);
    }

    public function update(Request $request){
        $this->validate($request,[
            "software_name" => "required",
            "main_soft_cat_id" => "required",
            "software_size" => "required",
            "category_id" => "required",
            "software_link" => "required|url"
        ]);
        $software_id = $request->software_id;
        $single = software::find($software_id);
        $single->software_name = $request->software_name;
        $single->main_category = $request->main_soft_cat_id;
        $single->category_id = $request->category_id;
        $single->software_size = $request->software_size;
        $single->software_link = $request->software_link;
        $update = $single->save();
        if($update){
            Session::flash("success","Successfully Updated");
        }else{
            Session::flash("error","Failed to Update");
        }
        return Redirect::to("/manage-software");
    }
    public function delete($id){
        $delete = software::where("id",$id)->delete();
        if($delete){
            Session::flash("success","Successfully Deleted");
        }else{
            Session::flash("error","Failed to Delete");
        }
        return Redirect::to("/manage-software");
    }
}
