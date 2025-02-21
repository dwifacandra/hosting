<?php

namespace App\Screens\Components\Navbar;

use Livewire\Component;

class Breadcrumb extends Component
{
    public $items;
    public $width;

    public function mount($items = [], $width = 'max-w-screen-xl')
    {
        $this->items = $items;
        $this->width = $width;
    }

    public function render()
    {
        return view('components.navbar.breadcrumb');
    }
}
