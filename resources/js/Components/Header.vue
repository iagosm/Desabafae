<script setup>
import { ref, computed, watch  } from "vue";
import { Link, router, usePage } from "@inertiajs/vue3"
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
const page = usePage()
const isLoggedIn = computed(() => page.props.auth.user)
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
</template>
<style scoped></style>