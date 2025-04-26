<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * Mass assignable fields.
     */
    protected $fillable = [
        'title',
        'is_done'
    ];
}
