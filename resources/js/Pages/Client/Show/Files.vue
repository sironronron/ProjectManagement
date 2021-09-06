<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ client.company_name }}
                <span class="text-gray-200 mx-5">|</span> Files
            </h2>
        </template>

        <div>
            <client-details :client="client" />

            <!-- Links -->
            <div class="mb-5">
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
                        h-100
                    "
                >
                    <div class="rounded-t mb-0 px-4 py-3 border-0">
                        <div class="flex flex-wrap items-center">
                            <div
                                class="
                                    relative
                                    w-full
                                    px-2
                                    max-w-full
                                    flex-grow flex-1
                                "
                            >
                                <h3 class="font-normal text-base text-gray-700">
                                    Files
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="block w-full overflow-x-auto">
                        <!-- Projects table -->
                        <table
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
                                        File Name
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
                                            text-right
                                        "
                                    >
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="(file, key) in files"
                                    :key="key"
                                    class="cursor-pointer hover:bg-gray-100"
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
                                        <div class="flex items-center w-full">
                                            <div
                                                v-if="
                                                    file.file_type == 'jpg' ||
                                                    file.file_type == 'jpeg' ||
                                                    file.file_type == 'png' ||
                                                    file.file_type == 'mp4'
                                                "
                                                class="
                                                    h-12
                                                    w-12
                                                    bg-green-200
                                                    rounded
                                                    flex
                                                    items-center
                                                    justify-center
                                                "
                                            >
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="
                                                        h-8
                                                        w-8
                                                        text-green-400
                                                    "
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke="currentColor"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
                                                    />
                                                </svg>
                                            </div>
                                            <div
                                                v-else-if="
                                                    file.file_type == 'pdf' ||
                                                    file.file_type == 'docx' ||
                                                    file.file_type == 'xlsx' ||
                                                    file.file_type == 'csv'
                                                "
                                                class="
                                                    h-12
                                                    w-12
                                                    bg-blue-200
                                                    rounded
                                                    flex
                                                    items-center
                                                    justify-center
                                                "
                                            >
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="
                                                        h-8
                                                        w-8
                                                        text-blue-400
                                                    "
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke="currentColor"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                                                    />
                                                </svg>
                                            </div>
                                            <div
                                                v-else-if="
                                                    file.file_type == 'sql'
                                                "
                                                class="
                                                    h-12
                                                    w-12
                                                    bg-red-200
                                                    rounded
                                                    flex
                                                    items-center
                                                    justify-center
                                                "
                                            >
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="h-8 w-8 text-red-400"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke="currentColor"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"
                                                    />
                                                </svg>
                                            </div>
                                            <h4
                                                class="
                                                    text-base text-light-dark
                                                    pl-4
                                                "
                                            >
                                                {{ file.file_name }}
                                            </h4>
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
                                        <div
                                            class="
                                                flex
                                                items-center
                                                justify-end
                                            "
                                        >
                                            <div class="mr-3">
                                                <a
                                                    :href="
                                                        route(
                                                            'projects.store.attachments.download',
                                                            file.unique_id
                                                        )
                                                    "
                                                    target="_blank"
                                                    class="
                                                        text-blue-500
                                                        flex
                                                        items-center
                                                        ml-2
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
                                                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"
                                                            stroke="#718096"
                                                        />
                                                    </svg>
                                                </a>
                                            </div>
                                            <div>
                                                <svg
                                                    @click="
                                                        deleteAttachment(file)
                                                    "
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
import AppLayout from "@/Layouts/AppLayout";
import ClientDetails from "./ClientDetails";
import JetDropdown from "@/Jetstream/Dropdown";
import JetDropdownLink from "@/Jetstream/DropdownLink";

export default {
    props: ["client", "files"],

    data() {
        return {
            item: {
                title: "How to design a wireframe in Figma",
                link: "https://www.figma.com/community?tab=files",
            },
        };
    },

    components: {
        AppLayout,
        ClientDetails,
        JetDropdown,
        JetDropdownLink,
    },

    methods: {
        deleteAttachment(file) {
            this.$inertia.delete(
                route("projects.store.attachments.delete", file),
                {
                    preserveScroll: true,
                }
            );
        },
    },
};
</script>

<style scoped>
.checkbox:checked + .check-icon {
    display: flex;
}
body {
    font-family: "Lato", sans-serif;
}
</style>
