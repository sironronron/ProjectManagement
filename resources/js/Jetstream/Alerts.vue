<template>
    <div>
        <div v-if="flash.success">
            <div role="alert" class="z-20 px-5 sm:px-10 xl:w-1/3 mx-auto sm:mx-0 sm:w-6/12 md:w-3/5 w-11/12 bg-white shadow-lg rounded flex sm:flex-row flex-col pr-4 absolute left-0 sm:left-auto right-0 sm:top-0 sm:mr-6 mt-16 sm:mt-6 mb-6 sm:mb-0 transition duration-1000 ease-in-out hidden" id="main-notification">
                <div class="sm:px-6 p-2 ml-4 sm:ml-0 mt-4 sm:mt-0 flex items-center justify-center bg-green-400 sm:rounded-tl sm:rounded-bl w-12 h-12 sm:h-auto sm:w-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="none" viewBox="0 0 24 24" stroke="#ffffff">
                    <path class="heroicon-ui" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div
                class="flex flex-col justify-center pl-4 sm:w-9/12 sm:pt-6 pb-6 pt-2"
                >
                <p class="text-lg text-gray-800 font-semibold pb-1">
                    Success
                </p>
                <p class="text-sm text-gray-600 font-normal">
                    {{ flash.success }}
                </p>
                </div>
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