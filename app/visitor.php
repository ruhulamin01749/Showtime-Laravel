<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class visitor extends Model
{
    protected $primaryKey = "visitor_id";

    protected $fillable = ["fullname","username","email","cell","password","active","status"];
}
