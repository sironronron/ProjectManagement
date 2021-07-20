<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create new task
            </h2>
        </template>

        <div>
            <div class="py-12 container mx-auto py-6">
                <alerts v-if="!!$page.props.flash" :flash="$page.props.flash" />

                <project-details :project="project" />

                <!-- Creation of task -->
                <div>
                    <create-task-form :project="project" :project_milestones="project_milestones" :members="members" :project_task_statuses="project_task_statuses"  />

                    <jet-section-border />
                </div>

                <!-- Creation of task statuses -->
                <div>
                    <create-task-status-form :project="project" />

                    <jet-section-border />
                </div>

                <div>
                    <project-status-manager :project_statuses="project_task_statuses"></project-status-manager>
                </div>
            </div>
        </div>

    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import ProjectDetails from '../../Show/ProjectDetails'
    import Alerts from '@/Jetstream/Alerts'
    import JetSectionBorder from '@/Jetstream/SectionBorder'

    // Forms
    import CreateTaskForm from './CreateTaskForm'
    import CreateTaskStatusForm from './CreateTaskStatusForm'
    import ProjectStatusManager from './Partials/ProjectTaskStatusManager'

    export default {
        props: ['project', 'project_task_statuses', 'project_milestones', 'members'],

        components: {
            AppLayout,
            ProjectDetails,
            Alerts,
            JetSectionBorder,
            CreateTaskForm,
            CreateTaskStatusForm,
            ProjectStatusManager
        }
    }
</script>
