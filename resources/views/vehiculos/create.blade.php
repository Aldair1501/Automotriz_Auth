@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-12 px-6 sm:px-10 lg:px-12 bg-white shadow-xl rounded-2xl">
    <h1 class="text-3xl font-extrabold text-gray-800 mb-8 border-b pb-4">Registrar Nuevo Vehículo</h1>

    <form action="{{ route('vehiculos.store') }}" method="POST" novalidate class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            {{-- Marca --}}
            <div>
                <label for="marca" class="form-label">Marca</label>
                <input type="text" name="marca" id="marca" value="{{ old('marca') }}"
                    class="form-input @error('marca') border-red-500 @enderror" placeholder="Ej. Toyota" required>
                @error('marca')
                    <span class="form-error">{{ $message }}</span>
                @enderror
            </div>

            {{-- Modelo --}}
            <div>
                <label for="modelo" class="form-label">Modelo</label>
                <input type="text" name="modelo" id="modelo" value="{{ old('modelo') }}"
                    class="form-input @error('modelo') border-red-500 @enderror" placeholder="Ej. Corolla" required>
                @error('modelo')
                    <span class="form-error">{{ $message }}</span>
                @enderror
            </div>

            {{-- Año --}}
            <div>
                <label for="anio" class="form-label">Año</label>
                <input type="number" name="anio" id="anio" value="{{ old('anio') }}" min="1900" max="{{ date('Y') }}"
                    class="form-input @error('anio') border-red-500 @enderror" required>
                @error('anio')
                    <span class="form-error">{{ $message }}</span>
                @enderror
            </div>

            {{-- Precio --}}
            <div>
                <label for="precio" class="form-label">Precio (Q)</label>
                <input type="number" name="precio" id="precio" step="0.01" value="{{ old('precio') }}"
                    class="form-input @error('precio') border-red-500 @enderror" required>
                @error('precio')
                    <span class="form-error">{{ $message }}</span>
                @enderror
            </div>

            {{-- Estado --}}
            <div>
                <label for="estado" class="form-label">Estado</label>
                <select name="estado" id="estado"
                    class="form-input @error('estado') border-red-500 @enderror" required>
                    <option value="">Selecciona una opción</option>
                    <option value="Disponible" {{ old('estado') == 'Disponible' ? 'selected' : '' }}>Disponible</option>
                    <option value="Vendido" {{ old('estado') == 'Vendido' ? 'selected' : '' }}>Vendido</option>
                    <option value="En mantenimiento" {{ old('estado') == 'En mantenimiento' ? 'selected' : '' }}>En mantenimiento</option>
                </select>
                @error('estado')
                    <span class="form-error">{{ $message }}</span>
                @enderror
            </div>

            {{-- Kilometraje --}}
            <div>
                <label for="kilometraje" class="form-label">Kilometraje</label>
                <input type="number" name="kilometraje" id="kilometraje" value="{{ old('kilometraje') }}" min="0"
                    class="form-input @error('kilometraje') border-red-500 @enderror" required>
                @error('kilometraje')
                    <span class="form-error">{{ $message }}</span>
                @enderror
            </div>

            {{-- Color --}}
            <div>
                <label for="color" class="form-label">Color</label>
                <input type="text" name="color" id="color" value="{{ old('color') }}"
                    class="form-input @error('color') border-red-500 @enderror" placeholder="Ej. Rojo" required>
                @error('color')
                    <span class="form-error">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="flex justify-end pt-8 space-x-4">
            <a href="{{ route('vehiculos.index') }}" class="btn-secondary">Cancelar</a>
            <button type="submit" class="btn-primary">Guardar Vehículo</button>
        </div>
    </form>
</div>
@endsection
