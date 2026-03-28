<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Permission as ModelsPermission;
use App\Models\Role;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Stmt\TryCatch;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public static function middleware(): array
    {
        return [new Middleware('permission:view-role', ['only' => ['index', 'show']]), new Middleware('permission:create-role', ['only' => ['create', 'store']]), new Middleware('permission:edit-role', ['only' => ['edit', 'update']]), new Middleware('permission:delete-role', ['only' => ['destroy']])];
    }
    public function index()
    {
        $roles = Role::active()->get();
        $permissions = Permission::active()->get();
        $groupedPermissions = $permissions->groupBy(function ($permission) {
            return explode('-', $permission->name)[1];
        });

        return view('roles.index', compact('roles', 'groupedPermissions', 'permissions'));
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
        DB::beginTransaction();
        try {
            $role = Role::create([
                'name' => $request->name,
                'guard_name' => 'web',
                'status' => $request->status,
            ]);
            $permissionInput = $request->permissions ?? [];
            if (!empty($permissionInput)) {
                if (in_array('all', $permissionInput)) {
                    $permissions = Permission::where('guard_name', 'web')->get();
                } else {
                    $permissions = Permission::whereIn('name', $permissionInput)->get();
                }

                $role->syncPermissions($permissions);
            }
            DB::commit();
            return redirect()->back()->with('success', 'Role has been created successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Role assign failed', [$th->getMessage(), $th->getFile(), $th->getLine()]);
            return redirect()->back()->with('error', 'Somethnig went wrong');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $permissions = collect((array) $request->permissions)->filter();
        $role->syncPermissions($permissions);
        $role->update(['name' => $request->name, 'status' => $request->status, 'guard_name' => 'web']);
        return redirect()->back()->with('success', 'Role has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->destroy($role->id);
        return redirect()->back()->with('error', 'Role has been deleted successfully');
    }
}
