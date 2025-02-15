<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeadFamily extends Model
{
    protected $table = 'head_family';
    use HasFactory;
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
        'four_p',
        'gov_id',
        'brgy',
        'relationship',
        'evacuation_type',
        'evacuee_family_id',
    ];

    public function evacuees()
    {
        return $this->belongsTo(Evacuees::class);
    }
}
