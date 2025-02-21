<?php

namespace App\Screens\Pages\Collection;

use Livewire\Component;
use App\Enums\PostScope;
use App\Enums\PostStatus;
use App\Models\{Post, Category,};

class Featured extends Component
{
    public $collections;
    public $categories;

    public function mount()
    {
        $this->categories =
            Category::whereHas('posts', function ($query) {
                $query
                    ->where('status', PostStatus::PUBLISH)
                    ->where('scope', '!=', PostScope::POST);
            })
            ->withCount(['posts' => function ($query) {
                $query
                    ->where('status', PostStatus::PUBLISH)
                    ->where('scope', '!=', PostScope::POST);
            }])
            ->take(25)
            ->get();
        foreach ($this->categories as $category) {
            $category->collections =
                Post::where('status', PostStatus::PUBLISH)
                ->where('category_id', $category->id)
                ->where('scope', '!=', PostScope::POST)
                ->with(['media' => function ($query) {
                    $query
                        ->where('collection_name', 'collections')
                        ->where('custom_properties->scope', 'cover');
                }])
                ->orderBy('created_at', 'desc')
                ->take(32)
                ->get();
        }
    }

    public function render()
    {
        return view('pages.collection.featured');
    }
}
