<?php

namespace App\Models;

use App\Models\Scopes\OrderByStartAsc;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory, hasUuids;

    public string $link;

    public static string $attending = 'attending';
    public static string $interested = 'interested';

    protected $guarded = ['id'];

    protected $dispatchesEvents = [
        'retrieved' => \App\Events\ModelRetrieved::class,
    ];

    protected $casts = [
        'start' => 'date',
        'end' => 'date',
    ];

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->withPivot('status');
    }

    public function results(): hasMany
    {
        return $this->hasMany(Result::class);
    }

    public function interested(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->wherePivot('status', self::$interested);
    }

    public function attending(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->wherePivot('status', self::$attending);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function isOver():bool
    {
        return $this->end->isPast();
    }

    public function isOneDay():bool
    {
        return $this->start->isSameDay($this->end);
    }

    protected static function booted()
    {
        static::addGlobalScope(new OrderByStartAsc);

        static::creating(function ($model) {
            $model->appendYearToSlug();
        });

        static::updating(function ($model) {
            $model->appendYearToSlug();
        });
    }
    protected function setSlug()
    {
        $this->slug = \Str::slug($this->name);
    }

    public function appendYearToSlug()
    {
        $this->setSlug();
        $year = date('Y', $this->start->getTimestamp());
        // Check if the slug already ends with a 4-digit number
        if (preg_match('/-\d{4}$/', $this->slug)) {
            // Replace the year at the end of the slug
            $this->slug = preg_replace('/-\d{4}$/', "-{$year}", $this->slug);
        } else {
            // Append the year to the slug
            $this->slug = "{$this->slug}-{$year}";
        }
    }
}
