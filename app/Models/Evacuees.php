<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evacuees extends Model
{
    use HasFactory;
    protected $fillable = [
        'head_family',
        'infant',
        'toddlers',
        'preschool',
        'school_age',
        'teen_age',
        'adult',
        'senior_citizen',
        'total_persons',
        'lactating_mothers',
        'pregnant',
        'pwd',
        'solo_parent',
        'evacuation_center_id',
    ];

    public function evacuationCenter()
    {
        return $this->belongsTo(EvacuationCenter::class);
    }
}
