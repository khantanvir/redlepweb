<?php

namespace App\Models\Course;

use App\Models\course\CourseIntake;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseGroup extends Model
{
    use HasFactory;
    public function total_application(){
        return $this->hasMany(JoinGroup::class,'group_id');
    }
    public function intake_data(){
        return $this->belongsTo(CourseIntake::class,'course_intake_id');
    }

    public static function get_group_attend_percent($group_id=NULL){
        if (!$group_id) {
            return false;
        }
        $present_count = [];
        $absent_count = [];
        $leave_count = [];
        $total = 0;
        $getTotalGroupAttendance = AttendenceConfirmation::where('course_group_id', $group_id)->get();
        if ($getTotalGroupAttendance->isNotEmpty()) {
            $total = $getTotalGroupAttendance->count();

            foreach ($getTotalGroupAttendance as $row) {
                if ($row->application_status == 1) {
                    $present_count[] = $row;
                } elseif ($row->application_status == 2) {
                    $absent_count[] = $row;
                } elseif ($row->application_status == 3) {
                    $leave_count[] = $row;
                }
            }
        }
        $present_percentage = ($total > 0) ? number_format((count($present_count) / $total) * 100, 2) : number_format(0, 2);
        $absent_percentage = ($total > 0) ? number_format((count($absent_count) / $total) * 100, 2) : number_format(0, 2);
        $leave_percentage = ($total > 0) ? number_format((count($leave_count) / $total) * 100, 2) : number_format(0, 2);
        return [
            'present_percentage' => $present_percentage,
            'absent_percentage' => $absent_percentage,
            'leave_percentage' => $leave_percentage,
        ];
    }
    public function total_present(){
        return $this->hasMany(AttendenceConfirmation::class,'course_group_id')->where('application_status',1);
    }
    public function total_absent(){
        return $this->hasMany(AttendenceConfirmation::class,'course_group_id')->where('application_status',2);
    }
    public function total_authorised_absent(){
        return $this->hasMany(AttendenceConfirmation::class,'course_group_id')->where('application_status',3);
    }
    
}
