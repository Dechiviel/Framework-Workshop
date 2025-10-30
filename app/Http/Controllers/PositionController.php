<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Position;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $positions = Position::orderBy('id', 'asc')->get();
        return view('Position.index', compact('positions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Position.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $position = request()->validate([
            'nama_jabatan' => 'required|string|max:100',
            'gaji_pokok'   => 'required|numeric|min:0',
        ]);
        $position = Position::create($position);
        return redirect()->route("position.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $position = Position::with('employees')->findOrFail($id);

        $data = [
            'position' => $position,
            'total_employee' => $position->employees->count(),
            'employee_names' => $position->employees->pluck('nama_lengkap')->toArray(),
        ];

        return view('Position.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Position $position)
    {
        $position = Position::find($position->id);
        return view('Position.edit', compact('position'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_jabatan' => 'required|string|max:100',
            'gaji_pokok' => 'required|string|max:50'
        ]);
        $position = Position::find($id);
        $position->update($request->all());
        return redirect()->route("position.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Position $position)
    {
        $position->delete();
        return redirect()->route("position.index");
    }
}
