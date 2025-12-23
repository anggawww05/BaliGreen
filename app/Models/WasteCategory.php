<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WasteCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'risk_level',
        'base_tolerance_hours'
    ];

    public function pickupItems()
    {
        return $this->hasMany(PickupItem::class);
    }
}
