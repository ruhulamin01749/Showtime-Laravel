<?php

namespace App\Http\Controllers;

use App\game;
use Illuminate\Http\Request;
use App\Http\Requests;
use Redirect;
use Session;
use DB;
session_start();

class GameController extends Controller
{
    public function index(){
       $data = array();
       $data['title'] = "Manage Games";
       $data['categories'] = DB::table('game_category')->get();
       $data['games'] = game::get();
       return view('admin.game.manage_game',$data);
    }

    public function store(Request $request){
        $this->validate($request,[
            "game_name" => "required|unique:games",
            "game_category" => "required",
            "game_size" => "required",
            "game_link" => "required|url"
        ]);
        $data = array();
        $data['game_name'] = $request->game_name;
        $data['game_category'] = $request->game_category;
        $data['game_size'] = $request->game_size;
        $data['game_link'] = $request->game_link;
        $data['uploader'] = $request->uploader;

        $save = game::create($data);
        if($save){
            Session::flash("success","Successfully Saved");
        }else{
            Session::flash("error","Failed to Saved");
        }
        return Redirect::to("/manage-game");
    }

    public function edit($game_id){
        $data = array();
       $data['title'] = "Edit-Game";
       $data['categories'] = DB::table('game_category')->get();
       $data['games'] = game::get();
       $data['game'] = game::find($game_id);
       return view('admin.game.manage_game',$data);
    }

    public function update(Request $request){
        $this->validate($request,[
            "game_name" => "required",
            "game_category" => "required",
            "game_size" => "required",
            "game_link" => "required|url"
        ]);
        $game_id = $request->game_id;
        $single = game::find($game_id);
        $single->game_name = $request->game_name;
        $single->game_category = $request->game_category;
        $single->game_size = $request->game_size;
        $single->game_link = $request->game_link;
        $update = $single->save();
        if($update){
            Session::flash("success","Successfully Updated");
        }else{
            Session::flash("error","Failed to Update");
        }
        return Redirect::to("/manage-game");
    }
    public function delete($game_id){
        $delete = game::where("id",$game_id)->delete();
        if($delete){
            Session::flash("success","Successfully Deleted");
        }else{
            Session::flash("error","Failed to Delete");
        }
        return Redirect::to("/manage-game");
    }

    public function manageCategory(){
       $data = array();
       $data['title'] = "Manage Games Category";
       $data['categories'] = DB::table('game_category')->get();
       return view('admin.game.manage_category',$data);
    }

    public function storeCategory(Request $request){
        $this->validate($request,[
            "category_name" => "required|unique:game_category",
        ]);
        $data = array();
        $data['category_name'] = $request->category_name;
        $save = DB::table('game_category')->insert($data);
        if($save){
            Session::flash("success","Successfully Saved");
        }else{
            Session::flash("error","Failed to Saved");
        }
        return Redirect::to("/games-category");
    }

    public function editCategory($cat_id){
        $data = array();
        $data['title'] = "Edit-Game-Category";
        $data['categories'] = DB::table('game_category')->get();
        $data['category'] = DB::table('game_category')->where('category_id',$cat_id)->first();
       return view('admin.game.manage_category',$data);
    }

    public function updateCategory(Request $request){
        $this->validate($request,[
            "category_name" => "required",
        ]);
        $cat_id = $request->category_id;
        $data = array();
        $data['category_name'] = $request->category_name;
        $update = DB::table('game_category')->where('category_id',$cat_id)->update($data);
        if($update){
            Session::flash("success","Successfully Updated");
        }else{
            Session::flash("error","Failed to Update");
        }
        return Redirect::to("/games-category");
    }
    public function deleteCategory($cat_id){
        $delete = DB::table('game_category')->where('category_id',$cat_id)->delete();
        if($delete){
            Session::flash("success","Successfully Deleted");
        }else{
            Session::flash("error","Failed to Delete");
        }
        return Redirect::to("/games-category");
    }
}
