<template>
    <div>
        <div id="comments"
             class="flex mb-2 items-center space-x-1 font-medium text-gray-700 dark:text-gray-400 xs:pr-2">
            <span class="iconify" data-icon="bx:bx-comment-detail" data-inline="false"></span>
            <p class="transition-none xs:text-base">Şərhlər ({{ comments.length }})</p>
        </div>
        <div class="relative w-full rounded border bg-white dark:bg-dpaper dark:border-gray-700"
             v-if="comments.length > 0">
            <div class="divide-y dark:divide-gray-700">
                <div class="px-3.5 py-2" v-for="comment in comments">
                    <div class="flex space-x-2 items-center">
                        <img :src="comment.relationships.author.attributes.avatar" alt="User image" class="w-4 h-4 rounded">
                        <div class="flex space-x-2 items-baseline">
                            <a :href="'/@' + comment.relationships.author.attributes.username"
                               class="inline-block text-base align-text-top dark:text-gray-300">
                                {{
                                    comment.relationships.author.attributes.name ? comment.relationships.author.attributes.name : '@' + comment.relationships.author.attributes.username
                                }}
                            </a>
                            <p class="text-xs opacity-75 font-light dark:text-gray-300">
                                {{ comment.attributes.created | moment('DD MMMM, H:mm') }}
                            </p>
                        </div>
                    </div>
                    <div class="text-base dark:text-gray-400 font-light break-words">{{ comment.attributes.body }}</div>
                </div>
            </div>
            <div v-if="loading" class="absolute w-full top-0 bottom-0 left-0 z-10" style="backdrop-filter: blur(2px);"></div>
            <div v-if="loading" class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-20">
                <svg class="w-12 h-12">
                    <circle class="dot" cx="10" cy="20" r="3" />
                    <circle class="dot" cx="20" cy="20" r="3" />
                    <circle class="dot" cx="30" cy="20" r="3" />
                </svg>
            </div>
            <div
                class="absolute bg-white cursor-pointer -left-8 top-1/2 transform -translate-y-1/2 dark:bg-dpaper rounded border dark:border-gray-700"
                style="margin-top: 0 !important;" @click="getComments">
                <span id="spinner" class="iconify m-1 dark:text-gray-300" data-icon="mdi:reload" data-inline="false"></span>
            </div>
        </div>
        <div class="flex space-x-1 mt-2 bg-white dark:bg-dpaper dark:border-gray-700 rounded py-4 text-sm border"
             v-else>
            <div class="flex space-x-1 mx-auto">
                <p class="dark:text-gray-300">Şərh yazmaq üçün</p>
                <a href="/register"
                   class="text-cerulean-100">
                    qeydiyyatdan keçməlisiniz
                </a>
                <p class="dark:text-gray-300">və ya</p>
                <a href="/login" class="text-cerulean-100">daxil olmalısınız</a>
            </div>
        </div>
        <form class="w-full mt-4 border bg-white w-full rounded
                       dark:bg-gray-800 shadow-inner dark:border-gray-700 py-2 px-3.5"
              @submit.prevent="send" method="post" v-if="auth_check">
            <p id="text" @input="contentEditableChange()"
               placeholder="Şərh, müəllifə minnətdarlıq ve ya konstruktiv tənqid mesajı yaz"
               class="relative w-full block pb-12 dark:text-gray-400 focus:outline-none focus:border-cerulean-500 "
               contenteditable>
            </p>
            <button class="btn-outline block ml-auto my-1 h-7 xs:mt-4" type="submit">Şərh yazmaq</button>
        </form>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    props: ['slug', 'auth_check', 'user'],
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
        send() {
            this.loading = true
            axios.post('/api/articles/' + this.slug + '/comment', {
                comment: this.comment,
            }).then(() => {
                this.loading = false
                this.getComments()
                document.getElementById("text").innerHTML = ''
            }).catch(response => {
                this.loading = false
                this.error_text = response.data.error
                this.error = true
            })
        },
        contentEditableChange() {
            this.comment = document.getElementById("text").innerHTML;
        },
        async getComments() {
            this.loading = true
            await axios.get('/api/articles/' + this.slug + '/relationships/comments').then(response => {
                if (response.data.data.length !== 0) {
                    this.comments = response.data.data;
                    this.commentsNotEmpty = true;
                }
                this.loading = false
            })
                .catch(error => {
                    this.loading = false
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
