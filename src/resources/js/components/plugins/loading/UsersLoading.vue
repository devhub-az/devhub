<template>
    <div>
        <div class="list-hubs__hub">
            <figure class="user-preview-cover liquid MuiSkeleton-root MuiSkeleton-rect MuiSkeleton-pulse">
            </figure>
            <div class="list-hubs__hub-image MuiSkeleton-root MuiSkeleton-rect"></div>
            <div class="list-hubs__obj-body">
                <div class="list-users__title-link MuiSkeleton-root MuiSkeleton-text MuiSkeleton-pulse"
                     style="width: 20%;  height: 1.2rem;"></div>
                <div class="list-hubs__desc MuiSkeleton-root MuiSkeleton-text MuiSkeleton-pulse"
                     style="width: 35%;  height: 1.2rem;"></div>
                <div class="list-hubs__posts MuiSkeleton-root MuiSkeleton-text MuiSkeleton-pulse"
                     style="width: 15%;  height: 1.2rem;"></div>
            </div>
            <div class="list-hubs__stats">
                <div class="list-hubs__stats-value"><i class="mdi mdi-spin mdi-loading"/></div>
                <small>
                    KARMA
                </small>
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
    </div>
</template>
