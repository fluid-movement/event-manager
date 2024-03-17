<?php

namespace App\Models;

use App\Models\Scopes\OrderByName;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Group extends Model
{
    use HasFactory, hasUuids;

    protected $guarded = ['id'];

    protected $appends = ['link'];

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->withPivot('role');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function getLinkAttribute(): string
    {
        return route('groups.show', $this->slug);
    }

    protected static function booted()
    {
        static::addGlobalScope(new OrderByName());

        static::creating(function ($model) {
            $model->setSlug();
        });

        static::updating(function ($model) {
            $model->setSlug();
        });
    }

    protected function setSlug(): void
    {
        $this->slug = \Str::slug($this->name);
    }
}
