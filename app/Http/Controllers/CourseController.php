<?php

namespace App\Http\Controllers;

use App\Models\Competex\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CourseController extends Controller
{
    private $headName = 'Test Demo';
    private $routeName = 'test-demos';
    private $permissionName = 'Test Demo';
    private $snakeName = 'test_demo';

    public function __construct()
    {
        $this->middleware('auth');

        // $this->middleware('permission:Course Read', ['only' => ['index']]);
        // $this->middleware('permission:Course Create', ['only' => ['create','store']]);
        // $this->middleware('permission:Course Edit', ['only' => ['Edit','Update']]);
        // $this->middleware('permission:Course Delete', ['only' => ['destroy']]);

    }

    public function index()
    {
        $courses = Course::all();
        $createdByUsers = $courses->sortBy('createdBy')->pluck('createdBy')->unique();
        $updatedByUsers = $courses->sortBy('updatedBy')->pluck('updatedBy')->unique();

        return view('back_end.test.demos.index')->with(
            [
                'headName' => $this->headName,
                'routeName' => $this->routeName,
                'courses' => $courses,
                'createdByUsers' => $createdByUsers,
                'updatedByUsers' => $updatedByUsers,
            ]
        );
    }

    public function coursesGet()
    {

        $courses = Course::all();
        return Datatables::of($courses)

            ->setRowId(function ($course) {
                return $course->id;
            })

            ->editColumn('status', function (Course $course) {

                $active = '<span style="background-color: #04AA6D;color: white;padding: 3px;width:100px;">Active</span>';
                $inActive = '<span style="background-color: #ff9800;color: white;padding: 3px;width:100px;">In Active</span>';

                $activeId = ($course->status);

                if ($activeId == 1) {
                    $activeId = $active;
                } else {
                    $activeId = $inActive;
                }
                return $activeId;
            })


            ->editColumn('created_by', function (Course $course) {

                return ucwords($course->CreatedBy->name);
            })


            ->editColumn('updated_by', function (Course $course) {

                return ucwords($course->UpdatedBy->name);
            })
            ->addColumn('created_at', function (Course $course) {
                return $course->created_at->format('d-M-Y h:m');
            })
            ->addColumn('updated_at', function (Course $course) {

                return $course->updated_at->format('d-M-Y h:m');
            })

            ->addColumn('editLink', function (Course $course) {

                $editLink = '<a href="' . route('Courses.edit', $course->id) . '" class="ml-2"><i class="fa-solid fa-edit"></i></a>';
                return $editLink;
            })
            ->addColumn('deleteLink', function (Course $course) {
                $CSRFToken = "csrf_field()";
                $deleteLink = '
                        <button class="btn btn-link delete-course" data-course_id="' . $course->id . '" type="submit"><i
                                class="fa-solid fa-trash-can text-danger"></i>
                        </button>';
                return $deleteLink;
            })


            ->rawColumns(['status', 'editLink', 'deleteLink'])
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back_end.test.demos.create')->with(
            []
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'code' => 'required|unique:courses,code',
            'name' => 'required',
        ]);
        $course = new Course();


        $course->code  = $request->code;
        $course->name = $request->name;


        if ($request->status == 0) {
            $course->status == 0;
        }

        $course->status = $request->status;

        $course->created_by = Auth::user()->id;
        $course->updated_by = Auth::user()->id;

        $course->save();

        return redirect()->route('courses.index')->with(
            [
                'message_store' => 'Course Created Successfully'
            ]
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        $course = Course::find($course);

        return view('back_end.test.demos.show')->with(
            [
                'course' => $course,
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        $course = Course::find($course);

        return view('back_end.test.demos.edit')->with(
            [
                'course' => $course
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'code' => "required|unique:courses,code,$id",
        ]);
        $course = Course::find($id);


        $course->code  = $request->code;
        $course->name = $request->name;


        if ($request->status == 0) {
            $course->status == 0;
        }

        $course->status = $request->status;

        $course->updated_by = Auth::user()->id;

        $course->save();

        return redirect()->route('courses.index')->with(
            [
                'message_store' => 'Course Updated Successfully'
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $course  = Course::findOrFail($id);
        $course->delete();

        return redirect()->route('courses.index')->with(
            [
                'message_update' => 'Course Updated Successfully'
            ]
        );
    }
}
