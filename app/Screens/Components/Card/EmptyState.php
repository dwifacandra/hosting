<?php

namespace App\Screens\Components\Card;

use Livewire\Component;

class EmptyState extends Component
{
    public $message;
    public $icon;

    public function render()
    {
        return view('components.card.empty-state');
    }
}
