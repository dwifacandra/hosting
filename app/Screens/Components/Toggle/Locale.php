<?php

namespace App\Screens\Components\Toggle;

use Livewire\Component;
use Illuminate\Support\Facades\{App, Session};

class Locale extends Component
{
    public $locale;
    public function mount()
    {
        $this->locale = session('locale', config('app.locale'));
    }
    public function switch($locale): void
    {
        if (in_array($locale, ['en', 'id'])) {
            Session::put('locale', $locale);
            App::setLocale($locale);
            $this->dispatch('locale-changed', ['locale' => $locale]);
        } else {
            App::setLocale(config('app.locale'));
        }
    }
    public function render()
    {
        return view('components.toggle.locale');
    }
}
