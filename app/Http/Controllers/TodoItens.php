<?php

namespace App\Http\Controllers;

use App\Models\Itens;
use Illuminate\Http\Request;

class TodoItens extends Controller
{
    public function index()
    {
        $items = Itens::all();
        
        return view('welcome', ['items' => $items]);
    }

    public function create(Request $request)
    {
        $items = new Itens();
        $items->title = $request->item;

        // $itemEvent = ItensModel::create($request->all());
        // dd($items);
        // exit;
        $items->save();

        return redirect('/');
    }

    public function edit($id) 
    {
        // $items = Itens::all();

        $itemEdit = Itens::findOrfail($id);
        // dd($itemEdit->title);

        return view('welcome', ['itemEdit' => $itemEdit]);
    }

    public function update(Request $request) 
    {
        $data = $request->all();

        Itens::findOrfail($request->id)->update($data);

        return redirect('/');
    }

    public function delete($id)
    {
        $itemDelete = Itens::findOrfail($id);

        $itemDelete->delete();

        return redirect('/');
    }
}
