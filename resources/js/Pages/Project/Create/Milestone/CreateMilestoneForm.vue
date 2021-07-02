<template>
    <app-layout>
        <alerts :flash="$page.props.flash" />

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create New Milestone
            </h2>
        </template>

        <div class="py-12 container mx-auto py-6 ">
            <project-details :project="project" />

            <div class="mt-5">
                <!--  -->
                <jet-form-section @submitted="createNewMilestone">
                    <template #title>
                        Create New Milestone
                    </template>

                    <template #description>
                        Creating a milestone for your task will help you monitor your progress in a project!
                    </template>

                    <template #form>
                        <!-- Team ID -->
                        <div class="col-span-6 sm:col-span-4">
                            <jet-label for="name" value="Name" />
                            <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" />
                            <jet-input-error :message="form.errors.name" class="mt-2" />
                        </div>
                    </template>

                    <template #actions>
                        <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                            Saved.
                        </jet-action-message>

                        <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Save new milestone
                        </jet-button>
                    </template>
                </jet-form-section>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
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
        props: ['project'],

        components: {
            AppLayout,
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
                    name: '',
                    project_id: this.project.unique_id
                })
            }
        },

        methods: {
            createNewMilestone () {
                this.form.post(route('projects.store.milestones'), {
                    errorBag: 'createNewMilestone',
                    preserveScroll: true
                })
            }
        }
    }
</script>