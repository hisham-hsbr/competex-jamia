<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\TestDemo;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Activitylog\Models\Activity;
use App\Http\Requests\TestDemo\StoreAndUpdateTestDemoRequest;

class TestDemoController extends Controller
{
    private $headName = 'Test Demos';
    private $routeName = 'test-demos';
    private $permissionName = 'Test Demo';
    private $snakeName = 'test_demo';
    private $camelCase = 'testDemo';

    public function __construct()
    {
        $this->middleware('auth');

        // $this->middleware('permission:TestDemo Read', ['only' => ['index']]);
        // $this->middleware('permission:TestDemo Create', ['only' => ['create','store']]);
        // $this->middleware('permission:TestDemo Edit', ['only' => ['Edit','Update']]);
        // $this->middleware('permission:TestDemo Delete', ['only' => ['destroy']]);

    }

    public function demo1()
    {
        $users = User::all();
        // $users = User::active()->get();
        return view('back_end.test.demo1')->with(
            [
                'headName' => $this->headName,
                'routeName' => $this->routeName,
                'permissionName' => $this->permissionName,
                'users' => $users,
            ]
        );
    }
    public function index()
    {
        $testDemos = TestDemo::all();
        $createdByUsers = $testDemos->sortBy('created_by')->pluck('created_by')->unique();
        $updatedByUsers = $testDemos->sortBy('updated_by')->pluck('updated_by')->unique();



        $defaultCount = TestDemo::withTrashed()->where('default', 1)->count();

        $message_error = null; // Initialize the message variable

        if ($defaultCount > 1) {
            $message_error = "Default Count is more than " . $defaultCount;
            session()->flash('message_error', $message_error);
        }

        if ($defaultCount == 0) {
            $message_error = "Please set a Default value";
            session()->flash('message_error', $message_error);
        }


        return view('back_end.test.demos.index')->with(
            [
                'headName' => $this->headName,
                'routeName' => $this->routeName,
                'permissionName' => $this->permissionName,
                'testDemos' => $testDemos,
                'defaultCount' => $defaultCount,
                'createdByUsers' => $createdByUsers,
                'updatedByUsers' => $updatedByUsers,
                'message_error' => $message_error,
            ]
        );
    }

    public function testDemosGet()
    {

        // $testDemos = TestDemo::active()->get();
        // $testDemos = TestDemo::all();
        // Calculate the default count
        $defaultCount = TestDemo::withTrashed()->where('default', 1)->count();
        $testDemos = TestDemo::withTrashed()->get();


        return Datatables::of($testDemos)
            ->setRowId(function ($testDemo) {
                return $testDemo->id;
            })

            // Add row class based on condition
            ->setRowClass(function ($testDemo) use ($defaultCount) {
                return ($defaultCount > 1 && $testDemo->default == 1) ? 'text-danger' : '';
            })

            ->addColumn('action', function (TestDemo $testDemo) {

                $action = '
                    <div class="btn-group">
                        <button type="button" class="btn btn-info">Action</button>
                        <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown"></button>
                        <div class="dropdown-menu" role="menu">
                            <a href="' . route('test-demos.show', encrypt($testDemo->id)) . '" class="ml-2" title="View Details"><i class="fa-solid fa fa-eye text-success"></i></a>
                            <a href="' . route('test-demos.pdf', encrypt($testDemo->id)) . '" class="ml-2" title="View PDF"><i class="fa-solid fa-file-pdf"></i></a>
                            <a href="' . route('test-demos.edit', encrypt($testDemo->id)) . '" class="ml-2" title="Edit"><i class="fa-solid fa-edit text-warning"></i></a>';
                if ($testDemo->deleted_at == null) {
                    $action .= '
                    <button class="mb-1 btn btn-link delete-item_delete" data-item_delete_id="' . encrypt($testDemo->id) . '" data-value="' . $testDemo->name . '" data-default="' . $testDemo->default . '" type="submit" title="Soft Delete"><i class="fa-solid fa-eraser text-danger"></i></button>';
                }

                $action .= '
                            <button class="mb-1 btn btn-link delete-item_delete_force" data-item_delete_force_id="' . encrypt($testDemo->id) . '" data-value="' . $testDemo->name . '" data-default="' . $testDemo->default . '" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal" type="submit" title="Hard Delete"><i class="fa-solid fa-trash-can text-danger"></i></button>';

                if ($testDemo->deleted_at) {
                    $action .= '<a href="' . route('test-demos.restore', encrypt($testDemo->id)) . '" class="" title="Restore"><i class="fa-solid fa-trash-arrow-up"></i></a>';
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


    public function create()
    {
        return view('back_end.test.demos.create')->with(

            [
                'headName' => $this->headName,
                'routeName' => $this->routeName,
                'permissionName' => $this->permissionName,
            ]
        );
    }

    public function store(StoreAndUpdateTestDemoRequest $request)
    {
        $testDemo = new TestDemo();


        $testDemo->code  = $request->code;
        $testDemo->name = $request->name;
        $testDemo->local_name = $request->local_name;

        if ($request->default) {
            TestDemo::where('default', 1)->update(['default' => null]);
        }

        $testDemo->default = $request->default;
        // checking default -->


        if ($request->status == 0) {
            $testDemo->status == 0;
        }

        $testDemo->status = $request->status;

        $testDemo->created_by = Auth::user()->id;
        $testDemo->updated_by = Auth::user()->id;

        $testDemo->save();

        return redirect()->route('test-demos.index')->with(
            [
                'message_store' => 'TestDemo Created Successfully'
            ]
        );
    }

    public function show($testDemo)
    {


        $testDemo = TestDemo::withTrashed()->find(decrypt($testDemo));
        $activityLog = Activity::where('subject_id', $testDemo->id)
            ->where('subject_type', 'App\Models\TestDemo')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('back_end.test.demos.show')->with(
            [
                'testDemo' => $testDemo,
                'activityLog' => $activityLog,
                'camelCase' => $this->camelCase,
                'headName' => $this->headName,
                'routeName' => $this->routeName,
                'permissionName' => $this->permissionName,
            ]
        );
    }

    public function edit($testDemo)
    {
        $testDemo = TestDemo::withTrashed()->find(decrypt($testDemo));

        return view('back_end.test.demos.edit')->with(
            [
                'headName' => $this->headName,
                'routeName' => $this->routeName,
                'permissionName' => $this->permissionName,
                'testDemo' => $testDemo
            ]
        );
    }
    public function check()
    {
        // $testDemo = TestDemo::withTrashed()->all();

        $defaultCount = TestDemo::withTrashed()->where('default', 1)->count();
        $default_more_than = null; // Initialize the message variable
        $default_not_set = null; // Initialize the message variable

        if ($defaultCount > 1) {
            $default_more_than = "Default Count is more than " . $defaultCount;
        }
        if ($defaultCount == 0) {
            // TestDemo::where('status', 1)->limit(1)->update(['default' => 1]);


            $default_not_set = "Not set Default value";
        }
        // return redirect()->route('test-demos.check')->with(
        return view('back_end.test.demos.check')->with(
            [
                'headName' => $this->headName,
                'routeName' => $this->routeName,
                'permissionName' => $this->permissionName,
                'message_store' => 'TestDemo Updated Successfully',
                'default_more_than' => $default_more_than,
                'default_not_set' => $default_not_set,
            ]
        );
    }

    public function update(StoreAndUpdateTestDemoRequest $request, $id)
    {
        $id = decrypt($id);
        $testDemo = TestDemo::withTrashed()->find($id);

        $testDemo->code  = $request->code;
        $testDemo->name = $request->name;
        $testDemo->local_name = $request->local_name;

        if ($request->default == 0) {
            $testDemo->default = 0;
        } else {
            TestDemo::withTrashed()->where('default', 1)->update(['default' => null]);
        }

        $testDemo->default = $request->default;


        if ($request->status == 0) {
            $testDemo->status == 0;
        }

        $testDemo->status = $request->status;

        $testDemo->updated_by = Auth::user()->id;
        $testDemo->save();
        // dd($testDemo);

        $defaultCount = TestDemo::withTrashed()->where('default', 1)->count();
        $message_error = null; // Initialize the message variable
        $message_warning = null; // Initialize the message variable

        if ($defaultCount > 1) {
            $message_error = "Default Count is more than " . $defaultCount;
        }
        if ($defaultCount == 0) {
            TestDemo::where('status', 1)->limit(1)->update(['default' => 1]);


            $message_warning = "Default value Automatic Selected first Active One";
        }
        return redirect()->route('test-demos.index')->with(
            [
                'message_store' => 'TestDemo Updated Successfully',
                'message_error' => $message_error,
                'message_warning' => $message_warning,
            ]
        );
    }

    public function destroy($id)
    {
        // Decrypt the ID and find the TestDemo model
        $testDemo = TestDemo::findOrFail(decrypt($id));

        if (is_null($testDemo->default)) {
            $testDemo->delete();
            return redirect()->route('test-demos.index')->with('message_update', 'TestDemo Soft Deleted Successfully');
        }

        return back()->withErrors(['default' => 'Please change the Default value before "Soft Deleting".']);
    }
    public function forceDestroy($id)
    {

        // $testDemo  = TestDemo::findOrFail(decrypt($id));
        // $testDemo->forceDelete();

        // return redirect()->route('test-demos.index')->with(
        //     [
        //         'message_update' => 'TestDemo Force Delete Successfully'
        //     ]
        // );


        // Decrypt the ID and find the TestDemo model
        $testDemo = TestDemo::withTrashed()->findOrFail(decrypt($id));

        if (is_null($testDemo->default)) {
            $testDemo->forceDelete();
            return redirect()->route('test-demos.index')->with('message_update', 'TestDemo Hard Deleted Successfully');
        }

        return back()->withErrors(['default' => 'Please change the Default value before "Hard Deleting".']);
    }
    public function restore($id)
    {

        $testDemo  = TestDemo::withTrashed()->findOrFail(decrypt($id));
        $testDemo->restore();
        return redirect()->route('test-demos.index')->with(
            [
                'message_update' => 'TestDemo Restored Successfully'
            ]
        );
    }
}
