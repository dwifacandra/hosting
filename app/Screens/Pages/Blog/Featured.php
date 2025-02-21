<?php

namespace App\Screens\Pages\Blog;

use App\Models\Post;
use Livewire\Component;
use App\Enums\PostScope;
use App\Enums\PostStatus;

class Featured extends Component
{
    public $posts;

    public function mount()
    {
        $this->posts =
            Post::where('status', PostStatus::PUBLISH)
            ->where('scope', PostScope::POST)
            ->with(['media' => function ($query) {
                $query
                    ->where('collection_name', 'collections')
                    ->where('custom_properties->scope', 'cover');
            }])
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();
    }

    public function render()
    {
        return view('pages.blog.featured');
    }
}
