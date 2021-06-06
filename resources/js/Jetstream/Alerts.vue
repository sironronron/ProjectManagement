<template>
    <div>
        <div v-if="flash.success">
            <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-green-400 mb-4">
                <span class="text-xl inline-block mr-5 align-middle">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
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
    export default {
        props: ['flsah'],

        methods: {
            remove_flash () {
                if (flash.success != null) {
                    flash.success = null;
                }

                else if (flash.faield != null) {
                    flash.failed = null
                }
            }
        }
    }
</script>