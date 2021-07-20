<template>
	<jet-action-section class="mt-10 sm:mt-0">
		<template #title>
			Manage Project Task Statuses
		</template>

		<template #description>
			These are your added project task statuses. Edit or delete them as you want.
		</template>

		<template #content>
			<div class="space-y-6" v-if="project_statuses.length != 0">
				<div v-for="(status, key) in project_statuses" :key="key" class="flex items-center justify-between">
					<div class="text-gray-600">{{ status.name }}</div>
					<div class="flex items-center">
						<inertia-link :href="route('projects.edit.task_status', { project: status.project_id, project_task_status: status.id })" class="cursor-pointer ml-6 text-sm text-gray-500">
							Edit
						</inertia-link>
						<!-- Delet Project Category -->
                        <button class="cursor-pointer ml-6 text-sm text-red-500 focus:outline-none"
                            @click="deleteStatus(status)">
                            Delete Status
                        </button>
					</div>
				</div>
			</div>
			<div v-else>
				<p>
					There's no project statuses yet!
				</p>
			</div>
		</template>
	</jet-action-section>
</template>

<script>
	import JetActionSection from '@/Jetstream/ActionSection'

	export default {
		props: ['project_statuses'],

		components: {
			JetActionSection
		},

		methods: {
			deleteStatus (status) {
				console.log(status)
				this.$inertia.delete(route('projects.delete.task_status', status), {
					preserveScroll: true
				})
			}
		}
	}
</script>
