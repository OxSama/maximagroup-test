<template>
    <div class="bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
        <div class="py-4 text-left px-6">
            <div class="flex justify-between items-center pb-3">
                <p class="text-2xl font-bold">{{ title }}</p>
                <button @click="close" class="cursor-pointer z-50">
                    <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                        viewBox="0 0 18 18">
                        <path d="M18 1.3L16.7 0 9 7.7 1.3 0 0 1.3 7.7 9 0 16.7 1.3 18 9 10.3l7.7 7.7 1.3-1.3L10.3 9z">
                        </path>
                    </svg>
                </button>
            </div>
            <p>{{ message }}</p>
            <ButtonsWrapper>
                <ButtonComponent label="Confirm" type="confirm" @click="confirm"/>
                <ButtonComponent label="Cancel" type="cancel" @click="close"/>
              </ButtonsWrapper>
        </div>
    </div>
</template>

<script>
import ButtonComponent from './BaseButton.vue';
import ButtonsWrapper from './BaseButtons.vue';

export default {
    components: {
    ButtonComponent,
    ButtonsWrapper
  },
    props: {
        title: {
            type: String,
            default: 'Confirm Action'
        },
        message: {
            type: String,
            default: 'Are you sure you want to proceed?'
        }
    },
    methods: {
        close() {
            this.$emit('close-modal');
            this.$emit('cancel');
        },
        confirm() {
            this.$emit('close-modal');
            this.$emit('confirm');
        }
    }
}
</script>
