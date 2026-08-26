<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Testimonial extends Model
{
    /** @use HasFactory<\Database\Factories\TestimonialFactory> */
    use HasFactory;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'member_id',
        'author_name',
        'content',
        'rating',
        'is_published',
        'photo',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'rating' => 'integer',
        'is_published' => 'boolean',
    ];

    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class);
    }
}
