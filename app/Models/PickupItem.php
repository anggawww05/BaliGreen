<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PickupItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'pickup_request_id',
        'waste_category_id',
        'size',
        'estimated_weight',
        'is_wet',
        'has_smell',
    ];

    protected $casts = [
        'is_wet' => 'boolean',
        'has_smell' => 'boolean',
    ];

    public function pickupRequest()
    {
        return $this->belongsTo(PickupRequest::class);
    }

    public function wasteCategory()
    {
        return $this->belongsTo(WasteCategory::class);
    }
}
