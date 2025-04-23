<script setup>
// Com fill-corquequero consigo definir a cor na interna do icone
// Com color eu seto a cor dele padrão
import { ThumbsDown, ThumbsUp, MessageSquare } from 'lucide-vue-next'
import { onMounted } from 'vue'
import { router } from '@inertiajs/vue3'

console.log('olas')
// console.log(sessionStorage.getItem('complaintId'))

// onMounted(() => {
//   let idComplaint = sessionStorage.getItem('complaintId');
//   if(idComplaint !== 'undefined') {
//     // searchComplaintById(idComplaint);
//   } else {
//     router.visit(route('initial'));
//   }
// })
</script>
<template>
  <header class="flex items-center justify-between px-6 py-4 bg-white shadow-sm">
    <div class="flex items-center space-x-2">
      <!-- <img src="/logo.svg" alt="Logo" class="w-4 h-6"> -->
      <span class="text-xl font-bold">Desabafaê</span>
    </div>
    <nav class="hidden space-x-6 md:flex">
      <a href="#" class="text-gray-800 border-b-2 hover:text-black border-lime-400">Reclamações</a>
      <a href="#" class="text-gray-800 hover:text-black">Empresas</a>
      <a href="#" class="text-gray-800 hover:text-black">Como Funciona</a>
      <a href="#" class="text-gray-800 hover:text-black">Sobre Nós</a>
      <a href="#" class="text-gray-800 hover:text-black">Contato</a>
    </nav>
    <div class="flex items-center space-x-3">
      <button class="px-4 py-2 text-sm border border-gray-300 rounded-full hover:bg-gray-100">Entrar</button>
      <button
        class="px-4 py-2 text-sm font-medium text-white rounded-full bg-lime-400 hover:bg-lime-500">Cadastrar</button>
    </div>
  </header>
  <main class="max-w-screen-xl px-2 py-8 mx-auto">
    <article class="p-6 mb-6 bg-white border shadow-sm rounded-xl">
      <div class="flex items-center gap-4 mb-4">
        <img src="@/assets/logo.png" alt="Avatar" class="object-cover w-10 h-10 rounded-full" />
        <div>
          <p class="font-semibold text-gray-900">usuario123</p>
          <p class="text-xs text-gray-500">Publicado há 2 dias</p>
        </div>
      </div>
      <div class="space-y-3">
        <div class="flex flex-wrap items-center gap-2">
          <h1 class="text-xl font-bold text-gray-900">Problema com a entrega</h1>
          <span class="px-2 py-1 text-xs font-medium bg-gray-300 border border-gray-500 rounded">
            Pendente
          </span>
        </div>
        <p class="text-sm text-gray-800">
          It is a long established fact that a reader will be distracted by the readable content of a page when
          looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of
          letters, as opposed to using 'Content here, content here', making it look like readable English. Many
          desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a
          search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved
          over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
        </p>
        <p class="text-sm text-gray-600">
          <span class="font-medium text-gray-700">Empresa:</span> ABC
        </p>
      </div>
      <div class="flex items-center gap-6 mt-4 text-sm text-gray-600">
        <div class="flex items-center gap-1">
          <ThumbsUp class="w-4 h-4" />
          <span>12</span>
        </div>
        <div class="flex items-center gap-1">
          <ThumbsDown class="w-4 h-4" />
          <span>52</span>
        </div>
        <div class="flex items-center gap-1">
          <MessageSquare class="w-4 h-4" />
          <span>90</span>
        </div>
      </div>
    </article>
    <div class="flex items-start p-4 space-x-4 bg-white border shadow-sm rounded-xl">
      <img src="@/assets/logo.png" alt="Avatar" class="object-cover w-10 h-10 rounded-full" />
      <div class="flex-1">
        <textarea placeholder="Adicione um comentário..."
          class="w-full px-4 py-2 text-sm border border-gray-300 resize-none rounded-xl focus:outline-none focus:ring-2 focus:ring-lime-500"
          rows="2"></textarea>
        <div class="flex justify-end mt-2">
          <button
            class="bg-lime-500 text-white px-4 py-1.5 rounded-xl text-sm font-medium hover:bg-lime-600 transition-colors">
            Publicar
          </button>
        </div>
      </div>
    </div>
    <div v-for="n in 3" class="flex items-start gap-3 py-4 border-b last:border-none">
      <img src="@/assets/logo.png" alt="Avatar" class="object-cover rounded-full w-9 h-9" />
      <div class="flex-1">
        <div class="text-sm leading-tight">
          <span class="font-semibold text-gray-900">usuario123</span>
          <span class="ml-1 text-gray-800">Também tive um problema com a entrega dessa empresa.</span>
        </div>
        <div class="flex items-center gap-4 mt-1 text-xs text-gray-500">
          <span>2d</span>
          <button class="hover:underline">Curtir</button>
          <button class="hover:underline">Responder</button>
        </div>
      </div>
    </div>
  </main>
  <footer class="py-4 border-t">
    <div class="text-center">
      <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2025 <a
          href="https://www.linkedin.com/in/iagosm/" target="_blank" class="hover:underline text-lime-600">Iago
          Sousa</a>. Todos os Direitos Reservados.</span>
    </div>
  </footer>
</template>
<style scoped></style>