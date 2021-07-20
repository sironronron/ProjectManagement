<template>
    <div>
        <div>
            <p class="flex flex-nowrap text-base text-gray-600 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>

                <span>
                    Description
                </span>
            </p>
                
            <div class="hidden sm:block">
                <div class="py-4">
                    <div class="border-t border-gray-200"></div>
                </div>
            </div>

            <parse-html-display v-if="editing == false" :data="task.description" />

            <!-- Editing -->
            <div v-if="editing == false" class="text-xs underline text-gray-400 cursor-pointer mt-3" @click="editing = true">
                Edit Description
            </div>

            <div v-else>
                <jet-mini-form-section @submitted="updateTaskDescription">
                    <template #form>
                        <div>
                            <tiptap v-model="form.description" data-placeholder="Write something..." />
                            <jet-input-error :message="form.errors.description" class="mt-2" />
                        </div>
                    </template>

                    <template #actions>
                        <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                            Saved.
                        </jet-action-message>

                        <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Update Task Description
                        </jet-button>
                    </template>
                </jet-mini-form-section>

                <div v-if="editing == true" class="text-xs underline text-gray-400 cursor-pointer mt-3" @click="editing = false">
                    Cancel Editing
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import SectionBorder from '@/Jetstream/SectionBorder'
    import ParseHtmlDisplay from '@/Jetstream/HtmlDisplay'
    import JetButton from '@/Jetstream/Button'
    import JetMiniFormSection from '@/Jetstream/MiniFormSection'
    import JetInput from '@/Jetstream/Input'
    import JetInputError from '@/Jetstream/InputError'
    import JetLabel from '@/Jetstream/Label'
    import JetActionMessage from '@/Jetstream/ActionMessage'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton'
    import JetCheckbox from '@/Jetstream/Checkbox'
    import Tiptap from '@/Jetstream/Tiptap'

    export default {
        props: ['task'],
        
        components: {
            SectionBorder,
            ParseHtmlDisplay,
            JetButton,
            JetMiniFormSection,
            JetInput,
            JetInputError,
            JetLabel,
            JetActionMessage,
            JetSecondaryButton,
            JetCheckbox,
            Tiptap,
        },

        data () {
            return {
                editing: false,
                form: this.$inertia.form({
                    description: this.task.description
                })
            }
        },

        methods: {
            updateTaskDescription () {
                this.form.put(route('projects.update.tasks.description', { project_task: this.task.unique_id }), {
                    _method: 'PUT',
                    errorBag: 'updateMilestone',
                    preserveScroll: true,
                    onSuccess: () => this.editing = false
                })
            }
        }
    }
</script>