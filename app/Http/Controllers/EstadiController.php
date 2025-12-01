<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EstadiController extends Controller
{
    // Array interno con datos iniciales
    protected $estadis = [
        [
            'nom' => 'Estadi Johan Cruyff',
            'ciutat' => 'Sant Joan Despí',
            'capacitat' => 6000,
            'equip_principal' => 'FC Barcelona Femení',
        ],
        [
            'nom' => 'Centro Deportivo Wanda Alcalá de Henares',
            'ciutat' => 'Alcalá de Henares',
            'capacitat' => 2800,
            'equip_principal' => 'Atlètic de Madrid Femení',
        ],
        [
            'nom' => 'Estadio Alfredo Di Stéfano',
            'ciutat' => 'Madrid',
            'capacitat' => 6000,
            'equip_principal' => 'Real Madrid Femení',
        ],
    ];

    /**
     * Muestra la lista de estadios.
     * 
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $estadis = Session::get('estadis', $this->estadis);
        return view('estadis.index', compact('estadis'));
    }

    /**
     * Muestra el formulario para crear un nuevo estadio.
     * 
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('estadis.create');
    }

    /**
     * Valida y guarda un nuevo estadio en sesión.
     * 
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|min:3',
            'ciutat' => 'required|min:2',
            'capacitat' => 'required|integer|min:0',
            'equip_principal' => 'required|min:3',
        ]);

        $estadis = Session::get('estadis', $this->estadis);
        $estadis[] = $validated;
        Session::put('estadis', $estadis);

        return redirect()->route('estadis.index')
            ->with('success', 'Estadi afegit correctament!');
    }
}
