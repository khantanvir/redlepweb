<div class="modal fade inputForm-modal" id="changeSchedule" tabindex="-1" role="dialog" aria-labelledby="inputFormModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">

        <div class="modal-header" id="inputFormModalLabel">
            <h5 class="modal-title"><b>Change Class Schedule Date Time</b></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
        </div>
        <form method="post" action="{{ url('change-time-schedule') }}" class="mt-0">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <div class="col">
                        <input type="hidden" name="schedule_id" value="{{ $schedule->id ?? '' }}" />
                        <div class="form-group mb-4"><label for="exampleFormControlInput1">Schedule Date</label>
                            <input type="date" class="form-control" name="schedule_date" value="{{ $schedule->schedule_date ?? '' }}" />
                        </div>
                        <div class="form-group mb-4"><label for="exampleFormControlInput1">Time From</label>
                            <input type="time" class="form-control" name="time_from" value="{{ $schedule->time_from ?? '' }}" />
                        </div>
                        <div class="form-group mb-4"><label for="exampleFormControlInput1">Time To</label>
                            <input type="time" class="form-control" name="time_to" value="{{ $schedule->time_to ?? '' }}" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-light-danger mt-2 mb-2 btn-no-effect" data-bs-dismiss="modal">Cancel</a>
                <button type="submit" class="btn btn-primary mt-2 mb-2 btn-no-effect" data-bs-dismiss="modal">Submit</button>
            </div>
        </form>
      </div>
    </div>
</div>
<div class="modal fade inputForm-modal" id="noticeModal" tabindex="-1" role="dialog" aria-labelledby="inputFormModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">

        <div class="modal-header" id="inputFormModalLabel">
            <h5 class="modal-title"><b>Update Notice</b></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
        </div>
        <form method="post" action="{{ url('notice-data-post-from-details') }}" class="mt-0">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <div class="col">
                        <input type="hidden" name="schedule_id" value="{{ $schedule->id ?? '' }}" />
                        <div class="form-group mb-4"><label for="exampleFormControlInput1">Notice Text</label>
                            <textarea class="form-control" name="notice_text">{{ $schedule->notice ?? '' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-light-danger mt-2 mb-2 btn-no-effect" data-bs-dismiss="modal">Cancel</a>
                <button type="submit" class="btn btn-primary mt-2 mb-2 btn-no-effect" data-bs-dismiss="modal">Submit</button>
            </div>
        </form>
      </div>
    </div>
</div>
<div class="modal fade inputForm-modal" id="noteModal" tabindex="-1" role="dialog" aria-labelledby="inputFormModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">

        <div class="modal-header" id="inputFormModalLabel">
            <h5 class="modal-title"><b>Update Note</b></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
        </div>
        <form method="post" action="{{ url('note-data-post-from-details') }}" class="mt-0">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <div class="col">
                        <input type="hidden" name="note_schedule_id" value="{{ $schedule->id ?? '' }}" />
                        <div class="form-group mb-4"><label for="exampleFormControlInput1">Note Text</label>
                            <textarea class="form-control" name="note_text">{{ $schedule->note ?? '' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-light-danger mt-2 mb-2 btn-no-effect" data-bs-dismiss="modal">Cancel</a>
                <button type="submit" class="btn btn-primary mt-2 mb-2 btn-no-effect" data-bs-dismiss="modal">Submit</button>
            </div>
        </form>
      </div>
    </div>
</div>