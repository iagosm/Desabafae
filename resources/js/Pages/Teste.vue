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
     <h2>Reclamações</h2> 
      <div class="grid grid-cols-1 gap-4">
        <div class="p-4 border border-red-400 rounded-sm">
          <div v-for="n in 10" class="flex justify-between p-3 mb-4 border border-gray-400 rounded">
            <div>
              <div>
                <h2 class="text-xl font-bold">Problema com a entrega do produto</h2>
              </div>
              <div>Houve um problema com a e entrega do produ...</div>
              <div>Empresa</div>
              <!-- <ThumbsDown class="w-4 h-6 text-red-600 bg-blue-800 fill-red-700" /> <ThumbsUp class="w-4 h-6 text-red-600" />
              <ThumbsDown class="w-4 h-6 text-red-600 bg-blue-800 fill-red-700" /> <ThumbsUp class="w-4 h-6 text-red-600" />
              <MessageSquare class="w-4 h-6 text-red-600 bg-blue-800 fill-red-700" /> <ThumbsUp class="w-4 h-6 text-red-600" /> -->
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
            <div class="flex flex-col justify-between">
              <div class="p-1 bg-gray-100 rounded">Pendente</div>
              <div>
                <a href="" class="p-1 rounded-md text-lime-500 hover:text-lime-400">Ver Mais</a>
              </div>
            </div>
          </div>
        </div>
        <!-- ... -->
        <div>09</div>
      </div>
    </div>
  </main>
</template>
<style scoped></style>