<template>
    <jet-form-section @submitted="updateProfileInformation">
        <template #title>
            Profile Information
        </template>

        <template #description>
            Update your account's profile information and email address.
        </template>

        <template #form>
            <!-- Profile Photo -->
            <div class="col-span-6 sm:col-span-4" v-if="$page.props.jetstream.managesProfilePhotos">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            ref="photo"
                            @change="updatePhotoPreview">

                <jet-label for="photo" value="Photo" />

                <!-- Current Profile Photo -->
                <div class="mt-2" v-show="! photoPreview">
                    <img :src="user.profile_photo_url" :alt="user.name" class="rounded-full h-20 w-20 object-cover">
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

                <jet-secondary-button type="button" class="mt-2" @click.prevent="deletePhoto" v-if="user.profile_photo_path">
                    Remove Photo
                </jet-secondary-button>

                <jet-input-error :message="form.errors.photo" class="mt-2" />
            </div>

            <!-- Name -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="name" value="Name" />
                <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" autocomplete="name" />
                <jet-input-error :message="form.errors.name" class="mt-2" />
            </div>

            <!-- Email -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="email" value="Email" />
                <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" />
                <jet-input-error :message="form.errors.email" class="mt-2" />
            </div>

            <!-- Location -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="location" value="Location" />
                <jet-input id="location" type="text" class="mt-1 block w-full" v-model="form.location" />
                <jet-input-error :message="form.errors.location" class="mt-2" />
            </div>

            <!-- Bio -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="bio" value="Bio" />
                <jet-textarea id="bio" class="mt-1 block w-full" v-model="form.bio" />
                <jet-input-error :message="form.errors.bio" class="mt-2" />
            </div>

            <!-- Additional Information -->
            <div class="col-span-6 sm:col-span-4">
                <hr>
            </div>

            <!-- Position -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="position" value="Position" />
                <jet-input id="position" type="text" class="mt-1 block w-full" v-model="form.position" />
                <jet-input-error :message="form.errors.position" class="mt-2" />
            </div>

            <!-- Phone Number -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="phone_number" value="Phone Number" />
                <jet-input id="phone_number" type="text" class="mt-1 block w-full" v-model="form.phone_number" placeholder="(+63) 910-345-6789" />
                <jet-input-error :message="form.errors.phone_number" class="mt-2" />
            </div>

            <!-- Social Media Links -->
            <div class="col-span-6 sm:col-span-4">
                <hr>
            </div>

            <!-- Facebook Link -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="facebook_link" value="Facebook Link" />
                <jet-input id="facebook_link" type="text" class="mt-1 block w-full" v-model="form.facebook_link" placeholder="username" />
                <jet-input-error :message="form.errors.facebook_link" />
            </div>

            <!-- Twitter Link -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="twitter_link" value="Twitter Link" />
                <jet-input id="twitter_link" type="text" class="mt-1 block w-full" v-model="form.twitter_link" placeholder="username" />
                <jet-input-error :message="form.errors.twitter_link" />
            </div>

            <!-- LinkedIn Link -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="linkedin_link" value="LinkedIn Link" />
                <jet-input id="linkedin_link" type="text" class="mt-1 block w-full" v-model="form.linkedin_link" placeholder="username" />
                <jet-input-error :message="form.errors.linkedin_link" />
            </div>
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
        },

        props: ['user'],

        data() {
            return {
                form: this.$inertia.form({
                    _method: 'PUT',
                    name: this.user.name,
                    email: this.user.email,
                    photo: null,
                    location: this.user.location,
                    bio: this.user.bio,
                    position: this.user.position,
                    phone_number: this.user.phone_number,
                    facebook_link: this.user.facebook_link,
                    twitter_link: this.user.twitter_link,
                    linkedin_link: this.user.linkedin_link
                }),

                photoPreview: null,
            }
        },

        methods: {
            updateProfileInformation() {
                if (this.$refs.photo) {
                    this.form.photo = this.$refs.photo.files[0]
                }

                this.form.post(route('user-profile-information.update'), {
                    errorBag: 'updateProfileInformation',
                    preserveScroll: true,
                    onSuccess: () => (this.clearPhotoFileInput()),
                });
            },

            selectNewPhoto() {
                this.$refs.photo.click();
            },

            updatePhotoPreview() {
                const photo = this.$refs.photo.files[0];

                if (! photo) return;

                const reader = new FileReader();

                reader.onload = (e) => {
                    this.photoPreview = e.target.result;
                };

                reader.readAsDataURL(photo);
            },

            deletePhoto() {
                this.$inertia.delete(route('current-user-photo.destroy'), {
                    preserveScroll: true,
                    onSuccess: () => {
                        this.photoPreview = null;
                        this.clearPhotoFileInput();
                    },
                });
            },

            clearPhotoFileInput() {
                if (this.$refs.photo?.value) {
                    this.$refs.photo.value = null;
                }
            },
        },
    }
</script>
