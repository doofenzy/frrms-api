<?php

namespace App\Http\Controllers;

use App\Models\HeadFamily;
use Illuminate\Http\Request;

class HeadFamilyController extends Controller
{
    public function getHeadFam()
    {
        // Fetch head families by evacuee family ID
        $headFamilies = HeadFamily::all();
        return response()->json($headFamilies);
    }
}
