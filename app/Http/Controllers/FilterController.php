<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Enquiry;
use App\Models\OldStudent;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function filter(Request $request)
    {
        $input = $request->input ?? '';

        if (!$input) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Enter input value',
                ],
                422,
            );
        }

        if ($request->route == 'enquiries.index') {
            $data = Enquiry::where('email', $input)
                ->orWhere('name', 'LIKE', "%{$input}%")
                ->orWhere('id', $input)
                ->orWhere('mobile', $input)
                ->paginate(20);
        }
        if ($request->route == 'permissions.index') {
            $data = Permission::where('name', 'LIKE', "%{$input}%")->paginate(20);
        }
        if ($request->route == 'oldStudents.index') {
            $data = OldStudent::where('first_name', 'LIKE', "%{$input}%")
                ->orWhere('last_name', 'LIKE', "%{$input}%")
                ->orWhere('father_name', 'LIKE', "%{$input}%")
                ->orWhere('course', 'LIKE', "%{$input}%")
                ->orWhere('city', 'LIKE', "%{$input}%")
                ->orWhere('registration_no', $input)
                ->paginate(20);
        }
        if ($request->route == 'students.index') {
            $data = User::where('email', $input)
                ->orWhere('name', 'LIKE', "%{$input}%")
                ->orWhere('id', $input)
                ->orWhere('practitioner_registration', $input)
                ->paginate(20);
        }
        if ($request->route == 'books.index') {
            $data = Book::Where('name', 'LIKE', "%{$input}%")
                ->orWhere('publisher', 'LIKE', "%{$input}%")
                ->paginate(20);
        }

        if ($data->isNotEmpty()) {
            if ($request->route == 'students.index') {
                $roles = Role::active()->get();
                $permissions = Permission::active()->get();
                $groupedPermissions = $permissions->groupBy(function ($permission) {
                    return explode('-', $permission->name)[1];
                });
                $result = view('students.result', compact('data', 'groupedPermissions', 'roles'))->render();
            }
            if ($request->route == 'permissions.index') {
                $result = view('permissions.result', compact('data'))->render();
            }
            if ($request->route == 'enquiries.index') {
                $result = view('enquiries.result', compact('data'))->render();
            }
            if ($request->route == 'books.index') {
                $result = view('books.result', compact('data'))->render();
            }
            if ($request->route == 'oldStudents.index') {
                $result = view('oldStudents.result', compact('data'))->render();
            }
            return response()->json([
                'status' => true,
                'message' => 'Record successfully retreived.',
                'data' => $result,
            ]);
        } else {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Record not found.',
                ],
                422,
            );
        }
    }
}
