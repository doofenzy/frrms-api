<?php

namespace App\Http\Controllers;

use App\Models\Calamity;
use Illuminate\Http\Request;

class CalamityController extends Controller
{
    public function index(Request $request)
    {
        // Get the search query parameter from the request
        $query = $request->query('q');

        // If query is provided, filter results; otherwise, fetch all calamities
        $calamities = Calamity::when($query, function ($queryBuilder) use ($query) {
            $queryBuilder->where('type', 'LIKE', "%{$query}%")
                ->orWhere('severity_level', 'LIKE', "%{$query}%")
                ->orWhere('cause', 'LIKE', "%{$query}%")
                ->orWhere('alert_level', 'LIKE', "%{$query}%")
                ->orWhere('status', 'LIKE', "%{$query}%");
        })->get();

        return response()->json($calamities);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|string',
            'severity_level' => 'required|string',
            'cause' => 'required|string',
            'alert_level' => 'required|string',
            'status' => 'required|string',
            'date' => 'required|date',
        ]);

        $calamity = Calamity::create($validated);

        return response()->json($calamity, 201);
    }

    public function show(Calamity $calamity)
    {
        return response()->json($calamity);
    }

    public function update(Request $request, Calamity $calamity)
    {
        $validated = $request->validate([
            'type' => 'string',
            'severity_level' => 'string',
            'cause' => 'string',
            'alert_level' => 'string',
            'status' => 'string',
            'date' => 'date',
        ]);

        $calamity->update($validated);

        return response()->json($calamity);
    }

    public function destroy(Calamity $calamity)
    {
        $calamity->delete();

        return response()->json(null, 204);
    }
}
