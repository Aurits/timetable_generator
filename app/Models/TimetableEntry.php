<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimetableEntry extends Model
{
    protected $fillable = ['day', 'time_slot', 'classroom_id', 'subject_id', 'teacher_id'];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    // Check for collision before saving a new entry
    public function isColliding()
    {
        $existingEntry = self::where([
            'day' => $this->day,
            'time_slot' => $this->time_slot,
            'classroom_id' => $this->classroom_id,
        ])->where(function ($query) {
            $query->orWhere('subject_id', $this->subject_id)
                ->orWhere('teacher_id', $this->teacher_id);
        })->first();

        return $existingEntry !== null;
    }
}