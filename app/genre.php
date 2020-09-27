<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class genre extends Model
{
    protected $primaryKey = "genre_id";
    protected $fillable = ["genre_name"];
}
