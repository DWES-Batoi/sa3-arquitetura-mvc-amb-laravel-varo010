@extends('layouts.app')

@section('title', 'Estadis')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Llistat d'Estadis</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('estadis.create') }}"
        class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4">
        + Nou estadi
    </a>

    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Nom</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Ciutat</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Capacitat
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Equip
                        Principal</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($estadis as $estadi)
                    <x-estadi :nom="$estadi['nom']"
                    :ciutat="$estadi['ciutat']"
                    :capacitat="$estadi['capacitat']"
                    :equip-principal="$estadi['equip_principal']"
                    />
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">No hi ha estadis disponibles</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection