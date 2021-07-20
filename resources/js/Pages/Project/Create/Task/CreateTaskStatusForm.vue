<template>
    <jet-form-section @submitted="createNewTaskStatus">
        <template #title>
            Task Status Information
        </template>

        <template #description>
            Add new task status! Categorize your tasks by status.
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <h1 class="text-base font-semibold mb-4">General Information</h1>

                <jet-label for="name" value="Name" />
                <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" />
                <jet-input-error :message="form.errors.name" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <jet-label for="order" value="Order" />
                <jet-input id="order_by" type="number" class="mt-1 block w-full" v-model="form.order_by" />
                <jet-input-error :message="form.errors.order_by" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                Saved.
            </jet-action-message>

            <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save New Task Status
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
        props: ['project'],

        components: {
            JetActionMessage,
            JetButton,
            JetFormSection,
            JetInput,
            JetInputError,
            JetTextarea,
            JetLabel,
            JetSecondaryButton,
            JetCheckbox,
        },
    
        data () {
            return {
                form: this.$inertia.form({
                    name: '',
                    order_by: '',
                    project_id: this.project.unique_id
                })
            }
        },

        methods: {
            createNewTaskStatus () {
                this.form.post(route('projects.store.task_status'), {
                    errorBag: 'createNewTaskStatus',
                    preserveScroll: true,
                    onSuccess: () => this.form.reset()
                })
            }
        }
    }
</script>