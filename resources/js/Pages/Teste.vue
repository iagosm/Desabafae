<script setup>
// Com fill-corquequero consigo definir a cor na interna do icone
// Com color eu seto a cor dele padrão
import ComplaintCard from '@/Components/ComplaintCard.vue';
import Header from '@/Components/Header.vue';
import Footer from '@/Components/Footer.vue';
import { ThumbsDown, ThumbsUp, MessageSquare } from "lucide-vue-next";
import { ref, computed, watch  } from "vue";
import { Link, router, usePage } from "@inertiajs/vue3"
import axios from 'axios';

const isLoading = ref(false);
const activeTab = ref('mais-curtidas');
const problemas = ref([]);
watch(activeTab, (newValue, oldValue) => {
  console.log('activeTab mudou de', oldValue, 'para', newValue);
});

  const setActiveTab = (tab) => {
    problemas.value = [];
    activeTab.value = tab;
    switch (tab) {
      case 'mais-curtidas':
      getMostLikes();
      break;
      case 'pendentes':
      getPending();
      break;
      case 'resolvidas':
      getResolved();
      break;
    }
  }

  const getPending = async () =>  {
    isLoading.value = true;
    try {
      const response = await axios.get('/api/complaints/pending');
      console.log(response.data)
      console.log(response.data)
      if(response.data.status == 'success') {
        problemas.value = response.data.data;
      }
    } catch (error) {
      console.error("Erro ao buscar usuario: ", error)
    }
    isLoading.value = false;
  }
  const getResolved = async () =>  {
    isLoading.value = true;
      try {
        const response = await axios.get('/api/complaints/resolved');
        if(response.data.status == 'success') {
          problemas.value = response.data.data;
        }
      } catch (error) {
        console.error("Erro ao buscar usuario: ", error)
      }
      isLoading.value = false;
  }

  const getMostLikes = async () =>  {
    problemas.value = null
    // isLoading.value = true;
    // try {
    //   const response = await axios.get('/api/complaints/pending');
    //   console.log(response.data)
    //   console.log(response.data)
    //   if(response.data.status == 'success') {
    //     problemas.value = response.data.data;
    //   }
    // } catch (error) {
    //   console.error("Erro ao buscar usuario: ", error)
    // }
    // isLoading.value = false;
  }


const isLoggedIn = computed(() => page.props.auth.user)
const page = usePage()
const user = page.props.auth.user
console.log(page)
console.log(user)
</script>
<template>
  <Header />
  <main class="max-w-screen-xl px-2 py-8 mx-auto">
    <div class="mt-2 mb-6">
      <input type="text" placeholder="Buscar reclamações..."
        class="block w-full max-w-md px-4 py-2 mx-auto border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-lime-500 focus:border-lime-500" />
    </div>
    <h1 class="mb-6 text-4xl font-bold">Reclamações</h1>
    <div class="border-b border-gray-200">
      <nav class="flex -mb-px">
        <button @click="setActiveTab('mais-curtidas')" :class="[
          'py-4 px-6 font-medium text-sm border-b-2 focus:outline-none',
          activeTab === 'mais-curtidas'
            ? 'border-lime-500 text-lime-600'
            : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'
        ]">
          Mais Curtidas
        </button>
        <button @click="setActiveTab('pendentes')" :class="[
          'py-4 px-6 font-medium text-sm border-b-2 focus:outline-none',
          activeTab === 'pendentes'
            ? 'border-lime-500 text-lime-600'
            : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'
        ]">
          Pendentes
        </button>
        <button @click="setActiveTab('resolvidas')" :class="[
          'py-4 px-6 font-medium text-sm border-b-2 focus:outline-none',
          activeTab === 'resolvidas'
            ? 'border-lime-500 text-lime-600'
            : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'
        ]">
          Resolvidas
        </button>
      </nav>
    </div>
    <div class="p-6">
      <div v-if="isLoading" class="flex items-center justify-center my-8">
        <svg class="w-10 h-10 animate-spin text-lime-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
          <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
          <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
        </svg>
      </div>
      <div class="space-y-6">
        <div class="grid grid-cols-2 gap-4">
          <ComplaintCard
            v-for="problema in problemas"
            :key="problema.id"
            :problema="problema"
          />
        </div>
      </div>
    </div>
  </main>
  <Footer />
</template>
<style scoped></style>