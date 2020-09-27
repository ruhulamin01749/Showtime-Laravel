<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $primaryKey = "comment_id";
    protected $fillable = [
    	"comment_body",
    	"visitor_id",
    	"replay_to",
    	"movie_id",
    	"date_time",
    ];
}
