<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use App\Categories;

class CategoriesController extends Controller
{
    public function index(Request $request) {
    	if($request) {
    		$query = trim(Request::get('searchText'));
    		$categories = Categories::where('description','LIKE','%'.$query.'%')->orderBy('id','DESC')->paginate(10);
    	}
    	return view('categories.index')->with('categories',$categories)->with('searchText',$query);
    }

    public function create(){
    	return view('categories.create');
    }
    public function store(){
    	$params = Request::all();
    	$category = new Categories($params);
    	$category->save();
    	Session::flash('alert-success', 'Categoria criada com sucesso!');
    	return redirect()->action("CategoriesController@index");
    }

    public function edit($id){
    	return view("categories.edit", ["category"=>Categories::findOrFail($id)]);
    }

    public function update($id){
        $params = Request::all();
    	$category = Categories::findOrFail($id);
    	$category->update($params);
    	Session::flash('alert-success', 'Categoria atualizada com sucesso!');
    	return redirect()->action("CategoriesController@index");
    }

    public function destroy($id){
    	$category = Categories::findOrFail($id)->delete();
    	Session::flash('alert-success', 'Categoria removido com sucesso!');
    	return redirect()->action("CategoriesController@index");
    }
}
