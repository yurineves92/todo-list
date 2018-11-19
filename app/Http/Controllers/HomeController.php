<?php

namespace App\Http\Controllers;

use App\Categories;
use App\User;
use App\Tasks;
use Request;

class HomeController extends Controller
{
    public function index(){
        $categories = Categories::all();
        $tasks = Tasks::orderBy('id','DESC')->paginate(5);
        return view('index')->with('categories',$categories)->with('tasks',$tasks);
    }
}
