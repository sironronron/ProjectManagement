<template>
    <div>
        <p class="flex flex-nowrap text-base text-gray-600 items-center">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-4 w-4 mr-3"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"
                />
            </svg>

            <span> File Attachments </span>
        </p>

        <div class="hidden sm:block">
            <div class="py-4">
                <div class="border-t border-gray-200"></div>
            </div>
        </div>

        <!-- List of attachments -->
        <attachments v-for="(file, key) in attachments" :key="key" :file="file" />

        <div
            v-if="addingNewFile == false"
            class="text-xs underline text-gray-400 cursor-pointer mt-3"
            @click="addingNewFile = true"
        >
            Add new file attachment
        </div>

        <div v-else>
            <div
                @dragover.prevent="handleDragOver"
                @drop.prevent="handleDrop"
                @dragleave.prevent="handleDragLeave"
                class="
                    flex flex-col
                    items-center
                    justify-center
                    w-full
                    mb-8
                    border border-dashed border-indigo-500
                    bg-indigo-200
                    rounded-lg
                    py-8
                "
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="
                        cursor-pointer
                        mb-5
                        text-indigo-500
                        icon icon-tabler icon-tabler-cloud-upload
                    "
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
                    class="
                        text-base
                        font-normal
                        tracking-normal
                        text-gray-800 text-center
                    "
                >
                    Drag and drop here
                </p>
            </div>

            <div v-if="status.dropped">
                <div v-for="(file, key) in form.files" :key="key">
                    <div class="flex justify-between items-center w-full my-3">
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
                                class="
                                    text-gray-800
                                    font-normal
                                    text-base
                                    tracking-normal
                                    ml-2
                                    mr-4
                                "
                            >
                                {{ file.name }}
                            </p>
                        </div>
                    </div>
                </div>
                <div v-if="form.progress" class="relative mb-6 mt-4">
                    <hr class="h-1 rounded-sm bg-gray-200" />
                    <hr
                        :style="{ width: form.progress.percentage + '%' }"
                        class="absolute top-0 h-1 rounded-sm bg-indigo-500"
                    />
                </div>
            </div>

            <div
                class="text-xs underline text-gray-400 cursor-pointer"
                @click="addingNewFile = false"
            >
                Cancel uploading
            </div>
        </div>
    </div>
</template>

<script>
import Attachments from './AttachmentsComponent'

export default {
    props: ["project", "task", "attachments"],

    components: {
        Attachments
    },

    data() {
        return {
            addingNewFile: false,
            status: {
                over: false,
                dropped: false,
            },
            form: this.$inertia.form({
                files: [],
                project_id: this.project.unique_id,
                task_id: this.task.unique_id,
            }),
        };
    },

    methods: {
        handleDragOver() {
            this.status.over = true;
        },

        handleDrop(e) {
            this.status.dropped = true;
            this.status.over = false;

            const fileItems = e.dataTransfer.files;

            if (!fileItems) return;

            [...fileItems].forEach((f) => {
                this.form.files.push(f);
            });

            this.uploadAttachment();
        },

        handleDragLeave() {
            this.status.over = false;
        },

        uploadAttachment() {
            this.form.post(route("projects.store.attachments.upload"), {
                errorBag: "uploadAttachment",
                preserveScroll: true,
                onSuccess: () => { this.form.reset(), this.addingNewFile = false },
            });
        },
    },
};
</script>
