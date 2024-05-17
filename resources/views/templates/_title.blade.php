<div class="page-title w-full max-w-3xl">
    <h1 class="text-3xl mt-8 mb-4 text-center">{{ $page->title }}</h1>
    {{-- <p class="text-body text-center text-slate-600">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla id
        quam at justo ullamcorper vulputate. Donec mattis aliquam urna
    </p> --}}
    <div class="flex items-center justify-center gap-4 mt-7 mb-10">
        <div class="flex w-12 h-12 rounded-full overflow-hidden">
            <img src="{{$page->author?->avatar}}" alt="user">
        </div>
        <div class="text-left">
            <h4 class="font-medium text-custom-lg text-dark mb-1"> {{ $page->author?->name }} </h4>
            <div class="flex items-center gap-1.5 text-sm text-slate-600">
                @isset($page->created_at)
                <p>{{ $page->created_at?->format('M d, Y') }}</p>
                @else
                <p>{{ $page->updated_at?->format('M d, Y') }}</p>
                @endisset
                <span class="flex w-[3px] h-[3px] rounded-full bg-dark-2"></span>
            </div>
        </div>
    </div>
</div>