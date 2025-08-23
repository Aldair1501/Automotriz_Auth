<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;

/* David estuvo aquí */
class VehiculoController extends Controller
{
    /**
     * Muestra la lista de todos los vehículos.
     */
    public function index()
    {
        // Obtiene todos los vehículos de la base de datos
        $vehiculos = Vehiculo::all();

        // Retorna la vista 'vehiculos.index' enviando los vehículos
        return view('vehiculos.index', compact('vehiculos'));
    }

    /**
     * Muestra el formulario para crear un nuevo vehículo.
     */
    public function create()
    {
        // Retorna la vista 'vehiculos.create' con el formulario
        return view('vehiculos.create');
    }

    /**
     * Guarda un nuevo vehículo en la base de datos.
     */
    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'anio' => 'required|integer|min:1900|max:' . date('Y'),
            'precio' => 'required|numeric',
            'estado' => 'required|in:Disponible,Vendido,En mantenimiento',
            'kilometraje' => 'required|integer|min:0',
            'color' => 'required|string|max:100',
        ]);

        // Crea el vehículo con los datos validados
        Vehiculo::create($request->all());

        // Redirige a la lista de vehículos con mensaje de éxito
        return redirect()->route('vehiculos.index')->with('success', 'Vehículo creado correctamente.');
    }
}
