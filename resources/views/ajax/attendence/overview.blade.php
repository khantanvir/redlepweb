<div class="modal fade inputForm-modal" id="timeTableModal" tabindex="-1" role="dialog" aria-labelledby="inputFormModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">

        <div class="modal-header" id="inputFormModalLabel">
            <h5 class="modal-title"><b>Create Timetable</b></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
        </div>
        <form method="post" action="{{ url('create-attendence-from-overview') }}" class="mt-0">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <div class="form-group mb-4"><label for="exampleFormControlInput1">Course</label>
                                <select id="c_course_id" name="c_course_id" class="form-control" onchange="get_intake_data_for_create()">
                                    <option value="">Select Course</option>
                                    @forelse($course_list as $key => $courseRow)
                                    <option value="{{ $courseRow->id ?? '' }}">{{ $courseRow->course_name ?? '' }}</option>
                                    @empty
                                    @endforelse
                                </select>
                                @if($errors->has('c_course_id'))
                                    <span class="text-danger">{{ $errors->first('c_course_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group mb-4"><label for="exampleFormControlInput1">Intake</label>
                                <select id="c_intake_id" name="c_intake_id" class="form-control" onchange="get_group_data_for_create()">
                                    <option value="">Select Intake</option>
                                    <option value=""></option>
                                </select>
                                @if($errors->has('c_intake_id'))
                                    <span class="text-danger">{{ $errors->first('c_intake_id') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group mb-4"><label for="exampleFormControlInput1">Group</label>
                                <select id="c_group_id" name="c_group_id" class="form-control">
                                    <option value="">Select Group</option>
                                    <option value=""></option>
                                </select>
                                @if($errors->has('c_group_id'))
                                    <span class="text-danger">{{ $errors->first('c_group_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group mb-4"><label for="exampleFormControlInput1">Subject</label>
                                <select id="c_subject_id" name="c_subject_id" class="form-control" onchange="get_subject_module_for_create()">
                                    <option value="">Select Subject</option>
                                    <option value=""></option>
                                </select>
                                @if($errors->has('c_subject_id'))
                                    <span class="text-danger">{{ $errors->first('c_subject_id') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group mb-4"><label for="exampleFormControlInput1">Module No</label>
                                <select id="c_module_id" name="c_module_id" class="form-control">
                                    <option value="">Select Module</option>
                                    <option value=""></option>
                                </select>
                                @if($errors->has('c_module_id'))
                                    <span class="text-danger">{{ $errors->first('c_module_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group mb-4"><label for="exampleFormControlInput1">Location</label>
                                <select id="c_location_id" name="c_location_id" class="form-control" onchange="get_teacher_data_from_create()">
                                    <option value="">Select Location</option>
                                    @forelse ($location_list as $location)
                                    <option value="{{ $location->id ?? '' }}">{{ $location->title ?? '' }}</option>
                                    @empty

                                    @endforelse
                                </select>
                                @if($errors->has('c_location_id'))
                                    <span class="text-danger">{{ $errors->first('c_location_id') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group mb-4"><label for="exampleFormControlInput1">Teacher</label>
                                <select id="c_teacher_id" name="c_teacher_id" class="form-control">
                                    <option value="">Select Stuff</option>
                                    <option value=""></option>
                                </select>
                                @if($errors->has('c_teacher_id'))
                                    <span class="text-danger">{{ $errors->first('c_teacher_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group mb-4"><label for="exampleFormControlInput1">Date</label>
                                <input class="form-control" type="date" name="schedule_date" value="" id="schedule_date" />
                                @if($errors->has('schedule_date'))
                                    <span class="text-danger">{{ $errors->first('schedule_date') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group mb-4"><label for="exampleFormControlInput1">Start Time</label>
                                <input class="form-control" type="time" name="time_from" value="" id="time_from" />
                                @if($errors->has('time_from'))
                                    <span class="text-danger">{{ $errors->first('time_from') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group mb-4"><label for="exampleFormControlInput1">End Time</label>
                                <input class="form-control" type="time" name="time_to" value="" id="time_to" />
                                @if($errors->has('time_to'))
                                    <span class="text-danger">{{ $errors->first('time_to') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group mb-4"><label for="exampleFormControlInput1">Floor</label>
                                <input class="form-control" type="text" name="floor" value="" id="floor" />
                                @if($errors->has('floor'))
                                    <span class="text-danger">{{ $errors->first('floor') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group mb-4"><label for="exampleFormControlInput1">Room No</label>
                                <input class="form-control" type="text" name="room_no" value="" id="room_no" />
                                @if($errors->has('room_no'))
                                    <span class="text-danger">{{ $errors->first('room_no') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-light-danger mt-2 mb-2 btn-no-effect" data-bs-dismiss="modal">Cancel</a>
                <button type="submit" class="btn btn-primary mt-2 mb-2 btn-no-effect" data-bs-dismiss="modal">Confirm</button>
            </div>
        </form>
      </div>
    </div>
</div>
<div class="modal fade inputForm-modal" id="groupModal" tabindex="-1" role="dialog" aria-labelledby="inputFormModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">

        <div class="modal-header" id="inputFormModalLabel">
            <h5 class="modal-title"><b>Create Group</b></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
        </div>
        <form method="post" action="{{ url('create-group-from-timetable') }}" class="mt-0">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <div class="col">
                        <div class="form-group mb-4"><label for="exampleFormControlInput1">Course</label>
                            <select id="g_course_id" name="g_course_id" class="form-control" onchange="get_intake_data_from_group()">
                                <option value="">Select Course</option>
                                @forelse($course_list as $key => $courseRow)
                                <option value="{{ $courseRow->id ?? '' }}">{{ $courseRow->course_name ?? '' }}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group mb-4"><label for="exampleFormControlInput1">Intake</label>
                            <select id="g_intake_id" name="g_intake_id" class="form-control">
                                <option value="">Select Intake</option>
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="form-group mb-4"><label for="exampleFormControlInput1">Group Name</label>
                            <input type="text" name="g_group_name" class="form-control" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-light-danger mt-2 mb-2 btn-no-effect" data-bs-dismiss="modal">Cancel</a>
                <button type="submit" class="btn btn-primary mt-2 mb-2 btn-no-effect" data-bs-dismiss="modal">Confirm</button>
            </div>
        </form>
      </div>
    </div>
</div>
<script>
    function get_intake_data_from_group(){
        var getId = $('#g_course_id').val();
        $.get('{{ URL::to('get-intake-data-from-attendence') }}/'+getId,function(data,status){
            if(data['result']['key']===200){
                console.log(data['result']['val']);
                $('#g_intake_id').html(data['result']['val']);
            }
        });
    }
</script>
