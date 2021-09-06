<template>
    <jet-form-section @submitted="createNewProject">
        <template #title> Project Information </template>

        <template #description>
            Create a new project for your team or specific members of your
            company.
        </template>

        <template #form>
            <!-- Client -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="category_id" value="Client" />
                <select
                    class="
                        border-gray-300
                        focus:border-indigo-300
                        focus:ring
                        focus:ring-indigo-200
                        focus:ring-opacity-50
                        rounded-md
                        shadow-sm
                        mt-1
                        block
                        w-full
                    "
                    v-model="form.client_id"
                >
                    <option value="" disabled>Select client</option>
                    <option
                        v-for="(client, key) in clients"
                        :key="key"
                        :value="client.unique_id"
                    >
                        {{ client.company_name }}
                    </option>
                </select>
                <jet-input-error
                    :message="form.errors.client_id"
                    class="mt-2"
                />
            </div>

            <!-- Name -->
            <div class="col-span-6 sm:col-span-4">
                <h1 class="text-base font-semibold mb-4">
                    General Information
                </h1>

                <jet-label for="name" value="Name" />
                <jet-input
                    id="name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.name"
                    autofocus
                />
                <jet-input-error :message="form.errors.name" class="mt-2" />
            </div>

            <!-- Category -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="category_id" value="Project Category" />
                <select
                    class="
                        border-gray-300
                        focus:border-indigo-300
                        focus:ring
                        focus:ring-indigo-200
                        focus:ring-opacity-50
                        rounded-md
                        shadow-sm
                        mt-1
                        block
                        w-full
                    "
                    v-model="form.category_id"
                >
                    <option value="" disabled>Select project category</option>
                    <option
                        v-for="(category, key) in project_category_lists"
                        :key="key"
                        :value="category.unique_id"
                    >
                        {{ category.name }}
                    </option>
                </select>
                <jet-input-error
                    :message="form.errors.category_id"
                    class="mt-2"
                />
            </div>

            <!-- Bio -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="description" value="Description" />
                <jet-textarea
                    class="mt-1 block w-full"
                    v-model="form.description"
                />
                <jet-input-error
                    :message="form.errors.description"
                    class="mt-2"
                />
            </div>

            <!-- Assigned -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="assigned" value="Assigned" />
                <select
                    class="
                        border-gray-300
                        focus:border-indigo-300
                        focus:ring
                        focus:ring-indigo-200
                        focus:ring-opacity-50
                        rounded-md
                        shadow-sm
                        mt-1
                        block
                        w-full
                    "
                    v-model="form.assigned_to_id"
                >
                    <option value="" disabled>Select person assigned</option>
                    <option
                        v-for="(assigned, key) in assignee"
                        :key="key"
                        :value="assigned.id"
                    >
                        {{ assigned.name }}
                    </option>
                </select>
                <jet-input-error
                    :message="form.errors.assigned_to_id"
                    class="mt-2"
                />
            </div>

            <!-- Project Manager -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="assigned" value="Project Manager" />
                <select
                    class="
                        border-gray-300
                        focus:border-indigo-300
                        focus:ring
                        focus:ring-indigo-200
                        focus:ring-opacity-50
                        rounded-md
                        shadow-sm
                        mt-1
                        block
                        w-full
                    "
                    v-model="form.project_manager_id"
                >
                    <option value="" disabled>Select project manager</option>
                    <option
                        v-for="(manager, key) in project_managers"
                        :key="key"
                        :value="manager.id"
                    >
                        {{ manager.name }}
                    </option>
                </select>
                <jet-input-error
                    :message="form.errors.project_manager_id"
                    class="mt-2"
                />
            </div>

            <!-- Timeline -->
            <div class="col-span-6 sm:col-span-4">
                <h1 class="text-base font-semibold mb-4">Project Timeline</h1>

                <div class="block">
                    <label class="flex items-center">
                        <jet-checkbox
                            name="unscheduled"
                            v-model:checked="form.unscheduled"
                        />
                        <span class="ml-4 text-sm text-gray-600"
                            >No Schedule</span
                        >
                    </label>
                </div>
            </div>

            <!-- Start Date -->
            <template v-if="!form.unscheduled">
                <div class="col-span-6 sm:col-span-4">
                    <jet-label for="start_date" value="Start Date" />
                    <date-picker v-model="form.start_date" color="indigo">
                        <template v-slot="{ inputValue, inputEvents }">
                            <input
                                type="text"
                                class="
                                    border-gray-300
                                    focus:border-indigo-300
                                    focus:ring
                                    focus:ring-indigo-200
                                    focus:ring-opacity-50
                                    rounded-md
                                    shadow-sm
                                    mt-1
                                    block
                                    w-full
                                "
                                :value="formatDate(inputValue)"
                                v-on="inputEvents"
                                readonly
                            />
                        </template>
                    </date-picker>
                    <jet-input-error
                        :message="form.errors.start_date"
                        class="mt-2"
                    />
                </div>

                <!-- End Date -->
                <div class="col-span-6 sm:col-span-4">
                    <jet-label for="end_date" value="End Date" />
                    <date-picker
                        v-model="form.end_date"
                        :min-date="new Date()"
                        color="indigo"
                    >
                        <template v-slot="{ inputValue, inputEvents }">
                            <input
                                type="text"
                                class="
                                    border-gray-300
                                    focus:border-indigo-300
                                    focus:ring
                                    focus:ring-indigo-200
                                    focus:ring-opacity-50
                                    rounded-md
                                    shadow-sm
                                    mt-1
                                    block
                                    w-full
                                "
                                :value="formatDate(inputValue)"
                                v-on="inputEvents"
                                readonly
                            />
                        </template>
                    </date-picker>
                    <jet-input-error
                        :message="form.errors.end_date"
                        class="mt-2"
                    />
                </div>
            </template>

            <template v-else>
                <div class="col-span-6 sm:col-span-4">
                    <div
                        class="
                            flex
                            items-center
                            bg-blue-500
                            text-white text-sm
                            font-bold
                            px-4
                            py-3
                        "
                        role="alert"
                    >
                        <svg
                            class="fill-current w-4 h-4 mr-2"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                        >
                            <path
                                d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"
                            />
                        </svg>
                        <p>Unscheduled Project</p>
                    </div>
                </div>
            </template>

            <!-- Note -->
            <div v-if="!form.unscheduled" class="col-span-6 sm:col-span-4">
                <div
                    class="
                        flex
                        items-center
                        bg-blue-500
                        text-white text-sm
                        font-bold
                        px-4
                        py-3
                    "
                    role="alert"
                >
                    <svg
                        class="fill-current w-4 h-4 mr-2"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                    >
                        <path
                            d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"
                        />
                    </svg>
                    <p>You can change due dates at any time.</p>
                </div>
            </div>

            <!-- Financials -->
            <div class="col-span-6 sm:col-span-4">
                <h1 class="text-base font-semibold mb-4">Financials</h1>

                <jet-label for="budget" value="Budget" />
                <jet-input
                    id="budget"
                    type="number"
                    class="mt-1 block w-full"
                    min="0"
                    v-model="form.budget"
                    autofocus
                />
                <jet-input-error :message="form.errors.budget" class="mt-2" />
            </div>

            <!-- Billing -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="billing" value="Billing" />
                <jet-input
                    id="billing"
                    type="number"
                    class="mt-1 block w-full"
                    min="0"
                    v-model="form.billing"
                    autofocus
                />
                <jet-input-error :message="form.errors.billing" class="mt-2" />
            </div>

            <!-- Billing Type -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="billing_rate" value="Billing Rate" />
                <select
                    class="
                        border-gray-300
                        focus:border-indigo-300
                        focus:ring
                        focus:ring-indigo-200
                        focus:ring-opacity-50
                        rounded-md
                        shadow-sm
                        mt-1
                        block
                        w-full
                    "
                    v-model="form.billing_rate"
                >
                    <option value="hourly">Hourly</option>
                    <option value="fixed_fee">Fixed Fee</option>
                </select>
                <jet-input-error
                    :message="form.errors.billing_rate"
                    class="mt-2"
                />
            </div>

            <!-- Estimated Hours -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="estimated_hours" value="Estimated Hours" />
                <jet-input
                    id="estimated_hours"
                    type="number"
                    class="mt-1 block w-full"
                    min="0"
                    v-model="form.estimated_hours"
                    autofocus
                />
                <jet-input-error
                    :message="form.errors.estimated_hours"
                    class="mt-2"
                />
            </div>

            <!-- Estimated Costs -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="estimated_costs" value="Estimated Costs" />
                <jet-input
                    id="estimated_costs"
                    type="number"
                    class="mt-1 block w-full"
                    min="0"
                    v-model="form.estimated_costs"
                    autofocus
                />
                <jet-input-error
                    :message="form.errors.estimated_costs"
                    class="mt-2"
                />
            </div>
        </template>

        <template #actions>
            <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                Saved.
            </jet-action-message>

            <jet-button
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
            >
                Save New Project
            </jet-button>
        </template>
    </jet-form-section>
</template>

<script>
import JetButton from "@/Jetstream/Button";
import JetFormSection from "@/Jetstream/FormSection";
import JetInput from "@/Jetstream/Input";
import JetInputError from "@/Jetstream/InputError";
import JetTextarea from "@/Jetstream/Textarea";
import JetLabel from "@/Jetstream/Label";
import JetActionMessage from "@/Jetstream/ActionMessage";
import JetSecondaryButton from "@/Jetstream/SecondaryButton";
import JetCheckbox from "@/Jetstream/Checkbox";
import Tiptap from "@/Jetstream/Tiptap";
import Multiselect from "@vueform/multiselect";
import { DatePicker } from "v-calendar";
import moment from "moment";

export default {
    props: [
        "project_categories",
        "project_category_lists",
        "clients",
        "assignee",
        "project_managers",
    ],

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
        DatePicker,
    },

    data() {
        return {
            form: this.$inertia.form({
                name: "",
                description: "",
                category_id: "",
                start_date: new Date(),
                end_date: new Date(),
                client_id: "",
                assigned_to_id: "",
                project_manager_id: "",
                budget: "",
                billing: "",
                billing_rate: "",
                estimated_hours: "",
                estimated_costs: "",
                unscheduled: false,
            }),
        };
    },

    methods: {
        createNewProject() {
            this.form.post(route("projects.store"), {
                errorBag: "createNewProject",
                preserveScroll: true,
            });
        },

        formatDate(date) {
            if (date != null) {
                return moment(date).format("YYYY-MM-DD");
            }
        },
    },
};
</script>
