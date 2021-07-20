<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Tasks
            </h2>
        </template>

        <div class="py-12 container mx-auto py-6">
            <alerts :flash="$page.props.flash" />

            <project-details :project="project" />

            <div class="mt-5">
                <div class="xl:flex flex-wrap shadow rounded">
                    <div class="xl:w-3/4 2xl:w-4/5 p-6 bg-white">
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
                            <file-attachments :project="project" :task="task" :attachments="attachments" />
                        </div>

                        <jet-section-border />

                        <div>
                            <comments :project="project" :task="task" :comments="comments" />
                        </div>
                    </div>
                    <div
                        class="xl:w-1/4 2xl:w-1/5 xl:pl-8 pb-7 bg-gray-200"
                    >
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
import Comments from './Partials/Comments';
import JetSectionBorder from "@/Jetstream/SectionBorder";

export default {
    props: [
        "project",
        "task",
        "check_lists",
        "finished_items",
        "checklist_percentage",
        "attachments",
        "comments"
    ],

    components: {
        AppLayout,
        Alerts,
        ProjectDetails,
        JetSectionBorder,
        TaskDescription,
        TodoLists,
        FileAttachments,
        Comments
    },
};
</script>
