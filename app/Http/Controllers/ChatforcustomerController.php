<?php

namespace App\Http\Controllers;

use App\Models\chatforcustomer;
use Illuminate\Http\Request;

class ChatforcustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('customercare.customercare');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(chatforcustomer $chatforcustomer)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(chatforcustomer $chatforcustomer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, chatforcustomer $chatforcustomer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(chatforcustomer $chatforcustomer)
    {
        //
    }
}
