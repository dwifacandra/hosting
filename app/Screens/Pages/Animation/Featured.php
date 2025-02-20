<?php

namespace App\Screens\Pages\Animation;

use Livewire\Component;
use App\Enums\PostStatus;
use App\Models\{Animation, Category};

class Featured extends Component
{
    public $collections;
    public $categories;

    public function mount()
    {
        $this->categories =
            Category::where('scope', 'animation')
            ->whereHas('animations', function ($query) {
                $query->where('status', PostStatus::PUBLISH);
            })
            ->withCount(['animations' => function ($query) {
                $query->where('status', PostStatus::PUBLISH);
            }])
            ->get();
        foreach ($this->categories as $category) {
            $category->collections =
                Animation::where('status', PostStatus::PUBLISH)
                ->where('category_id', $category->id)
                ->with(['media' => function ($query) {
                    $query->where('collection_name', 'collections')
                        ->where('custom_properties->scope', 'cover');
                }])
                ->orderBy('created_at', 'desc')
                ->take(32)
                ->get();
        }
    }

    public function render()
    {
        return view('pages.animation.featured');
    }
}
