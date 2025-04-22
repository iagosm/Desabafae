<script setup>
// Com fill-corquequero consigo definir a cor na interna do icone
// Com color eu seto a cor dele padrão
import {ThumbsDown, ThumbsUp, MessageSquare} from 'lucide-vue-next'
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
      <button class="px-4 py-2 text-sm font-medium text-white rounded-full bg-lime-400 hover:bg-lime-500">Cadastrar</button>
    </div>
  </header>
  <main class="w-full">
    <div class="">
      <div class="border-red-500 gapborder">
        <div class="flex gap-2">
          <div class="text-xl font-bold">Problema com a entrega</div>
          <div class="p-1 bg-green-100 border border-green-500 rounded">Pendente</div>
        </div>
        <div class="mt-2">Houve um problema com a entrega do produto que foi comprado</div>
        <div class="mt-2">Empresa ABC</div>
        <div class="mt-2 flex align-middle justify-between max-w-[150px]">
          <div class="flex gap-1">
            <ThumbsUp class="w-4 h-4 text-black"/>
            <span>12</span>
          </div>
          <div class="flex gap-1">
            <ThumbsDown class="w-4 h-6 text-black"/>
            <span>52</span>
          </div>
          <div class="flex gap-1">
            <MessageSquare class="w-4 h-6 text-black"/>
            <span>90</span>
          </div>
        </div>
      </div>
      <div class="flex mt-2">
        <h2 class="text-xl font-bold">Adicione um comentário</h2>
        <textarea class="rounded-md resize"></textarea>
      </div>
      <div>
        <div>
          <div>
            <img src="" alt="">
            <div>Usuário</div>

          </div>
          <div>Concordo sobre isso, espero que seja resolvido</div>
        </div>
      </div>


    </div>
  </main>
</template>
<style scoped></style>