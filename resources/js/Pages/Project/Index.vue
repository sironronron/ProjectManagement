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
        <div class="py-12 container mx-auto py-6">
            <alerts v-if="$page.props.flash" :flash="$page.props.flash" />
            
            <!-- Project Lists -->
            <div class="xl:flex">
                <div class="xl:w-3/4 2xl:w-4/5">
                    <project-list :projects="projects" />
                </div>
                <div class="xl:w-1/4 2xl:w-1/5 xl:pl-8 pb-7 flex lg:flex-col md:flex-row flex-col w-full pl-4 xl:pr-0 pr-4">
                    <div class="md:w-full sm:w-1/2 w-full">
						<p class="text-base font-semibold text-gray-800">
							Recent Updates
						</p>
						<div class="mt-4">
							<div
							class="flex bg-white shadow items-center w-full justify-between rounded py-2 pl-2 pr-4"
							>
							<div class="flex items-center">
								<div class="py-3 px-3 bg-purple-100 rounded-sm">
								<svg
									xmlns="http://www.w3.org/2000/svg"
									width="24"
									height="24"
									viewBox="0 0 24 24"
									fill="none"
								>
									<path
									d="M9 21C10.1046 21 11 20.1046 11 19C11 17.8954 10.1046 17 9 17C7.89543 17 7 17.8954 7 19C7 20.1046 7.89543 21 9 21Z"
									stroke="#A78BFA"
									stroke-width="1.5"
									stroke-linecap="round"
									stroke-linejoin="round"
									/>
									<path
									d="M17 21C18.1046 21 19 20.1046 19 19C19 17.8954 18.1046 17 17 17C15.8954 17 15 17.8954 15 19C15 20.1046 15.8954 21 17 21Z"
									stroke="#A78BFA"
									stroke-width="1.5"
									stroke-linecap="round"
									stroke-linejoin="round"
									/>
									<path
									d="M3 3H5L7 15C7.21572 15.6135 7.62494 16.1402 8.16602 16.501C8.7071 16.8617 9.35075 17.0368 10 17H17C17.6493 17.0368 18.2929 16.8617 18.834 16.501C19.3751 16.1402 19.7843 15.6135 20 15L21 8H5.8"
									stroke="#A78BFA"
									stroke-width="1.5"
									stroke-linecap="round"
									stroke-linejoin="round"
									/>
								</svg>
								</div>
								<p class="pl-5 text-sm font-medium text-gray-600">
								Order# IDO-214-152
								</p>
							</div>
							<p class="text-xs font-semibold text-gray-400">$145</p>
							</div>
							<div class="mt-4 bg-white shadow rounded py-2 pl-2 pr-4">
							<div class="flex items-center">
								<div class="py-3 px-3 bg-teal-400 rounded-sm">
								<svg
									xmlns="http://www.w3.org/2000/svg"
									width="24"
									height="24"
									viewBox="0 0 24 24"
									fill="none"
								>
									<path
									d="M12 20L9 17H7C6.20435 17 5.44129 16.6839 4.87868 16.1213C4.31607 15.5587 4 14.7956 4 14V8C4 7.20435 4.31607 6.44129 4.87868 5.87868C5.44129 5.31607 6.20435 5 7 5H17C17.7956 5 18.5587 5.31607 19.1213 5.87868C19.6839 6.44129 20 7.20435 20 8V14C20 14.7956 19.6839 15.5587 19.1213 16.1213C18.5587 16.6839 17.7956 17 17 17H15L12 20Z"
									stroke="#2DD4BF"
									stroke-width="1.5"
									stroke-linecap="round"
									stroke-linejoin="round"
									/>
									<path
									d="M8 9H16"
									stroke="#2DD4BF"
									stroke-width="1.5"
									stroke-linecap="round"
									stroke-linejoin="round"
									/>
									<path
									d="M8 13H14"
									stroke="#2DD4BF"
									stroke-width="1.5"
									stroke-linecap="round"
									stroke-linejoin="round"
									/>
								</svg>
								</div>
								<p class="text-sm font-medium pl-5">
								New message from
								<span class="text-blue-500">@kelly190</span>
								</p>
							</div>
							</div>
							<div
							class="mt-4 flex bg-white shadow items-center w-full justify-between rounded py-2 pl-2 pr-4"
							>
							<div class="flex items-center">
								<div class="py-3 px-3 bg-gray-100 rounded-sm">
								<svg
									class="text-gray-400"
									xmlns="http://www.w3.org/2000/svg"
									width="24"
									height="24"
									viewBox="0 0 24 24"
									fill="none"
								>
									<path
									d="M14 3V7C14 7.26522 14.1054 7.51957 14.2929 7.70711C14.4804 7.89464 14.7348 8 15 8H19"
									stroke="currentColor"
									stroke-width="1.5"
									stroke-linecap="round"
									stroke-linejoin="round"
									/>
									<path
									d="M17 21H7C6.46957 21 5.96086 20.7893 5.58579 20.4142C5.21071 20.0391 5 19.5304 5 19V5C5 4.46957 5.21071 3.96086 5.58579 3.58579C5.96086 3.21071 6.46957 3 7 3H14L19 8V19C19 19.5304 18.7893 20.0391 18.4142 20.4142C18.0391 20.7893 17.5304 21 17 21Z"
									stroke="currentColor"
									stroke-width="1.5"
									stroke-linecap="round"
									stroke-linejoin="round"
									/>
									<path
									d="M12 11V17"
									stroke="currentColor"
									stroke-width="1.5"
									stroke-linecap="round"
									stroke-linejoin="round"
									/>
									<path
									d="M9 14L12 11L15 14"
									stroke="currentColor"
									stroke-width="1.5"
									stroke-linecap="round"
									stroke-linejoin="round"
									/>
								</svg>
								</div>
								<p class="pl-5 text-sm font-medium text-gray-600">
								New lead uploaded
								</p>
							</div>
							<p class="text-xs font-semibold text-gray-400">40 min</p>
							</div>
							<div
							class="flex mt-4 bg-white shadow items-center w-full justify-between rounded py-2 pl-2 pr-4"
							>
							<div class="flex items-center">
								<div class="py-3 px-3 bg-purple-100 rounded-sm">
								<svg
									xmlns="http://www.w3.org/2000/svg"
									width="24"
									height="24"
									viewBox="0 0 24 24"
									fill="none"
								>
									<path
									d="M9 21C10.1046 21 11 20.1046 11 19C11 17.8954 10.1046 17 9 17C7.89543 17 7 17.8954 7 19C7 20.1046 7.89543 21 9 21Z"
									stroke="#A78BFA"
									stroke-width="1.5"
									stroke-linecap="round"
									stroke-linejoin="round"
									/>
									<path
									d="M17 21C18.1046 21 19 20.1046 19 19C19 17.8954 18.1046 17 17 17C15.8954 17 15 17.8954 15 19C15 20.1046 15.8954 21 17 21Z"
									stroke="#A78BFA"
									stroke-width="1.5"
									stroke-linecap="round"
									stroke-linejoin="round"
									/>
									<path
									d="M3 3H5L7 15C7.21572 15.6135 7.62494 16.1402 8.16602 16.501C8.7071 16.8617 9.35075 17.0368 10 17H17C17.6493 17.0368 18.2929 16.8617 18.834 16.501C19.3751 16.1402 19.7843 15.6135 20 15L21 8H5.8"
									stroke="#A78BFA"
									stroke-width="1.5"
									stroke-linecap="round"
									stroke-linejoin="round"
									/>
								</svg>
								</div>
								<p class="pl-5 text-sm font-medium text-gray-600">
								Order# IDO-321-324
								</p>
							</div>
							<p class="text-xs font-semibold text-gray-400">$103</p>
							</div>
							<div
							class="flex mt-4 bg-white shadow items-center w-full justify-between rounded py-2 pl-2 pr-4"
							>
							<div class="flex items-center">
								<div class="py-3 px-3 bg-green-100 rounded-sm">
								<svg
									xmlns="http://www.w3.org/2000/svg"
									width="24"
									height="24"
									viewBox="0 0 24 24"
									fill="none"
								>
									<path
									d="M14 3V7C14 7.26522 14.1054 7.51957 14.2929 7.70711C14.4804 7.89464 14.7348 8 15 8H19"
									stroke="#4ADE80"
									stroke-width="1.5"
									stroke-linecap="round"
									stroke-linejoin="round"
									/>
									<path
									d="M17 21H7C6.46957 21 5.96086 20.7893 5.58579 20.4142C5.21071 20.0391 5 19.5304 5 19V5C5 4.46957 5.21071 3.96086 5.58579 3.58579C5.96086 3.21071 6.46957 3 7 3H14L19 8V19C19 19.5304 18.7893 20.0391 18.4142 20.4142C18.0391 20.7893 17.5304 21 17 21Z"
									stroke="#4ADE80"
									stroke-width="1.5"
									stroke-linecap="round"
									stroke-linejoin="round"
									/>
									<path
									d="M9 7H10"
									stroke="#4ADE80"
									stroke-width="1.5"
									stroke-linecap="round"
									stroke-linejoin="round"
									/>
									<path
									d="M9 13H15"
									stroke="#4ADE80"
									stroke-width="1.5"
									stroke-linecap="round"
									stroke-linejoin="round"
									/>
									<path
									d="M13 17H15"
									stroke="#4ADE80"
									stroke-width="1.5"
									stroke-linecap="round"
									stroke-linejoin="round"
									/>
								</svg>
								</div>
								<p class="pl-5 text-sm font-medium text-gray-600">
								Invoice generated
								</p>
							</div>
							<p class="text-xs text-blue-500">View</p>
							</div>
						</div>
						</div>
						<div
						class="xl:mt-7 md:mt-0 sm:mt-7 mt-7 lg:pl-0 md:pl-4 sm:pl-0 pl-0 md:w-full sm:w-1/2 w-full"
						>
						<p class="text-base font-semibold text-gray-800">
							Upcoming events
						</p>
						<div class="mt-4 bg-white rounded py-3 pl-4 pr-3">
							<div class="flex items-center justify-between">
							<div class="flex items-center">
								<div class="w-2 h-2 bg-purple-400 rounded-full"></div>
								<p class="ml-1 text-xs font-italic text-purple-400">
								11:30 AM
								</p>
							</div>
							<div class="relative">
								<button class="focus:outline-none">
								<svg
									@click="drop1 = !drop1"
									class="dropbtn"
									xmlns="http://www.w3.org/2000/svg"
									width="20"
									height="20"
									viewBox="0 0 20 20"
									fill="none"
								>
									<path
									d="M4.16668 10.8333C4.62691 10.8333 5.00001 10.4602 5.00001 10C5.00001 9.53976 4.62691 9.16666 4.16668 9.16666C3.70644 9.16666 3.33334 9.53976 3.33334 10C3.33334 10.4602 3.70644 10.8333 4.16668 10.8333Z"
									stroke="#6B7280"
									stroke-width="1.5"
									stroke-linecap="round"
									stroke-linejoin="round"
									/>
									<path
									d="M9.99999 10.8333C10.4602 10.8333 10.8333 10.4602 10.8333 10C10.8333 9.53976 10.4602 9.16666 9.99999 9.16666C9.53975 9.16666 9.16666 9.53976 9.16666 10C9.16666 10.4602 9.53975 10.8333 9.99999 10.8333Z"
									stroke="#6B7280"
									stroke-width="1.5"
									stroke-linecap="round"
									stroke-linejoin="round"
									/>
									<path
									d="M15.8333 10.8333C16.2936 10.8333 16.6667 10.4602 16.6667 10C16.6667 9.53976 16.2936 9.16666 15.8333 9.16666C15.3731 9.16666 15 9.53976 15 10C15 10.4602 15.3731 10.8333 15.8333 10.8333Z"
									stroke="#6B7280"
									stroke-width="1.5"
									stroke-linecap="round"
									stroke-linejoin="round"
									/>
								</svg>
								</button>
								<div
								v-if="drop1"
								class="dropdown-content bg-white shadow w-24 absolute z-30 -ml-16 xl:-ml-20 2xl:-ml-20"
								>
								<div
									class="text-xs w-full hover:bg-indigo-700 py-4 px-4 cursor-pointer hover:text-white"
								>
									<p>Edit</p>
								</div>
								<div
									class="text-xs w-full hover:bg-indigo-700 py-4 px-4 cursor-pointer hover:text-white"
								>
									<p>Delete</p>
								</div>
								</div>
							</div>
							</div>
							<div class="mt-2">
							<p class="text-sm text-gray-600">
								Meeting with stake holders
							</p>
							<p class="text-xs italic font-italic text-gray-400">
								Discussion on the template design
							</p>
							</div>
						</div>
						<div class="mt-4 bg-white rounded py-3 pl-4 pr-3">
							<div class="flex items-center justify-between">
							<div class="flex items-center">
								<div class="w-2 h-2 bg-red-400 rounded-full"></div>
								<p class="ml-1 text-xs text-red-400">02:30 PM</p>
							</div>
							<div class="relative">
								<button class="focus:outline-none">
								<svg
									@click="drop2 = !drop2"
									class="dropbtn"
									xmlns="http://www.w3.org/2000/svg"
									width="20"
									height="20"
									viewBox="0 0 20 20"
									fill="none"
								>
									<path
									d="M4.16668 10.8333C4.62691 10.8333 5.00001 10.4602 5.00001 10C5.00001 9.53976 4.62691 9.16666 4.16668 9.16666C3.70644 9.16666 3.33334 9.53976 3.33334 10C3.33334 10.4602 3.70644 10.8333 4.16668 10.8333Z"
									stroke="#6B7280"
									stroke-width="1.5"
									stroke-linecap="round"
									stroke-linejoin="round"
									/>
									<path
									d="M9.99999 10.8333C10.4602 10.8333 10.8333 10.4602 10.8333 10C10.8333 9.53976 10.4602 9.16666 9.99999 9.16666C9.53975 9.16666 9.16666 9.53976 9.16666 10C9.16666 10.4602 9.53975 10.8333 9.99999 10.8333Z"
									stroke="#6B7280"
									stroke-width="1.5"
									stroke-linecap="round"
									stroke-linejoin="round"
									/>
									<path
									d="M15.8333 10.8333C16.2936 10.8333 16.6667 10.4602 16.6667 10C16.6667 9.53976 16.2936 9.16666 15.8333 9.16666C15.3731 9.16666 15 9.53976 15 10C15 10.4602 15.3731 10.8333 15.8333 10.8333Z"
									stroke="#6B7280"
									stroke-width="1.5"
									stroke-linecap="round"
									stroke-linejoin="round"
									/>
								</svg>
								</button>
								<div
								v-if="drop2"
								class="dropdown-content bg-white shadow w-24 absolute z-30 -ml-16 xl:-ml-20 2xl:-ml-20"
								>
								<div
									class="text-xs w-full hover:bg-indigo-700 py-4 px-4 cursor-pointer hover:text-white"
								>
									<p>Edit</p>
								</div>
								<div
									class="text-xs w-full hover:bg-indigo-700 py-4 px-4 cursor-pointer hover:text-white"
								>
									<p>Delete</p>
								</div>
								</div>
							</div>
							</div>
							<div class="mt-2">
							<p class="text-sm text-gray-600">
								Office interior discussion
							</p>
							<p class="text-xs text-gray-400">
								What to add and what not to add
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