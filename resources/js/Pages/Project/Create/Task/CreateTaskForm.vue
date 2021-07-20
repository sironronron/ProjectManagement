<template>
    <jet-form-section @submitted="createNewTask">
        <template #title>
            Task Information
        </template>

        <template #description>
            Add new task to project! Tasks will help you monitor your project's progress
        </template>

        <template #form>
            <!-- Title -->
            <div class="col-span-6 sm:col-span-4">
                <h1 class="text-base font-semibold mb-4">General Information</h1>

                <jet-label for="title" value="Title" />
                <jet-input id="title" type="text" class="mt-1 block w-full" v-model="form.title" />
                <jet-input-error :message="form.errors.title" class="mt-2" />
            </div>

            <!-- Milestone -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="milestone" value="Milestone" />
                <select class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" v-model="form.milestone_id">
                    <option disabled>Select milestone</option>
                    <option v-for="(milestone, key) in project_milestones" :key="key" :value="milestone.unique_id">
                        {{ milestone.name }}
                    </option>
                </select>
                <jet-input-error :message="form.errors.milestone_id" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <jet-label for="assigned_to" value="Assigned To" class="mb-2" />
                <multiselect v-model="form.assigned_to" :options="members" mode="multiple" :searchable="true" :loading="true" :classes="{
                    container: 'relative mx-auto w-full flex items-center justify-end box-border cursor-pointer border border-gray-300 rounded bg-white text-base leading-snug outline-none',
                    containerDisabled: 'cursor-default bg-gray-100',
                    containerOpen: 'rounded-b-none',
                    containerOpenTop: 'rounded-t-none',
                    containerActive: 'ring ring-indigo-500 ring-opacity-30',
                    singleLabel: 'flex items-center h-full absolute left-0 top-0 pointer-events-none bg-transparent leading-snug pl-3.5',
                    multipleLabel: 'flex items-center h-full absolute left-0 top-0 pointer-events-none bg-transparent leading-snug pl-3.5',
                    search: 'w-full absolute inset-0 outline-none appearance-none box-border border-0 text-base font-sans bg-white rounded pl-3.5',
                    tags: 'flex-grow flex-shrink flex flex-wrap mt-1 pl-2',
                    tag: 'bg-indigo-500 text-white text-sm font-semibold py-0.5 pl-2 rounded mr-1 mb-1 flex items-center whitespace-nowrap',
                    tagDisabled: 'pr-2 !bg-gray-400 text-white',
                    tagRemove: 'flex items-center justify-center p-1 mx-0.5 rounded-sm hover:bg-black hover:bg-opacity-10 group',
                    tagRemoveIcon: 'bg-multiselect-remove bg-center bg-no-repeat opacity-30 inline-block w-3 h-3 group-hover:opacity-60',
                    tagsSearch: 'h-full border-0 outline-none appearance-none p-0 text-base font-sans mx-1 mb-1 box-border flex-grow flex-shrink',
                    placeholder: 'flex items-center h-full absolute left-0 top-0 pointer-events-none bg-transparent leading-snug pl-3.5 text-gray-400',
                    caret: 'bg-multiselect-caret bg-center bg-no-repeat w-2.5 h-4 py-px box-content mr-3.5 relative z-10 opacity-40 flex-shrink-0 flex-grow-0 transition-transform transform',
                    caretOpen: 'rotate-180',
                    clear: 'pr-3.5 relative z-10 opacity-40 transition duration-300 flex-shrink-0 flex-grow-0 flex hover:opacity-80',
                    clearIcon: 'bg-multiselect-remove bg-center bg-no-repeat w-2.5 h-4 py-px box-content inline-block',
                    spinner: 'bg-multiselect-spinner bg-center bg-no-repeat w-4 h-4 z-10 mr-3.5 animate-spin flex-shrink-0 flex-grow-0',
                    dropdown: 'absolute -left-px -right-px bottom-0 transform translate-y-full border border-gray-300 -mt-px overflow-y-scroll z-50 bg-white flex flex-col rounded-b',
                    dropdownTop: '-translate-y-full top-px bottom-auto flex-col-reverse rounded-b-none rounded-t',
                    options: 'flex flex-col p-0 m-0 list-none',
                    optionsTop: 'flex-col-reverse',
                    option: 'flex items-center justify-start box-border text-left cursor-pointer text-base leading-snug py-2 px-3',
                    optionPointed: 'text-gray-800 bg-gray-100',
                    optionSelected: 'text-white bg-indigo-500',
                    optionDisabled: 'text-gray-300 cursor-not-allowed',
                    optionSelectedPointed: 'text-white bg-indigo-500 opacity-90',
                    optionSelectedDisabled: 'text-indigo-100 bg-indigo-500 bg-opacity-50 cursor-not-allowed',
                    noOptions: 'py-2 px-3 text-gray-600 bg-white',
                    noResults: 'py-2 px-3 text-gray-600 bg-white',
                    fakeInput: 'bg-transparent absolute left-0 right-0 -bottom-px w-full h-px border-0 p-0 appearance-none outline-none text-transparent',
                    spacer: 'h-9 py-px box-content',
                    }"  />
                <jet-input-error :message="form.errors.due_date" class="mt-2" />
            </div>

            <!-- Due Date -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="due_date" value="Due Date" />
                <jet-input id="due_date" type="date" class="mt-1 block w-full" v-model="form.due_date" />
                <jet-input-error :message="form.errors.due_date" class="mt-2" />
            </div>

            <!-- Description -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="description" value="Description" />
                <tiptap v-model="form.description" data-placeholder="Write something..." />
                <jet-input-error :message="form.errors.description" class="mt-2" />
            </div>

            <!-- Options -->
            <div class="col-span-6 sm:col-span-4">
                <h1 class="text-base font-semibold mb-4">Options</h1>

                <jet-label for="status" value="Status" />
                <select class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" v-model="form.status_id">
                    <option disabled>Select status</option>
                    <option v-for="(status, key) in project_task_statuses" :key="key" :value="status.id">
                        {{ status.name }}
                    </option>
                </select>
                <jet-input-error :message="form.errors.status_id" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <jet-label for="priority" value="Priority" />
                <select class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" v-model="form.priority">
                    <option disabled>Select priority</option>
                    <option value="low">Low</option>
                    <option value="normal">Normal</option>
                    <option value="high">High</option>
                    <option value="urgent">Urgent</option>
                </select>
                <jet-input-error :message="form.errors.priority" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <div class="block mt-4">
                    <label class="flex items-center">
                        <jet-checkbox name="visible_to_client" v-model:checked="form.visible_to_client" />
                        <span class="ml-4 text-sm text-gray-600">Visible to client</span>
                    </label>
                    <jet-input-error :message="form.errors.visible_to_client" class="mt-2" />
                </div>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <div class="block">
                    <label class="flex items-center">
                        <jet-checkbox name="billable" v-model:checked="form.billable" />
                        <span class="ml-4 text-sm text-gray-600">Billable</span>
                    </label>
                    <jet-input-error :message="form.errors.billable" class="mt-2" />
                </div>
            </div>
        </template>

        <template #actions>
            <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                Saved.
            </jet-action-message>

            <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save New Task
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
    import Tiptap from '@/Jetstream/Tiptap'
    import Multiselect from '@vueform/multiselect'
    import { DatePicker } from 'v-calendar';

    export default {
        props: ['project', 'project_task_statuses', 'project_milestones', 'members'],

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
            Tiptap,
            Multiselect,
            DatePicker
        },

        data () {
            return {
                form: this.$inertia.form({
                    title: '',
                    milestone_id: '',
                    start_date: '',
                    assigned_to: [],
                    due_date: '',
                    description: '',
                    status_id: '',
                    priority: '',
                    visible_to_client: false,
                    billable: true,
                    tags: [],
                    project_id: this.project.unique_id
                })
            }
        },

        methods: {
            createNewTask () {
                this.form.post(route('projects.store.tasks'), {
                    errorBag: 'createNewTask',
                    preserveScroll: true,
                    onSuccess: () => this.form.reset()
                })
            }
        }
    }
</script>
