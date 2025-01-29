<?php

namespace App\Http\Controllers;

use App\Models\EvacuationCenter;
use App\Models\Calamity;
use Illuminate\Http\Request;

class EvacuationCenterController extends Controller
{
    public function index(Request $request)
    {
        // Fetch all evacuation centers, optionally filter by calamity
        $calamityId = $request->query('calamity_id');

        if ($calamityId) {
            $evacuationCenters = EvacuationCenter::where('calamity_id', $calamityId)->get();
        } else {
            $evacuationCenters = EvacuationCenter::with('calamity')->get(); // Include related calamity
        }

        return response()->json($evacuationCenters);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'zone' => 'required|string',
            'type' => 'required|string',
            'contact_person' => 'required|string',
            'contact_number' => 'required|string',
            'calamity_id' => 'required|exists:calamities,id', // Ensure calamity exists
        ]);

        $evacuationCenter = EvacuationCenter::create($validated);

        return response()->json($evacuationCenter, 201);
    }

    public function show($id)
    {
        $evacuationCenter = EvacuationCenter::with('calamity')->findOrFail($id);
        return response()->json($evacuationCenter);
    }

    public function update(Request $request, EvacuationCenter $evacuationCenter)
    {
        $validated = $request->validate([
            'name' => 'string',
            'zone' => 'string',
            'type' => 'string',
            'contact_person' => 'string',
            'contact_number' => 'string',
            'calamity_id' => 'exists:calamities,id',
        ]);

        $evacuationCenter->update($validated);

        return response()->json($evacuationCenter);
    }

    public function destroy(EvacuationCenter $evacuationCenter)
    {
        $evacuationCenter->delete();

        return response()->json(null, 204);
    }

    public function getByCalamity($calamityId)
    {
        // Retrieve evacuation centers for the given calamity ID
        $evacuationCenters = EvacuationCenter::where('calamity_id', $calamityId)->get();

        return response()->json($evacuationCenters);
    }
}
