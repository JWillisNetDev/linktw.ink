import type { PageProps } from '@/Types/global';
import { defineProps } from 'vue';

type Filters =
  {
    [key: string]: string | number | null | undefined;
  };

export type Paginated<T> =
  {
    data?: T[];
    links: {
      active: boolean;
      label: string;
      url?: string | null;
    }[];
    meta: {
      current_page: number;
      from: number;
      last_page: number;
      path: string;
      per_page: number;
      to: number;
      total: number;
    };
    filters: Filters;
  };