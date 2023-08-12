<template>
    <transition name="modal-fade">
        <div v-if="show" class="fixed top-0 left-0 w-full h-full flex items-center justify-center z-50">
            <Overlay />
            <CardBox :title="title" :message="message" @close-modal="closeModal" @confirm="onConfirm" @cancel="onCancel" />
        </div>
    </transition>
</template>

<script>
import CardBox from "./CardBox.vue";
import Overlay from "./OverlayLayer.vue";

export default {
    components: {
        CardBox,
        Overlay
    },
    props: {
        title: {
            type: String,
            default: 'Confirm Action'
        },
        message: {
            type: String,
            default: 'Are you sure you want to proceed?'
        },
        show: {
            type: Boolean,
            default: false
        }
    },
    methods: {
        closeModal() {
            this.$emit('close-modal');
        },
        onConfirm() {
            this.$emit('confirm');
        },
        onCancel() {
            this.$emit('cancel');
        }
    }
}
</script>
