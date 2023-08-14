<template>
    <div class="mt-2.5 mb-2">
      <label :for="id" class="block mb-1 text-sm text-gray-600">{{ placeholder }}</label>
      <input
        :id="id"
        :type="type"
        :placeholder="placeholder"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        @error="handleErrorEvent"
        class="w-full p-2 text-base transition duration-300 ease-in-out border rounded-md focus:border-blue-500 focus:outline-none focus:shadow-outline-blue"
      />
      <span v-if="error" class="block mt-1 text-sm text-red-500">{{ error }}</span>
    </div>
</template>


  <script>
  export default {
    name: 'FormInput',
    props: {
      modelValue: String,
      id: {
        type: String,
        required: true
      },
      type: {
        type: String,
        default: 'text'
      },
      placeholder: {
        type: String,
        default: ''
      }
    },
    data() {
      return {
        error: ''
      };
    },
    methods: {
      handleErrorEvent() {
        this.$emit('error', this.id);
      },
      handleError(errorMessage) {
        this.error = errorMessage;
      }
    }
  };
  </script>

