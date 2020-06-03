<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\divition;
use App\Models\union;

class unionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unions = union::all();
        return view('layouts.Backend.union.union_index', compact('unions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['divitions'] = divition::all();
        return view('layouts.Backend.union.union_create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validations
        $validation = $request->validate([
            'divition' => 'required',
            'district' => 'required',
            'upazila'  => 'required',
            'name' => 'required|unique:unions'
        ]);
        // Store Data
        $union = new union();
        $union->divition_id = $request->divition;
        $union->district_id = $request->district;
        $union->upazila_id  = $request->upazila;
        $union->name        = $request->name;
        $union->save();
        // Redirect
        return redirect()->route('admin.union.index')->with('success', 'Union Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['divitions'] = divition::all();
        $data['unionEdit'] = union::find($id);
        return view('layouts.Backend.union.union_create', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         // Validations
        $validation = $request->validate([
            'name' => 'unique:upazilas'
        ]);
        // Store Data
        $upazila = upazila::find($id);
        $upazila->divition_id = $request->divition;
        $upazila->district_id = $request->district;
        $upazila->name = $request->name;
        $upazila->save();
        // Redirect
        return redirect()->route('admin.upazila.index')->with('success', 'Upazila Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $upazilaDelete = upazila::find($id);
        $upazilaDelete->delete();
        // Redirect
        return redirect()->route('admin.upazila.index')->with('success', 'Upazila Deleted Successfully');
    }
}
