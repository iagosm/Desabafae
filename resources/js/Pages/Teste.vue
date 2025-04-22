<script setup>
// Com fill-corquequero consigo definir a cor na interna do icone
// Com color eu seto a cor dele padrão
import { ThumbsDown, ThumbsUp, MessageSquare } from "lucide-vue-next";
import "flowbite";
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
      <button class="px-4 py-2 text-sm border border-gray-300 rounded-full hover:bg-gray-100">
        Entrar
      </button>
      <button class="px-4 py-2 text-sm font-medium text-white rounded-full bg-lime-400 hover:bg-lime-500">
        Cadastrar
      </button>
    </div>
  </header>
  <div class="max-w-5xl px-4 py-8 mx-auto">
    <div class="mb-6">
      <input type="text" placeholder="Buscar reclamações..."
        class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-lime-500 focus:border-lime-500" />
    </div>
    <h1 class="mb-6 text-4xl font-bold">Reclamações</h1>

    <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
      <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-styled-tab"
        data-tabs-toggle="#default-styled-tab-content"
        data-tabs-active-classes="text-purple-600 hover:text-purple-600 dark:text-purple-500 dark:hover:text-purple-500 border-purple-600 dark:border-purple-500"
        data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300"
        role="tablist">
        <li class="me-2" role="presentation">
          <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-styled-tab"
            data-tabs-target="#styled-profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
            Profile
          </button>
        </li>
        <li class="me-2" role="presentation">
          <button
            class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
            id="dashboard-styled-tab" data-tabs-target="#styled-dashboard" type="button" role="tab"
            aria-controls="dashboard" aria-selected="false">
            Dashboard
          </button>
        </li>
        <li class="me-2" role="presentation">
          <button
            class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
            id="settings-styled-tab" data-tabs-target="#styled-settings" type="button" role="tab"
            aria-controls="settings" aria-selected="false">
            Settings
          </button>
        </li>
        <li role="presentation">
          <button
            class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
            id="contacts-styled-tab" data-tabs-target="#styled-contacts" type="button" role="tab"
            aria-controls="contacts" aria-selected="false">
            Contacts
          </button>
        </li>
      </ul>
    </div>
    <div id="default-styled-tab-content">
      <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-profile" role="tabpanel"
        aria-labelledby="profile-tab">
        <div class="grid grid-cols-1 gap-4">
          <div class="p-4 border border-red-400 rounded-sm">
            <div v-for="n in 10" class="flex justify-between p-3 mb-4 border border-gray-400 rounded">
              <div>
                <div>
                  <h2 class="text-xl font-bold">
                    Problema com a entrega do produto
                  </h2>
                </div>
                <div>
                  Houve um problema com a e entrega do
                  produ...
                </div>
                <div>Empresa</div>
                <!-- <ThumbsDown class="w-4 h-6 text-red-600 bg-blue-800 fill-red-700" /> <ThumbsUp class="w-4 h-6 text-red-600" />
              <ThumbsDown class="w-4 h-6 text-red-600 bg-blue-800 fill-red-700" /> <ThumbsUp class="w-4 h-6 text-red-600" />
              <MessageSquare class="w-4 h-6 text-red-600 bg-blue-800 fill-red-700" /> <ThumbsUp class="w-4 h-6 text-red-600" /> -->
                <div class="mt-2 flex align-middle justify-between max-w-[150px]">
                  <div class="flex gap-1">
                    <ThumbsUp class="w-4 h-4 text-black" />
                    <span>12</span>
                  </div>
                  <div class="flex gap-1">
                    <ThumbsDown class="w-4 h-6 text-black" />
                    <span>52</span>
                  </div>
                  <div class="flex gap-1">
                    <MessageSquare class="w-4 h-6 text-black" />
                    <span>90</span>
                  </div>
                </div>
              </div>
              <div class="flex flex-col justify-between">
                <div class="p-1 bg-gray-100 rounded">
                  Pendente
                </div>
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
      <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-dashboard" role="tabpanel"
        aria-labelledby="dashboard-tab">
        <p>Segunda tab teste</p>
      </div>
      <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-settings" role="tabpanel"
        aria-labelledby="settings-tab">
        <p>Terceira tab teste</p>
      </div>
      <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-contacts" role="tabpanel"
        aria-labelledby="contacts-tab">
        <p>Quarta tab teste</p>
      </div>
    </div>
  </div>
</template>
<style scoped></style>