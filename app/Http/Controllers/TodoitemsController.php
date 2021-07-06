<?php

namespace App\Http\Controllers;

use App\Models\todoitems;
use Illuminate\Http\Request;

class TodoitemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todoitems_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $res = new Todoitems;

        $res->name = $request->input('name');
        $res->save();

        $request->session()->flash('msg','Success! Todo created..');
        return redirect('todoitems_show');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\todoitems  $todoitems
     * @return \Illuminate\Http\Response
     */
    public function show(todoitems $todoitems)
    {
        return view('todoitems_show')->with('arrTodoItems', Todoitems::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\todoitems  $todoitems
     * @return \Illuminate\Http\Response
     */
    public function edit(todoitems $todoitems,$id)
    {
        return view('todoitems_edit')->with('arrTodoItems', Todoitems::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\todoitems  $todoitems
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, todoitems $todoitems)
    {
        $res = Todoitems::find($request->id);

        $res->name = $request->input('name');
        $res->save();

        $request->session()->flash('msg','Success! Todo updated..');
        return redirect('todoitems_show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\todoitems  $todoitems
     * @return \Illuminate\Http\Response
     */
    public function destroy(todoitems $todoitems,$id)
    {
        //echo '<pre>'; print_r($id);
        Todoitems::destroy(array('id',$id));

        return redirect('todoitems_show');
    }
}
