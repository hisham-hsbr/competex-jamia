<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DeveloperController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth');

        // $this->middleware('permission:Developer Read', ['only' => ['index']]);
        // $this->middleware('permission:Developer Create', ['only' => ['create','store']]);
        // $this->middleware('permission:Developer Edit', ['only' => ['Edit','Update']]);
        // $this->middleware('permission:Developer Delete', ['only' => ['destroy']]);

    }

    public function index()
    {
        $_developers = Developer::all();
        // $createdByUsers = ${{ _modelVariable }}s->sortBy('createdBy')->pluck('createdBy')->unique();
        // $updatedByUsers = ${{ _modelVariable }}s->sortBy('updatedBy')->pluck('updatedBy')->unique();
        // return view('folder.{{ _modelVariable }}s.index',compact('{{ _modelVariable }}s','createdByUsers','updatedByUsers'))->with('i');
    }

    public function developersGet()
    {

        $developers = Developer::all();
        return Datatables::of($developers)

            ->setRowId(function ($developer) {
                return $developer->id;
            })

            ->editColumn('status', function (Developer $developer) {

                $active = '<span style="background-color: #04AA6D;color: white;padding: 3px;width:100px;">Active</span>';
                $inActive = '<span style="background-color: #ff9800;color: white;padding: 3px;width:100px;">In Active</span>';

                $activeId = ($developer->status);

                if ($activeId == 1) {
                    $activeId = $active;
                } else {
                    $activeId = $inActive;
                }
                return $activeId;
            })


            ->editColumn('created_by', function (Developer $developer) {

                return ucwords($developer->CreatedBy->name);
            })


            ->editColumn('updated_by', function (Developer $developer) {

                return ucwords($developer->UpdatedBy->name);
            })
            ->addColumn('created_at', function (Developer $developer) {
                return $developer->created_at->format('d-M-Y h:m');
            })
            ->addColumn('updated_at', function (Developer $developer) {

                return $developer->updated_at->format('d-M-Y h:m');
            })

            ->addColumn('editLink', function (Developer $developer) {

                $editLink = '<a href="' . route('Developers.edit', $developer->id) . '" class="ml-2"><i class="fa-solid fa-edit"></i></a>';
                return $editLink;
            })
            ->addColumn('deleteLink', function (Developer $developer) {
                $CSRFToken = "csrf_field()";
                $deleteLink = '
                        <button class="btn btn-link delete-developer" data-developer_id="' . $developer->id . '" type="submit"><i
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
        return view('folder.developers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'code' => 'required|unique:developers,code',
            'name' => 'required',
        ]);
        $developer = new Developer();


        $developer->code  = $request->code;
        $developer->name = $request->name;


        if ($request->status == 0) {
            $developer->status == 0;
        }

        $developer->status = $request->status;

        $developer->created_by = Auth::user()->id;
        $developer->updated_by = Auth::user()->id;

        $developer->save();

        return redirect()->route('developers.index')
            ->with('message_store', 'Developer Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Developer $developer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $developers = Developer::find($id);
        return view('folder.developers.edit', compact('developers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'code' => "required|unique:developers,code,$id",
        ]);
        $developer = Developer::find($id);


        $developer->code  = $request->code;
        $developer->name = $request->name;


        if ($request->status == 0) {
            $developer->status == 0;
        }

        $developer->status = $request->status;

        $developer->updated_by = Auth::user()->id;

        $developer->save();

        return redirect()->route('developers.index')
            ->with('message_store', 'Developer Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $developer  = Developer::findOrFail($id);
        $developer->delete();

        return redirect()->route('developers.index')->with('message_update', 'Developer Deleted Successfully');
    }
}
