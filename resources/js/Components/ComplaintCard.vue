<script setup>
  import { defineProps } from 'vue';
  import { ThumbsDown, ThumbsUp, MessageSquare } from "lucide-vue-next";
  import { Link, router } from "@inertiajs/vue3"
  const props = defineProps({
    problema: {
      type: Object,
      required: true
    }
  });

  alert(props.problema);

  const getComplaint = ($idComplaint) => {
    sessionStorage.setItem('complaintId', $idComplaint);
    router.visit(route('complaint'))
  };
</script>
<template>
  <div v-if="problema"
    class="flex justify-between p-5 border border-gray-200 rounded-lg shadow-sm mb-4bg-white dark:bg-gray-800 dark:border-gray-700">
    <div>
      <div class="space-y-2">
        <h2 class="text-xl font-semibold text-gray-800">{{ problema.titulo }}</h2>
        <p class="text-sm text-gray-600">{{ problema.descricao }}</p>
        <p class="text-xs text-gray-500">{{ problema.nome_empresa }}</p>
      </div>
      <!-- <ThumbsDown class="w-4 h-6 text-red-600 bg-blue-800 fill-red-700" /> <ThumbsUp class="w-4 h-6 text-red-600" />
    <ThumbsDown class="w-4 h-6 text-red-600 bg-blue-800 fill-red-700" /> <ThumbsUp class="w-4 h-6 text-red-600" />
    <MessageSquare class="w-4 h-6 text-red-600 bg-blue-800 fill-red-700" /> <ThumbsUp class="w-4 h-6 text-red-600" /> -->
      <div class="flex items-center justify-start gap-4 mt-4 text-sm text-gray-500">
        <div class="flex items-center gap-1">
          <ThumbsUp class="w-4 h-4" /><span>12</span>
        </div>
        <div class="flex items-center gap-1">
          <ThumbsDown class="w-4 h-4" /><span>52</span>
        </div>
        <div class="flex items-center gap-1">
          <MessageSquare class="w-4 h-4" /><span>90</span>
        </div>
      </div>
    </div>
    <div class="flex flex-col justify-between">
      <div class="px-2 py-1 text-xs font-medium bg-gray-100 rounded w-fit">
        {{ problema.status }}
      </div>
      <div>
        <Link @click.prevent="getComplaint(problema.id)" class="p-1 rounded-md text-lime-500 hover:text-lime-600">Ver Mais
        </Link>
      </div>
    </div>
  </div>
  <div v-else>
    <p>Sem dados de problema.</p>
  </div>
</template>
<style scoped></style>