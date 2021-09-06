<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Tasks
            </h2>
        </template>

        <div>
            <alerts :flash="$page.props.flash" />

            <project-details :project="project" />

            <div class="mt-5">
                <div class="xl:flex flex-wrap shadow rounded">
                    <div class="xl:w-3/4 2xl:w-4/5 p-6 bg-white">
                        <div v-if="task.archived == 1">
                            <div
                                class="
                                    text-white
                                    px-6
                                    py-4
                                    border-0
                                    rounded
                                    relative
                                    mb-5
                                    bg-yellow-500
                                "
                            >
                                <span
                                    class="
                                        text-xl
                                        inline-block
                                        mr-3
                                        align-middle
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
                                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"
                                        />
                                    </svg>
                                </span>
                                <span class="inline-block align-middle mr-8">
                                    <b class="capitalize">Task Archived!</b>
                                    This task is archived and you won't be able
                                    to make any changes to this task.
                                </span>
                            </div>
                        </div>

                        <div
                            class="
                                xl:flex
                                flex-wrap
                                items-center
                                justify-between
                            "
                        >
                            <div>
                                <h2
                                    class="
                                        font-semibold
                                        text-xl text-gray-800
                                        leading-tight
                                    "
                                >
                                    {{ task.title }}
                                </h2>
                                <p
                                    class="
                                        text-xs text-gray-400
                                        leading-tight
                                        mt-2
                                    "
                                >
                                    <span class="font-semibold">Milestone</span
                                    >:
                                    {{
                                        task.milestone != null
                                            ? task.milestone.name
                                            : "N/A"
                                    }}
                                </p>
                            </div>
                        </div>

                        <jet-section-border />

                        <!-- Task Description -->
                        <div>
                            <task-description :task="task" />
                        </div>

                        <jet-section-border />

                        <!-- // Check lists  -->
                        <div>
                            <todo-lists
                                :project="project"
                                :task="task"
                                :checklist_items="check_lists"
                                :finished_items="finished_items"
                                :checklist_percentage="checklist_percentage"
                            />
                        </div>

                        <jet-section-border />

                        <div>
                            <file-attachments
                                :project="project"
                                :task="task"
                                :attachments="attachments"
                            />
                        </div>

                        <jet-section-border />

                        <div>
                            <comments
                                :project="project"
                                :task="task"
                                :comments="comments"
                            />
                        </div>
                    </div>
                    <div class="xl:w-1/4 2xl:w-1/5 p-6 bg-gray-200">
                        <div class="mb-5">
                            <assigned-users
                                :task="task"
                                :assignees="assignees"
                                :members="members"
                            />
                        </div>

                        <div class="mb-5">
                            <task-timer
                                :task="task"
                                :project_timer="project_timer_running"
                            />
                        </div>

                        <div class="mb-5">
                            <task-settings
                                :task="task"
                                :project_task_statuses="project_task_statuses"
                                :project_milestones="project_milestones"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import Alerts from "@/Jetstream/Alerts";
import ProjectDetails from "../ProjectDetails";
import TaskDescription from "./Partials/TaskDescription";
import TodoLists from "./Partials/TodoLists";
import FileAttachments from "./Partials/FileAttachments";
import Comments from "./Partials/Comments";
import JetSectionBorder from "@/Jetstream/SectionBorder";
import AssignedUsers from "./Partials/AssignedUsers";
import TaskSettings from "./Partials/TaskSettings";
import TaskTimer from "./Partials/TaskTimer";

export default {
    props: [
        "project",
        "task",
        "check_lists",
        "finished_items",
        "checklist_percentage",
        "attachments",
        "comments",
        "assignees",
        "members",
        "project_task_statuses",
        "project_milestones",
        "project_timer_running",
    ],

    components: {
        AppLayout,
        Alerts,
        ProjectDetails,
        JetSectionBorder,
        TaskDescription,
        TodoLists,
        FileAttachments,
        Comments,
        AssignedUsers,
        TaskSettings,
        TaskTimer,
    },
};
</script>
