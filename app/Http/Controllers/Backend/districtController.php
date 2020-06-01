<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\district;
use App\Models\divition;

class districtController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $districts = district::all();
        return view('layouts.Backend.District.district_index', compact('districts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divitions = divition::all();
        return view('layouts.Backend.District.district_create', compact('divitions'));
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
            'name' => 'required|unique:districts'
        ]);
        // Store Data
        $district = new district();
        $district->divition_id = $request->divition;
        $district->name = $request->name;
        $district->save();
        // Redirect
        return redirect()->route('admin.district.index')->with('success', 'District Added Successfully');
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
        $divitions = divition::all();
        $districtEdit = district::find($id);
        return view('layouts.Backend.District.district_create', compact('districtEdit', 'divitions'));
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
            'name' => 'unique:districts'
        ]);
        // Update Data
        $districtUpdate = district::find($id);
        $districtUpdate->divition_id = $request->divition;
        $districtUpdate->name = $request->name;
        $districtUpdate->save();
        // Redirect
        return redirect()->route('admin.district.index')->with('success', 'District Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $districtDelete = district::find($id);
        $districtDelete->delete();
        // Redirect
        return redirect()->route('admin.district.index')->with('success', 'District Deleted Successfully');
    }
}
