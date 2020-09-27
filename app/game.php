<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class game extends Model
{
    protected $primaryKey = "id";
    protected $fillable = [
    	"game_name",
    	"game_category",
    	"game_size",
    	"game_link",
    	"uploader",
    	"date_time"
    ];
}
