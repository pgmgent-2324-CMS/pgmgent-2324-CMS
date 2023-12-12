<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Teacher extends Model
{
    use HasFactory;

    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class);
    }

    public function getFullName() : string {
        return $this->firstname . ' ' . $this->lastname;
    }
}
