<template>
    <jet-form-section @submitted="createNewProject">
        <template #title>
            Project Information
        </template>

        <template #description>
            Create a new project for your team or specific members of your company. 
        </template>

        <template #form>
            <!-- Name -->
            <div class="col-span-6 sm:col-span-4">
                <h1 class="text-base mb-4">General Information</h1>                                    

                <jet-label for="name" value="Name" />
                <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" autofocus />
                <jet-input-error :message="form.errors.name" class="mt-2" />
            </div>

            <!-- Category -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="category_id" value="Project Category" />
                <select class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" v-model="form.category_id">
                    <option value="">Select project category</option>
                    <option v-for="(category, key) in project_categories" :key="key" :value="category.id">
                        {{ category.name }}
                    </option>
                </select>
            </div>

            <!-- Bio -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="description" value="Description" />
                <jet-textarea id="description" class="mt-1 block w-full" v-model="form.description" />
                <jet-input-error :message="form.errors.description" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <div class="block">
                    <label class="flex items-center">
                        <jet-checkbox name="unscheduled" v-model:checked="form.unscheduled" />
                        <span class="ml-4 text-sm text-gray-600">No Schedule</span>
                    </label>
                </div>
            </div>

            <!-- Timeline -->

            <!-- Start Date -->
            <template v-if="!form.unscheduled">
                <div class="col-span-6 sm:col-span-4">
                    <h1 class="text-base mb-4">Project Timeline</h1>         

                    <jet-label for="start_date" value="Start Date" />
                    <jet-input id="start_date" type="date" class="mt-1 block w-full" v-model="form.start_date" autofocus />
                    <jet-input-error :message="form.errors.start_date" class="mt-2" />
                </div>

                <!-- End Date -->
                <div class="col-span-6 sm:col-span-4">
                    <jet-label for="end_date" value="End Date" />
                    <jet-input id="end_date" type="date" class="mt-1 block w-full" v-model="form.end_date" autofocus />
                    <jet-input-error :message="form.errors.end_date" class="mt-2" />
                </div>
            </template>

            <template v-else>
                <div class="col-span-6 sm:col-span-4">
                    <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
                        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                        <p>Unscheduled Project</p>
                    </div>
                </div>
            </template>

            <!-- Note -->
            <div v-if="!form.unscheduled" class="col-span-6 sm:col-span-4">
                <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                    <p>You can change due dates at any time.</p>
                </div>
            </div>
        </template>

        <template #actions>
            <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                Saved.
            </jet-action-message>

            <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save New Project
            </jet-button>
        </template>
    </jet-form-section>
</template>

<script>
    import JetButton from '@/Jetstream/Button'
    import JetFormSection from '@/Jetstream/FormSection'
    import JetInput from '@/Jetstream/Input'
    import JetInputError from '@/Jetstream/InputError'
    import JetTextarea from '@/Jetstream/Textarea'
    import JetLabel from '@/Jetstream/Label'
    import JetActionMessage from '@/Jetstream/ActionMessage'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton'
    import JetCheckbox from '@/Jetstream/Checkbox'

    export default {
        props: ['project_categories'],

        components: {
            JetActionMessage,
            JetButton,
            JetFormSection,
            JetInput,
            JetInputError,
            JetTextarea,
            JetLabel,
            JetSecondaryButton,
            JetCheckbox
        },

        data () {
            return {
                form: this.$inertia.form({
                    name: '',
                    description: '',
                    category_id: '',
                    start_date: '',
                    end_date: '',
                    unscheduled: false
                }),
            }
        },

        methods: {
            createNewProject () {
                this.form.post(route('projects.store'), {
                    errorBag: 'createNewProject',
                    preserveScroll: true
                })
            }
        }
    }
</script>