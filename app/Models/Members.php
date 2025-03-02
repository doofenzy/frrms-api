<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    use HasFactory;
    protected $table = 'members';
    public $timestamps = false;

    protected $fillable = [
        'fname',
        'lname',
        'mname',
        'suffix',
        'zone',
        'lot',
        'status',
        'phone_number',
        'religion',
        'birthdate',
        'age',
        'gender',
        'occupation',
        'group',
        'relationship',
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
        'soloParent',
        'head_id',
        'evacuation_center_id',
        'calamity_id'
    ];

    public function evacuationCenters()
    {
        return $this->hasMany(HeadFamily::class);
    }
}
