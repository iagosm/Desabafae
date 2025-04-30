<script setup>
import Layout from "@/Pages/Layout/Layout.vue";
import { ref } from "vue";

const form = ref({
    titulo: "",
    descricao: "",
    empresa: "",
    tags: "",
    anonimo: false,
});

function enviarReclamacao() {
    console.log(form.value); // precisa acessar com .value
}
</script>

<template>
    <Layout>
        <div class="max-w-2xl p-6 mx-auto bg-white rounded-lg shadow">
            <h2 class="mb-6 text-2xl font-bold text-gray-800">
                Criar Reclamação
            </h2>

            <form @submit.prevent="enviarReclamacao">
                <!-- Título -->
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-gray-700"
                        >Título da Reclamação</label
                    >
                    <input
                        type="text"
                        v-model="form.titulo"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-lime-500 focus:border-lime-500"
                        placeholder="Ex: Atendimento ruim na loja X"
                    />
                </div>

                <!-- Descrição -->
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-gray-700"
                        >Descrição</label
                    >
                    <textarea
                        v-model="form.descricao"
                        rows="4"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-lime-500 focus:border-lime-500"
                        placeholder="Descreva o ocorrido..."
                    ></textarea>
                </div>

                <!-- Empresa -->
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-gray-700"
                        >Empresa</label
                    >
                    <input
                        type="text"
                        v-model="form.empresa"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-lime-500 focus:border-lime-500"
                        placeholder="Ex: Loja Tal, Empresa Y"
                    />
                </div>

                <!-- Tags -->
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-gray-700"
                        >Tags</label
                    >
                    <input
                        type="text"
                        v-model="form.tags"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-lime-500 focus:border-lime-500"
                        placeholder="Ex: atendimento, demora, cobrança indevida"
                    />
                    <p class="mt-1 text-xs text-gray-400">
                        Separe por vírgulas
                    </p>
                </div>

                <div class="mb-6">
                    <label class="inline-flex items-center">
                        <input
                            type="checkbox"
                            v-model="form.anonimo"
                            class="border-gray-300 rounded text-lime-600 focus:ring-lime-500"
                        />
                        <span class="ml-2 text-sm text-gray-700"
                            >Postar de forma anônima</span
                        >
                    </label>
                </div>

                <!-- Botão -->
                <div class="text-right">
                    <button
                        type="submit"
                        class="px-4 py-2 text-white transition rounded-md bg-lime-500 hover:bg-lime-600"
                    >
                        Enviar Reclamação
                    </button>
                </div>
            </form>
        </div>
    </Layout>
</template>
<style></style>
