<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salary;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salary = Salary::all();
        return $salary;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // view form untuk create salary
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $salary = $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'bulan'       => 'required|string|max:10',
            'gaji_pokok'  => 'required|numeric',
            'tunjangan'   => 'required|numeric',
            'potongan'    => 'required|numeric',
        ]);
        Salary::create($salary);
        return redirect()->route('salaries.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $salary = Salary::find($id);
        return $salary;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // view form untuk edit salary
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        request()->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'bulan'       => 'required|string|max:10',
            'gaji_pokok'  => 'required|numeric',
            'tunjangan'   => 'required|numeric',
            'potongan'    => 'required|numeric',
        ]);
        $salary = Salary::find($id);
        $salary->update($request->all());
        return redirect()->route('salaries.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Salary $salary)
    {
        $salary->delete();
        return redirect()->route('salaries.index');
    }
}
