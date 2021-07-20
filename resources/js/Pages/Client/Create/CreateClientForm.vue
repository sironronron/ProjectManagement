<template>
    <jet-form-section @submitted="createNewClient">
        <template #title>
            Client Information
        </template>

        <template #description>
            Add a new client to your list! This will create a user for your client that they will be able to use to sign in and view their projects and invoices.
        </template>

        <template #form>
            <!-- Company Name -->
            <div class="col-span-6 sm:col-span-4">
                <h1 class="text-base mb-4 font-semibold">General Information</h1>

                <jet-label for="company_name" value="Company Name" />
                <jet-input id="company_name" type="text" class="mt-1 block w-full" v-model="form.company_name" />
                <jet-input-error :message="form.errors.company_name" class="mt-2" />
            </div>

            <!-- Company Phone Number -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="company_phone_number" value="Company Phone Number" />
                <jet-input id="company_phone_number" type="text" class="mt-1 block w-full" v-model="form.company_phone_number" placeholder="(+63) 910-023-1023" />
                <jet-input-error :message="form.errors.company_phone_number" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <jet-label for="address" value="Company Address" />
                <jet-input id="address" type="text" class="mt-1 block w-full" v-model="form.address" />
                <jet-input-error :message="form.errors.address" class="mt-2" />
            </div>

            <!-- First Name -->
            <div class="col-span-6 sm:col-span-4">
                <h1 class="text-base mb-4 font-semibold">Owner Information</h1>

                <jet-label for="first_name" value="Client's First Name" />
                <jet-input id="first_name" type="text" class="mt-1 block w-full" v-model="form.first_name" />
                <jet-input-error :message="form.errors.first_name" class="mt-2" />
            </div>

            <!-- Last Name -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="last_name" value="Client's Last Name" />
                <jet-input id="last_name" type="text" class="mt-1 block w-full" v-model="form.last_name" />
                <jet-input-error :message="form.errors.last_name" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="email" value="Client's Email Address" />
                <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" />
                <jet-input-error :message="form.errors.email" class="mt-2" />
            </div>

            <!-- Category -->
            <div class="col-span-6 sm:col-span-4">
                <h1 class="text-base mb-4 font-semibold">Additional Information</h1>

                <jet-label for="category" value="Category" />
                <select class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" v-model="form.category_id">
                    <option disabled>Select client category</option>
                    <option v-for="(category, key) in categories" :key="key" :value="category.unique_id">
                        {{ category.name }}
                    </option>
                </select>
                <jet-input-error :message="form.errors.category_id" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                Saved.
            </jet-action-message>

            <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save New Client
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
        props: ['categories'],

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
                    company_name: '',
                    company_phone_number: '',
                    first_name: '',
                    last_name: '',
                    email: '',
                    category_id: '',
                    address: ''
                })
            }
        },

        methods: {
            createNewClient () {
                this.form.post(route('clients.store'), {
                    errorBag: 'createNewClient',
                    preserveScroll: true
                })
            }
        }
    }
</script>