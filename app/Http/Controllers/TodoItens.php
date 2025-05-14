<?php

namespace App\Http\Controllers;

use App\Models\Itens;
use Illuminate\Http\Request;

class TodoItens extends Controller
{
    public function index()
    {
        // $items = Itens::orderByDesc('created_at');
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
        $itemEdit = Itens::findOrfail($id);

        return redirect('/punt', ['itemEdit' => $itemEdit]);
    }

    public function delete($id)
    {
        $itemDelete = Itens::findOrfail($id);

        $itemDelete->delete();

        return redirect('/');
    }
}
