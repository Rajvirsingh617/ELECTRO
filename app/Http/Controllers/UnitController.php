<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $units = Unit::all();
       return view('admin.units.index',['units'=> $units]); //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('admin.units.create');//
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'unit_name' => 'required|max:255',
        'unit_desc' => 'nullable|string',
    ]);

    Unit::create([
        'unit_name' => $request->unit_name,
        'unit_desc' => $request->unit_desc,
    ]);

    return redirect()->route('unit.index')->with('success', 'Unit added successfully');
}

    /**
     * Display the specified resource.
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Unit $unit)
    {
        return view('admin.units.edit', compact('unit'));//
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Unit $unit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unit $unit)
    {
        //
    }
}
