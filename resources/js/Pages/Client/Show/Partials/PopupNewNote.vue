<template>
    <div id="popup" class="fixed overflow-y-scroll hidden inset-0 z-50">
        <div
            @click="Popup(false)"
            class="absolute inset-0 bg-gray-900 bg-opacity-75 z-0"
        ></div>
        <div class="flex w-full justify-end">
            <div
                class="
                    bg-white
                    w-full
                    md:w-11/12
                    xl:w-2/5
                    pt-12
                    px-12
                    min-h-screen
                    z-50
                "
            >
                <div
                    class="
                        container
                        flex flex-col
                        w-full
                        h-full
                        justify-between
                    "
                >
                    <div>
                        <div class="flex w-full justify-between items-center">
                            <h2 class="text-4xl font-bold text-dark">
                                Add new client note
                            </h2>
                            <div
                                @click="Popup(false)"
                                class="block lg:hidden ml-5"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-x"
                                    width="32"
                                    height="32"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="#718096"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                >
                                    <path
                                        stroke="none"
                                        d="M0 0h24v24H0z"
                                    ></path>
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </div>
                        </div>

                        <div class="mt-5">
                            <form @submit.prevent="createNewClientNote">
                                <div class="mt-10 mb-5">
                                    <jet-label for="title" value="Title" />
                                    <jet-input
                                        id="title"
                                        type="text"
                                        class="mt-1 block w-full"
                                        v-model="form.title"
                                    />
                                    <jet-input-error
                                        :message="form.errors.title"
                                        class="mt-2"
                                    />
                                </div>

                                <div class="mt-10 mb-5">
                                    <jet-label for="title" value="Subtitle" />
                                    <jet-textarea
                                        id="title"
                                        type="text"
                                        class="mt-1 block w-full"
                                        v-model="form.subtitle"
                                    />
                                    <jet-input-error
                                        :message="form.errors.subtitle"
                                        class="mt-2"
                                    />
                                </div>

                                <div class="mb-5">
                                    <jet-label for="body" value="Body" />
                                    <tiptap
                                        v-model="form.body"
                                        data-placeholder="Write something..."
                                    />
                                    <jet-input-error
                                        :message="form.errors.body"
                                        class="mt-2"
                                    />
                                </div>

                                <div class="flex items-center justify-end">
                                    <jet-action-message
                                        :on="form.recentlySuccessful"
                                        class="mr-3"
                                    >
                                        Saved.
                                    </jet-action-message>

                                    <jet-button
                                        :class="{
                                            'opacity-25': form.processing,
                                        }"
                                        :disabled="form.processing"
                                    >
                                        Save New Client Note
                                    </jet-button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Popup from "@/Mixins/Index";
import JetButton from "@/Jetstream/Button";
import JetInput from "@/Jetstream/Input";
import JetInputError from "@/Jetstream/InputError";
import JetTextarea from "@/Jetstream/Textarea";
import JetLabel from "@/Jetstream/Label";
import JetActionMessage from "@/Jetstream/ActionMessage";
import JetSecondaryButton from "@/Jetstream/SecondaryButton";
import JetCheckbox from "@/Jetstream/Checkbox";
import Tiptap from "@/Jetstream/Tiptap";

export default {
    mixins: [Popup],

    props: ["client"],

    components: {
        JetActionMessage,
        JetButton,
        JetInput,
        JetInputError,
        JetTextarea,
        JetLabel,
        JetSecondaryButton,
        JetCheckbox,
        Tiptap,
    },

    data() {
        return {
            form: this.$inertia.form({
                title: "",
                subtitle: "",
                body: "",
                // visibility: '',
                client_id: this.client.unique_id,
            }),
        };
    },

    methods: {
        createNewClientNote() {
            this.form.post(route("client_notes.store"), {
                errorBag: "createNewClientNote",
                preserveScroll: true,
                onSuccess: () => [this.form.reset(), this.Popup(false)],
            });
        },
    },
};
</script>
