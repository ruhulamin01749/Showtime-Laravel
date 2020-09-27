<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sub_category extends Model
{
    protected $primaryKey = "sub_category_id";
    protected $fillable = ["sub_category_name","category_id"];

    public function category()
    {
        return $this->hasOne('App\category', 'category_id', 'category_id');
    }
}
