<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="w-full">
          <!-- Place your content here -->

          <div class="container mx-auto">
            <div class="flex flex-wrap">
              <div
                class="grid w-full sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8"
              >
                <div
                  class="bg-white rounded flex items-center justify-between px-5 relative shadow transition duration-150 ease-in-out hover:shadow-md cursor-pointer"
                >
                  <div class="absolute w-2 h-4 bg-indigo-500 left-0"></div>
                  <h3
                    class="py-6 leading-4 text-gray-800 font-normal text-base"
                  >
                    Total Milestones
                  </h3>
                  <h2 class="text-gray-800 text-2xl leading-normal font-bold">
                    2,330
                  </h2>
                </div>
                <div
                  class="bg-white rounded flex items-center justify-between px-5 relative shadow transition duration-150 ease-in-out hover:shadow-md cursor-pointer"
                >
                  <div class="absolute w-2 h-4 bg-indigo-500 left-0"></div>
                  <h3
                    class="py-6 leading-4 text-gray-800 font-normal text-base"
                  >
                    Avg. Productivity
                  </h3>
                  <h2 class="text-gray-800 text-2xl leading-normal font-bold">
                    22.3%
                  </h2>
                </div>
                <div
                  class="bg-white rounded flex items-center justify-between px-5 relative shadow transition duration-150 ease-in-out hover:shadow-md cursor-pointer"
                >
                  <div class="absolute w-2 h-4 bg-indigo-500 left-0"></div>
                  <h3
                    class="py-6 leading-4 text-gray-800 font-normal text-base"
                  >
                    Total Sales
                  </h3>
                  <h2 class="text-gray-800 text-2xl leading-normal font-bold">
                    20.2K
                  </h2>
                </div>
                <div
                  class="bg-white rounded flex items-center justify-between px-5 relative shadow transition duration-150 ease-in-out hover:shadow-md cursor-pointer"
                >
                  <div class="absolute w-2 h-4 bg-indigo-500 left-0"></div>
                  <h3
                    class="py-6 leading-4 text-gray-800 font-normal text-base"
                  >
                    Profit Earned
                  </h3>
                  <h2 class="text-gray-800 text-2xl leading-normal font-bold">
                    8,340
                  </h2>
                </div>
              </div>
            </div>
          </div>

          <div
            class="container mx-auto grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 pt-6 gap-8"
          >
            <router-link to='/project-overview'>
              <div
                class="rounded shadow bg-white p-4 transition duration-150 ease-in-out hover:shadow-md cursor-pointer"
              >
                <div class="flex items-center">
                  <img
                    class="w-10 h-10 rounded"
                    src="https://cdn.tuk.dev/assets/templates/Project+Management/pm_1.png"
                    alt
                  />
                  <div class="ml-2">
                    <p class="text-base text-gray-800">Munno Corp.</p>
                    <p class="text-xs text-gray-600">San Diego, California</p>
                  </div>
                </div>
                <p class="text-gray-800 mt-3 text-base font-semibold">
                  User Experience Optimization
                </p>
                <p class="text-gray-600 mt-3 text-xs leading-5">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                  do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
                <div class="flex flex-wrap items-center mt-3">
                  <p class="text-xs text-indigo-600">24 milestones</p>
                  <p
                    class="mx-2 rounded-full w-1 h-1 bg-gray-400 text-gray-600 font-bold text-center"
                  ></p>
                  <p class="text-xs text-indigo-600">3/9 tasks completed</p>
                </div>
                <div
                  class="mt-3 bg-indigo-100 hover:bg-indigo-700 text-indigo-600 hover:text-white h-6 w-24 mb-4 sm:mb-0 rounded-full flex items-center justify-center mr-8"
                >
                  <div class="flex items-center justify-center h-full w-full">
                    <span class="text-xs font-normal px-2">Details</span>
                    <div>
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="icon icon-tabler icon-tabler-arrow-narrow-right"
                        width="20"
                        height="20"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        fill="none"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      >
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <line x1="5" y1="12" x2="19" y2="12" />
                        <line x1="15" y1="16" x2="19" y2="12" />
                        <line x1="15" y1="8" x2="19" y2="12" />
                      </svg>
                    </div>
                  </div>
                </div>
              </div>
            </router-link>
            <router-link to='/project-overview'>
              <div
                class="rounded shadow bg-white p-4 transition duration-150 ease-in-out hover:shadow-md cursor-pointer"
              >
                <div class="flex items-center">
                  <img
                    class="w-10 h-10 rounded"
                    src="https://cdn.tuk.dev/assets/templates/Project+Management/pm_2.png"
                    alt
                  />
                  <div class="ml-2">
                    <p class="text-base text-gray-800">P&Y Studios</p>
                    <p class="text-xs text-gray-600">Seattle, Washington</p>
                  </div>
                </div>
                <p class="text-gray-800 mt-3 text-base font-semibold">
                  Front-End Review
                </p>
                <p class="text-gray-600 mt-3 text-xs leading-5">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                  do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
                <div class="flex flex-wrap items-center mt-3">
                  <p class="text-xs text-indigo-600">24 milestones</p>
                  <p
                    class="mx-2 rounded-full w-1 h-1 bg-gray-400 text-gray-600 font-bold text-center"
                  ></p>
                  <p class="text-xs text-indigo-600">3/9 tasks completed</p>
                </div>
                <div
                  class="mt-3 bg-indigo-100 hover:bg-indigo-700 text-indigo-600 hover:text-white h-6 w-24 mb-4 sm:mb-0 rounded-full flex items-center justify-center mr-8"
                >
                  <div class="flex items-center justify-center h-full w-full">
                    <span class="text-xs font-normal px-2">Details</span>
                    <div>
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="icon icon-tabler icon-tabler-arrow-narrow-right"
                        width="20"
                        height="20"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        fill="none"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      >
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <line x1="5" y1="12" x2="19" y2="12" />
                        <line x1="15" y1="16" x2="19" y2="12" />
                        <line x1="15" y1="8" x2="19" y2="12" />
                      </svg>
                    </div>
                  </div>
                </div>
              </div>
            </router-link>
            <router-link to='/project-overview'>
              <div
                class="rounded shadow bg-white p-4 transition duration-150 ease-in-out hover:shadow-md cursor-pointer"
              >
                <div class="flex items-center">
                  <img
                    class="w-10 h-10 rounded"
                    src="https://cdn.tuk.dev/assets/templates/Project+Management/pm_3.png"
                    alt
                  />
                  <div class="ml-2">
                    <p class="text-base text-gray-800">Humming Bird</p>
                    <p class="text-xs text-gray-600">Toronto, Ontario</p>
                  </div>
                </div>
                <p class="text-gray-800 mt-3 text-base font-semibold">
                  AWS Services Setup
                </p>
                <p class="text-gray-600 mt-3 text-xs leading-5">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                  do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
                <div class="flex flex-wrap items-center mt-3">
                  <p class="text-xs text-indigo-600">24 milestones</p>
                  <p
                    class="mx-2 rounded-full w-1 h-1 bg-gray-400 text-gray-600 font-bold text-center"
                  ></p>
                  <p class="text-xs text-indigo-600">3/9 tasks completed</p>
                </div>
                <div
                  class="mt-3 bg-indigo-100 hover:bg-indigo-700 text-indigo-600 hover:text-white h-6 w-24 mb-4 sm:mb-0 rounded-full flex items-center justify-center mr-8"
                >
                  <div class="flex items-center justify-center h-full w-full">
                    <span class="text-xs font-normal px-2">Details</span>
                    <div>
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="icon icon-tabler icon-tabler-arrow-narrow-right"
                        width="20"
                        height="20"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        fill="none"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      >
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <line x1="5" y1="12" x2="19" y2="12" />
                        <line x1="15" y1="16" x2="19" y2="12" />
                        <line x1="15" y1="8" x2="19" y2="12" />
                      </svg>
                    </div>
                  </div>
                </div>
              </div>
            </router-link>
            <router-link to='/project-overview'>
              <div
                class="rounded shadow bg-white p-4 transition duration-150 ease-in-out hover:shadow-md cursor-pointer"
              >
                <div class="flex items-center">
                  <img
                    class="w-10 h-10 rounded"
                    src="https://cdn.tuk.dev/assets/templates/Project+Management/pm_4.png"
                    alt
                  />
                  <div class="ml-2">
                    <p class="text-base text-gray-800">Kool & Kalm</p>
                    <p class="text-xs text-gray-600">Montreal, Quebec</p>
                  </div>
                </div>
                <p class="text-gray-800 mt-3 text-base font-semibold">
                  Back-End Revamp
                </p>
                <p class="text-gray-600 mt-3 text-xs leading-5">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                  do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
                <div class="flex flex-wrap items-center mt-3">
                  <p class="text-xs text-indigo-600">24 milestones</p>
                  <p
                    class="mx-2 rounded-full w-1 h-1 bg-gray-400 text-gray-600 font-bold text-center"
                  ></p>
                  <p class="text-xs text-indigo-600">3/9 tasks completed</p>
                </div>
                <div
                  class="mt-3 bg-indigo-100 hover:bg-indigo-700 text-indigo-600 hover:text-white h-6 w-24 mb-4 sm:mb-0 rounded-full flex items-center justify-center mr-8"
                >
                  <div class="flex items-center justify-center h-full w-full">
                    <span class="text-xs font-normal px-2">Details</span>
                    <div>
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="icon icon-tabler icon-tabler-arrow-narrow-right"
                        width="20"
                        height="20"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        fill="none"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      >
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <line x1="5" y1="12" x2="19" y2="12" />
                        <line x1="15" y1="16" x2="19" y2="12" />
                        <line x1="15" y1="8" x2="19" y2="12" />
                      </svg>
                    </div>
                  </div>
                </div>
              </div>
            </router-link>
          </div>

          <div class="container pt-6 mx-auto">
            <div class="flex flex-wrap">
              <div class="md:w-3/4 w-full pb-6 md:pb-0 md:pr-6">
                <div class="bg-white pb-4 rounded">
                  <div
                    class="w-full bg-white py-4 flex items-start sm:items-center justify-between xl:px-10 lg:px-6 sm:px-3 px-6 border-b border-gray-200 rounded-t"
                  >
                    <h2 class="px-1 text-gray-800 text-lg font-bold">
                      Total Progress
                    </h2>
                  </div>
                  <div class="mt-4 flex sm:flex-row flex-col items-center px-3">
                    <p
                      class="cursor-pointer sm:w-2/12 w-full text-center mb-4 sm:mb-0 text-gray-600 text-base sm:mr-0 md:mr-4 lg:mr-0 xl:mr-0"
                    >
                      Project 1
                    </p>
                    <div class="container mx-auto flex justify-center">
                      <div
                        class="w-full lg:mr-8 mr-3 h-2 bg-gray-200 rounded progress-div cursor-pointer"
                      >
                        <div
                          class="w-0 bg-indigo-500 h-2 rounded relative"
                          id="progress-bar-1"
                        >
                          <div class="absolute right-0">
                            <div
                              class="relative bg-indigo-500 shadow-lg px-2 py-1 rounded mt-4 -mr-5 progress-tag hidden"
                            >
                              <svg
                                class="absolute top-0 -mt-1 w-full right-0 left-0"
                                width="16px"
                                height="8px"
                                viewBox="0 0 16 8"
                                version="1.1"
                                xmlns="http://www.w3.org/2000/svg"
                              >
                                <g
                                  id="Page-1"
                                  stroke="none"
                                  stroke-width="1"
                                  fill="none"
                                  fill-rule="evenodd"
                                >
                                  <g
                                    id="Progress-Bars"
                                    transform="translate(-322.000000, -198.000000)"
                                    fill="#667EEA"
                                  >
                                    <g
                                      id="Group-4"
                                      transform="translate(310.000000, 198.000000)"
                                    >
                                      <polygon
                                        id="Triangle"
                                        points="20 0 28 8 12 8"
                                      />
                                    </g>
                                  </g>
                                </g>
                              </svg>
                              <p class="text-white text-xs font-bold">75%</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="mt-8 flex sm:flex-row flex-col items-center px-3">
                    <p
                      class="cursor-pointer sm:w-2/12 w-full text-center mb-4 sm:mb-0 text-gray-600 text-base sm:mr-0 md:mr-4 lg:mr-0 xl:mr-0"
                    >
                      Project 2
                    </p>
                    <div class="container mx-auto flex justify-center">
                      <div
                        class="w-full lg:mr-8 mr-3 h-2 bg-gray-200 rounded progress-div cursor-pointer"
                      >
                        <div
                          class="w-0 bg-indigo-500 h-2 rounded relative"
                          id="progress-bar-2"
                        >
                          <div class="absolute right-0">
                            <div
                              class="relative bg-indigo-500 shadow-lg px-2 py-1 rounded mt-4 -mr-5 progress-tag hidden"
                            >
                              <svg
                                class="absolute top-0 -mt-1 w-full right-0 left-0"
                                width="16px"
                                height="8px"
                                viewBox="0 0 16 8"
                                version="1.1"
                                xmlns="http://www.w3.org/2000/svg"
                              >
                                <g
                                  id="Page-1"
                                  stroke="none"
                                  stroke-width="1"
                                  fill="none"
                                  fill-rule="evenodd"
                                >
                                  <g
                                    id="Progress-Bars"
                                    transform="translate(-322.000000, -198.000000)"
                                    fill="#667EEA"
                                  >
                                    <g
                                      id="Group-4"
                                      transform="translate(310.000000, 198.000000)"
                                    >
                                      <polygon
                                        id="Triangle"
                                        points="20 0 28 8 12 8"
                                      />
                                    </g>
                                  </g>
                                </g>
                              </svg>
                              <p class="text-white text-xs font-bold">58%</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="mt-8 flex sm:flex-row flex-col items-center px-3">
                    <p
                      class="cursor-pointer sm:w-2/12 w-full text-center mb-4 sm:mb-0 text-gray-600 text-base sm:mr-0 md:mr-4 lg:mr-0 xl:mr-0"
                    >
                      Project 3
                    </p>
                    <div class="container mx-auto flex justify-center">
                      <div
                        class="w-full lg:mr-8 mr-3 h-2 bg-gray-200 rounded progress-div cursor-pointer"
                      >
                        <div
                          class="w-0 bg-indigo-500 h-2 rounded relative"
                          id="progress-bar-3"
                        >
                          <div class="absolute right-0">
                            <div
                              class="relative bg-indigo-500 shadow-lg px-2 py-1 rounded mt-4 -mr-5 progress-tag hidden"
                            >
                              <svg
                                class="absolute top-0 -mt-1 w-full right-0 left-0"
                                width="16px"
                                height="8px"
                                viewBox="0 0 16 8"
                                version="1.1"
                                xmlns="http://www.w3.org/2000/svg"
                              >
                                <g
                                  id="Page-1"
                                  stroke="none"
                                  stroke-width="1"
                                  fill="none"
                                  fill-rule="evenodd"
                                >
                                  <g
                                    id="Progress-Bars"
                                    transform="translate(-322.000000, -198.000000)"
                                    fill="#667EEA"
                                  >
                                    <g
                                      id="Group-4"
                                      transform="translate(310.000000, 198.000000)"
                                    >
                                      <polygon
                                        id="Triangle"
                                        points="20 0 28 8 12 8"
                                      />
                                    </g>
                                  </g>
                                </g>
                              </svg>
                              <p class="text-white text-xs font-bold">41%</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="mt-8 flex sm:flex-row flex-col items-center px-3">
                    <p
                      class="cursor-pointer sm:w-2/12 w-full text-center mb-4 sm:mb-0 sm:mr-0 md:mr-4 lg:mr-0 xl:mr-0 text-gray-600 text-base"
                    >
                      Project 4
                    </p>
                    <div class="container mx-auto flex justify-center">
                      <div
                        class="w-full lg:mr-8 mr-3 h-2 bg-gray-200 rounded progress-div cursor-pointer"
                      >
                        <div
                          class="w-0 bg-indigo-500 h-2 rounded relative"
                          id="progress-bar-4"
                        >
                          <div class="absolute right-0">
                            <div
                              class="relative bg-indigo-500 shadow-lg px-2 py-1 rounded mt-4 -mr-5 progress-tag hidden"
                            >
                              <svg
                                class="absolute top-0 -mt-1 w-full right-0 left-0"
                                width="16px"
                                height="8px"
                                viewBox="0 0 16 8"
                                version="1.1"
                                xmlns="http://www.w3.org/2000/svg"
                              >
                                <g
                                  id="Page-1"
                                  stroke="none"
                                  stroke-width="1"
                                  fill="none"
                                  fill-rule="evenodd"
                                >
                                  <g
                                    id="Progress-Bars"
                                    transform="translate(-322.000000, -198.000000)"
                                    fill="#667EEA"
                                  >
                                    <g
                                      id="Group-4"
                                      transform="translate(310.000000, 198.000000)"
                                    >
                                      <polygon
                                        id="Triangle"
                                        points="20 0 28 8 12 8"
                                      />
                                    </g>
                                  </g>
                                </g>
                              </svg>
                              <p class="text-white text-xs font-bold">50%</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="md:w-1/4 w-full">
                <div class="bg-white rounded pb-4">
                  <div
                    class="w-full bg-white py-3 flex items-start sm:items-center justify-between px-3 border-b border-gray-200 rounded-t"
                  >
                    <h2 class="text-gray-800 text-lg font-bold">
                      Weekly Progress
                    </h2>
                  </div>
                  <div
                    class="mt-2 mx-3 bg-indigo-100 flex items-center justify-between rounded border-gray-300 py-3 px-4 cursor-pointer relative"
                    id="weekly-div"
                  >
                    <div class="w-4/5">
                      <p class="text-sm text-gray-800" id="filter-value">
                        Fitbit Rebrand and UI
                      </p>
                      <ul
                        class="bg-white shadow rounded mt-3 py-1 right-0 left-0 absolute hidden"
                        id="weekly-list"
                      >
                        <li
                          class="cursor-pointer text-gray-600 text-sm leading-3 tracking-normal py-3 hover:bg-indigo-700 hover:text-white px-3 font-normal"
                          v-on:click="ListFilterFunction('10%',5,'Total-Milestones')"
                        >
                          Total Milestones
                        </li>
                        <li
                          class="cursor-pointer text-gray-600 text-sm leading-3 tracking-normal py-3 hover:bg-indigo-700 hover:text-white px-3 font-normal"
                          v-on:click="ListFilterFunction('15%','3', 'Avg. Productivity')"
                        >
                          Avg. Productivity
                        </li>
                        <li
                          class="cursor-pointer text-gray-600 text-sm leading-3 tracking-normal py-3 hover:bg-indigo-700 hover:text-white px-3 font-normal"
                          v-on:click="ListFilterFunction('57%',4,'Total Sales')"
                        >
                          Total Sales
                        </li>
                        <li
                          class="cursor-pointer text-gray-600 text-sm leading-3 tracking-normal py-3 hover:bg-indigo-700 hover:text-white px-3 font-normal"
                          v-on:click="ListFilterFunction('66%',3,'Profit Earned')"
                        >
                          Profit Earned
                        </li>
                      </ul>
                    </div>
                    <div class="w-1/5">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="float-right icon icon-tabler icon-tabler-chevron-down"
                        width="20"
                        height="20"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="#2c3e50"
                        fill="none"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      >
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <polyline points="6 9 12 15 18 9" />
                      </svg>
                    </div>
                  </div>

                  <div class="mx-3 mt-4">
                    <div class="flex justify-between">
                      <div class="flex flex-col items-center">
                        <div
                          class="h-32 w-2 bg-gray-200 rounded flex items-end"
                        >
                          <div
                            aria-orientation="vertical"
                            class="h-16 w-2 rounded bg-indigo-500"
                          ></div>
                        </div>
                        <p class="text-sm text-gray-600">M1</p>
                      </div>
                      <div class="flex flex-col items-center">
                        <div
                          class="h-32 w-2 bg-gray-200 rounded flex items-end"
                        >
                          <div
                            aria-orientation="vertical"
                            class="h-24 w-2 rounded bg-indigo-500"
                          ></div>
                        </div>
                        <p class="text-sm text-gray-600">M2</p>
                      </div>
                      <div class="flex flex-col items-center">
                        <div
                          class="h-32 w-2 bg-gray-200 rounded flex items-end"
                        >
                          <div
                            aria-orientation="vertical"
                            class="h-20 w-2 rounded bg-indigo-500"
                          ></div>
                        </div>
                        <p class="text-sm text-gray-600">M3</p>
                      </div>
                      <div class="flex flex-col items-center">
                        <div
                          class="h-32 w-2 bg-gray-200 rounded flex items-end"
                        >
                          <div
                            aria-orientation="vertical"
                            class="h-10 w-2 rounded bg-indigo-500"
                          ></div>
                        </div>
                        <p class="text-sm text-gray-600">M4</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="container pt-6 mx-auto">
            <div class="flex flex-wrap">
              <div class="w-full">
                <div class="mx-auto bg-white shadow rounded">
                  <div
                    class="py-6 xl:px-8 lg:px-8 md:px-8 px-4 flex justify-between items-center"
                  >
                    <p
                      class="font-bold text-sm xl:text-lg lg:text-lg md:text-lg text-gray-800"
                    >
                      23 December,
                      <span class="text-gray-500">Sunday</span>
                    </p>
                    <div
                      class="bg-gray-100 flex items-center xl:p-3 lg:p-3 md:p-3 p-2 rounded cursor-pointer relative"
                      id="weeklybutton"
                    >
                      <ul
                        class="bg-white shadow rounded mt-2 py-1 absolute right-0 left-0 top-0 mt-12 hidden"
                        id="weekly-toggle"
                      >
                        <li
                          class="cursor-pointer text-gray-600 text-sm leading-3 tracking-normal py-3 hover:bg-indigo-700 hover:text-white px-3 font-normal"
                          v-on:click="WeeklyFilter('This Week')"
                        >
                          This Week
                        </li>
                        <li
                          class="cursor-pointer text-gray-600 text-sm leading-3 tracking-normal py-3 hover:bg-indigo-700 hover:text-white px-3 font-normal"
                          v-on:click="WeeklyFilter('Past Three Days')"
                        >
                          Past Three Days
                        </li>
                        <li
                          class="cursor-pointer text-gray-600 text-sm leading-3 tracking-normal py-3 hover:bg-indigo-700 hover:text-white px-3 font-normal"
                          v-on:click="WeeklyFilter('Past 2 weeks')"
                        >
                          Past 2 weeks
                        </li>
                        <li
                          class="cursor-pointer text-gray-600 text-sm leading-3 tracking-normal py-3 hover:bg-indigo-700 hover:text-white px-3 font-normal"
                          v-on:click="WeeklyFilter('Past Month')"
                        >
                          Past Month
                        </li>
                      </ul>
                      <p class="text-sm text-gray-600">
                        Show:
                        <span class="text-indigo-500" id="weekFilter"
                          >This week</span
                        >
                      </p>
                      <div class="pl-2">
                        <svg
                          width="11px"
                          height="7px"
                          viewBox="0 0 11 7"
                          version="1.1"
                          xmlns="http://www.w3.org/2000/svg"
                          xmlns:xlink="http://www.w3.org/1999/xlink"
                        >
                          <g
                            stroke="none"
                            stroke-width="1"
                            fill="none"
                            fill-rule="evenodd"
                          >
                            <g
                              transform="translate(-844.000000, -3161.000000)"
                              fill="#718096"
                              fill-rule="nonzero"
                              stroke="#718096"
                              stroke-width="0.5"
                            >
                              <g transform="translate(154.000000, 3123.000000)">
                                <g transform="translate(567.000000, 23.000000)">
                                  <g transform="translate(12.000000, 9.000000)">
                                    <path
                                      d="M114.181858,14 C114.129829,14 114.080347,13.977125 114.045782,13.937 C113.9792,13.859375 113.986476,13.7405
                                                            114.061427,13.67225 L118.636701,9.5 L114.061427,5.328125 C113.986113,5.2595 113.9792,5.140625 114.045418,5.063375
                                                            C114.080347,5.02325 114.129829,5 114.181858,5 C114.226246,5 114.269179,5.016875 114.302288,5.046875 L118.877926,9.219125
                                                            C118.888477,9.228875 118.898301,9.238625 118.907397,9.249125 C119.041654,9.405125 119.028191,9.64325 118.87829,9.780125
                                                            L114.302288,13.953125 C114.268815,13.9835 114.226246,14 114.181858,14 Z"
                                      transform="translate(116.500000, 9.500000) rotate(-270.000000) translate(-116.500000, -9.500000)"
                                    />
                                  </g>
                                </g>
                              </g>
                            </g>
                          </g>
                        </svg>
                      </div>
                    </div>
                  </div>
                  <div class="xl:px-8 lg:px-8 md:px-8 px-4 py-2 bg-white">
                    <div class="xl:flex lg:flex md:flex sm:flex items-center">
                      <div class="xl:w-1/4 w-full mb-2 xl:mb-0">
                        <p class="text-sm text-gray-600">Tasks Scheduled: 24</p>
                      </div>
                      <div class="xl:w-1/4 w-full mb-2 xl:mb-0">
                        <p class="text-sm text-gray-600">Tasks Pending: 15</p>
                      </div>
                      <div class="xl:w-1/4 w-full mb-2 xl:mb-0">
                        <p class="text-sm text-gray-600">Tasks Completed: 09</p>
                      </div>
                      <div class="xl:w-1/4 w-full mb-2 xl:mb-0">
                        <button
                          id="task-btn"
                          class="sm:float-right bg-indigo-500 transition duration-150 ease-in-out hover:bg-indigo-600 rounded text-white px-6 py-2 text-xs"
                        >
                          Add Task
                        </button>
                      </div>
                    </div>
                    <div
                      id="task-modal"
                      class="hidden fixed z-10 pt-10 left-0 top-0 w-full h-full overflow-auto shadow-lg display: none;"
                      style="
                        background-color: rgb(0, 0, 0);
                        background-color: rgba(0, 0, 0, 0.4);
                      "
                    >
                      <div
                        role="alert"
                        class="container mx-auto w-11/12 md:w-2/3 max-w-lg"
                      >
                        <div
                          class="relative py-8 px-5 md:px-10 bg-white shadow-md rounded border border-gray-400 task-modal-inner"
                        >
                          <div
                            class="w-full flex justify-start text-gray-600 mb-3"
                          >
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              class="icon icon-tabler icon-tabler-new-section"
                              width="52"
                              height="52"
                              viewBox="0 0 24 24"
                              stroke-width="1.5"
                              stroke="currentColor"
                              fill="none"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            >
                              <path stroke="none" d="M0 0h24v24H0z" />
                              <line x1="9" y1="12" x2="15" y2="12" />
                              <line x1="12" y1="9" x2="12" y2="15" />
                              <path
                                d="M4 6v-1a1 1 0 0 1 1 -1h1m5 0h2m5 0h1a1 1 0 0 1 1 1v1m0 5v2m0 5v1a1 1 0 0 1 -1 1h-1m-5 0h-2m-5 0h-1a1 1 0 0 1 -1 -1v-1m0 -5v-2m0 -5"
                              />
                            </svg>
                          </div>
                          <h1
                            class="text-gray-800 font-lg font-bold tracking-normal leading-tight mb-4"
                          >
                            Add new task
                          </h1>
                          <label
                            for="name"
                            class="text-gray-800 text-sm font-bold leading-tight tracking-normal"
                          >
                            Task Title
                          </label>
                          <input
                            id="name"
                            class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border"
                            placeholder="Skype"
                          />
                          <label
                            for="desc"
                            class="text-gray-800 text-sm font-bold leading-tight tracking-normal"
                          >
                            Task Description
                          </label>
                          <textarea
                            type="text"
                            id="desc"
                            class="mb-5 items-start h-24 mt-2 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full flex p-3 text-sm border-gray-300 rounded border resize-none"
                            placeholder="
                                            "
                          ></textarea>
                          <label
                            for="time"
                            class="text-gray-800 text-sm font-bold leading-tight tracking-normal"
                          >
                            Set Time
                          </label>
                          <div class="relative mb-5 mt-2">
                            <div
                              class="absolute text-gray-600 flex items-center px-4 border-r h-full"
                            >
                              <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-clock"
                                width="20"
                                height="20"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                fill="none"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                              >
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <circle cx="12" cy="12" r="9" />
                                <polyline points="12 7 12 12 15 15" />
                              </svg>
                            </div>
                            <div
                              class="absolute right-0 text-gray-600 flex items-center pr-3 h-full"
                            >
                              <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="cursor-pointer icon icon-tabler icon-tabler-info-circle"
                                width="20"
                                height="20"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                fill="none"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                              >
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <circle cx="12" cy="12" r="9" />
                                <line x1="12" y1="8" x2="12.01" y2="8" />
                                <polyline points="11 12 12 12 12 16 13 16" />
                              </svg>
                            </div>
                            <input
                              id="time"
                              class="text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-16 text-sm border-gray-300 rounded border"
                              placeholder="9am to 10pm, Today"
                            />
                          </div>
                          <label
                            for="attendants"
                            class="text-gray-800 text-sm font-bold leading-tight tracking-normal"
                          >
                            Add Attendants
                          </label>
                          <div class="relative mb-5 mt-2">
                            <div
                              class="absolute text-gray-600 flex items-center px-4 border-r h-full"
                            >
                              <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-search"
                                width="20"
                                height="20"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                fill="none"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                              >
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <circle cx="10" cy="10" r="7" />
                                <line x1="21" y1="21" x2="15" y2="15" />
                              </svg>
                            </div>
                            <div
                              class="absolute right-0 text-gray-600 flex items-center pr-3 h-full"
                            >
                              <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="cursor-pointer icon icon-tabler icon-tabler-chevron-down"
                                width="22"
                                height="22"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                fill="none"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                              >
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <polyline points="6 9 12 15 18 9" />
                              </svg>
                            </div>
                            <input
                              id="attendants"
                              class="text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-16 text-sm border-gray-300 rounded border"
                              placeholder="Search by name or department"
                            />
                          </div>
                          <div class="mb-4 flex items-center flex-no-wrap">
                            <div class="w-8 h-8 bg-cover bg-center rounded-md">
                              <img
                                src="https://dh-ui.s3.amazonaws.com/assets/boy-smiling_23-2148155640.jpg"
                                alt
                                class="h-full w-full overflow-hidden object-cover rounded-full border-2 border-white shadow"
                              />
                            </div>
                            <div class="w-8 h-8 bg-cover rounded-md ml-1">
                              <img
                                src="https://dh-ui.s3.amazonaws.com/assets/photo-1564061170517-d3907caa96ea.jfif"
                                alt
                                class="h-full w-full overflow-hidden object-cover rounded-full border-2 border-white shadow"
                              />
                            </div>
                            <div
                              class="w-8 h-8 bg-cover rounded-md bg-center ml-1"
                            >
                              <img
                                src="https://dh-ui.s3.amazonaws.com/assets/photo-1566753323558-f4e0952af115.jfif"
                                alt
                                class="h-full w-full overflow-hidden object-cover rounded-full border-2 border-white shadow"
                              />
                            </div>
                          </div>
                          <label
                            for="tag"
                            class="text-gray-800 text-sm font-bold leading-tight tracking-normal"
                          >
                            Add Tag
                          </label>
                          <div class="relative w-1/3 mt-2">
                            <div
                              class="absolute right-0 text-gray-600 flex items-center justify-center pr-3 h-full pointer-events-none"
                            >
                              <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="cursor-pointer icon icon-tabler icon-tabler-chevron-down"
                                width="22"
                                height="22"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                fill="none"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                              >
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <polyline points="6 9 12 15 18 9" />
                              </svg>
                            </div>
                            <div
                              id="tag"
                              class="text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-2 text-sm border-gray-300 rounded border"
                            >
                              <select
                                class="w-full focus:outline-none h-full appearance-none"
                              >
                                <option class="w-full my-3 ml-1">Urgent</option>
                                <option class="w-full my-3 ml-1">
                                  Pending
                                </option>
                                <option class="w-full my-3 ml-1">
                                  Approve
                                </option>
                              </select>
                            </div>
                          </div>
                          <div
                            class="bg-red-200 h-6 w-20 mb-4 md:mb-0 rounded-md flex items-center justify-center my-4"
                          >
                            <span class="text-xs text-red-500 font-normal"
                              >Urgent</span
                            >
                          </div>
                          <div
                            class="flex items-center justify-start mt-4 w-full"
                          >
                            <button
                              class="focus:outline-none bg-gray-100 transition duration-150 text-gray-600 ease-in-out hover:border-gray-400 hover:bg-gray-300 border rounded px-8 py-2 text-sm"
                              id="cancel-task-modal"
                            >
                              Cancel
                            </button>
                            <button
                              class="focus:outline-none ml-3 transition duration-150 ease-in-out hover:bg-indigo-600 bg-indigo-700 rounded text-white px-8 py-2 text-sm"
                            >
                              Add Task
                            </button>
                          </div>
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            aria-label="Close"
                            class="close cursor-pointer absolute top-0 right-0 mt-4 mr-5 text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out icon icon-tabler icon-tabler-x"
                            width="20"
                            height="20"
                            viewBox="0 0 24 24"
                            stroke-width="2.5"
                            stroke="currentColor"
                            fill="none"
                            stroke-linecap="round"
                            id="close-task"
                            stroke-linejoin="round"
                          >
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <line x1="18" y1="6" x2="6" y2="18" />
                            <line x1="6" y1="6" x2="18" y2="18" />
                          </svg>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="xl:px-8 lg:px-8 md:px-8 px-4 py-6 bg-white">
                    <div
                      class="p-5 flex justify-between rounded mb-6 bg-gray-100"
                    >
                      <div class="w-3/5">
                        <p class="mb-2 text-sm font-bold text-gray-800">
                          UX Team Skype Session
                        </p>
                        <ul>
                          <li class="mb-2 text-xs text-gray-600">
                            - Design review of existing products completed in
                            the backlog
                          </li>
                          <li class="text-xs text-gray-600">
                            - Design quality assurance and developer handoff
                          </li>
                        </ul>
                      </div>
                      <div
                        class="w-3/12 flex flex-col items-end justify-between"
                      >
                        <p class="text-xs text-gray-600">From 9am - 10am</p>
                        <div
                          class="bg-gray-200 h-6 w-20 mb-4 md:mb-0 rounded-md flex items-center justify-center"
                        >
                          <span class="text-xs text-gray-600 font-normal"
                            >Meeting</span
                          >
                        </div>
                      </div>
                    </div>
                    <div
                      class="p-5 flex justify-between rounded mb-6 bg-gray-100 meeting-card"
                    >
                      <div class="w-3/5">
                        <p class="mb-4 text-sm font-bold text-gray-800">
                          Quality Assurance Exercises
                        </p>
                        <ul class="mb-5">
                          <li class="mb-2 text-xs text-gray-600">
                            But I must explain to you how all this mistaken idea
                            of denouncing pleasure and praising pain was born
                            and I will give you a complete account of the
                            system, and expound the actual teachings of the
                            great explorer of the truth, the master-builder of
                            human happiness
                          </li>
                        </ul>
                        <div
                          class="flex flex-wrap items-center relative cursor-pointer"
                        >
                          <div
                            class="w-6 h-6 bg-cover bg-center rounded-full border border-white relative shadow"
                          >
                            <img
                              class="h-full w-full object-cover rounded-full"
                              src="https://cdn.tuk.dev/assets/templates/Project+Management/pm_5.png"
                              alt
                            />
                          </div>
                          <div
                            class="w-6 h-6 bg-cover rounded-full -ml-1 border border-white shadow"
                          >
                            <img
                              class="h-full w-full object-cover rounded-full"
                              src="https://cdn.tuk.dev/assets/templates/Project+Management/pm_6.png"
                              alt
                            />
                          </div>
                          <div
                            class="w-6 h-6 bg-cover rounded-full bg-center -ml-1 border border-white shadow"
                          >
                            <img
                              class="h-full w-full object-cover rounded-full"
                              src="https://cdn.tuk.dev/assets/templates/Project+Management/pm_7.png"
                              alt
                            />
                          </div>
                          <div class="relative member-list-main">
                            <p class="text-xs ml-1 text-gray-600">
                              +3 attendees
                            </p>
                            <div
                              class="hidden absolute -mt-16 ml-24 shadow-lg bg-white pt-12 rounded member-tooltip"
                            >
                              <svg
                                class="absolute left-0 -ml-2 mt-1"
                                width="9px"
                                height="16px"
                                viewBox="0 0 9 16"
                                version="1.1"
                                xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink"
                              >
                                <g
                                  id="Page-1"
                                  stroke="none"
                                  stroke-width="1"
                                  fill="none"
                                  fill-rule="evenodd"
                                >
                                  <g
                                    id="Tooltips-"
                                    transform="translate(-874.000000, -1029.000000)"
                                    fill="#FFFFFF"
                                  >
                                    <g
                                      id="Group-3-Copy-16"
                                      transform="translate(850.000000, 975.000000)"
                                    >
                                      <g
                                        id="Group-2"
                                        transform="translate(24.000000, 0.000000)"
                                      >
                                        <polygon
                                          id="Triangle"
                                          transform="translate(4.500000, 62.000000) rotate(-90.000000) translate(-4.500000, -62.000000) "
                                          points="4.5 57.5 12.5 66.5 -3.5 66.5"
                                        />
                                      </g>
                                    </g>
                                  </g>
                                </g>
                              </svg>
                              <div class="w-full absolute top-0">
                                <input
                                  class="px-5 py-3 w-full focus:outline-none bg-gray-100 text-base text-gray-600"
                                  placeholder="Search for people to invite"
                                />
                              </div>
                              <div class="h-64 overflow-y-scroll">
                                <div
                                  class="flex mt-2 items-center justify-between flex-no-wrap mx-3 py-2 border-b border-gray-300"
                                >
                                  <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="text-gray-600 -ml-1 icon icon-tabler icon-tabler-chevron-left"
                                    width="20"
                                    height="20"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                  >
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <polyline points="15 6 9 12 15 18" />
                                  </svg>
                                  <div
                                    class="w-10 h-10 bg-cover bg-center rounded-md"
                                  >
                                    <img
                                      src="https://dh-ui.s3.amazonaws.com/assets/boy-smiling_23-2148155640.jpg"
                                      alt
                                      class="h-full w-full overflow-hidden object-cover rounded-full"
                                    />
                                  </div>
                                  <div
                                    class="w-10 h-10 bg-cover rounded-md ml-2"
                                  >
                                    <img
                                      src="https://dh-ui.s3.amazonaws.com/assets/photo-1564061170517-d3907caa96ea.jfif"
                                      alt
                                      class="h-full w-full overflow-hidden object-cover rounded-full"
                                    />
                                  </div>
                                  <div
                                    class="w-10 h-10 bg-cover rounded-md bg-center ml-2"
                                  >
                                    <img
                                      src="https://dh-ui.s3.amazonaws.com/assets/photo-1566753323558-f4e0952af115.jfif"
                                      alt
                                      class="h-full w-full overflow-hidden object-cover rounded-full"
                                    />
                                  </div>
                                  <div
                                    class="w-10 h-10 bg-cover rounded-md ml-2"
                                  >
                                    <img
                                      src="https://dh-ui.s3.amazonaws.com/assets/webapp/ui_elements/avatars/avatar4.jpg"
                                      alt
                                      class="h-full w-full overflow-hidden object-cover object-center rounded-full"
                                    />
                                  </div>
                                  <div
                                    class="w-10 h-10 bg-cover rounded-md ml-2"
                                  >
                                    <img
                                      src="https://dh-ui.s3.amazonaws.com/assets/photo-1575978108872-9b1429a19a0f.jfif"
                                      alt
                                      class="h-full w-full overflow-hidden object-cover object-center rounded-full"
                                    />
                                  </div>
                                  <div
                                    class="w-10 h-10 bg-cover rounded-md bg-center ml-2"
                                  >
                                    <img
                                      src="https://dh-ui.s3.amazonaws.com/assets/photo-1566753323558-f4e0952af115.jfif"
                                      alt
                                      class="h-full w-full overflow-hidden object-cover rounded-full"
                                    />
                                  </div>
                                  <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="text-gray-600 -mr-1 icon icon-tabler icon-tabler-chevron-right"
                                    width="20"
                                    height="20"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                  >
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <polyline points="9 6 15 12 9 18" />
                                  </svg>
                                </div>
                                <div
                                  class="mt-4 flex justify-between items-center px-4 py-2 hover:bg-gray-200"
                                >
                                  <div class="flex items-center">
                                    <img
                                      class="w-10 h-10 bg-cover rounded-full"
                                      src="https://dh-ui.s3.amazonaws.com/assets/boy-smiling_23-2148155640.jpg"
                                      alt
                                    />
                                    <div class="ml-2">
                                      <p class="text-sm text-gray-800">
                                        Carry Mathison
                                      </p>
                                      <p class="text-xs text-gray-600">
                                        carry.mt@gmail.com
                                      </p>
                                    </div>
                                  </div>
                                  <div
                                    class="bg-yellow-200 h-6 w-20 mb-4 md:mb-0 rounded-md flex items-center justify-center"
                                  >
                                    <span
                                      class="text-xs text-yellow-500 font-normal"
                                      >Pending</span
                                    >
                                  </div>
                                </div>
                                <div
                                  class="mt-4 flex justify-between items-center px-4 py-2 hover:bg-gray-200"
                                >
                                  <div class="flex items-center">
                                    <img
                                      class="w-10 h-10 bg-cover rounded-full"
                                      src="https://dh-ui.s3.amazonaws.com/assets/photo-1564061170517-d3907caa96ea.jfif"
                                      alt
                                    />
                                    <div class="ml-2">
                                      <p class="text-sm text-gray-800">
                                        Ronald McDonald
                                      </p>
                                      <p class="text-xs text-gray-600">
                                        ronald.md@gmail.com
                                      </p>
                                    </div>
                                  </div>
                                  <div
                                    class="bg-teal-200 h-6 w-16 mb-4 md:mb-0 rounded-md flex items-center justify-center"
                                  >
                                    <span
                                      class="text-xs text-teal-500 font-normal"
                                      >Going</span
                                    >
                                  </div>
                                </div>
                                <div
                                  class="mt-4 flex justify-between items-center px-4 py-2 hover:bg-gray-200"
                                >
                                  <div class="flex items-center">
                                    <img
                                      class="w-10 h-10 bg-cover rounded-full"
                                      src="https://dh-ui.s3.amazonaws.com/assets/photo-1575978108872-9b1429a19a0f.jfif"
                                      alt
                                    />
                                    <div class="ml-2">
                                      <p class="text-sm text-gray-800">
                                        Linda Johnson
                                      </p>
                                      <p class="text-xs text-gray-600">
                                        linda.jh@live.com
                                      </p>
                                    </div>
                                  </div>
                                  <div
                                    class="bg-gray-200 h-6 w-20 mb-4 md:mb-0 rounded-md flex items-center justify-center"
                                  >
                                    <span
                                      class="text-xs text-gray-500 font-normal"
                                      >Cancelled</span
                                    >
                                  </div>
                                </div>
                                <div
                                  class="mt-4 flex justify-between items-center px-4 py-2 hover:bg-gray-200"
                                >
                                  <div class="flex items-center">
                                    <img
                                      class="w-10 h-10 bg-cover rounded-full"
                                      src="https://dh-ui.s3.amazonaws.com/assets/boy-smiling_23-2148155640.jpg"
                                      alt
                                    />
                                    <div class="ml-2">
                                      <p class="text-sm text-gray-800">
                                        Carry Mathison
                                      </p>
                                      <p class="text-xs text-gray-600">
                                        carry.mt@gmail.com
                                      </p>
                                    </div>
                                  </div>
                                  <div
                                    class="bg-yellow-200 h-6 w-20 mb-4 md:mb-0 rounded-md flex items-center justify-center"
                                  >
                                    <span
                                      class="text-xs text-yellow-500 font-normal"
                                      >Pending</span
                                    >
                                  </div>
                                </div>
                                <div
                                  class="mt-4 flex justify-between items-center px-4 py-2 hover:bg-gray-200"
                                >
                                  <div class="flex items-center">
                                    <img
                                      class="w-10 h-10 bg-cover rounded-full"
                                      src="https://dh-ui.s3.amazonaws.com/assets/photo-1564061170517-d3907caa96ea.jfif"
                                      alt
                                    />
                                    <div class="ml-2">
                                      <p class="text-sm text-gray-800">
                                        Ronald McDonald
                                      </p>
                                      <p class="text-xs text-gray-600">
                                        ronald.md@gmail.com
                                      </p>
                                    </div>
                                  </div>
                                  <div
                                    class="bg-teal-200 h-6 w-16 mb-4 md:mb-0 rounded-md flex items-center justify-center"
                                  >
                                    <span
                                      class="text-xs text-teal-500 font-normal"
                                      >Going</span
                                    >
                                  </div>
                                </div>
                                <div
                                  class="my-4 flex justify-between items-center px-4 py-2 hover:bg-gray-200"
                                >
                                  <div class="flex items-center">
                                    <img
                                      class="w-10 h-10 bg-cover rounded-full"
                                      src="https://dh-ui.s3.amazonaws.com/assets/photo-1575978108872-9b1429a19a0f.jfif"
                                      alt
                                    />
                                    <div class="ml-2">
                                      <p class="text-sm text-gray-800">
                                        Linda Johnson
                                      </p>
                                      <p class="text-xs text-gray-600">
                                        linda.jh@live.com
                                      </p>
                                    </div>
                                  </div>
                                  <div
                                    class="bg-gray-200 h-6 w-20 mb-4 md:mb-0 rounded-md flex items-center justify-center"
                                  >
                                    <span
                                      class="text-xs text-gray-500 font-normal"
                                      >Cancelled</span
                                    >
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div
                        class="w-3/12 flex flex-col items-end justify-between"
                      >
                        <p class="text-xs text-gray-600">From 9am - 10am</p>
                        <div
                          class="bg-red-200 h-6 w-20 mb-4 md:mb-0 rounded-md flex items-center justify-center"
                        >
                          <span class="text-xs text-red-500 font-normal"
                            >Urgent</span
                          >
                        </div>
                      </div>
                    </div>
                    <div
                      class="p-5 flex justify-between rounded mb-6 bg-gray-100"
                    >
                      <div class="w-3/5">
                        <p class="mb-4 text-sm font-bold text-gray-800">
                          Engineering Review
                        </p>
                        <ul class="mb-5">
                          <li class="mb-2 text-xs text-gray-600">
                            But I must explain to you how all this mistaken idea
                            of denouncing pleasure and praising pain was born
                            and I will give you a complete account of the
                            system, and expound the actual teachings of the
                            great explorer of the truth, the master-builder of
                            human happiness
                          </li>
                        </ul>
                      </div>
                      <div
                        class="w-3/12 flex flex-col items-end justify-between"
                      >
                        <p class="text-xs text-gray-600">From 9am - 10am</p>
                        <div
                          class="bg-yellow-200 h-6 w-20 mb-4 md:mb-0 rounded-md flex items-center justify-center"
                        >
                          <span class="text-xs text-yellow-500 font-normal"
                            >Personal</span
                          >
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import $ from 'jquery'
    import AppLayout from '@/Layouts/AppLayout'

    export default {
        components: {
            AppLayout,
        },

        props: {
            current_team: Object,
            team_members: Object
        },

        data: function () {
            return {
                mobileMenu: true,
                menu: true,
            };
        },

        mounted() {
            $(document).ready(function () {
                $("#notification-btn").click(function () {
                    $("#notification-modal").toggle();
                });
                $("#task-btn").click(function () {
                    $("#task-modal").fadeIn();
                });
                $("#close-task,#cancel-task-modal").click(function () {
                    $("#task-modal").fadeOut();
                });

                $(".progress-div").mouseenter(function () {
                    $(this).find(".progress-tag").show();
                });
                $(".member-list-main").click(function () {
                    $(this).find(".member-tooltip").toggle();
                });

                $(".progress-div").mouseleave(function () {
                    $(this).find(".progress-tag").hide();
                });

                $("#weekly-div").click(function () {
                    $("#weekly-list").toggle();
                });
                $("#weeklybutton").click(function () {
                    $("#weekly-toggle").toggle();
                });
                $("#progress-bar-1").animate(
                    {
                    width: "75%",
                    },
                    {
                    queue: false,
                    duration: 3000,
                    }
                );
                $("#progress-bar-2").animate(
                    {
                    width: "58%",
                    },
                    {
                    queue: false,
                    duration: 3000,
                    }
                );
                $("#progress-bar-3").animate(
                    {
                    width: "41%",
                    },
                    {
                    queue: false,
                    duration: 3000,
                    }
                );
                $("#progress-bar-4").animate(
                    {
                    width: "50%",
                    },
                    {
                    queue: false,
                    duration: 3000,
                    }
                );

                $("#main-notification").css("transform", "translate(120%,0px)");
                $("#main-notification").removeClass("hidden");
                $("#edit-project").click(function () {
                    $("#main-notification").css("transform", "translate(0%,0px)");
                    setTimeout(function () {
                    $("#main-notification").css("transform", "translate(120%,0px)");
                    }, 3000);
                });
            });
        
        },
        methods: {
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
            }
        },
    }
</script>
