<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Classroom;
use App\Models\Subject;
use App\Models\Teacher;


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


    public function isCollidingOrUnavailable()
    {
        return $this->isColliding() ||
            !$this->isTeacherAvailable() ||
            !$this->isClassroomAvailable() ||
            !$this->isSubjectAvailable();
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

    public function isTeacherAvailable()
    {
        $teacherAvailability = Teacher::where('id', $this->teacher_id)
            ->whereDoesntHave('timetableEntries', function ($query) {
                $query->where('day', $this->day);
                if (is_array($this->time_slot)) {
                    $query->whereIn('time_slot', $this->time_slot);
                } else {
                    $query->where('time_slot', $this->time_slot);
                }
            })
            ->exists();

        return $teacherAvailability;
    }

    public function isClassroomAvailable()
    {
        $classroomAvailability = Classroom::where('id', $this->classroom_id)
            ->whereDoesntHave('timetableEntries', function ($query) {
                $query->where('day', $this->day);
                if (is_array($this->time_slot)) {
                    $query->whereIn('time_slot', $this->time_slot);
                } else {
                    $query->where('time_slot', $this->time_slot);
                }
            })
            ->exists();

        return $classroomAvailability;
    }

    public function isSubjectAvailable()
    {
        $subjectAvailability = Subject::where('id', $this->subject_id)
            ->whereDoesntHave('timetableEntries', function ($query) {
                $query->where('day', $this->day);
                if (is_array($this->time_slot)) {
                    $query->whereIn('time_slot', $this->time_slot);
                } else {
                    $query->where('time_slot', $this->time_slot);
                }
            })
            ->exists();

        return $subjectAvailability;
    }
}
