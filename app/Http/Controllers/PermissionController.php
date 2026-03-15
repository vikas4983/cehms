<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\traits\AssignRoleOrPermission;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class PermissionController extends Controller
{
    use AssignRoleOrPermission;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = permission::allPermissions()->latest()->get();
        return view('permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Permission::firstOrCreate(['name' => $request->name], ['guard_name' => 'web', 'status' => $request->status]);
        return redirect()->back()->with('success', 'permission has been created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        $permission->update($request->all());
        return redirect()->back()->with('success', 'permission has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->destroy($permission->id);
        return redirect()->back()->with('error', 'permission has been deleted successfully');
    }

    public function assignPermission(Request $request)
    {  
       
        if (!$request->studentId || empty($request->permissions)) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
        $this->assignPermissionForUser($request->all());
        return redirect()->route('students.index')->with('success', 'Permission has been assign successfully.');
    }
}
