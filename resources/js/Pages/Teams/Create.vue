<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Team
            </h2>
        </template>

        <div>
            <create-team-form />
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import CreateTeamForm from "./CreateTeamForm";

export default {
    components: {
        AppLayout,
        CreateTeamForm,
    },
};
</script>
