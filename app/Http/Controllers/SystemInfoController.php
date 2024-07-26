<?php

namespace App\Http\Controllers;

use App\Models\SystemInfo;
use Illuminate\Http\Request;

class SystemInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(SystemInfo $systemInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SystemInfo $systemInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SystemInfo $systemInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SystemInfo $systemInfo)
    {
        //
    }

    public function login(SystemInfo $systemInfo){
        //I can write all login inside controller
        $app_logo = $systemInfo->where('meta_name', 'app_logo')->first()->meta_value;
       
        return view('admin.login',['app_logo' => $app_logo]);
    }

}
