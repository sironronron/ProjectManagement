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
                    d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"
                />
            </svg>

            <span> Comments </span>
        </p>

        <div class="hidden sm:block">
            <div class="py-4">
                <div class="border-t border-gray-200"></div>
            </div>
        </div>

        <div>
            <jet-input
                v-if="addingNewComment == false"
                id="text"
                type="text"
                class="mt-1 block w-full"
                placeholder="Post a comment..."
                @click="addingNewComment = true"
            />

            <div v-else class="my-3">
                <jet-mini-form-section @submitted="postComment">
                    <template #form>
                        <div>
                            <tiptap
                                v-model="form.text"
                                :focus="true"
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
                            Post Comment
                        </jet-button>
                    </template>
                </jet-mini-form-section>

                <div
                    v-if="addingNewComment == true"
                    class="text-xs underline text-gray-400 cursor-pointer mt-3"
                    @click="addingNewComment = false"
                >
                    Cancel
                </div>
            </div>

            <div>
                <comment-lists v-for="(comment, key) in comments" :key="key" :comment="comment" />
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
import CommentLists from './CommentListsComponent';

export default {
    props: ["project", "task", "comments"],

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
        CommentLists
    },

    data() {
        return {
            addingNewComment: false,
            form: this.$inertia.form({
                text: "",
                project_id: this.project.unique_id,
                task_id: this.task.unique_id,
            }),
        };
    },

    methods: {
        postComment() {
            this.form.post(route("projects.store.comments.store"), {
                errorBag: "postComment",
                preserveScroll: true,
                onSuccess: () => { this.form.reset(), this.addingNewComment = false }
            });
        },
    },
};
</script>
