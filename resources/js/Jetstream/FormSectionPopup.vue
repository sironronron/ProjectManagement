<template>
    <div id="popup" class="fixed overflow-y-scroll hidden inset-0 z-50">
        <div @click="Popup(false)" class="absolute inset-0 bg-gray-900 bg-opacity-75 z-0"></div>
        <div class="flex w-full justify-end">
            <div class="bg-white w-full md:w-11/12 xl:w-2/5 pt-12 px-12 min-h-screen z-50">
                <div class="container flex flex-col w-full h-full justify-between">
                    <div>
                        <div class="flex w-full justify-between items-center">
                            <h2 class="text-4xl font-bold text-dark" v-if="$slots.header">
                                <slot name="header"></slot>
                            </h2>
                            <div @click="Popup(false)" class="block lg:hidden ml-5">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#718096" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z"></path>
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </div>
                        </div>

                        <div class="mt-5">
                            <form @submit.prevent="$emit('submitted')">
                                <slot name="form" />

                                <div class="flex items-center justify-end">
                                    <slot name="actions" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Popup from '@/Mixins/Index'

    export default {
        emits: ['submitted'],

        mixins: [Popup]    
    }
</script>