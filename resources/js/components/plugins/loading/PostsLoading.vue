<template>
    <div class="post-content__item">
        <header class="post__meta">
            <div style="background-color:#E2E2E2" alt="user avatar" class="user__avatar MuiSkeleton-root MuiSkeleton-rect MuiSkeleton-pulse"></div>
            <div class="user-info__nickname_small MuiSkeleton-root MuiSkeleton-text MuiSkeleton-pulse"
                 style="width: 20%; background: rgb(226, 226, 226); height: 1.2rem;"></div>
            <span class="post__read-time MuiSkeleton-root MuiSkeleton-text MuiSkeleton-pulse"
                  style="width: 10%; background: rgb(226, 226, 226); height: 1.2rem;"/>
        </header>
        <div class="post-content__header">
            <div class="post-title MuiSkeleton-root MuiSkeleton-text MuiSkeleton-pulse"
                 style="width: 40%; background: rgb(226, 226, 226); height: 1.5rem;"></div>
            <div class="post-votes">
                <i class="mdi mdi-thumb-up-outline"/>
                <span><i class="mdi mdi-spin mdi-loading"/></span>
                <i class="mdi mdi-thumb-down-outline"/>
            </div>
        </div>
        <div class="post__hubs">
            <div class="hub" v-for="tags in Math.ceil(Math.random()* (5 - 3)) + 3"
                 :style="{width: Math.ceil(Math.random()* (5 - 3)) + 3 + '%'}" style="height: 18px"></div>
        </div>
        <div class="post-content__body">
            <div v-for="text in Math.ceil(Math.random()* (6 - 3 +1)) + 3"
                 :style="{width: Math.floor(Math.random()* (100 - 50 +1)) + 50 +'%'}"
                 class="MuiSkeleton-root MuiSkeleton-text MuiSkeleton-pulse"></div>
        </div>
        <div class="post-content__footer">
            <div class="post-content__footer-stats">
                    <span class="footer_item">
                        <span class="mdi mdi-eye-outline"/> <i class="mdi mdi-spin mdi-loading"/> Baxışların sayı
                    </span>
                <span class="footer_item">
                        <span class="mdi mdi-comment-text-multiple-outline"/> <i class="mdi mdi-spin mdi-loading"/> Şerh
                    </span>
                <span class="footer_item">
                        <span class="mdi mdi-bookmark"/> <i class="mdi mdi-spin mdi-loading"/> Seçilmiş
                    </span>
            </div>
            <div class="btn btn-more MuiSkeleton-root MuiSkeleton-rect MuiSkeleton-pulse"
                 style="width: 60%; background: rgb(226, 226, 226);     padding: 0;"></div>
        </div>
    </div>
</template>
