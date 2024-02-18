<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Position;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $employeeCount = Employee::count();
        $positionCount = Position::count();
        $departmentCount = Department::count();
        return view('pages.dashboard', [
            'title' => 'Dashboard',
            'employeeCount' => $employeeCount,
            'positionCount' => $positionCount,
            'departmentCount' => $departmentCount,
        ]);
    }
}
