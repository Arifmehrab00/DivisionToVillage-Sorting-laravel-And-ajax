<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\district;
use App\Models\upazila;
class defaultController extends Controller
{
    public function districtShort(Request $request){
       $divition_id = $request->divition_id;
       $divitionValue = district::where('divition_id', $divition_id)->get();
       return response()->json($divitionValue);
    }
    public function upazilaShort(Request $request){
       $district_id = $request->district_id;
       $upazila = upazila::where('district_id', $district_id)->get();
       return response()->json($upazila);
    }
}
