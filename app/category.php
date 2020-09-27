<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $primaryKey = "category_id";

    protected $fillable = ["category_name"];
}
