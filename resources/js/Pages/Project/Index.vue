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
            <alerts v-if="$page.props.flash" :flash="$page.props.flash" />
            
            <!-- Project Lists -->
            <project-list :projects="projects" />
            
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import JetInput from '@/Jetstream/Input'

    import Alerts from '@/Jetstream/Alerts'

    // Projects
    import ProjectList from './ProjectLists'

    export default {
        props: ['projects'],

        components: {
            AppLayout,
            JetInput,
            Alerts,
            ProjectList
        },

        data () {
            return {
                form: this.$inertia.form({
                    search: '',
                })
            }
        },

        methods: {
            // Method here 
        },

        metaInfo () {
            return {
                title: "Projects List - Project Management"
            }
        }
    }
</script>