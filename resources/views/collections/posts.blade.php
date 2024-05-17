<x-app-layout>
    <x-slot:title>Artikel</x-slot:title>
    <x-slot:seo>
        <meta name="title" content="">
        <meta name="description" content="">
        <meta name="keywords" content="">
    </x-slot:seo>
    
    @include('partials._navbar')

    <main id="main" class="flex flex-col items-center">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <section class="bg-white dark:bg-gray-900">
                <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
                    <div class="mx-auto max-w-screen-sm text-center lg:mb-16 mb-8">
                        <h2 class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Our Blog</h2>
                        <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">We use an agile approach to test assumptions and connect with the needs of your audience early and often.</p>
                    </div> 
                    <div class="grid gap-8 lg:grid-cols-3">
                        @antlers
                        {{ collection:posts paginate="3" as="posts"}}
                            {{ if no_results }}
                                <p class="text-center text-xl text-slate-400">Aww, there are no results.</p>
                            {{ /if }}
                            
                            {{posts}}
                                <article class="flex flex-col bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                                    <div class="p-6 flex justify-between items-center text-gray-500">
                                        <span class="bg-primary-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                            <svg class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"></path></svg>
                                            Tutorial
                                        </span>
                                        <span class="text-xs">{{created_at|format('d M Y')}}</span>
                                    </div>
                                    <img class="flex-1 max-w-full mb-5 object-cover" src="{{featured_image}}" alt="featured image">
                                    <div class="px-6 pb-6">
                                        <h2 class="mb-2 line-clamp-3 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><a href="{{url}}">{{title}}</a></h2>
                                        <p class="mb-5 font-light text-gray-500 dark:text-gray-400 line-clamp-3">{{summary}}</p>
                                        <div class="flex justify-between items-center">
                                            <div class="flex items-center space-x-4">
                                                <img class="w-7 h-7 rounded-full" src="{{author.avatar ?? "https://clarity-tailwind.preview.uideck.com/images/user-01.png"}}" alt="Jese Leos avatar" />
                                                <span class="font-medium dark:text-white">
                                                    {{author.name}}
                                                </span>
                                            </div>
                                            <a href="{{url}}" class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline">
                                                Read more
                                                <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                            </a>
                                        </div>
                                    </div>
                                </article>
                            {{/posts}}

                            {{ paginate }}
                            <div class="flex col-span-full">
                                {{if current_page > 1}}
                                <!-- Previous Button -->
                                <a href="{{prev_page}}" class="flex items-center justify-center px-4 h-10 text-base font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                    Previous
                                </a>
                                {{/if}}
                                
                                {{if total_pages > 1 && current_page < total_pages}}
                                <!-- Next Button -->
                                <a href="{{next_page}}" class="flex items-center justify-center px-4 h-10 ms-3 text-base font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                    Next
                                </a>
                                {{/if}}
                            </div>
                            {{ /paginate }}

                        {{ /collection:posts}}
                        @endantlers
                    </div>  
                </div>
            </section>
        </div>
    </main>

    @include('partials._footer')

</x-app-layout>