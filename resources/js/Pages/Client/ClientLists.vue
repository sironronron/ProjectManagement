<template>
    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded h-auto mb-5">
        <div class="rounded-t mb-0 px-4 py-3 border-0">
            <div class="flex flex-col lg:flex-row justify-between items-start lg:items-stretch w-full">
                <div class="w-full lg:w-1/3 flex flex-col lg:flex-row items-start lg:items-center">
                    <div class="flex items-center">
                        <button @click="Popup(true)" class="text-gray-600 dark:text-gray-400 mr-2 p-2 border-transparent border bg-gray-100 dark:hover:bg-gray-600 dark:bg-gray-700 hover:bg-gray-200 cursor-pointer rounded focus:outline-none focus:border-gray-800 focus:shadow-outline-gray">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon cursor-pointer icon-tabler icon-tabler-settings" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <circle cx="12" cy="12" r="3" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="w-full lg:w-2/3 flex flex-col lg:flex-row items-start lg:items-center justify-end">
                    <div class="lg:ml-6 flex items-center">
                        <button class="bg-gray-200 transition duration-150 ease-in-out focus:outline-none border border-transparent focus:border-gray-800 focus:shadow-outline-gray hover:bg-gray-300 rounded text-black px-5 h-8 flex items-center text-sm">Download All</button>
                        <inertia-link :href="route('clients.create')" class="text-white ml-4 cursor-pointer focus:outline-none border border-transparent focus:border-gray-800 focus:shadow-outline-gray bg-black transition duration-150 ease-in-out hover:bg-indigo-600 w-8 h-8 rounded flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg>
                        </inertia-link>
                    </div>
                </div>
            </div>
        </div>
        <div class="block w-full overflow-x-auto">
            <!-- Projects table -->
            <table class="items-center w-full bg-transparent border-collapse">
                <thead>
                    <tr>
                        <th class="px-6 bg-gray-50 text-gray-500 align-middle border border-solid border-gray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            Company Name
                        </th>
                        <th class="px-6 bg-gray-50 text-gray-500 align-middle border border-solid border-gray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            Account Owner
                        </th>
                        <th class="px-6 bg-gray-50 text-gray-500 align-middle border border-solid border-gray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            Projects
                        </th>
                        <th class="px-6 bg-gray-50 text-gray-500 align-middle border border-solid border-gray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            Invoices
                        </th>
                        <th class="px-6 bg-gray-50 text-gray-500 align-middle border border-solid border-gray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            Tags
                        </th>
                        <th class="px-6 bg-gray-50 text-gray-500 align-middle border border-solid border-gray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            Status
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(client, key) in clients.data" :key="key" class="cursor-pointer hover:bg-gray-100">
                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                            <inertia-link :href="route('clients.show', client.unique_id)">
                                <div class="flex items-center">
                                    <div v-if="client.company_photo != 'client_default.png'">
                                        <img class="w-10 h-10 object-cover" :src="client.company_photo" :alt="client.company_name">
                                    </div>
                                    <div v-else>
                                        <img src="https://cdn.tuk.dev/assets/templates/olympus/projects.png" :alt="client.company_name" class="w-10 h-10 object-cover">
                                    </div>
                                    <div class="pl-4">
                                        <p>{{ client.company_name }}</p>
                                        <p class="text-xs leading-3 text-gray-600 mt-1">{{ client.category.name }}</p>
                                    </div>
                                </div>
                            </inertia-link>
                        </td>
                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                            <div class="flex items-center">
                                <div class="h-8 w-8">
                                    <img :src="client.owner.profile_photo_url" alt="" class="h-full w-full rounded-full overflow-hidden shadow" />
                                </div>
                                <p class="ml-2 text-gray-800 dark:text-gray-100 tracking-normal leading-4 text-sm">{{ client.owner.name }}</p>
                            </div>
                        </td>
                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                            <p class="font-medium">{{ client.project_count }} Project (s)</p>
                        </td>
                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                            <p class="font-medium">---</p>
                            <!-- <p class="font-medium">$13,000</p>
                            <p class="text-xs leading-3 text-gray-600 mt-2">$4,200 left</p> -->
                        </td>
                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                            <p class="text-xs leading-3 text-gray-600 mt-2">---</p>
                        </td>
                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                            <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none rounded capitalize" :class="client.client_status == 'active' ? 'text-green-100 bg-green-400' : 'text-red-100 bg-red-400'">
                                {{ client.client_status }}
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div v-if="clients.data.length == 0" class="py-4">
                <p class="text-leading text-sm text-gray-400 text-center">
                    There's no record of clients yet!
                </p>
            </div>
        </div>
        <filter-popup>
            <template #header>
                Filter Clients
            </template>
        </filter-popup>
    </div>
</template>

<script>
    import JetDropdown from '@/Jetstream/Dropdown'
    import JetDropdownLink from '@/Jetstream/DropdownLink'
    import FilterPopup from '@/Jetstream/FilterPopup'
    import Popup from '@/Mixins/Index'
    import Pagination from '@/Jetstream/Pagination'

    export default {
        mixins: [Popup],

        props: ['clients'],
        
        components: {
            JetDropdown,
            JetDropdownLink,
            FilterPopup,
            Pagination
        },
    }
</script>