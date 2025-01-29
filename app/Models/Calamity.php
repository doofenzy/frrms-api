<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calamity extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'severity_level',
        'cause',
        'alert_level',
        'status',
        'date',
    ];

    public function evacuationCenters()
    {
        return $this->hasMany(EvacuationCenter::class);
    }
}
