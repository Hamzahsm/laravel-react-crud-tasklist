<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [
        'id',
    ];

    protected $appends = [
        'created',
    ];

    // each task belongs to a single project
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function getCreatedAttribute()
    {
        return $this->created_at->diffForHumans();
    }
}
