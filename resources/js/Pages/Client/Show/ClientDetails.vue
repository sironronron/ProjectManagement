<template>
    <div>
        <div class="mb-4 bg-white rounded shadow p-5">
            <div class="flex flex-wrap items-center content-between">
                <div class="w-16 h-16">
                    <img class="w-full h-full" src="https://cdn.tuk.dev/assets/templates/olympus/projects.png">
                </div>
                <div class="pl-4">
                    <p class="font-medium">{{ client.company_name }}</p>
                    <p class="text-xs leading-3 text-gray-600 pt-2">{{ client.category.name }}</p>
                </div>
                <div class="pl-0 md:pl-12 mt-6 md:mt-0">
                    <span class="text-gray-400 text-xs uppercase">Account Owner</span>
                    <div class="flex items-center mt-2 md:mt-0">
                        <div class="h-8 w-8">
                            <img :src="client.owner.profile_photo_url" alt="" class="h-full w-full rounded-full overflow-hidden shadow" />
                        </div>
                        <p class="ml-4 text-gray-800 dark:text-gray-100 tracking-normal leading-4 text-sm">{{ client.owner.name }}</p>
                    </div>
                </div>
                <div class="pl-0 md:pl-12 mt-6 md:mt-0 w-full md:w-auto">
                    <div class="text-gray-400 text-xs uppercase">Status</div>
                    <div class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none rounded capitalize mt-2 md:mt-2" :class="client.client_status == 'active' ? 'text-green-100 bg-green-400' : 'text-red-100 bg-red-400'">
                        {{ client.client_status }}
                    </div>
                </div>
                <div class="pl-0 md:pl-12 mt-6 md:mt-0 w-full md:w-auto">
                    <div class="text-gray-400 text-xs uppercase">Invoices</div>
                    <p class="font-medium mt-2 md:mt-2">$13,000 / <span class="text-xs leading-3 text-gray-600">$4,200 left</span></p>
                </div>
                <div class="pl-0 md:pl-12 mt-6 md:mt-0 w-full md:w-auto">
                    <div class="text-gray-400 text-xs uppercase">Projects</div>
                    <p class="font-medium mt-2 md:mt-2">1 Project (s)</p>
                </div>
            </div>
        </div>
        <div class="mb-8 px-4 xl:px-0 bg-white rounded shadow pt-5">
            <ul class="hidden text-lg md:flex items-center">
                <inertia-link :href="route('clients.show', client.unique_id)" preserve-scroll>
                    <li :class="route().current('clients.show') ? 'border-b-4 border-indigo-600' : 'cursor-pointer'" class="pb-3 text-yellow-600 px-5 flex items-center">
                        <p class="text-base text-gray-700">
                            Dashboard
                        </p>
                    </li>
                </inertia-link>

                <inertia-link :href="route('clients.show.users', client.unique_id)" preserve-scroll>
                    <li :class="route().current('clients.show.users') || route().current('client_users.edit') ? 'border-b-4 border-indigo-600' : 'cursor-pointer'" class="cursor-pointer pb-3 text-yellow-600 px-5 flex items-center ml-2">
                        <p class="text-base text-gray-700">
                            Users
                        </p>
                    </li>
                </inertia-link>

                <inertia-link :href="route('clients.show.projects', client.unique_id)" preserve-scroll>
                    <li :class="route().current('clients.show.projects') ? 'border-b-4 border-indigo-600' : 'cursor-pointer'" class="cursor-pointer pb-3 text-yellow-600 px-5 flex items-center ml-2">
                        <p class="text-base text-gray-700">
                            Projects
                        </p>
                    </li>
                </inertia-link>

                <inertia-link :href="route('clients.show.files', client.unique_id)" preserve-scroll>
                    <li :class="route().current('clients.show.files') ? 'border-b-4 border-indigo-600' : 'cursor-pointer'"  class="cursor-pointer pb-3 text-yellow-600 px-5 flex items-center ml-2">
                        <p class="text-base text-gray-700">
                            Files
                        </p>
                    </li>
                </inertia-link>

                <inertia-link :href="route('clients.show.notes', client.unique_id)" preserve-scroll>
                    <li :class="route().current('clients.show.notes') || route().current('client_notes.edit') || route().current('client_notes.show') ? 'border-b-4 border-indigo-600' : 'cursor-pointer'"  class="cursor-pointer pb-3 text-yellow-600 px-5 flex items-center ml-2">
                        <p class="text-base text-gray-700">
                            Notes
                        </p>
                    </li>
                </inertia-link>
            </ul>
        </div>
        <!-- <div class="flex w-full justify-between md:hidden my-10 items-center border-b border-gray-500">
            <p class="text-yellow-600 border-b-2 border-yellow-600  text-xs"><a href="#">Todos</a></p>
            <p class="text-gray-700 text-xs"><a href="#">Notes</a></p>
            <p class="text-gray-700 text-xs"><a href="#">Links</a></p>
            <p class="text-gray-700 text-xs"><a href="#">Files</a></p>
        </div> -->
    </div>
</template>

<script>
    export default {
        props: ['client'],        
    }
</script>
    