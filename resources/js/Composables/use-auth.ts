import type { PageProps } from '@/Types/global';
import { useTypedPageProps } from '@/Composables/use-typed-page-props';
import type { User } from '@/Types/auth';

/*
 * Get the authenticated user from the page props.
 */
export function useAuth(): User {
  const { auth } = useTypedPageProps<PageProps>().props;
  return auth?.user as unknown as User ?? null;
}