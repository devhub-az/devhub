<template>
    <div class="post-content__item">
        <header class="post__meta">
            <div style="background-color:#E2E2E2" alt="user avatar" class="user__avatar loading"></div>
            <div class="user-info__nickname_small loading"
                 style="width: 20%; background: rgb(226, 226, 226); height: 1.2rem;"></div>
            <span class="post__read-time loading"
                  style="width: 10%; background: rgb(226, 226, 226); height: 1.2rem;"/>
        </header>
        <div class="post-content__header">
            <div class="post-title loading"
                 style="width: 40%; background: rgb(226, 226, 226); height: 1.5rem;"></div>
            <div class="post-votes">
                <i class="icon feather icon-thumbs-up"/>
                <span><i class="icon iconmoon icon-spinner"/></span>
                <i class="icon feather icon-thumbs-down"/>
            </div>
        </div>
        <div class="post__hubs">
            <div class="hub" v-for="tags in Math.ceil(Math.random()* (5 - 3)) + 3"
                 :style="{width: Math.ceil(Math.random()* (5 - 3)) + 3 + '%'}" style="height: 18px"></div>
        </div>
        <div class="post-content__body">
            <div v-for="text in Math.ceil(Math.random()* (6 - 3 +1)) + 3"
                 :style="{width: Math.floor(Math.random()* (100 - 50 +1)) + 50 +'%'}"
                 style="height: 18px; background: rgb(226, 226, 226); margin-bottom: 12px;" class="loading"></div>
        </div>
        <div class="post-content__footer">
            <div class="post-content__footer-stats">
                    <span class="footer_item">
                        <i class="eye icon"/> <i class="icon iconmoon icon-spinner"/> Baxışların sayı
                    </span>
                <span class="footer_item">
                        <i class="comments outline icon"/> <i class="icon iconmoon icon-spinner"/> Şerh
                    </span>
                <span class="footer_item">
                        <i class="bookmark outline icon"/> <i class="icon iconmoon icon-spinner"/> Seçilmiş
                    </span>
            </div>
            <div class="btn btn-primary btn-more loading"
                 style="width: 60%; background: rgb(226, 226, 226);     padding: 0;"></div>
        </div>
    </div>
</template>
