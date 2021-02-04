<template>
    <div>
        <div id="comments"
             class="flex mb-2 items-center space-x-1 font-medium text-gray-700 dark:text-gray-400 xs:pr-2">
            <span class="iconify" data-icon="bx:bx-comment-detail" data-inline="false"></span>
            <p class="transition-none xs:text-base">Şərhlər</p>
        </div>
        <div class="space-y-4 w-full py-2 rounded border bg-white dark:bg-dpaper dark:border-gray-700" v-if="comments.length > 0">
            <div class="px-3.5" v-for="comment in comments">
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
        <div class="w-full mt-4 border bg-white w-full rounded
                       dark:bg-gray-700 dark:border-gray-700 py-2 px-3.5" v-if="auth_check">
            <p id="text" @input="contentEditableChange()" placeholder="Şərh, müəllifə minnətdarlıq ve ya konstruktiv tənqid mesajı yaz"
               class="relative w-full block pb-12 dark:text-gray-400 focus:outline-none focus:border-cerulean-500 "
               contenteditable>
            </p>
            <button class="btn block ml-auto my-1 h-7 xs:mt-4">Yazmaq</button>
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
            message: '',
        }
    },
    async created() {
        await this.getComments();
    },
    methods: {
        contentEditableChange() {
            this.message = document.getElementById("text").innerHTML;
        },
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
