<script setup>
  import Header from '@/Components/Header.vue';
  import Footer from '@/Components/Footer.vue';
  defineProps({ isLoading: Boolean })
</script>
<template>
  <Header />
    <div v-if="isLoading" class="fixed inset-0 z-50 flex items-center justify-center bg-white bg-opacity-80">
      <svg class="w-10 h-10 animate-spin text-lime-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
      </svg>
    </div>
    <main class="max-w-screen-xl px-2 py-8 mx-auto">
      <slot />
    </main>
  <Footer />
</template>
<style scoped></style>