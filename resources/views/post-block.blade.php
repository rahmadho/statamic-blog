<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <div x-data="editor">
                    <template x-for="component in components">
                        <div draggable="true" x-html="component.content"></div>
                    </template>                    
                    <button class="me-2" @click="addComponent('text')">Tambah Teks</button>
                    <button class="me-2" @click="addComponent('image')">Tambah Gambar</button>
                </div>
            </div>
        </div>
    </div>


    <x-slot:script>
        <script>
            document.addEventListener('alpine:init', function() {
                Alpine.data('editor', () => ({
                    components: [],
                    addComponent(type) {
                        console.log(type);
                        if (type === 'text') {
                            this.components.push({ id: Date.now(), type: 'text', content: '<span class="text-red-200">Teks Baru</span>' });
                        } else if (type === 'image') {
                            this.components.push({ id: Date.now(), type: 'image', content: 'placeholder.jpg' });
                        }
                    }
                }));
            })
        </script>
    </x-slot:script>
</x-guest-layout>
