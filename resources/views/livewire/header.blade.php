<div x-data="{
        isDropdownOpen: false,
        isJobDropdownOpen: false,
        toggleDropdown() {
            this.isDropdownOpen = !this.isDropdownOpen;
        },
        toggleJobDropdown() {
            this.isJobDropdownOpen = !this.isJobDropdownOpen;
        }
    }" class="bg-white border-b border-gray-200">
    <nav class="container py-3 flex justify-between items-center">
        <!-- Logo -->
        <div class="flex items-center">
            <a href="{{ route('dashboard') }}" class="flex items-center">
                <x-logo class="h-8 w-auto" />
            </a>
        </div>

        {{-- Navigation Links --}}
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.dashboard') }}" @class([
                "transition-colors px-4",
                'text-gray-900 hover:text-gray-800' => request()->routeIs('admin.dashboard'),
                'text-gray-700 hover:text-gray-600' => !request()->routeIs('admin.dashboard'),
            ])>
                Dashboard
            </a>
            <a href="{{ route('admin.skills.index') }}" @class([
                "transition-colors px-4",
                'text-gray-900 hover:text-grays-800' => request()->routeIs('admin.skills.index'),
                'text-gray-700 hover:text-grays-600' => !request()->routeIs('admin.skills.index'),
            ])>
                Skills
            </a>
            <div class="relative" x-cloak>
                <button @click="toggleJobDropdown()"
                    class="flex items-center text-gray-700 hover:text-gray-600 focus:outline-none">
                    <span class="mr-2">Jobs</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>

                <!-- Dropdown Menu -->
                <div x-show="isJobDropdownOpen" @click.away="isJobDropdownOpen = false"
                    x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                    class="absolute right-0 mt-2 w-48 bg-white border rounded-lg shadow-lg z-20">
                    <a href="{{ route('admin.jobs.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                        View All Jobs
                    </a>
                    <a href="{{ route('admin.jobs.create') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                        Create New Job
                    </a>
                </div>
            </div>

            <!-- User Dropdown -->
            <div class="relative" x-cloak>
                <button @click="toggleDropdown()"
                    class="flex items-center text-gray-700 hover:text-gray-600 focus:outline-none">
                    <span class="mr-2">{{ Auth::user()->name }}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>

                <!-- Dropdown Menu -->
                <div x-show="isDropdownOpen" @click.away="isDropdownOpen = false"
                    x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                    class="absolute right-0 mt-2 w-48 bg-white border rounded-lg shadow-lg z-20">
                    <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                        Profile
                    </a>
                    <button wire:click="logout" class="w-full text-left block px-4 py-2 text-red-600 hover:bg-gray-100">
                        Logout
                    </button>
                </div>
            </div>
        </div>
    </nav>
</div>
