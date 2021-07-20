<template>
    <div
        class="flex mt-6 justify-between"
        @mouseover="showDeleteBtn = true"
        @mouseleave="showDeleteBtn = false"
    >
        <div class="flex">
            <div class="flex-shrink-0">
                <div class="flex items-center justify-center">
                    <img
                        :src="comment.user.profile_photo_url"
                        :alt="comment.user.name"
                        class="w-10 h-10 rounded-full object-cover"
                    />
                </div>
            </div>
            <div class="pl-3">
                <div class="flex items-center">
                    <p class="text-base font-medium leading-none text-gray-800">
                        {{ comment.user.name }}
                    </p>
                    <p class="text-xs leading-3 text-gray-500 pl-3">
                        {{ comment.time_diff }}
                    </p>
                </div>
                <div
                    v-if="editingComment == false"
                    @click="editingComment = true"
                    v-html="comment.text"
                    class="text-sm leading-5 text-gray-600 mt-1.5"
                ></div>
                <div class="w-full mt-3" v-else>
                    <jet-mini-form-section @submitted="updateComment(comment)">
                        <template #form>
                            <div>
                                <tiptap
                                    v-model="form.text"
                                    data-placeholder="Write something..."
                                />
                                <jet-input-error
                                    :message="form.errors.text"
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
                                Update Comment
                            </jet-button>
                        </template>
                    </jet-mini-form-section>

                    <div
                        v-if="editingComment == true"
                        class="
                            text-xs
                            underline
                            text-gray-400
                            cursor-pointer
                            mt-3
                        "
                        @click="editingComment = false"
                    >
                        Cancel
                    </div>
                </div>
            </div>
        </div>
        <div v-if="showDeleteBtn == true && editingComment == false" class="pl-3">
            <div class="float-right">
                <span @click="deleteComment(comment)" class="cursor-pointer">
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
</template>

<script>
import SectionBorder from "@/Jetstream/SectionBorder";
import ParseHtmlDisplay from "@/Jetstream/HtmlDisplay";
import JetButton from "@/Jetstream/Button";
import JetMiniFormSection from "@/Jetstream/MiniFormSection";
import JetInput from "@/Jetstream/Input";
import JetInputError from "@/Jetstream/InputError";
import JetLabel from "@/Jetstream/Label";
import JetActionMessage from "@/Jetstream/ActionMessage";
import JetSecondaryButton from "@/Jetstream/SecondaryButton";
import JetCheckbox from "@/Jetstream/Checkbox";
import Tiptap from "@/Jetstream/Tiptap";

export default {
    props: ["comment"],

    components: {
        SectionBorder,
        ParseHtmlDisplay,
        JetButton,
        JetMiniFormSection,
        JetInput,
        JetInputError,
        JetLabel,
        JetActionMessage,
        JetSecondaryButton,
        JetCheckbox,
        Tiptap,
    },

    data() {
        return {
            showDeleteBtn: false,
            editingComment: false,
            form: this.$inertia.form({
                text: this.comment.text,
            }),
        };
    },

    methods: {
        deleteComment(comment) {
            this.$inertia.delete(
                route("projects.store.comments.destroy", comment.unique_id),
                {
                    preserveScroll: true,
                }
            );
        },

        updateComment(comment) {
            this.form.put(route("projects.store.comments.update", comment.unique_id), {
                _method: "PUT",
                errorBag: "updateComment",
                preserveScroll: true,
                onSuccess: () => (this.editingComment = false),
            });
        },
    },
};
</script>
