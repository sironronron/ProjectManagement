<template>
    <app-layout>
        <alerts :flash="$page.props.flash" />

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Tasks
            </h2>
        </template>

        <div class="py-12 container mx-auto py-6">
            <project-details :project="project" />

            <div class="mt-5">
                <div class="flex flex-wrap">
                    <div class="w-full">
                    <div class="mx-auto bg-white shadow rounded">
                        <div
                        class="flex flex-col md:flex-row p-3 justify-between items-start md:items-stretch w-full"
                        >
                        <div
                            class="w-full md:w-1/3 flex flex-col md:flex-row items-start md:items-center"
                        >
                            <div class="flex items-center">
                            <div
                                class="p-2 border-gray-200 border rounded relative"
                                id="delete-div"
                            >
                                <div
                                class="absolute -ml-3 sm:mb-0 z-20 top-0 -mt-16 tooltip hidden"
                                role="tooltip"
                                >
                                <div
                                    class="absolute shadow-lg pt-4 pr-2 pl-3 pb-4 bg-white text-gray-600 rounded w-40 relative"
                                >
                                    <svg
                                    class="absolute bottom-0 -mb-2"
                                    width="16px"
                                    height="8px"
                                    viewBox="0 0 16 8"
                                    version="1.1"
                                    xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                    >
                                    <g
                                        id="Page-1"
                                        stroke="none"
                                        stroke-width="1"
                                        fill="none"
                                        fill-rule="evenodd"
                                    >
                                        <g
                                        id="Tooltips-"
                                        transform="translate(-84.000000, -203.000000)"
                                        fill="#FFFFFF"
                                        >
                                        <g
                                            id="Group-3-Copy"
                                            transform="translate(76.000000, 145.000000)"
                                        >
                                            <polygon
                                            class="shadow"
                                            id="Triangle"
                                            transform="translate(16.000000, 62.000000) rotate(-180.000000) translate(-16.000000, -62.000000) "
                                            points="16 58 24 66 8 66"
                                            ></polygon>
                                        </g>
                                        </g>
                                    </g>
                                    </svg>
                                    <p class="text-xs text-gray-600 leading-4">Delete</p>
                                </div>
                                </div>
                                <svg
                                id="delete-btn"
                                xmlns="http://www.w3.org/2000/svg"
                                class="text-gray-600 icon cursor-pointer icon-tabler icon-tabler-trash"
                                width="20"
                                height="20"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                fill="none"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                >
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <line x1="4" y1="7" x2="20" y2="7" />
                                <line x1="10" y1="11" x2="10" y2="17" />
                                <line x1="14" y1="11" x2="14" y2="17" />
                                <path
                                    d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"
                                />
                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                </svg>
                            </div>
                            <div
                                id="delete-modal"
                                class="hidden fixed z-10 pt-10 left-0 top-0 w-full h-full overflow-auto shadow-lg"
                                style="
                                background-color: rgb(0, 0, 0);
                                background-color: rgba(0, 0, 0, 0.4);
                                "
                            >
                                <div
                                class="my-6 w-11/12 mx-auto mb-4 md:w-5/12 shadow sm:px-10 sm:py-6 py-4 px-4 bg-white rounded-md"
                                >
                                <div class="flex pb-3 items-center">
                                    <div class="-ml-1 text-gray-600">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-trash"
                                        width="32"
                                        height="32"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        fill="none"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    >
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <line x1="4" y1="7" x2="20" y2="7" />
                                        <line x1="10" y1="11" x2="10" y2="17" />
                                        <line x1="14" y1="11" x2="14" y2="17" />
                                        <path
                                        d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"
                                        />
                                        <path
                                        d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"
                                        />
                                    </svg>
                                    </div>
                                    <p class="text-lg text-gray-800 font-semibold pl-2">
                                    Delete this table?
                                    </p>
                                </div>
                                <p class="text-sm text-gray-600 pb-3 font-normal">
                                    If you delete table, you will not be able to restore it.
                                    Are you sure you want to delete this table?
                                </p>
                                <button
                                    class="transition duration-150 ease-in-out hover:bg-gray-100 focus:outline-none rounded border border-red-400 text-red-400 px-3 py-2 text-xs"
                                >
                                    Delete Account
                                </button>
                                <button
                                    class="close ml-2 focus:outline-none bg-gray-100 transition duration-150 ease-in-out hover:bg-gray-200 rounded border border-gray-300 text-gray-600 px-6 py-2 text-xs"
                                >
                                    Cancel
                                </button>
                                </div>
                            </div>
                            <div
                                class="ml-2 p-2 border-gray-200 border rounded relative"
                                id="upload-div"
                            >
                                <div
                                class="absolute -ml-3 sm:mb-0 z-20 top-0 -mt-16 tooltip hidden"
                                role="tooltip"
                                >
                                <div
                                    class="absolute shadow-lg pt-4 pr-2 pl-3 pb-5 bg-white text-gray-600 rounded w-40 relative"
                                >
                                    <svg
                                    class="absolute bottom-0 -mb-2"
                                    width="16px"
                                    height="8px"
                                    viewBox="0 0 16 8"
                                    version="1.1"
                                    xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                    >
                                    <g
                                        id="Page-1"
                                        stroke="none"
                                        stroke-width="1"
                                        fill="none"
                                        fill-rule="evenodd"
                                    >
                                        <g
                                        id="Tooltips-"
                                        transform="translate(-84.000000, -203.000000)"
                                        fill="#FFFFFF"
                                        >
                                        <g
                                            id="Group-3-Copy"
                                            transform="translate(76.000000, 145.000000)"
                                        >
                                            <polygon
                                            class="shadow"
                                            id="Triangle"
                                            transform="translate(16.000000, 62.000000) rotate(-180.000000) translate(-16.000000, -62.000000) "
                                            points="16 58 24 66 8 66"
                                            ></polygon>
                                        </g>
                                        </g>
                                    </g>
                                    </svg>
                                    <p class="text-xs text-gray-600 leading-4">Upload</p>
                                </div>
                                </div>
                                <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="cursor-pointer text-gray-600 icon icon-tabler icon-tabler-upload"
                                width="20"
                                height="20"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                fill="none"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                >
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
                                <polyline points="7 9 12 4 17 9" />
                                <line x1="12" y1="4" x2="12" y2="16" />
                                </svg>
                            </div>
                            </div>
                        </div>
                        <div
                            class="w-full md:w-2/3 flex flex-col md:flex-row items-start md:items-center justify-end"
                        >
                            <div
                            class="flex items-center border-gray-200 border rounded mt-3 md:mt-0"
                            >
                            <div class="p-2">
                                <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="cursor-pointer text-gray-600 icon icon-tabler icon-tabler-table"
                                width="20"
                                height="20"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                fill="none"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                >
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <rect x="4" y="4" width="16" height="16" rx="2" />
                                <line x1="4" y1="10" x2="20" y2="10" />
                                <line x1="10" y1="4" x2="10" y2="20" />
                                </svg>
                            </div>
                            <div class="p-2 bg-gray-200">
                                <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="cursor-pointer text-indigo-500 icon icon-tabler icon-tabler-grid"
                                width="20"
                                height="20"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                fill="none"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                >
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <rect x="4" y="4" width="6" height="6" rx="1" />
                                <rect x="14" y="4" width="6" height="6" rx="1" />
                                <rect x="4" y="14" width="6" height="6" rx="1" />
                                <rect x="14" y="14" width="6" height="6" rx="1" />
                                </svg>
                            </div>
                            <div class="p-2">
                                <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="cursor-pointer text-gray-600 icon icon-tabler icon-tabler-layout-columns"
                                width="20"
                                height="20"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                fill="none"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                >
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <rect x="4" y="4" width="16" height="16" rx="2" />
                                <line x1="12" y1="4" x2="12" y2="20" />
                                </svg>
                            </div>
                            </div>
                            <div class="flex flex-col w-full sm:w-1/2 md:ml-4 mt-3 md:mt-0">
                            <div class="relative w-full">
                                <div
                                class="absolute cursor-pointer text-gray-600 flex items-center pr-3 right-0 border-l h-full"
                                >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="ml-2 mr-1 icon icon-tabler icon-tabler-filter"
                                    width="20"
                                    height="20"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                >
                                    <path stroke="none" d="M0 0h24v24H0z"></path>
                                    <path
                                    d="M5.5 5h13a1 1 0 0 1 0.5 1.5L14 12L14 19L10 16L10 12L5 6.5a1 1 0 0 1 0.5 -1.5"
                                    ></path>
                                </svg>
                                <span class="text-sm leading-tight tracking-normal"
                                    >Filter</span
                                >
                                </div>
                                <div
                                class="absolute text-gray-600 flex items-center pl-3 h-full"
                                >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-search"
                                    width="16"
                                    height="16"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                >
                                    <path stroke="none" d="M0 0h24v24H0z"></path>
                                    <circle cx="10" cy="10" r="7"></circle>
                                    <line x1="21" y1="21" x2="15" y2="15"></line>
                                </svg>
                                </div>
                                <label
                                for="search"
                                class="hidden text-gray-800 text-sm font-bold leading-tight tracking-normal mb-2"
                                ></label>
                                <input
                                id="search"
                                class="w-full text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal pl-8 pr-24 h-10 flex items-center pl-4 text-sm border-gray-300 rounded border"
                                placeholder="Search by project name or owner"
                                />
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="w-full overflow-x-scroll xl:overflow-x-hidden">
                        <table
                            class="min-w-full bg-white rounded border border-gray-300"
                            id="main-table"
                        >
                            <thead>
                            <tr class="w-full bg-white border-b border-gray-300">
                                <th class="pl-3 w-24 py-3">
                                <div class="flex items-center">
                                    <input
                                    type="checkbox"
                                    id="all-check"
                                    class="cursor-pointer relative w-5 h-5 border rounded border-gray-400 bg-white"
                                    />
                                    <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="opacity-0 cursor-defaut ml-4 text-gray-800 icon icon-tabler icon-tabler-chevron-up"
                                    width="16"
                                    height="16"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    >
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <polyline points="6 15 12 9 18 15" />
                                    </svg>
                                </div>
                                </th>
                                <th class="whitespace-no-wrap w-32">
                                <div class="flex items-center justify-between">
                                    <p
                                    class="text-gray-800 font-normal text-left text-xs tracking-normal leading-4"
                                    >
                                    Project
                                    </p>
                                    <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="cursor-pointer mr-3 text-gray-800 icon icon-tabler icon-tabler-chevron-down"
                                    width="16"
                                    height="16"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    >
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <polyline points="6 9 12 15 18 9" />
                                    </svg>
                                </div>
                                </th>
                                <th
                                class="border-l border-gray-300 pl-4 whitespace-no-wrap w-32"
                                >
                                <div class="flex items-center justify-between">
                                    <p
                                    class="text-gray-800 font-normal text-left text-xs tracking-normal leading-4"
                                    >
                                    Type
                                    </p>
                                    <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="cursor-pointer mr-3 text-gray-800 icon icon-tabler icon-tabler-chevron-down"
                                    width="16"
                                    height="16"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    >
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <polyline points="6 9 12 15 18 9" />
                                    </svg>
                                </div>
                                </th>
                                <th
                                class="border-l border-gray-300 pl-4 whitespace-no-wrap w-32"
                                >
                                <div class="flex items-center justify-between">
                                    <p
                                    class="text-gray-800 font-normal text-left text-xs tracking-normal leading-4"
                                    >
                                    Status
                                    </p>
                                    <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="cursor-pointer mr-3 text-gray-800 icon icon-tabler icon-tabler-chevron-down"
                                    width="16"
                                    height="16"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    >
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <polyline points="6 9 12 15 18 9" />
                                    </svg>
                                </div>
                                </th>
                                <th
                                class="border-l border-gray-300 pl-4 whitespace-no-wrap w-32"
                                >
                                <div class="flex items-center justify-between">
                                    <p
                                    class="text-gray-800 font-normal text-left text-xs tracking-normal leading-4"
                                    >
                                    Priority
                                    </p>
                                    <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="cursor-pointer mr-3 text-gray-800 icon icon-tabler icon-tabler-chevron-down"
                                    width="16"
                                    height="16"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    >
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <polyline points="6 9 12 15 18 9" />
                                    </svg>
                                </div>
                                </th>
                                <th
                                class="border-l border-gray-300 pl-4 whitespace-no-wrap w-32"
                                >
                                <div class="flex items-center justify-between">
                                    <p
                                    class="text-gray-800 font-normal text-left text-xs tracking-normal leading-4"
                                    >
                                    Owner
                                    </p>
                                    <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="cursor-pointer mr-3 text-gray-800 icon icon-tabler icon-tabler-chevron-down"
                                    width="16"
                                    height="16"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    >
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <polyline points="6 9 12 15 18 9" />
                                    </svg>
                                </div>
                                </th>
                                <th
                                class="border-l border-gray-300 pl-4 whitespace-no-wrap w-32"
                                >
                                <div class="flex items-center justify-between">
                                    <p
                                    class="text-gray-800 font-normal text-left text-xs tracking-normal leading-4"
                                    >
                                    Created on
                                    </p>
                                    <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="cursor-pointer mr-3 text-gray-800 icon icon-tabler icon-tabler-chevron-down"
                                    width="16"
                                    height="16"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    >
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <polyline points="6 9 12 15 18 9" />
                                    </svg>
                                </div>
                                </th>
                                <th
                                class="border-l border-gray-300 pl-4 whitespace-no-wrap w-32"
                                >
                                <div class="flex items-center justify-between">
                                    <p
                                    class="text-gray-800 font-normal text-left text-xs tracking-normal leading-4"
                                    >
                                    Due on
                                    </p>
                                    <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="cursor-pointer mr-3 text-gray-800 icon icon-tabler icon-tabler-chevron-down"
                                    width="16"
                                    height="16"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    >
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <polyline points="6 9 12 15 18 9" />
                                    </svg>
                                </div>
                                </th>
                                <th
                                class="border-l border-gray-300 pl-4 pr-12 whitespace-no-wrap w-32 bg-gray-100"
                                >
                                <p
                                    class="text-gray-800 font-normal text-left text-xs tracking-normal leading-4"
                                >
                                    Actions
                                </p>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="border-b border-gray-300 hover:bg-gray-100">
                                <td class="pl-3 w-24 py-3">
                                <div class="flex items-center">
                                    <input
                                    type="checkbox"
                                    onclick="tableInteract(this)"
                                    class="cursor-pointer relative w-5 h-5 border rounded border-gray-400 bg-white"
                                    />
                                    <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="cursor-pointer ml-2 lg:ml-4 mr-2 sm:mr-0 text-gray-800 icon icon-tabler icon-tabler-chevron-down arrow-show"
                                    width="16"
                                    height="16"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    >
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <polyline points="6 9 12 15 18 9" />
                                    </svg>
                                </div>
                                </td>
                                <td class="whitespace-no-wrap w-32">
                                <p
                                    class="text-gray-800 font-normal text-left text-xs tracking-normal leading-4"
                                >
                                    Recruitment Softw…
                                </p>
                                </td>
                                <td class="pl-4 whitespace-no-wrap w-32">
                                <p
                                    class="text-gray-800 font-normal text-left text-xs tracking-normal leading-4"
                                >
                                    Development
                                </p>
                                </td>
                                <td class="pl-4 whitespace-no-wrap w-32">
                                <div
                                    class="bg-blue-200 h-6 w-20 rounded-md flex items-center justify-center"
                                >
                                    <span class="text-xs text-blue-500 font-normal"
                                    >Assigned</span
                                    >
                                </div>
                                </td>
                                <td class="pl-4 whitespace-no-wrap w-32">
                                <p
                                    class="text-gray-800 font-normal text-left text-xs tracking-normal leading-4"
                                >
                                    High
                                </p>
                                </td>
                                <td class="pl-4 whitespace-no-wrap w-32">
                                <p
                                    class="text-gray-800 font-normal text-left text-xs tracking-normal leading-4"
                                >
                                    Jason Smith
                                </p>
                                </td>
                                <td class="pl-4 whitespace-no-wrap w-32">
                                <p
                                    class="text-gray-800 font-normal text-left text-xs tracking-normal leading-4"
                                >
                                    6/28/2020
                                </p>
                                </td>
                                <td class="pl-4 whitespace-no-wrap w-32">
                                <p
                                    class="text-gray-800 font-normal text-left text-xs tracking-normal leading-4"
                                >
                                    9/28/2020
                                </p>
                                </td>
                                <td class="pl-4 pr-4 whitespace-no-wrap w-32">
                                <div class="relative w-32 z-10 py-2">
                                    <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="absolute inset-0 m-auto mr-2 xl:mr-4 z-0 icon cursor-pointer icon-tabler icon-tabler-chevron-down"
                                    width="16"
                                    height="16"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="#a0aec0"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    >
                                    <path stroke="none" d="M0 0h24v24H0z"></path>
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                    </svg>
                                    <select
                                    aria-label="Selected tab"
                                    class="focus:outline-none text-xs form-select block w-full py-2 px-2 xl:px-3 border border-gray-300 rounded text-gray-600 appearance-none bg-transparent"
                                    >
                                    <option>Edit Task</option>
                                    <option>Do Nothing</option>
                                    </select>
                                </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="10">
                                <div
                                    class="flex items-stretch w-full border-b border-gray-300"
                                >
                                    <ul>
                                    <li
                                        class="p-3 cursor-pointer text-gray-800 text-sm leading-3 tracking-normal hover:text-indigo-700 flex items-center justify-center"
                                    >
                                        <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-grid"
                                        width="20"
                                        height="20"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        fill="none"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        >
                                        <path stroke="none" d="M0 0h24v24H0z"></path>
                                        <rect
                                            x="4"
                                            y="4"
                                            width="6"
                                            height="6"
                                            rx="1"
                                        ></rect>
                                        <rect
                                            x="14"
                                            y="4"
                                            width="6"
                                            height="6"
                                            rx="1"
                                        ></rect>
                                        <rect
                                            x="4"
                                            y="14"
                                            width="6"
                                            height="6"
                                            rx="1"
                                        ></rect>
                                        <rect
                                            x="14"
                                            y="14"
                                            width="6"
                                            height="6"
                                            rx="1"
                                        ></rect>
                                        </svg>
                                    </li>
                                    <li
                                        class="cursor-pointer p-3 text-white focus:bg-indigo-600 hover:bg-indigo-600 bg-indigo-700 flex items-center justify-center"
                                    >
                                        <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-puzzle"
                                        width="20"
                                        height="20"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        fill="none"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        >
                                        <path stroke="none" d="M0 0h24v24H0z"></path>
                                        <path
                                            d="M4 7h3a1 1 0 0 0 1 -1v-1a2 2 0 0 1 4 0v1a1 1 0 0 0 1 1h3a1 1 0 0 1 1 1v3a1 1 0 0 0 1 1h1a2 2 0 0 1 0 4h-1a1 1 0 0 0 -1 1v3a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-1a2 2 0 0 0 -4 0v1a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h1a2 2 0 0 0 0 -4h-1a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1"
                                        ></path>
                                        </svg>
                                    </li>
                                    <li
                                        class="p-3 cursor-pointer text-gray-800 text-sm leading-3 tracking-normal hover:text-indigo-700 flex items-center justify-center"
                                    >
                                        <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-compass"
                                        width="20"
                                        height="20"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        fill="none"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        >
                                        <path stroke="none" d="M0 0h24v24H0z"></path>
                                        <polyline
                                            points="8 16 10 10 16 8 14 14 8 16"
                                        ></polyline>
                                        <circle cx="12" cy="12" r="9"></circle>
                                        </svg>
                                    </li>
                                    <li
                                        class="p-3 cursor-pointer text-gray-800 text-sm leading-3 tracking-normal hover:text-indigo-700 flex items-center justify-center"
                                    >
                                        <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-code"
                                        width="20"
                                        height="20"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        fill="none"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        >
                                        <path stroke="none" d="M0 0h24v24H0z"></path>
                                        <polyline points="7 8 3 12 7 16"></polyline>
                                        <polyline points="17 8 21 12 17 16"></polyline>
                                        <line x1="14" y1="4" x2="10" y2="20"></line>
                                        </svg>
                                    </li>
                                    </ul>
                                    <div class="w-full bg-white border-l border-gray-300">
                                    <h4
                                        class="pl-10 w-full text-sm text-gray-800 py-3 bg-gray-100"
                                    >
                                        Recruitment Software Maintenance
                                    </h4>
                                    <div class="bg-white px-8 py-6">
                                        <div class="flex items-start">
                                        <div class="w-1/3">
                                            <p class="text-gray-600 font-normal text-xs">
                                            Owner
                                            </p>
                                            <h5 class="text-gray-800 font-normal text-xs">
                                            Jason Smith
                                            </h5>
                                        </div>
                                        <div class="w-1/3">
                                            <p class="text-gray-600 font-normal text-xs">
                                            Type
                                            </p>
                                            <h5 class="text-gray-800 font-normal text-xs">
                                            Development
                                            </h5>
                                        </div>
                                        <div class="w-1/3">
                                            <p class="text-gray-600 font-normal text-xs">
                                            Time Spent
                                            </p>
                                            <h5 class="text-gray-800 font-normal text-xs">
                                            1440 Hours, 45 Mins
                                            </h5>
                                        </div>
                                        </div>
                                        <div class="flex items-start mt-6">
                                        <div class="w-1/3">
                                            <p class="text-gray-600 font-normal text-xs">
                                            Project
                                            </p>
                                            <h5 class="text-gray-800 font-normal text-xs">
                                            Create new features for the app
                                            </h5>
                                        </div>
                                        <div class="w-1/3">
                                            <p class="text-gray-600 font-normal text-xs">
                                            Priority
                                            </p>
                                            <h5 class="text-gray-800 font-normal text-xs">
                                            High
                                            </h5>
                                        </div>
                                        <div class="w-1/3">
                                            <p class="text-gray-600 font-normal text-xs">
                                            Incharge officer(s)
                                            </p>
                                            <h5 class="text-indigo-700 font-normal text-xs">
                                            Saul Berenson & Nicholas Brody
                                            </h5>
                                        </div>
                                        </div>
                                        <hr class="my-6 border-t border-gray-300 w-full" />
                                        <h5
                                        class="text-gray-600 font-normal text-xs mb-2 font-bold"
                                        >
                                        Message
                                        </h5>
                                        <p
                                        class="text-gray-800 font-normal text-xs w-3/5 leading-6"
                                        >
                                        But I must explain to you how all this mistaken
                                        idea of denouncing pleasure and praising pain was
                                        born and I will give you a complete account of the
                                        system, and expound the actual teachings of the
                                        great explorer of the truth, the master-builder of
                                        human happiness. No one rejects, dislikes, or
                                        avoids pleasure itself, because it is pleasure,
                                        but because those who do not know how to pursue
                                        pleasure rationally encounter consequences that
                                        are extremely painful
                                        </p>
                                        <h5
                                        class="text-indigo-700 font-normal text-xs mb-2 mt-12 font-bold"
                                        >
                                        Recommended Action
                                        </h5>
                                        <p
                                        class="text-gray-800 font-normal text-xs w-3/5 leading-6"
                                        >
                                        But I must explain to you how all this mistaken
                                        idea of denouncing pleasure and praising pain was
                                        born and I will give you a complete account of the
                                        system, and expound the actual teachings of the
                                        great explorer of the truth, the master-builder of
                                        human happiness. No one rejects, dislikes, or
                                        avoids pleasure itself, because it is pleasure,
                                        but because those who do not know how to pursue
                                        pleasure rationally encounter consequences that
                                        are extremely painful
                                        </p>
                                    </div>
                                    </div>
                                </div>
                                </td>
                            </tr>
                            <tr class="border-b border-gray-300 hover:bg-gray-100">
                                <td class="pl-3 w-24 py-3">
                                <div class="flex items-center">
                                    <input
                                    type="checkbox"
                                    onclick="tableInteract(this)"
                                    class="cursor-pointer relative w-5 h-5 border rounded border-gray-400 bg-white"
                                    />
                                    <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="cursor-pointer ml-2 lg:ml-4 mr-2 sm:mr-0 text-gray-800 icon icon-tabler icon-tabler-chevron-down arrow-show"
                                    width="16"
                                    height="16"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    >
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <polyline points="6 9 12 15 18 9" />
                                    </svg>
                                </div>
                                </td>
                                <td class="whitespace-no-wrap w-32">
                                <p
                                    class="text-gray-800 font-normal text-left text-xs tracking-normal leading-4"
                                >
                                    Jade's website
                                </p>
                                </td>
                                <td class="pl-4 whitespace-no-wrap w-32">
                                <p
                                    class="text-gray-800 font-normal text-left text-xs tracking-normal leading-4"
                                >
                                    Design
                                </p>
                                </td>
                                <td class="pl-4 whitespace-no-wrap w-32">
                                <div
                                    class="bg-red-200 h-6 w-20 rounded-md flex items-center justify-center"
                                >
                                    <span class="text-xs text-red-500 font-normal"
                                    >Pending</span
                                    >
                                </div>
                                </td>
                                <td class="pl-4 whitespace-no-wrap w-32">
                                <p
                                    class="text-gray-800 font-normal text-left text-xs tracking-normal leading-4"
                                >
                                    Medium
                                </p>
                                </td>
                                <td class="pl-4 whitespace-no-wrap w-32">
                                <p
                                    class="text-gray-800 font-normal text-left text-xs tracking-normal leading-4"
                                >
                                    Jason Smith
                                </p>
                                </td>
                                <td class="pl-4 whitespace-no-wrap w-32">
                                <p
                                    class="text-gray-800 font-normal text-left text-xs tracking-normal leading-4"
                                >
                                    6/28/2020
                                </p>
                                </td>
                                <td class="pl-4 whitespace-no-wrap w-32">
                                <p
                                    class="text-gray-800 font-normal text-left text-xs tracking-normal leading-4"
                                >
                                    9/28/2020
                                </p>
                                </td>
                                <td class="pl-4 whitespace-no-wrap w-32">
                                <div class="relative w-32 z-10 py-2">
                                    <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="absolute inset-0 m-auto mr-2 xl:mr-4 z-0 icon cursor-pointer icon-tabler icon-tabler-chevron-down"
                                    width="16"
                                    height="16"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="#a0aec0"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    >
                                    <path stroke="none" d="M0 0h24v24H0z"></path>
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                    </svg>
                                    <select
                                    aria-label="Selected tab"
                                    class="focus:outline-none text-xs form-select block w-full py-2 px-2 xl:px-3 border border-gray-300 rounded text-gray-600 appearance-none bg-transparent"
                                    >
                                    <option>Edit Task</option>
                                    <option>Do Nothing</option>
                                    </select>
                                </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="10">
                                <div
                                    class="flex items-stretch w-full border-b border-gray-300"
                                >
                                    <ul>
                                    <li
                                        class="p-3 cursor-pointer text-gray-800 text-sm leading-3 tracking-normal hover:text-indigo-700 flex items-center justify-center"
                                    >
                                        <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-grid"
                                        width="20"
                                        height="20"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        fill="none"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        >
                                        <path stroke="none" d="M0 0h24v24H0z"></path>
                                        <rect
                                            x="4"
                                            y="4"
                                            width="6"
                                            height="6"
                                            rx="1"
                                        ></rect>
                                        <rect
                                            x="14"
                                            y="4"
                                            width="6"
                                            height="6"
                                            rx="1"
                                        ></rect>
                                        <rect
                                            x="4"
                                            y="14"
                                            width="6"
                                            height="6"
                                            rx="1"
                                        ></rect>
                                        <rect
                                            x="14"
                                            y="14"
                                            width="6"
                                            height="6"
                                            rx="1"
                                        ></rect>
                                        </svg>
                                    </li>
                                    <li
                                        class="cursor-pointer p-3 text-white focus:bg-indigo-600 hover:bg-indigo-600 bg-indigo-700 flex items-center justify-center"
                                    >
                                        <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-puzzle"
                                        width="20"
                                        height="20"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        fill="none"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        >
                                        <path stroke="none" d="M0 0h24v24H0z"></path>
                                        <path
                                            d="M4 7h3a1 1 0 0 0 1 -1v-1a2 2 0 0 1 4 0v1a1 1 0 0 0 1 1h3a1 1 0 0 1 1 1v3a1 1 0 0 0 1 1h1a2 2 0 0 1 0 4h-1a1 1 0 0 0 -1 1v3a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-1a2 2 0 0 0 -4 0v1a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h1a2 2 0 0 0 0 -4h-1a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1"
                                        ></path>
                                        </svg>
                                    </li>
                                    <li
                                        class="p-3 cursor-pointer text-gray-800 text-sm leading-3 tracking-normal hover:text-indigo-700 flex items-center justify-center"
                                    >
                                        <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-compass"
                                        width="20"
                                        height="20"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        fill="none"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        >
                                        <path stroke="none" d="M0 0h24v24H0z"></path>
                                        <polyline
                                            points="8 16 10 10 16 8 14 14 8 16"
                                        ></polyline>
                                        <circle cx="12" cy="12" r="9"></circle>
                                        </svg>
                                    </li>
                                    <li
                                        class="p-3 cursor-pointer text-gray-800 text-sm leading-3 tracking-normal hover:text-indigo-700 flex items-center justify-center"
                                    >
                                        <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-code"
                                        width="20"
                                        height="20"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        fill="none"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        >
                                        <path stroke="none" d="M0 0h24v24H0z"></path>
                                        <polyline points="7 8 3 12 7 16"></polyline>
                                        <polyline points="17 8 21 12 17 16"></polyline>
                                        <line x1="14" y1="4" x2="10" y2="20"></line>
                                        </svg>
                                    </li>
                                    </ul>
                                    <div class="w-full bg-white border-l border-gray-300">
                                    <h4
                                        class="pl-10 w-full text-sm text-gray-800 py-3 bg-gray-100"
                                    >
                                        Recruitment Software Maintenance
                                    </h4>
                                    <div class="bg-white px-8 py-6">
                                        <div class="flex items-start">
                                        <div class="w-1/3">
                                            <p class="text-gray-600 font-normal text-xs">
                                            Owner
                                            </p>
                                            <h5 class="text-gray-800 font-normal text-xs">
                                            Jason Smith
                                            </h5>
                                        </div>
                                        <div class="w-1/3">
                                            <p class="text-gray-600 font-normal text-xs">
                                            Type
                                            </p>
                                            <h5 class="text-gray-800 font-normal text-xs">
                                            Development
                                            </h5>
                                        </div>
                                        <div class="w-1/3">
                                            <p class="text-gray-600 font-normal text-xs">
                                            Time Spent
                                            </p>
                                            <h5 class="text-gray-800 font-normal text-xs">
                                            1440 Hours, 45 Mins
                                            </h5>
                                        </div>
                                        </div>
                                        <div class="flex items-start mt-6">
                                        <div class="w-1/3">
                                            <p class="text-gray-600 font-normal text-xs">
                                            Project
                                            </p>
                                            <h5 class="text-gray-800 font-normal text-xs">
                                            Create new features for the app
                                            </h5>
                                        </div>
                                        <div class="w-1/3">
                                            <p class="text-gray-600 font-normal text-xs">
                                            Priority
                                            </p>
                                            <h5 class="text-gray-800 font-normal text-xs">
                                            High
                                            </h5>
                                        </div>
                                        <div class="w-1/3">
                                            <p class="text-gray-600 font-normal text-xs">
                                            Incharge officer(s)
                                            </p>
                                            <h5 class="text-indigo-700 font-normal text-xs">
                                            Saul Berenson & Nicholas Brody
                                            </h5>
                                        </div>
                                        </div>
                                        <hr class="my-6 border-t border-gray-300 w-full" />
                                        <h5
                                        class="text-gray-600 font-normal text-xs mb-2 font-bold"
                                        >
                                        Message
                                        </h5>
                                        <p
                                        class="text-gray-800 font-normal text-xs w-3/5 leading-6"
                                        >
                                        But I must explain to you how all this mistaken
                                        idea of denouncing pleasure and praising pain was
                                        born and I will give you a complete account of the
                                        system, and expound the actual teachings of the
                                        great explorer of the truth, the master-builder of
                                        human happiness. No one rejects, dislikes, or
                                        avoids pleasure itself, because it is pleasure,
                                        but because those who do not know how to pursue
                                        pleasure rationally encounter consequences that
                                        are extremely painful
                                        </p>
                                        <h5
                                        class="text-indigo-700 font-normal text-xs mb-2 mt-12 font-bold"
                                        >
                                        Recommended Action
                                        </h5>
                                        <p
                                        class="text-gray-800 font-normal text-xs w-3/5 leading-6"
                                        >
                                        But I must explain to you how all this mistaken
                                        idea of denouncing pleasure and praising pain was
                                        born and I will give you a complete account of the
                                        system, and expound the actual teachings of the
                                        great explorer of the truth, the master-builder of
                                        human happiness. No one rejects, dislikes, or
                                        avoids pleasure itself, because it is pleasure,
                                        but because those who do not know how to pursue
                                        pleasure rationally encounter consequences that
                                        are extremely painful
                                        </p>
                                    </div>
                                    </div>
                                </div>
                                </td>
                            </tr>
                            <tr class="border-b border-gray-300 hover:bg-gray-100">
                                <td class="pl-3 w-24 py-3">
                                <div class="flex items-center">
                                    <input
                                    type="checkbox"
                                    onclick="tableInteract(this)"
                                    class="cursor-pointer relative w-5 h-5 border rounded border-gray-400 bg-white"
                                    />
                                    <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="cursor-pointer ml-2 lg:ml-4 mr-2 sm:mr-0 text-gray-800 icon icon-tabler icon-tabler-chevron-down arrow-show"
                                    width="16"
                                    height="16"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    >
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <polyline points="6 9 12 15 18 9" />
                                    </svg>
                                </div>
                                </td>
                                <td class="whitespace-no-wrap w-32">
                                <p
                                    class="text-gray-800 font-normal text-left text-xs tracking-normal leading-4"
                                >
                                    Marketing Visuals
                                </p>
                                </td>
                                <td class="pl-4 whitespace-no-wrap w-32">
                                <p
                                    class="text-gray-800 font-normal text-left text-xs tracking-normal leading-4"
                                >
                                    Marketing
                                </p>
                                </td>
                                <td class="pl-4 whitespace-no-wrap w-32">
                                <div
                                    class="bg-blue-200 h-6 w-20 rounded-md flex items-center justify-center"
                                >
                                    <span class="text-xs text-blue-500 font-normal"
                                    >Assigned</span
                                    >
                                </div>
                                </td>
                                <td class="pl-4 whitespace-no-wrap w-32">
                                <p
                                    class="text-gray-800 font-normal text-left text-xs tracking-normal leading-4"
                                >
                                    Low
                                </p>
                                </td>
                                <td class="pl-4 whitespace-no-wrap w-32">
                                <p
                                    class="text-gray-800 font-normal text-left text-xs tracking-normal leading-4"
                                >
                                    Jason Smith
                                </p>
                                </td>
                                <td class="pl-4 whitespace-no-wrap w-32">
                                <p
                                    class="text-gray-800 font-normal text-left text-xs tracking-normal leading-4"
                                >
                                    6/28/2020
                                </p>
                                </td>
                                <td class="pl-4 whitespace-no-wrap w-32">
                                <p
                                    class="text-gray-800 font-normal text-left text-xs tracking-normal leading-4"
                                >
                                    9/28/2020
                                </p>
                                </td>
                                <td class="pl-4 whitespace-no-wrap w-32">
                                <div class="relative w-32 z-10 py-2">
                                    <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="absolute inset-0 m-auto mr-2 xl:mr-4 z-0 icon cursor-pointer icon-tabler icon-tabler-chevron-down"
                                    width="16"
                                    height="16"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="#a0aec0"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    >
                                    <path stroke="none" d="M0 0h24v24H0z"></path>
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                    </svg>
                                    <select
                                    aria-label="Selected tab"
                                    class="focus:outline-none text-xs form-select block w-full py-2 px-2 xl:px-3 border border-gray-300 rounded text-gray-600 appearance-none bg-transparent"
                                    >
                                    <option>Edit Task</option>
                                    <option>Do Nothing</option>
                                    </select>
                                </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="10">
                                <div
                                    class="flex items-stretch w-full border-b border-gray-300"
                                >
                                    <ul>
                                    <li
                                        class="p-3 cursor-pointer text-gray-800 text-sm leading-3 tracking-normal hover:text-indigo-700 flex items-center justify-center"
                                    >
                                        <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-grid"
                                        width="20"
                                        height="20"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        fill="none"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        >
                                        <path stroke="none" d="M0 0h24v24H0z"></path>
                                        <rect
                                            x="4"
                                            y="4"
                                            width="6"
                                            height="6"
                                            rx="1"
                                        ></rect>
                                        <rect
                                            x="14"
                                            y="4"
                                            width="6"
                                            height="6"
                                            rx="1"
                                        ></rect>
                                        <rect
                                            x="4"
                                            y="14"
                                            width="6"
                                            height="6"
                                            rx="1"
                                        ></rect>
                                        <rect
                                            x="14"
                                            y="14"
                                            width="6"
                                            height="6"
                                            rx="1"
                                        ></rect>
                                        </svg>
                                    </li>
                                    <li
                                        class="cursor-pointer p-3 text-white focus:bg-indigo-600 hover:bg-indigo-600 bg-indigo-700 flex items-center justify-center"
                                    >
                                        <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-puzzle"
                                        width="20"
                                        height="20"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        fill="none"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        >
                                        <path stroke="none" d="M0 0h24v24H0z"></path>
                                        <path
                                            d="M4 7h3a1 1 0 0 0 1 -1v-1a2 2 0 0 1 4 0v1a1 1 0 0 0 1 1h3a1 1 0 0 1 1 1v3a1 1 0 0 0 1 1h1a2 2 0 0 1 0 4h-1a1 1 0 0 0 -1 1v3a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-1a2 2 0 0 0 -4 0v1a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h1a2 2 0 0 0 0 -4h-1a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1"
                                        ></path>
                                        </svg>
                                    </li>
                                    <li
                                        class="p-3 cursor-pointer text-gray-800 text-sm leading-3 tracking-normal hover:text-indigo-700 flex items-center justify-center"
                                    >
                                        <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-compass"
                                        width="20"
                                        height="20"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        fill="none"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        >
                                        <path stroke="none" d="M0 0h24v24H0z"></path>
                                        <polyline
                                            points="8 16 10 10 16 8 14 14 8 16"
                                        ></polyline>
                                        <circle cx="12" cy="12" r="9"></circle>
                                        </svg>
                                    </li>
                                    <li
                                        class="p-3 cursor-pointer text-gray-800 text-sm leading-3 tracking-normal hover:text-indigo-700 flex items-center justify-center"
                                    >
                                        <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-code"
                                        width="20"
                                        height="20"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        fill="none"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        >
                                        <path stroke="none" d="M0 0h24v24H0z"></path>
                                        <polyline points="7 8 3 12 7 16"></polyline>
                                        <polyline points="17 8 21 12 17 16"></polyline>
                                        <line x1="14" y1="4" x2="10" y2="20"></line>
                                        </svg>
                                    </li>
                                    </ul>
                                    <div class="w-full bg-white border-l border-gray-300">
                                    <h4
                                        class="pl-10 w-full text-sm text-gray-800 py-3 bg-gray-100"
                                    >
                                        Recruitment Software Maintenance
                                    </h4>
                                    <div class="bg-white px-8 py-6">
                                        <div class="flex items-start">
                                        <div class="w-1/3">
                                            <p class="text-gray-600 font-normal text-xs">
                                            Owner
                                            </p>
                                            <h5 class="text-gray-800 font-normal text-xs">
                                            Jason Smith
                                            </h5>
                                        </div>
                                        <div class="w-1/3">
                                            <p class="text-gray-600 font-normal text-xs">
                                            Type
                                            </p>
                                            <h5 class="text-gray-800 font-normal text-xs">
                                            Development
                                            </h5>
                                        </div>
                                        <div class="w-1/3">
                                            <p class="text-gray-600 font-normal text-xs">
                                            Time Spent
                                            </p>
                                            <h5 class="text-gray-800 font-normal text-xs">
                                            1440 Hours, 45 Mins
                                            </h5>
                                        </div>
                                        </div>
                                        <div class="flex items-start mt-6">
                                        <div class="w-1/3">
                                            <p class="text-gray-600 font-normal text-xs">
                                            Project
                                            </p>
                                            <h5 class="text-gray-800 font-normal text-xs">
                                            Create new features for the app
                                            </h5>
                                        </div>
                                        <div class="w-1/3">
                                            <p class="text-gray-600 font-normal text-xs">
                                            Priority
                                            </p>
                                            <h5 class="text-gray-800 font-normal text-xs">
                                            High
                                            </h5>
                                        </div>
                                        <div class="w-1/3">
                                            <p class="text-gray-600 font-normal text-xs">
                                            Incharge officer(s)
                                            </p>
                                            <h5 class="text-indigo-700 font-normal text-xs">
                                            Saul Berenson & Nicholas Brody
                                            </h5>
                                        </div>
                                        </div>
                                        <hr class="my-6 border-t border-gray-300 w-full" />
                                        <h5
                                        class="text-gray-600 font-normal text-xs mb-2 font-bold"
                                        >
                                        Message
                                        </h5>
                                        <p
                                        class="text-gray-800 font-normal text-xs w-3/5 leading-6"
                                        >
                                        But I must explain to you how all this mistaken
                                        idea of denouncing pleasure and praising pain was
                                        born and I will give you a complete account of the
                                        system, and expound the actual teachings of the
                                        great explorer of the truth, the master-builder of
                                        human happiness. No one rejects, dislikes, or
                                        avoids pleasure itself, because it is pleasure,
                                        but because those who do not know how to pursue
                                        pleasure rationally encounter consequences that
                                        are extremely painful
                                        </p>
                                        <h5
                                        class="text-indigo-700 font-normal text-xs mb-2 mt-12 font-bold"
                                        >
                                        Recommended Action
                                        </h5>
                                        <p
                                        class="text-gray-800 font-normal text-xs w-3/5 leading-6"
                                        >
                                        But I must explain to you how all this mistaken
                                        idea of denouncing pleasure and praising pain was
                                        born and I will give you a complete account of the
                                        system, and expound the actual teachings of the
                                        great explorer of the truth, the master-builder of
                                        human happiness. No one rejects, dislikes, or
                                        avoids pleasure itself, because it is pleasure,
                                        but because those who do not know how to pursue
                                        pleasure rationally encounter consequences that
                                        are extremely painful
                                        </p>
                                    </div>
                                    </div>
                                </div>
                                </td>
                            </tr>
                            <tr class="border-b border-gray-300 hover:bg-gray-100">
                                <td class="pl-3 w-24 py-3">
                                <div class="flex items-center">
                                    <input
                                    type="checkbox"
                                    onclick="tableInteract(this)"
                                    class="cursor-pointer relative w-5 h-5 border rounded border-gray-400 bg-white"
                                    />
                                    <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="cursor-pointer ml-2 lg:ml-4 mr-2 sm:mr-0 text-gray-800 icon icon-tabler icon-tabler-chevron-down arrow-show"
                                    width="16"
                                    height="16"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    >
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <polyline points="6 9 12 15 18 9" />
                                    </svg>
                                </div>
                                </td>
                                <td class="whitespace-no-wrap w-32">
                                <p
                                    class="text-gray-800 font-normal text-left text-xs tracking-normal leading-4"
                                >
                                    Jade's website
                                </p>
                                </td>
                                <td class="pl-4 whitespace-no-wrap w-32">
                                <p
                                    class="text-gray-800 font-normal text-left text-xs tracking-normal leading-4"
                                >
                                    Design
                                </p>
                                </td>
                                <td class="pl-4 whitespace-no-wrap w-32">
                                <div
                                    class="bg-red-200 h-6 w-20 rounded-md flex items-center justify-center"
                                >
                                    <span class="text-xs text-red-500 font-normal"
                                    >Pending</span
                                    >
                                </div>
                                </td>
                                <td class="pl-4 whitespace-no-wrap w-32">
                                <p
                                    class="text-gray-800 font-normal text-left text-xs tracking-normal leading-4"
                                >
                                    Medium
                                </p>
                                </td>
                                <td class="pl-4 whitespace-no-wrap w-32">
                                <p
                                    class="text-gray-800 font-normal text-left text-xs tracking-normal leading-4"
                                >
                                    Jason Smith
                                </p>
                                </td>
                                <td class="pl-4 whitespace-no-wrap w-32">
                                <p
                                    class="text-gray-800 font-normal text-left text-xs tracking-normal leading-4"
                                >
                                    6/28/2020
                                </p>
                                </td>
                                <td class="pl-4 whitespace-no-wrap w-32">
                                <p
                                    class="text-gray-800 font-normal text-left text-xs tracking-normal leading-4"
                                >
                                    9/28/2020
                                </p>
                                </td>
                                <td class="pl-4 whitespace-no-wrap w-32">
                                <div class="relative w-32 z-10 py-2">
                                    <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="absolute inset-0 m-auto mr-2 xl:mr-4 z-0 icon cursor-pointer icon-tabler icon-tabler-chevron-down"
                                    width="16"
                                    height="16"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="#a0aec0"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    >
                                    <path stroke="none" d="M0 0h24v24H0z"></path>
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                    </svg>
                                    <select
                                    aria-label="Selected tab"
                                    class="focus:outline-none text-xs form-select block w-full py-2 px-2 xl:px-3 border border-gray-300 rounded text-gray-600 appearance-none bg-transparent"
                                    >
                                    <option>Edit Task</option>
                                    <option>Do Nothing</option>
                                    </select>
                                </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="10">
                                <div
                                    class="flex items-stretch w-full border-b border-gray-300"
                                >
                                    <ul>
                                    <li
                                        class="p-3 cursor-pointer text-gray-800 text-sm leading-3 tracking-normal hover:text-indigo-700 flex items-center justify-center"
                                    >
                                        <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-grid"
                                        width="20"
                                        height="20"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        fill="none"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        >
                                        <path stroke="none" d="M0 0h24v24H0z"></path>
                                        <rect
                                            x="4"
                                            y="4"
                                            width="6"
                                            height="6"
                                            rx="1"
                                        ></rect>
                                        <rect
                                            x="14"
                                            y="4"
                                            width="6"
                                            height="6"
                                            rx="1"
                                        ></rect>
                                        <rect
                                            x="4"
                                            y="14"
                                            width="6"
                                            height="6"
                                            rx="1"
                                        ></rect>
                                        <rect
                                            x="14"
                                            y="14"
                                            width="6"
                                            height="6"
                                            rx="1"
                                        ></rect>
                                        </svg>
                                    </li>
                                    <li
                                        class="cursor-pointer p-3 text-white focus:bg-indigo-600 hover:bg-indigo-600 bg-indigo-700 flex items-center justify-center"
                                    >
                                        <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-puzzle"
                                        width="20"
                                        height="20"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        fill="none"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        >
                                        <path stroke="none" d="M0 0h24v24H0z"></path>
                                        <path
                                            d="M4 7h3a1 1 0 0 0 1 -1v-1a2 2 0 0 1 4 0v1a1 1 0 0 0 1 1h3a1 1 0 0 1 1 1v3a1 1 0 0 0 1 1h1a2 2 0 0 1 0 4h-1a1 1 0 0 0 -1 1v3a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-1a2 2 0 0 0 -4 0v1a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h1a2 2 0 0 0 0 -4h-1a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1"
                                        ></path>
                                        </svg>
                                    </li>
                                    <li
                                        class="p-3 cursor-pointer text-gray-800 text-sm leading-3 tracking-normal hover:text-indigo-700 flex items-center justify-center"
                                    >
                                        <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-compass"
                                        width="20"
                                        height="20"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        fill="none"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        >
                                        <path stroke="none" d="M0 0h24v24H0z"></path>
                                        <polyline
                                            points="8 16 10 10 16 8 14 14 8 16"
                                        ></polyline>
                                        <circle cx="12" cy="12" r="9"></circle>
                                        </svg>
                                    </li>
                                    <li
                                        class="p-3 cursor-pointer text-gray-800 text-sm leading-3 tracking-normal hover:text-indigo-700 flex items-center justify-center"
                                    >
                                        <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-code"
                                        width="20"
                                        height="20"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        fill="none"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        >
                                        <path stroke="none" d="M0 0h24v24H0z"></path>
                                        <polyline points="7 8 3 12 7 16"></polyline>
                                        <polyline points="17 8 21 12 17 16"></polyline>
                                        <line x1="14" y1="4" x2="10" y2="20"></line>
                                        </svg>
                                    </li>
                                    </ul>
                                    <div class="w-full bg-white border-l border-gray-300">
                                    <h4
                                        class="pl-10 w-full text-sm text-gray-800 py-3 bg-gray-100"
                                    >
                                        Recruitment Software Maintenance
                                    </h4>
                                    <div class="bg-white px-8 py-6">
                                        <div class="flex items-start">
                                        <div class="w-1/3">
                                            <p class="text-gray-600 font-normal text-xs">
                                            Owner
                                            </p>
                                            <h5 class="text-gray-800 font-normal text-xs">
                                            Jason Smith
                                            </h5>
                                        </div>
                                        <div class="w-1/3">
                                            <p class="text-gray-600 font-normal text-xs">
                                            Type
                                            </p>
                                            <h5 class="text-gray-800 font-normal text-xs">
                                            Development
                                            </h5>
                                        </div>
                                        <div class="w-1/3">
                                            <p class="text-gray-600 font-normal text-xs">
                                            Time Spent
                                            </p>
                                            <h5 class="text-gray-800 font-normal text-xs">
                                            1440 Hours, 45 Mins
                                            </h5>
                                        </div>
                                        </div>
                                        <div class="flex items-start mt-6">
                                        <div class="w-1/3">
                                            <p class="text-gray-600 font-normal text-xs">
                                            Project
                                            </p>
                                            <h5 class="text-gray-800 font-normal text-xs">
                                            Create new features for the app
                                            </h5>
                                        </div>
                                        <div class="w-1/3">
                                            <p class="text-gray-600 font-normal text-xs">
                                            Priority
                                            </p>
                                            <h5 class="text-gray-800 font-normal text-xs">
                                            High
                                            </h5>
                                        </div>
                                        <div class="w-1/3">
                                            <p class="text-gray-600 font-normal text-xs">
                                            Incharge officer(s)
                                            </p>
                                            <h5 class="text-indigo-700 font-normal text-xs">
                                            Saul Berenson & Nicholas Brody
                                            </h5>
                                        </div>
                                        </div>
                                        <hr class="my-6 border-t border-gray-300 w-full" />
                                        <h5
                                        class="text-gray-600 font-normal text-xs mb-2 font-bold"
                                        >
                                        Message
                                        </h5>
                                        <p
                                        class="text-gray-800 font-normal text-xs w-3/5 leading-6"
                                        >
                                        But I must explain to you how all this mistaken
                                        idea of denouncing pleasure and praising pain was
                                        born and I will give you a complete account of the
                                        system, and expound the actual teachings of the
                                        great explorer of the truth, the master-builder of
                                        human happiness. No one rejects, dislikes, or
                                        avoids pleasure itself, because it is pleasure,
                                        but because those who do not know how to pursue
                                        pleasure rationally encounter consequences that
                                        are extremely painful
                                        </p>
                                        <h5
                                        class="text-indigo-700 font-normal text-xs mb-2 mt-12 font-bold"
                                        >
                                        Recommended Action
                                        </h5>
                                        <p
                                        class="text-gray-800 font-normal text-xs w-3/5 leading-6"
                                        >
                                        But I must explain to you how all this mistaken
                                        idea of denouncing pleasure and praising pain was
                                        born and I will give you a complete account of the
                                        system, and expound the actual teachings of the
                                        great explorer of the truth, the master-builder of
                                        human happiness. No one rejects, dislikes, or
                                        avoids pleasure itself, because it is pleasure,
                                        but because those who do not know how to pursue
                                        pleasure rationally encounter consequences that
                                        are extremely painful
                                        </p>
                                    </div>
                                    </div>
                                </div>
                                </td>
                            </tr>
                            <tr class="border-b border-gray-300 hover:bg-gray-100">
                                <td class="pl-3 w-24 py-3">
                                <div class="flex items-center">
                                    <input
                                    type="checkbox"
                                    onclick="tableInteract(this)"
                                    class="cursor-pointer relative w-5 h-5 border rounded border-gray-400 bg-white"
                                    />
                                    <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="cursor-pointer ml-2 lg:ml-4 mr-2 sm:mr-0 text-gray-800 icon icon-tabler icon-tabler-chevron-down arrow-show"
                                    width="16"
                                    height="16"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    >
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <polyline points="6 9 12 15 18 9" />
                                    </svg>
                                </div>
                                </td>
                                <td class="whitespace-no-wrap w-32">
                                <p
                                    class="text-gray-800 font-normal text-left text-xs tracking-normal leading-4"
                                >
                                    Marketing Visuals
                                </p>
                                </td>
                                <td class="pl-4 whitespace-no-wrap w-32">
                                <p
                                    class="text-gray-800 font-normal text-left text-xs tracking-normal leading-4"
                                >
                                    Marketing
                                </p>
                                </td>
                                <td class="pl-4 whitespace-no-wrap w-32">
                                <div
                                    class="bg-blue-200 h-6 w-20 rounded-md flex items-center justify-center"
                                >
                                    <span class="text-xs text-blue-500 font-normal"
                                    >Assigned</span
                                    >
                                </div>
                                </td>
                                <td class="pl-4 whitespace-no-wrap w-32">
                                <p
                                    class="text-gray-800 font-normal text-left text-xs tracking-normal leading-4"
                                >
                                    Low
                                </p>
                                </td>
                                <td class="pl-4 whitespace-no-wrap w-32">
                                <p
                                    class="text-gray-800 font-normal text-left text-xs tracking-normal leading-4"
                                >
                                    Jason Smith
                                </p>
                                </td>
                                <td class="pl-4 whitespace-no-wrap w-32">
                                <p
                                    class="text-gray-800 font-normal text-left text-xs tracking-normal leading-4"
                                >
                                    6/28/2020
                                </p>
                                </td>
                                <td class="pl-4 whitespace-no-wrap w-32">
                                <p
                                    class="text-gray-800 font-normal text-left text-xs tracking-normal leading-4"
                                >
                                    9/28/2020
                                </p>
                                </td>
                                <td class="pl-4 whitespace-no-wrap w-32">
                                <div class="relative w-32 z-10 py-2">
                                    <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="absolute inset-0 m-auto mr-2 xl:mr-4 z-0 icon cursor-pointer icon-tabler icon-tabler-chevron-down"
                                    width="16"
                                    height="16"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="#a0aec0"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    >
                                    <path stroke="none" d="M0 0h24v24H0z"></path>
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                    </svg>
                                    <select
                                    aria-label="Selected tab"
                                    class="focus:outline-none text-xs form-select block w-full py-2 px-2 xl:px-3 border border-gray-300 rounded text-gray-600 appearance-none bg-transparent"
                                    >
                                    <option>Edit Task</option>
                                    <option>Do Nothing</option>
                                    </select>
                                </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="10">
                                <div
                                    class="flex items-stretch w-full border-b border-gray-300"
                                >
                                    <ul>
                                    <li
                                        class="p-3 cursor-pointer text-gray-800 text-sm leading-3 tracking-normal hover:text-indigo-700 flex items-center justify-center"
                                    >
                                        <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-grid"
                                        width="20"
                                        height="20"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        fill="none"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        >
                                        <path stroke="none" d="M0 0h24v24H0z"></path>
                                        <rect
                                            x="4"
                                            y="4"
                                            width="6"
                                            height="6"
                                            rx="1"
                                        ></rect>
                                        <rect
                                            x="14"
                                            y="4"
                                            width="6"
                                            height="6"
                                            rx="1"
                                        ></rect>
                                        <rect
                                            x="4"
                                            y="14"
                                            width="6"
                                            height="6"
                                            rx="1"
                                        ></rect>
                                        <rect
                                            x="14"
                                            y="14"
                                            width="6"
                                            height="6"
                                            rx="1"
                                        ></rect>
                                        </svg>
                                    </li>
                                    <li
                                        class="cursor-pointer p-3 text-white focus:bg-indigo-600 hover:bg-indigo-600 bg-indigo-700 flex items-center justify-center"
                                    >
                                        <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-puzzle"
                                        width="20"
                                        height="20"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        fill="none"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        >
                                        <path stroke="none" d="M0 0h24v24H0z"></path>
                                        <path
                                            d="M4 7h3a1 1 0 0 0 1 -1v-1a2 2 0 0 1 4 0v1a1 1 0 0 0 1 1h3a1 1 0 0 1 1 1v3a1 1 0 0 0 1 1h1a2 2 0 0 1 0 4h-1a1 1 0 0 0 -1 1v3a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-1a2 2 0 0 0 -4 0v1a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h1a2 2 0 0 0 0 -4h-1a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1"
                                        ></path>
                                        </svg>
                                    </li>
                                    <li
                                        class="p-3 cursor-pointer text-gray-800 text-sm leading-3 tracking-normal hover:text-indigo-700 flex items-center justify-center"
                                    >
                                        <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-compass"
                                        width="20"
                                        height="20"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        fill="none"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        >
                                        <path stroke="none" d="M0 0h24v24H0z"></path>
                                        <polyline
                                            points="8 16 10 10 16 8 14 14 8 16"
                                        ></polyline>
                                        <circle cx="12" cy="12" r="9"></circle>
                                        </svg>
                                    </li>
                                    <li
                                        class="p-3 cursor-pointer text-gray-800 text-sm leading-3 tracking-normal hover:text-indigo-700 flex items-center justify-center"
                                    >
                                        <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-code"
                                        width="20"
                                        height="20"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        fill="none"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        >
                                        <path stroke="none" d="M0 0h24v24H0z"></path>
                                        <polyline points="7 8 3 12 7 16"></polyline>
                                        <polyline points="17 8 21 12 17 16"></polyline>
                                        <line x1="14" y1="4" x2="10" y2="20"></line>
                                        </svg>
                                    </li>
                                    </ul>
                                    <div class="w-full bg-white border-l border-gray-300">
                                    <h4
                                        class="pl-10 w-full text-sm text-gray-800 py-3 bg-gray-100"
                                    >
                                        Recruitment Software Maintenance
                                    </h4>
                                    <div class="bg-white px-8 py-6">
                                        <div class="flex items-start">
                                        <div class="w-1/3">
                                            <p class="text-gray-600 font-normal text-xs">
                                            Owner
                                            </p>
                                            <h5 class="text-gray-800 font-normal text-xs">
                                            Jason Smith
                                            </h5>
                                        </div>
                                        <div class="w-1/3">
                                            <p class="text-gray-600 font-normal text-xs">
                                            Type
                                            </p>
                                            <h5 class="text-gray-800 font-normal text-xs">
                                            Development
                                            </h5>
                                        </div>
                                        <div class="w-1/3">
                                            <p class="text-gray-600 font-normal text-xs">
                                            Time Spent
                                            </p>
                                            <h5 class="text-gray-800 font-normal text-xs">
                                            1440 Hours, 45 Mins
                                            </h5>
                                        </div>
                                        </div>
                                        <div class="flex items-start mt-6">
                                        <div class="w-1/3">
                                            <p class="text-gray-600 font-normal text-xs">
                                            Project
                                            </p>
                                            <h5 class="text-gray-800 font-normal text-xs">
                                            Create new features for the app
                                            </h5>
                                        </div>
                                        <div class="w-1/3">
                                            <p class="text-gray-600 font-normal text-xs">
                                            Priority
                                            </p>
                                            <h5 class="text-gray-800 font-normal text-xs">
                                            High
                                            </h5>
                                        </div>
                                        <div class="w-1/3">
                                            <p class="text-gray-600 font-normal text-xs">
                                            Incharge officer(s)
                                            </p>
                                            <h5 class="text-indigo-700 font-normal text-xs">
                                            Saul Berenson & Nicholas Brody
                                            </h5>
                                        </div>
                                        </div>
                                        <hr class="my-6 border-t border-gray-300 w-full" />
                                        <h5
                                        class="text-gray-600 font-normal text-xs mb-2 font-bold"
                                        >
                                        Message
                                        </h5>
                                        <p
                                        class="text-gray-800 font-normal text-xs w-3/5 leading-6"
                                        >
                                        But I must explain to you how all this mistaken
                                        idea of denouncing pleasure and praising pain was
                                        born and I will give you a complete account of the
                                        system, and expound the actual teachings of the
                                        great explorer of the truth, the master-builder of
                                        human happiness. No one rejects, dislikes, or
                                        avoids pleasure itself, because it is pleasure,
                                        but because those who do not know how to pursue
                                        pleasure rationally encounter consequences that
                                        are extremely painful
                                        </p>
                                        <h5
                                        class="text-indigo-700 font-normal text-xs mb-2 mt-12 font-bold"
                                        >
                                        Recommended Action
                                        </h5>
                                        <p
                                        class="text-gray-800 font-normal text-xs w-3/5 leading-6"
                                        >
                                        But I must explain to you how all this mistaken
                                        idea of denouncing pleasure and praising pain was
                                        born and I will give you a complete account of the
                                        system, and expound the actual teachings of the
                                        great explorer of the truth, the master-builder of
                                        human happiness. No one rejects, dislikes, or
                                        avoids pleasure itself, because it is pleasure,
                                        but because those who do not know how to pursue
                                        pleasure rationally encounter consequences that
                                        are extremely painful
                                        </p>
                                    </div>
                                    </div>
                                </div>
                                </td>
                            </tr>
                            <tr class="border-b border-gray-300 hover:bg-gray-100">
                                <td class="pl-3 w-24 py-3">
                                <div class="flex items-center">
                                    <input
                                    type="checkbox"
                                    onclick="tableInteract(this)"
                                    class="cursor-pointer relative w-5 h-5 border rounded border-gray-400 bg-white"
                                    />
                                    <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="cursor-pointer ml-2 lg:ml-4 mr-2 sm:mr-0 text-gray-800 icon icon-tabler icon-tabler-chevron-down arrow-show"
                                    width="16"
                                    height="16"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    >
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <polyline points="6 9 12 15 18 9" />
                                    </svg>
                                </div>
                                </td>
                                <td class="whitespace-no-wrap w-32">
                                <p
                                    class="text-gray-800 font-normal text-left text-xs tracking-normal leading-4"
                                >
                                    Jade's website
                                </p>
                                </td>
                                <td class="pl-4 whitespace-no-wrap w-32">
                                <p
                                    class="text-gray-800 font-normal text-left text-xs tracking-normal leading-4"
                                >
                                    Design
                                </p>
                                </td>
                                <td class="pl-4 whitespace-no-wrap w-32">
                                <div
                                    class="bg-red-200 h-6 w-20 rounded-md flex items-center justify-center"
                                >
                                    <span class="text-xs text-red-500 font-normal"
                                    >Pending</span
                                    >
                                </div>
                                </td>
                                <td class="pl-4 whitespace-no-wrap w-32">
                                <p
                                    class="text-gray-800 font-normal text-left text-xs tracking-normal leading-4"
                                >
                                    Medium
                                </p>
                                </td>
                                <td class="pl-4 whitespace-no-wrap w-32">
                                <p
                                    class="text-gray-800 font-normal text-left text-xs tracking-normal leading-4"
                                >
                                    Jason Smith
                                </p>
                                </td>
                                <td class="pl-4 whitespace-no-wrap w-32">
                                <p
                                    class="text-gray-800 font-normal text-left text-xs tracking-normal leading-4"
                                >
                                    6/28/2020
                                </p>
                                </td>
                                <td class="pl-4 whitespace-no-wrap w-32">
                                <p
                                    class="text-gray-800 font-normal text-left text-xs tracking-normal leading-4"
                                >
                                    9/28/2020
                                </p>
                                </td>
                                <td class="pl-4 whitespace-no-wrap w-32">
                                <div class="relative w-32 z-10 py-2">
                                    <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="absolute inset-0 m-auto mr-2 xl:mr-4 z-0 icon cursor-pointer icon-tabler icon-tabler-chevron-down"
                                    width="16"
                                    height="16"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="#a0aec0"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    >
                                    <path stroke="none" d="M0 0h24v24H0z"></path>
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                    </svg>
                                    <select
                                    aria-label="Selected tab"
                                    class="focus:outline-none text-xs form-select block w-full py-2 px-2 xl:px-3 border border-gray-300 rounded text-gray-600 appearance-none bg-transparent"
                                    >
                                    <option>Edit Task</option>
                                    <option>Do Nothing</option>
                                    </select>
                                </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="pl-3 w-24 py-3">
                                <div class="flex items-center">
                                    <input
                                    type="checkbox"
                                    onclick="tableInteract(this)"
                                    class="cursor-pointer relative w-5 h-5 border rounded border-gray-400 bg-white"
                                    />
                                    <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="cursor-pointer ml-2 lg:ml-4 mr-2 sm:mr-0 text-gray-800 icon icon-tabler icon-tabler-chevron-down arrow-show"
                                    width="16"
                                    height="16"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    >
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <polyline points="6 9 12 15 18 9" />
                                    </svg>
                                </div>
                                </td>
                                <td class="whitespace-no-wrap w-32">
                                <p
                                    class="text-gray-800 font-normal text-left text-xs tracking-normal leading-4"
                                >
                                    Marketing Visuals
                                </p>
                                </td>
                                <td class="pl-4 whitespace-no-wrap w-32">
                                <p
                                    class="text-gray-800 font-normal text-left text-xs tracking-normal leading-4"
                                >
                                    Marketing
                                </p>
                                </td>
                                <td class="pl-4 whitespace-no-wrap w-32">
                                <div
                                    class="bg-blue-200 h-6 w-20 rounded-md flex items-center justify-center"
                                >
                                    <span class="text-xs text-blue-500 font-normal"
                                    >Assigned</span
                                    >
                                </div>
                                </td>
                                <td class="pl-4 whitespace-no-wrap w-32">
                                <p
                                    class="text-gray-800 font-normal text-left text-xs tracking-normal leading-4"
                                >
                                    Low
                                </p>
                                </td>
                                <td class="pl-4 whitespace-no-wrap w-32">
                                <p
                                    class="text-gray-800 font-normal text-left text-xs tracking-normal leading-4"
                                >
                                    Jason Smith
                                </p>
                                </td>
                                <td class="pl-4 whitespace-no-wrap w-32">
                                <p
                                    class="text-gray-800 font-normal text-left text-xs tracking-normal leading-4"
                                >
                                    6/28/2020
                                </p>
                                </td>
                                <td class="pl-4 whitespace-no-wrap w-32">
                                <p
                                    class="text-gray-800 font-normal text-left text-xs tracking-normal leading-4"
                                >
                                    9/28/2020
                                </p>
                                </td>
                                <td class="pl-4 whitespace-no-wrap w-32">
                                <div class="relative w-32 z-10 py-2">
                                    <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="absolute inset-0 m-auto mr-2 xl:mr-4 z-0 icon cursor-pointer icon-tabler icon-tabler-chevron-down"
                                    width="16"
                                    height="16"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="#a0aec0"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    >
                                    <path stroke="none" d="M0 0h24v24H0z"></path>
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                    </svg>
                                    <select
                                    aria-label="Selected tab"
                                    class="focus:outline-none text-xs form-select block w-full py-2 px-2 xl:px-3 border border-gray-300 rounded text-gray-600 appearance-none bg-transparent"
                                    >
                                    <option>Edit Task</option>
                                    <option>Do Nothing</option>
                                    </select>
                                </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="10">
                                <div
                                    class="flex items-stretch w-full border-b border-gray-300"
                                >
                                    <ul>
                                    <li
                                        class="p-3 cursor-pointer text-gray-800 text-sm leading-3 tracking-normal hover:text-indigo-700 flex items-center justify-center"
                                    >
                                        <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-grid"
                                        width="20"
                                        height="20"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        fill="none"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        >
                                        <path stroke="none" d="M0 0h24v24H0z"></path>
                                        <rect
                                            x="4"
                                            y="4"
                                            width="6"
                                            height="6"
                                            rx="1"
                                        ></rect>
                                        <rect
                                            x="14"
                                            y="4"
                                            width="6"
                                            height="6"
                                            rx="1"
                                        ></rect>
                                        <rect
                                            x="4"
                                            y="14"
                                            width="6"
                                            height="6"
                                            rx="1"
                                        ></rect>
                                        <rect
                                            x="14"
                                            y="14"
                                            width="6"
                                            height="6"
                                            rx="1"
                                        ></rect>
                                        </svg>
                                    </li>
                                    <li
                                        class="cursor-pointer p-3 text-white focus:bg-indigo-600 hover:bg-indigo-600 bg-indigo-700 flex items-center justify-center"
                                    >
                                        <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-puzzle"
                                        width="20"
                                        height="20"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        fill="none"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        >
                                        <path stroke="none" d="M0 0h24v24H0z"></path>
                                        <path
                                            d="M4 7h3a1 1 0 0 0 1 -1v-1a2 2 0 0 1 4 0v1a1 1 0 0 0 1 1h3a1 1 0 0 1 1 1v3a1 1 0 0 0 1 1h1a2 2 0 0 1 0 4h-1a1 1 0 0 0 -1 1v3a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-1a2 2 0 0 0 -4 0v1a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h1a2 2 0 0 0 0 -4h-1a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1"
                                        ></path>
                                        </svg>
                                    </li>
                                    <li
                                        class="p-3 cursor-pointer text-gray-800 text-sm leading-3 tracking-normal hover:text-indigo-700 flex items-center justify-center"
                                    >
                                        <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-compass"
                                        width="20"
                                        height="20"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        fill="none"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        >
                                        <path stroke="none" d="M0 0h24v24H0z"></path>
                                        <polyline
                                            points="8 16 10 10 16 8 14 14 8 16"
                                        ></polyline>
                                        <circle cx="12" cy="12" r="9"></circle>
                                        </svg>
                                    </li>
                                    <li
                                        class="p-3 cursor-pointer text-gray-800 text-sm leading-3 tracking-normal hover:text-indigo-700 flex items-center justify-center"
                                    >
                                        <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-code"
                                        width="20"
                                        height="20"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        fill="none"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        >
                                        <path stroke="none" d="M0 0h24v24H0z"></path>
                                        <polyline points="7 8 3 12 7 16"></polyline>
                                        <polyline points="17 8 21 12 17 16"></polyline>
                                        <line x1="14" y1="4" x2="10" y2="20"></line>
                                        </svg>
                                    </li>
                                    </ul>
                                    <div class="w-full bg-white border-l border-gray-300">
                                    <h4
                                        class="pl-10 w-full text-sm text-gray-800 py-3 bg-gray-100"
                                    >
                                        Recruitment Software Maintenance
                                    </h4>
                                    <div class="bg-white px-8 py-6">
                                        <div class="flex items-start">
                                        <div class="w-1/3">
                                            <p class="text-gray-600 font-normal text-xs">
                                            Owner
                                            </p>
                                            <h5 class="text-gray-800 font-normal text-xs">
                                            Jason Smith
                                            </h5>
                                        </div>
                                        <div class="w-1/3">
                                            <p class="text-gray-600 font-normal text-xs">
                                            Type
                                            </p>
                                            <h5 class="text-gray-800 font-normal text-xs">
                                            Development
                                            </h5>
                                        </div>
                                        <div class="w-1/3">
                                            <p class="text-gray-600 font-normal text-xs">
                                            Time Spent
                                            </p>
                                            <h5 class="text-gray-800 font-normal text-xs">
                                            1440 Hours, 45 Mins
                                            </h5>
                                        </div>
                                        </div>
                                        <div class="flex items-start mt-6">
                                        <div class="w-1/3">
                                            <p class="text-gray-600 font-normal text-xs">
                                            Project
                                            </p>
                                            <h5 class="text-gray-800 font-normal text-xs">
                                            Create new features for the app
                                            </h5>
                                        </div>
                                        <div class="w-1/3">
                                            <p class="text-gray-600 font-normal text-xs">
                                            Priority
                                            </p>
                                            <h5 class="text-gray-800 font-normal text-xs">
                                            High
                                            </h5>
                                        </div>
                                        <div class="w-1/3">
                                            <p class="text-gray-600 font-normal text-xs">
                                            Incharge officer(s)
                                            </p>
                                            <h5 class="text-indigo-700 font-normal text-xs">
                                            Saul Berenson & Nicholas Brody
                                            </h5>
                                        </div>
                                        </div>
                                        <hr class="my-6 border-t border-gray-300 w-full" />
                                        <h5
                                        class="text-gray-600 font-normal text-xs mb-2 font-bold"
                                        >
                                        Message
                                        </h5>
                                        <p
                                        class="text-gray-800 font-normal text-xs w-3/5 leading-6"
                                        >
                                        But I must explain to you how all this mistaken
                                        idea of denouncing pleasure and praising pain was
                                        born and I will give you a complete account of the
                                        system, and expound the actual teachings of the
                                        great explorer of the truth, the master-builder of
                                        human happiness. No one rejects, dislikes, or
                                        avoids pleasure itself, because it is pleasure,
                                        but because those who do not know how to pursue
                                        pleasure rationally encounter consequences that
                                        are extremely painful
                                        </p>
                                        <h5
                                        class="text-indigo-700 font-normal text-xs mb-2 mt-12 font-bold"
                                        >
                                        Recommended Action
                                        </h5>
                                        <p
                                        class="text-gray-800 font-normal text-xs w-3/5 leading-6"
                                        >
                                        But I must explain to you how all this mistaken
                                        idea of denouncing pleasure and praising pain was
                                        born and I will give you a complete account of the
                                        system, and expound the actual teachings of the
                                        great explorer of the truth, the master-builder of
                                        human happiness. No one rejects, dislikes, or
                                        avoids pleasure itself, because it is pleasure,
                                        but because those who do not know how to pursue
                                        pleasure rationally encounter consequences that
                                        are extremely painful
                                        </p>
                                    </div>
                                    </div>
                                </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        </div>
                    </div>
                    <div
                        class="mx-auto w-11/12 pt-6 flex justify-center sm:justify-end items-center"
                    >
                        <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="mr-5 text-gray-600 icon icon-tabler icon-tabler-chevron-left"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        fill="none"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        >
                        <path stroke="none" d="M0 0h24v24H0z"></path>
                        <polyline points="15 6 9 12 15 18"></polyline>
                        </svg>
                        <p class="text-gray-800 fot-normal text-xs">Page</p>
                        <label for="selectedPage" class="hidden"></label>
                        <input
                        id="selectedPage"
                        type="text"
                        class="bg-white w-6 px-2 mx-2 text-gray-800 focus:outline-none focus:border focus:border-indigo-700 font-normal flex items-center text-xs border-gray-300 rounded border"
                        value="4"
                        />
                        <p class="text-gray-800 fot-normal text-xs">of 20</p>
                        <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="text-gray-600 mx-5 icon icon-tabler icon-tabler-chevron-right"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        fill="none"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        >
                        <path stroke="none" d="M0 0h24v24H0z"></path>
                        <polyline points="9 6 15 12 9 18"></polyline>
                        </svg>
                        <label for="selectedPage" class="hidden"></label>
                        <input
                        id="selectedPage"
                        type="text"
                        class="bg-white w-8 px-2 mx-2 text-gray-800 focus:outline-none focus:border focus:border-indigo-700 font-normal flex items-center text-xs border-gray-300 rounded border"
                        value="30"
                        />
                        <p class="-mt-1 text-gray-800 fot-normal text-xs">per page</p>
                    </div>
                    </div>
                </div>

                <div
                    id="report-modal"
                    class="hidden fixed z-10 lg:pt-5 left-0 top-0 w-full h-full overflow-auto shadow-lg display: none;"
                    style="
                    background-color: rgb(0, 0, 0);
                    background-color: rgba(0, 0, 0, 0.4);
                    "
                >
                    <div role="alert" class="container mx-auto w-11/12 md:w-2/3 max-w-lg">
                    <div
                        class="relative p-4 md:p-8 bg-white shadow-md rounded border border-gray-400"
                    >
                        <div class="w-full flex justify-center text-gray-600 mb-4">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-upload"
                            width="56"
                            height="56"
                            viewBox="0 0 24 24"
                            stroke-width="1"
                            stroke="currentColor"
                            fill="none"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
                            <polyline points="7 9 12 4 17 9" />
                            <line x1="12" y1="4" x2="12" y2="16" />
                        </svg>
                        </div>
                        <h1
                        class="text-center text-gray-800 font-lg font-bold tracking-normal leading-tight mb-4"
                        >
                        Upload Files
                        </h1>
                        <p class="mb-5 text-sm text-gray-600 text-center font-normal">
                        Attach files for portfolio
                        </p>
                        <div
                        class="flex flex-col items-center justify-center w-full mb-8 border border-dashed border-indigo-500 rounded-lg py-8"
                        >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="cursor-pointer mb-5 text-indigo-500 icon icon-tabler icon-tabler-cloud-upload"
                            width="60"
                            height="60"
                            viewBox="0 0 24 24"
                            stroke-width="1"
                            stroke="currentColor"
                            fill="none"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <path
                            d="M7 18a4.6 4.4 0 0 1 0 -9h0a5 4.5 0 0 1 11 2h1a3.5 3.5 0 0 1 0 7h-1"
                            />
                            <polyline points="9 15 12 12 15 15" />
                            <line x1="12" y1="12" x2="12" y2="21" />
                        </svg>
                        <p
                            class="text-base font-normal tracking-normal text-gray-800 text-center"
                        >
                            Drag and drop here
                        </p>
                        <p
                            class="text-base font-normal tracking-normal text-gray-800 text-center my-1"
                        >
                            or
                        </p>
                        <label
                            for="fileUp"
                            class="cursor-pointer text-base font-normal tracking-normal text-indigo-700 text-center"
                        >
                            browse
                        </label>
                        <input type="file" class="hidden" name="fileUpload" id="fileUp" />
                        </div>
                        <div class="flex justify-between items-center w-full">
                        <div class="items-center text-gray-600 flex">
                            <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-file"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            fill="none"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            >
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                            <path
                                d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"
                            />
                            </svg>
                            <p
                            class="text-gray-800 font-normal text-base tracking-normal ml-2 mr-4"
                            >
                            Invoice 03/02/20
                            </p>
                        </div>
                        <p
                            class="text-gray-600 ml-auto mr-6 font-normal text-base tracking-normal"
                        >
                            37%
                        </p>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="cursor-pointer text-gray-400 icon icon-tabler icon-tabler-x"
                            width="16"
                            height="16"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                            fill="none"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <line x1="18" y1="6" x2="6" y2="18" />
                            <line x1="6" y1="6" x2="18" y2="18" />
                        </svg>
                        </div>
                        <div class="relative mb-6 mt-4">
                        <hr class="h-1 rounded-sm bg-gray-200" />
                        <hr class="absolute top-0 h-1 w-5/12 rounded-sm bg-indigo-500" />
                        </div>
                        <div class="flex justify-between items-center w-full">
                        <div class="items-center text-gray-600 flex">
                            <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-file"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            fill="none"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            >
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                            <path
                                d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"
                            />
                            </svg>
                            <p
                            class="text-gray-800 font-normal text-base tracking-normal ml-2 mr-4"
                            >
                            Invoice 04/04/20
                            </p>
                        </div>
                        <p
                            class="text-gray-600 ml-auto mr-6 font-normal text-base tracking-normal"
                        >
                            77%
                        </p>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="cursor-pointer text-gray-400 icon icon-tabler icon-tabler-x"
                            width="16"
                            height="16"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                            fill="none"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <line x1="18" y1="6" x2="6" y2="18" />
                            <line x1="6" y1="6" x2="18" y2="18" />
                        </svg>
                        </div>
                        <div class="relative mb-6 mt-4">
                        <hr class="h-1 rounded-sm bg-gray-200" />
                        <hr class="absolute top-0 h-1 w-9/12 rounded-sm bg-indigo-500" />
                        </div>
                        <div class="flex justify-between items-center w-full">
                        <div class="items-center text-gray-600 flex">
                            <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-file"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            fill="none"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            >
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                            <path
                                d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"
                            />
                            </svg>
                            <p
                            class="text-gray-800 font-normal text-base tracking-normal ml-2 mr-4"
                            >
                            Invoice 02/08/20
                            </p>
                        </div>
                        <p
                            class="text-gray-600 font-normal ml-auto mr-6 text-base tracking-normal"
                        >
                            60%
                        </p>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="cursor-pointer text-gray-400 icon icon-tabler icon-tabler-x"
                            width="16"
                            height="16"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                            fill="none"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <line x1="18" y1="6" x2="6" y2="18" />
                            <line x1="6" y1="6" x2="18" y2="18" />
                        </svg>
                        </div>
                        <div class="relative mb-8 mt-4">
                        <hr class="h-1 rounded-sm bg-gray-200" />
                        <hr class="absolute top-0 h-1 w-7/12 rounded-sm bg-indigo-500" />
                        </div>
                        <div class="flex items-center justify-center w-full">
                        <button
                            class="focus:outline-none transition duration-150 ease-in-out hover:bg-indigo-600 bg-indigo-500 rounded text-white px-8 py-2 text-sm"
                        >
                            Submit
                        </button>
                        <button
                            class="report-cancel focus:outline-none ml-3 bg-gray-100 transition duration-150 text-gray-600 ease-in-out hover:border-gray-400 hover:bg-gray-300 border rounded px-8 py-2 text-sm"
                        >
                            Cancel
                        </button>
                        </div>
                        <svg
                        xmlns="http://www.w3.org/2000/svg"
                        aria-label="Close"
                        class="report-close cursor-pointer absolute top-0 right-0 mt-4 mr-5 text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out icon icon-tabler icon-tabler-x"
                        width="20"
                        height="20"
                        viewBox="0 0 24 24"
                        stroke-width="2.5"
                        stroke="currentColor"
                        fill="none"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        >
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <line x1="18" y1="6" x2="6" y2="18" />
                        <line x1="6" y1="6" x2="18" y2="18" />
                        </svg>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import ProjectDetails from './ProjectDetails'
    import Alerts from '@/Jetstream/Alerts'
    import $ from 'jquery'

    export default {
        props: ['project', 'project_task_statuses', 'project_tasks'],
        
        components: {
            AppLayout,
            ProjectDetails,
            Alerts
        },

        mounted () {
            $(document).ready(function () {
                $("#notification-btn").click(function () {
                    $("#notification-modal").toggle();
                });
                $("#all-check").click(function () {
                    if (this.checked) {
                    $("#main-table input:checkbox").attr("checked", "checked");
                    $("#main-table tr").addClass("bg-gray-100");
                    } else {
                    $("#main-table input:checkbox").removeAttr("checked");
                    $("#main-table tr").removeClass("bg-gray-100");
                    }
                });
                $("#delete-btn").click(function () {
                    $("#delete-modal").fadeIn();
                });
                $(".close").click(function () {
                    $("#delete-modal").fadeOut();
                });
                $("#delete-div,#upload-div").mouseenter(function () {
                    $(this).find(".tooltip").show();
                });
                $("#delete-div,#upload-div").mouseleave(function () {
                    $(this).find(".tooltip").hide();
                });
                $("#upload-div").click(function () {
                    $("#report-modal").fadeIn();
                });
                $(".report-cancel,.report-close").click(function () {
                    $("#report-modal").fadeOut();
                });
                });

                $(function () {
                $("td[colspan=10]").find("div").hide();
                $(".arrow-show").click(function (event) {
                    event.stopPropagation();
                    var $target = $(event.target);
                    if ($target.closest("td").attr("colspan") > 10) {
                    $target.slideUp();
                    } else {
                    $target.closest("tr").next().find("div").slideToggle();
                    }
                });
                });
        }
    }
</script>