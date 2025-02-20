<?php

namespace App\Screens\Components\Jumbotron;

use App\Models\Skill;
use Livewire\Component;

class Personal extends Component
{
    public $messages;
    public function mount()
    {
        $this->messages = [
            'Fullstack Developer',
            'Frontend Developer',
            'Backend Developer',
            'Data Analysis',
        ];
        $skills = Skill::all();
        foreach ($skills as $skill) {
            $this->messages[] = $skill->name;
        }
    }
    public function render()
    {
        return view('components.jumbotron.personal');
    }
}
