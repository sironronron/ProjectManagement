<template>
    <app-layout>
        <alerts :flash="$page.props.flash" />

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Invite New Team
            </h2>
        </template>

        <div class="py-12 container mx-auto py-6 ">
            <project-details :project="project" :billing="billing" :billing_rate="billing_rate" :budget="budget" :remaining_budget="remaining_budget" :project_teams_count="project_teams_count" />

            <div class="mt-5">
                <!--  -->
                <jet-form-section @submitted="inviteNewTeam">
                    <template #title>
                        Invite New Team
                    </template>

                    <template #description>
                        Add a new team to this project to collaborate with!
                    </template>

                    <template #form>
                        <!-- Team ID -->
                        <div class="col-span-6 sm:col-span-4">
                            <jet-label for="team" value="Team" />
                            <select class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" v-model="form.team_id">
                                <option disabled>Select Team</option>
                                <option v-for="(team, key) in teams" :key="key" :value="team.id">
                                    {{ team.name }}
                                </option>
                            </select>
                            <jet-input-error :message="form.errors.team_id" class="mt-2" />
                        </div>
                    </template>

                    <template #actions>
                        <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                            Saved.
                        </jet-action-message>

                        <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            INVITE TEAM
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
        props: ['project', 'billing', 'billing_rate', 'budget', 'remaining_budget', 'teams', 'project_teams', 'project_teams_count'],

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
                    team_id: '',
                    project_id: this.project.unique_id
                })
            }
        },

        methods: {
            inviteNewTeam() {
                this.form.post(route('projects.store.teams'), {
                    errorBag: 'inviteNewTeam',
                    preserveScroll: true
                })
            }
        }
    }
</script>