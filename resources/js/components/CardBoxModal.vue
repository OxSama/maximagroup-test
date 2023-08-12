<script setup>
import { computed } from "vue";
import BaseButton from "./BaseButton.vue";
import BaseButtons from "./BaseButtons.vue";
import CardBox from "./CardBox.vue";
import OverlayLayer from "./OverlayLayer.vue";
import CardBoxComponentTitle from "./CardBoxComponentTitle.vue";

const props = defineProps({
    title: {
        type: String,
        required: true,
    },
    buttonLabel: {
        type: String,
        default: "Done",
    },
    hasCancel: Boolean,
    modelValue: {
        type: [String, Number, Boolean],
        default: null,
    },
});

const emit = defineEmits(["update:modelValue", "cancel", "confirm"]);

const value = computed({
    get: () => props.modelValue,
    set: (value) => emit("update:modelValue", value),
});

const confirmCancel = (mode) => {
    value.value = false;
    emit(mode);
};

const confirm = () => confirmCancel("confirm");

const cancel = () => confirmCancel("cancel");

window.addEventListener("keydown", (e) => {
    if (e.key === "Escape" && value.value) {
        cancel();
    }
});
</script>

<template>
    <OverlayLayer v-show="value" @overlay-click="cancel">
        <CardBox v-show="value" is-modal>
            <CardBoxComponentTitle :title="title">
                <BaseButton v-if="hasCancel" small @click.prevent="cancel">
                    X
                </BaseButton>
            </CardBoxComponentTitle>

            <div>
                <slot />
            </div>

            <template #footer>
                <BaseButtons>
                    <BaseButton :label="buttonLabel" @click="confirm" />
                    <BaseButton v-if="hasCancel" label="Cancel" outline @click="cancel" />
                </BaseButtons>
            </template>
        </CardBox>
    </OverlayLayer>
</template>
