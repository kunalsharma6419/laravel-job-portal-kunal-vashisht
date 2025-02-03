<div>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container mx-auto py-4">
        <div class="flex justify-between items-center py-8">
            <h1 class="text-2xl font-bold">Jobs</h1>
        </div>
        <div class="w-full">
            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">Title</th>
                                <th scope="col" class="px-4 py-3">Description</th>
                                <th scope="col" class="px-4 py-3">Company Logo</th>
                                <th scope="col" class="px-4 py-3">Company Name</th>
                                <th scope="col" class="px-4 py-3">Experience</th>
                                <th scope="col" class="px-4 py-3">Salary</th>
                                <th scope="col" class="px-4 py-3">Location</th>
                                <th scope="col" class="px-4 py-3">Skills</th>
                                <th scope="col" class="px-4 py-3">Extra</th>
                                <th scope="col" class="px-4 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jobs as $job)
                                <tr class="border-b dark:border-gray-700">
                                    <th scope="row"
                                        class="px-4 py-3 font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $job['title'] }}</th>
                                    <td class="px-4 py-3 whitespace-nowrap">{{ str($job['description'])->words(7) }}
                                    </td>
                                    <td class="px-4 py-3 text-center">
                                        <img src="{{ $job['company_logo'] }}" class="h-12 w-auto block mx-auto"
                                            alt="{{ $job['company_name'] }}">
                                    </td>
                                    <td><span class="font-medium text-gray-900">{{ $job['company_name'] }}</span></td>
                                    <td class="px-4 py-3">{{ $job['experience'] }}</td>
                                    <td class="px-4 py-3">{{ $job['salary'] }}</td>
                                    <td class="px-4 py-3">{{ $job['location'] }}</td>
                                    <td class="px-4 py-3">
                                        <div class="flex items-center flex-wrap gap-2">
                                            @foreach ($job['skills'] as $skill)
                                                <span
                                                    class="inline-block bg-gray-200 rounded-full px-2 py-0.5 text-xs font-medium text-gray-700">{{ $skill }}</span>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="flex items-center flex-wrap gap-2">
                                            @foreach ($job['extra'] as $extra)
                                                <span
                                                    class="inline-block bg-amber-100 rounded-full px-2 py-0.5 text-xs font-medium text-amber-800">{{ $extra }}</span>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 flex items-center justify-end">
                                        <button data-job-id="{{ $job['id'] }}"
                                            class="delete-btn text-sm px-3 py-1.5 rounded hover:bg-slate-100 transition-colors text-red-500">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- SweetAlert Script -->
<!-- SweetAlert for job deletion -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Listen for delete button clicks
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function() {
            const jobId = this.getAttribute('data-job-id');

            // Show confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Send AJAX request to delete the job
                    fetch("{{ route('delete.job') }}", {
                            method: "POST",
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector(
                                    'meta[name="csrf-token"]').getAttribute('content')
                            },
                            body: JSON.stringify({
                                job_id: jobId
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.status === 'success') {
                                // Show success alert
                                Swal.fire({
                                    title: 'Deleted!',
                                    text: data.message,
                                    icon: 'success',
                                    confirmButtonText: 'OK'
                                }).then(() => {
                                    // Remove the job from the DOM
                                    document.querySelector(
                                            `button[data-job-id='${jobId}']`)
                                        .closest('div').remove();
                                    window.location.reload();
                                });
                            } else {
                                // Show error alert
                                Swal.fire({
                                    title: 'Error!',
                                    text: data.message,
                                    icon: 'error',
                                    confirmButtonText: 'OK'
                                });
                            }
                        })
                        .catch(error => {
                            // Show error alert if AJAX request fails
                            Swal.fire({
                                title: 'Error!',
                                text: 'Something went wrong. Please try again.',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        });
                }
            });
        });
    });
</script>
