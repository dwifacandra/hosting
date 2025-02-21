<div class="flex flex-col px-4 gap-y-4">
    <div class="flex items-center justify-between">
        <h1 class="page-title-primary">Posts</h1>
        <a href="{{ route('collection') }}" class="text-sm core-b-secondary">All Posts</a>
    </div>
    @if ($posts->isEmpty())
    <livewire:components.card.empty-state />
    @endif
    <div class="grid grid-cols-5 gap-2">
        @foreach ($posts as $post)
        <div class="flex flex-col bg-white border shadow-sm border-secondary-200 hover:shadow-md">
            <a class="relative">
                <span class="absolute capitalize text-sm top-0 px-2 py-1 z-[1] bg-rose-500/90 text-white">{{
                    Str::words($post->category->name, 3) }}</span>
                <img class="object-cover w-full h-52" src="{{ $post->getFirstMediaUrl('collections','cover') }}"
                    alt="{{ $post->title }}" />
                <h2 class="p-2 text-base font-semibold border-b border-secondary-200">{{ Str::words($post->title, 8) }}
                </h2>
                <p class="p-2 text-sm text-wrap">{{ Str::words(strip_tags($post->content), 15) }}
                </p>
                <div class="inline-flex flex-wrap gap-2 p-2 text-sm">
                    @foreach ($post->tags as $tag)
                    <span class="px-2 bg-white rounded-sm ring-1 ring-secondary-300">{{ $tag->name }}</span>
                    @endforeach
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>