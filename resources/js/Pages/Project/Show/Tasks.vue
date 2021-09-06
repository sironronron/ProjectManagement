<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Tasks
            </h2>
        </template>

        <div>
            <alerts :flash="$page.props.flash" />

            <project-details :project="project" />

            <div class="mt-5">
                <div class="flex flex-wrap">
                    <div class="w-full">
                        <div class="mx-auto bg-white shadow rounded">
                            <div
                                class="
                                    flex flex-col
                                    md:flex-row
                                    p-3
                                    justify-between
                                    items-start
                                    md:items-stretch
                                    w-full
                                "
                            >
                                <div
                                    class="
                                        w-full
                                        md:w-1/3
                                        flex flex-col
                                        md:flex-row
                                        items-start
                                        md:items-center
                                    "
                                >
                                    <div class="flex items-center">
                                        <inertia-link
                                            :href="
                                                route(
                                                    'projects.create.tasks',
                                                    project.unique_id
                                                )
                                            "
                                        >
                                            <div
                                                class="
                                                    p-2
                                                    border-gray-200 border
                                                    rounded
                                                    relative
                                                    text-gray-400
                                                    hover:text-indigo-600
                                                    hover:bg-gray-300
                                                    transition
                                                    ease-in-out
                                                "
                                            >
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="h-4 w-4"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke="currentColor"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"
                                                    />
                                                </svg>
                                            </div>
                                        </inertia-link>
                                    </div>
                                </div>
                                <div
                                    class="
                                        w-full
                                        md:w-2/3
                                        flex flex-col
                                        md:flex-row
                                        items-start
                                        md:items-center
                                        justify-end
                                    "
                                >
                                    <div
                                        class="
                                            flex
                                            items-center
                                            border-gray-200 border
                                            rounded
                                            mt-3
                                            md:mt-0
                                        "
                                    >
                                        <div class="p-2">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="
                                                    cursor-pointer
                                                    text-gray-600
                                                    icon
                                                    icon-tabler
                                                    icon-tabler-table
                                                "
                                                width="20"
                                                height="20"
                                                viewBox="0 0 24 24"
                                                stroke-width="1.5"
                                                stroke="currentColor"
                                                fill="none"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            >
                                                <path
                                                    stroke="none"
                                                    d="M0 0h24v24H0z"
                                                />
                                                <rect
                                                    x="4"
                                                    y="4"
                                                    width="16"
                                                    height="16"
                                                    rx="2"
                                                />
                                                <line
                                                    x1="4"
                                                    y1="10"
                                                    x2="20"
                                                    y2="10"
                                                />
                                                <line
                                                    x1="10"
                                                    y1="4"
                                                    x2="10"
                                                    y2="20"
                                                />
                                            </svg>
                                        </div>
                                        <div class="p-2" :class="showKanban == false ? 'bg-gray-200' : ''">
                                            <svg
                                                @click="showKanban = false"
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="
                                                    cursor-pointer
                                                    icon
                                                    icon-tabler
                                                    icon-tabler-grid
                                                "
                                                :class="showKanban == false ? 'text-indigo-500' : 'text-gray-600'"
                                                width="20"
                                                height="20"
                                                viewBox="0 0 24 24"
                                                stroke-width="1.5"
                                                stroke="currentColor"
                                                fill="none"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            >
                                                <path
                                                    stroke="none"
                                                    d="M0 0h24v24H0z"
                                                />
                                                <rect
                                                    x="4"
                                                    y="4"
                                                    width="6"
                                                    height="6"
                                                    rx="1"
                                                />
                                                <rect
                                                    x="14"
                                                    y="4"
                                                    width="6"
                                                    height="6"
                                                    rx="1"
                                                />
                                                <rect
                                                    x="4"
                                                    y="14"
                                                    width="6"
                                                    height="6"
                                                    rx="1"
                                                />
                                                <rect
                                                    x="14"
                                                    y="14"
                                                    width="6"
                                                    height="6"
                                                    rx="1"
                                                />
                                            </svg>
                                        </div>
                                        <div @click="showKanban = true" class="p-2" :class="showKanban == true ? 'bg-gray-200' : ''">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="
                                                    cursor-pointer
                                                    icon
                                                    icon-tabler
                                                    icon-tabler-layout-columns
                                                "
                                                :class="showKanban == true ? 'text-indigo-500' : 'text-gray-600'"
                                                width="20"
                                                height="20"
                                                viewBox="0 0 24 24"
                                                stroke-width="1.5"
                                                stroke="currentColor"
                                                fill="none"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            >
                                                <path
                                                    stroke="none"
                                                    d="M0 0h24v24H0z"
                                                />
                                                <rect
                                                    x="4"
                                                    y="4"
                                                    width="16"
                                                    height="16"
                                                    rx="2"
                                                />
                                                <line
                                                    x1="12"
                                                    y1="4"
                                                    x2="12"
                                                    y2="20"
                                                />
                                            </svg>
                                        </div>
                                    </div>
                                    <div
                                        class="
                                            flex flex-col
                                            w-full
                                            sm:w-1/2
                                            md:ml-4
                                            mt-3
                                            md:mt-0
                                        "
                                    >
                                        <div class="relative w-full">
                                            <div
                                                class="
                                                    absolute
                                                    cursor-pointer
                                                    text-gray-600
                                                    flex
                                                    items-center
                                                    pr-3
                                                    right-0
                                                    border-l
                                                    h-full
                                                "
                                            >
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="
                                                        ml-2
                                                        mr-1
                                                        icon
                                                        icon-tabler
                                                        icon-tabler-filter
                                                    "
                                                    width="20"
                                                    height="20"
                                                    viewBox="0 0 24 24"
                                                    stroke-width="1.5"
                                                    stroke="currentColor"
                                                    fill="none"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                >
                                                    <path
                                                        stroke="none"
                                                        d="M0 0h24v24H0z"
                                                    ></path>
                                                    <path
                                                        d="M5.5 5h13a1 1 0 0 1 0.5 1.5L14 12L14 19L10 16L10 12L5 6.5a1 1 0 0 1 0.5 -1.5"
                                                    ></path>
                                                </svg>
                                                <span
                                                    class="
                                                        text-sm
                                                        leading-tight
                                                        tracking-normal
                                                    "
                                                    >Filter</span
                                                >
                                            </div>
                                            <div
                                                class="
                                                    absolute
                                                    text-gray-600
                                                    flex
                                                    items-center
                                                    pl-3
                                                    h-full
                                                "
                                            >
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="
                                                        icon
                                                        icon-tabler
                                                        icon-tabler-search
                                                    "
                                                    width="16"
                                                    height="16"
                                                    viewBox="0 0 24 24"
                                                    stroke-width="1.5"
                                                    stroke="currentColor"
                                                    fill="none"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                >
                                                    <path
                                                        stroke="none"
                                                        d="M0 0h24v24H0z"
                                                    ></path>
                                                    <circle
                                                        cx="10"
                                                        cy="10"
                                                        r="7"
                                                    ></circle>
                                                    <line
                                                        x1="21"
                                                        y1="21"
                                                        x2="15"
                                                        y2="15"
                                                    ></line>
                                                </svg>
                                            </div>
                                            <label
                                                for="search"
                                                class="
                                                    hidden
                                                    text-gray-800 text-sm
                                                    font-bold
                                                    leading-tight
                                                    tracking-normal
                                                    mb-2
                                                "
                                            ></label>
                                            <input
                                                id="search"
                                                class="
                                                    w-full
                                                    text-gray-600
                                                    focus:outline-none
                                                    focus:border
                                                    focus:border-indigo-700
                                                    font-normal
                                                    pl-8
                                                    pr-24
                                                    h-10
                                                    flex
                                                    items-center
                                                    pl-4
                                                    text-sm
                                                    border-gray-300
                                                    rounded
                                                    border
                                                "
                                                placeholder="Search by project name or owner"
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="
                                    w-full
                                    overflow-x-scroll
                                    xl:overflow-x-hidden
                                "
                            >
                                <table
                                     v-if="showKanban == false"
                                    class="
                                        items-center
                                        w-full
                                        bg-transparent
                                        border-collapse
                                    "
                                >
                                    <thead>
                                        <tr>
                                            <th
                                                class="
                                                    px-6
                                                    bg-gray-50
                                                    text-gray-500
                                                    align-middle
                                                    border
                                                    border-solid
                                                    border-gray-100
                                                    py-3
                                                    text-xs
                                                    uppercase
                                                    border-l-0 border-r-0
                                                    whitespace-nowrap
                                                    font-semibold
                                                    text-left
                                                "
                                            ></th>
                                            <th
                                                class="
                                                    px-6
                                                    bg-gray-50
                                                    text-gray-500
                                                    align-middle
                                                    border
                                                    border-solid
                                                    border-gray-100
                                                    py-3
                                                    text-xs
                                                    uppercase
                                                    border-l-0 border-r-0
                                                    whitespace-nowrap
                                                    font-semibold
                                                    text-left
                                                "
                                            >
                                                Title
                                            </th>
                                            <th
                                                class="
                                                    px-6
                                                    bg-gray-50
                                                    text-gray-500
                                                    align-middle
                                                    border
                                                    border-solid
                                                    border-gray-100
                                                    py-3
                                                    text-xs
                                                    uppercase
                                                    border-l-0 border-r-0
                                                    whitespace-nowrap
                                                    font-semibold
                                                    text-left
                                                "
                                            >
                                                Milestone
                                            </th>
                                            <th
                                                class="
                                                    px-6
                                                    bg-gray-50
                                                    text-gray-500
                                                    align-middle
                                                    border
                                                    border-solid
                                                    border-gray-100
                                                    py-3
                                                    text-xs
                                                    uppercase
                                                    border-l-0 border-r-0
                                                    whitespace-nowrap
                                                    font-semibold
                                                    text-left
                                                "
                                            >
                                                Status
                                            </th>
                                            <th
                                                class="
                                                    px-6
                                                    bg-gray-50
                                                    text-gray-500
                                                    align-middle
                                                    border
                                                    border-solid
                                                    border-gray-100
                                                    py-3
                                                    text-xs
                                                    uppercase
                                                    border-l-0 border-r-0
                                                    whitespace-nowrap
                                                    font-semibold
                                                    text-left
                                                "
                                            >
                                                Priority
                                            </th>
                                            <th
                                                class="
                                                    px-6
                                                    bg-gray-50
                                                    text-gray-500
                                                    align-middle
                                                    border
                                                    border-solid
                                                    border-gray-100
                                                    py-3
                                                    text-xs
                                                    uppercase
                                                    border-l-0 border-r-0
                                                    whitespace-nowrap
                                                    font-semibold
                                                    text-left
                                                "
                                            >
                                                Assigned
                                            </th>
                                            <th
                                                class="
                                                    px-6
                                                    bg-gray-50
                                                    text-gray-500
                                                    align-middle
                                                    border
                                                    border-solid
                                                    border-gray-100
                                                    py-3
                                                    text-xs
                                                    uppercase
                                                    border-l-0 border-r-0
                                                    whitespace-nowrap
                                                    font-semibold
                                                    text-left
                                                "
                                            >
                                                Created on
                                            </th>
                                            <th
                                                class="
                                                    px-6
                                                    bg-gray-50
                                                    text-gray-500
                                                    align-middle
                                                    border
                                                    border-solid
                                                    border-gray-100
                                                    py-3
                                                    text-xs
                                                    uppercase
                                                    border-l-0 border-r-0
                                                    whitespace-nowrap
                                                    font-semibold
                                                    text-left
                                                "
                                            >
                                                Due on
                                            </th>
                                            <th
                                                class="
                                                    px-6
                                                    bg-gray-50
                                                    text-gray-500
                                                    align-middle
                                                    border
                                                    border-solid
                                                    border-gray-100
                                                    py-3
                                                    text-xs
                                                    uppercase
                                                    border-l-0 border-r-0
                                                    whitespace-nowrap
                                                    font-semibold
                                                    text-left
                                                "
                                            >
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr
                                            v-for="(
                                                task, key
                                            ) in project_tasks.data"
                                            :key="key"
                                            class="
                                                cursor-pointer
                                                hover:bg-gray-100
                                                border-l-4
                                            "
                                            :class="taskStatus(task)"
                                        >
                                            <td
                                                class="
                                                    border-t-0
                                                    px-6
                                                    align-middle
                                                    border-l-0 border-r-0
                                                    text-xs
                                                    whitespace-nowrap
                                                    p-4
                                                "
                                            >
                                                <div class="flex items-center">
                                                    <label
                                                        class="
                                                            flex
                                                            items-center
                                                        "
                                                    >
                                                        <div>
                                                            <jet-checkbox
                                                                name="task_completed"
                                                                :checked="
                                                                    task.completed ==
                                                                    1
                                                                        ? true
                                                                        : false
                                                                "
                                                                @click="
                                                                    check(task)
                                                                "
                                                            />
                                                        </div>
                                                    </label>
                                                </div>
                                            </td>
                                            <td
                                                class="
                                                    border-t-0
                                                    px-6
                                                    align-middle
                                                    border-l-0 border-r-0
                                                    text-sm
                                                    whitespace-nowrap
                                                    p-4
                                                "
                                            >
                                                <div class="flex items-center">
                                                    <div>
                                                        <p
                                                            :class="
                                                                task.completed ==
                                                                1
                                                                    ? 'line-through'
                                                                    : ''
                                                            "
                                                        >
                                                            {{ task.title }}
                                                        </p>
                                                    </div>
                                                    <div
                                                        v-if="
                                                            task.archived == 1
                                                        "
                                                        class="ml-2"
                                                        title="Task is archived!"
                                                    >
                                                        <svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            class="
                                                                h-4
                                                                w-4
                                                                text-yellow-600
                                                            "
                                                            fill="none"
                                                            viewBox="0 0 24 24"
                                                            stroke="currentColor"
                                                        >
                                                            <path
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"
                                                            />
                                                        </svg>
                                                    </div>
                                                </div>
                                            </td>
                                            <td
                                                class="
                                                    border-t-0
                                                    px-6
                                                    align-middle
                                                    border-l-0 border-r-0
                                                    text-sm
                                                    whitespace-nowrap
                                                    p-4
                                                "
                                                :class="
                                                    task.completed == 1
                                                        ? 'line-through'
                                                        : ''
                                                "
                                            >
                                                <p v-if="task.milestone">
                                                    {{ task.milestone.name }}
                                                </p>
                                                <p v-else>N/A</p>
                                            </td>
                                            <td
                                                class="
                                                    border-t-0
                                                    px-6
                                                    align-middle
                                                    border-l-0 border-r-0
                                                    text-sm
                                                    whitespace-nowrap
                                                    p-4
                                                "
                                                :class="
                                                    task.completed == 1
                                                        ? 'line-through'
                                                        : ''
                                                "
                                            >
                                                <template
                                                    v-if="task.archived == 1"
                                                >
                                                    <div
                                                        class="
                                                            w-20
                                                            h-6
                                                            flex
                                                            items-center
                                                            justify-center
                                                            bg-yellow-50
                                                            rounded-full
                                                            text-xs
                                                            leading-3
                                                            text-yellow-500
                                                        "
                                                    >
                                                        Archived
                                                    </div>
                                                </template>
                                                <template v-else>
                                                    <template
                                                        v-if="
                                                            task.completed == 1
                                                        "
                                                    >
                                                        <div
                                                            class="
                                                                w-20
                                                                h-6
                                                                flex
                                                                items-center
                                                                justify-center
                                                                bg-green-50
                                                                rounded-full
                                                                text-xs
                                                                leading-3
                                                                text-green-500
                                                            "
                                                        >
                                                            Completed
                                                        </div>
                                                    </template>

                                                    <template v-else>
                                                        <div
                                                            class="
                                                                w-20
                                                                h-6
                                                                flex
                                                                items-center
                                                                justify-center
                                                                bg-blue-50
                                                                rounded-full
                                                                text-xs
                                                                leading-3
                                                                text-blue-500
                                                            "
                                                        >
                                                            <p
                                                                v-if="
                                                                    task.status
                                                                "
                                                            >
                                                                {{
                                                                    task.status
                                                                        .name
                                                                }}
                                                            </p>
                                                            <p v-else>N/A</p>
                                                        </div>
                                                    </template>
                                                </template>
                                            </td>
                                            <td
                                                class="
                                                    border-t-0
                                                    px-6
                                                    align-middle
                                                    border-l-0 border-r-0
                                                    text-sm
                                                    whitespace-nowrap
                                                    p-4
                                                "
                                                :class="
                                                    task.completed == 1
                                                        ? 'line-through'
                                                        : ''
                                                "
                                            >
                                                <div
                                                    v-if="
                                                        task.priority ==
                                                        'Normal'
                                                    "
                                                    data-v-68be103e=""
                                                    class="
                                                        w-20
                                                        h-6
                                                        flex
                                                        items-center
                                                        justify-center
                                                        bg-green-50
                                                        rounded-full
                                                    "
                                                >
                                                    <p
                                                        data-v-68be103e=""
                                                        class="
                                                            text-xs
                                                            leading-3
                                                            text-green-500
                                                        "
                                                    >
                                                        {{ task.priority }}
                                                    </p>
                                                </div>
                                                <div
                                                    v-if="
                                                        task.priority == 'High'
                                                    "
                                                    data-v-68be103e=""
                                                    class="
                                                        w-20
                                                        h-6
                                                        flex
                                                        items-center
                                                        justify-center
                                                        bg-red-50
                                                        rounded-full
                                                    "
                                                >
                                                    <p
                                                        data-v-68be103e=""
                                                        class="
                                                            text-xs
                                                            leading-3
                                                            text-red-500
                                                        "
                                                    >
                                                        {{ task.priority }}
                                                    </p>
                                                </div>
                                                <div
                                                    v-if="
                                                        task.priority ==
                                                        'Urgent'
                                                    "
                                                    data-v-68be103e=""
                                                    class="
                                                        w-20
                                                        h-6
                                                        flex
                                                        items-center
                                                        justify-center
                                                        bg-yellow-50
                                                        rounded-full
                                                    "
                                                >
                                                    <p
                                                        data-v-68be103e=""
                                                        class="
                                                            text-xs
                                                            leading-3
                                                            text-yellow-500
                                                        "
                                                    >
                                                        {{ task.priority }}
                                                    </p>
                                                </div>
                                                <div
                                                    v-if="
                                                        task.priority == 'Low'
                                                    "
                                                    data-v-68be103e=""
                                                    class="
                                                        w-20
                                                        h-6
                                                        flex
                                                        items-center
                                                        justify-center
                                                        bg-blue-50
                                                        rounded-full
                                                    "
                                                >
                                                    <p
                                                        data-v-68be103e=""
                                                        class="
                                                            text-xs
                                                            leading-3
                                                            text-blue-500
                                                        "
                                                    >
                                                        {{ task.priority }}
                                                    </p>
                                                </div>
                                            </td>
                                            <td
                                                class="
                                                    border-t-0
                                                    px-6
                                                    align-middle
                                                    border-l-0 border-r-0
                                                    text-sm
                                                    whitespace-nowrap
                                                    p-4
                                                "
                                            >
                                                <div
                                                    v-if="
                                                        task.assignees.length !=
                                                        0
                                                    "
                                                    class="
                                                        flex-space-x-1
                                                        overflow-hidden
                                                        mt-2
                                                    "
                                                >
                                                    <img
                                                        v-for="(
                                                            assigned, key
                                                        ) in task.assignees"
                                                        :key="key"
                                                        class="
                                                            inline-block
                                                            h-6
                                                            w-6
                                                            rounded-full
                                                            ring-2 ring-white
                                                            object-cover
                                                        "
                                                        :src="
                                                            assigned.user
                                                                .profile_photo_url
                                                        "
                                                        :alt="
                                                            assigned.user.name
                                                        "
                                                        :title="
                                                            assigned.user.name
                                                        "
                                                    />
                                                </div>
                                                <div v-else>
                                                    No assignees yet!
                                                </div>
                                            </td>
                                            <td
                                                class="
                                                    border-t-0
                                                    px-6
                                                    align-middle
                                                    border-l-0 border-r-0
                                                    text-sm
                                                    whitespace-nowrap
                                                    p-4
                                                "
                                            >
                                                <p>{{ task.created_on }}</p>
                                            </td>
                                            <td
                                                class="
                                                    border-t-0
                                                    px-6
                                                    align-middle
                                                    border-l-0 border-r-0
                                                    text-sm
                                                    whitespace-nowrap
                                                    p-4
                                                "
                                            >
                                                <p v-if="task.due_date">
                                                    {{ task.due_date }}
                                                </p>
                                                <p v-else>No due date!</p>
                                            </td>
                                            <td
                                                class="
                                                    border-t-0
                                                    px-6
                                                    align-middle
                                                    border-l-0 border-r-0
                                                    text-sm
                                                    whitespace-nowrap
                                                    p-4
                                                "
                                            >
                                                <div class="flex items-center">
                                                    <inertia-link
                                                        :href="
                                                            route(
                                                                'projects.view.tasks',
                                                                {
                                                                    project:
                                                                        project.unique_id,
                                                                    task: task.unique_id,
                                                                }
                                                            )
                                                        "
                                                        class="
                                                            cursor-pointer
                                                            text-sm
                                                            text-gray-500
                                                        "
                                                    >
                                                        <svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            class="h-6 w-6"
                                                            fill="none"
                                                            viewBox="0 0 24 24"
                                                            stroke="currentColor"
                                                        >
                                                            <path
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                                                            />
                                                            <path
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                                                            />
                                                        </svg>
                                                    </inertia-link>
                                                    <button
                                                        @click="
                                                            confirmTaskDeletion(
                                                                task
                                                            )
                                                        "
                                                        class="
                                                            cursor-pointer
                                                            ml-6
                                                            text-sm text-red-500
                                                            focus:outline-none
                                                        "
                                                    >
                                                        <svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            width="24"
                                                            height="24"
                                                            viewBox="0 0 24 24"
                                                            fill="none"
                                                        >
                                                            <path
                                                                d="M4 7H20"
                                                                stroke="#718096"
                                                                stroke-width="1.5"
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                            ></path>
                                                            <path
                                                                d="M10 11V17"
                                                                stroke="#718096"
                                                                stroke-width="1.5"
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                            ></path>
                                                            <path
                                                                d="M14 11V17"
                                                                stroke="#718096"
                                                                stroke-width="1.5"
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                            ></path>
                                                            <path
                                                                d="M5 7L6 19C6 20.1046 6.89543 21 8 21H16C17.1046 21 18 20.1046 18 19L19 7"
                                                                stroke="#718096"
                                                                stroke-width="1.5"
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                            ></path>
                                                            <path
                                                                d="M9 7V4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V7"
                                                                stroke="#718096"
                                                                stroke-width="1.5"
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                            ></path>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <tasks-kanban v-else :tasks="project_tasks" :task_statuses="project_task_statuses" />
                                <div
                                    v-if="project_tasks.data.length == 0"
                                    class="py-4"
                                >
                                    <p
                                        class="
                                            text-leading
                                            text-sm
                                            text-gray-400
                                            text-center
                                        "
                                    >
                                        There's no tasks added yet!
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modals -->
        <jet-confirmation-modal
            :show="taskBeingDeleted"
            @close="taskBeingDeleted = null"
        >
            <template #title> Delete Task </template>

            <template #content>
                Are you sure you want to delete this task? This action is
                irreversible.
            </template>

            <template #footer>
                <jet-secondary-button @click="taskBeingDeleted = null">
                    Cancel
                </jet-secondary-button>

                <jet-danger-button
                    class="ml-2 bg-red-500"
                    @click="deleteTask"
                    :class="{ 'opacity-25': deleteTaskForm.processing }"
                    :disabled="deleteTaskForm.processing"
                >
                    Delete
                </jet-danger-button>
            </template>
        </jet-confirmation-modal>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import ProjectDetails from "./ProjectDetails";
import Alerts from "@/Jetstream/Alerts";
import JetConfirmationModal from "@/Jetstream/ConfirmationModal";
import JetDangerButton from "@/Jetstream/DangerButton";
import JetSecondaryButton from "@/Jetstream/SecondaryButton";
import JetCheckbox from "@/Jetstream/Checkbox";
import moment from "moment";
import TasksKanban from './TasksKanban'

export default {
    props: ["project", "project_task_statuses", "project_tasks"],

    components: {
        AppLayout,
        ProjectDetails,
        Alerts,
        JetConfirmationModal,
        JetDangerButton,
        JetSecondaryButton,
        JetCheckbox,
        TasksKanban
    },

    data() {
        return {
            taskBeingDeleted: null,
            deleteTaskForm: this.$inertia.form(),
            showKanban: false,
        };
    },

    methods: {
        confirmTaskDeletion(task) {
            this.taskBeingDeleted = task;
        },

        deleteTask() {
            this.deleteTaskForm.delete(
                route("projects.delete.task", this.taskBeingDeleted.unique_id),
                {
                    errorBag: "deleteTaskForm",
                    onSuccess: () => (this.taskBeingDeleted = null),
                }
            );
        },

        check(task) {
            this.$inertia.post(
                route("projects.update.task.completed", task.unique_id),
                {
                    _method: "PUT",
                },
                {
                    preserveScroll: true,
                }
            );
        },

        taskStatus(task) {
            var today = moment();
            var due_date = moment(task.due_date);

            var days_diff = due_date.diff(today, 'days');

            if (task.completed == 1) {
                return "border-l-4 border-green-500";
            } else if (task.archived == 1) {
                return "border-l-4 border-yellow-500";
            }

            if (days_diff < 0 || days_diff < 2) {
                return "border-l-4 border-red-500";
            }
        },
    },
};
</script>
