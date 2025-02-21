<?php

namespace App\Screens\Components\Navbar;

use App\Models\Post;
use Livewire\Component;
use App\Enums\PostScope;

class BottomNavigation extends Component
{
    public $collections;
    public $featured;

    public function mount()
    {
        $this->collections = array_filter(PostScope::cases(), function ($case) {
            return $case !== PostScope::POST;
        });

        $this->featured = Post::related()->take(4)->get();
    }

    public function render()
    {
        return view('components.navbar.bottom-navigation');
    }
}
