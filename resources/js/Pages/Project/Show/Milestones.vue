<template>
    <app-layout>
        <alerts :flash="$page.props.flash" />

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Milestones
            </h2>
        </template>

        <div class="py-12 container mx-auto py-6">
            <project-details :project="project" />

            <div class="mt-5">
                <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 rounded h-100 shadow">
				    <div class="rounded-t mb-0 px-4 py-3 border-0">
					    <div class="flex flex-wrap items-center">
						    <div class="relative w-full px-2 max-w-full flex-grow flex-1">
							    <h3 class="font-normal text-base text-gray-700">
								    Milestones List
								</h3>
							</div>
							<div class="text-right">
							    <inertia-link :href="route('projects.create.milestones', project.unique_id)" type="button" as="button" class="text-gray-600 dark:text-gray-400 mr-2 p-1 border-transparent border bg-gray-100 dark:hover:bg-gray-600 dark:bg-gray-700 hover:bg-gray-200 cursor-pointer rounded focus:outline-none focus:border-gray-800 focus:shadow-outline-gray">
								    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="12" height="12" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
									    <path stroke="none" d="M0 0h24v24H0z" />
										<line x1="12" y1="5" x2="12" y2="19" />
										<line x1="5" y1="12" x2="19" y2="12" />
									</svg>
								</inertia-link>
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
									    Order By
									</th>
                                    <th class="px-6 bg-gray-50 text-gray-500 align-middle border border-solid border-gray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
									    All Tasks
									</th>
                                    <th class="px-6 bg-gray-50 text-gray-500 align-middle border border-solid border-gray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
									    Pending Tasks
									</th>
                                    <th class="px-6 bg-gray-50 text-gray-500 align-middle border border-solid border-gray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
									    Completed Tasks
									</th>
									<th class="px-6 bg-gray-50 text-gray-500 align-middle border border-solid border-gray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
									    Actions
									</th>
                                </tr>
                            </thead>
							<tbody>
							    <tr v-for="(milestone, key) in milestones.data" :key="key" class="cursor-pointer hover:bg-gray-100">
									<td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-base whitespace-nowrap p-4">
									    <p>{{ milestone.name }}</p>
									</td>
									<td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
									    <p class="font-medium">{{ milestone.order_by }}</p>
									</td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
									    <p class="font-medium">0</p>
									</td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
									    <p class="font-medium">0</p>
									</td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
									    <p class="font-medium">0</p>
									</td>
									<td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
										<div class="flex items-center">
											<inertia-link :href="route('projects.edit.milestones', { project: project.unique_id, project_milestone: milestone.unique_id })" class="cursor-pointer text-sm text-gray-500">
												<svg xmlns="http://www.w3.org/2000/svg" height="24" width="24" fill="none" viewBox="0 0 24 24" stroke="currentColor">
												<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
												</svg>
											</inertia-link>
											<button @click="deleteMilestone(milestone.unique_id)" class="cursor-pointer ml-6 text-sm text-red-500 focus:outline-none">
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
						<div v-if="milestones.data.length == 0" class="py-4">
							<p class="text-leading text-sm text-gray-400 text-center">
								There's no milestones added yet!
							</p>
						</div>
					</div>
                </div>
                <pagination class="my-5" :links="milestones.links" />
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import ProjectDetails from './ProjectDetails'
	import Pagination from '@/Jetstream/Pagination'

    export default {
        props: ['project', 'milestones'],

        components: {
            AppLayout,
            ProjectDetails,
			Pagination
        },

		methods: {
			deleteMilestone (milestone) {
                this.$inertia.delete(route('projects.destroy.milestones', milestone), {
                    preserveScroll: true
                });
            },
		}
    }
</script>