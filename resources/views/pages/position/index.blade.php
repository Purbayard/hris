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
            <div class="w-full bg-blue-600 hover:bg-blue-800 rounded-md md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                <a href="{{route('positions.create')}}" class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2">
                    <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                    </svg>
                    Add Position
                </a>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-white text-center uppercase bg-[#040e2b]">
                    <tr>
                        <th scope="col" class="px-4 py-4">Name</th>
                        <th scope="col" class="px-4 py-3">Department</th>
                        <th scope="col" class="px-4 py-3">Description</th>
                        <th scope="col" class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach($positions as $position)    
                        <tr class="border-b">
                            <td class="px-4 py-3">{{ $position->name }}</td>
                            <td class="px-4 py-3">{{ $position->department->name }}</td>
                            <td class="px-4 py-3">{{ $position->description }}</td>
                            <td class="px-4 py-3 flex items-center justify-center">
                                <button type="button" onclick="window.location='{{route('positions.edit',$position->id)}}' " class="flex items-center justify-center px-3 py-2 mr-2 text-sm font-medium text-center text-white bg-green-600 rounded-lg hover:bg-green-800 focus:ring-4 focus:ring-red-300">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                                    Edit
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection