<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create new project
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <div v-if="$page.props.flash.success">
                    <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-green-400 mb-4">
                        <span class="text-xl inline-block mr-5 align-middle">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                        </span>
                        <span class="inline-block align-middle mr-8">
                            <b class="capitalize">Success!</b> {{ $page.props.flash.success }}
                        </span>
                        <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none" @click="remove_flash">
                            <span>×</span>
                        </button>
                    </div>
                </div>
                <div v-if="$page.props.flash.failed">
                    <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-red-500 mb-4">
                        <span class="text-xl inline-block mr-5 align-middle">
                            <i class="fas fa-bell" />
                        </span>
                        <span class="inline-block align-middle mr-8">
                            <b class="capitalize">Error!</b> {{ $page.props.flash.failed }}
                        </span>
                        <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none" @click="remove_flash">
                            <span>×</span>
                        </button>
                    </div>
                </div>
                <div>
                    <create-project-form :project_categories="project_categories" />

                    <jet-section-border />
                </div>

                <div>
                    <create-category-form />

                    <jet-section-border />
                </div>

                <div>
                    <project-category-manager :project_categories="project_categories" />

                    <ject-section-border />
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

    export default {
        props: ['project_categories'],

        components: {
            AppLayout,
            JetSectionBorder,
            CreateProjectForm,
            CreateCategoryForm,
            ProjectCategoryManager
        },

        methods: {
            remove_flash () {
                this.$page.props.flash.success = null;
                this.$page.props.flash.failed = null;
            },

            deleteCategory () {
                this.$inertia.delete(route('project_categories.destroy'), {
                    preserveScroll: true
                });
            }
        }
    }
</script>