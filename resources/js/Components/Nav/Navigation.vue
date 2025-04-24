<template>
  <nav>
    <ul class="flex space-x-6">
      <li>
        <NavLink
          href='/'
          :active="$page.component === 'Home'">
          Home
        </NavLink>
      </li>
    </ul>
  </nav>
</template>

<script setup lang="ts">
import NavLink from '@/Components/Nav/NavLink.vue';
</script>

<style scoped></style>