<x-app-layout>
    <x-slot:title>{{$page->title}}</x-slot:title>
    <main id="main" class="flex flex-col items-center">
        @foreach ($page->content as $content)
            @if ($content->type == 'text')
                {!! $content->text !!}
            @elseif($content->type == 'slider')
                <x-slot:styles>
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
                    <style>
                        .swiper {
                            max-height: 430px;
                            /* overflow: hidden; */
                        }
                    </style>
                </x-slot:styles>
                <x-slot:scripts>
                    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
                    <script>
                        const swiper = new Swiper('.swiper', {
                            // Optional parameters
                            direction: 'vertical',
                            loop: true,

                            // If we need pagination
                            // pagination: {
                            //     el: '.swiper-pagination',
                            // },

                            // Navigation arrows
                            navigation: {
                                nextEl: '.swiper-button-next',
                                prevEl: '.swiper-button-prev',
                            },

                            // And if we need scrollbar
                            // scrollbar: {
                            //     el: '.swiper-scrollbar',
                            // },
                        });
                    </script>
                </x-slot:scripts>
                <!-- Slider main container -->
                <div class="swiper">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                    <!-- Slides -->
                    @foreach ($content->sliders as $index => $slider)
                        <div class="swiper-slide">
                            <img class="w-full max-h-[430px] object-cover" src="{{$slider->image}}" alt="Slider {{$index}}">
                        </div>
                    @endforeach
                    </div>
                    <!-- If we need pagination -->
                    {{-- <div class="swiper-pagination"></div> --}}
                
                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>

                    <!-- If we need scrollbar -->
                    {{-- <div class="swiper-scrollbar"></div> --}}
                </div>
            @elseif($content->type == 'hero')
                @include('templates._hero', [
                    'title' => $content?->title,
                    'subtitle' => $content?->subtitle,
                    'link_label' => $content?->link_label,
                    'link_url' => $content?->link_url,
                    'image' => $content?->image
                ])
            @elseif($content->type == 'partial')
                @include($content->template)
            @endif
        @endforeach
    </main>
</x-app-layout>