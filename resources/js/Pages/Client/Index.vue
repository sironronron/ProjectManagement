<template>
    <app-layout>
        <alerts :flash="$page.props.flash" />

        <inertia-head>
            <title>Clients - Project Management</title>
            <meta head-key="description" name="description" content="This is a page specific description" />
        </inertia-head>

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Clients
            </h2>
        </template>

        <!-- Client Lists -->
        <div class="py-12 max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <client-lists :clients="clients" />
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import ClientLists from './ClientLists'
    import Alerts from '@/Jetstream/Alerts'

    export default {
        props: ['clients'],

        components: {
            AppLayout,
            ClientLists,
            Alerts
        }    
    }
</script>