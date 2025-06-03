<template>
  <div class="max-w-4xl mx-auto mt-8">
    <h2 class="text-2xl font-bold mb-4">Lista de Tarefas</h2>
    <table class="w-full bg-white shadow-md rounded overflow-hidden">
      <thead class="bg-gray-100">
        <tr>
          <th class="text-left px-4 py-2">Título</th>
          <th class="text-left px-4 py-2">Descrição</th>
          <th class="text-left px-4 py-2">Status</th>
          <th class="text-left px-4 py-2">Ações</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="lista in lista" :key="lista.id" class="border-t">
          <td class="px-4 py-2">
            <input v-if="lista.editando" v-model="lista.titulo" class="border px-2 py-1 w-full" />
            <span v-else>{{ lista.titulo }}</span>
          </td>
          <td class="px-4 py-2">
            <textarea v-if="lista.editando" v-model="lista.descricao" class="border px-2 py-1 w-full"></textarea>
            <span v-else>{{ lista.descricao || '-' }}</span>
          </td>
          <td class="px-4 py-2">
            <select v-if="lista.editando" v-model="lista.status" class="border px-2 py-1">
              <option value="pendente">Pendente</option>
              <option value="concluida">Concluída</option>
            </select>
            <span v-else :class="lista.status === 'concluida' ? 'text-green-600' : 'text-yellow-600'">{{ lista.status }}</span>
          </td>
          <td class="px-4 py-2 space-x-2">
            <button
              v-if="!lista.editando"
              @click="lista.editando = true"
              class="text-blue-600 hover:underline"
            >
              Editar
            </button>
            <button
              v-if="lista.editando"
              @click="salvarEdicao(lista)"
              class="text-green-600 hover:underline"
            >
              Salvar
            </button>
            
            <button
              @click="excluirTarefa(lista.id)"
              class="text-red-600 hover:underline"
            >
              Excluir
            </button>
            <button v-if="lista.deleted_at" @click="restaurarTarefa(lista.id)"
             class="text-green-600 ml-2"
             >
             Restaurar
            </button>
            
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
    };
  },
  mounted() {
    this.carregarTarefas();
  },
  methods: {
    async carregarTarefas() {
      const res = await fetch('/lista');
      const data = await res.json();
      // Adiciona a propriedade "editando" a cada tarefa
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

  },
};
</script>

