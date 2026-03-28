<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedicineCreateRequest;
use App\Models\Medicine;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    public static function middleware(): array
    {
        return [new Middleware('permission:view-medicine', ['only' => ['index', 'show']]), new Middleware('permission:create-medicine', ['only' => ['create', 'store']]), new Middleware('permission:edit-medicine', ['only' => ['edit', 'update']]), new Middleware('permission:delete-medicine', ['only' => ['destroy']])];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medicines = Medicine::allMedicine()->paginate(20);
        return view('medicines.index', compact('medicines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('medicines.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MedicineCreateRequest $request)
    {
        $validatedData = $request->validated();
        Medicine::firstOrCreate(
            [
                'name' => $validatedData['name'],
            ],
            $validatedData,
        );
        return redirect()->back()->with('success', 'Medicine has been added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Medicine $medicine) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medicine $medicine) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(MedicineCreateRequest $request, Medicine $medicine)
    {
        $validatedData = $request->validated();
        $medicine->update($validatedData);
        return redirect()->route('medicines.index')->with('success', 'Medicine has been updated succesfullly.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medicine $medicine)
    {
        $medicine->delete();
        return redirect()->back()->with('error', 'Medicine has been deleted succesfullly.');
    }
}
