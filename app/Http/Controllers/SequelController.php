<?php

namespace App\Http\Controllers;

use App\sequel;
use Illuminate\Http\Request;
use App\Http\Requests;
use Redirect;
use Session;
use DB;
session_start();

class SequelController extends Controller
{
    public function index(){
       $data = array();
       $data['title'] = "Manage Movie Sequel";
       $data['sequels'] = sequel::get();
       return view('admin.movie_sequel',$data);
    }

    public function store(Request $request){
        $this->validate($request,[
            "sequel_name" => "required|unique:sequels",
            "sequel_thumnail" => "required|Mimes:jpg,jpeg,png | dimensions:width=400,height=215"
        ]);
        $data = array();
        $data['sequel_name'] = $request->sequel_name;

        $image = $request->file('sequel_thumnail');
        if($image){
            $image_name = str_random(5)."_".$request->sequel_name;
            $ext = strtolower($image->getClientOriginalExtension());
            $image_fullname = $image_name.'.'.$ext;
            $path = 'public/images/sequel/';
            $image_url = $path.$image_fullname;
            $success = $image->move($path,$image_fullname);
            if($success){
                $data['sequel_thumnail'] = $image_url;
            }
        }



        $save = sequel::create($data);
        if($save){
            Session::flash("success","Successfully Saved");
        }else{
            Session::flash("error","Failed to Saved");
        }
        return Redirect::to("/manage-sequel");
    }

    public function edit($sequel_id){
        $data = array();
       $data['title'] = "Edit-Movie-Sequel";
       $data['sequels'] = sequel::get();
       $data['sequel'] = sequel::find($sequel_id);
       return view('admin.movie_sequel',$data);
    }

    public function update(Request $request){
        $this->validate($request,["sequel_name" => "required"]);
        $sequel_id = $request->sequel_id;
        $single = sequel::find($sequel_id);
        $single->sequel_name = $request->sequel_name;

        $image = $request->file('sequel_thumnail');
        if($image){
            $this->validate($request,["sequel_thumnail" => "dimensions:width=400,height=215|mimes:jpg,jpeg,png"]);
            if($single->sequel_thumnail){
                if(file_exists($single->sequel_thumnail)){
                    unlink($single->sequel_thumnail);
                }
            }

            $image_name = str_random(5)."_".$request->sequel_name;
            $ext = strtolower($image->getClientOriginalExtension());
            $image_fullname = $image_name.'.'.$ext;
            $path = 'public/images/sequel/';
            $image_url = $path.$image_fullname;
            $success = $image->move($path,$image_fullname);
            if($success){
                $single->sequel_thumnail = $image_url;
            }
        }

        $update = $single->save();
        if($update){
            Session::flash("success","Successfully Updated");
        }else{
            Session::flash("error","Failed to Update");
        }
        return Redirect::to("/manage-sequel");
    }
    public function delete($sequel_id){
        $single = sequel::find($sequel_id);
        if($single->sequel_thumnail){
            if(file_exists($single->sequel_thumnail)){
                unlink($single->sequel_thumnail);
            }
        }

        $delete = $single->delete();
        if($delete){
            Session::flash("success","Successfully Deleted");
        }else{
            Session::flash("error","Failed to Delete");
        }
        return Redirect::to("/manage-sequel");
    }
}
