<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Jugadora extends Component
{
    public $nom;
    public $equip;
    public $posicio;

    public function __construct($nom = '', $equip = '', $posicio = '')
    {
        $this->nom = $nom;
        $this->equip = $equip;
        $this->posicio = $posicio;
    }

    public function render()
    {
        return view('components.jugadora');
    }
}
