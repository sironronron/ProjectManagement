<template>
    <jet-action-section class="mt-10 sm:mt-0">
        <template #title>
            Manage Client Categories
        </template>

        <template #description>
            These are your added client categories. Edit or delete them as you want.
        </template>

        <!-- Pending Team Member Invitation List -->
        <template #content>
            <div class="space-y-6" v-if="categories.length != 0">
                <div class="flex items-center justify-between" v-for="(category, key) in categories" :key="key">
                    <div class="text-gray-600">{{ category.name }}</div>
                    <div class="flex items-center">
                        <!-- Edit Project Category -->
                        <inertia-link :href="route('clients.categories.edit', category.unique_id)" class="cursor-pointer ml-6 text-sm text-gray-500">
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
                    You don't have any client categories yet!
                </p>
            </div>
        </template>
    </jet-action-section>
</template>

<script>
    import JetActionSection from '@/Jetstream/ActionSection'

    export default {
        props: ['categories'],

        components: {
            JetActionSection
        },

        methods: {
            deleteCategory(category) {
                this.$inertia.delete(route('clients.categories.destroy', category), {
                    preserveScroll: true
                });
            },
        }
    }
</script>