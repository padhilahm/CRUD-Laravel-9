<?php

namespace App\Http\Controllers;

use App\Models\item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = Item::paginate(10);
        return view('item.list', compact('items','items'));
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('item.create');
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'=>'required',
            'price'=> 'required|numeric',
        ]);
 
        $item = new Item([
            'name' => $request->get('name'),
            'price'=> $request->get('price')
        ]);
 
        $item->save();
        return redirect('/item')->with('success', 'Item has been added');
    }
 
    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
        return view('item.view',compact('item'));
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
        return view('item.edit',compact('item'));
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
 
        $request->validate([
            'name'=>'required',
            'price'=> 'required|numeric',
        ]);
 
 
        $item = Item::find($id);
        $item->name = $request->get('name');
        $item->price = $request->get('price');
 
        $item->update();
 
        return redirect('/item')->with('success', 'Item updated successfully');
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
        $item->delete();
        return redirect('/item')->with('success', 'Item deleted successfully');
    }
}
