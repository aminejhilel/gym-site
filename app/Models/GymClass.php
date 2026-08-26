<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GymClass extends Model
{
    /** @use HasFactory<\Database\Factories\GymClassFactory> */
    use HasFactory;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'description',
        'coach_id',
        'capacity',
        'duration_minutes',
        'scheduled_at',
        'status',
        'location',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'scheduled_at' => 'datetime',
        'capacity' => 'integer',
        'duration_minutes' => 'integer',
    ];

    public function coach(): BelongsTo
    {
        return $this->belongsTo(Coach::class);
    }

    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }

    public function getSpotsAvailableAttribute(): int
    {
        return $this->capacity - $this->reservations()->whereIn('status', ['reserved', 'attended'])->count();
    }
}
