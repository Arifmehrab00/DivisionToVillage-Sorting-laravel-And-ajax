<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\district;

class defaultController extends Controller
{
    public function districtShort(Request $request){
       $divition_id = $request->divition_id;
       $divitionValue = district::where('divition_id', $divition_id)->get();
       return response()->json($divitionValue);
    }
}
