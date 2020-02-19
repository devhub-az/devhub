<template>
    <span class="comment-favorite">
        <div class="tooltip">
            <i class="mdi mdi-bookmark-plus" v-if="!comment.favorite" @click="favorite(comment.id)"/> {{ comment.favorites }}
        </div>
        <div class="tooltip">
            <i class="mdi mdi-bookmark-check saved" v-if="comment.favorite" @click="favorite(comment.id)"/> {{ comment.favorites }}
        </div>
    </span>
</template>

<script>
    export default {
        props: ['comment'],
        name: "CommentFavorite",
        methods: {
            favorite: function (id) {
                axios.post('/comment/favorite/' + id, {
                    id: id,
                })
                    .then(response => {
                        if (response.data.success) {
                            this.comment.favorites++;
                            this.comment.favorite = true;
                            new Noty({
                                type: 'success',
                                text: '<div class="notification-image"><i class="mdi mdi-bookmark-plus"></i></div> Paylaşma seçilmişlərə əlave olundu',
                            }).show();
                        } else if (response.data.delete) {
                            this.comment.favorites--;
                            this.comment.favorite = false;
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
            },
        }
    }
</script>

<style scoped lang="scss">
    .tooltip{
        cursor: pointer;
    }
    .saved{
        color: var(--color-primary-main);
    }
</style>
