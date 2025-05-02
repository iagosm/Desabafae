<script setup>
  import Layout from '@/Pages/Layout/Layout.vue';
  import {
    UserPlus,
    FileEdit,
    EyeOff,
    Users,
    MessageCircle,
    Building,
    ShieldAlert
  } from 'lucide-vue-next';
</script>
<template>
  <Layout>
    <section class="max-w-4xl px-6 py-12 mx-auto">
      <h1 class="mb-4 text-3xl font-bold text-lime-600">Como Funciona</h1>
      <ol class="space-y-6 text-lg text-gray-700 list-decimal list-inside">
        <li class="flex items-start gap-3">
          <UserPlus class="w-6 h-6 mt-1 text-lime-600" />
          <div>
            <strong>Crie sua conta</strong><br />
            Comece se cadastrando com seu e-mail e uma senha. É simples, rápido e gratuito.
          </div>
        </li>
        <li class="flex items-start gap-3">
          <FileEdit class="w-6 h-6 mt-1 text-lime-600" />
          <div>
            <strong>Publique sua reclamação</strong><br />
            Escolha a empresa, conte o que aconteceu e adicione algumas tags que ajudem a classificar o problema.
          </div>
        </li>
        <li class="flex items-start gap-3">
          <EyeOff class="w-6 h-6 mt-1 text-lime-600" />
          <div>
            <strong>Fique à vontade para se manter anônimo</strong><br />
            Se quiser, você pode publicar sua reclamação sem mostrar seu nome.
          </div>
        </li>
        <li class="flex items-start gap-3">
          <Users class="w-6 h-6 mt-1 text-lime-600" />
          <div>
            <strong>Converse com a comunidade</strong><br />
            Leia experiências de outras pessoas, comente, curta ou mostre que discorda de forma respeitosa.
          </div>
        </li>
        <li class="flex items-start gap-3">
          <MessageCircle class="w-6 h-6 mt-1 text-lime-600" />
          <div>
            <strong>Interaja com publicações e comentários</strong><br />
            Dê like ou dislike nas reclamações e comentários. Também é possível deixar sua opinião por escrito.
          </div>
        </li>
        <li class="flex items-start gap-3">
          <Building class="w-6 h-6 mt-1 text-lime-600" />
          <div>
            <strong>Empresas podem responder</strong><br />
            As empresas podem criar perfis oficiais para responder às reclamações e melhorar sua imagem com os consumidores.
          </div>
        </li>
        <li class="flex items-start gap-3">
          <ShieldAlert class="w-6 h-6 mt-1 text-lime-600" />
          <div>
            <strong>Denuncie conteúdos impróprios</strong><br />
            Qualquer pessoa, com ou sem conta, pode denunciar publicações ou comentários que não sigam as regras da comunidade.
          </div>
        </li>
      </ol>
    </section>
  </Layout>
</template>
<style scoped></style>
