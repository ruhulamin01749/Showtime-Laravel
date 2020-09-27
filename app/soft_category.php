<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class soft_category extends Model
{
    protected $primaryKey = "category_id";
    protected $fillable = [
    	"category_name",
    	"category_thumbnail"
    ];
}
