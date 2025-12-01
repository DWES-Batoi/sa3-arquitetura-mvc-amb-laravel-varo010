<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class JugadoraController extends Controller
{
    // Dades inicials de jugadores (seed)
    public $jugadores = [
        [
            'nom' => 'Alexia Putellas',
            'equip' => 'Barça Femení',
            'posicio' => 'Migcampista',
        ],
        [
            'nom' => 'Esther González',
            'equip' => 'Atlètic de Madrid',
            'posicio' => 'Davantera',
        ],
        [
            'nom' => 'Misa Rodríguez',
            'equip' => 'Real Madrid Femení',
            'posicio' => 'Portera',
        ],
    ];

    /**
     * Mostra el llistat de jugadores.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $jugadores = Session::get('jugadores', $this->jugadores);
        return view('jugadores.index', compact('jugadores'));
    }

    /**
     * Mostra el formulari per crear una nova jugadora.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $posicions = ['Portera', 'Defensa', 'Migcampista', 'Davantera'];
        return view('jugadores.create', compact('posicions'));
    }

    /**
     * Guarda una nova jugadora validada en sessió.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|min:3',
            'equip' => 'required|min:2',
            'posicio' => 'required|in:Portera,Defensa,Migcampista,Davantera',
        ], [
            'nom.required' => 'El nom és obligatori.',
            'nom.min' => 'El nom ha de tenir almenys 3 caràcters.',
            'equip.required' => "L'equip és obligatori.",
            'equip.min' => "L'equip ha de tenir almenys 2 caràcters.",
            'posicio.required' => 'La posició és obligatòria.',
            'posicio.in' => 'La posició ha de ser: Portera, Defensa, Migcampista o Davantera.',
        ]);

        $jugadores = Session::get('jugadores', $this->jugadores);
        $jugadores[] = $validated;
        Session::put('jugadores', $jugadores);

        return redirect()->route('jugadores.index')
                         ->with('success', 'Jugadora afegida correctament!');
    }
}
