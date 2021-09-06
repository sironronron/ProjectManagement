<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Overview
            </h2>
        </template>

        <div>
            <alerts :flash="$page.props.flash" />

            <project-details :project="project" />

            <div class="mt-5">
                <div class="flex flex-wrap mb-6">
                    <div class="w-full">
                        <div
                            class="
                                flex flex-col
                                lg:flex-row
                                mx-auto
                                w-full
                                bg-white
                                shadow
                                rounded
                            "
                        >
                            <div class="w-full lg:w-1/3 p-6">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 rounded shadow">
                                        <img
                                            v-if="
                                                project.client.company_photo !=
                                                'client_default.png'
                                            "
                                            class="
                                                w-full
                                                h-full
                                                overflow-hidden
                                                object-cover
                                                rounded
                                            "
                                            :src="project.client.company_photo"
                                            :alt="project.client.company_name"
                                        />
                                        <img
                                            v-else
                                            class="
                                                w-full
                                                h-full
                                                overflow-hidden
                                                object-cover
                                                rounded
                                            "
                                            src="https://cdn.tuk.dev/assets/templates/olympus/projects.png"
                                            :alt="project.client.company_name"
                                        />
                                    </div>
                                    <div class="ml-3">
                                        <h5
                                            class="
                                                text-gray-800
                                                font-medium
                                                text-base
                                            "
                                        >
                                            {{ project.client.company_name }}
                                        </h5>
                                        <p
                                            class="
                                                text-gray-600 text-xs
                                                font-normal
                                            "
                                        >
                                            {{ project.client.address }}
                                        </p>
                                    </div>
                                </div>
                                <h3 class="text-lg text-gray-800 mt-5 mb-4">
                                    {{ project.name }}
                                </h3>
                                <div
                                    v-if="project.description.length < 250"
                                    class="text-gray-600 text-sm font-normal"
                                    v-html="project.description"
                                ></div>
                                <div
                                    v-else
                                    class="text-gray-600 text-sm font-normal"
                                    v-html="
                                        project.description.substring(0, 250) +
                                        '...'
                                    "
                                ></div>
                            </div>
                            <div
                                class="
                                    w-full
                                    lg:w-1/3
                                    p-6
                                    border-t border-b
                                    lg:border-t-0 lg:border-b-0
                                    sm:border-l sm:border-r
                                    border-gray-300
                                "
                            >
                                <div
                                    class="
                                        flex flex-col
                                        lg:flex-row
                                        items-start
                                        lg:items-center
                                        justify-between
                                    "
                                >
                                    <div
                                        class="
                                            text-xs text-center
                                            w-full
                                            bg-indigo-100
                                            text-indigo-700
                                            rounded
                                            font-medium
                                            p-3
                                            lg:mr-3
                                        "
                                    >
                                        Start Date: {{ project.start_date }}
                                    </div>
                                    <div
                                        class="
                                            mt-4
                                            text-center
                                            w-full
                                            lg:mt-0
                                            text-xs
                                            bg-red-200
                                            text-red-500
                                            rounded
                                            font-medium
                                            p-3
                                        "
                                    >
                                        End Date: {{ project.end_date }}
                                    </div>
                                </div>
                                <div class="mt-6 mb-8 w-full relative">
                                    <ul>
                                        <li
                                            class="
                                                text-xs text-gray-600
                                                font-normal
                                                tracking-normal
                                            "
                                        >
                                            <span class="font-semibold">
                                                Assigned To:
                                            </span>
                                            <div class="flex items-center mt-2">
                                                <div class="h-10 w-10">
                                                    <img
                                                        :src="
                                                            project.assigned_to
                                                                .profile_photo_url
                                                        "
                                                        :alt="
                                                            project.assigned_to
                                                                .name
                                                        "
                                                        class="
                                                            h-full
                                                            w-full
                                                            object-cover
                                                            rounded-full
                                                            overflow-hidden
                                                            shadow
                                                        "
                                                    />
                                                </div>
                                                <div class="pl-2">
                                                    <p
                                                        class="
                                                            ml-2
                                                            text-gray-800
                                                            dark:text-gray-100
                                                            tracking-normal
                                                            leading-4
                                                            text-sm
                                                        "
                                                    >
                                                        {{
                                                            project.assigned_to
                                                                .name
                                                        }}
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                        <li
                                            class="
                                                text-xs text-gray-600
                                                font-normal
                                                tracking-normal
                                                my-4
                                            "
                                        >
                                            <span class="font-semibold">
                                                Project Manager:
                                            </span>
                                            <div class="flex items-center mt-2">
                                                <div class="h-10 w-10">
                                                    <img
                                                        :src="
                                                            project
                                                                .project_manager
                                                                .profile_photo_url
                                                        "
                                                        :alt="
                                                            project
                                                                .project_manager
                                                                .name
                                                        "
                                                        class="
                                                            h-full
                                                            w-full
                                                            object-cover
                                                            rounded-full
                                                            overflow-hidden
                                                            shadow
                                                        "
                                                    />
                                                </div>
                                                <div class="pl-2">
                                                    <p
                                                        class="
                                                            ml-2
                                                            text-gray-800
                                                            dark:text-gray-100
                                                            tracking-normal
                                                            leading-4
                                                            text-sm
                                                        "
                                                    >
                                                        {{
                                                            project
                                                                .project_manager
                                                                .name
                                                        }}
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="cursor-pointer">
                                        <h2
                                            class="
                                                text-gray-600
                                                font-bold
                                                text-lg
                                                leading-6
                                                mb-1
                                                text-center
                                            "
                                        >
                                            {{ project_milestones_count }}
                                        </h2>
                                        <p
                                            class="
                                                text-gray-800 text-sm
                                                leading-5
                                                text-center
                                            "
                                        >
                                            Milestones
                                        </p>
                                    </div>
                                    <div class="cursor-pointer">
                                        <h2
                                            class="
                                                text-gray-600
                                                font-bold
                                                text-lg
                                                leading-6
                                                mb-1
                                                text-center
                                            "
                                        >
                                            {{ project_teams_count }}
                                        </h2>
                                        <p
                                            class="
                                                text-gray-800 text-sm
                                                leading-5
                                                text-center
                                            "
                                        >
                                            Teams Assigned
                                        </p>
                                    </div>
                                    <div class="cursor-pointer">
                                        <h2
                                            class="
                                                text-gray-600
                                                font-bold
                                                text-lg
                                                leading-6
                                                mb-1
                                                text-center
                                            "
                                        >
                                            {{ project_tasks_count }}
                                        </h2>
                                        <p
                                            class="
                                                text-gray-800 text-sm
                                                leading-5
                                                text-center
                                            "
                                        >
                                            Tasks Pending
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full lg:w-1/3 p-6">
                                <div
                                    class="
                                        flex flex-wrap
                                        -mx-4
                                        overflow-hidden
                                        mb-4
                                    "
                                >
                                    <div
                                        class="
                                            my-4
                                            px-4
                                            w-1/2
                                            overflow-hidden
                                            sm:w-1/2
                                            md:w-1/2
                                            lg:w-1/2
                                            xl:w-1/2
                                        "
                                    >
                                        <p
                                            class="
                                                text-sm text-gray-800
                                                font-normal
                                                mb-1
                                                tracking-normal
                                            "
                                        >
                                            Billing Type
                                        </p>
                                        <h2
                                            class="
                                                text-sm
                                                xl:text-lg
                                                text-gray-600
                                                font-bold
                                                tracking-normal
                                            "
                                        >
                                            {{ billing_rate }}
                                        </h2>
                                    </div>

                                    <div
                                        class="
                                            my-4
                                            px-4
                                            w-1/2
                                            overflow-hidden
                                            sm:w-1/2
                                            md:w-1/2
                                            lg:w-1/2
                                            xl:w-1/2
                                        "
                                    >
                                        <p
                                            class="
                                                text-sm text-gray-800
                                                font-normal
                                                mb-1
                                                tracking-normal
                                            "
                                        >
                                            Rate
                                        </p>
                                        <h2
                                            class="
                                                text-sm
                                                xl:text-lg
                                                text-gray-600
                                                font-bold
                                                tracking-normal
                                            "
                                        >
                                            {{ billing }}
                                        </h2>
                                    </div>
                                </div>
                                <div
                                    class="
                                        flex flex-wrap
                                        -mx-4
                                        overflow-hidden
                                        mb-4
                                    "
                                >
                                    <div
                                        class="
                                            my-4
                                            px-4
                                            w-1/2
                                            overflow-hidden
                                            sm:w-1/2
                                            md:w-1/2
                                            lg:w-1/2
                                            xl:w-1/2
                                        "
                                    >
                                        <p
                                            class="
                                                text-sm text-gray-800
                                                font-normal
                                                mb-1
                                                tracking-normal
                                            "
                                        >
                                            Budget
                                        </p>
                                        <h2
                                            class="
                                                text-sm
                                                xl:text-lg
                                                text-gray-600
                                                font-bold
                                                tracking-normal
                                            "
                                        >
                                            {{ budget }}
                                        </h2>
                                    </div>

                                    <div
                                        class="
                                            my-4
                                            px-4
                                            w-1/2
                                            overflow-hidden
                                            sm:w-1/2
                                            md:w-1/2
                                            lg:w-1/2
                                            xl:w-1/2
                                        "
                                    >
                                        <p
                                            class="
                                                text-sm text-gray-800
                                                font-normal
                                                mb-1
                                                tracking-normal
                                            "
                                        >
                                            Remaining Budget
                                        </p>
                                        <h2
                                            class="
                                                text-sm
                                                xl:text-lg
                                                text-gray-600
                                                font-bold
                                                tracking-normal
                                            "
                                        >
                                            {{ remaining_budget }}
                                        </h2>
                                    </div>
                                </div>
                                <div
                                    class="flex flex-wrap -mx-4 overflow-hidden"
                                >
                                    <div
                                        class="
                                            my-4
                                            px-4
                                            w-1/2
                                            overflow-hidden
                                            sm:w-1/2
                                            md:w-1/2
                                            lg:w-1/2
                                            xl:w-1/2
                                        "
                                    >
                                        <p
                                            class="
                                                text-sm text-gray-800
                                                font-normal
                                                mb-1
                                                tracking-normal
                                            "
                                        >
                                            Estimated Hours
                                        </p>
                                        <h2
                                            class="
                                                text-sm
                                                xl:text-lg
                                                text-gray-600
                                                font-bold
                                                tracking-normal
                                            "
                                        >
                                            {{ project.estimated_hours }} Hours
                                        </h2>
                                    </div>

                                    <div
                                        class="
                                            my-4
                                            px-4
                                            w-1/2
                                            overflow-hidden
                                            sm:w-1/2
                                            md:w-1/2
                                            lg:w-1/2
                                            xl:w-1/2
                                        "
                                    >
                                        <p
                                            class="
                                                text-sm text-gray-800
                                                font-normal
                                                mb-1
                                                tracking-normal
                                            "
                                        >
                                            Time Spent
                                        </p>
                                        <h2
                                            class="
                                                text-sm
                                                xl:text-lg
                                                text-gray-600
                                                font-bold
                                                tracking-normal
                                            "
                                        >
                                            {{ total_time }} Hours
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import ProjectDetails from "./ProjectDetails";
import Alerts from "@/Jetstream/Alerts";

export default {
    props: [
        "project",
        "billing",
        "billing_rate",
        "budget",
        "remaining_budget",
        "recent_activities",
        "project_teams_count",
        "project_milestones_count",
        "project_tasks_count",
        "total_time"
    ],

    components: {
        AppLayout,
        ProjectDetails,
        Alerts,
    },
};
</script>
