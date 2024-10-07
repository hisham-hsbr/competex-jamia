<?php

namespace App\Http\Controllers;

use App\Models\Competex\Course;
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
        $country_list = DB::table('addresses')
            ->groupBy('country')
            ->where('status', 1)->get();
        return view('front_end.course-registration')->with(
            [
                // '' => $this->headName,
                // 'routeName' => $this->routeName,
                // 'permissionName' => $this->permissionName,
                'course' => $course,
                'country_list' => $country_list,
            ]
        );
    }
    function csdcsGet(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = DB::table('addresses')
            ->where($select, $value)
            ->groupBy($dependent)
            ->get();
        $output = '<option value="">Select ' . ucfirst($dependent) . '</option>';
        foreach ($data as $row) {
            $output .= '<option value="' . $row->$dependent . '">' . $row->$dependent . '</option>';
        }
        echo $output;
    }
}