<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ client.company_name }} <span class="text-gray-200 mx-5">|</span> Editing User
            </h2>
        </template>

        <div class="py-12 container mx-auto py-6">
            <client-details :client="client" />

            <div class="mb-5">
                <jet-form-section @submitted="updateClientUser">
                    <template #title>
                        Edit Client User Information
                    </template>

                    <template #description>
                        Update the information of the client user account registered on this system
                    </template>

                    <template #form>
                        <!-- Name -->
                        <div class="col-span-6 sm:col-span-4">
                            <jet-label for="name" value="Name" />
                            <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" />
                            <jet-input-error :message="form.errors.name" class="mt-2" />
                        </div>
                        
                        <!-- Email -->
                        <div class="col-span-6 sm:col-span-4">
                            <jet-label for="email" value="Email" />
                            <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" />
                            <jet-input-error :message="form.errors.email" class="mt-2" />
                        </div>

                        <!-- Phone Number -->
                        <div class="col-span-6 sm:col-span-4">
                            <jet-label for="phone" value="Phone" />
                            <jet-input id="phone" type="text" class="mt-1 block w-full" v-model="form.phone" placeholder="(+63) 910-123-4567" />
                            <jet-input-error :message="form.errors.phone" class="mt-2" />
                        </div>

                        <!-- Position -->
                        <div class="col-span-6 sm:col-span-4">
                            <jet-label for="position" value="Position" />
                            <jet-input id="position" type="text" class="mt-1 block w-full" v-model="form.position" />
                            <jet-input-error :message="form.errors.position" class="mt-2" />
                        </div>
                    </template>

                    <template #actions>
                        <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                            Saved.
                        </jet-action-message>

                        <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Update Client User
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

    export default {
        props: ['client', 'client_user'],

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
            JetCheckbox
        },

        data () {
            return {
                form: this.$inertia.form({
                    _method: 'PUT',
                    name: this.client_user.name,
                    email: this.client_user.email,
                    phone: this.client_user.phone_number,
                    position: this.client_user.position,
                    client_id: this.client.unique_id
                })
            }
        },

        methods: {
            updateClientUser () {
                this.form.put(route('client_users.update', this.client_user.unique_id), {
                    errorBag: 'updateClientUser'
                });
            }
        }
    }
</script>