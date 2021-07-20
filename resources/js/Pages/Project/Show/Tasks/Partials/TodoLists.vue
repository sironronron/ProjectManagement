<template>
    <div>
        <div class="flex items-center justify-between">
            <div>
                <p
                    class="
                        flex flex-nowrap
                        text-base text-gray-600
                        items-center
                    "
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-4 w-4 mr-2"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"
                        />
                    </svg>

                    <span> Checklist </span>
                </p>
            </div>
            <div class="float-right">
                {{ finished_items }}/{{ checklist_items.length }}
            </div>
        </div>

        <div class="relative mt-3">
            <div
                class="
                    overflow-hidden
                    h-2
                    mb-4
                    text-xs
                    flex
                    rounded
                    bg-gray-200
                "
            >
                <div
                    :style="{ width: checklist_percentage + '%' }"
                    class="
                        shadow-none
                        flex flex-col
                        text-center
                        whitespace-nowrap
                        text-white
                        justify-center
                        bg-indigo-500
                    "
                ></div>
            </div>
        </div>

        <!-- Checklists -->
        <div class="mt-3">
            <!-- checklist items -->
            <lists v-for="(item, key) in checklist_items" :key="key" :item="item"></lists>

            <!-- Add new item into checklist -->
            <div
                v-if="new_checklist == false"
                class="text-xs underline text-gray-400 cursor-pointer mt-3"
                @click="new_checklist = true"
            >
                Create new item
            </div>

            <div v-else class="mt-3">
                <jet-mini-form-section @submitted="createNewChecklist">
                    <template #form>
                        <div>
                            <jet-label for="name" value="Name" />
                            <jet-input
                                id="name"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.name"
                            />
                            <jet-input-error
                                :message="form.errors.name"
                                class="mt-2"
                            />
                        </div>
                    </template>

                    <template #actions>
                        <jet-action-message
                            :on="form.recentlySuccessful"
                            class="mr-3"
                        >
                            Saved.
                        </jet-action-message>

                        <jet-button
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Save new item
                        </jet-button>
                    </template>
                </jet-mini-form-section>

                <div
                    class="text-xs underline text-gray-400 cursor-pointer mt-3"
                    @click="new_checklist = false"
                >
                    Cancel
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import JetButton from "@/Jetstream/Button";
import JetMiniFormSection from "@/Jetstream/MiniFormSection";
import JetInput from "@/Jetstream/Input";
import JetInputError from "@/Jetstream/InputError";
import JetLabel from "@/Jetstream/Label";
import JetActionMessage from "@/Jetstream/ActionMessage";
import JetSecondaryButton from "@/Jetstream/SecondaryButton";
import JetCheckbox from "@/Jetstream/Checkbox";
import Tiptap from "@/Jetstream/Tiptap";
import Lists from './ListsComponent';

export default {
    props: [
        "project",
        "task",
        "checklist_items",
        "finished_items",
        "checklist_percentage",
    ],

    components: {
        JetButton,
        JetMiniFormSection,
        JetInput,
        JetInputError,
        JetLabel,
        JetActionMessage,
        JetSecondaryButton,
        JetCheckbox,
        Tiptap,
        Lists
    },

    data() {
        return {
            new_checklist: false,
            form: this.$inertia.form({
                project_id: this.project.unique_id,
                task_id: this.task.unique_id,
                name: "",
            }),
            showDeleteBtn: false
        };
    },

    methods: {
        checklist(condition) {
            this.new_checklist = condition;
        },

        createNewChecklist() {
            this.form.post(route("projects.store.checklist.new_item"), {
                errorBag: "createNewChecklist",
                preserveScroll: true,
                onSuccess: () => [this.form.reset(), this.checklist(false)],
            });
        },
    },
};
</script>
