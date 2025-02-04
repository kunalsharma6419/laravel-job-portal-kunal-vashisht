<div class="bg-slate-100 relative">
    <div class="container py-32 text-center flex flex-col gap-8 relative">
        <div class="space-y-4">
            <h1 class="text-3xl lg:text-6xl font-bold">Find your dream job</h1>
            <p class="text-sm lg:text-base text-slate-600">Looking for jobs? Browse our latest job openings to
                view & apply to the best jobs today!</p>
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
                    <input type="text" wire:model="search" placeholder="Job title or keyword"
                        class="py-4 shadow-none border-none focus:outline-none focus:ring-0 outline-none ring-0 flex-1">
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
                    <input type="text" wire:model="location" placeholder="Location"
                        class="py-4 shadow-none border-none focus:outline-none focus:ring-0 outline-none ring-0 flex-1">
                </div>
                <button wire:click="searchJobs"
                    class="bg-blue-500 px-6 text-sm font-medium py-2 rounded-full text-white mr-3 hover:bg-blue-600 transition">Find
                    jobs</button>
            </div>
        </div>
    </div>
    {{-- <div class="container mx-auto py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @forelse ($jobs as $job)
                <div class="bg-white p-8 shadow-lg rounded-2xl flex flex-col justify-between border border-gray-200">
                    <div>
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center">
                                <img src="{{ $job->logo }}" alt="{{ $job->company }} logo" class="w-8 h-8">
                            </div>
                            <div>
                                <h2 class="text-xl font-semibold text-gray-800">{{ $job->title }}</h2>
                                <p class="text-gray-500 text-sm">{{ $job->company }}</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-4 text-gray-500 text-sm mb-4">
                            <span class="flex items-center gap-1"><i class="fas fa-briefcase"></i>
                                {{ $job->experience }} Yrs</span>
                            <span class="flex items-center gap-1"><i class="fas fa-rupee-sign"></i> {{ $job->salary }}
                                PA</span>
                            <span class="flex items-center gap-1"><i class="fas fa-map-marker-alt"></i>
                                {{ $job->location }}</span>
                        </div>

                        <p class="text-gray-600 mb-4 leading-relaxed">{{ Str::limit($job->description, 150) }}</p>

                        <div class="flex flex-wrap gap-2">
                            @foreach ($job->skills as $skill)
                                <span
                                    class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm">{{ $skill }}</span>
                            @endforeach
                        </div>
                    </div>

                    <div class="flex justify-between items-center mt-6">
                        <div class="flex gap-2">
                            <span
                                class="bg-gray-200 text-gray-700 px-4 py-1 rounded-full text-xs">{{ $job->type }}</span>
                            @if ($job->timing)
                                <span
                                    class="bg-gray-200 text-gray-700 px-4 py-1 rounded-full text-xs">{{ $job->timing }}</span>
                            @endif
                        </div>
                        <span class="text-gray-400 text-sm">{{ $job->created_at->diffForHumans() }}</span>
                    </div>
                </div>
            @empty
                <div class="col-span-1 md:col-span-2 text-center py-16">
                    <h2 class="text-2xl font-semibold text-gray-700">No job listings found.</h2>
                    <p class="text-gray-500 mt-4">Try adjusting your search criteria or check back later for new
                        listings.</p>
                </div>
            @endforelse
        </div>
    </div> --}}

<div class="container mx-auto py-16">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        @forelse ($jobs as $job)
            <div class="bg-white p-8 shadow-lg rounded-2xl flex flex-col justify-between border border-gray-200">
                <div>
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center">
                            <img src="{{ $job->logo }}" alt="{{ $job->company }} logo" class="w-8 h-8">
                        </div>
                        <div>
                            <h2 class="text-xl font-semibold text-gray-800">{{ $job->title }}</h2>
                            <p class="text-gray-500 text-sm">{{ $job->company }}</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-4 text-gray-500 text-sm mb-4">
                        <span class="flex items-center gap-1"><i class="fas fa-briefcase"></i> {{ $job->experience }} Yrs</span>
                        <span class="flex items-center gap-1"><i class="fas fa-rupee-sign"></i> {{ $job->salary }} PA</span>
                        <span class="flex items-center gap-1"><i class="fas fa-map-marker-alt"></i> {{ $job->location }}</span>
                    </div>

                    <p class="text-gray-600 mb-4 leading-relaxed">{{ Str::limit($job->description, 150) }}</p>

                    <div class="flex flex-wrap gap-2">
                        @foreach ($job->skills as $skill)
                            <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm">{{ $skill }}</span>
                        @endforeach
                    </div>
                </div>

                <div class="flex justify-between items-center mt-6">
                    <div class="flex gap-2">
                        <span class="bg-gray-200 text-gray-700 px-4 py-1 rounded-full text-xs">{{ $job->type }}</span>
                        @if($job->timing)
                            <span class="bg-gray-200 text-gray-700 px-4 py-1 rounded-full text-xs">{{ $job->timing }}</span>
                        @endif
                    </div>
                    <span class="text-gray-400 text-sm">{{ $job->created_at->diffForHumans() }}</span>
                </div>
            </div>
        @empty
            <div class="col-span-1 md:col-span-2 text-center py-16">
                <h2 class="text-2xl font-semibold text-gray-700">No job listings found.</h2>
                <p class="text-gray-500 mt-4">Try adjusting your search criteria or check back later for new listings.</p>
            </div>
        @endforelse
    </div>
</div>

<style>
    body {
        background-color: #f8fafc;
    }
    input::placeholder {
        color: #9ca3af;
    }
</style>

</div>
