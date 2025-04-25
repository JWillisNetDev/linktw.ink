<template>

  <Head title="Shorten Links"></Head>

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
      <div class="mt-4 flex justify-center items-center" v-if="shortenedUrl">
        <a :href="shortenedUrl" class="text-blue-500 font-bold hover:underline">
          {{ shortenedUrl }}
        </a>
        <button
          class="ml-2 text-gray-500 hover:text-gray-700"
          @click="handleCopyToClipboard">
          <FontAwesomeIcon :icon="faCopy" />
        </button>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import { useLinkShortener } from '@/Composables/useLinkShortener';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { faCopy } from '@fortawesome/free-solid-svg-icons';

const url = ref<string>('');
const { isLoading, shortenLink } = useLinkShortener();
const shortenedUrl = ref<string | null>(null);

async function handleSubmit() {
  if (!url.value) {
    return;
  }

  shortenedUrl.value = await shortenLink(url.value);
}

async function handleCopyToClipboard() {
  if (!shortenedUrl.value) {
    return;
  }

  await navigator.clipboard.writeText(shortenedUrl.value);
}
</script>

<style scoped></style>