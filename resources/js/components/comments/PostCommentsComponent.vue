<template>
    <div>
        <div id="comments"
             class="flex mb-2 items-center space-x-1 font-medium text-gray-700 dark:text-gray-400 xs:pr-2">
            <span class="iconify" data-icon="bx:bx-comment-detail" data-inline="false"></span>
            <p class="transition-none xs:text-base">Şərhlər</p>
        </div>
        <div class="space-y-4 w-full py-2 rounded border bg-white dark:bg-dpaper dark:border-gray-700">
            <div class="px-3.5" v-for="comment in comments" v-if="comments">
                <div class="flex space-x-2 items-center">
                    <img :src="comment.relationships.author.attributes.avatar" alt="User image" class="w-4 h-4 rounded">
                    <span class="inline-block align-text-top dark:text-gray-300">
                        {{ comment.relationships.author.attributes.name }}
                    </span>
                    <p class="text-xs opacity-75 font-light dark:text-gray-300">
                        {{ comment.attributes.created | moment('DD MMMM, H:mm') }}
                    </p>
                </div>
                <div class="dark:text-gray-400 font-light break-words">{{ comment.attributes.body }}</div>
            </div>
        </div>
        <div class="w-full mt-4" v-if="auth_check">
            <textarea
                class="border rounded w-full py-2 px-3.5 dark:text-gray-400 hover:border-cerulean-500
                        dark:hover:border-cerulean-700 dark:bg-gray-700 dark:border-gray-700"></textarea>
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-1">
                    <span class="iconify dark:text-gray-400" data-icon="carbon:warning" data-inline="false"></span>
                    <p class="dark:text-gray-400 text-sm font-light">Şərh, müəllifə minnətdarlıq ve ya konstruktiv tənqid mesajı yaz</p>
                </div>
                <button class="btn block ml-auto my-1 h-7">Yazmaq</button>
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
    </div>
</template>

<script>
import axios from 'axios'

export default {
    props: ['slug', 'auth_check', 'user'],
    data: function () {
        return {
            comments: [],
        }
    },
    async created() {
        await this.getComments();
    },
    methods: {
        async getComments() {
            await axios.get('/api/articles/' + this.slug + '/relationships/comments').then(response => {
                if (response.data.data.length !== 0) {
                    this.comments = response.data.data;
                    this.commentsNotEmpty = true;
                }
            })
                .catch(error => {
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
