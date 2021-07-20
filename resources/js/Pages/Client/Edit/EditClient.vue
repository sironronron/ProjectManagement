<template>
    <app-layout>
        <template #header>
            <h2>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ client.company_name }} <span class="text-gray-200 mx-5">|</span> Settings
                </h2>
            </h2>
        </template>
        
        <div>
            <alerts :flash="$page.props.flash" />

            <client-details :client="client" />

            <div class="mb-5">
                <jet-form-section @submitted="updateClient">
                    <template #title>
                        Edit Client
                    </template>

                    <template #description>
                        Update client settings or information
                    </template>

                    <template #form>
                        <!-- Company Avatar -->
                        <div class="col-span-6 sm:col-span-4">
                            <!-- Profile Photo File Input -->
                            <input type="file" class="hidden"
                                        ref="photo"
                                        @change="updatePhotoPreview">

                            <jet-label for="photo" value="Photo" />

                            <!-- Current Profile Photo -->
                            <div class="mt-2" v-show="! photoPreview">
                                <img v-if="client.company_photo != 'client_default.png'" :src="client.company_photo" :alt="client.company_name" class="rounded-full h-20 w-20 object-cover">
                                <img v-else src="https://cdn.tuk.dev/assets/templates/olympus/projects.png" :alt="client.company_name" class="rounded-full h-20 w-20 object-cover">
                            </div>

                            <!-- New Profile Photo Preview -->
                            <div class="mt-2" v-show="photoPreview">
                                <span class="block rounded-full w-20 h-20"
                                    :style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                                </span>
                            </div>

                            <jet-secondary-button class="mt-2 mr-2" type="button" @click.prevent="selectNewPhoto">
                                Select A New Photo
                            </jet-secondary-button>

                            <jet-input-error :message="form.errors.company_photo" class="mt-2" />
                        </div>

                        <!-- Company Name -->
                        <div class="col-span-6 sm:col-span-4">
                            <jet-label for="company_name" value="Company Name" />
                            <jet-input id="company_name" type="text" class="mt-1 block w-full" v-model="form.company_name" />
                            <jet-input-error :message="form.errors.company_name" class="mt-2" />
                        </div>

                        <!-- Company Phone Number -->
                        <div class="col-span-6 sm:col-span-4">
                            <jet-label for="company_phone_number" value="Company Phone Number" />
                            <jet-input id="company_phone_number" type="text" class="mt-1 block w-full" v-model="form.company_phone_number" />
                            <jet-input-error :message="form.errors.company_phone_number" class="mt-2" />
                        </div>

                        <!-- Addres -->
                        <div class="col-span-6 sm:col-span-4">
                            <jet-label for="address" value="Address" />
                            <jet-input id="address" type="text" class="mt-1 block w-full" v-model="form.address" />
                            <jet-input-error :message="form.errors.address" />
                        </div>

                        <!-- Status -->
                        <div class="col-span-6 sm:col-span-4">
                            <h1 class="text-base mb-4">Additional Information</h1>

                            <jet-label for="status" value="Status" />
                            <select class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" v-model="form.status">
                                <option value="active">Active</option>
                                <option value="suspended">Suspended</option>
                            </select>
                            <jet-input-error :message="form.errors.status" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
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
                            Update Client
                        </jet-button>
                    </template>
                </jet-form-section>

                <jet-section-border />

                <jet-form-section>
                    <template #title>
                        Delete Client
                    </template>

                    <template #description>
                        Be cautious when deleting clients! This action will not be reversable.
                    </template>

                    <template #form>
                        <div class="col-span-6 sm:col-span-4">
                            <jet-danger-button class="ml-2" @click="confirmClientRemoval(client)">
                                Delete Client
                            </jet-danger-button>
                        </div>                        
                    </template>
                </jet-form-section>

                <!-- Delete User -->
                <jet-confirmation-modal :show="clientBeingRemoved" @close="clientBeingRemoved = null">
                    <template #title>
                        Delete client
                    </template>

                    <template #content>
                        Are you sure you would like to delete this client?
                    </template>

                    <template #footer>
                        <jet-secondary-button @click="clientBeingRemoved = null">
                            Cancel
                        </jet-secondary-button>

                        <jet-danger-button class="ml-2" @click="removeClient" :class="{ 'opacity-25': removeClientForm.processing }" :disabled="removeClientForm.processing">
                            Delete
                        </jet-danger-button>
                    </template>
                </jet-confirmation-modal>
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
    import Alerts from '@/Jetstream/Alerts'
    import JetSectionBorder from '@/Jetstream/SectionBorder'
    import JetConfirmationModal from '@/Jetstream/ConfirmationModal'
    import JetDangerButton from '@/Jetstream/DangerButton'

    export default {
        props: ['client', 'categories'],

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
            Tiptap,
            Alerts,
            JetSectionBorder,
            JetConfirmationModal,
            JetDangerButton
        },
        
        data () {
            return {
                form: this.$inertia.form({
                    _method: 'PUT',
                    company_photo: this.client.company_photo,
                    company_name: this.client.company_name,
                    company_phone_number: this.client.company_phone_number,
                    address: this.client.address,
                    owner_id: this.client.owner.unique_id,
                    client_status: this.client.client_status,
                    tags: this.client.tags,
                    status: this.client.client_status,
                    category_id: this.client.category.unique_id
                }),

                photoPreview: null,
                clientBeingRemoved: null,
                removeClientForm: this.$inertia.form()
            }
        },

        methods: {
            updateClient () {
                if (this.$refs.photo) {
                    this.form.company_photo = this.$refs.photo.files[0]
                }

                this.form.post(route('clients.show.settings.update', this.client.unique_id), {
                    errorBag: 'updateClient',
                    preserveScroll: true,
                    onSuccess: () => (this.clearPhotoFileInput()),
                })
            },

            confirmClientRemoval (client) {
                this.clientBeingRemoved = client
            },

            removeClient () {
                this.removeClientForm.delete(route('clients.destroy', this.clientBeingRemoved), {
                    errorBag: 'removeClient',
                    onSuccess: () => (this.clientBeingRemoved = null)
                })
            },

            selectNewPhoto () {
                this.$refs.photo.click();
            },

            updatePhotoPreview () {
                const photo = this.$refs.photo.files[0];
                
                if (! photo) return;

                const reader = new FileReader();

                reader.onload = (e) => {
                    this.photoPreview = e.target.result;
                };

                reader.readAsDataURL(photo);
            },

            clearPhotoFileInput() {
                if (this.$refs.photo?.value) {
                    this.$refs.photo.value = null;
                }
            },
        }
    }
</script>