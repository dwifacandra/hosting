<footer class="text-sm">
    <div class="bg-secondary-100 dark:bg-secondary-950">
        <div class="grid max-w-screen-xl grid-cols-2 gap-4 px-6 py-8 mx-auto border-b md:grid-cols-4 lg:grid-cols-6">
            <div class="space-y-4">
                <h2 class="page-subtitle-secondary">About</h2>
                <div class="space-y-2 text-secondary-700 dark:text-secondary-200">
                    <p> <a href="{{ route('about.whoami') }}" class="core-b-secondary">Who Am I</a> </p>
                    <p> <a href="{{ route('about') }}#contact" class="core-b-secondary">Contact</a> </p>
                    <p> <a href="{{ asset('sitemap.xml') }}" class="core-b-secondary">Sitemap</a> </p>
                </div>
            </div>
            <div class="space-y-4">
                <h2 class="page-subtitle-secondary">Collections</h2>
                <div class="space-y-2 capitalize text-secondary-700 dark:text-secondary-200">
                    @foreach ($collections as $collection)
                    <p>
                        <a href="{{ route('collection.scope',['scope' => $collection->value]) }}"
                            class="core-b-secondary">
                            {{ $collection->value }}
                        </a>
                    </p>
                    @endforeach
                </div>
            </div>
            <div class="space-y-4">
                <h2 class="page-subtitle-secondary">Featured</h2>
                <div class="space-y-2 capitalize text-secondary-700 dark:text-secondary-200">
                    @foreach ($featured as $featuredItem)
                    <p class="line-clamp-1">
                        <a href="{{ route('collection.detail',[
                            'scope'=> $featuredItem->scope,
                            'category' => $featuredItem->category->slug,
                            'slug' => $featuredItem->slug
                        ]) }}" class="core-b-secondary">
                            {{ $featuredItem->title }}
                        </a>
                    </p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="bg-secondary-200 dark:bg-secondary-950">
        <div class="flex items-center justify-between max-w-screen-xl px-4 py-1 mx-auto">
            &copy; {{ \Carbon\Carbon::now()->year }} {{ config('app.name') }}. All rights reserved.
            <livewire:components.dropdown.locale />
        </div>
    </div>
</footer>