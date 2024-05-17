<x-app-layout>
    <x-slot:title>{{$page->title}}</x-slot:title>
    <x-slot:seo>
        <meta name="title" content="{{$page->metadata_title}}">
        <meta name="description" content="{{$page->metadata_description}}">
        <meta name="keywords" content="{{implode(',', $page->metadata_keywords ?? [])}}">
    </x-slot:seo>
    <main id="main" class="flex flex-col items-center">

        @include('partials._navbar')
            
        <div class="page-title w-full max-w-3xl">
            <h1 class="text-3xl mt-8 mb-4 text-center">{{ $page->title }}</h1>
            <p class="text-body text-center text-slate-600">
                Start on <span class="font-semibold text-blue-800">{{$page->date_start->format('l, d F Y')}}</span>
                <span class="font-semibold text-xs text-blue-800 bg-blue-200 px-2 py-1 rounded">{{$page->date_start->format('H:i')}}</span>
            </p>
            <div class="mt-4 mb-8 text-center">
                <span class="inline-flex gap-2 text-blue-800 text-sm bg-blue-200 rounded py-1 px-2">
                    <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z" clip-rule="evenodd"/>
                    </svg>                      
                    {{$page->address}}
                </span>
            </div>
            
            {{-- <div class="flex items-center justify-center gap-4 mt-7 mb-10">
                <div class="flex w-12 h-12 rounded-full overflow-hidden">
                    <img src="{{$page->updated_by?->avatar}}" alt="user">
                </div>
                <div class="text-left">
                    <h4 class="font-medium text-custom-lg text-dark mb-1"> {{ $page->updated_by?->name }} </h4>
                    <div class="flex items-center gap-1.5 text-sm text-slate-600">
                        @isset($page->created_at)
                        <p>{{ $page->created_at?->format('M d, Y') }}</p>
                        @else
                        <p>{{ $page->updated_at?->format('M d, Y') }}</p>
                        @endisset
                        <span class="flex w-[3px] h-[3px] rounded-full bg-dark-2"></span>
                    </div>
                </div>
            </div> --}}
        </div>
        <div id="content" class="max-w-3xl">

            @antlers
            {{ content }}        
            @endantlers

            @isset($page->attach_file)
            <iframe class="rounded-md overflow-hidden my-4 md:min-h-[768px] w-full" src="{{ $page->attach_file }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            @endisset
        </div>

        @include('partials._footer')
        
    </main>
</x-app-layout>