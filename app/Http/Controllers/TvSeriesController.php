<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Redirect;
use Session;
use DB;
use Image;
session_start();

class TvSeriesController extends Controller
{
	//Tv Series Episode
    public function manageEpisode(){
    	$data = array();
    	$data['title'] = "Tv Series Categories";
    	$data['episodes'] = DB::table('tv_series_episode')
    						->join('tv_series', 'tv_series_episode.series_id', '=', 'tv_series.id')
    						->join('tv_series_category', 'tv_series_episode.category', '=', 'tv_series_category.category_id')
    						->orderBy('episode_id','DESC')->get();
    	$data['categories'] = DB::table('tv_series_category')->orderBy('category_id','asc')->get();
    	$data['tvseries'] = DB::table('tv_series')->orderBy("name","asc")->get();
    	return view('admin.tvseries.manage_episode',$data);
    }
    public function saveEpisode(Request $request){
    	$this->validate($request,[
    		"category" => "required",
    		"series_id" => "required",
    		"season" => "required",
    		"episode" => "required",
    		"size" => "required",
    		"link" => "required",
    	]);
        $data = array();
        $data['category'] = $request->category;
        $data['series_id'] = $request->series_id;
        $data['season'] = $request->season;
        $data['episode'] = $request->episode;
        $data['size'] = $request->size;
        $data['link'] = $request->link;
        $save = DB::table('tv_series_episode')->insert($data);
        if($save){
            Session::flash("success","Successfully Saved");
        }else{
            Session::flash("error","Failed to Saved");
        }
        return Redirect::to("/manage-episode");
    }
    public function editEpisode($id){
    	$data = array();
    	$data['title'] = "Edit Episode";
    	$data['episode'] = DB::table('tv_series_episode')->where('episode_id',$id)->first();
    	$data['episodes'] = DB::table('tv_series_episode')
    						->join('tv_series', 'tv_series_episode.series_id', '=', 'tv_series.id')
    						->join('tv_series_category', 'tv_series_episode.category', '=', 'tv_series_category.category_id')
    						->orderBy('episode_id','DESC')->get();
    	$data['categories'] = DB::table('tv_series_category')->orderBy('category_id','asc')->get();
    	$data['tvseries'] = DB::table('tv_series')->orderBy("name","asc")->get();
    	return view('admin.tvseries.manage_episode',$data);
    }
    public function updateEpisode(Request $request){
    	$id  = $request->episode_id;
    	$this->validate($request,[
    		"category" => "required",
    		"series_id" => "required",
    		"season" => "required",
    		"episode" => "required",
    		"size" => "required",
    		"link" => "required",
    	]);
        $data = array();
        $data['category'] = $request->category;
        $data['series_id'] = $request->series_id;
        $data['season'] = $request->season;
        $data['episode'] = $request->episode;
        $data['size'] = $request->size;
        $data['link'] = $request->link;
        $update = DB::table('tv_series_episode')->where('episode_id',$id)->update($data);
        if($update){
            Session::flash("success","Successfully Updated");
        }else{
            Session::flash("error","Failed to Update");
        }
        return Redirect::to("/manage-episode");
    }
    public function deleteEpisode($id){
    	$delete = DB::table('tv_series_episode')->where('episode_id',$id)->delete();
        if($delete){
            Session::flash("success","Successfully Deleted");
        }else{
            Session::flash("error","Failed to Delete");
        }
        return Redirect::to("/manage-episode");
    }


	  //Tv Series
    public function manageTvSeries(){
    	$data = array();
    	$data['title'] = "Manage Tv Series";
    	$data['categories'] = DB::table('tv_series_category')->orderBy('category_name','asc')->get();
    	$data['tvseries'] = DB::table('tv_series')
    						->join('tv_series_category', 'tv_series.category', '=', 'tv_series_category.category_id')
    						->orderBy("id","desc")->get();
    	return view("admin.tvseries.manage_tv_series",$data);  
    }
    public function saveTvSeries(Request $request){
    	$this->validate($request,[
            "name" => "required|unique:tv_series",
            "category"=>"required",
            "thumbnail" => "required|Mimes:jpg,jpeg,png"
        ]);
        $data = array();
        $data['name'] = $request->name;
        $data['category'] = $request->category;

        $image = $request->file('thumbnail');
        if($image){
        	$image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $img = Image::make($image->getRealPath())->resize(280, 150);
            $image_fullname = $image_name.'.'.$ext;
            $thumb_path = 'public/images/tvseries/';
            $thumb_url = $thumb_path.$image_fullname;
            $success = $img->save($thumb_url);
            if($success){
                $data['thumbnail'] = $thumb_url;
            }
        }

        $save = DB::table('tv_series')->insert($data);
        if($save){
            Session::flash("success","Successfully Saved");
        }else{
            Session::flash("error","Failed to Saved");
        }
        return Redirect::to("/manage-tvseries");
    }
    public function editTvSeries($id){
    	$data = array();
    	$data['title'] = "Edit Tv-Series";
    	$data['series'] = DB::table('tv_series')->where("id",$id)->first();
    	$data['categories'] = DB::table('tv_series_category')->orderBy('category_name','asc')->get();
    	$data['tvseries'] = DB::table('tv_series')
    						->join('tv_series_category', 'tv_series.category', '=', 'tv_series_category.category_id')
    						->orderBy("id","desc")->get();
    	return view("admin.tvseries.manage_tv_series",$data);  
    }
    public function updateTvSeries(Request $request){
    	$id = $request->id;
    	$this->validate($request,[
            "name" => "required",
            "category"=>"required",
        ]);
        $data = array();
        $data['name'] = $request->name;
        $data['category'] = $request->category;

        $image = $request->file('thumbnail');
        if($image){
        	$old_data = DB::table('tv_series')->where("id",$id)->first();
        	$old_thumb = $old_data->thumbnail;
        	if($old_thumb){
        		if(file_exists($old_thumb)){
        			unlink($old_thumb);
        		}
        	}
        	$image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $img = Image::make($image->getRealPath())->resize(280, 150);
            $image_fullname = $image_name.'.'.$ext;
            $thumb_path = 'public/images/tvseries/';
            $thumb_url = $thumb_path.$image_fullname;
            $success = $img->save($thumb_url);
            if($success){
                $data['thumbnail'] = $thumb_url;
            }
        }

        $update = DB::table('tv_series')->where("id",$id)->update($data);
        if($update){
            Session::flash("success","Successfully Updated");
        }else{
            Session::flash("error","Failed to Updated");
        }
        return Redirect::to("/manage-tvseries");
    }
    public function deleteTvSeries($id){
    	$old_data = DB::table('tv_series')->where("id",$id)->first();
    	$old_thumb = $old_data->thumbnail;
    	if($old_thumb){
    		if(file_exists($old_thumb)){
    			unlink($old_thumb);
    		}
    	}
    	$delete = DB::table('tv_series')->where("id",$id)->delete();
        if($delete){
            Session::flash("success","Successfully Deleted");
        }else{
            Session::flash("error","Failed to Delete");
        }
        return Redirect::to("/manage-tvseries");

    }
	//Tv Series Category
    public function Category(){
    	$data = array();
    	$data['title'] = "Tv Series Categories";
    	$data['categories'] = DB::table('tv_series_category')->orderBy('category_id','asc')->get();
    	return view('admin.tvseries.manage_tv_category',$data);
    }
    public function saveCategory(Request $request){
    	$this->validate($request,["category_name" => "required|unique:tv_series_category"]);
        $data = array();
        $data['category_name'] = $request->category_name;
        $save = DB::table('tv_series_category')->insert($data);
        if($save){
            Session::flash("success","Successfully Saved");
        }else{
            Session::flash("error","Failed to Saved");
        }
        return Redirect::to("/manage-tvseries-category");
    }
    public function editCategory($id){
    	$data = array();
    	$data['title'] = "Edit-Tvseries-Category";
    	$data['categories'] = DB::table('tv_series_category')->orderBy('category_id','asc')->get();
    	$data['category'] = DB::table('tv_series_category')->where('category_id',$id)->first();
    	return view('admin.tvseries.manage_tv_category',$data);
    }
    public function updateCategory(Request $request){
    	$id  = $request->category_id;
    	$this->validate($request,["category_name" => "required"]);
        $data = array();
        $data['category_name'] = $request->category_name;
        $update = DB::table('tv_series_category')->where('category_id',$id)->update($data);
        if($update){
            Session::flash("success","Successfully Updated");
        }else{
            Session::flash("error","Failed to Update");
        }
        return Redirect::to("/manage-tvseries-category");
    }
    public function deleteCategory($id){
    	$delete = DB::table('tv_series_category')->where('category_id',$id)->delete();
        if($delete){
            Session::flash("success","Successfully Deleted");
        }else{
            Session::flash("error","Failed to Delete");
        }
        return Redirect::to("/manage-tvseries-category");
    }

    //Award Show
    public function manageAwardShow(){
    	$data = array();
    	$data['title'] = "Manage Award Show";
    	$data['awardShows'] = DB::table('award_show')->orderBy("id","desc")->get();
    	return view("admin.tvseries.manage_award_show",$data);  
    }
    public function saveAwardShow(Request $request){
    	$this->validate($request,[
            "name" => "required|unique:award_show",
            "year"=>"required",
            "size"=>"required",
            "link"=>"required",
            "thumbnail" => "required|Mimes:jpg,jpeg,png"
        ]);
        $data = array();
        $data['name'] = $request->name;
        $data['year'] = $request->year;
        $data['size'] = $request->size;
        $data['link'] = $request->link;

        $image = $request->file('thumbnail');
        if($image){
        	$image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $img = Image::make($image->getRealPath())->resize(280, 150);
            $image_fullname = $image_name.'.'.$ext;
            $thumb_path = 'public/images/awardshow/';
            $thumb_url = $thumb_path.$image_fullname;
            $success = $img->save($thumb_url);
            if($success){
                $data['thumbnail'] = $thumb_url;
            }
        }

        $save = DB::table('award_show')->insert($data);
        if($save){
            Session::flash("success","Successfully Saved");
        }else{
            Session::flash("error","Failed to Saved");
        }
        return Redirect::to("/manage-awardshow");
    }
    public function editAwardShow($id){
    	$data = array();
    	$data['title'] = "Edit Award Show";
    	$data['show'] = DB::table('award_show')->where("id",$id)->first();
    	$data['awardShows'] = DB::table('award_show')->orderBy("id","desc")->get();
    	return view("admin.tvseries.manage_award_show",$data);  
    }
    public function updateAwardShow(Request $request){
    	$id = $request->id;
    	$this->validate($request,[
            "name" => "required",
            "year"=>"required",
            "size"=>"required",
            "link"=>"required",
        ]);
        $data = array();
        $data['name'] = $request->name;
        $data['year'] = $request->year;
        $data['size'] = $request->size;
        $data['link'] = $request->link;

        $image = $request->file('thumbnail');
        if($image){
        	$old_data = DB::table('award_show')->where("id",$id)->first();
        	$old_thumb = $old_data->thumbnail;
        	if($old_thumb){
        		if(file_exists($old_thumb)){
        			unlink($old_thumb);
        		}
        	}
        	$image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $img = Image::make($image->getRealPath())->resize(280, 150);
            $image_fullname = $image_name.'.'.$ext;
            $thumb_path = 'public/images/awardshow/';
            $thumb_url = $thumb_path.$image_fullname;
            $success = $img->save($thumb_url);
            if($success){
                $data['thumbnail'] = $thumb_url;
            }
        }

        $update = DB::table('award_show')->where("id",$id)->update($data);
        if($update){
            Session::flash("success","Successfully Updated");
        }else{
            Session::flash("error","Failed to Updated");
        }
        return Redirect::to("/manage-awardshow");
    }
    public function deleteAwardShow($id){
    	$old_data = DB::table('award_show')->where("id",$id)->first();
    	$old_thumb = $old_data->thumbnail;
    	if($old_thumb){
    		if(file_exists($old_thumb)){
    			unlink($old_thumb);
    		}
    	}
    	$delete = DB::table('award_show')->where("id",$id)->delete();
        if($delete){
            Session::flash("success","Successfully Deleted");
        }else{
            Session::flash("error","Failed to Delete");
        }
        return Redirect::to("/manage-awardshow");

    }

}
