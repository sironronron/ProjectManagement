<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <span class="uppercase text-gray-400 text-sm tracking-widest mb-3">Current Team</span>
                <h1 class="text-4xl">{{ current_team.name }}</h1>
                <!-- Team Members -->
                <div class="flex -space-x-1 overflow-hidden mt-2">
                    <inertia-link  v-for="(member, key) in team_members" :key="key" :href="route('public_profile', member.unique_id)">
                        <img class="inline-block h-8 w-8 rounded-full ring-2 ring-white object-cover" :src="member.profile_photo_url" :title="member.name" alt="">
                    </inertia-link>
                </div>

                <!-- <div class="container mx-auto grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 pt-6 gap-8">
                    <div class="rounded border-gray-300 dark:border-gray-700 border-2 h-24 bg-white shadow">
                        
                    </div>
                </div> -->
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'

    export default {
        components: {
            AppLayout,
        },

        props: {
            current_team: Object,
            team_members: Object
        }
    }
</script>
