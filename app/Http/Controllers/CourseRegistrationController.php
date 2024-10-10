<?php

namespace App\Http\Controllers;

use App\Models\Competex\CourseRegistration;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Activitylog\Models\Activity;

use Illuminate\Support\Facades\Notification;
use App\Notifications\CourseRegisterUpdatesNotification;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class CourseRegistrationController extends Controller
{

    private $headName = 'Course Registration';
    private $routeName = 'course-registrations';
    private $permissionName = 'Course Registration';
    private $snakeName = 'course_registration';
    private $camelCase = 'courseRegistration';

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




        $defaultCount = CourseRegistration::withTrashed()->where('default', 1)->count();

        $message_error = null; // Initialize the message variable

        if ($defaultCount > 1) {
            $message_error = "Default Count is more than " . $defaultCount;
            session()->flash('message_error', $message_error);
        }

        if ($defaultCount == 0) {
            $message_error = "Please set a Default value";
            session()->flash('message_error', $message_error);
        }


        return view('back_end.competex.course_registrations.index')->with(
            [
                'headName' => $this->headName,
                'routeName' => $this->routeName,
                'permissionName' => $this->permissionName,
                'courseRegistrations' => $courseRegistrations,
                'defaultCount' => $defaultCount,
                'createdByUsers' => $createdByUsers,
                'updatedByUsers' => $updatedByUsers,
                'message_error' => $message_error,
            ]
        );
    }

    public function courseRegistrationsGet()
    {


        $defaultCount = CourseRegistration::withTrashed()->where('default', 1)->count();
        $courseRegistrations = CourseRegistration::withTrashed()->get();


        return Datatables::of(source: $courseRegistrations)
            ->setRowId(function ($courseRegistration): mixed {
                return $courseRegistration->id;
            })

            // Add row class based on condition
            ->setRowClass(function ($courseRegistration) use ($defaultCount) {
                return ($defaultCount > 1 && $courseRegistration->default == 1) ? 'text-danger' : '';
            })

            ->editColumn('cityName', function (CourseRegistration $courseRegistration) {

                return ucwords(string: $courseRegistration->cityName->city);
            })
            ->editColumn('courseName', function (CourseRegistration $courseRegistration) {

                return ucwords(string: $courseRegistration->courseName->name);
            })

            ->addColumn('action', content: function (CourseRegistration $courseRegistration) {

                $action = '
                    <div class="btn-group">
                        <button type="button" class="btn btn-info">Action</button>
                        <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown"></button>
                        <div class="dropdown-menu" role="menu">
                            <a href="' . route('course-registrations.show', encrypt($courseRegistration->id)) . '" class="ml-2" title="View Details"><i class="fa-solid fa fa-eye text-success"></i></a>
                            <a href="' . route('course-registrations.pdf', encrypt($courseRegistration->id)) . '" class="ml-2" title="View PDF"><i class="fa-solid fa-file-pdf"></i></a>
                            <a href="' . route('course-registrations.edit', encrypt($courseRegistration->id)) . '" class="ml-2" title="Edit"><i class="fa-solid fa-edit text-warning"></i></a>';
                if ($courseRegistration->deleted_at == null) {
                    $action .= '
                    <button class="mb-1 btn btn-link delete-item_delete" data-item_delete_id="' . encrypt($courseRegistration->id) . '" data-value="' . $courseRegistration->name . '" data-default="' . $courseRegistration->default . '" type="submit" title="Soft Delete"><i class="fa-solid fa-eraser text-danger"></i></button>';
                }

                $action .= '
                            <button class="mb-1 btn btn-link delete-item_delete_force" data-item_delete_force_id="' . encrypt($courseRegistration->id) . '" data-value="' . $courseRegistration->name . '" data-default="' . $courseRegistration->default . '" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal" type="submit" title="Hard Delete"><i class="fa-solid fa-trash-can text-danger"></i></button>';

                if ($courseRegistration->deleted_at) {
                    $action .= '<a href="' . route('course-registrations.restore', encrypt($courseRegistration->id)) . '" class="" title="Restore"><i class="fa-solid fa-trash-arrow-up"></i></a>';
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
    public function show($courseRegistration)
    {


        $courseRegistration = CourseRegistration::withTrashed()->find(decrypt($courseRegistration));
        $activityLog = Activity::where('subject_id', $courseRegistration->id)
            ->where('subject_type', 'App\Models\TestDemo')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('back_end.competex.course_registrations.show')->with(
            [
                'courseRegistration' => $courseRegistration,
                'activityLog' => $activityLog,
                'camelCase' => $this->camelCase,
                'headName' => $this->headName,
                'routeName' => $this->routeName,
                'permissionName' => $this->permissionName,
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($courseRegistration)
    {
        $courseRegistration = CourseRegistration::withTrashed()->find(decrypt($courseRegistration));

        return view('back_end.competex.course_registrations.edit')->with(
            [
                'courseRegistration' => $courseRegistration,
                'camelCase' => $this->camelCase,
                'headName' => $this->headName,
                'routeName' => $this->routeName,
                'permissionName' => $this->permissionName,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $id = decrypt(value: $id);
        $this->validate($request, [
            'application_status' => 'required',
            'application_update' => 'required',
        ]);
        $courseRegister = CourseRegistration::withTrashed()->find($id);


        $data = [
            'application_status' => $request->application_status,
            'application_update' => $request->application_update,
            'updated_by' => Auth::user()->id,
        ];

        $courseRegister->update($data);

        $email = $courseRegister->email;

        // start for sending specific mail
        Notification::route('mail', $email)
            ->notify(notification: new CourseRegisterUpdatesNotification($courseRegister));

        return redirect()->route('course-registrations.index')->with(
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
    public function courseRegistrationsPDF($courseRegistration)
    {
        $courseRegistration = CourseRegistration::withTrashed()->find(decrypt(value: $courseRegistration));
        $activityLog = Activity::where('subject_id', $courseRegistration->id)
            ->where('subject_type', 'App\Models\TestDemo')
            ->orderBy('created_at', 'desc')
            ->get();

        $data = [
            'courseRegistration' => $courseRegistration,
            'activityLog' => $activityLog,
            'camelCase' => $this->camelCase,
            'headName' => $this->headName,
            'routeName' => $this->routeName,
            'permissionName' => $this->permissionName,
        ];
        $pdf_name = 'Application Number COA-' . $courseRegistration->application_number;
        // return view('back_end.fixancare.services.generate_pdf.blade',compact('services','products','job_types','job_statuses','work_statuses','complaints'));

        $pdf = Pdf::loadView('back_end.competex.course_registrations.generate_pdf', data: $data)->setPaper('a4', 'portrait')->setWarnings(false);
        return $pdf->download($pdf_name . '.pdf');
    }
}
