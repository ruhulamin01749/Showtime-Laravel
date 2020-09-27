<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\movie;
use App\movie_genre;
use Redirect;
use Session;
use DB;
use Image;
session_start();

class Home extends Controller{
    public function index(){
        $data = array();
        $data['title'] = "Home";
        $data['slider_movie']    = movie::where("slider", 1)->orderBy("movie_id","DESC")->limit(6)->get();
        $data['hollywood_movie'] = movie::where('movie_category', 1)->orderBy("movie_id","DESC")->limit(6)->get();
        $data['bollywood_movie'] = movie::where('movie_category', 3)->orderBy("movie_id","DESC")->limit(6)->get();
        $data['south_indian']    = movie::where('movie_category', 6)->orderBy("movie_id","DESC")->limit(6)->get();
        $data['indian_bangla']   = movie::where('movie_category', 7)->orderBy("movie_id","DESC")->limit(6)->get();
        $data['other_movie']     = movie::where('movie_category', 8)->orderBy("movie_id","DESC")->limit(6)->get();
        $data['animation_movie'] = movie::where('movie_category', 9)->orderBy("movie_id","DESC")->limit(6)->get();
        return view('front.index',$data);
    }
    public function allMovie(){
        $data = array();
        $data['title'] = 'All Movies';
        $data['movies'] = movie::orderBy("movie_id","DESC")->paginate(60);
        return view('front.all_movies',$data);
    }
    public function categoryMovie($catId){
        $data = array();
        // $data['title'] = DB::table('categories')->where('category_id',$catId)->first()->category_name;
        $data['title'] = 'Category Movie';
        $data['movies'] = movie::where('movie_category', $catId)->orderBy("movie_id","DESC")->paginate(60);
        $data['num_of_movie'] = movie::where('movie_category', $catId)->get();
        return view('front.category_movie',$data);
    }
    public function todayMovies(){
        date_default_timezone_set("Asia/Dhaka");
        $data = array();
        $data['title'] = 'Today Movies';
        $data['movies'] = movie::where('date_time', date('Y-m-d'))->get();
        return view('front.today_movie',$data);

    }

}



// INSERT INTO games (game_name, game_category, game_size, game_link) SELECT movie_name, '1', movie_size, movie_link from movies WHERE movie_category=14
