<?php

namespace App\Screens\Pages\About;

use Livewire\Component;
use App\Models\Category;
use App\Models\Company;

class WhoAmI extends Component
{
    public $skillGroups;
    public $companies;
    public function mount()
    {
        $this->skillGroups = Category::has('skills')
            ->where('scope', 'skill')
            ->with('skills')
            ->get()
            ->sortByDesc(function ($category) {
                return $category->skills->count();
            });
        $this->companies = Company::has('experiences')
            ->with(['media' => function ($query) {
                $query->where('collection_name', 'companies')
                    ->where('custom_properties->scope', 'logo');
            }])
            ->with(['experiences' => function ($query) {
                $query
                    ->orderBy('end_date', 'desc');
            }])
            ->take(5)
            ->get()
            ->sortByDesc(function ($company) {
                return $company->experiences->max('end_date');
            })
            ->values();
    }
    public function render()
    {
        return view('pages.about.whoami', [
            'breadcrumbItems' => [
                ['label' => 'Home', 'url' => route('landing-page')],
                ['label' => 'About', 'url' => route('about')],
                ['label' => 'Who Am I', 'url' => null],
            ],
        ])->title('About');
    }
}
