<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\divition;

class divitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divitions = divition::all();
        return view('layouts.Backend.Divitions.divition_index', compact('divitions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.Backend.Divitions.divition_create');
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
            'name' => 'required|unique:divitions'
        ]);
        // Store Data
        $divition = new divition();
        $divition->name = $request->name;
        $divition->save();
        // Redirect
        return redirect()->route('admin.divition.index')->with('success', 'Divition Added Successfully');
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
        $divitionEdit = divition::find($id);
        return view('layouts.Backend.Divitions.divition_create', compact('divitionEdit'));
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
            'name' => 'unique:divitions'
        ]);
        // Update Data
        $divitionUpdate = divition::find($id);
        $divitionUpdate->name = $request->name;
        $divitionUpdate->save();
        // Redirect
        return redirect()->route('admin.divition.index')->with('success', 'Divition Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $divitionDelete = divition::find($id);
        $divitionDelete->delete();
        // Redirect
        return redirect()->route('admin.divition.index')->with('success', 'Divition Deleted Successfully');
    }
}
