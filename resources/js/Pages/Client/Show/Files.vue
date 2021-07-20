<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ client.company_name }} <span class="text-gray-200 mx-5">|</span> Files
            </h2>
        </template>

        <div>
            <client-details :client="client" />

            <!-- Links -->
            <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-4 mb-5">
                <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded h-100">
                    <div class="rounded-t mb-0 px-4 py-3 border-0">
                        <div class="flex flex-wrap items-center">
                            <div class="relative w-full px-2 max-w-full flex-grow flex-1">
                                <h3 class="font-normal text-base text-gray-700">
                                    Files
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
                                        File Name
                                    </th>
                                    <th class="px-6 bg-gray-50 text-gray-500 align-middle border border-solid border-gray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-right">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="cursor-pointer hover:bg-gray-100">
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        <div class="flex items-center w-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40"
                                                fill="none">
                                                <rect width="40" height="40" rx="4" fill="#EDF2F7"></rect>
                                                <path
                                                    d="M20.0002 10.3335L9.3335 15.6668L20.0002 21.0002L30.6668 15.6668L20.0002 10.3335"
                                                    stroke="#718096" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                </path>
                                                <path d="M9.3335 21L20.0002 26.3333L30.6668 21" stroke="#718096" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M9.3335 26.3335L20.0002 31.6668L30.6668 26.3335" stroke="#718096"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                            <h4 class="text-base text-light-dark pl-4">
                                                Fonts.zip
                                            </h4>
                                        </div>
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        <div class="flex items-center justify-end">
                                            <div class="mr-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" stroke="#718096" />
                                                </svg>
                                            </div>
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                    fill="none">
                                                    <path d="M4 7H20" stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M10 11V17" stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M14 11V17" stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M5 7L6 19C6 20.1046 6.89543 21 8 21H16C17.1046 21 18 20.1046 18 19L19 7"
                                                        stroke="#718096" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                    </path>
                                                    <path d="M9 7V4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V7"
                                                        stroke="#718096" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="cursor-pointer hover:bg-gray-100">
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        <div class="flex items-center w-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40"
                                                fill="none">
                                                <rect width="40" height="40" rx="4" fill="#C3DAFE"></rect>
                                                <path d="M22.6665 8V13.3333C22.6665 14.0697 23.2635 14.6667 23.9998 14.6667H29.3332"
                                                    stroke="#667EEA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                </path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M26.6665 32H13.3332C11.8604 32 10.6665 30.8061 10.6665 29.3333V10.6667C10.6665 9.19391 11.8604 8 13.3332 8H22.6665L29.3332 14.6667V29.3333C29.3332 30.8061 28.1393 32 26.6665 32Z"
                                                    stroke="#667EEA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                </path>
                                                <path d="M16 16.0002H17.3333" stroke="#667EEA" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                                <path d="M16 21.3332H24" stroke="#667EEA" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                                <path d="M16 26.6667H24" stroke="#667EEA" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </svg>
                                            <h4 class="text-base text-light-dark pl-4">
                                                Tasks list web app.docx
                                            </h4>
                                        </div>
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        <div class="flex items-center justify-end">
                                            <div class="mr-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" stroke="#718096" />
                                                </svg>
                                            </div>
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                    fill="none">
                                                    <path d="M4 7H20" stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M10 11V17" stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M14 11V17" stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M5 7L6 19C6 20.1046 6.89543 21 8 21H16C17.1046 21 18 20.1046 18 19L19 7"
                                                        stroke="#718096" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                    </path>
                                                    <path d="M9 7V4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V7"
                                                        stroke="#718096" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="cursor-pointer hover:bg-gray-100">
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        <div class="flex items-center w-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40"
                                                fill="none">
                                                <rect width="40" height="40" rx="4" fill="#C3DAFE"></rect>
                                                <path d="M22.6665 8V13.3333C22.6665 14.0697 23.2635 14.6667 23.9998 14.6667H29.3332"
                                                    stroke="#667EEA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                </path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M26.6665 32H13.3332C11.8604 32 10.6665 30.8061 10.6665 29.3333V10.6667C10.6665 9.19391 11.8604 8 13.3332 8H22.6665L29.3332 14.6667V29.3333C29.3332 30.8061 28.1393 32 26.6665 32Z"
                                                    stroke="#667EEA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                </path>
                                                <path d="M16 16.0002H17.3333" stroke="#667EEA" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                                <path d="M16 21.3332H24" stroke="#667EEA" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                                <path d="M16 26.6667H24" stroke="#667EEA" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </svg>
                                            <h4 class="text-base text-light-dark pl-4">
                                                API Documentation V3.docx
                                            </h4>
                                        </div>
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        <div class="flex items-center justify-end">
                                            <div class="mr-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" stroke="#718096" />
                                                </svg>
                                            </div>
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                    fill="none">
                                                    <path d="M4 7H20" stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M10 11V17" stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M14 11V17" stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M5 7L6 19C6 20.1046 6.89543 21 8 21H16C17.1046 21 18 20.1046 18 19L19 7"
                                                        stroke="#718096" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                    </path>
                                                    <path d="M9 7V4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V7"
                                                        stroke="#718096" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- <div v-if="users.length == 0" class="py-4">
                            <p class="text-leading text-sm text-gray-400 text-center">
                                There's no files uploaded yet!
                            </p>
                        </div> -->
                    </div>
                </div>
                <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded h-100">
                    <div class="rounded-t mb-0 px-4 py-3 border-0">
                        <div class="flex flex-wrap items-center">
                            <div class="relative w-full px-2 max-w-full flex-grow flex-1">
                                <h3 class="font-normal text-base text-gray-700">
                                    Links
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
                                        Link Name
                                    </th>
                                    <th class="px-6 bg-gray-50 text-gray-500 align-middle border border-solid border-gray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-right">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="cursor-pointer hover:bg-gray-100">
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        <div class="flex items-center w-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40"
                                                fill="none">
                                                <rect width="40" height="40" rx="4" fill="#C3DAFE"></rect>
                                                <path d="M22.6665 8V13.3333C22.6665 14.0697 23.2635 14.6667 23.9998 14.6667H29.3332"
                                                    stroke="#667EEA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                </path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M26.6665 32H13.3332C11.8604 32 10.6665 30.8061 10.6665 29.3333V10.6667C10.6665 9.19391 11.8604 8 13.3332 8H22.6665L29.3332 14.6667V29.3333C29.3332 30.8061 28.1393 32 26.6665 32Z"
                                                    stroke="#667EEA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                </path>
                                                <path d="M16 16.0002H17.3333" stroke="#667EEA" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                                <path d="M16 21.3332H24" stroke="#667EEA" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                                <path d="M16 26.6667H24" stroke="#667EEA" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </svg>
                                            <h4 class="text-base text-light-dark pl-4">
                                                API Documentation V3.docx
                                            </h4>
                                        </div>
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        <div class="flex items-center justify-end">
                                            <div class="mr-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                    fill="none">
                                                    <path
                                                        d="M14.4697 12.4697C14.1768 12.7626 14.1768 13.2374 14.4697 13.5303C14.7626 13.8232 15.2374 13.8232 15.5303 13.5303L14.4697 12.4697ZM19 9L19.5303 9.53033C19.8232 9.23744 19.8232 8.76256 19.5303 8.46967L19 9ZM15.5303 4.46967C15.2374 4.17678 14.7626 4.17678 14.4697 4.46967C14.1768 4.76256 14.1768 5.23744 14.4697 5.53033L15.5303 4.46967ZM19 9.75C19.4142 9.75 19.75 9.41421 19.75 9C19.75 8.58579 19.4142 8.25 19 8.25V9.75ZM9 17.75C9.41421 17.75 9.75 17.4142 9.75 17C9.75 16.5858 9.41421 16.25 9 16.25V17.75ZM15.5303 13.5303L19.5303 9.53033L18.4697 8.46967L14.4697 12.4697L15.5303 13.5303ZM19.5303 8.46967L15.5303 4.46967L14.4697 5.53033L18.4697 9.53033L19.5303 8.46967ZM19 8.25H8V9.75H19V8.25ZM8 8.25C5.37665 8.25 3.25 10.3766 3.25 13H4.75C4.75 11.2051 6.20507 9.75 8 9.75V8.25ZM3.25 13C3.25 15.6234 5.37665 17.75 8 17.75V16.25C6.20507 16.25 4.75 14.7949 4.75 13H3.25ZM8 17.75H9V16.25H8V17.75Z"
                                                        fill="#718096"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                    fill="none">
                                                    <path d="M4 7H20" stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M10 11V17" stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M14 11V17" stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M5 7L6 19C6 20.1046 6.89543 21 8 21H16C17.1046 21 18 20.1046 18 19L19 7"
                                                        stroke="#718096" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                    </path>
                                                    <path d="M9 7V4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V7"
                                                        stroke="#718096" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- <div v-if="users.length == 0" class="py-4">
                            <p class="text-leading text-sm text-gray-400 text-center">
                                There's no files uploaded yet!
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

        data() {
            return {
                item: {
                    title: "How to design a wireframe in Figma",
                    link: "https://www.figma.com/community?tab=files"
                }
            }
        },

        components: {
            AppLayout,
            ClientDetails,
            JetDropdown,
            JetDropdownLink
        }
    }
</script>

<style scoped>
    .checkbox:checked+.check-icon {
        display: flex;
    }
    body {
        font-family: "Lato", sans-serif;
    }
</style>