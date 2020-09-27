<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class software extends Model
{
    protected $primaryKey = "id";
    protected $fillable = [
    	"software_name",
        "main_category",
    	"category_id",
    	"software_size",
    	"software_link",
    	"uploader"
    ];
    public function soft_category()
    {
        return $this->hasOne('App\soft_category', 'category_id', 'category_id');
    }
}
