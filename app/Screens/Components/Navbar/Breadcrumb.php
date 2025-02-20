<?php

namespace App\Screens\Components\Navbar;

use Livewire\Component;

class Breadcrumb extends Component
{
    public $items = [];

    public function mount($items = null)
    {
        $this->items = $items;
    }

    public function render()
    {
        return view('components.navbar.breadcrumb');
    }
}
