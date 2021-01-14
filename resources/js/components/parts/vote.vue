<template>
    <div class="flex gap-1 ml-auto pl-2 text-2xl items-center xs:text-xl mb-auto"
         :aria-label="posts.attributes.votes_sum + ':  ↑ ' + [posts.attributes.upvotes === 0 ? '0' : posts.attributes.upvotes ] + ' ↓ ' + [posts.attributes.downvotes === 0 ? '0' :posts.downvotes]"
         data-balloon-pos="left">
        <span class="hover:text-green-600 iconify transition-none dark:text-gray-300" data-icon="mdi-thumb-up-outline" :class="{'text-green-600': posts.attributes.upvoted}"
              @click="upvote(posts.id)"/>
        <p class="dark:text-gray-300">
            {{ posts.attributes.votes }}
        </p>
        <span class="hover:text-red-600 iconify transition-none dark:text-gray-300" data-icon="mdi-thumb-down-outline" :class="{'text-red-600': posts.attributes.downvoted}"
              @click="downvote(posts.id)"/>
    </div>
</template>

<script>
import axios from "axios"
import Noty from 'noty'

Noty.overrideDefaults({
    layout: 'topLeft',
    dismissQueue: true,
    force: false,
    maxVisible: 5,


    timeout: 3000,
    progressBar: false,

    animation: {
        open: 'animated fadeInLeft',
        close: 'animated fadeOutLeft'
    },
    closeWith: ['click'],

    buttons: false
});

export default {
    props: ['posts', 'auth_check'],
    data: function () {
        return {
            post: [],
            colorStatus: 'inherit',
            upvoted: false,
            downvoted: false,
            vote_status: true,
        }
    },
    async created() {
        if (this.posts.attributes.votes > 0) {
            this.colorStatus = 'text-green-600';
        } else if (this.posts.attributes.votes === 0) {
            this.colorStatus = 'inherit';
        } else if (this.posts.attributes.votes < 0) {
            this.colorStatus = 'text-red-600';
        }
        if (this.auth_check === 1) {
            this.vote_status = false;
        }
    },
    methods: {
        upvote: function (id) {
            if (this.auth_check) {
                let vote = this.posts.attributes.votes;
                let votes_sum = this.posts.attributes.votes_sum;
                let upvotes = this.posts.attributes.upvotes;
                let downvotes = this.posts.attributes.downvotes;
                if (this.posts.attributes.upvoted === false && this.posts.attributes.downvoted === false) {
                    axios.post('/upvote', {
                        id: id,
                        vote: vote,
                        change_rating: '1',
                        status: 'upvote',
                    }).then(response => {
                        new Noty({
                            type: 'success',
                            text: '<div class="notification-image"><i class="mdi mdi-thumb-up-outline"></i></div> Səs verildi',
                        }).show();
                        this.posts.attributes.upvoted = true;
                        upvotes++;
                        votes_sum++;
                        vote++;
                    })
                        .catch(error => {
                            new Noty({
                                type: 'error',
                                text: '<div class="notification-image" style="color: #ea5f6d"><i class="mdi mdi-minus-box-outline"></i></div> Server xətası',
                            }).show();
                            throw new Error("end of pagination")
                        });
                } else if (this.posts.attributes.upvoted === true && this.posts.attributes.downvoted === false) {
                    axios.post('/upvote', {
                        id: id,
                        vote: vote,
                        change_rating: '-1',
                        status: 'delete'
                    }).then(response => {
                        this.posts.attributes.upvoted = false;
                        upvotes--;
                        votes_sum--;
                        vote--;
                        new Noty({
                            type: 'error',
                            text: '<div class="notification-image" style="color: #ea5f6d"><i class="mdi mdi-minus-box-outline"></i></div> Səs ləğv olundu',
                        }).show();
                    })
                        .catch(error => {
                            new Noty({
                                type: 'error',
                                text: '<div class="notification-image" style="color: #ea5f6d"><i class="mdi mdi-minus-box-outline"></i></div> Server xətası',
                            }).show();
                        });
                } else if (this.posts.attributes.upvoted === false && this.posts.attributes.downvoted === true) {
                    axios.post('/upvote', {
                        id: id,
                        vote: vote,
                        change_rating: '+2',
                        status: 'upvote',
                    }).then(response => {
                        this.posts.attributes.upvoted = true;
                        upvotes = upvotes + 1;
                        downvotes = downvotes - 1;
                        vote = vote + 2;
                        votes_sum = votes_sum + 2;
                        new Noty({
                            type: 'success',
                            text: '<div class="notification-image"><i class="mdi mdi-thumb-up-outline"></i></div> Səs verildi',
                        }).show();
                    })
                        .catch(error => {
                            new Noty({
                                type: 'error',
                                text: '<div class="notification-image" style="color: #ea5f6d"><i class="mdi mdi-minus-box-outline"></i></div> Server xətası',
                            }).show();
                        });
                }
                if (vote > 0) {
                    this.colorStatus = 'var(--color-primary-main)';
                } else if (vote === 0) {
                    this.colorStatus = 'inherit';
                } else if (vote < 0) {
                    this.colorStatus = 'var(--color-error-main)';
                }
                this.posts.attributes.downvoted = false;
                this.posts.attributes.upvotes = upvotes;
                this.posts.attributes.downvotes = downvotes;
                this.posts.attributes.votes = vote;
                this.posts.attributes.votes_sum = votes_sum;
            } else
                new Noty({
                    type: 'success',
                    text: '<div class="notification-image"><i class="mdi mdi-account-box"></i></div> ' +
                        '<div class="text">Bu funksiyanı istifadə etmək üçün ' +
                        '<a href="/register" class="notification-link">qeydiyyatdan keçin</a></div>',
                }).show();
        },
        downvote: function (id) {
            if (this.auth_check) {
                let vote = this.posts.attributes.votes;
                let votes_sum = this.posts.attributes.votes_sum;
                let upvotes = this.posts.attributes.upvotes;
                let downvotes = this.posts.attributes.downvotes;
                if (this.posts.attributes.downvoted === false && this.posts.attributes.upvoted === false) {
                    axios.post('/upvote', {
                        id: id,
                        vote: vote,
                        change_rating: '-1',
                        status: 'downvote'
                    }).then(response => {
                        this.posts.attributes.downvoted = true;
                        downvotes++;
                        votes_sum--;
                        vote--;
                        new Noty({
                            type: 'success',
                            text: '<div class="notification-image"><i class="mdi mdi-thumb-down-outline"></i></div> Səs verildi',
                        }).show();
                    })
                        .catch(error => {
                            new Noty({
                                type: 'error',
                                text: '<div class="notification-image" style="color: #ea5f6d"><i class="mdi mdi-minus-box-outline"></i></div> Server xətası',
                            }).show();
                        });
                } else if (this.posts.attributes.downvoted === true && this.posts.attributes.upvoted === false) {
                    axios.post('/upvote', {
                        id: id,
                        vote: vote,
                        change_rating: '1',
                        status: 'delete'
                    }).then(response => {
                        this.posts.attributes.downvoted = false;
                        downvotes--;
                        votes_sum++;
                        vote++;
                        new Noty({
                            type: 'error',
                            text: '<div class="notification-image" style="color: #ea5f6d"><i class="mdi mdi-minus-box-outline"></i></div> Səs ləğv olundu',
                        }).show();
                    })
                        .catch(error => {
                            new Noty({
                                type: 'error',
                                text: '<div class="notification-image" style="color: #ea5f6d"><i class="mdi mdi-minus-box-outline"></i></div> Server xətası',
                            }).show();
                        });
                } else if (this.posts.attributes.downvoted === false && this.posts.attributes.upvoted === true) {
                    axios.post('/upvote', {
                        id: id,
                        vote: vote,
                        change_rating: '-2',
                        status: 'downvote'
                    }).then(response => {
                        this.posts.attributes.downvoted = true;
                        upvotes = upvotes - 1;
                        downvotes = downvotes + 1;
                        vote = vote - 2;
                        votes_sum = votes_sum - 2;
                        new Noty({
                            type: 'success',
                            text: '<div class="notification-image"><i class="mdi mdi-thumb-down-outline"></i></div> Səs verildi',
                        }).show();
                    })
                        .catch(error => {
                            new Noty({
                                type: 'error',
                                text: '<div class="notification-image" style="color: #ea5f6d"><i class="mdi mdi-minus-box-outline"></i></div> Server xətası',
                            }).show();
                        });
                }
                if (vote > 0) {
                    this.colorStatus = 'var(--color-primary-main)';
                } else if (vote === 0) {
                    this.colorStatus = 'inherit';
                } else if (vote < 0) {
                    this.colorStatus = 'var(--color-error-main)';
                }
                this.posts.attributes.upvoted = false;
                this.posts.attributes.upvotes = upvotes;
                this.posts.attributes.downvotes = downvotes;
                this.posts.attributes.votes = vote;
                this.posts.attributes.votes_sum = votes_sum;
            } else
                new Noty({
                    type: 'success',
                    text: '<div class="notification-image"><i class="mdi mdi-account-box"></i></div> ' +
                        '<div class="text">Bu funksiyanı istifadə etmək üçün ' +
                        '<a href="/register" class="notification-link"> hesaba girin</a></div>',
                }).show();
        },
    }
}
</script>

<style lang="scss">
@import "~noty/src/noty.scss";
</style>
