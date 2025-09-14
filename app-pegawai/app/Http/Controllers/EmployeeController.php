<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();
        return $employees;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // view form untuk create employee
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:employees',
            'alamat' => 'required|string|max:500',
            'tanggal_lahir' => 'required|date',
            'departemen_id' => 'required|exists:departments,id',
            'jabatan_id' => 'required|exists:positions,id',
        ]);
        $employee = Employee::create($request->all());
        return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        $employee = Employee::find($employee->id);
        return $employee;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        // view form untuk edit employee
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:employees,email,' . $employee->id,
            'alamat' => 'required|string|max:500',
            'tanggal_lahir' => 'required|date',
            'departemen_id' => 'required|exists:departments,id',
            'jabatan_id' => 'required|exists:positions,id',
        ]);
        $employee->update($request->all());
        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index');
    }
}
