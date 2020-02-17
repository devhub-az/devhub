<template>
    <div class="comment-content">
<!--        <posts-loading v-if="loading"/>-->
        <div v-if="!loading">
            <div v-if="commentsNotEmpty">
                <div class="comment-content__item" v-for="comment in comments">

                </div>>
            </div>
            <div v-else-if="error" class="post-content__item"
                 style="text-align: center; display: grid; grid-gap: 12px;">
                <span style="font-size: 5rem; opacity: .7;">¯\_(ツ)_/¯</span>
                <h1 style="font-family: 'Nunito', sans-serif;"><span
                    style="border-right: 2px solid; padding: 0 15px 0 15px;">500</span> Server error</h1>
            </div>
        </div>
        <pagination v-if="pagination.last_page > 1" :pagination="pagination" :offset="5"
                    @paginate="getComments()"/>
    </div>
</template>

<script>
    export default {
        name: "CommentsComponent",
        props: ['url'],

        data: function () {
            return {
                comments: [],
                id: [],
                content: '',
                error: false,
                loading: false,
                commentsNotEmpty: false,
                pagination: {
                    'current_page': 1
                },
            }
        },
        async created() {
            this.getComments();
        },
        methods: {
            async getComments() {
                this.loading = true;
                await axios.get(this.url + '?page=' + this.pagination.current_page).then(response => {
                    this.loading = false;
                    if (response.data.data.length !== 0) {
                        this.comments = response.data.data;
                        this.pagination = response.data.meta;
                        if (this.pagination.last_page > 50) {
                            this.pagination.last_page = 50;
                        }
                        this.commentsNotEmpty = true;
                        for (let i = 0; i < this.comments.length; i++) {
                            this.id[i] = this.comments[i].id;
                        }
                    }
                })
                    .catch(error => {
                        this.loading = false
                        this.error = true
                        // DEVELOPING PART
                        if (error.response) {
                            console.log(error.response.data);
                            console.log(error.response.status);
                            console.log(error.response.headers);
                        } else if (error.request) {
                            console.log(error.request);
                        } else {
                            console.log('Error', error.message);
                        }
                    });
            }
        }
    }
</script>

<style scoped>

</style>
