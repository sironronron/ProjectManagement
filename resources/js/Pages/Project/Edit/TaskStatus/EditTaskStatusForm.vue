<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Tasks Status
            </h2>
        </template>

        <div>
            <alerts :flash="$page.props.flash" />
            
            <project-details :project="project" />
        
            <div class="mt-5">
                <!--  -->
                <jet-form-section @submitted="updateTaskStatus">
                    <template #title>
                        Update Tasks Status
                    </template>

                    <template #description>
                        Update your tasks status description to better improve your tasks tracking.
                    </template>

                    <template #form>
                        <!--  -->
                        <div class="col-span-6 sm:col-span-4">
                            <h1 class="text-base font-semibold mb-4">General Information</h1>

                            <jet-label for="name" value="Name" />
                            <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" />
                            <jet-input-error :message="form.errors.name" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <jet-label for="order_by" value="Order" />
                            <jet-input id="order_by" type="number" class="mt-1 block w-full" v-model="form.order_by" />
                            <jet-input-error  :message="form.errors.order_by" class="mt-2" />
                        </div>
                    </template>

                    <template #actions>
                        <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                            Saved.
                        </jet-action-message>

                        <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Update Task Status
                        </jet-button>
                    </template>
                </jet-form-section>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Alerts from '@/Jetstream/Alerts'
    import ProjectDetails from '../../Show/ProjectDetails'
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
        props: ['project', 'project_task_status'],

        components: {
            AppLayout,
            Alerts,
            ProjectDetails,
            JetButton,
            JetFormSection,
            JetInput,
            JetInputError,
            JetTextarea,
            JetLabel,
            JetActionMessage,
            JetSecondaryButton,
            JetCheckbox
        },

        data () {
            return {
                form: this.$inertia.form({
                    name: this.project_task_status.name,
                    order_by: this.project_task_status.order_by
                })
            }
        },

        methods: {
            updateTaskStatus () {
                this.form.put(route('projects.update.task_status', { project: this.project.unique_id, project_task_status: this.project_task_status.id }), {
                    _method: 'PUT',
                    errorBag: 'updateTaskStatus',
                    preserveScroll: true
                })
            }
        }
    }
</script>