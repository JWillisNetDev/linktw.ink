<template>
  <Link
    :href="href"
    :method="method ?? 'get'"
    class="text-black hover:underline"
    :class="{ 'font-bold underline': active }">
  <slot></slot>
  </Link>
</template>

<script setup lang="ts">
defineProps<{
  href: string,
  active?: boolean,
  method?: string,
}>();
</script>

<style scoped></style>