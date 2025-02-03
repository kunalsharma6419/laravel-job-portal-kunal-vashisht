<script setup lang="ts"></script>

<template>
    <div class="bg-slate-100 relative">
        <div class="container py-32 text-center flex flex-col gap-8 relative">
            <div class="space-y-4">
                <h1 class="text-3xl lg:text-6xl font-bold">Find your dream job</h1>
                <p class="text-sm lg:text-base text-slate-600">Looking for jobs? Browse our latest job openings to
                    view & apply to
                    the best jobs today!</p>
            </div>
            <!-- Search -->
            <div>
                <div
                    class="bg-white w-full border rounded-full overflow-hidden border-gray-200 max-w-3xl mx-auto flex items-center justify-center">
                    <div class="flex-1 flex items-center border-r">
                        <span class="pl-5">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                            </svg>
                        </span>
                        <input placeholder="Job title or keyword"
                            class="py-4 shadow-none border-none focus:outline-none focus:ring-0 outline-none ring-0"
                            type="text">
                    </div>
                    <div class="flex-1 flex items-center">
                        <span class="pl-5">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                            </svg>
                        </span>
                        <input placeholder="Location"
                            class="py-4 shadow-none border-none focus:outline-none focus:ring-0 outline-none ring-0"
                            type="text">
                    </div>
                    <button class="bg-brand px-6 text-sm font-medium py-2 rounded-full text-white mr-3">Find
                        jobs</button>
                </div>
            </div>
        </div>
    </div>
</template>
