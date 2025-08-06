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
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round"
                 stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7"/></svg>
            Dashboard
        </a>
    </li>
    <li>
        <a href="{{ route('vehiculos.index') }}"
           class="flex items-center gap-3 text-gray-700 hover:text-indigo-600 font-semibold transition">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-width="2" d="M3 7h18M3 12h18M3 17h18"/>
            </svg>
            Vehículos
        </a>
    </li>
    <li>
        <a href="{{ route('vehiculos.create') }}"
           class="flex items-center gap-3 text-gray-700 hover:text-indigo-600 font-semibold transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
            </svg>
            Nuevo Vehículo
        </a>
    </li>

<li>
    <a href="{{ route('login-logs') }}"
       class="flex items-center gap-3 text-gray-700 hover:text-indigo-600 font-semibold transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        Historial de acceso
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
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                      d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975M15 9.75a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
            Perfil
        </a>
    </li>
</ul>

<!-- Logout -->
<div class="mt-auto pt-6 border-t border-gray-200">
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit"
                class="w-full text-left text-gray-700 hover:text-red-600 font-semibold transition">
            Cerrar sesión
        </button>
    </form>
</div>
