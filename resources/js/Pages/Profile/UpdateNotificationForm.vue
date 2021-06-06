<template>
    <jet-form-section @submitted="updateNotificationPreference">
        <template #title>
            Notification Preferences
        </template>

        <template #description>
            Update your account's notification preference.
        </template>

        <template #form>
            <di class="col-span-6 sm:col-span-4">
                <div class="block mt-4">
                    <label class="flex items-center">
                        <jet-checkbox name="notification_new_task" v-model:checked="form.notification_new_task" />
                        <span class="ml-4 text-sm text-gray-600">Notify me when someone assigns me to a task</span>
                    </label>
                    <jet-input-error :message="form.errors.notification_new_task" class="mt-2" />
                </div>

                <div class="block mt-4">
                    <label class="flex items-center">
                        <jet-checkbox name="notification_mention" v-model:checked="form.notification_mention" />
                        <span class="ml-4 text-sm text-gray-600">Notify me when someone mentions me in a conversation</span>
                    </label>
                    <jet-input-error :message="form.errors.notification_mention" class="mt-2" />
                </div>

                <div class="block mt-4">
                    <label class="flex items-center">
                        <jet-checkbox name="notification_new_project" v-model:checked="form.notification_new_project" />
                        <span class="ml-4 text-sm text-gray-600">Notify me when someone adds me to a project</span>
                    </label>
                    <jet-input-error :message="form.errors.notification_new_project" class="mt-2" />
                </div>

                <div class="block mt-4">
                    <label class="flex items-center">
                        <jet-checkbox name="notification_new_activity" v-model:checked="form.notification_new_activity" />
                        <span class="ml-4 text-sm text-gray-600">Notify me when there's a new activity on a project I am a member of</span>
                    </label>
                    <jet-input-error :message="form.errors.notification_new_activity" class="mt-2" />
                </div>
            </di>
        </template>

        <template #actions>
            <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                Saved.
            </jet-action-message>

            <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save
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

        props: ['user'],

        data() {
            return {
                form: this.$inertia.form({
                    _method: 'PUT',
                    notification_new_task: this.user.notification_new_task == 1 ? true : false,
                    notification_mention: this.user.notification_mention == 1 ? true : false,
                    notification_new_project: this.user.notification_new_project == 1 ? true : false,
                    notification_new_activity: this.user.notification_new_activity == 1 ? true : false
                })
            }
        },

        methods: {
            updateNotificationPreference () {
                this.form.post(route('profile.update_notification_preferences', this.user.id), {
                    errorBag: 'updateNotificationPreference',
                    preserveScroll: true
                })
            }
        }
    }
</script>