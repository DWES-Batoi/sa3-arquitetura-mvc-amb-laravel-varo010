@extends('layouts.app')

@section('title', 'Crear Partit')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Crear Nou Partit</h1>

    <div class="bg-white shadow-md rounded-lg p-6 max-w-2xl">
        <form method="POST" action="{{ route('partits.store') }}">
            @csrf

            <div class="mb-4">
                <label for="local" class="block text-gray-700 font-bold mb-2">Equip Local</label>
                <input 
                    type="text" 
                    id="local" 
                    name="local" 
                    value="{{ old('local') }}" 
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('local') border-red-500 @enderror"
                    required
                >
                @error('local')
                    <small class="text-red-500 text-sm">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-4">
                <label for="visitant" class="block text-gray-700 font-bold mb-2">Equip Visitant</label>
                <input 
                    type="text" 
                    id="visitant" 
                    name="visitant" 
                    value="{{ old('visitant') }}" 
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('visitant') border-red-500 @enderror"
                    required
                >
                @error('visitant')
                    <small class="text-red-500 text-sm">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-4">
                <label for="data" class="block text-gray-700 font-bold mb-2">Data</label>
                <input 
                    type="date" 
                    id="data" 
                    name="data" 
                    value="{{ old('data') }}" 
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('data') border-red-500 @enderror"
                    required
                >
                @error('data')
                    <small class="text-red-500 text-sm">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-6">
                <label for="resultat" class="block text-gray-700 font-bold mb-2">Resultat (opcional)</label>
                <input 
                    type="text" 
                    id="resultat" 
                    name="resultat" 
                    value="{{ old('resultat') }}" 
                    placeholder="Ex: 2-1"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('resultat') border-red-500 @enderror"
                >
                @error('resultat')
                    <small class="text-red-500 text-sm">{{ $message }}</small>
                @enderror
            </div>

            <div class="flex gap-4">
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Guardar
                </button>
                <a href="{{ route('partits.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                    Cancel·lar
                </a>
            </div>
        </form>
    </div>
@endsection
