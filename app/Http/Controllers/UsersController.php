<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersController extends Controller
{
    public function login(){
        return view('login');
    }
    public function register(){
        return view('register');
    }
    public function index(Request $request){
    	if($request) {
    		$query = trim(Request::get('searchText'));
    		$users = User::where('name','LIKE','%'.$query.'%')->orderBy('id','DESC')->paginate(10);
    	}
    	return view('users.index')->with('users',$users)->with('searchText',$query);
    }

    public function create(){
        return view('users.create');
    }

    public function store(){
    	$params = Request::all();
    	$user = User::all();
    	foreach($user as $u){
    		if($u['email'] == $params['email']){
    			Session::flash('alert-danger', 'Já existe esse email cadastrado no nosso sistema!');
    			return redirect()->action("UsersController@create");	
    		}
    	}
    	if($params['password'] != $params['remember_password']){
    		Session::flash('alert-warning', 'As senhas não se conferem!');
    		return redirect()->action("UsersController@create");	
    	}
    	$params['password'] = Hash::make($params['password']);
    	$user = new User($params);
        $user->save();
        Session::flash('alert-success', 'Usuário criada com sucesso!');
        return redirect()->action("UsersController@login");  
	
    }

    public function edit($id){
    	return view("users.edit", ["user"=>User::findOrFail($id)]);
    }

    public function update($id){
        $params = Request::all();
        $params['password'] = Hash::make($params['password']);
    	$user = User::findOrFail($id);
    	$user->update($params);
    	Session::flash('alert-success', 'Usuário atualizado com sucesso!');
    	return redirect()->action("UsersController@index");
    }

    public function destroy($id){
    	$user = User::findOrFail($id)->delete();
    	Session::flash('alert-success', 'Usuário removido com sucesso!');
    	return redirect()->action("UsersController@index");
    }

    public function reset($id){
        $params = Request::all();
        $params['password'] = Hash::make($params['password']);
        $user = User::findOrFail($id);
        $user->update($params);
        Session::flash('alert-success', 'Senha atualizada com sucesso!');
        return redirect()->action("UsersController@index");
    }

    public function logout(){
        Auth::logout();
        Session::flash('alert-info', 'Deslogado com sucesso!');
        return redirect()->action("UsersController@login");
    }

    public function authenticate(){
        $credenciais = Request::only('email','password');
        if(Auth::attempt($credenciais)) {
            // Authentication passed...
            Session::flash('alert-success', 'Logado com sucesso!');
            return redirect('/');
        }else{
            Session::flash('alert-danger', 'O email e a senha estão incorretos, digite novamente!');
            return redirect()->action("UsersController@login");
        }
    }

}
