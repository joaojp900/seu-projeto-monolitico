<template>
  <div class="max-w-4xl mx-auto mt-8">
    <h2 class="text-2xl font-bold mb-4">Lista de Tarefas</h2>

    <!-- Botões de Filtro -->
    <div class="flex space-x-4 mb-4">
      <button @click="filtroStatus = ''" class="bg-gray-300 px-4 py-2 rounded">Todas</button>
      <button @click="filtroStatus = 'pendente'" class="bg-yellow-400 px-4 py-2 rounded">Pendentes</button>
      <button @click="filtroStatus = 'concluida'" class="bg-green-400 px-4 py-2 rounded">Concluídas</button>
    </div>

    <!-- Tabela -->
    <table class="w-full bg-white shadow-md rounded overflow-hidden">
      <thead class="bg-gray-100">
        <tr>
          <th class="text-left px-4 py-2">Título</th>
          <th class="text-left px-4 py-2">Descrição</th>
          <th class="text-left px-4 py-2">Status</th>
          <th class="text-left px-4 py-2">Data de Criação</th>
          <th class="text-left px-4 py-2">Ações</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="tarefa in tarefasFiltradas" :key="tarefa.id" class="border-t">
          <td class="px-4 py-2">
            <input v-if="tarefa.editando" v-model="tarefa.titulo" class="border px-2 py-1 w-full" />
            <span v-else>{{ tarefa.titulo }}</span>
          </td>
          <td class="px-4 py-2">
            <textarea v-if="tarefa.editando" v-model="tarefa.descricao" class="border px-2 py-1 w-full"></textarea>
            <span v-else>{{ tarefa.descricao || '-' }}</span>
          </td>
          <td class="px-4 py-2">
            <select v-if="tarefa.editando" v-model="tarefa.status" class="border px-2 py-1">
              <option value="pendente">Pendente</option>
              <option value="concluida">Concluída</option>
            </select>
            <span v-else :class="tarefa.status === 'concluida' ? 'text-green-600' : 'text-yellow-600'">{{ tarefa.status }}</span>
          </td>
          <td class="px-4 py-2">
            {{ formatarData(tarefa.created_at) }}
          </td>
          <td class="px-4 py-2 space-x-2">
            <button v-if="!tarefa.editando" @click="tarefa.editando = true" class="text-blue-600 hover:underline">Editar</button>
            <button v-if="tarefa.editando" @click="salvarEdicao(tarefa)" class="text-green-600 hover:underline">Salvar</button>
            <button @click="excluirTarefa(tarefa.id)" class="text-red-600 hover:underline">Excluir</button>
            <button v-if="tarefa.deleted_at" @click="restaurarTarefa(tarefa.id)" class="text-green-600 ml-2">Restaurar</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  data() {
    return {
      lista: [],
      filtroStatus: '' // <-- Aqui está o filtro
    };
  },
  computed: {
    tarefasFiltradas() {
      if (!this.filtroStatus) return this.lista;
      return this.lista.filter(t => t.status === this.filtroStatus);
    }
  },
  mounted() {
    this.carregarTarefas();
  },
  methods: {
    async carregarTarefas() {
      const res = await fetch('/lista');
      const data = await res.json();
      this.lista = data.map(t => ({ ...t, editando: false }));
    },
    async salvarEdicao(tarefa) {
      try {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        const res = await fetch(`/lista/${tarefa.id}`, {
          method: 'PUT',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
          },
          body: JSON.stringify({
            titulo: tarefa.titulo,
            descricao: tarefa.descricao,
            status: tarefa.status,
          }),
        });

        if (!res.ok) throw new Error('Erro ao salvar edição');

        tarefa.editando = false;
        alert('Tarefa atualizada com sucesso!');
      } catch (error) {
        alert(error.message);
      }
    },
    formatarData(dataISO) {
      const data = new Date(dataISO);
      return data.toLocaleDateString('pt-BR') + ' ' + data.toLocaleTimeString('pt-BR');
    },
    async excluirTarefa(id) {
      if (!confirm('Deseja realmente excluir esta tarefa?')) return;

      try {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        const res = await fetch(`/lista/${id}`, {
          method: 'DELETE',
          headers: {
            'X-CSRF-TOKEN': csrfToken,
          },
        });

        if (!res.ok) throw new Error('Erro ao excluir tarefa');

        this.lista = this.lista.filter(t => t.id !== id);
        alert('Tarefa excluída com sucesso!');
      } catch (error) {
        alert(error.message);
      }
    },
    async restaurarTarefa(id) {
      try {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        const res = await fetch(`/lista/${id}/restaurar`, {
          method: 'POST',
          headers: {
            'X-CSRF-TOKEN': csrfToken,
          },
        });

        if (!res.ok) throw new Error('Erro ao restaurar tarefa');

        alert('Tarefa restaurada!');
        this.carregarTarefas();
      } catch (error) {
        alert(error.message);
      }
    }
  }
};
</script>
