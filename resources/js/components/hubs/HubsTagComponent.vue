<template>
    <div class="flex">
        <div v-for="hub in data">
            <div class="border relative rounded text-sm cursor-pointer px-2 mr-2 hover:border-blue"
                 :class="(hub.follower_check ? 'border-blue ' : 'border-gray-200  text-gray-700 ') + (hub.hover ? 'popup-active': '')"
                 @mouseover="hub.hover = true"
                 @mouseleave="hub.hover = false">
                {{ hub.name }}
                <div class="absolute rounded t-2 pt-2 -left-1/2 cursor-auto" v-if="hub.hover">
                    <div class="w-80 p-2 shadow border rounded bg-white">
                        <div class="flex pb-2">
                            <img :src="'/' + hub.logo" alt="Hub logo" class="w-10 h-10 rounded border">
                            <div class="pl-2">
                                <h3 class="font-semibold"><a :href="'/hubs/' + hub.id">{{ hub.name }}</a></h3>
                                <div class="flex text-xs">
                                    <p>{{ hub.hub_followers_count }} izləyən</p>
                                    <p class="ml-2">{{ hub.rating }} reyting</p>
                                </div>
                            </div>
                        </div>
                        <p class="text-sm">{{ hub.description }}</p>
                        <hub-follow-button :hub="hub" :auth_check="auth_check" class="py-3 w-max"/>
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
//.tag {
//
//    &__container {
//        background-color: white;
//        border: 1px solid var(--color-border);
//        border-radius: 5px;
//        color: var(--text-black-primary);
//        padding: 16px;
//        font-size: 13px;
//        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.06), 0 2px 6px rgba(0, 0, 0, 0.06), 0 3px 8px rgba(0, 0, 0, 0.09);
//
//        .-arrow {
//            display: block;
//            transform: rotate(45deg);
//            top: 11px;
//            position: absolute;
//            left: 50%;
//
//            &:before {
//                position: absolute;
//                content: '';
//                background: var(--background-tertiary);
//                border: 1px solid var(--color-border);
//                border-bottom: none;
//                border-right: none;
//                top: -6px;
//                left: -6px;
//                width: 12px;
//                height: 12px;
//            }
//        }
//    }
//
//
//    &__block {
//
//        &-header {
//            display: grid;
//            grid-template-columns: 32px auto;
//            gap: 4px;
//
//            img {
//                width: 32px;
//                height: 32px;
//            }
//
//            h4 {
//                font-weight: 500;
//            }
//        }
//
//        &-follow {
//            margin: unset;
//            text-align: unset;
//        }
//
//        p {
//            line-height: 1.5;
//            padding-bottom: 12px;
//        }
//    }
//}
//
//
//.popup-active > .tag__popup {
//    position: absolute;
//    transform: translateX(-50%);
//    width: 320px;
//    z-index: 99;
//    padding: 12px;
//    transition: all 0.2s ease;
//
//    h3 {
//        margin: 4px 0 8px;
//    }
//}
//
//.popup-active > .tooltip-balloon {
//    background-color: white;
//    border: 1px solid var(--color-border);
//    border-radius: 5px;
//    padding: 16px;
//    font-size: 13px;
//    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.06), 0 2px 6px rgba(0, 0, 0, 0.06), 0 3px 8px rgba(0, 0, 0, 0.09);
//    color: var(--text-black-secondary);
//    position: absolute;
//    min-width: 50px;
//    top: 25px;
//    max-width: 320px;
//
//    .-arrow {
//        padding: 0;
//        border: 0;
//        font: inherit;
//        font-size: 100%;
//        vertical-align: baseline;
//        box-sizing: inherit;
//        position: absolute;
//        left: 52%;
//        display: block;
//        transform: rotate(45deg);
//        bottom: -10px;
//        margin: 0 0 0 0;
//
//        &:after {
//            position: absolute;
//            content: '';
//            background: var(--background-tertiary);
//            border: 1px solid var(--color-border);
//            border-bottom: none;
//            border-right: none;
//            top: -6px;
//            left: -6px;
//            width: 12px;
//            height: 12px;
//        }
//    }
//}
</style>
