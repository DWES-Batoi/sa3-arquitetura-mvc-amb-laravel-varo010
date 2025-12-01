@extends('layouts.app')

@section('title', 'Crear Estadi')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Crear Nou Estadi</h1>

    <div class="bg-white shadow-md rounded-lg p-6 max-w-2xl">
        <form method="POST" action="{{ route('estadis.store') }}">
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
                <label for="ciutat" class="block text-gray-700 font-bold mb-2">Ciutat</label>
                <input 
                    type="text" 
                    id="ciutat" 
                    name="ciutat" 
                    value="{{ old('ciutat') }}" 
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('ciutat') border-red-500 @enderror"
                    required
                >
                @error('ciutat')
                    <small class="text-red-500 text-sm">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-4">
                <label for="capacitat" class="block text-gray-700 font-bold mb-2">Capacitat</label>
                <input 
                    type="number" 
                    id="capacitat" 
                    name="capacitat" 
                    value="{{ old('capacitat') }}" 
                    min="0"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('capacitat') border-red-500 @enderror"
                    required
                >
                @error('capacitat')
                    <small class="text-red-500 text-sm">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-6">
                <label for="equip_principal" class="block text-gray-700 font-bold mb-2">Equip Principal</label>
                <input 
                    type="text" 
                    id="equip_principal" 
                    name="equip_principal" 
                    value="{{ old('equip_principal') }}" 
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('equip_principal') border-red-500 @enderror"
                    required
                >
                @error('equip_principal')
                    <small class="text-red-500 text-sm">{{ $message }}</small>
                @enderror
            </div>

            <div class="flex gap-4">
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Guardar
                </button>
                <a href="{{ route('estadis.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                    Cancel·lar
                </a>
            </div>
        </form>
    </div>
@endsection
