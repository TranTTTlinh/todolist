<?php

namespace App\Http\Controllers\Todo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class TodoController extends Controller
{
    public function AuthLogin() {
        $id = Session::get('id');
        if($id) {
            return Redirect::to('/home-task');
        } else {
            return Redirect::back()->send();
        }
    }

    public function add_todo() {
        $this->AuthLogin();
        $typeTodo = DB::table('typetodolist')->get();
        return view('frontend.create-todo')->with('typeTodo', $typeTodo);
    }

    public function insert_todo(Request $request) {
        $this->AuthLogin();
        $nameTask = $request->nameTask;
        $typeTodo = $request->typeTodo;
        $status = $request->status;

        $data = array();
        $data['TaskName'] = $nameTask;
        $data['IdAccount'] = Session::get('id');
        $data['IdTypetodolist'] = $typeTodo;
        $data['Status'] = '1';
        $data['CreatedAt'] = Carbon::now()->format('y-m-d');

        DB::table('todo')->insert($data);
        return Redirect::to('/home-task');
    }

    public function edit_todo($id) {
        $this->AuthLogin();
        $editTodo = DB::table('todo')->where('id', $id)->get();
        $typeTodo = DB::table('typetodolist')->get();
        return view('frontend.edit-todo')->with('editTodo', $editTodo)->with('typeTodo', $typeTodo);
    }

    public function update_todo(Request $request, $id) {
        $this->AuthLogin();
        $nameTask = $request->nameTask;
        $typeTodo = $request->typeTodo;
        $status = $request->status;

        $data = array();
        $data['TaskName'] = $nameTask;
        $data['IdAccount'] = Session::get('id');
        $data['IdTypetodolist'] = $typeTodo;
        $data['Status'] = $status;
        $data['ModifiedAt'] = Carbon::now()->format('y-m-d');

        DB::table('todo')->where('id', $id)->update($data);
        return Redirect::to('/home-task');
    }

    public function delete_todo($id) {
        $this->AuthLogin();
        DB::table('todo')->delete($id);
        return Redirect::back();
    }
}
