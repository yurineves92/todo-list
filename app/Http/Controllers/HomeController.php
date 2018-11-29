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
        $task_close = Tasks::where('status',0)->get()->count();
        $task_open = Tasks::where('status',1)->get()->count();
        return view('index',compact('task_open','task_close'))->with('categories',$categories)->with('tasks',$tasks);
    }
}
