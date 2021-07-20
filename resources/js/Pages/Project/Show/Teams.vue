<template>
    <app-layout>
        <alerts :flash="$page.props.flash" />

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Teams
            </h2>
        </template>

        <div>
            <project-details :project="project" />

            <div class="mt-5">
                <div class="">
                    <div class="flex flex-wrap">
                        <div class="md:w-2/5 w-full pb-6 md:pb-0 md:pr-6">
                            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 rounded h-100 shadow">
								<div class="rounded-t mb-0 px-4 py-3 border-0">
									<div class="flex flex-wrap items-center">
										<div class="relative w-full px-2 max-w-full flex-grow flex-1">
											<h3 class="font-normal text-base text-gray-700">
												Teams List
											</h3>
										</div>
										<div class="text-right">
											<inertia-link :href="route('projects.create.teams', project.unique_id)" type="button" as="button" class="text-gray-600 dark:text-gray-400 mr-2 p-1 border-transparent border bg-gray-100 dark:hover:bg-gray-600 dark:bg-gray-700 hover:bg-gray-200 cursor-pointer rounded focus:outline-none focus:border-gray-800 focus:shadow-outline-gray">
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
													Team
												</th>
												<th class="px-6 bg-gray-50 text-gray-500 align-middle border border-solid border-gray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
													Members
												</th>
											</tr>
										</thead>
										<tbody>
											<tr v-for="(project_team, key) in project_teams.data" :key="key" class="cursor-pointer hover:bg-gray-100">
												<td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
													<p class="text-base font-semibold text-gray-800">
														{{ project_team.team.name }}
													</p>
													<div class="w-3/4 flex sm:flex-row md:flex-col flex-col lg:flex-row justify-start lg:items-center sm:items-start items-start">
														<p class="text-xs text-gray-600">
															Open tasks: 32
														</p>
														<p class="ml-1 rounded-full w-1 h-1 bg-gray-300 font-bold text-center"></p>
														<p class="ml-1 text-xs text-gray-600">Members: {{ project_team.member_count }}</p>
													</div>
												</td>
												<td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
													<div class="flex -space-x-1 overflow-hidden mt-2">
														<img v-for="(member, key) in project_team.members" :key="key" class="inline-block h-8 w-8 rounded-full ring-2 ring-white object-cover" :src="member.profile_photo_url" :alt="member.name" :title="member.name">
													</div>
												</td>
											</tr>
										</tbody>
									</table>
									<div v-if="project_teams.data.length == 0" class="py-4">
										<p class="text-leading text-sm text-gray-400 text-center">
											There's no teams associated yet!
										</p>
									</div>
								</div>
                        	</div>
                        	<pagination class="my-5" :links="project_teams.links" />
                        </div>
                        <div class="md:w-3/5 w-full">
							<div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 rounded h-100 shadow">
								<div class="rounded-t mb-0 px-4 py-3 border-0">
									<div class="flex flex-wrap items-center">
										<div class="relative w-full px-2 max-w-full flex-grow flex-1">
											<h3 class="font-normal text-base text-gray-700">
												Members List
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
													Member
												</th>
												<th class="px-6 bg-gray-50 text-gray-500 align-middle border border-solid border-gray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
													Team
												</th>
												<th class="px-6 bg-gray-50 text-gray-500 align-middle border border-solid border-gray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
													Closed Tasks
												</th>
												<th class="px-6 bg-gray-50 text-gray-500 align-middle border border-solid border-gray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
													Open Tasks
												</th>
												<th class="px-6 bg-gray-50 text-gray-500 align-middle border border-solid border-gray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
													Status
												</th>
											</tr>
										</thead>
										<tbody>
											<tr v-for="(member, key) in members" :key="key" class="cursor-pointer hover:bg-gray-100">
												<td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
													<div class="flex items-center">
														<div class="h-8 w-8 mr-2">
															<img :src="member.profile_photo_url" :alt="member.name" :title="member.name" class="h-full w-full object-cover rounded-full overflow-hidden shadow" />
														</div>
														<div>
															<p class="text-gray-800 dark:text-gray-100 tracking-normal leading-4 text-sm">
																{{ member.name }}
															</p>
															<span class="text-xs text-gray-400">
																{{ member.position ?? "N/A" }}
															</span>
														</div>
													</div>
												</td>
												<td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
													<p class="font-medium">{{ member.team.name }}</p>
												</td>
												<td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
													<p class="font-medium">1 Task (s)</p>
												</td>
												<td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
													<p class="font-medium">5 Task (s)</p>
												</td>
												<td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
													<button v-if="member.status == 'Active'" class="focus:outline-none bg-green-400 text-white xl:px-5 lg:px-5 md:px-5 sm:px-5 px-4 py-1 rounded-full text-xs mt-2 xl:mt-0 lg:mt-0">
														{{ member.status }}
													</button>

													<button v-else class="focus:outline-none bg-red-400 text-white xl:px-5 lg:px-5 md:px-5 sm:px-5 px-4 py-1 rounded-full text-xs mt-2 xl:mt-0 lg:mt-0">
														{{ member.status }}
													</button>
												</td>
											</tr>
										</tbody>
									</table>
									<div v-if="members.length == 0" class="py-4">
										<p class="text-leading text-sm text-gray-400 text-center">
											There's no teams associated yet!
										</p>
									</div>
								</div>
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
    import ProjectDetails from './ProjectDetails'
    import $ from 'jquery'

    export default {
        props: ['project', 'project_teams', 'project_teams_count', 'members'],

        components: {
            AppLayout,
            ProjectDetails
        },

        mounted() {
            $(document).ready(function () {
                $("#notification-btn").click(function () {
                    $("#notification-modal").toggle();
                });
                $("#member-btn").click(function () {
                    $("#member-modal").fadeIn();
                });
                $(".close-member,.cancel-member").click(function () {
                    $("#member-modal").fadeOut();
                });
                $("#team-btn").click(function () {
                    $("#team-modal").fadeIn();
                });
                $(".close-team,.cancel-team").click(function () {
                    $("#team-modal").fadeOut();
                });
                $(".member-show").mouseenter(function () {
                    $(this).find(".tooltips").show();
                });
                $(".tooltips").hide();
                $(".member-show").mouseleave(function () {
                    $(this).find(".tooltips").hide();
                });
            });
        },
    }
</script>