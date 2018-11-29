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
        $date_initial = Request::get('date_initial');
        $date_final = Request::get('date_final');
        $category_id = Request::get('category_id');
        if($request) {
    		$query = trim(Request::get('searchText'));
    		$tasks = Tasks::where('title','LIKE','%'.$query.'%')
            ->orderBy('id','DESC')->paginate(25);
            
    	}
        if($category_id) {
            $tasks = Tasks::where('category_id',$category_id)
            ->orderBy('id','DESC')->paginate(25);
        }
        if($date_initial) {
            $tasks = Tasks::where('started','>=',$date_initial)->get();
        }
        if($date_final) {
            $tasks = Tasks::where('started','<=',$date_final)->get();
        }
        $categories = Categories::all();
    	return view('tasks.index')->with('tasks',$tasks)->with('searchText',$query)->with('categories',$categories);
    }

    public function create(){
        if(Auth::guest()){
            Session::flash('alert-danger', 'Você precisa criar uma conta para gerenciar suas tarefas');
            return redirect()->action("TasksController@index");
        }
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
        if(Auth::guest()){
            Session::flash('alert-danger', 'Você precisa criar uma conta para gerenciar suas tarefas');
            return redirect()->action("TasksController@index");
        }   
        $categories = Categories::all();
    	return view("tasks.edit", ["task"=>Tasks::findOrFail($id)])->with('categories',$categories);
    }
    public function show($id = null){
        $query = trim(Request::get('searchText'));
        $tasks = Tasks::where('status',$id)->orderBy('id','DESC')->paginate(25);
        return view('tasks.index')->with('tasks',$tasks)->with('searchText',$query);
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
        if(Auth::guest()){
            Session::flash('alert-danger', 'Você precisa criar uma conta para gerenciar suas tarefas');
            return redirect()->action("TasksController@index");
        }
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
        if(Auth::guest()){
            Session::flash('alert-danger', 'Você precisa criar uma conta para gerenciar suas tarefas');
            return redirect()->action("TasksController@index");
        }
        $params = Request::all();
        $task = Tasks::findOrFail($id);
        $task->status = 1;
        $task->update($params);
        Session::flash('alert-success', 'Tarefa atualizada com sucesso!');
        return redirect()->action("TasksController@index");
    }
}
