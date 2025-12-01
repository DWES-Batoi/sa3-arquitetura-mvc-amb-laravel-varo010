<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Estadi extends Component
{
    public $nom;
    public $ciutat;
    public $capacitat;
    public $equipPrincipal;

    public function __construct($nom, $ciutat, $capacitat, $equipPrincipal)
    {
        $this->nom = $nom;
        $this->ciutat = $ciutat;
        $this->capacitat = $capacitat;
        $this->equipPrincipal = $equipPrincipal;
    }

    public function render()
    {
        return view('components.estadi');
    }
}
