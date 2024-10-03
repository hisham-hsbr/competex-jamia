<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Datatables;

class SettingsController extends Controller
{
    private $headName = 'Test Demo';
    private $routeName = 'test-demos';
    private $permissionName = 'Test Demo';
    private $snakeName = 'test_demo';

    public function __construct()
    {
        $this->middleware('auth');

        // $this->middleware('permission:Settings Read', ['only' => ['index']]);
        // $this->middleware('permission:Settings Create', ['only' => ['create','store']]);
        // $this->middleware('permission:Settings Edit', ['only' => ['Edit','Update']]);
        // $this->middleware('permission:Settings Delete', ['only' => ['destroy']]);

    }

    public function index()
    {
        $settingss = Settings::all();
        $createdByUsers = $settingss->sortBy('createdBy')->pluck('createdBy')->unique();
        $updatedByUsers = $settingss->sortBy('updatedBy')->pluck('updatedBy')->unique();

        return view('back_end.test.demos.index')->with(
            [
                'headName' => $this->headName,
                'routeName' => $this->routeName,
                'settingss' => $settingss,
                'createdByUsers' => $createdByUsers,
                'updatedByUsers' => $updatedByUsers,
            ]
        );
    }

    public function settingssGet()
    {

        $settingss = Settings::all();
        return Datatables::of($settingss)

            ->setRowId(function ($settings) {
                return $settings->id;
            })

            ->editColumn('status', function (Settings $settings) {

                $active = '<span style="background-color: #04AA6D;color: white;padding: 3px;width:100px;">Active</span>';
                $inActive = '<span style="background-color: #ff9800;color: white;padding: 3px;width:100px;">In Active</span>';

                $activeId = ($settings->status);

                if ($activeId == 1) {
                    $activeId = $active;
                } else {
                    $activeId = $inActive;
                }
                return $activeId;
            })


            ->editColumn('created_by', function (Settings $settings) {

                return ucwords($settings->CreatedBy->name);
            })


            ->editColumn('updated_by', function (Settings $settings) {

                return ucwords($settings->UpdatedBy->name);
            })
            ->addColumn('created_at', function (Settings $settings) {
                return $settings->created_at->format('d-M-Y h:m');
            })
            ->addColumn('updated_at', function (Settings $settings) {

                return $settings->updated_at->format('d-M-Y h:m');
            })

            ->addColumn('editLink', function (Settings $settings) {

                $editLink = '<a href="' . route('Settingss.edit', $settings->id) . '" class="ml-2"><i class="fa-solid fa-edit"></i></a>';
                return $editLink;
            })
            ->addColumn('deleteLink', function (Settings $settings) {
                $CSRFToken = "csrf_field()";
                $deleteLink = '
                        <button class="btn btn-link delete-settings" data-settings_id="' . $settings->id . '" type="submit"><i
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
            'code' => 'required|unique:settingss,code',
            'name' => 'required',
        ]);
        $settings = new Settings();


        $settings->code  = $request->code;
        $settings->name = $request->name;


        if ($request->status == 0) {
            $settings->status == 0;
        }

        $settings->status = $request->status;

        $settings->created_by = Auth::user()->id;
        $settings->updated_by = Auth::user()->id;

        $settings->save();

        return redirect()->route('settingss.index')->with(
            [
                'message_store' => 'Settings Created Successfully'
            ]
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Settings $settings)
    {
        $settings = Settings::find($settings);

        return view('back_end.test.demos.show')->with(
            [
                'settings' => $settings,
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Settings $settings)
    {
        $settings = Settings::find($settings);

        return view('back_end.test.demos.edit')->with(
            [
                'settings,' => $settings,
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
            'code' => "required|unique:settingss,code,$id",
        ]);
        $settings = Settings::find($id);


        $settings->code  = $request->code;
        $settings->name = $request->name;


        if ($request->status == 0) {
            $settings->status == 0;
        }

        $settings->status = $request->status;

        $settings->updated_by = Auth::user()->id;

        $settings->save();

        return redirect()->route('settingss.index')->with(
            [
                'message_store' => 'Settings Updated Successfully'
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $settings  = Settings::findOrFail($id);
        $settings->delete();

        return redirect()->route('settingss.index')->with(
            [
                'message_update' => 'Settings Updated Successfully'
            ]
        );
    }
}