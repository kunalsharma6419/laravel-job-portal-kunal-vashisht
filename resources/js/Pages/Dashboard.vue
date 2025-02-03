<script setup lang="ts">
import Hero from "@/Components/Dashboard/Hero.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import { ref, onMounted } from "vue";

// Define the JobPosting type
interface JobPosting {
  id: number;
  title: string;
  company: string;
  location: string;
  description: string;
  experience: string;
  salary: string;
  skills: string[]; // Ensuring skills is an array
  posted_at: string;
  company_logo?: string;
}

const jobs = ref<JobPosting[]>([]);
const isLoading = ref(true); // Add loading state

const fetchJobs = async () => {
  try {
    isLoading.value = true;
    const response = await fetch("http://localhost:8000/getjobs",, {
  mode: 'no-cors' // This will disable CORS, but it limits the response type and data you can access
});

    // Check if response is ok (status 200-299)
    if (!response.ok) {
      throw new Error('Network response was not ok');
    }

    const data = await response.json();

    jobs.value = Array.isArray(data) ? data : [];
  } catch (error) {
    console.error("Error fetching jobs:", error);
  } finally {
    isLoading.value = false; // Hide loader after fetching
  }
};

// Fetch jobs when component is mounted
onMounted(fetchJobs);
</script>

<template>
  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <!-- Hero -->
    <Hero />

    <!-- Job List -->
    <div class="bg-white">
      <div class="container py-5">
        <div class="container py-10">
          <div v-if="isLoading" class="text-center py-10">
            <p>Loading jobs...</p>
            <!-- Loader message or add spinner here -->
          </div>

          <div class="grid md:grid-cols-2 gap-6" v-else>
            <div
              v-for="job in jobs"
              :key="job.id"
              class="bg-white shadow-sm border border-gray-200 p-5 rounded-xl"
            >
              <div class="flex items-start gap-4">
                <!-- Company Logo -->
                <div
                  class="w-12 h-12 bg-gray-200 rounded-full flex items-center justify-center"
                >
                  <img
                    v-if="job.company_logo"
                    :src="job.company_logo"
                    alt="Logo"
                    class="w-full h-full rounded-full"
                  />
                  <span v-else class="text-gray-500 text-lg font-bold">{{
                    job.title.charAt(0)
                  }}</span>
                </div>
                <div class="flex-1">
                  <h2 class="text-lg font-bold text-gray-800">
                    {{ job.title }}
                  </h2>
                  <p class="text-sm text-gray-600">{{ job.company }}</p>
                  <div
                    class="flex items-center gap-3 mt-2 text-gray-500 text-sm"
                  >
                    <span>📅 {{ job.experience }}</span>
                    <span>💰 {{ job.salary }}</span>
                    <span>🌍 {{ job.location }}</span>
                  </div>
                </div>
              </div>
              <p class="text-sm text-gray-600 mt-3">{{ job.description }}</p>

              <!-- Skills -->
              <div class="flex flex-wrap gap-2 mt-3">
                <span
                  v-for="skill in job.skills"
                  :key="skill"
                  class="text-xs bg-gray-100 px-2 py-1 rounded-md text-gray-700"
                  >{{ skill }}</span
                >
              </div>

              <!-- Job Meta -->
              <div
                class="flex justify-between items-center text-gray-500 text-xs mt-4"
              >
                <div class="flex items-center gap-2">
                  <span
                    class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded-md"
                    >Remote</span
                  >
                  <span
                    class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded-md"
                    >Full-Time</span
                  >
                </div>
                <span>{{ job.posted_at }}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
