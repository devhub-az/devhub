<template>
    <select :data-placeholder="placeholder" :multiple="multiple" :disabled="disabled">
        <option v-for="option in localOptions" v-bind:value="option[trackBy]">
            {{ option[label] }}
        </option>
    </select>
</template>

<script>
    export default {
        props: {
            value: {
                type: [String, Number, Array, Object],
                default: null
            },
            options: {
                type: [Array, Object],
                default: () => []
            },
            label: {
                type: String,
                default: 'label'
            },
            trackBy: {
                type: String,
                default: 'id'
            },
            multiple: {
                type: Boolean,
                default: false
            },
            placeholder: {
                type: String,
                default: 'Select'
            },
            searchable: {
                type: Boolean,
                default: true
            },
            searchableMin: {
                type: Number,
                default: 1
            },
            allowEmpty: {
                type: Boolean,
                default: true
            },
            allowAll: {
                type: Boolean,
                default: false
            },
            disabled: {
                type: Boolean,
                default: false
            },
            onValueReturn: {
                type: Object,
                default: () => ({})
            }
        },

        computed: {
            localOptions() {
                let vm = this,
                    options = []

                if (this.allowAll) {
                    options.push({
                        [this.trackBy]: -1,
                        [this.label]: 'All'
                    })
                }

                if (Array.isArray(this.options)) {
                    return options.concat(this.options)
                }

                Object.keys(this.options).forEach(function (key) {
                    options.push({
                        [vm.trackBy]: key,
                        [vm.label]: vm.options[key]
                    })
                })

                return this.allowEmpty
                    ? [{ [this.trackBy]: null, [this.label]: '' }].concat(options)
                    : options
            },

            localValue() {
                let value = this.allowAll && this.value === null ? -1 : this.value

                this.$nextTick(function () {
                    $(this.$el).val(value).trigger("chosen:updated")
                })

                return value
            }
        },

        watch: {
            localValue() {
            },

            localOptions() {
                this.$nextTick(function () {
                    let value = this.allowAll && this.value === null ? '-1' : this.value
                    $(this.$el).val(value).trigger("chosen:updated")
                })
            }
        },

        mounted() {
            let component = this

            $(this.$el).chosen({
                width: "100%",
                disable_search_threshold: this.searchable ? this.searchableMin : 100000
            }).change(function ($event) {
                const value = $($event.target).val()
                if (typeof component.onValueReturn[value] !== 'undefined') {
                    return component.$emit('input', component.onValueReturn[value])
                }
                if (component.allowAll && ($($event.target).val() === '-1' || $($event.target).val() === -1)) {
                    return component.$emit('input', null)
                }
                component.$emit('input', $($event.target).val())
            })
        }
    }
</script>
