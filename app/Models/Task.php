<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * Get the attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'is_done'
    ];

    /**
     * Get the attributes that should be cast.
     */
    protected function casts(): array
    {
        return [
            'is_done' => 'boolean'
        ];
    }

    /**
     * Get active tasks
     */
    #[Scope]
    protected function active(Builder $query): void
    {
        $query->where('is_done', false);
    }

    /**
     * Get completed tasks
     */
    #[Scope]
    protected function completed(Builder $query): void
    {
        $query->where('is_done', true);
    }
}
