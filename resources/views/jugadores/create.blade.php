@extends('layouts.app')

@section('title', 'Crear Jugadora')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Crear Nova Jugadora</h1>

    <div class="bg-white shadow-md rounded-lg p-6 max-w-2xl">
        <form method="POST" action="{{ route('jugadores.store') }}">
            @csrf

            <div class="mb-4">
                <label for="nom" class="block text-gray-700 font-bold mb-2">Nom</label>
                <input 
                    type="text" 
                    id="nom" 
                    name="nom" 
                    value="{{ old('nom') }}" 
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('nom') border-red-500 @enderror"
                    required
                >
                @error('nom')
                    <small class="text-red-500 text-sm">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-4">
                <label for="equip" class="block text-gray-700 font-bold mb-2">Equip</label>
                <input 
                    type="text" 
                    id="equip" 
                    name="equip" 
                    value="{{ old('equip') }}" 
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('equip') border-red-500 @enderror"
                    required
                >
                @error('equip')
                    <small class="text-red-500 text-sm">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-6">
                <label for="posicio" class="block text-gray-700 font-bold mb-2">Posició</label>
                <select 
                    id="posicio" 
                    name="posicio" 
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('posicio') border-red-500 @enderror"
                    required
                >
                    <option value="">-- Selecciona una posició --</option>
                    @foreach($posicions as $pos)
                        <option value="{{ $pos }}" @selected(old('posicio') === $pos)>{{ $pos }}</option>
                    @endforeach
                </select>
                @error('posicio')
                    <small class="text-red-500 text-sm">{{ $message }}</small>
                @enderror
            </div>

            {{-- ESTA ES LA SECCIÓN DE BOTONES QUE DEBE ESTAR --}}
            <div class="flex gap-4">
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Guardar
                </button>
                <a href="{{ route('jugadores.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                    Cancel·lar
                </a>
            </div>
        </form>
    </div>
@endsection
