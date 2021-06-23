<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Manage project category
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <!-- Success Alert -->
                <alerts v-if="!!$page.props.flash" :flash="$page.props.flash" />

                <div>
                    <update-category-form :project_category="project_category" />

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

    import UpdateCategoryForm from './UpdateCategoryForm'
    import ProjectCategoryManager from '../ProjectCategoryManager'

    import Alerts from '@/Jetstream/Alerts'

    export default {
        props: ['project_category', 'project_categories'],

        components: {
            AppLayout,
            JetSectionBorder,
            ProjectCategoryManager,
            UpdateCategoryForm,
            Alerts
        },
    }
</script>