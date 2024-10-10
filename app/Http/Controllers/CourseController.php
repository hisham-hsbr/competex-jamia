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
    private $headName = 'Courses';
    private $routeName = 'courses';
    private $permissionName = 'Course';
    private $snakeName = 'course';
    private $camelCase = 'course';

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



        $defaultCount = Course::withTrashed()->where('default', 1)->count();

        $message_error = null; // Initialize the message variable

        if ($defaultCount > 1) {
            $message_error = "Default Count is more than " . $defaultCount;
            session()->flash('message_error', $message_error);
        }

        if ($defaultCount == 0) {
            $message_error = "Please set a Default value";
            session()->flash('message_error', $message_error);
        }


        return view('back_end.competex.courses.index')->with(
            [
                'headName' => $this->headName,
                'routeName' => $this->routeName,
                'permissionName' => $this->permissionName,
                'courses' => $courses,
                'defaultCount' => $defaultCount,
                'createdByUsers' => $createdByUsers,
                'updatedByUsers' => $updatedByUsers,
                'message_error' => $message_error,
            ]
        );
    }

    public function coursesGet()
    {


        $defaultCount = Course::withTrashed()->where('default', 1)->count();
        $courses = Course::withTrashed()->get();


        return Datatables::of($courses)
            ->setRowId(function ($course): mixed {
                return $course->id;
            })

            // Add row class based on condition
            ->setRowClass(function ($course) use ($defaultCount) {
                return ($defaultCount > 1 && $course->default == 1) ? 'text-danger' : '';
            })

            ->addColumn('action', function (Course $course) {

                $action = '
                    <div class="btn-group">
                        <button type="button" class="btn btn-info">Action</button>
                        <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown"></button>
                        <div class="dropdown-menu" role="menu">
                            <a href="' . route('test-demos.show', encrypt($course->id)) . '" class="ml-2" title="View Details"><i class="fa-solid fa fa-eye text-success"></i></a>
                            <a href="' . route('test-demos.pdf', encrypt($course->id)) . '" class="ml-2" title="View PDF"><i class="fa-solid fa-file-pdf"></i></a>
                            <a href="' . route('test-demos.edit', encrypt($course->id)) . '" class="ml-2" title="Edit"><i class="fa-solid fa-edit text-warning"></i></a>';
                if ($course->deleted_at == null) {
                    $action .= '
                    <button class="mb-1 btn btn-link delete-item_delete" data-item_delete_id="' . encrypt($course->id) . '" data-value="' . $course->name . '" data-default="' . $course->default . '" type="submit" title="Soft Delete"><i class="fa-solid fa-eraser text-danger"></i></button>';
                }

                $action .= '
                            <button class="mb-1 btn btn-link delete-item_delete_force" data-item_delete_force_id="' . encrypt($course->id) . '" data-value="' . $course->name . '" data-default="' . $course->default . '" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal" type="submit" title="Hard Delete"><i class="fa-solid fa-trash-can text-danger"></i></button>';

                if ($course->deleted_at) {
                    $action .= '<a href="' . route('test-demos.restore', encrypt($course->id)) . '" class="" title="Restore"><i class="fa-solid fa-trash-arrow-up"></i></a>';
                }

                $action .= '
                        </div>
                    </div>
                ';

                return $action;
            })


            ->rawColumns(['action', 'status_with_icon'])
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
