<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class WelcomeController extends Controller
{
    public function AuthLogin() {
        $id = Session::get('id');
        if($id) {
            return Redirect::to('/home-task');
        } else {
            return Redirect::back()->send();
        }
    }

    public function home_free() {
        return view('frontend.home-free');
    }

    public function home_task() {
        $this->AuthLogin();
        $todoList = DB::table('todo')->get();
        $typeTodo = DB::table('typetodolist')->get();
        $accountTodo = DB::table('account')->get();
        return view('frontend.home-task')->with('todoList', $todoList)->with('typeTodo', $typeTodo)->With('accountTodo', $accountTodo);
    }
}
