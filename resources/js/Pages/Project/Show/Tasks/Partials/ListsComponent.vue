<template>
    <div>
        <div
            v-if="updatingItem == false"
            class="mt-2 flex items-center justify-between"
            @mouseover="showDeleteBtn = true"
            @mouseleave="showDeleteBtn = false"
        >
            <div>
                <div class="flex items-center">
                    <label class="flex items-center">
                        <div>
                            <jet-checkbox
                                name="notification_new_project"
                                :checked="item.status == 1 ? true : false"
                                @click="check(item)"
                            />
                        </div>
                    </label>
                    <span
                        v-if="!updatingItem"
                        class="ml-4 text-sm text-gray-600"
                        :class="{ 'line-through': item.status == 1 }"
                        @click="updatingItem = true"
                        >{{ item.name }}</span
                    >
                </div>
            </div>
            <div>
                <span
                    v-if="showDeleteBtn == true"
                    @click="deleteItem(item)"
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

        <div v-else class="my-3">
            <jet-mini-form-section @submitted="updateItem(item)">
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
                        Update item
                    </jet-button>
                </template>
            </jet-mini-form-section>
            <div
                v-if="updatingItem == true"
                class="text-xs underline text-gray-400 cursor-pointer mt-3"
                @click="updatingItem = false"
            >
                Cancel Editing
            </div>
        </div>
    </div>
</template>

<script>
import JetCheckbox from "@/Jetstream/Checkbox";
import JetMiniFormSection from "@/Jetstream/MiniFormSection";
import JetLabel from "@/Jetstream/Label";
import JetInput from "@/Jetstream/Input";
import JetInputError from "@/Jetstream/InputError";
import JetActionMessage from "@/Jetstream/ActionMessage";
import JetSecondaryButton from "@/Jetstream/SecondaryButton";
import JetButton from "@/Jetstream/Button";

export default {
    props: ["item"],

    components: {
        JetCheckbox,
        JetMiniFormSection,
        JetInput,
        JetInputError,
        JetActionMessage,
        JetSecondaryButton,
        JetButton,
        JetLabel,
    },

    data() {
        return {
            showDeleteBtn: false,
            updatingItem: false,
            form: this.$inertia.form({
                name: this.item.name,
            }),
        };
    },

    methods: {
        check(item) {
            this.$inertia.put(
                route("projects.store.checklist.item_check", item.unique_id),
                {
                    _method: 'PUT',
                    preserveScroll: false,
                }
            );
        },

        updateItem(item) {
            this.form.put(route("projects.store.checklist.item_update", item), {
                _method: "PUT",
                errorBag: "updateItem",
                preserveScroll: true,
                onSuccess: () => this.updatingItem = false
            });
        },

        deleteItem(item) {
            this.$inertia.delete(
                route("projects.store.checklist.item_delete", item.unique_id),
                {
                    preserveScroll: true,
                }
            );
        },
    },
};
</script>
