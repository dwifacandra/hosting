<?php

namespace App\Screens\Pages\Animation;

use App\Models\Animation;
use Livewire\Component;

class Detail extends Component
{
    public $link;
    public $slug;
    public $collection;
    public $relates;

    public function mount($slug)
    {
        $this->link = url()->current();
        $this->slug = $slug;
        $this->collection = Animation::where('slug', $this->slug)->first();
        if (!$this->collection) {
            redirect()->route('landing-page');
        } else {
            $this->collection->increment('views');
        }
        $this->relates = Animation::related($this->collection->category_id)->take(5)->get();
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
        return view('pages.animation.detail', [
            'breadcrumbItems' => [
                ['label' => 'Home', 'url' => route('landing-page')],
                ['label' => 'Collection', 'url' => null],
                ['label' => 'Animation', 'url' => null],
                ['label' => $this->collection->category->name, 'url' => null],
                ['label' => $this->collection->title, 'url' => null],
            ],
        ]);
    }
}
