<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order_items;


class panierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('woody.panier');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'id' => 'required|max:100',
            'quantity' => 'required|max:100',
        ]);
        $order = new order_items();
        $order-> product_id = $request->id;
        $order-> quantity = $request->quantity;
        $order->save();
        return view('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
