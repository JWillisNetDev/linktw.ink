import { usePage } from '@inertiajs/vue3';
import type { PageProps } from '@/Types/global';

export function useTypedPageProps<
  T extends Record<never, never> | unknown[] = Record<never, never> | unknown[]
>() {
  return usePage<PageProps<T>>();
}