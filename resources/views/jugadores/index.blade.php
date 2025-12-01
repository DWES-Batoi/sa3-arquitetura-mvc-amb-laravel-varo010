@extends('layouts.app')

@section('title', 'Jugadores')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Llistat de Jugadores</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('jugadores.create') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4">
        + Nova jugadora
    </a>

    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Nom</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Equip</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Posició</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($jugadores as $jugadora)
                    <x-jugadora 
                        :nom="$jugadora['nom']"
                        :equip="$jugadora['equip']"
                        :posicio="$jugadora['posicio']"
                    />
                @empty
                    <tr>
                        <td colspan="3" class="px-6 py-4 text-center text-gray-500">No hi ha jugadores disponibles</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
