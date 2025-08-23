<?php
namespace App\Http\Controllers;

use App\Models\Vehiculo;

class DashboardController extends Controller
{
    /**
     * Muestra el panel principal (dashboard) con estadísticas de vehículos.
     */
    public function index()
    {
        // Obtiene el total de vehículos registrados en la base de datos
        $totalVehiculos = Vehiculo::count();

        // Obtiene la cantidad de vehículos con estado "Disponible"
        $vehiculosDisponibles = Vehiculo::where('estado', 'Disponible')->count();

        // Obtiene la cantidad de vehículos con estado "Vendido"
        $vehiculosVendidos = Vehiculo::where('estado', 'Vendido')->count();

        // Obtiene los últimos 5 vehículos registrados (ordenados por fecha de creación descendente)
        $ultimosVehiculos = Vehiculo::orderBy('created_at', 'desc')->limit(5)->get();

        // Retorna la vista 'dashboard' enviando las variables necesarias
        return view(
            'dashboard', 
            compact('totalVehiculos', 'vehiculosDisponibles', 'vehiculosVendidos', 'ultimosVehiculos')
        );
    }
}
