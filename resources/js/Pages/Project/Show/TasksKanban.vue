<template>
    <div class="p-4">
        <div
            class="
                grid
                sm:grid-cols-1
                md:grid-cols-2
                lg:grid-cols-3
                xl:grid-cols-3
                gap-6
                lg:gap-2
                2xl:gap-6
                overflow-x-auto
            "
        >
            <div v-for="(status, key) in task_statuses" :key="key">
                <p
                    class="
                        text-lg
                        md:text-xl
                        lg:text-2xl
                        leading-normal
                        text-gray-800
                    "
                >
                    {{ status.name }}
                </p>
                <div class="bg-gray-200 py-3 px-2 rounded-xl mt-6">
                    <div class="bg-white shadow rounded-lg py-4 px-4">
                        <div class="flex items-center justify-between">
                            <p
                                class="
                                    text-base
                                    font-semibold
                                    leading-none
                                    text-gray-800
                                "
                            >
                                Wireframe MVP
                            </p>
                            <div class="relative">
                                <div
                                    v-if="todo1"
                                    class="
                                        dropdown-content
                                        mt-8
                                        absolute
                                        left-0
                                        shadow-md
                                        z-10
                                        -ml-16
                                        xl:-ml-10
                                        2xl:ml-0
                                        w-32
                                    "
                                >
                                    <ul class="bg-white shadow rounded py-1">
                                        <li
                                            class="
                                                cursor-pointer
                                                text-gray-600
                                                leading-3
                                                tracking-normal
                                                py-3
                                                hover:bg-indigo-700
                                                hover:text-white
                                                px-3
                                                font-normal
                                            "
                                        >
                                            Edit
                                        </li>
                                        <li
                                            class="
                                                cursor-pointer
                                                text-gray-600
                                                leading-3
                                                tracking-normal
                                                py-3
                                                hover:bg-indigo-700
                                                hover:text-white
                                                px-3
                                                font-normal
                                            "
                                        >
                                            Delete
                                        </li>
                                        <li
                                            class="
                                                cursor-pointer
                                                text-gray-600
                                                leading-3
                                                tracking-normal
                                                py-3
                                                hover:bg-indigo-700
                                                hover:text-white
                                                px-3
                                                font-normal
                                            "
                                        >
                                            Duplicate
                                        </li>
                                    </ul>
                                </div>
                                <button class="focus:outline-none">
                                    <svg
                                        @click="todo1 = !todo1"
                                        class="dropbtn"
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                    >
                                        <path
                                            d="M5 10C3.9 10 3 10.9 3 12C3 13.1 3.9 14 5 14C6.1 14 7 13.1 7 12C7 10.9 6.1 10 5 10ZM19 10C17.9 10 17 10.9 17 12C17 13.1 17.9 14 19 14C20.1 14 21 13.1 21 12C21 10.9 20.1 10 19 10ZM12 10C10.9 10 10 10.9 10 12C10 13.1 10.9 14 12 14C13.1 14 14 13.1 14 12C14 10.9 13.1 10 12 10Z"
                                            fill="#52525B"
                                        />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <p class="mt-3 text-sm leading-normal text-gray-600">
                            Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit. Integer posuere erat ar ..
                        </p>
                        <div class="my-4">
                            <div
                                class="
                                    flex
                                    items-center
                                    justify-between
                                    text-xs
                                    font-medium
                                    leading-3
                                    text-gray-600
                                "
                            >
                                <p>Progress</p>
                                <p>00/18</p>
                            </div>
                            <div class="mt-1">
                                <div
                                    class="
                                        w-full
                                        h-1.5
                                        bg-indigo-50
                                        rounded-full
                                    "
                                ></div>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div class="flex items-center mr-1.5">
                                <img
                                    class="shadow-md w-8 h-8 rounded-full"
                                    src="https://cdn.tuk.dev/assets/templates/olympus/projects(8).png"
                                />
                                <img
                                    class="shadow-md w-8 h-8 rounded-full -ml-2"
                                    src="https://cdn.tuk.dev/assets/templates/olympus/projects(9).png"
                                />
                                <img
                                    class="shadow-md w-8 h-8 rounded-full -ml-2"
                                    src="https://cdn.tuk.dev/assets/templates/olympus/projects(10).png"
                                />
                                <img
                                    class="shadow-md w-8 h-8 rounded-full -ml-2"
                                    src="https://cdn.tuk.dev/assets/templates/olympus/projects(11).png"
                                />
                            </div>
                            <p class="text-xs leading-3 text-gray-600">
                                +5 more
                            </p>
                        </div>
                        <div class="mt-3 flex items-center justify-between">
                            <button
                                class="
                                    py-2
                                    px-3
                                    bg-gray-100
                                    hover:bg-gray-200
                                    rounded
                                    text-xs
                                    font-medium
                                    leading-3
                                    text-gray-600
                                "
                            >
                                Due on: 7 Sept, 23:00
                            </button>
                            <div
                                class="
                                    flex
                                    items-center
                                    text-xs
                                    font-medium
                                    leading-3
                                    text-gray-600
                                "
                            >
                                <div class="flex items-center mr-3">
                                    <svg
                                        class="mr-1"
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="16"
                                        height="16"
                                        viewBox="0 0 16 16"
                                        fill="none"
                                    >
                                        <path
                                            d="M10 4.66656L5.66671 8.99989C5.4015 9.26511 5.2525 9.62482 5.2525 9.99989C5.2525 10.375 5.4015 10.7347 5.66671 10.9999C5.93193 11.2651 6.29164 11.4141 6.66671 11.4141C7.04179 11.4141 7.4015 11.2651 7.66671 10.9999L12 6.66656C12.5305 6.13613 12.8285 5.41671 12.8285 4.66656C12.8285 3.91642 12.5305 3.19699 12 2.66656C11.4696 2.13613 10.7502 1.83813 10 1.83813C9.2499 1.83813 8.53048 2.13613 8.00005 2.66656L3.66671 6.99989C2.87106 7.79554 2.42407 8.87468 2.42407 9.99989C2.42407 11.1251 2.87106 12.2042 3.66671 12.9999C4.46236 13.7955 5.54149 14.2425 6.66671 14.2425C7.79193 14.2425 8.87106 13.7955 9.66671 12.9999L14 8.66656"
                                            stroke="#52525B"
                                            stroke-width="1.25"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                    </svg>
                                    07
                                </div>
                                <div class="flex items-center">
                                    <svg
                                        class="mr-1"
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="16"
                                        height="16"
                                        viewBox="0 0 16 16"
                                        fill="none"
                                    >
                                        <path
                                            d="M2.66663 13.9999V5.33325C2.66663 4.80282 2.87734 4.29411 3.25241 3.91904C3.62749 3.54397 4.13619 3.33325 4.66663 3.33325H11.3333C11.8637 3.33325 12.3724 3.54397 12.7475 3.91904C13.1226 4.29411 13.3333 4.80282 13.3333 5.33325V9.33325C13.3333 9.86369 13.1226 10.3724 12.7475 10.7475C12.3724 11.1225 11.8637 11.3333 11.3333 11.3333H5.33329L2.66663 13.9999Z"
                                            stroke="#52525B"
                                            stroke-width="1.25"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                        <path
                                            d="M8 7.33325V7.33992"
                                            stroke="#52525B"
                                            stroke-width="1.25"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                        <path
                                            d="M5.33337 7.33325V7.33992"
                                            stroke="#52525B"
                                            stroke-width="1.25"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                        <path
                                            d="M10.6666 7.33325V7.33992"
                                            stroke="#52525B"
                                            stroke-width="1.25"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                    </svg>
                                    03
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white shadow rounded-lg py-4 px-4 mt-3">
                        <div class="flex items-center justify-between">
                            <p
                                class="
                                    text-base
                                    font-semibold
                                    leading-none
                                    text-gray-800
                                "
                            >
                                Wireframe MVP
                            </p>
                            <div class="relative">
                                <div
                                    v-if="todo2"
                                    class="
                                        dropdown-content
                                        mt-8
                                        absolute
                                        left-0
                                        shadow-md
                                        z-10
                                        -ml-16
                                        xl:-ml-10
                                        2xl:ml-0
                                        w-32
                                    "
                                >
                                    <ul class="bg-white shadow rounded py-1">
                                        <li
                                            class="
                                                cursor-pointer
                                                text-gray-600
                                                leading-3
                                                tracking-normal
                                                py-3
                                                hover:bg-indigo-700
                                                hover:text-white
                                                px-3
                                                font-normal
                                            "
                                        >
                                            Edit
                                        </li>
                                        <li
                                            class="
                                                cursor-pointer
                                                text-gray-600
                                                leading-3
                                                tracking-normal
                                                py-3
                                                hover:bg-indigo-700
                                                hover:text-white
                                                px-3
                                                font-normal
                                            "
                                        >
                                            Delete
                                        </li>
                                        <li
                                            class="
                                                cursor-pointer
                                                text-gray-600
                                                leading-3
                                                tracking-normal
                                                py-3
                                                hover:bg-indigo-700
                                                hover:text-white
                                                px-3
                                                font-normal
                                            "
                                        >
                                            Duplicate
                                        </li>
                                    </ul>
                                </div>
                                <button class="focus:outline-none">
                                    <svg
                                        @click="todo2 = !todo2"
                                        class="dropbtn"
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                    >
                                        <path
                                            d="M5 10C3.9 10 3 10.9 3 12C3 13.1 3.9 14 5 14C6.1 14 7 13.1 7 12C7 10.9 6.1 10 5 10ZM19 10C17.9 10 17 10.9 17 12C17 13.1 17.9 14 19 14C20.1 14 21 13.1 21 12C21 10.9 20.1 10 19 10ZM12 10C10.9 10 10 10.9 10 12C10 13.1 10.9 14 12 14C13.1 14 14 13.1 14 12C14 10.9 13.1 10 12 10Z"
                                            fill="#52525B"
                                        />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <p class="mt-3 text-sm leading-normal text-gray-600">
                            Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit. Integer posuere erat ar ..
                        </p>
                        <div class="my-4">
                            <div
                                class="
                                    flex
                                    items-center
                                    justify-between
                                    text-xs
                                    font-medium
                                    leading-3
                                    text-gray-600
                                "
                            >
                                <p>Progress</p>
                                <p>00/18</p>
                            </div>
                            <div class="mt-1">
                                <div
                                    class="
                                        w-full
                                        h-1.5
                                        bg-indigo-50
                                        rounded-full
                                    "
                                ></div>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div class="flex items-center mr-1.5">
                                <img
                                    class="shadow-md w-8 h-8 rounded-full"
                                    src="https://cdn.tuk.dev/assets/templates/olympus/projects(8).png"
                                />
                                <img
                                    class="shadow-md w-8 h-8 rounded-full -ml-2"
                                    src="https://cdn.tuk.dev/assets/templates/olympus/projects(9).png"
                                />
                                <img
                                    class="shadow-md w-8 h-8 rounded-full -ml-2"
                                    src="https://cdn.tuk.dev/assets/templates/olympus/projects(10).png"
                                />
                                <img
                                    class="shadow-md w-8 h-8 rounded-full -ml-2"
                                    src="https://cdn.tuk.dev/assets/templates/olympus/projects(11).png"
                                />
                            </div>
                            <p class="text-xs leading-3 text-gray-600">
                                +5 more
                            </p>
                        </div>
                        <div class="mt-3 flex items-center justify-between">
                            <button
                                class="
                                    py-2
                                    px-3
                                    bg-gray-100
                                    hover:bg-gray-200
                                    rounded
                                    text-xs
                                    font-medium
                                    leading-3
                                    text-gray-600
                                "
                            >
                                Due on: 7 Sept, 23:00
                            </button>
                            <div
                                class="
                                    flex
                                    items-center
                                    text-xs
                                    font-medium
                                    leading-3
                                    text-gray-600
                                "
                            >
                                <div class="flex items-center mr-3">
                                    <svg
                                        class="mr-1"
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="16"
                                        height="16"
                                        viewBox="0 0 16 16"
                                        fill="none"
                                    >
                                        <path
                                            d="M10 4.66656L5.66671 8.99989C5.4015 9.26511 5.2525 9.62482 5.2525 9.99989C5.2525 10.375 5.4015 10.7347 5.66671 10.9999C5.93193 11.2651 6.29164 11.4141 6.66671 11.4141C7.04179 11.4141 7.4015 11.2651 7.66671 10.9999L12 6.66656C12.5305 6.13613 12.8285 5.41671 12.8285 4.66656C12.8285 3.91642 12.5305 3.19699 12 2.66656C11.4696 2.13613 10.7502 1.83813 10 1.83813C9.2499 1.83813 8.53048 2.13613 8.00005 2.66656L3.66671 6.99989C2.87106 7.79554 2.42407 8.87468 2.42407 9.99989C2.42407 11.1251 2.87106 12.2042 3.66671 12.9999C4.46236 13.7955 5.54149 14.2425 6.66671 14.2425C7.79193 14.2425 8.87106 13.7955 9.66671 12.9999L14 8.66656"
                                            stroke="#52525B"
                                            stroke-width="1.25"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                    </svg>
                                    07
                                </div>
                                <div class="flex items-center">
                                    <svg
                                        class="mr-1"
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="16"
                                        height="16"
                                        viewBox="0 0 16 16"
                                        fill="none"
                                    >
                                        <path
                                            d="M2.66663 13.9999V5.33325C2.66663 4.80282 2.87734 4.29411 3.25241 3.91904C3.62749 3.54397 4.13619 3.33325 4.66663 3.33325H11.3333C11.8637 3.33325 12.3724 3.54397 12.7475 3.91904C13.1226 4.29411 13.3333 4.80282 13.3333 5.33325V9.33325C13.3333 9.86369 13.1226 10.3724 12.7475 10.7475C12.3724 11.1225 11.8637 11.3333 11.3333 11.3333H5.33329L2.66663 13.9999Z"
                                            stroke="#52525B"
                                            stroke-width="1.25"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                        <path
                                            d="M8 7.33325V7.33992"
                                            stroke="#52525B"
                                            stroke-width="1.25"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                        <path
                                            d="M5.33337 7.33325V7.33992"
                                            stroke="#52525B"
                                            stroke-width="1.25"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                        <path
                                            d="M10.6666 7.33325V7.33992"
                                            stroke="#52525B"
                                            stroke-width="1.25"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                    </svg>
                                    03
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white shadow rounded-lg py-4 px-4 mt-3">
                        <div class="flex items-center justify-between">
                            <p
                                class="
                                    text-base
                                    font-semibold
                                    leading-none
                                    text-gray-800
                                "
                            >
                                Wireframe MVP
                            </p>
                            <div class="relative">
                                <div
                                    v-if="todo3"
                                    class="
                                        dropdown-content
                                        mt-8
                                        absolute
                                        left-0
                                        shadow-md
                                        z-10
                                        -ml-16
                                        xl:-ml-10
                                        2xl:ml-0
                                        w-32
                                    "
                                >
                                    <ul class="bg-white shadow rounded py-1">
                                        <li
                                            class="
                                                cursor-pointer
                                                text-gray-600
                                                leading-3
                                                tracking-normal
                                                py-3
                                                hover:bg-indigo-700
                                                hover:text-white
                                                px-3
                                                font-normal
                                            "
                                        >
                                            Edit
                                        </li>
                                        <li
                                            class="
                                                cursor-pointer
                                                text-gray-600
                                                leading-3
                                                tracking-normal
                                                py-3
                                                hover:bg-indigo-700
                                                hover:text-white
                                                px-3
                                                font-normal
                                            "
                                        >
                                            Delete
                                        </li>
                                        <li
                                            class="
                                                cursor-pointer
                                                text-gray-600
                                                leading-3
                                                tracking-normal
                                                py-3
                                                hover:bg-indigo-700
                                                hover:text-white
                                                px-3
                                                font-normal
                                            "
                                        >
                                            Duplicate
                                        </li>
                                    </ul>
                                </div>
                                <button class="focus:outline-none">
                                    <svg
                                        @click="todo3 = !todo3"
                                        class="dropbtn"
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                    >
                                        <path
                                            d="M5 10C3.9 10 3 10.9 3 12C3 13.1 3.9 14 5 14C6.1 14 7 13.1 7 12C7 10.9 6.1 10 5 10ZM19 10C17.9 10 17 10.9 17 12C17 13.1 17.9 14 19 14C20.1 14 21 13.1 21 12C21 10.9 20.1 10 19 10ZM12 10C10.9 10 10 10.9 10 12C10 13.1 10.9 14 12 14C13.1 14 14 13.1 14 12C14 10.9 13.1 10 12 10Z"
                                            fill="#52525B"
                                        />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <p class="mt-3 text-sm leading-normal text-gray-600">
                            Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit. Integer posuere erat ar ..
                        </p>
                        <div class="my-4">
                            <div
                                class="
                                    flex
                                    items-center
                                    justify-between
                                    text-xs
                                    font-medium
                                    leading-3
                                    text-gray-600
                                "
                            >
                                <p>Progress</p>
                                <p>00/18</p>
                            </div>
                            <div class="mt-1">
                                <div
                                    class="
                                        w-full
                                        h-1.5
                                        bg-indigo-50
                                        rounded-full
                                    "
                                ></div>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div class="flex items-center mr-1.5">
                                <img
                                    class="shadow-md w-8 h-8 rounded-full"
                                    src="https://cdn.tuk.dev/assets/templates/olympus/projects(8).png"
                                />
                                <img
                                    class="shadow-md w-8 h-8 rounded-full -ml-2"
                                    src="https://cdn.tuk.dev/assets/templates/olympus/projects(9).png"
                                />
                                <img
                                    class="shadow-md w-8 h-8 rounded-full -ml-2"
                                    src="https://cdn.tuk.dev/assets/templates/olympus/projects(10).png"
                                />
                                <img
                                    class="shadow-md w-8 h-8 rounded-full -ml-2"
                                    src="https://cdn.tuk.dev/assets/templates/olympus/projects(11).png"
                                />
                            </div>
                            <p class="text-xs leading-3 text-gray-600">
                                +5 more
                            </p>
                        </div>
                        <div class="mt-3 flex items-center justify-between">
                            <button
                                class="
                                    py-2
                                    px-3
                                    bg-gray-100
                                    hover:bg-gray-200
                                    rounded
                                    text-xs
                                    font-medium
                                    leading-3
                                    text-gray-600
                                "
                            >
                                Due on: 7 Sept, 23:00
                            </button>
                            <div
                                class="
                                    flex
                                    items-center
                                    text-xs
                                    font-medium
                                    leading-3
                                    text-gray-600
                                "
                            >
                                <div class="flex items-center mr-3">
                                    <svg
                                        class="mr-1"
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="16"
                                        height="16"
                                        viewBox="0 0 16 16"
                                        fill="none"
                                    >
                                        <path
                                            d="M10 4.66656L5.66671 8.99989C5.4015 9.26511 5.2525 9.62482 5.2525 9.99989C5.2525 10.375 5.4015 10.7347 5.66671 10.9999C5.93193 11.2651 6.29164 11.4141 6.66671 11.4141C7.04179 11.4141 7.4015 11.2651 7.66671 10.9999L12 6.66656C12.5305 6.13613 12.8285 5.41671 12.8285 4.66656C12.8285 3.91642 12.5305 3.19699 12 2.66656C11.4696 2.13613 10.7502 1.83813 10 1.83813C9.2499 1.83813 8.53048 2.13613 8.00005 2.66656L3.66671 6.99989C2.87106 7.79554 2.42407 8.87468 2.42407 9.99989C2.42407 11.1251 2.87106 12.2042 3.66671 12.9999C4.46236 13.7955 5.54149 14.2425 6.66671 14.2425C7.79193 14.2425 8.87106 13.7955 9.66671 12.9999L14 8.66656"
                                            stroke="#52525B"
                                            stroke-width="1.25"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                    </svg>
                                    07
                                </div>
                                <div class="flex items-center">
                                    <svg
                                        class="mr-1"
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="16"
                                        height="16"
                                        viewBox="0 0 16 16"
                                        fill="none"
                                    >
                                        <path
                                            d="M2.66663 13.9999V5.33325C2.66663 4.80282 2.87734 4.29411 3.25241 3.91904C3.62749 3.54397 4.13619 3.33325 4.66663 3.33325H11.3333C11.8637 3.33325 12.3724 3.54397 12.7475 3.91904C13.1226 4.29411 13.3333 4.80282 13.3333 5.33325V9.33325C13.3333 9.86369 13.1226 10.3724 12.7475 10.7475C12.3724 11.1225 11.8637 11.3333 11.3333 11.3333H5.33329L2.66663 13.9999Z"
                                            stroke="#52525B"
                                            stroke-width="1.25"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                        <path
                                            d="M8 7.33325V7.33992"
                                            stroke="#52525B"
                                            stroke-width="1.25"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                        <path
                                            d="M5.33337 7.33325V7.33992"
                                            stroke="#52525B"
                                            stroke-width="1.25"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                        <path
                                            d="M10.6666 7.33325V7.33992"
                                            stroke="#52525B"
                                            stroke-width="1.25"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                    </svg>
                                    03
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "TasksKanban",

    props: ["tasks", "task_statuses"],
};
</script>
