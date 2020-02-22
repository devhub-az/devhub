<template>
    <div class="post__hubs">
        <div v-for="hub in data">
            <div class="hub popup-hub" :class="{'active_hub': hub.follower_check, 'popup-active': hub.hover}"
                 @mouseover="hub.hover = true"
                 @mouseleave="hub.hover = false">
                {{ hub.name }}
                <div class="tag-popup" v-if="hub.hover">
                    <div class="-container">
                        <div class="-arrow js-source-arrow -top" style="margin-left: 0px;"></div>
                        <h3><a :href="'/hubs/' + hub.id">{{ hub.name }}</a></h3>
                        <p>{{ hub.description}}</p>
                        <hub-follow-button :hub="hub" :auth_check="auth_check"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['data', 'auth_check'],
        created() {
            this.data.forEach((item) => {
                this.$set(item, 'hover', false)
            })
        }
    }
</script>

<style scoped lang="scss">
    .popup-active > .tag-popup{
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        width: 320px;
        padding: 12px;
        transition: all .2s ease;

        h3{
            margin: 4px 0 8px;
        }

        .-container{
            background-color: var(--background-tertiary);
            border: 1px solid var(--color-border);
            border-radius: 5px;
            color: var(--text-black-primary);
            padding: 16px;
            font-size: 13px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.06), 0 2px 6px rgba(0,0,0,0.06), 0 3px 8px rgba(0,0,0,0.09);

            .-arrow{
                display: block;
                transform: rotate(45deg);
                top: 11px;
                position: absolute;
                left: 50%;

                &:before{
                    position: absolute;
                    content: '';
                    background: var(--background-tertiary);
                    border: 1px solid var(--color-border);
                    border-bottom: none;
                    border-right: none;
                    top: -6px;
                    left: -6px;
                    width: 12px;
                    height: 12px;
                }
            }
        }

    }

    .popup-active > .tooltip-balloon {
        background-color: var(--background-tertiary);
        border: 1px solid var(--color-border);
        border-radius: 5px;
        padding: 16px;
        font-size: 13px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.06), 0 2px 6px rgba(0, 0, 0, 0.06), 0 3px 8px rgba(0, 0, 0, 0.09);
        color: var(--text-black-secondary);
        position: absolute;
        min-width: 50px;
        top: 25px;
        max-width: 320px;

        .-arrow {
            padding: 0;
            border: 0;
            font: inherit;
            font-size: 100%;
            vertical-align: baseline;
            box-sizing: inherit;
            position: absolute;
            left: 52%;
            display: block;
            transform: rotate(45deg);
            bottom: -10px;
            margin: 0 0 0 0;

            &:after {
                position: absolute;
                content: '';
                background: var(--background-tertiary);
                border: 1px solid var(--color-border);
                border-bottom: none;
                border-right: none;
                top: -6px;
                left: -6px;
                width: 12px;
                height: 12px;
            }
        }
    }
</style>
