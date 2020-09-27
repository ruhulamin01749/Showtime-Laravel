<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    protected $primaryKey = "admin_id";
    protected $fillable = [
    	"fullname",
    	"username",
    	"email",
    	"password",
    	"photo",
    	"role",
    	"active"
    ];
}
