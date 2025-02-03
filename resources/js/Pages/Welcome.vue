<script setup lang="ts">
import { Head, Link } from "@inertiajs/vue3";

defineProps<{
    canLogin?: boolean;
    canRegister?: boolean;
    laravelVersion: string;
    phpVersion: string;
}>();

function handleImageError() {
    document.getElementById("screenshot-container")?.classList.add("!hidden");
    document.getElementById("docs-card")?.classList.add("!row-span-1");
    document.getElementById("docs-card-content")?.classList.add("!flex-row");
    document.getElementById("background")?.classList.add("!hidden");
}
</script>

<template>
    <Head title="Welcome" />
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <img
            id="background"
            class="absolute -left-20 top-0 max-w-[877px]"
            src="https://laravel.com/assets/img/welcome/background.svg"
        />
        <div
            class="relative flex min-h-screen flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white"
        >
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header
                    class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3"
                >
                    <div class="flex lg:col-start-2 lg:justify-center">
                        <span class="font-bold text-2xl">DWebPixel</span>
                    </div>
                    <nav v-if="canLogin" class="-mx-3 flex flex-1 justify-end">
                        <Link
                            v-if="$page.props.auth.user"
                            :href="route('dashboard')"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Dashboard
                        </Link>

                        <template v-else>
                            <Link
                                :href="route('login')"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Log in
                            </Link>

                            <Link
                                v-if="canRegister"
                                :href="route('register')"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Register
                            </Link>
                        </template>
                    </nav>
                </header>

                <main class="mt-6">
                    <div
                        class="flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] md:row-span-3 lg:p-10 lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
                    >
                        <div
                            class="relative flex items-center gap-6 lg:items-end"
                        >
                            <div
                                id="docs-card-content"
                                class="flex items-start gap-6 lg:flex-col"
                            >
                                <div class="pt-3 sm:pt-5 lg:pt-0">
                                    <h2
                                        class="text-3xl font-bold text-slate-700 dark:text-slate-100"
                                    >
                                        Sr. Full Stack Developer Assessment For
                                        DWebPixel
                                    </h2>

                                    <div class="mt-4 space-y-5 [&>*]:leading-6">
                                        <div>
                                            <p class="font-semibold">
                                                Objective:
                                            </p>
                                            <p>
                                                We are developing a Job Portal
                                                web application where
                                                administrators can create job
                                                postings, and users can view
                                                these postings from their
                                                dashboards. The app uses a Role
                                                and Permissions system to manage
                                                user and admin functionality.
                                                Authentication is already
                                                implemented and functional.
                                            </p>
                                        </div>
                                        <div class="space-y-2">
                                            <div>
                                                <p class="font-semibold">
                                                    Technologies Used:
                                                </p>
                                                <p>
                                                    Tech stack used in this
                                                    application is defined
                                                    below.
                                                </p>
                                            </div>
                                            <div class="ml-4">
                                                <p class="font-semibold">
                                                    User Panel
                                                </p>
                                                <ul class="list-disc pl-4">
                                                    <li>Laravel</li>
                                                    <li>Inertia</li>
                                                    <li>Vue.js</li>
                                                    <li>Tailwind CSS</li>
                                                </ul>
                                            </div>
                                            <div class="ml-4">
                                                <p class="font-semibold">
                                                    Admin Panel
                                                </p>
                                                <ul class="list-disc pl-4">
                                                    <li>Laravel</li>
                                                    <li>Livewire</li>
                                                    <li>AlpineJS</li>
                                                    <li>Tailwind CSS</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div>
                                            <p class="font-semibold">
                                                Your Task:
                                            </p>
                                            <p>
                                                You are required to implement
                                                the following features in the
                                                application:
                                            </p>
                                        </div>
                                        <div class="border-b py-4">
                                            <div
                                                class="p-2 rounded bg-slate-500 mb-3"
                                            >
                                                <img
                                                    src="/User-Dashboard.jpeg"
                                                    alt=""
                                                />
                                            </div>
                                            <p class="font-semibold">
                                                User Dashboard:
                                            </p>
                                            <p>
                                                Design and implement a UI for a
                                                Job Card to display job details.
                                            </p>
                                        </div>
                                        <div class="space-y-1">
                                            <div>
                                                <p class="font-semibold">
                                                    Admin Dashboard:
                                                </p>
                                                <p>
                                                    Create and update below
                                                    pages in admin Panel
                                                </p>
                                            </div>
                                            <div class="pl-4 space-y-3">
                                                <div class="border-b py-4">
                                                    <div
                                                        class="p-2 rounded bg-slate-500 mb-3"
                                                    >
                                                        <img
                                                            src="/Admin-Skills.jpeg"
                                                            alt=""
                                                        />
                                                    </div>
                                                    <p class="font-medium">
                                                        Skills Management Page:
                                                    </p>
                                                    <ul class="pl-8 list-disc">
                                                        <li>
                                                            Create a page that
                                                            displays a table of
                                                            skills.
                                                        </li>
                                                        <li>
                                                            Include a form to
                                                            add new skills to
                                                            the database.
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="py-4">
                                                    <div
                                                        class="p-2 rounded bg-slate-500 mb-3"
                                                    >
                                                        <img
                                                            src="/Admin-Jobs.jpeg"
                                                            alt=""
                                                        />
                                                    </div>
                                                    <div
                                                        class="p-2 rounded bg-slate-500 mb-3"
                                                    >
                                                        <img
                                                            src="/Admin-JobsList.jpeg"
                                                            alt=""
                                                        />
                                                    </div>
                                                    <p class="font-medium">
                                                        Job Postings Management
                                                        Page:
                                                    </p>
                                                    <ul class="pl-8 list-disc">
                                                        <li>
                                                            Develop a form for
                                                            creating new job
                                                            postings.
                                                        </li>
                                                        <li>
                                                            Update the job
                                                            postings list page
                                                            to dynamically
                                                            display postings
                                                            fetched from the
                                                            database.
                                                        </li>
                                                        <li>
                                                            Add delete
                                                            functionality for
                                                            the job postings.
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border-b py-4">
                                        <p class="font-semibold">Notes:</p>
                                        <p>
                                            Icons and Logos shown in job post
                                            card as already provided. Use Icon
                                            component to display the icons
                                        </p>
                                        <p>
                                            <b>Admin Email:</b>
                                            admin@example.com |
                                            <b>Admin Password:</b> password
                                        </p>
                                        <p>
                                            <b>User Email:</b> user@example.com
                                            | <b>User Password:</b> password
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>

                <footer
                    class="py-16 text-center text-sm text-black dark:text-white/70"
                >
                    Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
                </footer>
            </div>
        </div>
    </div>
</template>
