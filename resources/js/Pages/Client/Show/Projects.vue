<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ client.company_name }} <span class="text-gray-200 mx-5">|</span> Projects
            </h2>
        </template>

        <div class="py-12 max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
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
                                    <th class="px-6 bg-gray-50 text-gray-500 align-middle border border-solid border-gray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="cursor-pointer hover:bg-gray-100">
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10">
                                                <img class="w-full h-full" src="https://cdn.tuk.dev/assets/templates/olympus/projects.png">
                                            </div>
                                            <div class="pl-4">
                                                <p class="font-medium font-semibold">UX Design &amp; Visual Strategy</p>
                                                <p class="text-xs leading-3 text-gray-600 pt-2">Herman Group</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                        <p class="text-sm font-medium leading-none text-gray-800">72%</p>
                                        <div class="w-24 h-3 bg-gray-100 rounded-full mt-2">
                                            <div class="w-20 h-3 bg-green-300 rounded-full"></div>
                                        </div>
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        <p class="font-medium">32/47</p>
                                        <p class="text-xs leading-3 text-gray-600 mt-2">5 tasks pending</p>
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        <p class="font-medium">$13,000</p>
                                        <p class="text-xs leading-3 text-gray-600 mt-2">$4,200 left</p>
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        <p class="font-medium">22.12.21</p>
                                        <p class="text-xs leading-3 text-gray-600 mt-2">34 days</p>
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        <div class="flex -space-x-1 overflow-hidden mt-2">
                                            <img class="inline-block h-8 w-8 rounded-full ring-2 ring-white object-cover" src="https://cdn.tuk.dev/assets/templates/olympus/projects(8).png" alt="">
                                            <img class="inline-block h-8 w-8 rounded-full ring-2 ring-white object-cover" src="https://cdn.tuk.dev/assets/templates/olympus/projects(9).png" alt="">
                                            <img class="inline-block h-8 w-8 rounded-full ring-2 ring-white object-cover" src="https://cdn.tuk.dev/assets/templates/olympus/projects(10).png" alt="">
                                            <img class="inline-block h-8 w-8 rounded-full ring-2 ring-white object-cover" src="https://cdn.tuk.dev/assets/templates/olympus/projects(11).png" alt="">
                                        </div>
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        <jet-dropdown align="right" width="60">
                                            <template #trigger>
                                                <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                        <path d="M4.16667 10.8334C4.62691 10.8334 5 10.4603 5 10.0001C5 9.53984 4.62691 9.16675 4.16667 9.16675C3.70643 9.16675 3.33334 9.53984 3.33334 10.0001C3.33334 10.4603 3.70643 10.8334 4.16667 10.8334Z" stroke="#A1A1AA" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M10 10.8334C10.4602 10.8334 10.8333 10.4603 10.8333 10.0001C10.8333 9.53984 10.4602 9.16675 10 9.16675C9.53976 9.16675 9.16666 9.53984 9.16666 10.0001C9.16666 10.4603 9.53976 10.8334 10 10.8334Z" stroke="#A1A1AA" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M15.8333 10.8334C16.2936 10.8334 16.6667 10.4603 16.6667 10.0001C16.6667 9.53984 16.2936 9.16675 15.8333 9.16675C15.3731 9.16675 15 9.53984 15 10.0001C15 10.4603 15.3731 10.8334 15.8333 10.8334Z" stroke="#A1A1AA" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </button>
                                            </template>

                                            <template #content>
                                                <div class="w-60 z-30">
                                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                                        Manage Client
                                                    </div>

                                                    <jet-dropdown-link :href="route('teams.show', $page.props.user.current_team)">
                                                        Edit
                                                    </jet-dropdown-link>

                                                    <jet-dropdown-link :href="route('teams.show', $page.props.user.current_team)">
                                                        <span class="text-red">
                                                            Delete
                                                        </span>
                                                    </jet-dropdown-link>
                                                </div>
                                            </template>
                                        </jet-dropdown>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- <div class="py-4">
                            <p class="text-leading text-sm text-gray-400 text-center">
                                Client doesn't have any registered users yet!
                            </p>
                        </div> -->
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
        props: ['client'],

        components: {
            AppLayout,
            ClientDetails,
            JetDropdown,
            JetDropdownLink
        }
    }
</script>