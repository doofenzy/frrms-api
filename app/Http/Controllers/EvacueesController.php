<?php

namespace App\Http\Controllers;

use App\Models\Evacuees;
use Illuminate\Http\Request;

class EvacueesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Fetch all evacuees, optionally filter by evacuation center
        $evacuationCenterID = $request->query('evacuation_center_id');
        if ($evacuationCenterID) {
            $evacuees = Evacuees::where('evacuation_center_id', $evacuationCenterID)->get();
        } else {
            $evacuees = Evacuees::all();
        }

        return response()->json($evacuees);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        print('test');
        $validated = $request->validate([
            'head_family' => 'required|string',
            'infant' => 'required|integer',
            'toddlers' => 'required|integer',
            'preschool' => 'required|integer',
            'school_age' => 'required|integer',
            'teen_age' => 'required|integer',
            'adult' => 'required|integer',
            'senior_citizen' => 'required|integer',
            'total_persons' => 'required|integer',
            'lactating_mothers' => 'required|integer',
            'pregnant' => 'required|integer',
            'pwd' => 'required|integer',
            'solo_parent' => 'required|integer',
        ]);
        $evacuees = Evacuees::create($validated);

        return response()->json($evacuees, 201);
    }

    public function getByCalamityId($calamity_id)
    {
        $evacuees = Evacuees::where('calamity_id', $calamity_id)->get();
        return response()->json($evacuees);
    }
    public function update(Request $request, $id)
    {

        error_log('Update method called');

        try {
            $validated = $request->validate([
                'evacuation_center_id' => 'required|exists:evacuation_centers,id',
                'calamity_id' => 'required|exists:calamities,id',
            ]);
            error_log('yes');
        } catch (\Illuminate\Validation\ValidationException $e) {
            error_log('Validation failed: ' . json_encode($e->errors()));
            return response()->json(['errors' => $e->errors()], 422);
        }

        $evacuee = Evacuees::findOrFail($id);
        $evacuee->evacuation_center_id = $validated['evacuation_center_id'];
        $evacuee->calamity_id = $validated['calamity_id'];
        $evacuee->save();

        error_log('Evacuee ID: ' . $id);
        error_log('New Evacuation Center ID: ' . $validated['evacuation_center_id']);
        error_log('New Calamity ID: ' . $validated['calamity_id']);
        error_log('Updated Evacuee: ' . $evacuee->toJson());

        return response()->json($evacuee);
    }

    public function show($id)
    {
        $evacuees = Evacuees::where('id', $id)->get();
        return response()->json($evacuees);
    }





    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id)
    // {
    //     //
    // }





    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {
    //     //
    // }
}
