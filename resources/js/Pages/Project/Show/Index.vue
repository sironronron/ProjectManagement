<template>
    <app-layout>
        <alerts :flash="$page.props.flash" />

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Overview
            </h2>
        </template>

        <div class="py-12 container mx-auto py-6">
            <project-details :project="project" />
			
            <div class="mt-5">
                <div>
                    <div class="xl:flex flex-wrap">
                        <div class="xl:w-3/4 2xl:w-4/5">
							<div class="flex flex-wrap mb-6">
								<div class="w-full">
									<div class="flex flex-col lg:flex-row mx-auto w-full bg-white shadow rounded">
										<div class="w-full lg:w-1/3 p-6">
											<div class="flex items-center">
												<div class="w-12 h-12 rounded shadow">
													<img v-if="project.client.company_photo != 'client_default.png'"
														class="w-full h-full overflow-hidden object-cover rounded"
														:src="project.client.company_photo"
														:alt="project.client.company_name"
													/>
													<img v-else
														class="w-full h-full overflow-hidden object-cover rounded"
														src="https://cdn.tuk.dev/assets/templates/olympus/projects.png"
														:alt="project.client.company_name"
													/>
												</div>
												<div class="ml-3">
													<h5 class="text-gray-800 font-medium text-base">
														{{ project.client.company_name }}
													</h5>
													<p class="text-gray-600 text-xs font-normal">
														{{ project.client.address }}
													</p>
												</div>
											</div>
											<h3 class="text-lg text-gray-800 mt-5 mb-4">
												{{ project.name }}
											</h3>
											<div v-if="project.description.length < 250" class="text-gray-600 text-sm font-normal" v-html="project.description"></div>
											<div v-else class="text-gray-600 text-sm font-normal" v-html="project.description.substring(0, 250) + '...'"></div>
											<div class="hover-modal flex items-center mt-6 w-full">
												<div class="shadow border-2 border-white rounded-full w-8 h-8">
													<img
														class="w-full h-full overflow-hidden object-cover rounded-full"
														src="https://cdn.tuk.dev/assets/templates/Project+Management/pm_5.png"
														alt="avatar"
													/>
												</div>
												<div class="-ml-2 shadow border-2 border-white rounded-full w-8 h-8">
													<img
														class="w-full h-full overflow-hidden object-cover rounded-full"
														src="https://cdn.tuk.dev/assets/templates/Project+Management/pm_6.png"
														alt="avatar"
													/>
												</div>
												<div class="-ml-2 shadow border-2 border-white rounded-full w-8 h-8">
													<img
														class="w-full h-full overflow-hidden object-cover rounded-full"
														src="https://cdn.tuk.dev/assets/templates/Project+Management/pm_7.png"
														alt="avatar"
													/>
												</div>
												<div class="-ml-2 shadow border-2 border-white rounded-full w-8 h-8">
													<img
														class="w-full h-full overflow-hidden object-cover rounded-full"
														src="https://cdn.tuk.dev/assets/templates/Project+Management/pm_9.png"
														alt="avatar"
													/>
												</div>
												<div class="-ml-2 shadow border-2 border-white rounded-full w-8 h-8">
													<img
														class="w-full h-full overflow-hidden object-cover rounded-full"
														src="https://cdn.tuk.dev/assets/templates/Project+Management/pm_8.png"
														alt="avatar"
													/>
												</div>
												<p class="text-gray-600 text-sm font-normal ml-2">
													+2 more participants
												</p>
											</div>
										</div>
										<div class="w-full lg:w-1/3 p-6 border-t border-b lg:border-t-0 lg:border-b-0 sm:border-l sm:border-r border-gray-300">
											<div class="flex flex-col lg:flex-row items-start lg:items-center justify-between">
												<div class="text-xs text-center w-full bg-indigo-100 text-indigo-700 rounded font-medium p-3 lg:mr-3">
													Start Date: {{ project.start_date }}
												</div>
												<div class="mt-4 text-center w-full lg:mt-0 text-xs bg-red-200 text-red-500 rounded font-medium p-3">
													End Date: {{ project.end_date }}
												</div>
											</div>
											<div class="mt-6 mb-8 w-full relative">
												<ul>
													<li class="text-xs text-gray-600 font-normal tracking-normal">
														<span class="font-semibold">
															Assigned To:
														</span>
														<div class="flex items-center mt-2">
															<div class="h-10 w-10">
																<img :src="project.assigned_to.profile_photo_url" :alt="project.assigned_to.name" class="h-full w-full object-cover rounded-full overflow-hidden shadow">
															</div>
															<div class="pl-2">
																<p class="ml-2 text-gray-800 dark:text-gray-100 tracking-normal leading-4 text-sm">{{ project.assigned_to.name }}</p>
															</div>
														</div>
													</li>
													<li class="text-xs text-gray-600 font-normal tracking-normal my-4">
														<span class="font-semibold">
															Project Manager:
														</span>
														<div class="flex items-center mt-2">
															<div class="h-10 w-10">
																<img :src="project.project_manager.profile_photo_url" :alt="project.project_manager.name" class="h-full w-full object-cover rounded-full overflow-hidden shadow">
															</div>
															<div class="pl-2">
																<p class="ml-2 text-gray-800 dark:text-gray-100 tracking-normal leading-4 text-sm">{{ project.project_manager.name }}</p>
															</div>
														</div>
													</li>
												</ul>
											</div>
											<div class="flex items-center justify-between">
												<div class="cursor-pointer">
													<h2 class="text-gray-600 font-bold text-lg leading-6 mb-1 text-center">
														{{ project_milestones_count }}
													</h2>
													<p class="text-gray-800 text-sm leading-5 text-center">
														Milestones
													</p>
												</div>
												<div class="cursor-pointer">
													<h2 class="text-gray-600 font-bold text-lg leading-6 mb-1 text-center">
														{{ project_teams_count }}
													</h2>
													<p class="text-gray-800 text-sm leading-5 text-center">
														Teams Assigned
													</p>
												</div>
												<div class="cursor-pointer">
													<h2 class="text-gray-600 font-bold text-lg leading-6 mb-1 text-center">
														14
													</h2>
													<p class="text-gray-800 text-sm leading-5 text-center">
														Tasks Pending
													</p>
												</div>
											</div>
										</div>
										<div class="w-full lg:w-1/3 p-6">
											<div class="flex flex-wrap -mx-4 overflow-hidden mb-4">
												<div class="my-4 px-4 w-1/2 overflow-hidden sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2">
													<p class="text-sm text-gray-800 font-normal mb-1 tracking-normal">
														Billing Type
													</p>
													<h2 class="text-sm xl:text-lg text-gray-600 font-bold tracking-normal">
														{{ billing_rate }} 
													</h2>
												</div>

												<div class="my-4 px-4 w-1/2 overflow-hidden sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2">
													<p class="text-sm text-gray-800 font-normal mb-1 tracking-normal">
														Rate
													</p>
													<h2 class="text-sm xl:text-lg text-gray-600 font-bold tracking-normal">
														{{ billing }} 
													</h2>
												</div>
											</div>
											<div class="flex flex-wrap -mx-4 overflow-hidden mb-4">
												<div class="my-4 px-4 w-1/2 overflow-hidden sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2">
													<p class="text-sm text-gray-800 font-normal mb-1 tracking-normal">
														Budget
													</p>
													<h2 class="text-sm xl:text-lg text-gray-600 font-bold tracking-normal">
														{{ budget }} 
													</h2>
												</div>

												<div class="my-4 px-4 w-1/2 overflow-hidden sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2">
													<p class="text-sm text-gray-800 font-normal mb-1 tracking-normal">
														Remaining Budget
													</p>
													<h2 class="text-sm xl:text-lg text-gray-600 font-bold tracking-normal">
														{{ remaining_budget }} 
													</h2>
												</div>
											</div>
											<div class="flex flex-wrap -mx-4 overflow-hidden">
												<div class="my-4 px-4 w-1/2 overflow-hidden sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2">
													<p class="text-sm text-gray-800 font-normal mb-1 tracking-normal">
														Estimated Hours
													</p>
													<h2 class="text-sm xl:text-lg text-gray-600 font-bold tracking-normal">
														{{ project.estimated_hours }} Hours
													</h2>
												</div>

												<div class="my-4 px-4 w-1/2 overflow-hidden sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2">
													<p class="text-sm text-gray-800 font-normal mb-1 tracking-normal">
														Time Spent
													</p>
													<h2 class="text-sm xl:text-lg text-gray-600 font-bold tracking-normal">
														0 Hrs 30 Mins
													</h2>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
                          	<div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 rounded h-100 shadow">
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

													<inertia-link v-if="activity.link != null" :href="activity.link" class="text-indigo-500">{{ activity.link_title }}</inertia-link>
													<span v-else class="text-indigo-500">{{ activity.link_title }}</span>
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
						<div class="xl:w-1/4 2xl:w-1/5 xl:pl-8 pb-7">
							<div class="px-4 md:px-10 lg:px-0">
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
							<div class="sm:mt-8 mt-4 px-4 md:px-10 lg:px-0">
							<p class="text-base font-semibold leading-none text-gray-800">
								Clients Added
							</p>
								<div v-for="(client, key) in clients" :key="key" class="flex items-center mt-5">
									<div class="w-8 h-8 rounded-full flex items-center shadow justify-center">
										<img :src="client.user.profile_photo_url" :alt="client.user.name" />
									</div>
									<p class="text-sm leading-none text-gray-800 ml-2">
										{{ client.user.name }}
									</p>
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
	import Pagination from '@/Jetstream/Pagination'
    import $ from 'jquery'

    export default {
        props: ['project', 'billing', 'billing_rate', 'budget', 'remaining_budget', 'recent_activities', 'clients', 'project_teams_count', 'project_milestones_count'],

        components: {
            AppLayout,
            ProjectDetails,
			Pagination
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

			$(function () {
			$("td[colspan=10]").find("div").hide();
			$(".arrow-show").click(function (event) {
				event.stopPropagation();
				var $target = $(event.target);
				if ($target.closest("td").attr("colspan") > 10) {
				$target.slideUp();
				} else {
				$target.closest("tr").next().find("div").slideToggle();
				}
			});
			});
        },

		methods: {
			tableInteract(element) {
				if (element.checked) {
					$(element).parentsUntil("tbody").addClass("bg-gray-100");
				} else {
					$(element).parentsUntil("tbody").removeClass("bg-gray-100");
				}
			},
			WeeklyFilter(text) {
				$("#weekFilter").html(text);
			},
			ListFilterFunction(percentage, tasks, innerText) {
				$("#filter-value").html(innerText);
				$("#pie-percent").html(percentage);
				$("#completed-task").html(tasks);
			},
			// Avatar Dropdown
			dropdownHandler() {
				this.menu = !this.menu;
			},
			//Hamburger and mobile menu
			MenuHandler() {
				this.mobileMenu = !this.mobileMenu;
			},
		},
    }
</script>