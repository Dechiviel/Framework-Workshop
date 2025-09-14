<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $department = Department::all();
        return $department;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // view form untuk create department
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_departemen' => 'required|string|max:255',
        ]);
        Department::create($request->all());
        return redirect()->route('departments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $department = Department::find($id);
        return $department;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // view form untuk edit department
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_departemen' => 'required|string|max:255',
        ]);
        $department = Department::find($id);
        $department->update($request->all());
        return redirect()->route('departments.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('departments.index');
    }
}
