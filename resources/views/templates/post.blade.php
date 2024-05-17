<x-app-layout>
    <x-slot:title>{{$page->title}}</x-slot:title>
    <x-slot:seo>
        <meta name="title" content="{{$page->metadata_title}}">
        <meta name="description" content="{{$page->metadata_description}}">
        <meta name="keywords" content="{{implode(',', $page->metadata_meta_keywords ?? [])}}">
    </x-slot:seo>
    <main id="main" class="flex flex-col items-center">

        @include('partials._navbar')
            
        @if ($page->featured_image)
            <img class="featured_image w-full h-[420px] object-cover" src="{{ $page->featured_image }}" alt="">
        @endif
        <div class="page-title max-w-3xl">
            <h1 class="text-3xl mt-8 mb-4 text-center">{{ $page->title }}</h1>
            <p class="text-body text-center text-slate-600">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla id
                quam at justo ullamcorper vulputate. Donec mattis aliquam urna
            </p>
            <div class="flex items-center justify-center gap-4 mt-7 mb-10">
                <div class="flex w-12 h-12 rounded-full overflow-hidden">
                    <img src="{{$page->author?->avatar}}" alt="user">
                </div>
                <div class="text-left">
                    <h4 class="font-medium text-custom-lg text-dark mb-1"> {{ $page->author?->name }} </h4>
                    <div class="flex items-center gap-1.5 text-sm text-slate-600">
                        <p>{{ $page->created_at?->format('M d, Y') }}</p>
                        <span class="flex w-[3px] h-[3px] rounded-full bg-dark-2"></span>
                    </div>
                </div>
            </div>
        </div>
        <div id="content" class="max-w-3xl">
            <div class="flex gap-4 mb-4">
                @foreach ($page->tags as $tag)
                    <a class="text-sm text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900 px-3 py-1 rounded" href="{{$tag->url}}">{{$tag->title}}</a>
                @endforeach
            </div>
            @antlers
            {{ content }}
        
            {{ if type == "text" }}
                {{ text }}
            {{ elseif type == "related_posts" }}
                <div class="border rounded shadow-sm px-8 py-4">
                    <h3 class="!mt-0">Related Posts</h3>
                    <ul class="list-disc list-outside px-4 text-blue-600">
                        {{ posts }}
                            <li class="text-lg"><a href="{{url}}">{{title}}</a></li>
                        {{ /posts }}
                    </ul>
                </div>
            {{ elseif type == "embed_video" }}
                <iframe class="rounded-md overflow-hidden my-4 md:min-h-[430px] w-full" src="{{ video_url }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            {{ /if }}
            
            {{ /content }}
        
            @endantlers
        </div>

        @include('partials._footer')
        
    </main>
</x-app-layout>