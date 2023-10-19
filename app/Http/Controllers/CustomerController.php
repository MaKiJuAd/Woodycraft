<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customers;


class CustomerController extends Controller
{
    public function index()
    {
        return view('woody.create');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('woody.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'forename' => 'required|max:100',
            'surname' => 'required|max:500',
            'add1' => 'required|max:500',
            'add2' => 'required|max:500',
            'add3' => 'required|max:500',
            'postcode' => 'required|max:500',
            'phone' => 'required|max:500',
            'email' => 'required|max:500',
            'registered' => 'required|max:500',
        ]);
        $custo = new customers();
        $custo->forename = $request->forename;
        $custo->surname = $request->surname;
        $custo->add1 = $request->add1;
        $custo->add2 = $request->add2;
        $custo->add3 = $request->add3;
        $custo->postcode = $request->postcode;
        $custo->phone = $request->phone;
        $custo->email = $request->email;
        $custo->registered = $request->registered;
        $custo->save();
        return view('/dashboard');

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
