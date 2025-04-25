import { ref } from 'vue';
import axios from 'axios';

export function useLinkShortener() {
  const isLoading = ref(false);

  async function shortenLink(url: string) {
    isLoading.value = true;

    // TODO: Error handling.
    const { data } = await axios.post<string>('/api/link', { url });
    isLoading.value = false;

    return data;
  }

  return {
    shortenLink,
    isLoading,
  }
}