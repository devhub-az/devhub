<template>
    <ul class="content-list">
        <li style="list-style-type: none;">
            <div class="list-hubs__hub" :class="{'hub-loading': loading}" style="border-left: 3px solid rgb(226, 226, 226)">
                <div class="list-hubs__hub-image MuiSkeleton-root MuiSkeleton-rect MuiSkeleton-pulse"></div>
                <div class="list-hubs__obj-body">
                    <div class="list-hubs__title-link MuiSkeleton-root MuiSkeleton-text MuiSkeleton-pulse"
                         style="width: 20%; height: 1.2rem;"></div>
                    <div class="list-hubs__desc MuiSkeleton-root MuiSkeleton-text MuiSkeleton-pulse"
                         style="width: 90%;  height: 1.2rem;">
                    </div>
                </div>
                <div class="list-hubs__stats">
                    <div class="list-hubs__stats-value"><i class="mdi mdi-spin mdi-loading"/></div>
                    <small>Paylaşım</small>
                </div>
                <div class="list-hubs__stats">
                    <div class="list-hubs__stats-value"><i class="mdi mdi-spin mdi-loading"/></div>
                    <small>
                        REYTINQ
                    </small>
                </div>
                <div class="hub_follow">
                    <div class="btn btn-outline MuiSkeleton-root MuiSkeleton-pulse"
                         style="width: 50%; margin: 0 auto"/>
                </div>
            </div>
        </li>
    </ul>
</template>

<script>
    export default {
        props:['loading']
    }
</script>

<style scoped lang="scss">
    .hub-loading {

        .list-hubs__hub-image{
            background: #0000002e !important;
        }
    }
</style>
