<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $fillable = ['name', /* Add other attributes here */];

    public function timetableEntries()
    {
        return $this->hasMany(TimetableEntry::class);
    }
}