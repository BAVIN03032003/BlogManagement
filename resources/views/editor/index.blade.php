<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __(' Author Dashboard') }}
        </h2>
    </x-slot>

    <div class="d-flex">
        <!-- Sidebar -->
        <nav class="bg-dark text-white vh-100 p-3" style="width: 250px;">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="{{ route('editor.create') }}" class="nav-link active text-white">
                        <i class="bi bi-house-fill"></i> Create Blogs
                    </a>
                </li>
               
                <li class="nav-item">
                    <a href="{{ route('editor.preview') }}" class="nav-link text-white">
                        <i class="bi bi-gear-fill"></i> Preview
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('editor.list') }}" class="nav-link text-white">
                        <i class="bi bi-box-arrow-right"></i> List Blogs
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="flex-grow-1 p-4">
            @yield('form')
        </div>
    </div>
</x-app-layout>
