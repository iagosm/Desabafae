<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
	name: '',
	email: '',
	password: '',
	password_confirmation: '',
});

const submit = () => {
	form.post(route('register'), {
		onFinish: () => form.reset('password', 'password_confirmation'),
	});
};
</script>
<template>
	<div class="flex items-center justify-center min-h-screen px-6 py-12 bg-gray-50">
		<div class="w-full max-w-sm space-y-8">
			<div>
				<img src="@/assets/logo2.png" class="w-20 h-20 mx-auto" alt="Desabafaê">
			</div>
			<form @submit.prevent="submit">
				<div>
					<InputLabel for="name" value="Nome" />
					<TextInput id="name" type="text" class="block w-full mt-1" v-model="form.name" required autofocus
						autocomplete="name" />
					<InputError class="mt-2" :message="form.errors.name" />
				</div>
				<div class="mt-4">
					<InputLabel for="email" value="E-mail" />
					<TextInput id="email" type="email" class="block w-full mt-1" v-model="form.email" required
						autocomplete="username" />
					<InputError class="mt-2" :message="form.errors.email" />
				</div>
				<div class="mt-4">
					<InputLabel for="password" value="Senha" />
					<TextInput id="password" type="password" class="block w-full mt-1" v-model="form.password" required
						autocomplete="new-password" />
					<InputError class="mt-2" :message="form.errors.password" />
				</div>
				<div class="mt-4">
					<InputLabel for="password_confirmation" value="Confirmar Senha" />
					<TextInput id="password_confirmation" type="password" class="block w-full mt-1"
						v-model="form.password_confirmation" required autocomplete="new-password" />
					<InputError class="mt-2" :message="form.errors.password_confirmation" />
				</div>
				<div class="flex items-center justify-end mt-4 mb-4">
					<Link :href="route('login')"
						class="text-sm text-gray-500 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-lime-500 focus:ring-offset-2">
					Já possui registro?
					</Link>
				</div>
				<div>
					<button :class="{ 'opacity-25': form.processing }" :disabled="form.processing"
            class="flex justify-center w-full px-3 py-2 text-sm font-semibold text-white rounded-md shadow-sm bg-lime-500 hover:bg-lime-600 focus:outline-none focus:ring-2 focus:ring-lime-500 focus:ring-offset-2">
            Cadastrar
          </button>
				</div>
			</form>
		</div>
	</div>
</template>
