<template>
    <div
        class="
            relative
            flex flex-col
            min-w-0
            break-words
            bg-white
            w-full
            mb-6
            shadow-lg
            rounded
            h-auto
            mb-5
        "
    >
        <div class="rounded-t mb-0 px-4 py-3 border-0">
            <div
                class="
                    flex flex-col
                    lg:flex-row
                    justify-between
                    items-start
                    lg:items-stretch
                    w-full
                "
            >
                <div
                    class="
                        w-full
                        lg:w-1/3
                        flex flex-col
                        lg:flex-row
                        items-start
                        lg:items-center
                    "
                >
                    <div class="flex items-center">
                        <button
                            @click="Popup(true)"
                            class="
                                text-gray-600
                                dark:text-gray-400
                                mr-2
                                p-2
                                border-transparent border
                                bg-gray-100
                                dark:hover:bg-gray-600 dark:bg-gray-700
                                hover:bg-gray-200
                                cursor-pointer
                                rounded
                                focus:outline-none
                                focus:border-gray-800
                                focus:shadow-outline-gray
                            "
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="
                                    icon
                                    cursor-pointer
                                    icon-tabler icon-tabler-settings
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
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <path
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"
                                />
                                <circle cx="12" cy="12" r="3" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div
                    class="
                        w-full
                        lg:w-2/3
                        flex flex-col
                        lg:flex-row
                        items-start
                        lg:items-center
                        justify-end
                    "
                >
                    <div class="lg:ml-6 flex items-center">
                        <button
                            class="
                                bg-gray-200
                                transition
                                duration-150
                                ease-in-out
                                focus:outline-none
                                border border-transparent
                                focus:border-gray-800 focus:shadow-outline-gray
                                hover:bg-gray-300
                                rounded
                                text-black
                                px-5
                                h-8
                                flex
                                items-center
                                text-sm
                            "
                        >
                            Download All
                        </button>
                        <inertia-link
                            :href="route('projects.create')"
                            class="
                                text-white
                                ml-4
                                cursor-pointer
                                focus:outline-none
                                border border-transparent
                                focus:border-gray-800 focus:shadow-outline-gray
                                bg-black
                                transition
                                duration-150
                                ease-in-out
                                hover:bg-indigo-600
                                w-8
                                h-8
                                rounded
                                flex
                                items-center
                                justify-center
                            "
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-plus"
                                width="28"
                                height="28"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                fill="none"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
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
                        <th
                            class="
                                px-6
                                bg-gray-50
                                text-gray-500
                                align-middle
                                border border-solid border-gray-100
                                py-3
                                text-xs
                                uppercase
                                border-l-0 border-r-0
                                whitespace-nowrap
                                font-semibold
                                text-left
                            "
                        >
                            Project Name
                        </th>
                        <th
                            class="
                                px-6
                                bg-gray-50
                                text-gray-500
                                align-middle
                                border border-solid border-gray-100
                                py-3
                                text-xs
                                uppercase
                                border-l-0 border-r-0
                                whitespace-nowrap
                                font-semibold
                                text-left
                            "
                        >
                            Progress
                        </th>
                        <th
                            class="
                                px-6
                                bg-gray-50
                                text-gray-500
                                align-middle
                                border border-solid border-gray-100
                                py-3
                                text-xs
                                uppercase
                                border-l-0 border-r-0
                                whitespace-nowrap
                                font-semibold
                                text-left
                            "
                        >
                            Tasks
                        </th>
                        <th
                            class="
                                px-6
                                bg-gray-50
                                text-gray-500
                                align-middle
                                border border-solid border-gray-100
                                py-3
                                text-xs
                                uppercase
                                border-l-0 border-r-0
                                whitespace-nowrap
                                font-semibold
                                text-left
                            "
                        >
                            Budget
                        </th>
                        <th
                            class="
                                px-6
                                bg-gray-50
                                text-gray-500
                                align-middle
                                border border-solid border-gray-100
                                py-3
                                text-xs
                                uppercase
                                border-l-0 border-r-0
                                whitespace-nowrap
                                font-semibold
                                text-left
                            "
                        >
                            Deadline
                        </th>
                        <th
                            class="
                                px-6
                                bg-gray-50
                                text-gray-500
                                align-middle
                                border border-solid border-gray-100
                                py-3
                                text-xs
                                uppercase
                                border-l-0 border-r-0
                                whitespace-nowrap
                                font-semibold
                                text-left
                            "
                        >
                            Members
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="(project, key) in projects.data"
                        :key="key"
                        class="cursor-pointer hover:bg-gray-100"
                    >
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
                            <inertia-link
                                :href="
                                    route('projects.show', project.unique_id)
                                "
                            >
                                <div class="flex items-center">
                                    <div class="w-10 h-10">
                                        <img
                                            class="w-full h-full"
                                            src="https://cdn.tuk.dev/assets/templates/olympus/projects.png"
                                        />
                                    </div>
                                    <div class="pl-4">
                                        <p>{{ project.name }}</p>
                                        <p
                                            class="
                                                text-xs
                                                leading-3
                                                text-gray-600
                                                mt-1
                                            "
                                        >
                                            {{ project.client.company_name }}
                                        </p>
                                    </div>
                                </div>
                            </inertia-link>
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
                            <p
                                class="
                                    text-sm
                                    font-medium
                                    leading-none
                                    text-gray-800
                                "
                            >
                                {{ project.progress }}%
                            </p>
                            <div class="w-24 h-3 bg-gray-100 rounded-full mt-2">
                                <div
                                    class="h-3 bg-green-300 rounded-full"
                                    :style="`width: ${project.progress}%`"
                                ></div>
                            </div>
                        </td>
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
                            <p class="font-medium">{{ project.completed_tasks }} / {{ project.tasks_count }}</p>
                            <p class="text-xs leading-3 text-gray-600 mt-2">
                                {{ project.pending_tasks }} tasks pending
                            </p>
                        </td>
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
                            <p class="font-medium">{{ project.budget }}</p>
                            <p class="text-xs leading-3 text-gray-600 mt-2">
                                {{ project.remaining_budget }} left
                            </p>
                        </td>
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
                            <p class="font-medium">{{ project.end_date }}</p>
                            <p class="text-xs leading-3 text-gray-600 mt-2">
                                {{ project.remaining_days }} days
                            </p>
                        </td>
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
                            <div
                                v-if="project.members.length != 0"
                                class="flex-space-x-1 overflow-hidden mt-2"
                            >
                                <img
                                    v-for="(member, key) in project.members"
                                    :key="key"
                                    class="
                                        inline-block
                                        h-6
                                        w-6
                                        rounded-full
                                        ring-2 ring-white
                                        object-cover
                                    "
                                    :src="member.profile_photo_url"
                                    :alt="member.name"
                                    :title="member.name"
                                />
                            </div>
                            <p v-else class="text-xs leading-3 text-gray-600">
                                No Teams Associated Yet
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div v-if="projects.data.length == 0" class="py-4">
                <p class="text-leading text-sm text-gray-400 text-center">
                    There's no projects yet!
                </p>
            </div>
        </div>
    </div>
</template>

<script>
import JetDropdown from "@/Jetstream/Dropdown";
import JetDropdownLink from "@/Jetstream/DropdownLink";
import FilterPopup from "@/Jetstream/FilterPopup";
import Popup from "@/Mixins/Index";

export default {
    mixins: [Popup],

    props: ["projects"],

    components: {
        JetDropdown,
        JetDropdownLink,
        FilterPopup,
    },
};
</script>

<style scoped>
.bg-overlays {
    opacity: 98%;
    background-color: #3f3f46;
}

.bg-header-dashboard {
    background: linear-gradient(87.8deg, #4338ca 6.19%, #8b5cf6 99.43%);
}
.bg-lime-500 {
    background: #84cc16;
}
.bg-orange {
    background: #fdba74;
}
.bg-teal-400 {
    background: #ccfbf1;
}
.bg-amber {
    background: #fef3c7;
}
.bg-green {
    background: #22c55e;
}
.bg-green-progress {
    background: #4ade80;
}
.bg-cyan {
    background: #06b6d4;
}
.text-amber {
    color: #b45309;
}
.text-green {
    color: #22c55e;
}
.checkbox:checked + .check-icon {
    display: flex;
}
.bg-green-light {
    background: #dcfce7;
}
.text-light-blue {
    color: #818cf8;
}
.checkbox:checked + .check-icon {
    display: flex;
}
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

/* Firefox */
input[type="number"] {
    -moz-appearance: textfield;
}
/* margin between thead and tbody */

.target-body:before {
    line-height: 8px;
    content: "_";
    color: white;
    display: block;
}
.target-body2:before {
    line-height: 3px;
    content: "_";
    color: white;
    display: block;
}

/* scrollbar */
/* width */
::-webkit-scrollbar {
    width: 3px;
    height: 3px;
}

/* Track */
::-webkit-scrollbar-track {
    background: #f1f1f1;
}

/* Handle */
::-webkit-scrollbar-thumb {
    background: #888;
    border-radius: 10px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
    background: #555;
}
</style>
