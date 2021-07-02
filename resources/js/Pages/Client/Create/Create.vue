<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create new client
            </h2>
        </template>

        <div>
            <div class="container mx-auto py-6">
                <alerts v-if="!!$page.props.flash" :flash="$page.props.flash" />

                <div>
                    <create-client-form :categories="categories" />

                    <jet-section-border />
                </div>

                <div>
                    <create-client-category-form />

                    <jet-section-border />
                </div>

                <div>
                    <client-category-manager :categories="categories" />
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Alerts from '@/Jetstream/Alerts'
    import JetSectionBorder from '@/Jetstream/SectionBorder'

    // Forms
    import CreateClientForm from './CreateClientForm'
    import CreateClientCategoryForm from './CreateClientCategoryForm'

    // Managers
    import ClientCategoryManager from '../ClientCategoryManager'

    export default {
        props: ['categories'],

        components: {
            AppLayout,
            Alerts,
            JetSectionBorder,
            CreateClientForm,
            CreateClientCategoryForm,
            ClientCategoryManager
        }    
    }
</script>