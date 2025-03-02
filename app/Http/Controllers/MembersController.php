<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Members;
use App\Models\HeadFamily;

class MembersController extends Controller
{
    public function getTotalValues($evacuation_center_id)
    {
        $fields = [
            'infant',
            'toddlers',
            'preschool',
            'schoolAge',
            'teenAge',
            'adult',
            'seniorCitizen',
            'lactatingMothers',
            'pregnant',
            'pwd',
            'soloParent'
        ];

        $head_families = HeadFamily::select('id', 'fname', 'lname')
            ->whereHas('members', function ($query) use ($evacuation_center_id) {
                $query->where('evacuation_center_id', $evacuation_center_id);
            })
            ->get();

        $response = [];

        foreach ($head_families as $head_family) {
            $totals = Members::where('head_id', $head_family->id)
                ->where('evacuation_center_id', $evacuation_center_id)
                ->select($fields)
                ->get()
                ->reduce(function ($carry, $member) use ($fields) {
                    foreach ($fields as $field) {
                        if (!isset($carry[$field])) {
                            $carry[$field] = 0;
                        }
                        $carry[$field] += $member->$field;
                    }
                    return $carry;
                }, []);

            $family_response = [
                'id' => $head_family->id,
                'name' => $head_family->fname . ' ' . $head_family->lname
            ];

            foreach ($fields as $field) {
                $family_response[$field] = $totals[$field] ?? 0;
            }

            $family_response['totalMembers'] = array_sum(array_values($totals));

            $response[] = $family_response;
        }

        return response()->json($response);
    }


    public function updateEvacuationCenter(Request $request, $head_id)
    {
        error_log('Update method called');
        $evacuation_center_id = $request->input('evacuation_center_id');

        Members::where('head_id', $head_id)
            ->update(['evacuation_center_id' => $evacuation_center_id]);

        return response()->json(['message' => 'Evacuation center updated successfully']);
    }

    public function getTotalStats($evacuation_center_id)
    {
        $totalPopulation = Members::where('evacuation_center_id', $evacuation_center_id)->count();
        $totalFemales = Members::where('evacuation_center_id', $evacuation_center_id)->where('gender', 'female')->count();
        $totalMales = Members::where('evacuation_center_id', $evacuation_center_id)->where('gender', 'male')->count();
        $totalFamilies = HeadFamily::whereHas('members', function ($query) use ($evacuation_center_id) {
            $query->where('evacuation_center_id', $evacuation_center_id);
        })->count();
        $totalSeniors = Members::where('evacuation_center_id', $evacuation_center_id)->where('age', '>=', 60)->count();
        $totalUnderaged = Members::where('evacuation_center_id', $evacuation_center_id)->where('age', '<', 18)->count();

        $response = [
            'totalPopulation' => $totalPopulation,
            'totalFemales' => $totalFemales,
            'totalMales' => $totalMales,
            'totalFamilies' => $totalFamilies,
            'totalSeniors' => $totalSeniors,
            'totalUnderaged' => $totalUnderaged,
        ];

        return response()->json($response);
    }
}
