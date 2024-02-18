<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Position;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with('position', 'department')->get();
        return view('pages.employee.index', [
            'title' => 'Employee List',
            'employees' => $employees,
        ]);
    }

    public function create()
    {
        $positions = Position::all();
        $departments = Department::all();
        return view('pages.employee.create', [
            'title' => 'Create Employee',
            'positions' => $positions,
            'departments' => $departments,
        ]);
    }

    public function store(Request $request)
    {
        try {
            Employee::create($request->all());
            return redirect()->route('employees.index')->with('success', 'Data berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan data. ' . $e->getMessage());
        }
    }

    public function edit(Employee $employee)
    {
        $positions = Position::all();
        $departments = Department::all();
        return view('pages.employee.edit',  [
            'title' => 'Edit Employee',
            'employee' => $employee,
            'positions' => $positions,
            'departments' => $departments,
        ]);
    }

    public function update(Request $request, Employee $employee)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|max:255',
                'email' => 'required|email|unique:users,email,' . $employee->id,
                'position_id' => 'required',
                'department_id' => 'required',
                'address' => 'required',
            ]);

            $employee->update($validatedData);

            return redirect()->route('employees.index')->with('success', 'Data berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui data. ' . $e->getMessage());
        }
    }


    public function destroy(Employee $employee)
    {
        try {
            $employee->delete();
            return redirect()->route('employees.index')->with('success', 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus data. ' . $e->getMessage());
        }
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $employees = Employee::where('name', 'like', '%' . $search . '%')
            ->orWhereHas('position', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->orWhereHas('department', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->orWhere('address', 'like', '%' . $search . '%')
            ->with('position', 'department')
            ->get();
        $positions = Position::where('name', 'like', '%' . $search . '%')->with('department')->get();
        $departments = Department::where('name', 'like', '%' . $search . '%')->with('position')->get();
        $employeeCount = $employees->count();

        $error = ($employeeCount == 0) ? "Data $search tidak ditemukan" : null;

        return view('pages.dashboard', [
            'title' => 'Dashboard',
            'positionCount' => Position::count(),
            'departmentCount' => Department::count(),
            'employees' => $employees,
            'positions' => $positions,
            'departments' => $departments,
            'search' => $search,
            'employeeCount' => $employeeCount,
            'error' => $error,
        ]);
    }
}
