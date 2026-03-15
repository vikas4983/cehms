<?php

namespace App\Http\Controllers;

use App\Exports\StudentExport;
use App\Http\Requests\StudentCreateRequest;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use App\traits\AssignRoleOrPermission;
use App\traits\UploadTrait;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\Console\Cursor;

class StudentController extends Controller
{
    use UploadTrait;
    use AssignRoleOrPermission;

    public static function middleware(): array
    {
        return [new Middleware('permission:view user', only: ['index', 'show']), new Middleware('permission:create user', only: ['create', 'store']), new Middleware('permission:edit user', only: ['edit', 'update']), new Middleware('permission:delete user', only: ['destroy']), new Middleware('permission:change student status', only: ['studentStatus'])];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = User::isAdmin()->paginate(20);
        $permissions = Permission::active()->get();
        $roles = Role::active()->get();
        $groupedPermissions = $permissions->groupBy(function ($permission) {
            return explode(' ', $permission->name)[1];
        });
        return view('students.index', compact('students', 'groupedPermissions', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = User::where('');
        return view('students.create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentCreateRequest $request)
    {
        $validatedData = $request->validated();

        DB::beginTransaction();
        try {
            if ($request->hasFile('image')) {
                $validatedData['image'] = $this->upload($request->file('image'));
            }
            if ($request->hasFile('10th_marksheet')) {
                $validatedData['10th_marksheet'] = $request->file('10th_marksheet')->store('marksheets/tenth', 'public');
            }
            if ($request->hasFile('12th_marksheet')) {
                $validatedData['12th_marksheet'] = $request->file('12th_marksheet')->store('marksheets/twelfth', 'public');
            }
            $user = User::create($validatedData);
            $this->assignRole($user);
            $this->assignPermissionForUser($user);
            DB::commit();
            return redirect()->back()->with('success', 'Student has been created successfully');
        } catch (\Exception $e) {
            Log::error('Student creation failed', [
                'error' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);
            DB::rollback();
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $student = User::findOrFail($id);

        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user, $id)
    {
        $student = User::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentCreateRequest $request, $id)
    {
        $validatedData = $request->validated();
        $user = User::findOrFail($id);
        if ($request->hasFile('image')) {
            if ($user && $user->image) {
                $this->imageExist($user->image);
            }
            $validatedData['image'] = $this->upload($request->file('image'));
        }
        if ($request->hasFile('10th_marksheet')) {
            if ($user && $user->{'10th_marksheet'}) {
                $this->imageExist($user->{'10th_marksheet'});
            }
            $validatedData['10th_marksheet'] = $request->file('10th_marksheet')->store('marksheets/tenth', 'public');
        }
        if ($request->hasFile('12th_marksheet')) {
            if ($user && $user->{'12th_marksheet'}) {
                $this->imageExist($user->{'12th_marksheet'});
            }
            $validatedData['12th_marksheet'] = $request->file('12th_marksheet')->store('marksheets/twelfth', 'public');
        }
        $user->update($validatedData);
        return redirect()->route('students.index')->with('success', 'Student has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrfail($id);
        if ($user->exists() && $user->image) {
            $this->imageExist($user->image);
        }
        if ($user->exists() && $user->{'10th_marksheet'}) {
            $this->imageExist($user->{'10th_marksheet'});
        }
        if ($user->exists() && $user->{'12th_marksheet'}) {
            $this->imageExist($user->{'12th_marksheet'});
        }
        $user->delete();
        return redirect()->route('students.index')->with('error', 'Student has been deleted successfully');
    }

    public function studentStatus(Request $request)
    {
        $validatedData = $request->validate([
            'status' => ['required', 'in:1,0'],
            'student_id' => ['required', 'numeric'],
        ]);
        $student = User::findOrFail($validatedData['student_id']);
        $student->update([
            'status' => $validatedData['status'],
        ]);
        return redirect()->back()->with('success', 'Student status has been changed');
    }
    public function uploadImage(Request $request)
    {
        $validatedData = $request->validate([
            'image' => ['required', 'mimes:jpeg,jpeg,gif', 'size:2048'],
            'student_id' => ['required', 'numeric'],
        ]);

        $student = User::findOrFail($validatedData['student_id']);

        if ($request->hasFile('image')) {
            if ($student && $student->image) {
                $this->imageExist($student->image);
            }
            $validatedData['image'] = $this->upload($request->file('image'));
        }

        $student->update([
            'image' => $validatedData['image'],
        ]);
        return redirect()->back()->with('success', 'Student image has been changed');
    }

    public function inactiveStudent()
    {
        $students = User::inactive()->paginate(20);
        $permissions = Permission::active()->get();
        $roles = Role::active()->get();
        $groupedPermissions = $permissions->groupBy(function ($permission) {
            return explode(' ', $permission->name)[1];
        });
        return view('students.index', compact('students', 'permissions', 'roles', 'groupedPermissions'));
    }
    public function trashStudent()
    {
        $students = User::onlyTrashed()->paginate(20);
        return view('students.trash', compact('students'));
    }
    public function untrashStudent($id)
    {
        if (!$id) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
        $student = User::withTrashed()->find($id);
        if (!$student) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
        $student->restore($id);
        return redirect()->route('students.index')->with('success', 'Student has been restore successfully');
    }

    public function exportActiveStudents()
    {
        $students = User::exportActiveStudents()->get();
        if (!$students) {
            return redirect()->route('students.index')->with('error', 'Something went wrong');
        }
        return Excel::download(new StudentExport($students), 'active-students.xlsx');
    }
    public function exportInactiveStudents()
    {
        $students = User::inactive()->latest()->get();
        if (!$students) {
            return redirect()->route('students.index')->with('error', 'Something went wrong');
        }
        return Excel::download(new StudentExport($students), 'inactive-students.xlsx');
    }

    public function exportTodayStudents()
    {
        $students = User::todayStudents()->get();
        if (!$students) {
            return redirect()->route('students.index')->with('error', 'Something went wrong');
        }
        return Excel::download(new StudentExport($students), 'today-students.xlsx');
    }
    public function exportWeeklyStudents()
    {
        $students = User::weeklyStudents()->get();
        if (!$students) {
            return redirect()->route('students.index')->with('error', 'Something went wrong');
        }
        return Excel::download(new StudentExport($students), 'weekly-students.xlsx');
    }
    public function exportMonthlyStudents()
    {
        $students = User::monthlyStudents()->get();
        if (!$students) {
            return redirect()->route('students.index')->with('error', 'Something went wrong');
        }
        return Excel::download(new StudentExport($students), 'monthly-students.xlsx');
    }
    public function exportYearlyStudents()
    {
        $students = User::yearlyStudents()->get();
        if (!$students) {
            return redirect()->route('students.index')->with('error', 'Something went wrong');
        }
        return Excel::download(new StudentExport($students), 'yearly-students.xlsx');
    }
}
