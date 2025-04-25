<template>

  <Head title="Shorten Links" />

  <div class="flex items-center justify-center min-h-screen">
    <div class="w-3/4 bg-white p-6 rounded-lg shadow-md">
      <h1 class="text-2xl font-bold mb-4 text-center">Shorten Your Link</h1>
      <form @submit.prevent="handleSubmit" class="flex flex-col gap-4">
        <input
          type="url"
          placeholder="Enter your URL here"
          class="border border-gray-300 rounded-lg p-2 w-full"
          v-model="url"
          required />
        <button
          type="submit"
          class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600"
          :disabled="isLoading">
          Shorten Link
        </button>
      </form>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import { useLinkShortener } from '@/Composables/useLinkShortener';

const url = ref<string>('');
const { isLoading, shortenLink } = useLinkShortener();

async function handleSubmit() {
  if (!url.value) {
    return;
  }

  const shortened = await shortenLink(url.value);
  if (shortened) {
    alert(`Shortened URL: ${shortened}`);
  } else {
    alert('Failed to shorten the link. Please try again.');
  }
}
</script>

<style scoped></style>