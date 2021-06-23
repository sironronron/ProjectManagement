<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ client.company_name }} <span class="text-gray-200 mx-5">|</span> Notes
            </h2>
        </template>

        <div class="py-12 max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <client-details :client="client" />
        
            <!-- Note view -->
            
                <div class="container mx-auto pt-16">
                    <div role="contentinfo" class="focus:outline-none mb-12 xl:w-full w-11/12 mx-auto">
                        <h1 tabindex="0" class="focus:outline-none xl:text-5xl text-3xl pt-4 xl:pt-0 text-gray-800 xl:text-left font-extrabold mb-4">{{ note.title }}</h1>
                        <p tabindex="0" class="focus:outline-none text-xl text-gray-600 xl:w-7/12 mx-auto xl:mx-0">
                            {{ note.subtitle }}
                        </p>
                        <div class="mt-5 text-base" v-html="note.body"></div>
                    </div>
                </div>
            
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import ClientDetails from '../Show/ClientDetails'
    
    export default {
        props: ['client', 'note'],

        components: {
            AppLayout,
            ClientDetails
        }
    }
</script>