<template>
    <jet-action-section class="mt-10 sm:mt-0">
        <template #title>
            Manage Project Categories
        </template>

        <template #description>
            These are your added project categories. Edit or delete them as you want.
        </template>

        <!-- Pending Team Member Invitation List -->
        <template #content>
            <div class="space-y-6" v-if="project_categories.length != 0">
                <div class="flex items-center justify-between" v-for="(category, key) in project_categories" :key="key">
                    <div class="text-gray-600">{{ category.name }}</div>
                    <div class="flex items-center">
                        <!-- Edit Project Category -->
                        <inertia-link :href="route('project_categories.edit', category.id)" class="cursor-pointer ml-6 text-sm text-gray-500">
                            Edit
                        </inertia-link>
                        <!-- Delet Project Category -->
                        <button class="cursor-pointer ml-6 text-sm text-red-500 focus:outline-none"
                            @click="deleteCategory(category)">
                            Delete Category
                        </button>
                    </div>
                </div>
            </div>
            <div v-else>
                <p>
                    You don't have any project categories yet!
                </p>
            </div>
        </template>
    </jet-action-section>
</template>

<script>
    import JetActionSection from '@/Jetstream/ActionSection'

    export default {
        props: ['project_categories'],

        components: {
            JetActionSection
        },

        methods: {
            deleteCategory(category) {
                this.$inertia.delete(route('project_categories.destroy', category), {
                    preserveScroll: true
                });
            },
        }
    }
</script>