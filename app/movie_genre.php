<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class movie_genre extends Model
{
    protected $primaryKey = "id";
    protected $fillable = [
    	"genre_id",
    	"movie_id"
    ];
}
