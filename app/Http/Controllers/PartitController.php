<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PartitController extends Controller
{
    // Dades inicials de partits (seed)
    public $partits = [
        [
            'local' => 'Barça Femení',
            'visitant' => 'Atlètic de Madrid',
            'data' => '2024-11-30',
            'resultat' => '',
        ],
        [
            'local' => 'Real Madrid Femení',
            'visitant' => 'Barça Femení',
            'data' => '2024-12-15',
            'resultat' => '0-3',
        ],
    ];

    /**
     * Mostra el llistat de partits.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $partits = Session::get('partits', $this->partits);
        return view('partits.index', compact('partits'));
    }

    /**
     * Mostra el formulari per crear un nou partit.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('partits.create');
    }

    /**
     * Guarda un nou partit validat en sessió.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'local' => 'required|min:2',
            'visitant' => 'required|min:2|different:local',
            'data' => 'required|date_format:Y-m-d',
            'resultat' => 'nullable|regex:/^\d+-\d+$/',
        ], [
            'local.required' => "L'equip local és obligatori.",
            'local.min' => "L'equip local ha de tenir almenys 2 caràcters.",
            'visitant.required' => "L'equip visitant és obligatori.",
            'visitant.min' => "L'equip visitant ha de tenir almenys 2 caràcters.",
            'visitant.different' => "L'equip visitant ha de ser diferent de l'equip local.",
            'data.required' => 'La data és obligatòria.',
            'data.date_format' => 'La data ha de tenir el format YYYY-MM-DD.',
            'resultat.regex' => 'El resultat ha de tenir el format: 0-0, 2-1, etc.',
        ]);

        $partits = Session::get('partits', $this->partits);
        $partits[] = $validated;
        Session::put('partits', $partits);

        return redirect()->route('partits.index')
                         ->with('success', 'Partit afegit correctament!');
    }
}
