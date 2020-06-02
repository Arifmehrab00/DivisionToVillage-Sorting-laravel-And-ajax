<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\upazila;
use App\Models\divition;
use App\Models\district;
class upazilaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $upazilas = upazila::all();
        return view('layouts.Backend.Upazila.upazila_index', compact('upazilas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['divitions'] = divition::all();
        $data['districts'] = district::all();
        return view('layouts.Backend.Upazila.upazila_create', $data);
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
            'name' => 'required|unique:upazilas'
        ]);
        // Store Data
        $upazila = new upazila();
        $upazila->divition_id = $request->divition;
        $upazila->district_id = $request->district;
        $upazila->name = $request->name;
        $upazila->save();
        // Redirect
        return redirect()->route('admin.upazila.index')->with('success', 'Upazila Added Successfully');
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
        $data['upazilaEdit'] = upazila::find($id);
        return view('layouts.Backend.Upazila.upazila_create', $data);
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
