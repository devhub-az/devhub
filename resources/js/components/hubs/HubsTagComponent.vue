<template>
    <div class="post__hubs">
        <div v-for="hub, index in data">
            <div class="hub popup-hub" :class="{'active_hub': hub.follower_check}">
                <i :class="hub.name.toLowerCase() + ' icon'"></i> {{ hub.name }}
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['data'],
        data: function() {
            return {
                loading: false,
            }
        }
    }
</script>
