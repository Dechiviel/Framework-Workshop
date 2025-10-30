<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use \App\Models\Employee;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::orderBy('id', 'asc')->get();
        $totalEmployeeOnDepartment = Employee::selectRaw('departemen_id, COUNT(*) as total')
            ->groupBy('departemen_id')
            ->pluck('total', 'departemen_id');
        return view('Department.index', compact('departments', 'totalEmployeeOnDepartment'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Department.create');
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
        return redirect()->route('department.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $department = Department::with('employees')->findOrFail($id);

        $data = [
            'department' => $department->nama_departemen,
            'total_employee' => $department->employees->count(),
            'employee_names' => $department->employees->pluck('nama_lengkap')->toArray(),
        ];

        return view('Department.show', compact('data'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        $department = Department::find($department->id);
        return view('Department.edit', compact('department'));
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
        return redirect()->route('department.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('department.index');
    }
}
