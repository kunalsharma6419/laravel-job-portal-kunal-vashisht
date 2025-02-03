<div class="container mx-auto py-6">
    <div class="bg-white p-6 shadow rounded-lg">
        <form wire:submit.prevent="createJobPosting" enctype="multipart/form-data" class="space-y-4">
            <div class="grid grid-cols-2 gap-6">
                <!-- Job Details -->
                <div>
                    <h2 class="text-lg font-bold mb-4">Job details</h2>
                    <div>
                        <label class="font-semibold">Title</label>
                        <input type="text" wire:model="title" class="input w-full" placeholder="Job posting title">
                    </div>
                    <div>
                        <label class="font-semibold">Description</label>
                        <textarea wire:model="description" class="input w-full" placeholder="Job posting description"></textarea>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="font-semibold">Experience</label>
                            <input type="text" wire:model="experience" class="input w-full"
                                placeholder="Eg. 1-3 Yrs">
                        </div>
                        <div>
                            <label class="font-semibold">Salary</label>
                            <input type="text" wire:model="salary" class="input w-full"
                                placeholder="Eg. 2.75-5 Lacs PA">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="font-semibold">Location</label>
                            <input type="text" wire:model="location" class="input w-full"
                                placeholder="Eg. Remote / Pune">
                        </div>
                        <div>
                            <label class="font-semibold">Extra Info</label>
                            <input type="text" wire:model="extra" class="input w-full"
                                placeholder="Eg. Full Time, Urgent / Part Time, Flexible">
                            <p class="text-sm text-gray-500">Please use comma separated values</p>

                        </div>
                    </div>
                </div>

                <!-- Company Details -->
                <div>
                    <h2 class="text-lg font-bold mb-4">Company details</h2>
                    <div>
                        <label class="font-semibold">Name</label>
                        <input type="text" wire:model="company" class="input w-full" placeholder="Company Name">
                    </div>
                    <div class="mt-4">
                        <label class="font-semibold">Logo</label>
                        <input type="file" wire:model="company_logo" class="input w-full" accept="image/*">
                    </div>
                    <!-- Skills Section -->
                    <div class="mt-6">
                        <h2 class="text-lg font-bold mb-4">Skills</h2>
                        <label class="font-semibold">Name</label>
                        <select wire:model="skills" class="input w-full" multiple>
                            <option selected>Select Skill</option>
                            @foreach ($availableSkills as $skill)
                                <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>



            <!-- Submit Button -->
            <div class="mt-6">
                <button type="submit"
                    class="bg-blue-500 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-600 transition duration-200"
                    style="background-color: blue; color: white;" onclick="showSuccessAlert()">Save</button>
            </div>
        </form>
    </div>
</div>

<!-- SweetAlert Integration -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function showSuccessAlert() {
        Swal.fire({
            title: "Success!",
            text: "Job posting has been added successfully.",
            icon: "success",
            confirmButtonText: "OK"
        }).then((result) => {
            if (result.isConfirmed) {
                // Livewire.emit('jobCreated');
                window.location.href = "{{ url('admin/jobs') }}";
                windlow.location.reload();
            }
        });
    }
</script>
