@extends('layouts.app')
@section('content')
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
    <div class="grid max-w-4xl grid-cols-1 px-4 mx-auto xl:gap-4">
        <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2">
            <form action="{{ route('profile.update', $user) }}" method="post">
                @csrf
                <h3 class="mb-4 text-xl font-semibold">PROFIL</h3>
                <div class="mb-4">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
                    <input type="text" name="name" id="name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5" value="{{ $user->name }}" required>
                </div>
                <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                    <input type="email" name="email" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5" value="{{ $user->email }}" required>
                </div>
                <div>
                    <button class="text-white bg-[#040e2b] hover:bg-[#070716] focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection

