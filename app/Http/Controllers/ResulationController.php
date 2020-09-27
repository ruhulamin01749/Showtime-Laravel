<?php

namespace App\Http\Controllers;

use App\resulation;
use Illuminate\Http\Request;
use App\Http\Requests;
use Redirect;
use Session;
use DB;
session_start();

class ResulationController extends Controller
{
        public function index(){
       $data = array();
       $data['title'] = "Manage Movie Resulation";
       $data['resulations'] = resulation::get();
       return view('admin.movie_resulation',$data);
    }

    public function store(Request $request){
        $this->validate($request,["resulation_name" => "required|unique:resulations"]);
        $data = array();
        $data['resulation_name'] = $request->resulation_name;
        $save = resulation::create($data);
        if($save){
            Session::flash("success","Successfully Saved");
        }else{
            Session::flash("error","Failed to Saved");
        }
        return Redirect::to("/manage-resulation");
    }

    public function edit($resulation_id){
        $data = array();
       $data['title'] = "Edit-Movie-Resulation";
       $data['resulations'] = resulation::get();
       $data['resulation'] = resulation::find($resulation_id);
       return view('admin.movie_resulation',$data);
    }

    public function update(Request $request){
        $this->validate($request,["resulation_name" => "required"]);
        $resulation_id = $request->resulation_id;
        $single = resulation::find($resulation_id);
        $single->resulation_name = $request->resulation_name;
        $update = $single->save();
        if($update){
            Session::flash("success","Successfully Updated");
        }else{
            Session::flash("error","Failed to Update");
        }
        return Redirect::to("/manage-resulation");
    }
    public function delete($resulation_id){
        $delete = resulation::where("resulation_id",$resulation_id)->delete();
        if($delete){
            Session::flash("success","Successfully Deleted");
        }else{
            Session::flash("error","Failed to Delete");
        }
        return Redirect::to("/manage-resulation");
    }
}
