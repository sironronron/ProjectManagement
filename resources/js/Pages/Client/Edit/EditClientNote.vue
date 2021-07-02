<template>
    <app-layout> 
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ client.company_name }} <span class="text-gray-200 mx-5">|</span> Editing Note
            </h2>
        </template>

        <div class="py-12 container mx-auto py-6">
            <client-details :client="client" />
        
            <div class="mb-5">
                <jet-form-section @submitted="updateClientNote">
                    <template #title>
                        Edit Client Note
                    </template>

                    <template #description>
                        Update note information on client
                    </template>

                    <template #form>
                        <!-- Title -->
                        <div class="col-span-6 sm:col-span-4">
                            <jet-label for="title" value="Title" />
                            <jet-input id="title" type="text" class="mt-1 block w-full" v-model="form.title" />
                            <jet-input-error :message="form.errors.title" class="mt-2" />
                        </div>

                        <!-- Subtitle -->
                        <div class="col-span-6 sm:col-span-4">
                            <jet-label for="subtitle" value="Subtitle" />
                            <jet-input id="subtitle" type="text" class="mt-1 block w-full" v-model="form.subtitle" />
                            <jet-input-error :message="form.errors.subtitle" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <jet-label for="body" value="Body" />
                            <tiptap v-model="form.body" data-placeholder="Write something..." />
                            <jet-input-error :message="form.errors.body" class="mt-2" />
                        </div>
                    </template>
                    
                    <template #actions>
                        <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                            Saved.
                        </jet-action-message>

                        <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Save New Client Note
                        </jet-button>
                    </template>
                </jet-form-section>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import ClientDetails from '../Show/ClientDetails'
    import JetButton from '@/Jetstream/Button'
    import JetFormSection from '@/Jetstream/FormSection'
    import JetInput from '@/Jetstream/Input'
    import JetInputError from '@/Jetstream/InputError'
    import JetTextarea from '@/Jetstream/Textarea'
    import JetLabel from '@/Jetstream/Label'
    import JetActionMessage from '@/Jetstream/ActionMessage'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton'
    import JetCheckbox from '@/Jetstream/Checkbox'
    import Tiptap from '@/Jetstream/Tiptap'

    export default {
        props: ['client', 'note'],

        components: {
            AppLayout,
            ClientDetails,
            JetActionMessage,
            JetButton,
            JetFormSection,
            JetInput,
            JetInputError,
            JetTextarea,
            JetLabel,
            JetSecondaryButton,
            JetCheckbox,
            Tiptap
        },

        data () {
            return {
                form: this.$inertia.form({
                    _method: 'PUT',
                    title: this.note.title,
                    subtitle: this.note.subtitle,
                    body: this.note.body
                })
            }
        },

        methods: {
            updateClientNote () {
                this.form.put(route('client_notes.update', { client_id: this.client.unique_id, client_note_id: this.note.unique_id }), {
                    errorBag: 'updateClientNote'
                })
            }
        }
    }
</script>