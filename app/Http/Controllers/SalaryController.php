<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salary;
use App\Models\Employee;
use App\Models\Position;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salaries = Salary::with(['employee.positions'])
            ->orderBy('id', 'asc')
            ->get();

        return view('Salary.index', compact('salaries'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::with('positions')->get();
        return view('Salary.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $salary = $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'bulan' => 'required|string|max:10',
            'gaji_pokok' => 'required|numeric',
            'tunjangan' => 'required|numeric',
            'potongan' => 'required|numeric',
            'total_gaji' => 'required|numeric',
        ]);
        Salary::create($salary);
        return redirect()->route('salary.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $salary = Salary::with('employee')
            ->findOrFail($id);

        return view('Salary.show', compact('salary'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $salary = Salary::findOrFail($id);
        $employees = Employee::with('positions')->get();
        return view('Salary.edit', compact('employees', 'salary'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        request()->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'bulan' => 'required|string|max:10',
            'gaji_pokok' => 'required|numeric',
            'tunjangan' => 'required|numeric',
            'potongan' => 'required|numeric',
        ]);
        $salary = Salary::find($id);
        $salary->update($request->all());
        return redirect()->route('salary.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Salary $salary)
    {
        $salary->delete();
        return redirect()->route('salary.index');
    }
}
