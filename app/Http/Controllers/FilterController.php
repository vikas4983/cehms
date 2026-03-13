<?php

namespace App\Http\Controllers;

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
        $students = User::where('email', $input)
            ->orWhere('name', 'LIKE', "%{$input}%")
            ->orWhere('id', $input)
            ->orWhere('practitioner_registration', $input)
            ->paginate(20);

        if ($students->isNotEmpty()) {
            $result = view('students.result', compact('students'))->render();
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
