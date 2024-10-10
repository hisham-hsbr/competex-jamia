<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Competex\Course;
use App\Models\Competex\CourseRegistration;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Fixancare\MobileService;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Notification;
use App\Notifications\CourseRegistrationNotification;
use Carbon\Carbon;

class FrontendDashboardController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');

    // }

    public function index()
    {
        $courses = Course::all();
        return view('front_end.welcome')->with(
            [
                // 'headName' => $this->headName,
                // 'routeName' => $this->routeName,
                // 'permissionName' => $this->permissionName,
                'courses' => $courses,
            ]
        );
    }
    public function courseRegistration($id)
    {
        $course = Course::find(decrypt($id));
        $application_number =  CourseRegistration::max(column: 'application_number') + 1;

        $countryList = Address::pluck('country');
        return view('front_end.course-registration')->with(
            [
                'course' => $course,
                'countryList' => $countryList,
                'application_number' => $application_number,
            ]
        );
    }
    public function courseRegistrationStore(Request $request)
    {

        $this->validate($request, [

            'name' => 'required',
            'dob' => 'required',
            'phone_1' => 'required',
            'city' => 'required',
            'course_id' => 'required',
            'gender' => 'required',

            'email' => 'required|email|unique:course_registrations,email',
        ]);
        $application_number =  CourseRegistration::max(column: 'application_number') + 1;
        $courseRegister = new CourseRegistration();
        $city_id = (DB::table('addresses')->where('city', $request->city)->first())->id;
        // dd($request->all());
        $courseRegister->application_number = $application_number;
        $courseRegister->name = $request->name;
        $courseRegister->last_name = $request->last_name;
        $courseRegister->dob  = $request->dob;
        $courseRegister->email  = $request->email;
        $courseRegister->phone_1  = $request->phone_1;
        $courseRegister->phone_2  = $request->phone_2;
        $courseRegister->address_id  = $city_id;
        $courseRegister->course_id  = $request->course_id;
        $courseRegister->address_detail  = $request->address_detail;
        $courseRegister->description  = $request->description;
        $courseRegister->gender  = $request->gender;


        // $courseRegister->created_by = Auth::user()->id;
        // $courseRegister->updated_by = Auth::user()->id;

        $courseRegister->save();


        $email = $courseRegister->email;
        $users = User::find(2);

        // Define the delay
        $when = Carbon::now()->addSeconds(10);

        // Send the notification with a delay
        // Notification::send($users, (new CourseRegistrationNotification($courseRegister))->delay($when));

        // start for sending specific mail
        Notification::route('mail', $email)
            ->notify(notification: new CourseRegistrationNotification($courseRegister));
        // end for sending specific mail

        return redirect()->route('front-end.index')->with(
            [
                // '' => $this->headName,
                // 'routeName' => $this->routeName,
                // 'permissionName' => $this->permissionName,
                // 'course' => $course,
                // 'countryList' => $countryList,
                'message_store' => 'Course Submitted Successfully'
            ]
        );
    }
}
