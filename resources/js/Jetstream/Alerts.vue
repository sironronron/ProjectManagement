<template>
    <div>
        <div v-if="flash.success">
            <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-green-500 mb-4">
                <span class="text-xl inline-block mr-5 align-middle">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </span>
                <span class="inline-block align-middle mr-8">
                    <b class="capitalize">Success!</b> {{ flash.success }}
                </span>
                <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none" @click="remove_flash">
                    <span>×</span>
                </button>
            </div>
        </div>

        <!-- Failed Alert -->
        <div v-if="flash.failed">
            <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-red-500 mb-4">
                <span class="text-xl inline-block mr-5 align-middle">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </span>
                <span class="inline-block align-middle mr-8">
                    <b class="capitalize">Error!</b> {{ flash.failed }}
                </span>
                <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none" @click="remove_flash">
                    <span>×</span>
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    import $ from 'jquery'

    export default {
        props: ['flash'],

        methods: {
            remove_flash () {
                if (this.flash.success != null) {
                    this.flash.success = null;
                }

                else if (this.flash.failed != null) {
                    this.flash.failed = null
                }
            }
        },

        mounted() {
            if (this.flash.success != null) {
                $("#main-notification").removeClass("hidden");
                $("#main-notification").css("transform", "translate(0%,0px)");
                setTimeout(function () {
                    $("#main-notification").addClass("hidden");
                }, 3000);
            }
        },
    }
</script>