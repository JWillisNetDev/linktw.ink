<template>
  <section class="p-6 bg-gray-200">
    <header class="flex justify-between">
      <div class="flex items-center">
        <h1 class="font-bold text-lg">My App</h1>
        <p class="text-sm ml-4" v-html="user?.username ?? 'Guest'">
        </p>
      </div>
      <Navigation />
    </header>
  </section>

  <section class="p-6">
    <div class="max-w-3xl mx-auto">
      <slot></slot>
    </div>
  </section>
</template>

<script setup lang="ts">
import Navigation from '@/Components/Nav/Navigation.vue';
import { useAuth } from '@/Composables/use-auth';

const user = useAuth();
</script>

<style scoped></style>