<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Fuente moderna -->
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 flex min-h-screen">

    <!-- Sidebar fijo -->
    <nav class="fixed inset-y-0 left-0 w-64 bg-white border-r border-gray-200 p-6 flex flex-col">
        <!-- Logo / Nombre App -->
        <div class="mb-10">
            <a href="{{ route('dashboard') }}" 
               class="text-3xl font-extrabold text-indigo-600 hover:text-indigo-700 transition">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>

        <!-- Menú principal -->
        <ul class="flex-grow space-y-6">
            <li>
                <a href="{{ route('dashboard') }}"
                   class="flex items-center gap-3 text-gray-700 hover:text-indigo-600 font-semibold transition">
                    <!-- Icono Home --> 
                <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" class="h-6 w-6" data-name="Layer 1" viewBox="0 0 24 24">
                  <path d="M17,7h4v1h-4v-1Zm0,4h4v-1h-4v1Zm0,3h4v-1h-4v1Zm0,3h4v-1h-4v1Zm7-11.5v15.5H0V5.5c0-1.378,1.121-2.5,2.5-2.5H21.5c1.379,0,2.5,1.122,2.5,2.5Zm-1,0c0-.827-.673-1.5-1.5-1.5H2.5c-.827,0-1.5,.673-1.5,1.5v14.5H23V5.5Zm-8,6.5c0,3.309-2.691,6-6,6s-6-2.691-6-6,2.691-6,6-6,6,2.691,6,6Zm-6,5c1.198,0,2.284-.441,3.146-1.146l-3.646-3.646V7.051c-2.52,.255-4.5,2.364-4.5,4.949,0,2.757,2.243,5,5,5Zm5-5c0-2.586-1.98-4.694-4.5-4.949v4.742l3.354,3.354c.705-.862,1.146-1.948,1.146-3.146Z"/>
                </svg>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('vehiculos.index') }}"
                   class="flex items-center gap-3 text-gray-700 hover:text-indigo-600 font-semibold transition">
                    <!-- Icono lista -->
                   <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" width="25" height="25" viewBox="0 0 24 24"><path d="M4.5,9c.276,0,.5-.224,.5-.5v-1.5h11.782l-.182-.637c-.063-.223-.134-.443-.212-.662l-1.443-4.042c-.354-.993-1.3-1.659-2.354-1.659H4.41c-1.054,0-2,.667-2.354,1.659L.612,5.701c-.406,1.137-.612,2.325-.612,3.531v3.768H2v2h3v-3H1v-2.768c0-.755,.089-1.502,.266-2.232h2.734v1.5c0,.276,.224,.5,.5,.5Zm-.5,4v1h-1v-1h1ZM2.997,1.995c.213-.595,.781-.995,1.413-.995H12.59c.632,0,1.2,.4,1.413,.995l1.43,4.005H1.566L2.997,1.995ZM24,18.232c0-1.206-.206-2.394-.612-3.531l-1.443-4.042c-.354-.993-1.3-1.659-2.354-1.659H11.41c-1.054,0-2,.667-2.354,1.659l-1.443,4.042c-.406,1.137-.612,2.325-.612,3.531v3.768h2v2h3v-2h7v2h3v-2h2v-3.768Zm-14.003-7.237c.213-.595,.781-.995,1.413-.995h8.181c.632,0,1.2,.4,1.413,.995l1.43,4.005H8.566l1.43-4.005Zm1.003,12.005h-1v-1h1v1Zm10,0h-1v-1h1v1Zm2-2H8v-2.768c0-.755,.089-1.502,.266-2.232h2.734v1.5c0,.276,.224,.5,.5,.5s.5-.224,.5-.5v-1.5h7v1.5c0,.276,.224,.5,.5,.5s.5-.224,.5-.5v-1.5h2.734c.177,.73,.266,1.477,.266,2.232v2.768Z"/></svg>



                    Vehículos
                </a>
            </li>
            <li>
                <a href="{{ route('vehiculos.create') }}"
                   class="flex items-center gap-3 text-gray-700 hover:text-indigo-600 font-semibold transition">
                    <!-- Icono + -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 4v16m8-8H4"/>
                    </svg>
                    Nuevo Vehículo
                </a>
            </li>
        </ul>

        <!-- Separador -->
        <hr class="my-6 border-gray-200" />

        <!-- Perfil -->
        <ul class="space-y-4">
            <li>
                <a href="{{ route('profile.edit') }}"
                   class="flex items-center gap-3 text-gray-700 hover:text-indigo-600 font-semibold transition">
                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                   </svg>
                   Perfil
                </a>
            </li>
        </ul>

        <!-- Logout abajo -->
        <div class="mt-auto pt-6 border-t border-gray-200">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full text-left text-gray-700 hover:text-red-600 font-semibold transition">
                    Cerrar sesión
                </button>
            </form>
        </div>
    </nav>

    <!-- Contenido principal -->
    <main class="flex-1 ml-64 p-8 overflow-auto">
        @isset($header)
            <header class="mb-8 border-b border-gray-300 pb-4">
                {{ $header }}
            </header>
        @endisset

        @hasSection('content')
            @yield('content')
        @else
            {{ $slot }}
        @endif
    </main>

</body>
</html>
