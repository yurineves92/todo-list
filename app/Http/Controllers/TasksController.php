<?php

namespace App\Http\Controllers;

use App\Categories;
use App\User;
use App\Tasks;
use Request;
use Session;
use Auth;

class TasksController extends Controller
{
    public function index(Request $request) {
    	if($request) {
    		$query = trim(Request::get('searchText'));
    		$tasks = Tasks::where('title','LIKE','%'.$query.'%')->orderBy('id','DESC')->paginate(25);
    	}
    	return view('tasks.index')->with('tasks',$tasks)->with('searchText',$query);
    }

    public function create(){
        $categories = Categories::all();
    	return view('tasks.create')->with('categories',$categories);
    }
    public function store(){
    	$params = Request::all();
    	$task = new Tasks($params);
        $task->user_id = Auth::user()->id;
        $task->status = (!isset($params['status']))? 0 : 1;
    	$task->save();
    	Session::flash('alert-success', 'Tarefa criada com sucesso!');
    	return redirect()->action("TasksController@index");
    }

    public function edit($id){
        $categories = Categories::all();
    	return view("tasks.edit", ["task"=>Tasks::findOrFail($id)])->with('categories',$categories);
    }

    public function update($id){
        $params = Request::all();
    	$task = Tasks::findOrFail($id);
        $task->status = (!isset($params['status']))? 0 : 1;
    	$task->update($params);
    	Session::flash('alert-success', 'Tarefa atualizada com sucesso!');
    	return redirect()->action("TasksController@index");
    }

    public function destroy($id){
    	$task = Tasks::findOrFail($id)->delete();
    	Session::flash('alert-success', 'Tarefa removido com sucesso!');
    	return redirect()->action("TasksController@index");
    }
    public function view($id){
        $task = Tasks::findOrFail($id);
        return view('tasks.view')->with('task',$task);
    }
    public function list($status){
        $tasks = Tasks::where('status','=',$status)->paginate(25);
        return view('tasks.list')->with('tasks',$tasks);
    }
    public function finished($id){
        $params = Request::all();
        $task = Tasks::findOrFail($id);
        $task->status = 1;
        $task->update($params);
        Session::flash('alert-success', 'Tarefa atualizada com sucesso!');
        return redirect()->action("TasksController@index");
    }
}
