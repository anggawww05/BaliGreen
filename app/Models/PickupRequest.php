<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;


class PickupRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status',
        'max_risk_level',
        'aggregated_min_tolerance',
        'total_weight_kg',
        'sorting_photo_path',
        'is_sorted_confirmed',
        'notes'
    ];

    protected $with = ['user'];

    protected $appends = ['current_priority_score'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(PickupItem::class);
    }

    public function getCurrentPriorityScoreAttribute()
    {
        if ($this->status === 'completed' || $this->status === 'rejected') {
            return 0;
        }

        $hoursElapsed = Carbon::now()->diffInHours($this->created_at);

        $timeLeft = $this->aggregated_min_tolerance - $hoursElapsed;

        if ($timeLeft <= 0) {
            $timeLeft = 0.1;
        }

        if ($this->total_weight_kg > 0) {
            $score = ($this->total_weight_kg * $this->max_risk_level) / $timeLeft;
        } else {
            $score = 0;
        }

        return round($score, 2);
    }
}
