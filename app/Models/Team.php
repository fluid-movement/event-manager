<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Team extends Model
{
    use HasFactory, HasUuids;

    public $guarded = [];

    protected $with = ['players'];

    public function players(): BelongsToMany
    {
        return $this->belongsToMany(Player::class);
    }

    public function result(): BelongsTo
    {
        return $this->belongsTo(Result::class);
    }
}
