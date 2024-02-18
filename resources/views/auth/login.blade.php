@extends('layouts.guest')

@section('content')
<div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
    <div class="w-full bg-white rounded-lg shadow-md md:mt-0 sm:max-w-md xl:p-0 shadow-black">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
            <h5 class="text-4xl font-medium tracking-tight text-center text-gray-900">LOGIN</h5>
            <hr>
            <form class="space-y-6" action="{{route('login')}}" method="POST">
                @csrf
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <span class="fas fa-user"></span>
                    </div>
                    <input type="email" name="email" for="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 " placeholder="Email" required>
                </div>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <span class="fas fa-lock"></span>
                    </div>
                    <input type="password" name="password" for="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 " placeholder="Password" required>
                </div>
            
                <button type="submit" class="w-full text-white bg-[#040e2b] hover:bg-[#070716] focus:ring-2 focus:outline-none focus:ring-[#363e55] font-medium rounded-lg text-sm px-5 py-2.5 text-center">LOGIN</button>
                <div class="text-sm font-medium text-center text-gray-500">
                    Belum punya akun? <a href="{{route('register')}}" class="text-[#040e2b] font-bold hover:no-underline">Buat Akun</a>
                </div>
            </form>
        </div>
    </div>
</div> 
@endsection
