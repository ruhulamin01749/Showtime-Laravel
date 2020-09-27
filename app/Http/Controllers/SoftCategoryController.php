<?php

namespace App\Http\Controllers;

use App\soft_category;
use Illuminate\Http\Request;
use App\Http\Requests;
use Redirect;
use Session;
use DB;
session_start();

class SoftCategoryController extends Controller
{
    public function index(){
       $data = array();
       $data['title'] = "Manage Soft Category";
       $data['categories'] = soft_category::get();
       return view('admin.soft.soft_category',$data);
    }

    public function store(Request $request){
        $this->validate($request,[
            "category_name" => "required|unique:soft_categories",
            "category_thumbnail" => "required|Mimes:jpg,jpeg,png | dimensions:width=400,height=215"
        ]);
        $data = array();
        $data['category_name'] = $request->category_name;

        $image = $request->file('category_thumbnail');
        if($image){
            $image_name = str_random(5)."_".$request->category_name;
            $ext = strtolower($image->getClientOriginalExtension());
            $image_fullname = $image_name.'.'.$ext;
            $path = 'public/images/soft_category/';
            $image_url = $path.$image_fullname;
            $success = $image->move($path,$image_fullname);
            if($success){
                $data['category_thumbnail'] = $image_url;
            }
        }

        $save = soft_category::create($data);
        if($save){
            Session::flash("success","Successfully Saved");
        }else{
            Session::flash("error","Failed to Saved");
        }
        return Redirect::to("/manage-soft-category");
    }

    public function edit($category_id){
        $data = array();
       $data['title'] = "Edit-Soft-Category";
       $data['categories'] = soft_category::get();
       $data['category'] = soft_category::find($category_id);
       return view('admin.soft.soft_category',$data);
    }

    public function update(Request $request){
        $this->validate($request,["category_name" => "required"]);
        $category_id = $request->category_id;
        $single = soft_category::find($category_id);
        $single->category_name = $request->category_name;

        $image = $request->file('category_thumbnail');
        if($image){
            $this->validate($request,["category_thumbnail" => "dimensions:width=400,height=215|mimes:jpg,jpeg,png"]);
            if($single->category_thumbnail){
                if(file_exists($single->category_thumbnail)){
                    unlink($single->category_thumbnail);
                }
            }

            $image_name = str_random(5)."_".$request->category_name;
            $ext = strtolower($image->getClientOriginalExtension());
            $image_fullname = $image_name.'.'.$ext;
            $path = 'public/images/soft_category/';
            $image_url = $path.$image_fullname;
            $success = $image->move($path,$image_fullname);
            if($success){
                $single->category_thumbnail = $image_url;
            }
        }

        $update = $single->save();
        if($update){
            Session::flash("success","Successfully Updated");
        }else{
            Session::flash("error","Failed to Update");
        }
        return Redirect::to("/manage-soft-category");
    }
    public function delete($category_id){
        $single = soft_category::find($category_id);
        if($single->category_thumbnail){
            if(file_exists($single->category_thumbnail)){
                unlink($single->category_thumbnail);
            }
        }

        $delete = $single->delete();
        if($delete){
            Session::flash("success","Successfully Deleted");
        }else{
            Session::flash("error","Failed to Delete");
        }
        return Redirect::to("/manage-soft-category");
    }



     public function manageMainCat(){
       $data = array();
       $data['title'] = "Manage Soft Category";
       $data['categories'] = DB::table('soft_main_category')->get();
       return view('admin.soft.soft_main_category',$data);
    }

    public function saveMainCat(Request $request){
        $this->validate($request,[
            "main_soft_cat_name" => "required|unique:soft_main_category",
        ]);
        $data = array();
        $data['main_soft_cat_name'] = $request->main_soft_cat_name;

        $save = DB::table('soft_main_category')->insert($data);
        if($save){
            Session::flash("success","Successfully Saved");
        }else{
            Session::flash("error","Failed to Saved");
        }
        return Redirect::to("/manage-soft-main-category");
    }

    public function editMainCat($category_id){
        $data = array();
       $data['title'] = "Edit-Soft-Main-Category";
       $data['category'] = DB::table('soft_main_category')->where('main_soft_cat_id',$category_id)->first();
       $data['categories'] = DB::table('soft_main_category')->get();
       return view('admin.soft.soft_main_category',$data);
    }

    public function updateMainCat(Request $request){
        $this->validate($request,["main_soft_cat_name" => "required"]);
        $category_id = $request->main_soft_cat_id;
        $data = array();
        $data['main_soft_cat_name']= $request->main_soft_cat_name;
        $update = DB::table('soft_main_category')->where('main_soft_cat_id',$category_id)->update($data);
        if($update){
            Session::flash("success","Successfully Updated");
        }else{
            Session::flash("error","Failed to Update");
        }
        return Redirect::to("/manage-soft-main-category");
    }
    public function deleteMainCat($category_id){
        $delete = DB::table('soft_main_category')->where('main_soft_cat_id',$category_id)->delete();
        if($delete){
            Session::flash("success","Successfully Deleted");
        }else{
            Session::flash("error","Failed to Delete");
        }
        return Redirect::to("/manage-soft-main-category");
    }
}
