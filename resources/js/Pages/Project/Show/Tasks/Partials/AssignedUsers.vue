<template>
    <div>
        <p class="text-sm font-semibold text-gray-600">
            <span>Assigned Users</span>
        </p>

        <div class="relative">
            <div
                v-if="assignees.length != 0"
                class="flex flex-space-x-1 overflow-hidden mt-2 items-center"
            >
                <!-- Assigned Users -->
                <div
                    v-for="(assigned, key) in assignees"
                    :key="key"
                    class="inline-block"
                >
                    <img
                        class="h-8 w-8 rounded-full object-cover"
                        :src="assigned.user.profile_photo_url"
                        :alt="assigned.user.name"
                        :title="assigned.user.name"
                    />
                </div>
                <!-- Button for adding users -->
                <div
                    @click="modifyAssignees = true"
                    class="
                        h-8
                        w-8
                        rounded-full
                        border-dashed border border-indigo-400
                        inline-flex
                        items-center
                        justify-center
                        cursor-pointer
                    "
                >
                    <span>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4 text-indigo-400"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 4v16m8-8H4"
                            />
                        </svg>
                    </span>
                </div>
            </div>
            <div v-else>No assignees yet!</div>

            <!-- Full screen dropdown overlay -->
            <div
                v-show="modifyAssignees"
                class="fixed inset-0 z-40"
                @click="modifyAssignees = false"
            ></div>

            <transition
                enter-active-class="transition ease-out duration-200"
                enter-from-class="transform opacity-0 scale-95"
                enter-to-class="transform opacity-100 scale-100"
                leave-active-class="transition ease-in duration-75"
                leave-from-class="transform opacity-100 scale-100"
                leave-to-class="transform opacity-0 scale-95"
            >
                <div
                    v-show="modifyAssignees"
                    class="
                        absolute
                        z-50
                        mt-2
                        rounded-md
                        shadow-lg
                        w-64
                        align-right
                        origin-top-left
                        left-0
                    "
                    style="display: none"
                >
                    <div
                        class="
                            rounded-md
                            ring-1 ring-black ring-opacity-5
                            py-2 px-3
                            bg-white
                        "
                    >
                        <form @submit.prevent="updateAssignees">
                            <!-- Input -->
                            <div>
                                <jet-label
                                    for="assigned_to"
                                    value="Assign To"
                                    class="mb-2 text-xs"
                                />
                                <multiselect
                                    v-model="form.assigned_to"
                                    :options="members"
                                    mode="tags"
                                    :searchable="true"
                                    :loading="true"
                                    :classes="{
                                        container:
                                            'relative mx-auto w-full flex items-center justify-end box-border cursor-pointer border border-gray-300 rounded bg-white text-base leading-snug outline-none',
                                        containerDisabled:
                                            'cursor-default bg-gray-100',
                                        containerOpen: 'rounded-b-none',
                                        containerOpenTop: 'rounded-t-none',
                                        containerActive:
                                            'ring ring-indigo-500 ring-opacity-30',
                                        singleLabel:
                                            'flex items-center h-full absolute left-0 top-0 pointer-events-none bg-transparent leading-snug pl-3.5',
                                        multipleLabel:
                                            'flex items-center h-full absolute left-0 top-0 pointer-events-none bg-transparent leading-snug pl-3.5',
                                        search: 'w-full absolute inset-0 outline-none appearance-none box-border border-0 text-base font-sans bg-white rounded pl-3.5',
                                        tags: 'flex-grow flex-shrink flex flex-wrap mt-1 pl-2',
                                        tag: 'bg-indigo-500 text-white text-sm font-semibold py-0.5 pl-2 rounded mr-1 mb-1 flex items-center whitespace-nowrap',
                                        tagDisabled:
                                            'pr-2 !bg-gray-400 text-white',
                                        tagRemove:
                                            'flex items-center justify-center p-1 mx-0.5 rounded-sm hover:bg-black hover:bg-opacity-10 group',
                                        tagRemoveIcon:
                                            'bg-multiselect-remove bg-center bg-no-repeat opacity-30 inline-block w-3 h-3 group-hover:opacity-60',
                                        tagsSearch:
                                            'h-full border-0 outline-none appearance-none p-0 text-base font-sans mx-1 mb-1 box-border flex-grow flex-shrink',
                                        placeholder:
                                            'flex items-center h-full absolute left-0 top-0 pointer-events-none bg-transparent leading-snug pl-3.5 text-gray-400',
                                        caret: 'bg-multiselect-caret bg-center bg-no-repeat w-2.5 h-4 py-px box-content mr-3.5 relative z-10 opacity-40 flex-shrink-0 flex-grow-0 transition-transform transform',
                                        caretOpen: 'rotate-180',
                                        clear: 'pr-3.5 relative z-10 opacity-40 transition duration-300 flex-shrink-0 flex-grow-0 flex hover:opacity-80',
                                        clearIcon:
                                            'bg-multiselect-remove bg-center bg-no-repeat w-2.5 h-4 py-px box-content inline-block',
                                        spinner:
                                            'bg-multiselect-spinner bg-center bg-no-repeat w-4 h-4 z-10 mr-3.5 animate-spin flex-shrink-0 flex-grow-0',
                                        dropdown:
                                            'absolute -left-px -right-px bottom-0 transform translate-y-full border border-gray-300 -mt-px overflow-y-scroll z-50 bg-white flex flex-col rounded-b',
                                        dropdownTop:
                                            '-translate-y-full top-px bottom-auto flex-col-reverse rounded-b-none rounded-t',
                                        options:
                                            'flex flex-col p-0 m-0 list-none',
                                        optionsTop: 'flex-col-reverse',
                                        option: 'flex items-center justify-start box-border text-left cursor-pointer text-base leading-snug py-2 px-3',
                                        optionPointed:
                                            'text-gray-800 bg-gray-100',
                                        optionSelected:
                                            'text-white bg-indigo-500',
                                        optionDisabled:
                                            'text-gray-300 cursor-not-allowed',
                                        optionSelectedPointed:
                                            'text-white bg-indigo-500 opacity-90',
                                        optionSelectedDisabled:
                                            'text-indigo-100 bg-indigo-500 bg-opacity-50 cursor-not-allowed',
                                        noOptions:
                                            'py-2 px-3 text-gray-600 bg-white',
                                        noResults:
                                            'py-2 px-3 text-gray-600 bg-white',
                                        fakeInput:
                                            'bg-transparent absolute left-0 right-0 -bottom-px w-full h-px border-0 p-0 appearance-none outline-none text-transparent',
                                        spacer: 'h-9 py-px box-content',
                                    }"
                                >
                                    <template
                                        v-slot:tag="{
                                            option,
                                            handleTagRemove,
                                            disabled,
                                        }"
                                    >
                                        <div
                                            class="
                                                flex
                                                items-center
                                                rounded
                                                bg-indigo-500
                                                mr-1
                                                py-1
                                                px-2
                                                mb-1
                                            "
                                        >
                                            <div>
                                                <img
                                                    :src="option.image"
                                                    class="
                                                        h-6
                                                        w-6
                                                        rounded-full
                                                        object-cover
                                                    "
                                                />
                                            </div>
                                            <div
                                                class="
                                                    text-sm text-white
                                                    font-semibold
                                                    ml-2
                                                "
                                            >
                                                {{ option.label }}
                                            </div>
                                            <div
                                                v-if="!disabled"
                                                @click.prevent
                                                @mousedown.prevent.stop="
                                                    handleTagRemove(
                                                        option,
                                                        $event
                                                    )
                                                "
                                            ></div>
                                        </div>
                                    </template>
                                </multiselect>
                                <jet-input-error
                                    :message="form.errors.assigned_to"
                                    class="mt-2"
                                />
                            </div>
                            <!-- Button -->
                            <div class="flex items-center justify-end py-3">
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
                                    Update Assignees
                                </jet-button>
                            </div>
                        </form>
                    </div>
                </div>
            </transition>
        </div>
    </div>
</template>

<script>
import JetMiniFormSection from "@/Jetstream/MiniFormSection";
import Multiselect from "@vueform/multiselect";
import JetInputError from "@/Jetstream/InputError";
import JetActionMessage from "@/Jetstream/ActionMessage";
import JetSecondaryButton from "@/Jetstream/SecondaryButton";
import JetButton from "@/Jetstream/Button";
import JetLabel from "@/Jetstream/Label";

export default {
    props: ["task", "assignees", "members"],

    components: {
        JetMiniFormSection,
        Multiselect,
        JetInputError,
        JetActionMessage,
        JetSecondaryButton,
        JetButton,
        JetLabel,
    },

    data() {
        return {
            modifyAssignees: false,
            form: this.$inertia.form({
                assigned_to: [],
            }),
        };
    },

    methods: {
        updateAssignees() {
            this.form.put(
                route("projects.edit.task_assignees.update", {
                    project_task: this.task.unique_id,
                }),
                {
                    errorBag: "updateAssignees",
                    preserveScroll: true,
                    onSuccess: () => {
                        (this.modifyAssignees = false), this.form.reset();
                    },
                }
            );
        },
    },
};
</script>
