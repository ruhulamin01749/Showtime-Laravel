<?php

namespace App\Http\Controllers;
use App\movie;
use App\movie_genre;
use Illuminate\Http\Request;
use App\Http\Requests;
use Redirect;
use Session;
use DB;
use Image;
session_start();

class MovieController extends Controller
{

    public function index(){
        $data = array();
        $data['title'] = "Manage Movie";
        $data['movies'] = movie::get();
        return view('admin.manage_movie',$data);
    }
    public function addMovie(){
        $data = array();
        $data['title'] = "Add New Movie";
        $data['categories'] = DB::table('categories')->get();
        $data['sequels'] = DB::table('sequels')->get();
        $data['resulations'] = DB::table('resulations')->get();
        $data['genres'] = DB::table('genres')->get();
        return view('admin.add_movie',$data);
    }
    public function editMovie($id){
        $data = array();
        $data['title'] = "Edit Movie";
        $data['categories'] = DB::table('categories')->get();
        $data['sequels'] = DB::table('sequels')->get();
        $data['resulations'] = DB::table('resulations')->get();
        $data['genres'] = DB::table('genres')->get();
        $data['movie'] = movie::find($id);
        return view('admin.edit_movie',$data);
    }

    public function store(Request $request){
       $this->validate($request,[
            "movie_name" => "required|unique:movies",
            "movie_image" => "required|Mimes:jpg,jpeg,png,JPEG",
            "movie_category" => "required",
            "movie_size" => "required",
            "movie_link" => "required",
            "year"  => "required",
        ]);
        $data = array();
        $data['movie_name'] = $request->movie_name;
        $data['movie_category'] = $request->movie_category;
        $data['movie_size'] = $request->movie_size;
        $data['movie_link'] = $request->movie_link;
        $data['year'] = $request->year;
        $data['movie_subtitle'] = $request->movie_subtitle;
        $data['movie_resulation'] = $request->movie_resulation;
        $data['movie_sequel'] = $request->movie_sequel;
        $data['imdb_link'] = $request->imdb_link;
        $data['realese_date'] = $request->realese_date;
        $data['director'] = $request->director;
        $data['cast'] = $request->cast;
        $data['rating'] = $request->rating;
        $data['trailor'] = $request->trailor;
        $data['movie_size'] = $request->movie_size;
        $data['new'] = $request->new;
        $data['slider'] = $request->slider;
        $data['user'] = $request->user;

         $image = $request->file('movie_image');
        if($image){
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $img = Image::make($image->getRealPath())->resize(280, 150);
            $image_fullname = $image_name.'.'.$ext;
            $thumb_path = 'public/movies/';
            $thumb_url = $thumb_path.$image_fullname;
            $img->save($thumb_url);
            $slider_path = 'public/movies/slider/';
            $slider_url = $slider_path.$image_fullname;
            $success = $image->move($slider_path,$image_fullname);
            if($success){
                $data['movie_image'] = $thumb_url;
                $data['slider_image'] = $slider_url;
            }
        }

        $save = movie::create($data);
        if($save){
            $gdata = array();
            foreach($request->genres as $genre_id){
                $gdata['movie_id'] = $save->movie_id;
                $gdata['genre_id'] = $genre_id;
                $save = movie_genre::create($gdata);
            }

            Session::flash("success","Successfully Saved");
        }else{
            Session::flash("error","Failed to Saved");
        }
        return Redirect::to("/add-movie");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request){
        $movie_id = $request->movie_id;
        $update_data = movie::find($movie_id);
        $this->validate($request,[
            "movie_name" => "required",
            "movie_category" => "required",
            "movie_size" => "required",
            "movie_link" => "required",
            "year"  => "required",
        ]);
        $update_data->movie_name = $request->movie_name;
        $update_data->movie_category = $request->movie_category;
        $update_data->movie_size = $request->movie_size;
        $update_data->movie_link = $request->movie_link;
        
        $update_data->movie_subtitle = $request->movie_subtitle;
        $update_data->year = $request->year;
        $update_data->movie_resulation = $request->movie_resulation;
        $update_data->movie_sequel = $request->movie_sequel;
        $update_data->imdb_link = $request->imdb_link;
        $update_data->realese_date = $request->realese_date;
        $update_data->director = $request->director;
        $update_data->cast = $request->cast;
        $update_data->rating = $request->rating;
        $update_data->trailor = $request->trailor;
        $update_data->movie_size = $request->movie_size;
        if($request->new){
            $update_data->new = $request->new;
        }else{
            $update_data->new = 0;
        }
        if($request->slider){
            $update_data->slider = $request->slider;
        }else{
            $update_data->slider = 0;
        }
         $image = $request->file('movie_image');
        if($image){
            $old_data = DB::table('movies')->where('movie_id', $movie_id)->first();
            $old_movie_image = $old_data->movie_image;
            $old_slider_image = $old_data->slider_image;
            if($old_movie_image){
                if(file_exists($old_movie_image)){
                    unlink($old_movie_image);
                }
            }
            if($old_slider_image){
                if(file_exists($old_slider_image)){
                    unlink($old_slider_image);
                }
            }
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $img = Image::make($image->getRealPath())->resize(280, 150);
            $image_fullname = $image_name.'.'.$ext;
            $thumb_path = 'public/movies/';
            $thumb_url = $thumb_path.$image_fullname;
            $img->save($thumb_url);
            $slider_path = 'public/movies/slider/';
            $slider_url = $slider_path.$image_fullname;
            $success = $image->move($slider_path,$image_fullname);
            if($success){
                $update_data->movie_image = $thumb_url;
                $update_data->slider_image = $slider_url;
            }
        }
        
        $update = $update_data->save();
        if($update){
            $delete_genres =  DB::table('movie_genres')->where('movie_id', $movie_id)->delete();
            $gdata = array();
            foreach($request->genres as $genre_id){
                $gdata['movie_id'] = $movie_id;
                $gdata['genre_id'] = $genre_id;
                $save = movie_genre::create($gdata);
            }

            Session::flash("success","Successfully Updated");
        }else{
            Session::flash("error","Failed to Saved");
        }
        return Redirect::to("/manage-movie");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function delete($movie_id){
        $single_data = DB::table('movies')->where('movie_id', $movie_id)->first();
        $old_movie_image = $single_data->movie_image;
        $old_slider_image = $single_data->slider_image;
        if($old_movie_image){
            if(file_exists($old_movie_image)){
                unlink($old_movie_image);
            }
        }
        if($old_slider_image){
            if(file_exists($old_slider_image)){
                unlink($old_slider_image);
            }
        }
        DB::table('movie_genres')->where('movie_id', $movie_id)->delete();

        $delete = DB::table('movies')->where('movie_id', $movie_id)->delete();

        if($delete){
            Session::flash("success","Successfully Deleted");
        }else{
            Session::flash("error","Failed to Delete");
        }
        return Redirect::to("/manage-movie");

    }
}
