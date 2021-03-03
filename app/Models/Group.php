<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'days',
        'starthour',
        'finalhour',
        'firstdate',
        'teacher_id',
        'course_id',
    ];

    public function getSchedule(){
        return "{$this->days}@{$this->starthour}-{$this->finalhour}";
    }
}
