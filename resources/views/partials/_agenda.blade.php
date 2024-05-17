@antlers
{{collection:agendas limit="4" status:in="published" sort="updated_at:desc|title:desc" as="agendas"}}
    {{ if no_results }}
    {{else}}
    <section class="w-full bg-slate-100 sm:p-6 dark:bg-gray-800">
        <div class="mx-auto max-w-screen-sm text-center lg:mb-16 mb-8">
            <h2 class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">{{$__('Agenda')$}}</h2>
            {{-- <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">We use an agile approach to test assumptions and connect with the needs of your audience early and often.</p> --}}
        </div> 
        <div class="mx-auto max-w-screen-xl p-4">
            <div class="relative w-full overflow-x-auto flex flex-col md:flex-row gap-8 justify-around text-center">
                <div class="hidden md:flex absolute border-blue-800 border-b border-dashed w-full top-[0.9rem]"></div>
                
                {{agendas}}
                <div class="flex-1 flex flex-col items-center z-10 before:hidden md:before:flex before:absolute before:border-l before:border-dashed before:h-[57px] before:top-0 before:border-blue-800">
                    <span class="flex text-blue-800 bg-blue-200 px-2 py-1 mb-10 rounded z-10">{{date_start | format('l, d F o')}}</span>
                    <span class="flex text-xs text-blue-800 bg-blue-200 px-2 py-1 rounded z-10">{{date_start | format('H:i')}} WIB</span>
                    <a href="{{url}}" class="mt-4 text-lg line-clamp-3">{{title}}</a>
                </div>
                {{/agendas}}
            </div>
        </div>
    </section>
    {{ /if }}
{{/collection:agendas}}
@endantlers