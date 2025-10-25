<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehiculo extends Model
{
    /**
     * Trait SoftDeletes:
     * Permite eliminar registros de forma "suave" (soft delete),
     * es decir, no se borran físicamente de la base de datos,
     * solo se marca la columna deleted_at con la fecha de eliminación.
     */
    use SoftDeletes;

    /**
     * Nombre de la tabla en la base de datos asociada a este modelo.
     */
    protected $table = 'vehiculo';

    /**
     * Campos que se pueden asignar masivamente (mass assignment).
     */
    protected $fillable = [
        'marca',        // Marca del vehículo
        'modelo',       // Modelo del vehículo
        'anio',         // Año de fabricación
        'precio',       // Precio del vehículo
        'estado',       // Estado: Disponible, Vendido, En mantenimiento
        'kilometraje',  // Kilometraje del vehículo
        'color',        // Color del vehículo
    ];
}
