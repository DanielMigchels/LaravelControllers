<?php

namespace App\Http\Controllers;

use App\Models\Coffee;
use Illuminate\Http\Request;

class CoffeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coffees = Coffee::All();

        return view('coffees.index')->with('coffees', $coffees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('coffees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        Coffee::create($request->all());

        return redirect()->route('coffees.index')
                        ->with('success','Koffie toegevoegd.');
    }

    /**
     * Display the specified resource.
     *
     * @param Coffee $coffee
     * @return \Illuminate\Http\Response
     */
    public function show(Coffee $coffee)
    {
        return view('coffees.show',compact('coffee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Coffee $coffee
     * @return \Illuminate\Http\Response
     */
    public function edit(Coffee $coffee)
    {
        return view('coffees.edit',compact('coffee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Coffee $coffee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coffee $coffee)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
  
        $coffee->update($request->all());
  
        return redirect()->route('coffees.index')
                        ->with('success','Koffie gewijzigd');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Coffee $coffee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coffee $coffee)
    {
        $coffee->delete();
  
        return redirect()->route('coffees.index')
                        ->with('success','Koffie verwijderd');
    }
}
