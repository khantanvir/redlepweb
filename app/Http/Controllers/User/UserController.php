<?php

namespace App\Http\Controllers\User;

use App\Events\AddNewLead;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdmissionManager\AdmissionManagerRequest;
use App\Http\Requests\AdmissionManager\EditAdmissionManagerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
Use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Login\LoginRequest;
use App\Http\Requests\Manager\CreateManagerRequest;
use App\Http\Requests\Manager\EditManagerRequest;
use App\Http\Requests\Teacher\EditTeacherRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use PharIo\Manifest\Url as ManifestUrl;
use App\Models\Setting\CompanySetting;
use App\Mail\forgotPasswordMail;
use App\Models\User;
use App\Traits\Service;
use App\Models\Campus\Campus;
use App\Models\Admission\AdmissionOfficer;
use Intervention\Image\Laravel\Facades\Image;
use App\Models\Teacher\Teacher;
use App\Http\Requests\Teacher\TeacherCreateRequest;
use App\Models\Agent\Company;
use App\Models\Application\Application;
use App\Models\Application\ApplicationStatus;
use App\Models\Application\InterviewStatus;
use App\Models\Interviewer\Interviewer;
use App\Models\Notification\Notification;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;

class UserController extends Controller{
    use Service;
    
    public function profile_settings(){
        $data['page_title'] = 'Profile / Settings';
        $data['settings'] = true;
        $data['profile_settings'] = true;
        $data['my_data'] = User::where('id',Auth::user()->id)->first();
        return view('setting/profile_settings',$data);
    }

    public function edit_profile(){
        $data['page_title'] = 'Edit / Settings';
        $data['settings'] = true;
        $data['edit_profile'] = true;
        $data['countries'] = Service::countries();
        return view('setting/edit_profile',$data);
    }
    public function my_profile_update(Request $request){
        if(!Auth::check()){
            Session::flash('error','Login First Then Update Profile!');
            return redirect('login');
        }
        $user = User::where('id',Auth::user()->id)->first();
        $user->name = $request->name;
        $user->country = $request->country;
        $user->state = $request->state;
        $user->city = $request->city;
        $user->phone = $request->phone;
        $user->address = $request->address;
        //photo upload
        $photo = $request->photo;
        if ($request->hasFile('photo')) {
            if (File::exists(asset($user->photo))) {
                File::delete(asset($user->photo));
            }
            $ext = $photo->getClientOriginalExtension();
            $upload_path = 'backend/images/users/photo/';
            $filename = $photo->getClientOriginalName();
            $filename = Service::slug_create($filename).rand(1100, 99999).'.'.$ext;
            $image_resize = Image::read($photo->path());
                Service::createDirectory($upload_path);
                $image_resize->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('backend/images/users/photo/').$filename);
            $user->photo = 'backend/images/users/photo/'.$filename;
        }
        $user->save();
        Session::flash('success','Profile Updated Successfully!');
        return redirect('profile-settings');
    }
    
}
