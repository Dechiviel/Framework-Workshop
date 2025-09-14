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
        $positions = Position::all();
        return $positions;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // view form untuk create position
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
        return redirect()->route("positions.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $position = Position::find($id);
        return $position;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // view form untuk edit position
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $position = Position::find($id);
        $position->update($request->all());
        return redirect()->route("positions.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Position $position)
    {
        $position->delete();
        return redirect()->route("positions.index");
    }
}
