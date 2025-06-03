<template>

  <form @submit.prevent="submitForm" class="max-w-lg mx-auto p-6 bg-white rounded shadow-md">
    <div class="mb-4">
      <label for="titulo" class="block text-gray-700 font-semibold mb-2">Título <span class="text-red-500">*</span></label>
      <input
        id="titulo"
        v-model="form.titulo"
        type="text"
        required
        class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
        placeholder="Digite o título da tarefa"
      />
    </div>

    <div class="mb-4">
      <label for="descricao" class="block text-gray-700 font-semibold mb-2">Descrição</label>
      <textarea
        id="descricao"
        v-model="form.descricao"
        rows="4"
        class="w-full px-3 py-2 border border-gray-300 rounded resize-none focus:outline-none focus:ring-2 focus:ring-blue-500"
        placeholder="Descrição opcional"
      ></textarea>
    </div>

    <div class="mb-4">
      <label class="block text-gray-700 font-semibold mb-2">Status</label>
      <select
        v-model="form.status"
        class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
        required
      >
        <option value="pendente">Pendente</option>
        <option value="concluida">Concluída</option>
      </select>
    </div>

    <button
      type="submit"
      class="w-full bg-blue-600 text-white font-semibold py-2 rounded hover:bg-blue-700 transition"
    >
      Criar Tarefa
    </button>
  </form>
</template>

<script>
export default {
  data() {
    return {
      form: {
        titulo: '',
        descricao: '',
        status: 'pendente',
      },
    };
  },
  methods: {
    async submitForm() {
      if (!this.form.titulo.trim()) {
        alert('O título é obrigatório.');
        return;
      }

      try {
        const response = await fetch('/lista', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
          },
          body: JSON.stringify(this.form),
        });

        if (!response.ok) throw new Error('Falha ao criar tarefa.');

        alert('Tarefa criada com sucesso!');
        window.location.href = '/dashboard';
        this.form.titulo = '';
        this.form.descricao = '';
        this.form.status = 'pendente';
      } catch (error) {
        alert(error.message);
      }
    },
  },
};
</script>
