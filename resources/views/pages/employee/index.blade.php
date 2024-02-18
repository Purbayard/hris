@extends('layouts.app')
@section('content')

@csrf
@if(session('success'))
<div id="success-alert" class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50" role="alert">
    <i class="mr-5 fa-solid fa-check"></i>
    <span class="sr-only">Info</span>
    <div>
    <span class="font-medium">{{ session('success') }}
    </div>
</div>
<script>
    setTimeout(function() {
        var successAlert = document.getElementById('success-alert');
        successAlert.classList.add('hidden');
    }, 2000); 
</script>
@endif
@if(session('error'))
<div id="danger-alert" class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50" role="alert">
    <i class="mr-5 fa-solid fa-check"></i>
    <span class="sr-only">Info</span>
    <div>
    <span class="font-medium">{{ session('error') }}
    </div>
</div>
<script>
    setTimeout(function() {
        var successAlert = document.getElementById('danger-alert');
        successAlert.classList.add('hidden');
    }, 2000); 
</script>
@endif
<div class="mx-auto max-w-screen-xl px-4 lg:px-12 antialiased">
    <div class="bg-white relative shadow-md sm:rounded-lg overflow-hidden">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
            <div class="w-full md:w-1/2">
                
            </div>
            <div class="w-full bg-[#040e2b] hover:bg-[#081a4e] rounded-md md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                <a href="{{route('employees.create')}}" class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2">
                    <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                    </svg>
                    Add Employee
                </a>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-white text-center uppercase bg-[#040e2b]">
                    <tr>
                        <th scope="col" class="px-4 py-4">Name</th>
                        <th scope="col" class="px-4 py-3">Email</th>
                        <th scope="col" class="px-4 py-3">Posisi</th>
                        <th scope="col" class="px-4 py-3">Department</th>
                        <th scope="col" class="px-4 py-3">Alamat</th>
                        <th scope="col" class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach($employees as $employee)    
                        <tr class="border-b">
                            <td class="px-4 py-3">{{ $employee->name }}</td>
                            <td class="px-4 py-3">{{ $employee->email }}</td>
                            <td class="px-4 py-3">{{ $employee->position->name }}</td>
                            <td class="px-4 py-3">{{ $employee->department->name }}</td>
                            <td class="px-4 py-3">{{ $employee->address }}</td>
                            <td class="px-4 py-3 flex items-center justify-center">
                                <button type="button" onclick="window.location='{{route('employees.edit',$employee->id)}}' " class="flex items-center justify-center px-3 py-2 mr-2 text-sm font-medium text-center text-white bg-[#040e2b] rounded-lg hover:bg-[#081a4e] focus:ring-4 focus:ring-red-300">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                                    Edit
                                </button>
                                <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"  class="flex items-center justify-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                    Delete 
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div id="popup-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow">
            <div class="p-6 text-center">
                <i class="fa-solid fa-circle-info h-10 w-auto"></i>
                <h3 class="mb-5 text-lg font-normal text-gray-500">Apakah Anda yakin ingin menghapus data ini ?</h3>
                <div class="flex items-center justify-center">
                    <form action="{{route('employees.destroy',$employee->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="flex items-center justify-center px-3 py-2 text-sm font-medium text-center mr-2 text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                            Delete 
                        </button>
                    </form>
                    <button data-modal-hide="popup-modal" type="button" class="text-gray-500 px-3 py-2 text-sm font-medium text-center bg-white hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-500 hover:text-gray-900 focus:z-10">cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
 
@endsection