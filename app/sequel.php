<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sequel extends Model
{
    protected $primaryKey = "sequel_id";
    protected $fillable = [
    	"sequel_name",
    	"sequel_thumnail"
    ];
}
