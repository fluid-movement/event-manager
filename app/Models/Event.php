<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;

    protected $casts = [
        'start' => 'datetime',
        'end' => 'datetime',
    ];

    protected $fillable = [
        'name',
        'description',
        'location',
        'start',
        'end',
        'user_id'
    ];

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function attendees(): HasMany
    {
        return $this->hasMany(Attendee::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function scopeFindForUser($query, User $user)
    {
        return $query->whereHas('attendees', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        });
    }
}
