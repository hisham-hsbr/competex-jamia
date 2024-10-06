<?php

namespace App\Http\Controllers;

use App\Models\Competex\CourseRegistration;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CourseRegistrationController extends Controller
{
    private $headName = 'Test Demo';
    private $routeName = 'test-demos';
    private $permissionName = 'Test Demo';
    private $snakeName = 'test_demo';

    public function __construct()
    {
        $this->middleware('auth');

        // $this->middleware('permission:CourseRegistration Read', ['only' => ['index']]);
        // $this->middleware('permission:CourseRegistration Create', ['only' => ['create','store']]);
        // $this->middleware('permission:CourseRegistration Edit', ['only' => ['Edit','Update']]);
        // $this->middleware('permission:CourseRegistration Delete', ['only' => ['destroy']]);

    }

    public function index()
    {
        $courseRegistrations = CourseRegistration::all();
        $createdByUsers = $courseRegistrations->sortBy('createdBy')->pluck('createdBy')->unique();
        $updatedByUsers = $courseRegistrations->sortBy('updatedBy')->pluck('updatedBy')->unique();

        return view('back_end.test.demos.index')->with(
            [
                'headName' => $this->headName,
                'routeName' => $this->routeName,
                'courseRegistrations' => $courseRegistrations,
                'createdByUsers' => $createdByUsers,
                'updatedByUsers' => $updatedByUsers,
            ]
        );
    }

    public function courseRegistrationsGet()
    {

        $courseRegistrations = CourseRegistration::all();
        return Datatables::of($courseRegistrations)

            ->setRowId(function ($courseRegistration) {
                return $courseRegistration->id;
            })

            ->editColumn('status', function (CourseRegistration $courseRegistration) {

                $active = '<span style="background-color: #04AA6D;color: white;padding: 3px;width:100px;">Active</span>';
                $inActive = '<span style="background-color: #ff9800;color: white;padding: 3px;width:100px;">In Active</span>';

                $activeId = ($courseRegistration->status);

                if ($activeId == 1) {
                    $activeId = $active;
                } else {
                    $activeId = $inActive;
                }
                return $activeId;
            })


            ->editColumn('created_by', function (CourseRegistration $courseRegistration) {

                return ucwords($courseRegistration->CreatedBy->name);
            })


            ->editColumn('updated_by', function (CourseRegistration $courseRegistration) {

                return ucwords($courseRegistration->UpdatedBy->name);
            })
            ->addColumn('created_at', function (CourseRegistration $courseRegistration) {
                return $courseRegistration->created_at->format('d-M-Y h:m');
            })
            ->addColumn('updated_at', function (CourseRegistration $courseRegistration) {

                return $courseRegistration->updated_at->format('d-M-Y h:m');
            })

            ->addColumn('editLink', function (CourseRegistration $courseRegistration) {

                $editLink = '<a href="' . route('CourseRegistrations.edit', $courseRegistration->id) . '" class="ml-2"><i class="fa-solid fa-edit"></i></a>';
                return $editLink;
            })
            ->addColumn('deleteLink', function (CourseRegistration $courseRegistration) {
                $CSRFToken = "csrf_field()";
                $deleteLink = '
                        <button class="btn btn-link delete-courseRegistration" data-courseRegistration_id="' . $courseRegistration->id . '" type="submit"><i
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
            'code' => 'required|unique:courseRegistrations,code',
            'name' => 'required',
        ]);
        $courseRegistration = new CourseRegistration();


        $courseRegistration->code  = $request->code;
        $courseRegistration->name = $request->name;


        if ($request->status == 0) {
            $courseRegistration->status == 0;
        }

        $courseRegistration->status = $request->status;

        $courseRegistration->created_by = Auth::user()->id;
        $courseRegistration->updated_by = Auth::user()->id;

        $courseRegistration->save();

        return redirect()->route('courseRegistrations.index')->with(
            [
                'message_store' => 'CourseRegistration Created Successfully'
            ]
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(CourseRegistration $courseRegistration)
    {
        $courseRegistration = CourseRegistration::find($courseRegistration);

        return view('back_end.test.demos.show')->with(
            [
                'testDemo' => $testDemo
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourseRegistration $courseRegistration)
    {
        $courseRegistration = CourseRegistration::find($courseRegistration);

        return view('back_end.test.demos.edit')->with(
            [
                'testDemo' => $testDemo
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
            'code' => "required|unique:courseRegistrations,code,$id",
        ]);
        $courseRegistration = CourseRegistration::find($id);


        $courseRegistration->code  = $request->code;
        $courseRegistration->name = $request->name;


        if ($request->status == 0) {
            $courseRegistration->status == 0;
        }

        $courseRegistration->status = $request->status;

        $courseRegistration->updated_by = Auth::user()->id;

        $courseRegistration->save();

        return redirect()->route('courseRegistrations.index')->with(
            [
                'message_store' => 'CourseRegistration Updated Successfully'
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $courseRegistration  = CourseRegistration::findOrFail($id);
        $courseRegistration->delete();

        return redirect()->route('courseRegistrations.index')->with(
            [
                'message_update' => 'CourseRegistration Updated Successfully'
            ]
        );
    }
}
