<template>
    <jet-form-section @submitted="updateProjectCategory">
        <template #title>
            Project Category
        </template>

        <template #description>
            Update your project category.
        </template>

        <template #form>
            <!-- Name -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="name" value="Name" />
                <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" autofocus />
                <jet-input-error :message="form.errors.name" class="mt-2" />
            </div>

            <!-- Description -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="description" value="Description" />
                <jet-textarea id="description" class="mt-1 block w-full" v-model="form.description" />
                <jet-input-error :message="form.errors.description" class="mt-2" />
            </div>

            <!-- Project Category Status -->
            <div class="col-span-6 sm:col-span-4">
                <div class="block">
                    <label for="status" class="flex items-center">
                        <jet-checkbox name="status" v-model:checked="form.status" />
                        <span class="ml-4 text-sm text-gray-600">
                            Publish
                        </span>
                    </label>
                </div>
            </div>
        </template>

        <template #actions>
            <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                Saved.
            </jet-action-message>

            <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Update Project Category
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
        props: ['project_category'],

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
                    name: this.project_category.name,
                    description: this.project_category.description,
                    status: this.project_category.status == 1 ? true : false
                })
            }
        },

        methods: {
            updateProjectCategory () {
                this.form.put(route('', this.project_category), {
                    errorBag: 'updateProjectCategory',
                    preserverScroll: true
                });
            }
        }
    }
</script>