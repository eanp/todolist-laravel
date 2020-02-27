<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
    public function index()
    {
        $todos = DB::table('todos')->get();
        return view('todos.index', ['todos' => $todos]);
    }

    public function store(Request $request)
    {
        DB::table('todos')->insert([
            'list' => $request->list,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        return redirect('/');
    }

    public function edit($id)
    {
        $todos = DB::table('todos')->get();
        $edit_id = DB::table('todos')->where('id', $id)->get();
        return view('todos.edit', ['todos' => $todos], ['edit' => $edit_id]);
    }

    public function update(Request $request)
    {
        DB::table('todos')->where('id', $request->id)->update([
            'list' => $request->list,
            'updated_at' => Carbon::now(),
        ]);
        return redirect('/');
    }

    public function destroy($id)
    {
        DB::table('todos')->where('id', $id)->delete();
        return redirect('/');
    }
}
