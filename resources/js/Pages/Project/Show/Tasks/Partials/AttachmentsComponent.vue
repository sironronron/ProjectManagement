<template>
    <div
        class="my-3"
        @mouseover="showDeleteBtn = true"
        @mouseleave="showDeleteBtn = false"
    >
        <div class="flex items-center justify-between">
            <!-- Image & Name -->
            <div class="flex items-center">
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
                        class="h-8 w-8 text-green-400"
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
                        class="h-8 w-8 text-blue-400"
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
                    v-else-if="file.file_type == 'sql'"
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
                <h4 class="text-base text-light-dark ml-4">
                    {{ file.file_name }}
                    <span class="block text-xs text-gray-400 flex items-center">
                        <span> Uploaded By: {{ file.user.name }} | </span>
                        <a
                            :href="
                                route(
                                    'projects.store.attachments.download',
                                    file.unique_id
                                )
                            "
                            target="_blank"
                            class="text-blue-500 flex items-center ml-2"
                        >
                            Download
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4 ml-2"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"
                                />
                            </svg>
                        </a>
                    </span>
                </h4>
            </div>
            <div>
                <div class="float-right">
                    <span
                        v-if="showDeleteBtn == true"
                        @click="deleteAttachment(file)"
                        class="cursor-pointer"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6 text-red-500"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                            />
                        </svg>
                    </span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["file"],

    data() {
        return {
            showDeleteBtn: false,
        };
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
