<template>
    <div class="post__hubs">
        <div v-for="hub in data">
            <div class="hub popup-hub" :class="{'active_hub': hub.follower_check, 'active': hub.hover}"
                 @mouseover="hub.hover = true"
                 @mouseleave="hub.hover = false">
                {{ hub.name }}
                <div class="tag-popup" v-if="hub.hover">
                    <div class="-container">
                        <div class="-arrow js-source-arrow -top" style="margin-left: 0px;"></div>
                        <h3>{{ hub.name }}</h3>
                        <br>
                        <p>{{ hub.description}}</p>
                        <hub-follow-button :hub="hub"></hub-follow-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['data'],
        created() {
            this.data.forEach((item) => {
                this.$set(item, 'hover', false)
            })
        }
    }
</script>

<style scoped lang="scss">
    .active > .tag-popup{
        position: absolute;
        top: 27px;
        left: 50%;
        transform: translateX(-50%);
        width: 320px;
        transition: all .2s ease;

        .-container{
            background-color: #fff;
            border: 1px solid #bbc0c4;
            border-radius: 5px;
            padding: 16px;
            font-size: 13px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.06), 0 2px 6px rgba(0,0,0,0.06), 0 3px 8px rgba(0,0,0,0.09);

            .-arrow{
                display: block;
                transform: rotate(45deg);
                top: -1px;
                position: absolute;
                left: 50%;

                &:before{
                    position: absolute;
                    content: '';
                    background: #fff;
                    border: 1px solid #bbc0c4;
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

    .active > .tooltip-balloon {
        background-color: #fff;
        border: 1px solid #bbc0c4;
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
                background: #fff;
                border: 1px solid #bbc0c4;
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
