<template>
    <div>
        <div class="flex flex-wrap mb-5">
            <div class="w-full">
                <div class="bg-white flex flex-col items-start justify-between pt-4 sm:pt-8 px-3 sm:px-6 shadow rounded-t">
                    <div class="flex items-center mb-4 xl:mb-0">
                        <h2 class="text-gray-800 text-2xl">
                            {{ project.name }}
                        </h2>
                    </div>
                    <div class="mb-4 lg:hidden w-full">
                        <div class="w-full p-3 rounded text-gray-600">
                            <ul>
                                <li class="text-sm text-gray-600 my-2 text-base">
                                    <inertia-link :href="route('projects.show', project.unique_id)">
                                        Overview
                                    </inertia-link>
                                </li>
                                <li class="text-sm text-gray-600 my-2 text-base">
                                    <inertia-link :href="route('projects.show.milestones', project.unique_id)">
                                        Milestones
                                    </inertia-link>
                                </li>
                                <li class="text-sm text-gray-600 my-2 text-base">
                                    <inertia-link :href="route('projects.show.tasks', project.unique_id)">
                                        Tasks
                                    </inertia-link>
                                </li>
                                <li class="text-sm text-gray-600 my-2 text-base">
                                    <inertia-link :href="route('projects.show.teams', project.unique_id)">
                                        Teams
                                    </inertia-link>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <ul class="hidden lg:flex items-center mt-0 sm:mt-5">
                        <inertia-link :href="route('projects.show', project.unique_id)">
                            <li class="font-normal flex justify-center items-center text-sm mr-4 sm:mr-8 md:mr-8 lg:mr-8 xl:mr-8 border-b-2 pb-4 hover:text-indigo-700" :class="route().current('projects.show') ? 'border-indigo-500 text-indigo-500' : 'cursor-pointer'">
                                Overview
                            </li>
                        </inertia-link>

                        <inertia-link :href="route('projects.show.milestones', project.unique_id)">
                            <li class="font-normal flex justify-center items-center text-sm mr-4 sm:mr-8 md:mr-8 lg:mr-8 xl:mr-8 border-b-2 pb-4 hover:text-indigo-700" :class="route().current('projects.show.milestones') || route().current('projects.create.milestones') || route().current('projects.edit.milestones') ? 'border-indigo-500 text-indigo-500' : 'cursor-pointer'">
                                Milestones
                            </li>
                        </inertia-link>

                        <inertia-link :href="route('projects.show.tasks', project.unique_id)">
                            <li class="font-normal flex justify-center items-center text-sm mr-4 sm:mr-8 md:mr-8 lg:mr-8 xl:mr-8 border-b-2 pb-4 hover:text-indigo-700" :class="route().current('projects.show.tasks') ? 'border-indigo-500 text-indigo-500' : 'cursor-pointer'">
                                Tasks
                            </li>
                        </inertia-link>

                        <inertia-link :href="route('projects.show.teams', project.unique_id)">
                            <li class="font-normal flex justify-center items-center text-sm mr-4 sm:mr-8 md:mr-8 lg:mr-8 xl:mr-8 border-b-2 pb-4 hover:text-indigo-700" :class="route().current('projects.show.teams') || route().current('projects.create.teams') ? 'border-indigo-500 text-indigo-500' : 'cursor-pointer'">
                                Teams
                            </li>
                        </inertia-link>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import $ from "jquery";
export default {
    props: ['project', 'billing', 'billing_rate', 'budget', 'remaining_budget', 'project_teams_count'],
    data: function () {
        return {
        mobileMenu: true,
        menu: true,
        users: [
            {
            id: "1",
            name: "Shad Jast",
            lastComment: "You can access the webapp through here",
            },
            {
            id: "2",
            name: "Duane Metz",
            lastComment: "You can access the webapp through here",
            },
            {
            id: "3",
            name: "Myah Kris",
            lastComment: "You can access the webapp through here",
            },
            {
            id: "4",
            name: "Dr. Kamron Wunsch",
            lastComment: "You can access the webapp through here",
            },
        ],
        selected: [],
        };
    },
    mounted() {
        window.onclick = function (event) {
        if (!event.target.matches(".dropbtn")) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains("show")) {
                openDropdown.classList.remove("show");
            }
            }
        }
        };
        $(document).ready(function () {
        $("#notification-btn").click(function () {
            $("#notification-modal").toggle();
        });
        $("#edit-delete-button").click(function () {
            $("#edit-delete-list").toggle();
        });
        $("#main-notification").css("transform", "translate(120%,0px)");
        $("#main-notification").removeClass("hidden");
        $("#edit-project").click(function () {
            $("#main-notification").css("transform", "translate(0%,0px)");
            setTimeout(function () {
            $("#main-notification").css("transform", "translate(120%,0px)");
            }, 3000);
        });
        $("#progress-bar-1").animate(
            {
            width: "58%",
            },
            {
            queue: false,
            duration: 3000,
            }
        );
        $("#progress-bar-2").animate(
            {
            width: "25%",
            },
            {
            queue: false,
            duration: 3000,
            }
        );
        $("#progress-bar-3").animate(
            {
            width: "80%",
            },
            {
            queue: false,
            duration: 3000,
            }
        );
        $(".member-list-main").click(function () {
            $(this).find(".member-tooltip").toggle();
        });
        $(".small-icons").mouseenter(function () {
            $(this).find(".tooltip").show();
        });
        $(".small-icons").mouseleave(function () {
            $(this).find(".tooltip").hide();
        });
        $("#table-filter").click(function () {
            $("#table-filter ul").toggle();
        });

        $("#addReport-btn").click(function () {
            $("#report-modal").fadeIn();
        });
        $(".report-cancel,.report-close").click(function () {
            $("#report-modal").fadeOut();
        });
        $("#downloadAll-btn").click(function () {
            $("#download-modal").fadeIn();
        });
        $(".download-cancel,.download-close").click(function () {
            $("#download-modal").fadeOut();
        });
        $(".back-view").click(function () {
            $("#view-para").html("Viewing 1 - 20 of 50");
        });
        $(".next-view").click(function () {
            $("#view-para").html("Viewing 30 - 50 of 50");
        });

        $(".tooltip-corner").mouseenter(function () {
            $(this).find(".tooltip").show();
        });
        $(".tooltip-corner").mouseleave(function () {
            $(this).find(".tooltip").hide();
        });

        $("#all-check").click(function () {
            if (this.checked) {
            $("#main-table input:checkbox").attr("checked", "checked");
            $("#main-table tr").addClass("bg-gray-100");
            } else {
            $("#main-table input:checkbox").removeAttr("checked");
            $("#main-table tr").removeClass("bg-gray-100");
            }
        });
        });
    },
    computed: {
        selectAll: {
        get: function () {
            return this.users ? this.selected.length == this.users.length : false;
        },
        set: function (value) {
            var selected = [];

            if (value) {
            this.users.forEach(function (user) {
                selected.push(user.id);
            });
            }

            this.selected = selected;
        },
        },
    },
    methods: {
        dropdownFunction(element) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            dropdowns[i].classList.remove("show");
        }
        element.nextSibling.nextSibling.classList.toggle("show");
        },
        tableInteract(element) {
        if (element.checked) {
            $(element).parentsUntil("tbody").addClass("bg-gray-100");
        } else {
            $(element).parentsUntil("tbody").removeClass("bg-gray-100");
        }
        },
        WeeklyFilter(text) {
        $("#weekFilter").html(text);
        },
        ListFilterFunction(percentage, tasks, innerText) {
        $("#filter-value").html(innerText);
        $("#pie-percent").html(percentage);
        $("#completed-task").html(tasks);
        },
        // Avatar Dropdown
        dropdownHandler() {
        this.menu = !this.menu;
        },
        //Hamburger and mobile menu
        MenuHandler() {
        this.mobileMenu = !this.mobileMenu;
        },
    },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.leading-line {
  line-height: 2.75rem;
}
* {
  outline: none !important;
  -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
  -webkit-tap-highlight-color: transparent;
}
.hide {
  display: none;
}

.hover-modal:hover + .hide {
  display: block;
}

.dropdown-content {
  display: none;
  min-width: 160px;
}

.show {
  display: block;
}
</style>

