<?php

namespace App\Models\Course;

use App\Models\Course\CourseIntake;
use App\Models\Location\Location;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassSchedule extends Model{
    use HasFactory;
    public $table = "class_schedules";
    public function course(){
        return $this->belongsTo(Course::class,'course_id');
    }
    public function subject(){
        return $this->belongsTo(CourseSubject::class,'subject_id');
    }
    public function intake(){
        return $this->belongsTo(CourseIntake::class,'intake_id');
    }
    public function subject_schedule(){
        return $this->belongsTo(SubjectSchedule::class,'subject_schedule_id');
    }
    public function teacher_data(){
        return $this->belongsTo(User::class,'teacher_id');
    }
    public function creator_data(){
        return $this->belongsTo(User::class,'create_by');
    }
    public function location_data(){
        return $this->belongsTo(Location::class,'location_id');
    }
    public function group_data(){
        return $this->belongsTo(CourseGroup::class,'group_id');
    }
    public function total_students(){
        return $this->hasMany(JoinGroup::class,'group_id');
    }
    public function total_presents(){
        return $this->hasMany(AttendenceConfirmation::class,'class_schedule_id','id')->where('application_status',1);
    }
    public function total_absents(){
        return $this->hasMany(AttendenceConfirmation::class,'class_schedule_id','id')->where('application_status',2);
    }
    public function total_authorised_absents(){
        return $this->hasMany(AttendenceConfirmation::class,'class_schedule_id','id')->where('application_status',3);
    }

}
