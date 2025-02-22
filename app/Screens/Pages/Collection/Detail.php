<?php

namespace App\Screens\Pages\Collection;

use Livewire\Component;
use App\Enums\PostScope;
use App\Enums\PostStatus;
use App\Enums\SourceType;
use App\Models\Post;

class Detail extends Component
{
    public $link;
    public $slug;
    public $collection;
    public $relates;
    public $isVideo = false;
    public $isYoutube = false;

    public function mount($slug)
    {
        $this->link = url()->current();
        $this->slug = $slug;
        $this->collection =
            Post::where('slug', $this->slug)
            ->where('scope', '!=', PostScope::POST)
            ->where('status', PostStatus::PUBLISH)
            ->first();

        if (!$this->collection) {
            redirect()->route('landing-page');
        } else {
            $this->collection->increment('views');

            if (in_array($this->collection->scope, [
                PostScope::ANIMATION->value,
                PostScope::VIDEO->value
            ])) {
                $this->isVideo = true;
            }

            if ($this->collection->source === SourceType::YOUTUBE->value) {
                $this->isYoutube = true;
            }

            $this->relates =
                Post::related($this->collection->category_id)
                ->where('scope', '!=', PostScope::POST)->take(5)->get();
        }
    }

    public function like()
    {
        $this->collection->increment('likes');
    }

    public function dislike()
    {
        $this->collection->increment('dislikes');
    }

    public function copyToClipboard()
    {
        $this->dispatch('copy-link', link: $this->link);
    }

    public function render()
    {
        return view('pages.collection.detail', [
            'breadcrumbItems' => [
                ['label' => 'Home', 'url' => route('landing-page')],
                ['label' => 'Collection', 'url' => route('collection')],
                [
                    'label' => $this->collection->scope,
                    'url' => route('collection.scope', ['scope' => $this->collection->scope])
                ],
                [
                    'label' => $this->collection->category->name,
                    'url' => route('collection.category', [
                        'scope' => $this->collection->scope,
                        'category' => $this->collection->category->slug
                    ])
                ],
                ['label' => $this->collection->title, 'url' => null],
            ],
        ]);
    }
}
