<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Manage client category
            </h2>
        </template>

        <div>
            <div>
                <alerts v-if="!!$page.props.flash" :flash="$page.props.flash" />

                <div>
                    <update-category-form :client_category="client_category" />

                    <jet-section-border />
                </div>

                <div>
                    <client-category-manager :categories="client_categories" />
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import JetSectionBorder from '@/Jetstream/SectionBorder'
    
    // Update Form
    import UpdateCategoryForm from './UpdateCategoryForm'

    // Manager
    import ClientCategoryManager from '../ClientCategoryManager'

    export default {
        props: ['client_category', 'client_categories'],

        components: {
            AppLayout,
            JetSectionBorder,
            UpdateCategoryForm,
            ClientCategoryManager
        }
    }
</script>