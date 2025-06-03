<template>
  <div class="flex gap-2 mb-4">
    <button
      v-for="option in options"
      :key="option.value"
      @click="$emit('filtroSelecionado', option.value)"
      :class="[
        'px-4 py-2 rounded font-semibold',
        filtroAtivo === option.value
          ? 'bg-blue-600 text-white'
          : 'bg-gray-200 text-gray-700 hover:bg-gray-300'
      ]"
    >
      {{ option.label }}
    </button>
  </div>
</template>

<script>
export default {
  props: {
    filtroAtivo: {
      type: String,
      default: ''
    }
  },
  data() {
    return {
      options: [
        { label: 'Todos', value: '' },
        { label: 'Pendentes', value: 'pendente' },
        { label: 'Concluídas', value: 'concluida' }
      ]
    };
  }
};
</script>
