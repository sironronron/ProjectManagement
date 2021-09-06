<template>
    <div>
        <p class="text-sm font-semibodl text-gray-600">Timer</p>

        <div class="flex flex-wrap items-center">
            <div class="text-2xl text-gray-600">
                <template v-if="showTimerForProject(project_timer)">
                    <div class="flex items-center">
                        <span class="mr-3">
                            <strong>{{ activeTimerString }}</strong>
                        </span>
                        <span @click="stopTimer">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6 text-gray-600 cursor-pointer"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                />
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 10a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 01-1-1v-4z"
                                />
                            </svg>
                        </span>
                    </div>
                </template>

                <template v-else>
                    <div class="flex items-center">
                        <span class="mr-3">
                            <strong>{{
                                calculateTimeSpent(project_timer)
                            }}</strong>
                        </span>
                        <span v-if="task.completed == 0" @click="saveNewTimer">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6 text-gray-600 cursor-pointer"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"
                                />
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                />
                            </svg>
                        </span>
                    </div>
                </template>
            </div>
        </div>
    </div>
</template>

<script>
import moment from "moment";

export default {
    props: ["task", "project_timer"],

    data() {
        return {
            activeTimerString: "Calculating...",
            counter: { seconds: 0, timer: null },
        };
    },

    mounted: function () {
        if (this.project_timer) {
            if (this.project_timer.stopped_at == null) {
                this.startTimer();
            }
        }
    },

    methods: {
        /**
         * Conditionally pads a number with 0
         */
        _padNumber: (number) =>
            number > 9 || number === 0 ? number : "0" + number,

        /**
         * Splits seconds into hours, minutes, and seconds.
         */
        _readableTimeFromSeconds: function (seconds) {
            const hours = 3600 > seconds ? 0 : parseInt(seconds / 3600, 10);
            return {
                hours: this._padNumber(hours),
                seconds: this._padNumber(seconds % 60),
                minutes: this._padNumber(parseInt(seconds / 60, 10) % 60),
            };
        },

        /**
         * Calculate the amount of time spent on the project using the timer object.
         */
        calculateTimeSpent: function () {
            if (this.project_timer) {
                if (this.project_timer.stopped_at) {
                    const started = moment(this.project_timer.started_at);
                    const stopped = moment(this.project_timer.stopped_at);
                    const time = this._readableTimeFromSeconds(
                        parseInt(
                            moment.duration(stopped.diff(started)).asSeconds()
                        )
                    );
                    return `${time.hours}:${time.minutes}:${time.seconds}`;
                }
            }
            return "00:00:00";
        },

        /**
         * Determines if there is an active timer and whether it belongs to the project
         * passed into the function.
         */
        showTimerForProject: function () {
            if (this.project_timer) {
                if (this.project_timer.stopped_at != null) {
                    return false;
                } else {
                    return true;
                }
            }
        },

        saveNewTimer: function () {
            this.$inertia.post(
                route("projects.tasks.start.timer", this.task.unique_id),
                {},
                {
                    preserveScroll: true,
                    onSuccess: () => this.startTimer()
                }
            );
        },

        /**
         * Start counting the timer. Tick tock.
         */
        startTimer: function (timer = this.project_timer) {
            const started = moment(timer.started_at);

            this.counter.timer = timer;
            this.counter.seconds = parseInt(
                moment.duration(moment().diff(started)).asSeconds()
            );

            this.counter.ticker = setInterval(() => {
                const time = this._readableTimeFromSeconds(
                    ++this.counter.seconds
                );

                this.activeTimerString = `${time.hours}:${time.minutes}:${time.seconds}`;
            }, 1000);
        },

        /**
         * Stop the timer from the API and then from the local counter.
         */
        stopTimer: function () {
            this.$inertia.post(
                route("projects.tasks.stop.timer", this.task.unique_id),
                {
                    _method: 'PUT',
                },
                {
                    preserveScroll: true,
                    onSuccess: () => {
                        // Stop the ticker
                        clearInterval(this.counter.ticker);
                        // Reset the counter and timer string
                        this.counter = { seconds: 0, timer: null };
                        this.activeTimerString = "Calculating...";
                    },
                }
            );
        },
    },
};
</script>
