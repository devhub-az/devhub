<template>
    <div class="comment-favorite">
        <div class="tooltip" v-if="!comment.favorite">
            <i class="mdi mdi-bookmark-plus" @click="favorite(comment.id)"/> {{ comment.favorites === 0 ? '' : comment.favorites }}
        </div>
        <div class="tooltip" v-else-if="comment.favorite">
            <i class="mdi mdi-bookmark-check saved" @click="favorite(comment.id)"/> {{ comment.favorites }}
        </div>
    </div>
</template>

<script>
    export default {
        props: ['comment', 'auth_check'],
        name: "CommentFavorite",
        methods: {
            favorite: function (id) {
                if (this.auth_check)
                    axios.post('/comment/favorite/' + id, {
                        id: id,
                    })
                        .then(response => {
                            if (response.data.success) {
                                this.comment.favorites++;
                                this.comment.favorite = true;
                                new Noty({
                                    type: 'success',
                                    text: '<div class="notification-image"><i class="mdi mdi-bookmark-plus"></i></div> Şerh seçilmişlərə əlave olundu',
                                }).show();
                            } else if (response.data.delete) {
                                this.comment.favorites--;
                                this.comment.favorite = false;
                                new Noty({
                                    type: 'error',
                                    text: '<div class="notification-image"><i class="mdi mdi-bookmark-remove"></i></div> Şerh seçilmişlərdən silindi',
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
                                    text: '<div class="notification-image"><i class="mdi mdi-minus-box-outline"></i></div> Qanunsuz əməliyyat',
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
    .tooltip {
        cursor: pointer;
        font-size: 14px;
    }

    .saved {
        color: var(--color-primary-main);
    }

    .mdi-bookmark-plus, .tooltip {
        color: var(--text-black-secondary);
    }
</style>
