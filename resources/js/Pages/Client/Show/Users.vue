<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ client.company_name }} <span class="text-gray-200 mx-5">|</span> Users
            </h2>
        </template>

        <div class="py-12 container mx-auto py-6">
            <client-details :client="client" />

            <alerts :flash="$page.props.flash" />

            <!-- Dashboard details -->
            <div class="mb-5">
                <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded h-100">
                    <div class="rounded-t mb-0 px-4 py-3 border-0">
                        <div class="flex flex-wrap items-center">
                            <div class="relative w-full px-2 max-w-full flex-grow flex-1">
                                <h3 class="font-normal text-base text-gray-700">
                                    Users List
                                </h3>
                            </div>
                            <div class="text-right">
                                <button @click="Popup(true)" class="text-gray-600 dark:text-gray-400 mr-2 p-1 border-transparent border bg-gray-100 dark:hover:bg-gray-600 dark:bg-gray-700 hover:bg-gray-200 cursor-pointer rounded focus:outline-none focus:border-gray-800 focus:shadow-outline-gray">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="12" height="12" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <line x1="12" y1="5" x2="12" y2="19" />
                                        <line x1="5" y1="12" x2="19" y2="12" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="block w-full overflow-x-auto">
                        <!-- Projects table -->
                        <table class="items-center w-full bg-transparent border-collapse">
                            <thead>
                                <tr>
                                    <th class="px-6 bg-gray-50 text-gray-500 align-middle border border-solid border-gray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Name
                                    </th>
                                    <th class="px-6 bg-gray-50 text-gray-500 align-middle border border-solid border-gray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Email
                                    </th>
                                    <th class="px-6 bg-gray-50 text-gray-500 align-middle border border-solid border-gray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Phone Number
                                    </th>
                                    <th class="px-6 bg-gray-50 text-gray-500 align-middle border border-solid border-gray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Position
                                    </th>
                                    <th class="px-6 bg-gray-50 text-gray-500 align-middle border border-solid border-gray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(user, key) in users.data" :key="key" class="cursor-pointer hover:bg-gray-100">
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        <div class="flex items-center">
                                            <div class="h-8 w-8">
                                                <img :src="user.user.profile_photo_url" :alt="user.user.name" class="h-full w-full rounded-full overflow-hidden shadow" />
                                            </div>
                                            <p class="ml-2 text-gray-800 dark:text-gray-100 tracking-normal leading-4 text-sm">
                                                {{ user.user.name }}
                                            </p>
                                            <div v-if="user.user_id == client.owner_id" class="ml-2" title="Account Owner">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" fill="#ff9041" />
                                                </svg>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                        {{ user.user.email }}
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                        {{ user.user.phone_number ?? '--' }}
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                        {{ user.user.position ?? '--' }}
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                       <div class="flex items-center">
                                            <!-- Edit Project Category -->
                                            <inertia-link :href="route('client_users.edit', { client_id: client.unique_id, client_user_id: user.user.unique_id })" class="cursor-pointer ml-6 text-sm text-gray-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </inertia-link>
                                            <!-- Delet Project Category -->
                                            <button v-if="user.user_id != client.owner_id" @click="confirmClientUserRemoval(user)" class="cursor-pointer ml-6 text-sm text-red-500 focus:outline-none">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                    fill="none">
                                                    <path d="M4 7H20" stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M10 11V17" stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M14 11V17" stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M5 7L6 19C6 20.1046 6.89543 21 8 21H16C17.1046 21 18 20.1046 18 19L19 7"
                                                        stroke="#718096" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                    </path>
                                                    <path d="M9 7V4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V7"
                                                        stroke="#718096" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                    </path>
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div v-if="users.data.length == 0" class="py-4">
                            <p class="text-leading text-sm text-gray-400 text-center">
                                There's no users yet on this client!
                            </p>
                        </div>
                    </div>
                </div>
                <pagination class="mt-6" :links="users.links" />
            </div>

        </div>
        <popup-new-user :client="client" />

        <!-- Delete User -->
        <jet-confirmation-modal :show="clientUserBeingRemoved" @close="clientUserBeingRemoved = null">
            <template #title>
                Remove client user
            </template>

            <template #content>
                Are you sure you would like to remove this person from the client users list?
            </template>

            <template #footer>
                <jet-secondary-button @click="clientUserBeingRemoved = null">
                    Cancel
                </jet-secondary-button>

                <jet-danger-button class="ml-2" @click="removeClientUser" :class="{ 'opacity-25': removeClientUserForm.processing }" :disabled="removeClientUserForm.processing">
                    Remove
                </jet-danger-button>
            </template>
        </jet-confirmation-modal>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import ClientDetails from './ClientDetails'
    import Popup from '@/Mixins/Index'
    import PopupNewUser from './Partials/PopupNewUser'
    import Pagination from '@/Jetstream/Pagination'
    import Alerts from '@/Jetstream/Alerts'
    import JetConfirmationModal from '@/Jetstream/ConfirmationModal'
    import JetDangerButton from '@/Jetstream/DangerButton'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton'

    export default {
        mixins: [Popup],

        props: ['client', 'users'],
        
        components: {
            AppLayout,
            ClientDetails,
            PopupNewUser,
            Pagination,
            Alerts,
            JetConfirmationModal,
            JetDangerButton,
            JetSecondaryButton
        },

        data () {
            return {
                clientUserBeingRemoved: null,
                removeClientUserForm: this.$inertia.form()
            }
        },

        methods: {
            confirmClientUserRemoval (clientUser) {
                this.clientUserBeingRemoved = clientUser
            },

            removeClientUser () {
                this.removeClientUserForm.delete(route('client_users.destroy', [this.clientUserBeingRemoved.id]), {
                    errorBag: 'removeClientUser',
                    preserveScroll: true,
                    preserveState: true,
                    onSuccess: () => (this.clientUserBeingRemoved = null)
                })
            }
        }
    }
</script>