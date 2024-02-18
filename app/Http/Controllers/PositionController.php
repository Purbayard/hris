<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index()
    {
        $positions = Position::with('department')->get();
        return view('pages.position.index', [
            'title' => 'Position List',
            'positions' => $positions,
        ]);
    }

    public function create()
    {
        $departments = Department::all();
        return view('pages.position.create', [
            'title' => 'Create Position',
            'departments' => $departments,
        ]);
    }

    public function store(Request $request)
    {
        try {
            Position::create($request->all());
            return redirect()->route('positions.index')->with('success', 'Data berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan data. ' . $e->getMessage());
        }
    }

    public function edit(Position $position)
    {
        $departments = Department::all();
        return view('pages.position.edit',  [
            'title' => 'Edit Position',
            'position' => $position,
            'departments' => $departments,
        ]);
    }

    public function update(Request $request, Position $position)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|max:255',
                'department_id' => 'required',
                'description' => 'required',
            ]);

            $position->update($validatedData);

            return redirect()->route('positions.index')->with('success', 'Data berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui data. ' . $e->getMessage());
        }
    }
}
