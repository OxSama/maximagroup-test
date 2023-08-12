<template>
    <button @click="clickEvent" :class="computedClass">
        <span v-if="icon" class="mr-2" v-html="icon"></span>
        {{ label }}
    </button>
</template>

<script>
export default {
    props: {
        label: {
            type: String,
            required: true
        },
        type: {
            type: String,
            default: 'default'
        },
        icon: {
            type: String,
            default: ''
        },
        styleClass: {
            type: String,
            default: ''
        }
    },
    computed: {
        computedClass() {
            let baseClasses = 'px-4 p-3 rounded-lg';

            if (this.styleClass) {
                return `${baseClasses} ${this.styleClass}`;
            }

            switch (this.type) {
                case 'confirm':
                    return `${baseClasses} bg-transparent text-indigo-500 hover:bg-gray-100 hover:text-indigo-400`;
                case 'cancel':
                    return `${baseClasses} bg-indigo-500 text-white hover:bg-indigo-400`;
                default:
                    return `${baseClasses} bg-gray-300 text-black hover:bg-gray-400`;
            }
        }
    },
    methods: {
        clickEvent() {
            this.$emit('click');
        }
    }
}
</script>
