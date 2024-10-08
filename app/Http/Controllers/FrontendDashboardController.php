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

class FrontendDashboardController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');

    // }
    public function trackSearchJob()
    {

        $track_test = $_GET['job_number'];

        $job_numbers = MobileService::where('job_number', 'LIKE', $track_test)->get();
        if ($track_test == "") {

            return view('front_end.tr');
        } else {
            return view('front_end.track', compact('job_numbers'));
        }
    }
    public function trackSearchPhone()
    {

        $track_test = $_GET['phone_number'];

        $phone_numbers = MobileService::where('contact_number', 'LIKE', $track_test)->get();
        if ($track_test == "") {

            return view('front_end.tr');
        } else {
            return view('front_end.track', compact('phone_numbers'));
        }
    }
    public function portfolioDetails($id)
    {
        $image = Image::find($id);
        return view('front_end.portfolio-details', compact('image'));
    }
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
        $countryList = Address::pluck('country');
        return view('front_end.course-registration')->with(
            [
                // '' => $this->headName,
                // 'routeName' => $this->routeName,
                // 'permissionName' => $this->permissionName,
                'course' => $course,
                'countryList' => $countryList,
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
        $courseRegister = new CourseRegistration();
        $city_id = (DB::table('addresses')->where('city', $request->city)->first())->id;
        // dd($request->all());
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