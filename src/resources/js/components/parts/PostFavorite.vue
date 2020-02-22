<template>
    <span class="footer_item">
        <span class="star tooltip footer_item" @click="favorite(post.id)"
              v-if="!post.favorite" aria-label="Seçilmişlərə əlavə et"
              data-balloon-pos="down">
            <span v-if="!post.favorite" class="mdi mdi-bookmark-plus"/>
            {{ post.favorites }} Seçilmiş
        </span>
        <span class="star tooltip footer_item" @click="favorite(post.id)"
              v-if="post.favorite" aria-label="Seçilmişlərdən cixartmag"
              data-balloon-pos="down">
            <span v-if="post.favorite" class="mdi mdi-bookmark-check saved"/>
            {{ post.favorites }} Seçilmiş
        </span>
    </span>
</template>

<script>
    export default {
        name: "favorite",
        props: ['post', 'auth_check'],
        methods: {
            favorite: function (id) {
                if (this.auth_check)
                    axios.post('/post/favorite/' + id, {
                        id: id,
                    })
                        .then(response => {
                            if (response.data.success) {
                                this.post.favorites++;
                                this.post.favorite = true;
                                new Noty({
                                    type: 'success',
                                    text: '<div class="notification-image"><i class="mdi mdi-bookmark-plus"></i></div> Paylaşma seçilmişlərə əlave olundu',
                                }).show();
                            } else if (response.data.delete) {
                                this.post.favorites--;
                                this.post.favorite = false;
                                new Noty({
                                    type: 'error',
                                    text: '<div class="notification-image"><i class="mdi mdi-bookmark-remove"></i></div> Paylaşma seçilmişlərdən silindi',
                                }).show();
                            }
                        })
                        .catch(error => {
                            if (error.response.status === 401)
                                new Noty({
                                    type: 'success',
                                    text: '<div class="notification-image"><i class="mdi mdi-account-box"></i></div> <div class="text">Bu funksiyanı istifadə etmək üçün <a href="/register" class="notification-link">qeydiyyatdan keçin</a></div>',
                                }).show();
                            else
                                new Noty({
                                    type: 'error',
                                    text: '<div class="notification-image"><i class="mdi mdi-minus-box-outline"/></div> Qanunsuz əməliyyat',
                                }).show();

                        });
                else
                    new Noty({
                        type: 'success',
                        text: '<div class="notification-image"><i class="mdi mdi-account-box"></i></div> <div class="text">Bu funksiyanı istifadə etmək üçün <a href="/register" class="notification-link">qeydiyyatdan keçin</a></div>',
                    }).show();
            },
        }
    }
</script>

<style scoped lang="scss">
    .saved {
        color: var(--color-primary-main);
    }
</style>
