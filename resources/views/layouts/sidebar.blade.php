

<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end">
            <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
                <span class="sr-only">Open sidebar</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                </svg>
            </button>
            <a href="https://flowbite.com" class="flex ms-2 md:me-24">
                <span class="text-xl font-semibold sm:text-2xl whitespace-nowrap">HRIS</span>
            </a>
            </div>
        <div class="flex items-center">
            <div class="flex items-center ms-3">
                <div>
                    <button type="button" class="flex text-sm bg-gray-100 rounded-full p-2 focus:ring-4 focus:ring-gray-300" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                    <span class="sr-only">Open user menu</span>
                    {{ auth()->user()->name }} <svg class="w-4 h-4 ml-2 mt-1" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                </div>
                <div class="z-50 hidden my-4 text-base list-none bg-gray-100 divide-y divide-white rounded shadow" id="dropdown-user">
                    <div class="px-4 py-3" role="none">
                    <p class="text-sm text-black" role="none">
                        {{ auth()->user()->name }}
                    </p>
                    <p class="text-sm font-medium text-black truncate" role="none">
                        {{ auth()->user()->email }}
                    </p>
                    </div>
                    <ul class="py-1" role="none">
                    <li>
                        <a href="{{route('profile.edit')}}" class="block px-4 py-2 text-sm text-gray-400 hover:bg-white  hover:text-black" role="menuitem">Profil</a>
                    </li>
                    </ul>
                </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{route("dashboard")}}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <i class="fa-solid fa-gauge"></i>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{route("employees.index")}}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <i class="fa-solid fa-user"></i>
                    <span class="flex-1 ms-3 whitespace-nowrap">Employees</span>
                </a>
            </li>
            <li>
                <a href="{{route("positions.index")}}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <i class="fa-solid fa-bars-progress"></i>
                    <span class="flex-1 ms-3 whitespace-nowrap">Position</span>
                </a>
            </li>
            <li>
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button type="submit" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                        <i class="fa-solid fa-right-from-bracket"></i>                    
                        <span class="flex-1 ms-3 whitespace-nowrap">Logout</span>
                    </button>
                </form>
            </li>
        </ul>
    </div>
</aside>