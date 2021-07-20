<template>
    <app-layout>
        <alerts :flash="$page.props.flash" />
        
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ client.company_name }} <span class="text-gray-200 mx-5">|</span> Notes
            </h2>
        </template>

        <div>
            <client-details :client="client" />

            <!-- Notes -->
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-4">
                        Notes
                    </h2>
                </div>
                <div class="float-right">
                    <button @click="Popup(true)" class="text-white ml-4 cursor-pointer focus:outline-none border border-transparent focus:border-gray-800 focus:shadow-outline-gray bg-black transition duration-150 ease-in-out hover:bg-indigo-600 w-8 h-8 rounded flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <line x1="12" y1="5" x2="12" y2="19" />
                            <line x1="5" y1="12" x2="19" y2="12" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <div v-for="(note, key) in notes.data" :key="key" class="rounded">
                    <inertia-link :href="route('client_notes.show', { client_id: client.unique_id, client_note_id: note.unique_id })">
                        <div class="w-full h-64 flex flex-col justify-between bg-white rounded-lg shadow mb-6 py-5 px-4 transition duration-300 ease-in-out hover:shadow-lg">
                            <div>
                                <h4 class="text-gray-800 font-bold mb-3">
                                    {{ note.title }}
                                </h4>
                                <p class="text-gray-800 text-sm">
                                    {{ note.subtitle }}
                                </p>
                            </div>
                            <div class="w-full flex flex-col items-start">
                                <div class="flex items-center justify-between text-gray-800 w-full">
                                    <p class="text-sm">
                                        {{ note.created_at }}
                                    </p>
                                    <div class="w-8 h-8 rounded-full bg-gray-800 text-white flex items-center justify-center">
                                        <inertia-link :href="route('client_notes.edit', { client_id: client.unique_id, client_note_id: note.unique_id })">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z"></path>
                                                <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                                                <line x1="13.5" y1="6.5" x2="17.5" y2="10.5"></line>
                                            </svg>
                                        </inertia-link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </inertia-link>
                </div>
            </div>

            <pagination class="my-5" :links="notes.links" />
        </div>
        <popup-new-note :client="client" />
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import ClientDetails from './ClientDetails'
    import Popup from '@/Mixins/Index'
    import Pagination from '@/Jetstream/Pagination'
    import PopupNewNote from './Partials/PopupNewNote'
    import Alerts from '@/Jetstream/Alerts'
    
    export default {
        mixins: [Popup],
        
        props: ['client', 'notes'],
        
        components: {
            AppLayout,
            ClientDetails,
            Pagination,
            PopupNewNote,
            Alerts
        }
    }
</script>