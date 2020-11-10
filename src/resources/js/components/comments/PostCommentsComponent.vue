<template>
    <div id="comments" class="post-comments">
        <div class="comment-header">
            <div class="head">Şerhlər</div>
            <div class="count">{{ comments.length }}</div>
        </div>
        <div class="posts">
            <div class="post-comment" v-if="comments" v-for="comment in comments">
                <img class="comment-avatar" :src="'/images/profile/' + comment.avatar" alt="">
                <div class="comment-body">
                    <div class="flex">
                        <a class="comment-author"
                           :href="'/users/@' + comment.author">
                            <span>{{ comment.author }}</span>
                        </a>
                        <comment-favorite :comment="comment" :auth_check="auth_check"></comment-favorite>
                        <div class="comment-date">
                            {{ comment.created_at | moment('DD MMMM, H:mm') }}
                        </div>
<!--                    <div class="comment-date">-->
<!--                        {{ Carbon\Carbon::parse($comment->created_at)->locale('az')->isoformat('d MMMM Y H:mm') }}-->
<!--                    </div>-->
                    </div>
                    <div class="comment-text" >{{ comment.body }}</div>
                </div>
            </div>
            <hr v-if="auth_check">
            <form method="post" action="" v-if="auth_check">
                <div class="post-comment">
                    <img class="comment-avatar" :src="'/images/profile/' + user.avatar" alt="">
                    <div class="comment-body">
                        <span class="comment-author">{{ user.username }}</span>
                        <textarea class="input comment-text" style="padding: 5px;" rows="4"
                                  cols="20000"
                                  name="body" id="editor"></textarea>
                        <vue3-markdown-it />
                        <button type="submit" class="btn btn-primary">Yazmag</button>
                    </div>
                    <input type="hidden" name="post_id" value="..."/>
                    <input type="hidden" name="parent_id" value="..."/>
                </div>
            </form>
        </div>
        <div class="info-block" v-if="!comments || !auth_check">
            <i class="mdi mdi-information-outline"></i>
            Yalnız <a href="/register">istifadəçilər</a> şərh yaza bilər. Xahiş edirik
            <a href="/login">daxil olun</a>.
        </div>
    </div>
</template>

<script>
import VueMarkdownIt from 'vue3-markdown-it';
    export default {
        components: {
            VueMarkdownIt
        },
        props: ['id', 'auth_check', 'user'],
        data: function () {
            return {
                comments: [],
                loading: false
            }
        },
        async created() {
            await this.getComments();
        },
        methods: {
            async getComments() {
                this.loading = true;
                await axios.get('/api/comment/' + this.id).then(response => {
                    this.loading = false;
                    if (response.data.data.length !== 0) {
                        this.comments = response.data.data;
                        this.commentsNotEmpty = true;
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
    hr {
        border-top: var(--color-border);
    }

    textarea {
        resize: vertical;
    }
</style>
