<?php

namespace App\Http\Controllers;

use App\Models\TestDemo;
use App\Models\UserSettings;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserSettingsController extends Controller
{
    private $headName = 'Test Demo';
    private $routeName = 'test-demos';
    private $permissionName = 'Test Demo';
    private $snakeName = 'test_demo';

    public function __construct()
    {
        $this->middleware('auth');

        // $this->middleware('permission:UserSettings Read', ['only' => ['index']]);
        // $this->middleware('permission:UserSettings Create', ['only' => ['create','store']]);
        // $this->middleware('permission:UserSettings Edit', ['only' => ['Edit','Update']]);
        // $this->middleware('permission:UserSettings Delete', ['only' => ['destroy']]);

    }

    public function index()
    {
        $userSettingss = UserSettings::all();
        $createdByUsers = $userSettingss->sortBy('createdBy')->pluck('createdBy')->unique();
        $updatedByUsers = $userSettingss->sortBy('updatedBy')->pluck('updatedBy')->unique();

        return view('back_end.test.demos.index')->with(
            [
                'headName' => $this->headName,
                'routeName' => $this->routeName,
                'userSettingss' => $userSettingss,
                'createdByUsers' => $createdByUsers,
                'updatedByUsers' => $updatedByUsers,
            ]
        );
    }

    public function userSettingssGet()
    {

        $userSettingss = UserSettings::all();
        return Datatables::of($userSettingss)

            ->setRowId(function ($userSettings) {
                return $userSettings->id;
            })

            ->editColumn('status', function (UserSettings $userSettings) {

                $active = '<span style="background-color: #04AA6D;color: white;padding: 3px;width:100px;">Active</span>';
                $inActive = '<span style="background-color: #ff9800;color: white;padding: 3px;width:100px;">In Active</span>';

                $activeId = ($userSettings->status);

                if ($activeId == 1) {
                    $activeId = $active;
                } else {
                    $activeId = $inActive;
                }
                return $activeId;
            })


            ->editColumn('created_by', function (UserSettings $userSettings) {

                return ucwords($userSettings->CreatedBy->name);
            })


            ->editColumn('updated_by', function (UserSettings $userSettings) {

                return ucwords($userSettings->UpdatedBy->name);
            })
            ->addColumn('created_at', function (UserSettings $userSettings) {
                return $userSettings->created_at->format('d-M-Y h:m');
            })
            ->addColumn('updated_at', function (UserSettings $userSettings) {

                return $userSettings->updated_at->format('d-M-Y h:m');
            })

            ->addColumn('editLink', function (UserSettings $userSettings) {

                $editLink = '<a href="' . route('UserSettingss.edit', $userSettings->id) . '" class="ml-2"><i class="fa-solid fa-edit"></i></a>';
                return $editLink;
            })
            ->addColumn('deleteLink', function (UserSettings $userSettings) {
                $CSRFToken = "csrf_field()";
                $deleteLink = '
                        <button class="btn btn-link delete-userSettings" data-userSettings_id="' . $userSettings->id . '" type="submit"><i
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
            'code' => 'required|unique:userSettingss,code',
            'name' => 'required',
        ]);
        $userSettings = new UserSettings();


        $userSettings->code  = $request->code;
        $userSettings->name = $request->name;


        if ($request->status == 0) {
            $userSettings->status == 0;
        }

        $userSettings->status = $request->status;

        $userSettings->created_by = Auth::user()->id;
        $userSettings->updated_by = Auth::user()->id;

        $userSettings->save();

        return redirect()->route('userSettingss.index')->with(
            [
                'message_store' => 'UserSettings Created Successfully'
            ]
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(UserSettings $userSettings)
    {
        $userSettings = UserSettings::find($userSettings);
        $testDemo = TestDemo::all();

        return view('back_end.test.demos.show')->with(
            [
                'testDemo' => $testDemo
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserSettings $userSettings)
    {
        $userSettings = UserSettings::find($userSettings);
        $testDemo = TestDemo::all();

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
            'code' => "required|unique:userSettingss,code,$id",
        ]);
        $userSettings = UserSettings::find($id);


        $userSettings->code  = $request->code;
        $userSettings->name = $request->name;


        if ($request->status == 0) {
            $userSettings->status == 0;
        }

        $userSettings->status = $request->status;

        $userSettings->updated_by = Auth::user()->id;

        $userSettings->save();

        return redirect()->route('userSettingss.index')->with(
            [
                'message_store' => 'UserSettings Updated Successfully'
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $userSettings  = UserSettings::findOrFail($id);
        $userSettings->delete();

        return redirect()->route('userSettingss.index')->with(
            [
                'message_update' => 'UserSettings Updated Successfully'
            ]
        );
    }
}