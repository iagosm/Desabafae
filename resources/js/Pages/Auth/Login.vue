<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
  canResetPassword: {
    type: Boolean,
  },
  status: {
    type: String,
  },
});

const form = useForm({
  email: '',
  password: '',
  remember: false,
});

const submit = () => {
  form.post(route('login'), {
    onFinish: () => form.reset('password'),
  });
};
</script>
<template>
  <div class="flex items-center justify-center min-h-screen px-6 py-12 bg-gray-50">
    <div class="w-full max-w-sm space-y-8">
      <div>
        <img src="@/assets/logo2.png" class="w-20 h-20 mx-auto" alt="Desabafaê">
      </div>
      <div v-if="status" class="mb-4 text-sm font-medium text-green-600">
        {{ status }}
      </div>
      <form class="space-y-6" @submit.prevent="submit">
        <div>
          <label for="email" class="block text-sm font-medium text-gray-900">E-mail</label>
          <div class="mt-2">
            <input v-model="form.email" required autofocus id="email" name="email" type="email" autocomplete="email"
              class="block w-full px-3 py-2 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
          </div>
          <InputError class="mt-2" :message="form.errors.email" />
        </div>
        <div>
          <label for="password" class="block text-sm font-medium text-gray-900">Senha</label>
          <div class="mt-2">
            <input id="password" name="password" v-model="form.password" type="password" autocomplete="current-password"
              required
              class="block w-full px-3 py-2 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            <InputError class="mt-2" :message="form.errors.password" />
          </div>
        </div>
        <div>
          <Link v-if="canResetPassword" :href="route('password.request')"
            class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
          Esqueceu a senha
          </Link>
        </div>
        <div class="block mt-4">
          <label class="flex items-center">
            <Checkbox name="remember" v-model:checked="form.remember" />
            <span class="text-sm text-gray-600 ms-2">
              Lembre-se de Mim
            </span>
          </label>
        </div>
        <div>
          <button :class="{ 'opacity-25': form.processing }" :disabled="form.processing"
            class="flex justify-center w-full px-3 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-md shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
            Entrar
          </button>
        </div>
      </form>
      <p class="mt-10 text-sm text-center text-gray-500">
        Não possui conta?
        <!-- TODO adicionar validação se pode registarar -->
        <Link :href="route('register')"
          class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
        Cadastre-se
        </Link>
      </p>
    </div>
  </div>
</template>
