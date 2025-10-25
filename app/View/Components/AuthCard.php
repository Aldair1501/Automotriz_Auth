<?php

// Definimos el namespace donde estará este componente.
// Laravel guarda los componentes en app/View/Components por convención.
namespace App\View\Components;

// Importamos las clases necesarias para este componente.
use Closure;                            // Permite usar funciones anónimas como retorno de render.
use Illuminate\Contracts\View\View;     // Contrato que representa una vista en Laravel.
use Illuminate\View\Component;          // Clase base de la que heredan todos los componentes.

class AuthCard extends Component
{
    /**
     * Constructor del componente.
     * Aquí normalmente se reciben parámetros que luego estarán disponibles
     * dentro de la vista del componente. 
     * En este caso no se necesitan, por eso está vacío.
     */
    public function __construct()
    {
        //
    }

    /**
     * Método que devuelve la vista que representa el componente.
     * Laravel llamará a este método cada vez que uses <x-auth-card> en Blade.
     *
     * Tipos de retorno posibles:
     * - View    → Retorna una vista Blade (lo más común).
     * - Closure → Retorna una función anónima.
     * - string  → Retorna HTML como texto plano.
     */
    public function render(): View|Closure|string
    {
        // Retorna la vista ubicada en resources/views/components/auth-card.blade.php
        return view('components.auth-card');
    }
}
