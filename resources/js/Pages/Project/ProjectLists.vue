<template>
    <div class="mb-8 h-100">
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
                            <inertia-link :href="route('projects.create')" class="text-white ml-4 cursor-pointer focus:outline-none border border-transparent focus:border-gray-800 focus:shadow-outline-gray bg-black transition duration-150 ease-in-out hover:bg-indigo-600 w-8 h-8 rounded flex items-center justify-center">
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
</template>

<script>
    import JetDropdown from '@/Jetstream/Dropdown'
    import JetDropdownLink from '@/Jetstream/DropdownLink'
    import FilterPopup from '@/Jetstream/FilterPopup'
    import Popup from '@/Mixins/Index'

    export default {
        mixins: [Popup],

        props: ['projects'],
        
        components: {
            JetDropdown,
            JetDropdownLink,
            FilterPopup
        },
    }
</script>