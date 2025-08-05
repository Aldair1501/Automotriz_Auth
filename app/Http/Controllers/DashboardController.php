<?php
namespace App\Http\Controllers;

use App\Models\Vehiculo;

class DashboardController extends Controller
{
    public function index()
{
    $totalVehiculos = Vehiculo::count();
    $vehiculosDisponibles = Vehiculo::where('estado', 'Disponible')->count();
    $vehiculosVendidos = Vehiculo::where('estado', 'Vendido')->count();

    $ultimosVehiculos = Vehiculo::orderBy('created_at', 'desc')->limit(5)->get();

    return view('dashboard', compact('totalVehiculos', 'vehiculosDisponibles', 'vehiculosVendidos', 'ultimosVehiculos'));
}
}
