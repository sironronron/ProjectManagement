<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create new project
            </h2>
        </template>

        <div>
            <div>
                <alerts v-if="!!$page.props.flash" :flash="$page.props.flash" />

                <div>
                    <create-project-form :project_categories="project_categories" :project_category_lists="project_category_lists" :clients="clients" :assignee="assignee" :project_managers="project_managers" />

                    <jet-section-border />
                </div>

                <div>
                    <create-category-form />

                    <jet-section-border />
                </div>

                <div>
                    <project-category-manager :project_categories="project_categories" />
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import JetSectionBorder from '@/Jetstream/SectionBorder'

    import CreateProjectForm from './CreateProjectForm'
    import CreateCategoryForm from './CreateCategoryForm'
    import ProjectCategoryManager from './ProjectCategoryManager'

    import Alerts from '@/Jetstream/Alerts'

    export default {
        props: ['project_categories', 'project_category_lists', 'clients', 'assignee', 'project_managers'],

        components: {
            AppLayout,
            JetSectionBorder,
            CreateProjectForm,
            CreateCategoryForm,
            ProjectCategoryManager,
            Alerts
        },

        methods: {
            deleteCategory () {
                this.$inertia.delete(route('project_categories.destroy'), {
                    preserveScroll: true
                });
            }
        }
    }
</script>