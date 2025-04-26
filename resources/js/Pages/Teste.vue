<script setup>
// Com fill-corquequero consigo definir a cor na interna do icone
// Com color eu seto a cor dele padrão
import { ThumbsDown, ThumbsUp, MessageSquare } from "lucide-vue-next";
import { ref, computed } from "vue";
import { Link, router, usePage } from "@inertiajs/vue3"
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
const activeTab = ref('mais-curtidas');

const getComplaint = ($idComplaint) => {
  sessionStorage.setItem('complaintId', $idComplaint);
  router.visit(route('complaint'))
};
const isLoggedIn = computed(() => page.props.auth.user)
const page = usePage()
const user = page.props.auth.user
console.log(page)
console.log(user)
</script>
<template>
  <header class="flex items-center justify-between px-6 py-4 shadow-sm bg-[#F8FAFC">
    <div class="flex items-center space-x-2">
      <img class="w-10 h-10 rounded-full" src="@/assets/logo.png" alt="Rounded avatar">
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
      <div v-if="!isLoggedIn" class="flex items-center space-x-3">
        <Link href="/login" class="px-4 py-2 text-sm border border-gray-300 rounded-lg hover:bg-gray-100">
          Entrar
        </Link>
        <Link href="/register" class="px-4 py-2 text-sm font-medium text-white rounded-lg bg-lime-500 hover:bg-lime-600">
          Cadastrar
        </Link>
      </div>
      <div v-else class="relative ms-3">
        <Dropdown align="right" width="48">
          <template #trigger>
            <span class="inline-flex rounded-md">
              <button type="button"
                class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md hover:text-gray-700 focus:outline-none">
                {{ $page.props.auth.user.name }}

                <svg class="-me-0.5 ms-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                  fill="currentColor">
                  <path fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd" />
                </svg>
              </button>
            </span>
          </template>

          <template #content>
            <DropdownLink :href="route('profile.edit')">
              Perfil
            </DropdownLink>
            <DropdownLink :href="route('logout')" method="post" as="button">
              Sair
            </DropdownLink>
          </template>
        </Dropdown>
      </div>
    </div>
  </header>
  <main class="max-w-screen-xl px-2 py-8 mx-auto">
    <div class="mt-2 mb-6">
      <input type="text" placeholder="Buscar reclamações..."
        class="block w-full max-w-md px-4 py-2 mx-auto border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-lime-500 focus:border-lime-500" />
    </div>
    <h1 class="mb-6 text-4xl font-bold">Reclamações</h1>
    <div class="border-b border-gray-200">
      <nav class="flex -mb-px">
        <button @click="activeTab = 'mais-curtidas'" :class="[
          'py-4 px-6 font-medium text-sm border-b-2 focus:outline-none',
          activeTab === 'mais-curtidas'
            ? 'border-lime-500 text-lime-600'
            : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'
        ]">
          Mais Curtidas
        </button>
        <button @click="activeTab = 'pendentes'" :class="[
          'py-4 px-6 font-medium text-sm border-b-2 focus:outline-none',
          activeTab === 'pendentes'
            ? 'border-lime-500 text-lime-600'
            : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'
        ]">
          Pendentes
        </button>
        <button @click="activeTab = 'resolvidas'" :class="[
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
      <div v-if="activeTab === 'mais-curtidas'" class="space-y-6">
        <div class="grid grid-cols-2 gap-4">
          <div v-for="n in 10"
            class="flex justify-between p-5 border border-gray-200 rounded-lg shadow-sm mb-4bg-white dark:bg-gray-800 dark:border-gray-700">
            <div>
              <div class="space-y-2">
                <h2 class="text-xl font-semibold text-gray-800">Problema com a entrega do produto</h2>
                <p class="text-sm text-gray-600">Houve um problema com a entrega do produto...</p>
                <p class="text-xs text-gray-500">Empresa</p>
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
                Pendente
              </div>
              <div>
                <Link @click.prevent="getComplaint()" class="p-1 rounded-md text-lime-500 hover:text-lime-600">Ver Mais
                </Link>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <footer class="py-4 border-t">
    <div class="text-center">
      <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2025 <a
          href="https://www.linkedin.com/in/iagosm/" target="_blank" class="hover:underline text-lime-600">Iago
          Sousa</a>.
        Todos os Direitos Reservados.</span>
    </div>
  </footer>
</template>
<style scoped></style>