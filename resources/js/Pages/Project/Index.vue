<template>
    <app-layout>
        <inertia-head>
            <title>About - My app</title>
            <meta head-key="description" name="description" content="This is a page specific description" />
        </inertia-head>

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Projects
            </h2>
        </template>

        <!-- List of Projects -->
        <div class="py-12 max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div v-if="$page.props.flash.success" class="bg-green-100 p-5 w-full rounded mb-4">
                <div class="flex justify-between">
                    <div class="flex space-x-3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="flex-none fill-current text-green-500 h-4 w-4">
                        <path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-1.25 16.518l-4.5-4.319 1.396-1.435 3.078 2.937 6.105-6.218 1.421 1.409-7.5 7.626z" /></svg>
                        <div class="flex-1 leading-tight text-sm text-green-700 font-medium">You have successfully created a new project!</div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="flex-none fill-current text-green-600 h-3 w-3 cursor-pointer" @click="remove_flash">
                        <path d="M23.954 21.03l-9.184-9.095 9.092-9.174-2.832-2.807-9.09 9.179-9.176-9.088-2.81 2.81 9.186 9.105-9.095 9.184 2.81 2.81 9.112-9.192 9.18 9.1z" />
                    </svg>
                </div>
            </div>
            <div v-if="$page.props.flash.failed" class="bg-red-100 p-5 w-full rounded mb-4">
                <div class="flex justify-between">
                    <div class="flex space-x-3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="flex-none fill-current text-green-500 h-4 w-4">
                        <path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-1.25 16.518l-4.5-4.319 1.396-1.435 3.078 2.937 6.105-6.218 1.421 1.409-7.5 7.626z" /></svg>
                        <div class="flex-1 leading-tight text-sm text-green-700 font-medium">Something went wrong!</div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="flex-none fill-current text-green-600 h-3 w-3 cursor-pointer" @click="remove_flash">
                        <path d="M23.954 21.03l-9.184-9.095 9.092-9.174-2.832-2.807-9.09 9.179-9.176-9.088-2.81 2.81 9.186 9.105-9.095 9.184 2.81 2.81 9.112-9.192 9.18 9.1z" />
                    </svg>
                </div>
            </div>
            <!-- Navigations -->
            <div class="flex items-center justify-between">
                <div>
                    <!-- Filter Projects -->
                    <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.search" autofocus placeholder="Search for project name" />
                </div>
                <div>
                    <!-- Create New Project -->
                    <inertia-link :href="route('projects.create')" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                        Create New Project
                    </inertia-link>
                </div>
            </div>
            <!-- Project Lists -->
            <div class="container mx-auto grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 pt-6 gap-8">
                <div v-for="(project, key) in projects" :key="key" class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                    <div class="flex-auto p-4">
                        <div class="flex flex-wrap">
                            <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                <div class="text-gray-400 uppercase font-bold text-xs flex items-center content-start">
                                    <div class="mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                        </svg>
                                    </div>
                                    <div>
                                        0 / 12
                                    </div>
                                </div>
                                <span class="font-semibold text-xl text-gray-700">
                                    {{ project.name }}
                                </span>
                            </div>
                        </div>
                        <div class="mt-4 flex items-center content-between">
                            <div>
                                <p class="text-sm text-gray-400">
                                    Due {{ project.remaining_days }} days
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import JetInput from '@/Jetstream/Input'

    export default {
        props: {
            projects: Object
        },

        components: {
            AppLayout,
            JetInput
        },

        data () {
            return {
                form: this.$inertia.form({
                    search: '',
                })
            }
        },

        methods: {
            remove_flash () {
                this.$page.props.flash.success = null;
                this.$page.props.flash.failed = null;
            }            
        },

        metaInfo () {
            return {
                title: "Projects List - Project Management"
            }
        }
    }
</script>