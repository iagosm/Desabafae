<script setup>
// Com fill-corquequero consigo definir a cor na interna do icone
// Com color eu seto a cor dele padrão
import ComplaintCard from '@/Components/ComplaintCard.vue';
import Layout from '@/Pages/Layout/Layout.vue';

import { ThumbsDown, ThumbsUp, MessageSquare } from "lucide-vue-next";
import { ref, computed, watch  } from "vue";
import { Link, router, usePage } from "@inertiajs/vue3"
import axios from 'axios';

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
    problemas.value = []
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

  const isLoading = ref(false);
</script>
<template>
  <Layout :isLoading="isLoading">
    <div class="mt-2 mb-6">
      <input
        type="text"
        placeholder="Buscar reclamações..."
        class="block w-full max-w-md px-4 py-2 mx-auto border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-lime-500 focus:border-lime-500"
      />
    </div>
    <h1 class="mb-6 text-4xl font-bold">Reclamações</h1>
    <div class="flex justify-end mb-4">
      <Link
        href="/create-complaint"
        class="px-3 py-1.5 text-sm font-medium text-white bg-lime-500 hover:bg-lime-600 rounded-md shadow-sm transition"
      >
        Cadastre uma Reclamação
      </Link>
    </div>
    <div class="border-b border-gray-200">
      <nav class="flex -mb-px">
        <button @click="setActiveTab('mais-curtidas')" :class="[ activeTab === 'mais-curtidas' ? 'border-lime-500 text-lime-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300', 'py-4 px-6 font-medium text-sm border-b-2 focus:outline-none' ]">
          Mais Curtidas
        </button>
        <button @click="setActiveTab('pendentes')" :class="[ activeTab === 'pendentes' ? 'border-lime-500 text-lime-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300', 'py-4 px-6 font-medium text-sm border-b-2 focus:outline-none' ]">
          Pendentes
        </button>
        <button @click="setActiveTab('resolvidas')" :class="[ activeTab === 'resolvidas' ? 'border-lime-500 text-lime-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300', 'py-4 px-6 font-medium text-sm border-b-2 focus:outline-none' ]">
          Resolvidas
        </button>
      </nav>
    </div>
    <div class="p-6">
      <div class="space-y-6">
        <div class="grid grid-cols-2 gap-4">
          <ComplaintCard
            v-for="problema in problemas.length ? problemas : [null]"
            :key="problema?.id ?? 'empty'"
            :problema="problema"
          />
        </div>
      </div>
    </div>
  </Layout>
</template>
<style scoped></style>