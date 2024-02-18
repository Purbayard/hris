@extends('layouts.app')

@section('content')
    <div class="flex">
        <div class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Employees</h5>
            <p class="font-normal text-gray-700 text-xl">{{$employeeCount}}</p>
        </div>
        <div class="ml-6 block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Positions</h5>
            <p class="font-normal text-gray-700 text-xl">{{$positionCount}}</p>
        </div>
        <div class="ml-6 block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Departments</h5>
            <p class="font-normal text-gray-700 text-xl">{{$departmentCount}}</p>
        </div>
    </div>
    <form action="{{ route('employees.search') }}" method="GET" class="max-w-md mt-8">   
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="search" id="search" name="search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 " placeholder="Search..." required />
            <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
        </div>
    </form>
    @if (isset($search))
        @if ($employeeCount > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 mt-8 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach ($employees as $employee)
                    <div class="bg-white p-4 shadow-md rounded-lg">
                        <h3 class="font-semibold text-lg">Nama :{{ $employee->name }}</h3>
                        <p class="text-sm text-gray-800">Posisi :{{ $employee->position->name }}</p>
                        <p class="text-sm text-gray-800">Department :{{ $employee->department->name }}</p>
                    </div>
                @endforeach
            </div>
        @else
            <div class="bg-white p-4 shadow-md rounded-lg mt-8">
                <p class="text-lg font-semibold">Data {{ $search }} tidak ditemukan</p>
            </div>
        @endif
    @endif
@endsection
