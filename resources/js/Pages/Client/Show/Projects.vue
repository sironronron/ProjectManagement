<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ client.company_name }} <span class="text-gray-200 mx-5">|</span> Projects
            </h2>
        </template>

        <div class="py-12 container mx-auto py-6">
            <client-details :client="client" />

            <!-- Project Lists -->
            <div class="mb-8 h-100">
                <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded h-auto mb-5">
                    <div class="rounded-t mb-0 px-4 py-3 border-0">
                        <div class="flex flex-wrap items-center">
                            <div class="relative w-full px-2 max-w-full flex-grow flex-1">
                                <h3 class="font-normal text-base text-gray-700">
                                    Project Lists
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="block w-full overflow-x-auto">
                        <!-- Projects table -->
                        <table class="items-center w-full bg-transparent border-collapse">
                            <thead>
                                <tr>
                                    <th class="px-6 bg-gray-50 text-gray-500 align-middle border border-solid border-gray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Project Name
                                    </th>
                                    <th class="px-6 bg-gray-50 text-gray-500 align-middle border border-solid border-gray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Progress
                                    </th>
                                    <th class="px-6 bg-gray-50 text-gray-500 align-middle border border-solid border-gray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Tasks
                                    </th>
                                    <th class="px-6 bg-gray-50 text-gray-500 align-middle border border-solid border-gray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Budget
                                    </th>
                                    <th class="px-6 bg-gray-50 text-gray-500 align-middle border border-solid border-gray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Deadline
                                    </th>
                                    <th class="px-6 bg-gray-50 text-gray-500 align-middle border border-solid border-gray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Members
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(project, key) in projects.data" :key="key" class="cursor-pointer hover:bg-gray-100">
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        <inertia-link :href="route('projects.show', project.unique_id)">
                                            <div class="flex items-center">
                                                <div class="w-10 h-10">
                                                    <img class="w-full h-full" src="https://cdn.tuk.dev/assets/templates/olympus/projects.png">
                                                </div>
                                                <div class="pl-4">
                                                    <p class="font-medium font-semibold">{{ project.name }}</p>
                                                    <p class="text-xs leading-3 text-gray-600 pt-2">{{ project.client.company_name }}</p>
                                                </div>
                                            </div>
                                        </inertia-link>
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                        <p class="text-sm font-medium leading-none text-gray-800">0%</p>
                                        <div class="w-24 h-3 bg-gray-100 rounded-full mt-2">
                                            <div class="w-20 h-3 bg-green-300 rounded-full"></div>
                                        </div>
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        <p class="font-medium">0/0</p>
                                        <p class="text-xs leading-3 text-gray-600 mt-2">0 tasks pending</p>
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        <p class="font-medium">{{ project.budget }}</p>
                                        <p class="text-xs leading-3 text-gray-600 mt-2">{{ project.remaining_budget }} left</p>
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        <p class="font-medium">{{ project.end_date }}</p>
                                        <p class="text-xs leading-3 text-gray-600 mt-2">{{ project.remaining_days }} days</p>
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        <div v-if="project.members.length != 0" class="flex-space-x-1 overflow-hidden mt-2">
                                            <img v-for="(member, key) in project.members" :key="key" class="inline-block h-6 w-6 rounded-full ring-2 ring-white object-cover" :src="member.profile_photo_url" :alt="member.name" :title="member.name">
                                        </div>
                                        <p v-else class="text-xs leading-3 text-gray-600">No Teams Associated Yet</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div v-if="projects.data.length == 0" class="py-4">
                            <p class="text-leading text-sm text-gray-400 text-center">
                                Client doesn't have any projects yet!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import ClientDetails from './ClientDetails'
    import JetDropdown from '@/Jetstream/Dropdown'
    import JetDropdownLink from '@/Jetstream/DropdownLink'

    export default {
        props: ['client', 'projects'],

        components: {
            AppLayout,
            ClientDetails,
            JetDropdown,
            JetDropdownLink
        }
    }
</script>