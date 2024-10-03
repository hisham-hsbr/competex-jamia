<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Spatie\Activitylog\Models\Activity;

class ActivitylogController extends Controller
{
    private $headName = 'Activity Logs';
    private $routeName = 'activity-logs';
    private $permissionName = 'Activity Log';
    private $snakeName = 'activity_log';
    private $camelCase = 'activityLog';
    public function __construct()
    {
        $this->middleware('auth');

        // $this->middleware('permission:Permission Read', ['only' => ['index']]);
        // $this->middleware('permission:Permission Create', ['only' => ['create','store']]);
        // $this->middleware('permission:Permission Edit', ['only' => ['Edit','Update']]);
        // $this->middleware('permission:Permission Delete', ['only' => ['destroy']]);

    }

    public function index()
    {
        $activityLogs = Activity::all();
        return view('back_end.users_management.activity-log.index')->with(
            [
                'headName' => $this->headName,
                'routeName' => $this->routeName,
                'permissionName' => $this->permissionName,
                'activityLogs' => $activityLogs,
            ]
        );
    }
    public function show($id)
    {
        $activityLog = Activity::find($id);
        // dd($activityLog);
        $users = User::all();
        return view('back_end.users_management.activity-log.show')->with(
            [
                'headName' => $this->headName,
                'routeName' => $this->routeName,
                'permissionName' => $this->permissionName,
                'activityLog' => $activityLog,
                'users' => $users,
            ]
        );
    }
    public function activityLogsGet()
    {

        $activity = Activity::all();
        return Datatables::of($activity)

            ->setRowId(function ($activity) {
                return $activity->id;
            })


            ->editColumn('created_user', function (Activity $activity) {

                return ucwords($activity->activityUser->name);
            })
            ->addColumn('viewLink', function (Activity $activity) {

                $viewLink = '<a href="' . route('activity-logs.show', $activity->id) . '" class="ml-2"><i class="fa-solid fa fa-eye"></i></a>';
                return $viewLink;
            })

            ->rawColumns(['status', 'viewLink', 'created_user'])
            ->toJson();
    }
}
