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

                            <div class="mt-5" v-if="$slots.body">
                                <slot name="body" />
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
        mixins: [Popup],

        data() {
            return {
                todos: [
                    {
                        title: "Add tasks to list",
                    },
                    {
                        title: "Get grocery",
                    },      
                    {
                        title: "Take the kids to the park",
                    },
                    {
                        title: "Get my car washed",
                    }       
                ],
                taskDate: "9th September 2020 at 18:00"
            }
        }
    }
</script>
<style scoped>
    body {
        font-family: "Lato", sans-serif;
    }

    @media screen and (min-width: 375px) {
        .custom-width {
            width: 40rem;
        }
    }

    @media screen and (min-width: 1300px) {
        .custom-width {
            width: 50%;
        }
    }

    .text-orange {
        color: #F6AD55;
    }



    .bg-custom-yellow {
        Background: #B8C819;
    }



    .bg-custom-gray-2 {
        background: #DEDEDE;
    }

    .bg-custom-orange {
        background: #FFFAF0;
        box-shadow: inset -1px 0px #D0D5D9;
    }

    .bg-custom-gray {
        background: #F1F1F1;
    }

    .border-custom-green {
        border-left: 4px solid #19C89A;
        border-radius: 4px;
    }
</style>