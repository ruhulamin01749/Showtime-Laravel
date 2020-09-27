<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class movie extends Model
{
    protected $primaryKey = "movie_id";
    protected $fillable = [
    	"movie_name",
    	"movie_image",
    	"slider_image",
    	"movie_link",
    	"movie_subtitle",
    	"movie_category",
        "year",
    	"movie_year",
    	"movie_resulation",
    	"movie_sequel",
    	"imdb_link",
    	"realese_date",
    	"director",
    	"cast",
    	"rating",
    	"trailor",
    	"view",
    	"movie_size",
    	"new",
    	"slider",
    	"date_time",
    	"user"
    ];

    public function category(){
        return $this->hasOne(category::class, 'category_id', 'movie_category');
    }
    public function movie_genre(){
        return $this->hasMany(movie_genre::class, 'movie_id', 'movie_id');
    }
}
