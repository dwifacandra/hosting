<div>
    <livewire:components.navbar.breadcrumb :items="$breadcrumbItems" :width="'max-w-full'" />
    <div class="grid grid-cols-1 md:grid-cols-6">
        {{-- Sidebar --}}
        <div class="flex flex-col min-h-screen gap-4 p-4 bg-white border-e border-secondary-200">
            {{-- Scopes --}}
            <div class="flex flex-col gap-2">
                <h1 class="page-title-primary">
                    <a wire:navigate href="{{ route('collection') }}">Scopes</a>
                </h1>
                <nav class="flex flex-wrap gap-2">
                    @foreach ($scopes as $scopeItem)
                    <a wire:navigate wire:key="collection-scope-{{ $scopeItem->scope }}"
                        href="{{ route('collection.scope', ['scope' => $scopeItem->scope]) }}"
                        class="flex justify-center w-full text-sm capitalize">
                        <span class="flex-1 px-2 text-left border line-clamp-1 bg-secondary-100 dark:bg-secondary-800">
                            {{ $scopeItem->scope }}
                        </span>
                        <span class="px-1 text-center min-w-5 bg-secondary-950 text-secondary-50">
                            {{ $scopeItem->posts_count }}
                        </span>
                    </a>
                    @endforeach
                </nav>
            </div>
            {{-- Categories --}}
            @if ($categories->isNotEmpty())
            <div class="flex flex-col gap-2">
                <h1 class="page-title-primary">
                    <a wire:navigate href="{{ route('collection.scope', ['scope' => isset($scope) ? $scope : '/']) }}">
                        Categories
                    </a>
                </h1>
                <nav class="flex flex-wrap gap-2">
                    @foreach ($categories as $category)
                    <a wire:navigate wire:key="collection-category-{{ $category->id }}" href="{{ route('collection.category',
                    ['scope' => $category->scope, 'category' => $category->slug]) }}"
                        class="flex justify-center w-full text-sm capitalize">
                        <span class="flex-1 px-2 text-left border line-clamp-1 bg-secondary-100 dark:bg-secondary-800">
                            {{ $category->name }}
                        </span>
                        <span class="px-1 text-center min-w-5 bg-secondary-950 text-secondary-50">
                            {{ $category->posts_count }}
                        </span>
                    </a>
                    @endforeach
                </nav>
            </div>
            @endif
            {{-- Tags --}}
            @if ($tags->isNotEmpty())
            <div class="flex flex-col gap-2">
                <h1 class="page-title-primary">
                    <a wire:navigate href="{{ route('collection.scope', ['scope' => isset($scope) ? $scope : '/']) }}">
                        Tags
                    </a>
                </h1>
                <nav class="flex flex-wrap gap-1">
                    @foreach ($tags as $tag)
                    <a wire:navigate wire:key="collection-tag-{{ $tag->id }}" href="{{ route('collection.tag',
                    ['tag' => $tag->slug]) }}" class="inline-flex text-sm capitalize">
                        <span class="px-2 text-left border line-clamp-1 bg-secondary-100 dark:bg-secondary-800">
                            {{ $tag->name }}
                        </span>
                    </a>
                    @endforeach
                </nav>
            </div>
            @endif
        </div>
        {{-- Content --}}
        <div class="flex flex-col col-span-5 gap-4 p-2">
            <div class="grid grid-cols-4 gap-1 md:grid-cols-8">
                @foreach ($collections as $collection)
                <div wire:key="collection-item-{{ $collection->id }}"
                    class="overflow-hidden transition duration-200 ease-in delay-75 border shadow-md hover:shadow-lg border-neutral-200 dark:border-neutral-950">
                    <a href="
                    {{ route('collection.detail', [
                        'scope' => $collection->scope,
                        'category' => $collection->category->slug,
                        'slug' => $collection->slug
                    ]) }}" class="relative">
                        <img class="object-cover transition-transform duration-500 ease-in-out size-40 hover:scale-105"
                            src="{{ $collection->getFirstMediaUrl('collections','cover') }}"
                            alt="{{ $collection->title }}" />
                        @if (!$scope)
                        <span class="absolute capitalize text-xs top-0 px-1 py-0.5 z-[1] bg-rose-500/90 text-white">{{
                            $collection->scope }}</span>
                        @endif
                        <span
                            class="absolute capitalize text-xs bottom-0 inline-flex gap-1 right-0 px-1 py-0.5 z-[1]  text-white/90">
                            <x-icon name="fill.visibility" class="size-4 core-icon" />
                            {{ $collection->views }}
                        </span>
                    </a>
                </div>
                @endforeach
            </div>
            {{ $collections->links() }}
        </div>
    </div>
</div>