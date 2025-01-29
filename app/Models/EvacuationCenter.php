<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvacuationCenter extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'zone',
        'type',
        'contact_person',
        'contact_number',
        'calamity_id', // Foreign key
    ];

    public function calamity()
    {
        return $this->belongsTo(Calamity::class);
    }
}
