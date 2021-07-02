<template>
    <app-layout>
        <alerts :flash="$page.props.flash" />

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ client.company_name }} <span class="text-gray-200 mx-5">|</span> Dashboard
            </h2>
        </template>

        <div class="py-12 container mx-auto py-6">
            <client-details :client="client" />

            <!-- Dashboard details -->
            <div class="mb-5">
                <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded h-100">
                    <div class="rounded-t mb-0 px-4 py-3 border-0">
                        <div class="flex flex-wrap items-center">
                            <div class="relative w-full px-2 max-w-full flex-grow flex-1">
                                <h3 class="font-normal text-base text-gray-700">
                                    Recent Activities
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="block w-full overflow-x-auto">
                        <!-- Projects table -->
                        <table class="items-center w-full bg-transparent border-collapse">
                            <thead>
                                <tr>
                                    <th class="px-6 bg-gray-50 text-gray-500 align-middle border border-solid border-gray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        User
                                    </th>
                                    <th class="px-6 bg-gray-50 text-gray-500 align-middle border border-solid border-gray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Activity
                                    </th>
                                    <th class="px-6 bg-gray-50 text-gray-500 align-middle border border-solid border-gray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Time
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(activity, key) in recent_activities.data" :key="key" class="cursor-pointer hover:bg-gray-100">
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        <div class="flex items-center">
                                            <div class="h-8 w-8">
                                                <img :src="activity.user.profile_photo_url" :alt="activity.user.name" class="h-full w-full rounded-full overflow-hidden shadow" />
                                            </div>
                                            <p class="ml-2 text-gray-800 dark:text-gray-100 tracking-normal leading-4 text-sm">
                                                {{  activity.user.name }}
                                            </p>
                                        </div>
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                        {{ activity.activity }} 

                                        <inertia-link :href="activity.link" class="text-indigo-500">{{ activity.link_title }}</inertia-link>
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        {{ activity.actual_time }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div v-if="recent_activities.data.length == 0" class="py-4">
                            <p class="text-leading text-sm text-gray-400 text-center">
                                There's no activities happening yet!
                            </p>
                        </div>
                    </div>
                </div>
                <pagination class="my-5" :links="recent_activities.links" />
            </div>
        </div>
        <popup-new-user :client="client" />
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import ClientDetails from './ClientDetails'
    import Popup from '@/Mixins/Index'
    import Pagination from '@/Jetstream/Pagination'
    import Alerts from '@/Jetstream/Alerts'

    export default {
        mixins: [Popup],

        props: ['client', 'recent_activities'],

        components: {
            AppLayout,
            ClientDetails,
            Pagination,
            Alerts
        },
    }
</script>