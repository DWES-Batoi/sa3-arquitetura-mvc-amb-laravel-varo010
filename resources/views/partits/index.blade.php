@extends('layouts.app')

@section('title', 'Partits')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Llistat de Partits</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('partits.create') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4">
        + Nou partit
    </a>

    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Local</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Visitant</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Data</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Resultat</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($partits as $partit)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <x-equip-mini :nom="$partit['local']" />
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <x-equip-mini :nom="$partit['visitant']" />
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $partit['data'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $partit['resultat'] ?: '-' }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">No hi ha partits disponibles</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
