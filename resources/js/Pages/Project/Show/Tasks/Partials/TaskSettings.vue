<template>
    <div class="space-y-5">
        <!-- Settings -->
        <div>
            <p class="text-sm font-semibold text-gray-600">
                <span> Settings </span>
            </p>

            <!-- Full screen dropdown overlay -->
            <div
                v-show="changing_status"
                class="fixed inset-0 z-40"
                @click="changing_status = false"
            ></div>

            <div
                v-show="changing_priority"
                class="fixed inset-0 z-40"
                @click="changing_priority = false"
            ></div>

            <div
                v-show="changing_milestone"
                class="fixed inset-0 z-40"
                @click="changing_milestone = false"
            ></div>

            <div class="mt-4 space-y-2">
                <!-- Start date -->
                <date-picker
                    @change="saveStartDate(start_date)"
                    v-model="start_date"
                    :min-date="new Date()"
                    color="indigo"
                >
                    <template v-slot="{ togglePopover }">
                        <div
                            @click="togglePopover()"
                            class="
                                px-3
                                py-2
                                bg-indigo-400
                                rounded
                                flex
                                items-center
                                cursor-pointer
                            "
                        >
                            <div class="mr-2">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-4 text-white"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                                    />
                                </svg>
                            </div>
                            <div class="mr-2">
                                <p class="text-white text-xs leading-tight">
                                    Start Date:
                                </p>
                            </div>
                            <div>
                                <p
                                    class="
                                        text-white text-xs
                                        leading-tight
                                        font-semibold
                                    "
                                >
                                    {{ formatDate(start_date) ?? "N/A" }}
                                </p>
                            </div>
                        </div>
                    </template>
                </date-picker>
                <!-- Due date -->
                <date-picker
                    @change="saveStartDate(due_date)"
                    v-model="due_date"
                    :min-date="new Date()"
                    color="indigo"
                >
                    <template v-slot="{ togglePopover }">
                        <div
                            @click="togglePopover()"
                            class="
                                px-3
                                py-2
                                bg-indigo-400
                                rounded
                                flex
                                items-center
                                cursor-pointer
                            "
                        >
                            <div class="mr-2">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-4 text-white"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                                    />
                                </svg>
                            </div>
                            <div class="mr-2">
                                <p class="text-white text-xs leading-tight">
                                    Due Date:
                                </p>
                            </div>
                            <div>
                                <p
                                    class="
                                        text-white text-xs
                                        leading-tight
                                        font-semibold
                                    "
                                >
                                    {{ formatDate(due_date) ?? "N/A" }}
                                </p>
                            </div>
                        </div>
                    </template>
                </date-picker>
                <!-- Status -->
                <div
                    @click="changing_status = true"
                    class="
                        px-3
                        py-2
                        rounded
                        flex
                        items-center
                        cursor-pointer
                        relative
                        z-1
                    "
                    :class="
                        task.completed == 1 ? 'bg-green-400' : 'bg-indigo-400'
                    "
                >
                    <!-- Dropdown Status -->
                    <transition
                        enter-active-class="transition ease-out duration-200"
                        enter-from-class="transform opacity-0 scale-95"
                        enter-to-class="transform opacity-100 scale-100"
                        leave-active-class="transition ease-in duration-75"
                        leave-from-class="transform opacity-100 scale-100"
                        leave-to-class="transform opacity-0 scale-95"
                    >
                        <div
                            v-show="changing_status"
                            class="
                                absolute
                                z-50
                                mt-52
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
                                    py-2
                                    px-3
                                    bg-white
                                "
                            >
                                <div
                                    v-for="(
                                        status, key
                                    ) in project_task_statuses"
                                    :key="key"
                                    @click="updateStatus(status)"
                                    class="
                                        block
                                        px-4
                                        py-2
                                        text-sm
                                        leading-5
                                        text-gray-700
                                        hover:bg-gray-100
                                        focus:outline-none focus:bg-gray-100
                                        transition
                                    "
                                >
                                    {{ status.name }}
                                </div>
                            </div>
                        </div>
                    </transition>
                    <div class="mr-2">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4 text-white"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9"
                            />
                        </svg>
                    </div>
                    <div class="mr-2">
                        <p class="text-white text-xs leading-tight">Status:</p>
                    </div>
                    <div>
                        <p
                            class="
                                text-white text-xs
                                leading-tight
                                font-semibold
                            "
                        >
                            <template v-if="task.completed == 1">
                                Completed
                            </template>
                            <template v-else>
                                {{
                                    task.status != null
                                        ? task.status.name
                                        : "N/A"
                                }}
                            </template>
                        </p>
                    </div>
                </div>
                <!-- Priority -->
                <div
                    @click="changing_priority = true"
                    class="
                        px-3
                        py-2
                        bg-indigo-400
                        rounded
                        flex
                        items-center
                        cursor-pointer
                        relative
                        z-1
                    "
                >
                    <!-- Dropdown Status -->
                    <transition
                        enter-active-class="transition ease-out duration-200"
                        enter-from-class="transform opacity-0 scale-95"
                        enter-to-class="transform opacity-100 scale-100"
                        leave-active-class="transition ease-in duration-75"
                        leave-from-class="transform opacity-100 scale-100"
                        leave-to-class="transform opacity-0 scale-95"
                    >
                        <div
                            v-show="changing_priority"
                            class="
                                absolute
                                z-50
                                mt-52
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
                                    py-2
                                    px-3
                                    bg-white
                                "
                            >
                                <div
                                    v-for="(priority, key) in priorities"
                                    :key="key"
                                    @click="updatePriority(priority)"
                                    class="
                                        block
                                        px-4
                                        py-2
                                        text-sm
                                        leading-5
                                        text-gray-700
                                        hover:bg-gray-100
                                        focus:outline-none focus:bg-gray-100
                                        transition
                                    "
                                >
                                    {{ priority.name }}
                                </div>
                            </div>
                        </div>
                    </transition>
                    <div class="mr-2">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4 text-white"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M20.618 5.984A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016zM12 9v2m0 4h.01"
                            />
                        </svg>
                    </div>
                    <div class="mr-2">
                        <p class="text-white text-xs leading-tight">
                            Priority:
                        </p>
                    </div>
                    <div>
                        <p
                            class="
                                text-white text-xs
                                leading-tight
                                font-semibold
                                capitalize
                            "
                        >
                            {{ task.priority ?? "N/A" }}
                        </p>
                    </div>
                </div>
                <!-- Client visibility -->
                <div
                    @click="updateClientVisibility(!task.visible_to_client)"
                    class="
                        px-3
                        py-2
                        rounded
                        flex
                        items-center
                        z-1
                        cursor-pointer
                    "
                    :class="
                        task.visible_to_client == 0
                            ? 'bg-red-400'
                            : 'bg-indigo-400'
                    "
                >
                    <div class="mr-2">
                        <svg
                            v-if="task.visible_to_client == 1"
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4 text-white"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                            />
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                            />
                        </svg>
                        <svg
                            v-else
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4 text-white"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"
                            />
                        </svg>
                    </div>
                    <div class="mr-2">
                        <p class="text-white text-xs leading-tight">Client:</p>
                    </div>
                    <div>
                        <p
                            class="
                                text-white text-xs
                                leading-tight
                                font-semibold
                                capitalize
                            "
                        >
                            {{
                                task.visible_to_client == 1
                                    ? "Visible"
                                    : "Hidden"
                            }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div>
            <p class="text-sm font-semibold text-gray-600">
                <span> Actions </span>
            </p>

            <div class="mt-4 space-y-2">
                <!-- Milestone -->
                <div
                    @click="changing_milestone = true"
                    class="
                        px-3
                        py-2
                        bg-indigo-400
                        rounded
                        flex
                        items-center
                        relative
                        z-1
                        cursor-pointer
                    "
                >
                    <!-- Dropdown Status -->
                    <transition
                        enter-active-class="transition ease-out duration-200"
                        enter-from-class="transform opacity-0 scale-95"
                        enter-to-class="transform opacity-100 scale-100"
                        leave-active-class="transition ease-in duration-75"
                        leave-from-class="transform opacity-100 scale-100"
                        leave-to-class="transform opacity-0 scale-95"
                    >
                        <div
                            v-show="changing_milestone"
                            class="
                                absolute
                                z-50
                                mt-52
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
                                    py-2
                                    px-3
                                    bg-white
                                "
                            >
                                <div
                                    v-for="(
                                        milestone, key
                                    ) in project_milestones"
                                    :key="key"
                                    @click="updateMilestone(milestone)"
                                    class="
                                        block
                                        px-4
                                        py-2
                                        text-sm
                                        leading-5
                                        text-gray-700
                                        hover:bg-gray-100
                                        focus:outline-none focus:bg-gray-100
                                        transition
                                    "
                                >
                                    {{ milestone.name }}
                                </div>
                            </div>
                        </div>
                    </transition>
                    <div class="mr-2">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4 text-white"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"
                            />
                        </svg>
                    </div>
                    <div class="mr-2">
                        <p class="text-white text-xs leading-tight">
                            Milestone:
                        </p>
                    </div>
                    <div>
                        <p
                            class="
                                text-white text-xs
                                leading-tight
                                font-semibold
                                capitalize
                            "
                        >
                            {{ task.milestone.name }}
                        </p>
                    </div>
                </div>
                <!-- Archive -->
                <div
                    @click="confirmTaskArchival(task)"
                    class="
                        px-3
                        py-2
                        rounded
                        flex
                        items-center
                        transition
                        hover:bg-yellow-400
                        cursor-pointer
                    "
                    :class="
                        task.archived == 1 ? 'bg-yellow-400' : 'bg-indigo-400'
                    "
                >
                    <div class="mr-2">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4 text-white"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"
                            />
                        </svg>
                    </div>
                    <div class="mr-2">
                        <p
                            class="
                                text-white text-xs
                                leading-tight
                                font-semibold
                            "
                        >
                            <span v-if="task.archived == 1">
                                Restore from Archive
                            </span>
                            <span v-else> Archive </span>
                        </p>
                    </div>
                </div>
                <!-- Delete -->
                <div
                    @click="confirmTaskDeletion(task)"
                    class="
                        px-3
                        py-2
                        bg-indigo-400
                        rounded
                        flex
                        items-center
                        transition
                        hover:bg-red-400
                        cursor-pointer
                    "
                >
                    <div class="mr-2">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4 text-white"
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
                    </div>
                    <div class="mr-2">
                        <p
                            class="
                                text-white text-xs
                                leading-tight
                                font-semibold
                            "
                        >
                            Delete Task
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modals -->
        <jet-confirmation-modal
            :show="taskBeingArchived"
            @close="taskBeingArchived = null"
        >
            <template #title>
                <span v-if="task.archived == 1">
                    Restore Task from Archive
                </span>
                <span v-else> Archive Task </span>
            </template>

            <template #content>
                <span v-if="task.archived == 1">
                    Are you sure you want to restore this task from archive?
                </span>
                <span v-else>
                    Are you sure you want to archive this task? You won't be
                    able to make any changes after this task is archived.
                </span>
            </template>

            <template #footer>
                <jet-secondary-button @click="taskBeingArchived = null">
                    Cancel
                </jet-secondary-button>

                <jet-danger-button
                    class="ml-2 bg-yellow-500"
                    @click="archiveTask"
                    :class="{ 'opacity-25': archiveTaskForm.processing }"
                    :disabled="archiveTaskForm.processing"
                >
                    <span v-if="task.archived == 1"> Restore </span>
                    <span v-else> Archive </span>
                </jet-danger-button>
            </template>
        </jet-confirmation-modal>

        <jet-confirmation-modal
            :show="taskBeingDeleted"
            @close="taskBeingDeleted = null"
        >
            <template #title> Delete Task </template>

            <template #content>
                Are you sure you want to delete this task? This action is
                irreversible.
            </template>

            <template #footer>
                <jet-secondary-button @click="taskBeingDeleted = null">
                    Cancel
                </jet-secondary-button>

                <jet-danger-button
                    class="ml-2 bg-red-500"
                    @click="deleteTask"
                    :class="{ 'opacity-25': deleteTaskForm.processing }"
                    :disabled="deleteTaskForm.processing"
                >
                    Delete
                </jet-danger-button>
            </template>
        </jet-confirmation-modal>
    </div>
</template>

<script>
import { DatePicker } from "v-calendar";
import moment from "moment";

import JetMiniFormSection from "@/Jetstream/MiniFormSection";
import Multiselect from "@vueform/multiselect";
import JetInputError from "@/Jetstream/InputError";
import JetActionMessage from "@/Jetstream/ActionMessage";
import JetSecondaryButton from "@/Jetstream/SecondaryButton";
import JetButton from "@/Jetstream/Button";
import JetLabel from "@/Jetstream/Label";
import JetConfirmationModal from "@/Jetstream/ConfirmationModal";
import JetDangerButton from "@/Jetstream/DangerButton";

export default {
    props: ["task", "project_task_statuses", "project_milestones"],

    components: {
        DatePicker,
        JetMiniFormSection,
        Multiselect,
        JetInputError,
        JetActionMessage,
        JetSecondaryButton,
        JetButton,
        JetLabel,
        JetConfirmationModal,
        JetDangerButton,
    },

    data() {
        return {
            // Updating of task settings
            start_date: this.task.start_date,
            due_date: this.task.due_date,
            changing_status: false,
            changing_priority: false,
            changing_milestone: false,
            // Task Archiving
            taskBeingArchived: null,
            archiveTaskForm: this.$inertia.form(),
            // Task Deleting
            taskBeingDeleted: null,
            deleteTaskForm: this.$inertia.form(),
            priorities: [
                {
                    name: "Normal",
                    value: "normal",
                },
                {
                    name: "High",
                    value: "high",
                },
                {
                    name: "Urgent",
                    value: "urgent",
                },
                {
                    name: "Low",
                    value: "low",
                },
            ],
        };
    },

    methods: {
        formatDate(date) {
            if (date != null) {
                return moment(date).format("YYYY-MM-DD");
            } else {
                return "N/A";
            }
        },

        updateStatus(status) {
            this.$inertia.post(
                route("projects.update.tasks.status", this.task.unique_id),
                {
                    _method: "PUT",
                    data: status.id,
                },
                {
                    preserveScroll: true,
                    onSuccess: () => (this.changing_status = false),
                }
            );
        },

        updatePriority(priority) {
            this.$inertia.post(
                route("projects.update.tasks.priority", this.task.unique_id),
                {
                    _method: "PUT",
                    data: priority.value,
                },
                {
                    preserveScroll: true,
                    onSuccess: () => (this.changing_priority = false),
                }
            );
        },

        updateClientVisibility(visiblity) {
            this.$inertia.post(
                route(
                    "projects.update.tasks.client_visibility",
                    this.task.unique_id
                ),
                {
                    _method: "PUT",
                    data: visiblity,
                },
                {
                    preserveScroll: true,
                }
            );
        },

        updateMilestone(milestone) {
            this.$inertia.post(
                route("projects.update.tasks.milestone", this.task.unique_id),
                {
                    _method: "PUT",
                    data: milestone.unique_id,
                },
                {
                    preserveScroll: true,
                    onSuccess: () => (this.changing_milestone = false),
                }
            );
        },

        confirmTaskArchival(task) {
            this.taskBeingArchived = task;
        },

        archiveTask() {
            this.archiveTaskForm.put(
                route(
                    "projects.update.tasks.archive",
                    this.taskBeingArchived.unique_id
                ),
                {
                    errorBag: "archiveTaskForm",
                    preserveScroll: true,
                    preserveState: true,
                    onSuccess: () => (this.taskBeingArchived = null),
                }
            );
        },

        confirmTaskDeletion(task) {
            this.taskBeingDeleted = task;
        },

        deleteTask() {
            this.deleteTaskForm.delete(
                route("projects.delete.task", this.taskBeingDeleted.unique_id),
                {
                    errorBag: "deleteTaskForm",
                }
            );
        },
    },

    watch: {
        start_date: function () {
            this.$inertia.post(
                route("projects.update.tasks.start_date", this.task.unique_id),
                {
                    _method: "PUT",
                    data: this.start_date,
                    preserveScroll: true,
                }
            );
        },

        due_date: function () {
            this.$inertia.post(
                route("projects.update.tasks.due_date", this.task.unique_id),
                {
                    _method: "PUT",
                    data: this.due_date,
                    preserveScroll: true,
                }
            );
        },
    },
};
</script>
