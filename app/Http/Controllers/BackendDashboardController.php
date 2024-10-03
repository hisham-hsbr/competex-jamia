<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class BackendDashboardController extends Controller
{
    private $headName = 'Dashboard';
    private $routeName = 'dashboard';
    private $permissionName = 'Dashboard';
    private $snakeName = 'users';
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        return view('back_end.dashboard')->with(
            [
                'headName' => $this->headName,
                'routeName' => $this->routeName,
                'permissionName' => $this->permissionName,
                'users' => $users,
            ]
        );
    }
    public function fetchUsers()
    {
        // $users = User::all();
        $users = User::count();
        return response()->json([
            'users' => $users,
        ]);
    }
}
