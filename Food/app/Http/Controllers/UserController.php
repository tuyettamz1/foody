<?php

namespace App\Http\Controllers;

use App\Category;
use App\District;
use App\Place;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getCreatePlace()
    {
    	$districts = District::all();
    	$categories = Category::all();
    	return view('home.create-place',compact('districts','categories'));
    }
}
