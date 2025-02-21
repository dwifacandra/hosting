<div class="w-full">
    <livewire:components.navbar.breadcrumb :items="$breadcrumbItems" />
    <div class="grid max-w-screen-xl grid-cols-3 px-4 py-6 mx-auto gap-x-2 gap-y-4">
        @if ($isVideo)
        <div class="bg-white border shadow-sm col-span-full dark:bg-secondary">
            @if ($isYoutube)
            <iframe class="w-full h-[80vh]" src="https://www.youtube.com/embed/{{ $collection->source_url }}"
                frameborder="0" allowfullscreen></iframe>
            @else
            @foreach ($collection->getMedia('collections') as $index => $media)
            @if($media->getCustomProperty('scope') === 'attachment')
            <video controls class="w-full h-[80vh]">
                <source src="{{ $media->getTemporaryUrl(now()->addMinutes(5)) }}" type="video/mp4">
                Browser Anda tidak mendukung elemen video.
            </video>
            @endif
            @endforeach
            @endif
        </div>
        @else
        <div class="bg-white border shadow-sm col-span-full dark:bg-secondary">
            @foreach ($collection->getMedia('collections') as $index => $media)
            @if($media->getCustomProperty('scope') === 'attachment')
            <img class="object-contain transition-transform duration-500 ease-in-out cursor-zoom-in w-full h-[80vh]"
                src="{{ $media->getTemporaryUrl(now()->addMinutes(5)) }}" alt="{{ $collection->title }}" />
            @endif
            @endforeach
        </div>
        @endif
        <div
            class="flex flex-col justify-start p-4 bg-white border shadow-sm md:row-start-2 md:col-span-2 col-span-full dark:bg-secondary gap-y-4">
            <h1 class="px-4 py-2 -mx-4 -mt-4 text-base font-semibold border-b">{{ $collection->title }}
            </h1>
            <div class="flex flex-row items-center justify-between gap-2">
                <div class="flex gap-x-2">
                    <img src="{{ $collection->author->getFilamentAvatarUrl() }}" alt="{{ $collection->author->name }}"
                        class="rounded-full shrink-0 size-10">
                    <div class="flex flex-col">
                        <h2 class="text-sm font-semibold">{{ $collection->author->name }}</h2>
                        <span class="text-xs text-secondary-600">
                            {{ $collection->views }}x views
                        </span>
                    </div>
                </div>
                <div class="flex flex-row items-center justify-center gap-2" role="group">
                    <button wire:click="like" role="button" class="inline-flex gap-1 group">
                        <x-icon name="outline.thumb_up" class="size-4 shrink-0 group-hover:hidden" />
                        <x-icon name="fill.thumb_up" class="hidden size-4 shrink-0 group-hover:block" />
                        <span class="text-sm">{{ $collection->likes }}</span>
                    </button>
                    <button wire:click="dislike" role="button" class="inline-flex gap-1">
                        <x-icon name="outline.thumb_down" class="size-4 shrink-0" />
                    </button>
                    <button wire:click="copyToClipboard" role="button" class="inline-flex items-center gap-1">
                        <x-icon name="outline.library_books" class="size-4 shrink-0" />
                        <span class="text-sm">Copy</span>
                    </button>
                </div>
            </div>
            <div class="flex flex-wrap gap-x-1">
                @foreach ($collection->tags as $tag)
                <a href="{{ route('collection.tag', ['tag' => $tag->slug]) }}">
                    <span class="px-2 py-0.5 text-sm rounded-full bg-primary text-primary-50">
                        {{ $tag->name }}
                    </span>
                </a>
                @endforeach
            </div>
            <div class="text-sm">
                {!! $collection->content !!}
            </div>
        </div>
        <div
            class="flex flex-col justify-start p-4 bg-white border shadow-sm md:row-start-2 md:col-span-2 col-span-full dark:bg-secondary gap-y-4">
            <h1 class="px-4 py-2 -mx-4 -mt-4 font-medium border-b">Related Collections</h1>
            @foreach ($relates as $related)
            <a
                href="{{ route('collection.detail',
            ['scope' => $related->scope,'category' => Str::slug($related->category->name), 'slug' => $related->slug]) }}">
                <div wire:key="relate-{{ $related->id }}" class="flex gap-4">
                    <img class="object-cover size-24 shrink-0"
                        src="{{ $related->getFirstMediaUrl('collections','cover') }}" alt="{{ $related->title }}" />
                    <div class="flex flex-col flex-1 gap-1">
                        <h2 class="font-semibold line-clamp-2">{{ $related->title }}</h2>
                        <h3 class="text-sm font-medium text-secondary-600">{{ $related->author->name }}</h3>
                        <div class="inline-flex gap-1">
                            <span class="text-sm text-secondary-600">
                                {{ $related->views }}x views
                            </span> ·
                            <span class="text-sm text-secondary-600">
                                {{ $related->created_at->diffForHumans() }}
                            </span>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>
<script>
    window.addEventListener('copy-link', event => {
        const link = event.detail.link;
        navigator.clipboard.writeText(link).then(() => {
            alert('Copied ' + link);
        });
    });
</script>