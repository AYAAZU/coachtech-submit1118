<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;


class TodoController extends Controller
{
    public function index(){
        $todos = Todo::all();
        return view('todo',['todos'=>$todos]);
    }

    public function create(Request $request){
        $this->validate($request,Todo::$rules);
        $createtodo = $request->all();
        unset($createtodo['_token']);
        Todo::create($createtodo);
        return redirect('/');
    }

    public function update(Request $request){
        $this->validate($request,Todo::$rules);
        $updateid = $request->updateid;
        $upcontent = $request->content;
        Todo::find($updateid)->update(['content'=>$upcontent]);
        return redirect('/');
    }

    public function delete(Request $request){
        $deleteid = $request->deleteid;
        Todo::find($deleteid)->delete();
        return redirect('/');
    }
}
