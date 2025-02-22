<?php

namespace App\Screens\Pages\Collection;

use Livewire\Component;
use App\Enums\PostScope;
use App\Enums\PostStatus;
use Livewire\WithPagination;
use App\Models\{Post, Category};
use Illuminate\Support\Facades\DB;

class ListCollection extends Component
{
    use WithPagination;

    public $scope;
    public $category;
    public $tag;

    public function render()
    {
        // Breadcrumb Initial
        $breadcrumb = [
            ['label' => 'Home', 'url' => route('landing-page')],
            ['label' => 'Collection', 'url' => route('collection')],
        ];

        // Scope Query
        $scopes = Post::select('scope', DB::raw('count(*) as posts_count'))
            ->where('scope', '!=', PostScope::POST)
            ->where('status', PostStatus::PUBLISH)
            ->groupBy('scope')
            ->get();

        // Category Query
        $categories = Category::whereHas('posts', function ($query) {
            $query
                ->where('status', PostStatus::PUBLISH)
                ->where('scope', '!=', PostScope::POST);
        })->withCount(['posts' => function ($query) {
            $query
                ->where('status', PostStatus::PUBLISH)
                ->where('scope', '!=', PostScope::POST);
        }]);

        // Tags Query
        $tags = Post::with('tags')->where('scope', '!=', PostScope::POST);

        // Collection Query
        $collections = Post::where('status', PostStatus::PUBLISH)
            ->where('scope', '!=', PostScope::POST)
            ->with(['category'])
            ->with(['media' => function ($query) {
                $query->where('collection_name', 'collections')
                    ->where('custom_properties->scope', 'cover');
            }])
            ->orderBy('created_at', 'desc');

        // isset scope
        if ($this->scope) {
            $breadcrumb[] = [
                'label' => $this->scope,
                'url' => route('collection.scope', ['scope' => $this->scope])
            ];
            $categories->where('scope', $this->scope);
            $tags->where('scope', $this->scope);
            $collections->where('scope', $this->scope);
        }

        // isset category
        if ($this->category) {
            $breadcrumb[] = ['label' => $this->category, 'url' => null];
            $categoryId = Category::where('slug', $this->category)->first();
            if ($categoryId) {
                $collections->where('category_id', $categoryId->id);
                $tags->where('category_id', $categoryId->id);
            }
        }

        // isset tag
        if ($this->tag) {
            $breadcrumb[] = ['label' => str_replace('-', ' ', $this->tag), 'url' => null];
            $collections->withAnyTagsOfAnyType([$this->tag]);
        }

        // fetch data
        $categories = $categories->take(25)->get();
        $tags = $tags->get()->pluck('tags')->flatten()->unique('slug');
        $collections = $collections->paginate(40);

        return view('pages.collection.list-collection', [
            'scopes' => $scopes,
            'categories' => $categories,
            'tags' => $tags,
            'collections' => $collections,
            'breadcrumbItems' => $breadcrumb
        ]);
    }
}
