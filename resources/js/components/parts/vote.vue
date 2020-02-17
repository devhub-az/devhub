<template>
    <div class="post-votes" :aria-label="posts.votes + ':  ↑ ' + [posts.upvotes === 0 ? '0' : posts.upvotes ] + ' ↓ ' + [posts.downvotes === 0 ? '0' :posts.downvotes]" data-balloon-pos="left">
        <span class="mdi mdi-thumb-up-outline" :class="{upvoted: posts.upvoted}"
              @click="upvote(posts.id)"/>
        <span id="rating" :style="{color: colorStatus}" class="rating">
            {{ posts.votes }}
        </span>
        <span class="mdi mdi-thumb-down-outline" :class="{downvoted: posts.downvoted}"
              @click="downvote(posts.id)"/>
    </div>
</template>

<script>
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
        async created () {
            if (this.posts.votes > 0) {
                this.colorStatus = 'var(--color-primary-main)';
            } else if (this.posts.votes === 0) {
                this.colorStatus = 'inherit';
            } else if (this.posts.votes < 0) {
                this.colorStatus = 'var(--color-error-main)';
            }
            if (this.auth_check === 1) {
                this.vote_status = false;
            }
        },
        methods: {
            upvote: function (id) {
                if (this.auth_check) {
                    let vote = this.posts.votes;
                    let upvotes = this.posts.upvotes;
                    let downvotes = this.posts.downvotes;
                    if (this.posts.upvoted == false && this.posts.downvoted == false) {
                        this.posts.upvoted = true;
                        upvotes++;
                        vote++;
                        axios.post('/upvote', {
                            id: id,
                            vote: vote,
                            change_rating: '1',
                            status: 'upvote',
                        })
                            .catch(error => {
                                console.log(error);
                            });
                        new Noty({
                            type: 'success',
                            text: '<div class="notification-image"><i class="mdi mdi-thumb-up-outline"></i></div> Səs verildi',
                        }).show();
                    } else if (this.posts.upvoted == true && this.posts.downvoted == false) {
                        this.posts.upvoted = false;
                        upvotes--;
                        vote--;
                        axios.post('/upvote', {
                            id: id,
                            vote: vote,
                            change_rating: '-1',
                            status: null
                        })
                            .catch(error => {
                                console.log(error);
                            });
                        new Noty({
                            type: 'error',
                            text: '<div class="notification-image" style="color: #ea5f6d"><i class="mdi mdi-minus-box-outline"></i></div> Səs ləğv olundu',
                        }).show();
                    } else if (this.posts.upvoted == false && this.posts.downvoted == true) {
                        this.posts.upvoted = true;
                        upvotes = upvotes + 1;
                        downvotes = downvotes - 1;
                        vote = vote + 2;
                        axios.post('/upvote', {
                            id: id,
                            vote: vote,
                            change_rating: '+2',
                            status: 'upvote',
                        })
                            .catch(error => {
                                console.log(error);
                            });
                        new Noty({
                            type: 'success',
                            text: '<div class="notification-image"><i class="mdi mdi-thumb-up-outline"></i></div> Səs verildi',
                        }).show();
                    }

                    if (vote > 0) {
                        this.colorStatus = 'var(--color-primary-main)';
                    } else if (vote == 0) {
                        this.colorStatus = 'inherit';
                    } else if (vote < 0) {
                        this.colorStatus = 'var(--color-error-main)';
                    }
                    this.posts.downvoted = false;
                    this.posts.upvotes = upvotes;
                    this.posts.downvotes = downvotes;
                    this.posts.votes = vote;
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
                    let vote = this.posts.votes;
                    let upvotes = this.posts.upvotes;
                    let downvotes = this.posts.downvotes;
                    if (this.posts.downvoted == false && this.posts.upvoted == false) {
                        this.posts.downvoted = true;
                        downvotes++;
                        vote--;
                        axios.post('/upvote', {
                            id: id,
                            vote: vote,
                            change_rating: '-1',
                            status: 'downvote'
                        })
                            .catch(error => {
                                console.log(error);
                            });
                        new Noty({
                            type: 'success',
                            text: '<div class="notification-image"><i class="mdi mdi-thumb-down-outline"></i></div> Səs verildi',
                        }).show();
                    } else if (this.posts.downvoted == true && this.posts.upvoted == false) {
                        this.posts.downvoted = false;
                        downvotes--;
                        vote++;
                        axios.post('/upvote', {
                            id: id,
                            vote: vote,
                            change_rating: '1',
                            status: null
                        })
                            .catch(error => {
                                console.log(error);
                            });
                        new Noty({
                            type: 'error',
                            text: '<div class="notification-image" style="color: #ea5f6d"><i class="mdi mdi-minus-box-outline"></i></div> Səs ləğv olundu',
                        }).show();
                    } else if (this.posts.downvoted == false && this.posts.upvoted == true) {
                        this.posts.downvoted = true;
                        upvotes = upvotes - 1;
                        downvotes = downvotes + 1;
                        vote = vote - 2;
                        axios.post('/upvote', {
                            id: id,
                            vote: vote,
                            change_rating: '-2',
                            status: 'downvote'
                        })
                            .catch(error => {
                                console.log(error);
                            });
                        new Noty({
                            type: 'success',
                            text: '<div class="notification-image"><i class="mdi mdi-thumb-down-outline"></i></div> Səs verildi',
                        }).show();
                    }
                    if (vote > 0) {
                        this.colorStatus = 'var(--color-primary-main)';
                    } else if (vote === 0) {
                        this.colorStatus = 'inherit';
                    } else if (vote < 0) {
                        this.colorStatus = 'var(--color-error-main)';
                    }
                    this.posts.upvoted = false;
                    this.posts.upvotes = upvotes;
                    this.posts.downvotes = downvotes;
                    this.posts.votes = vote;
                } else
                    new Noty({
                        type: 'success',
                        text: '<div class="notification-image"><i class="mdi mdi-account-box"></i></div> ' +
                            '<div class="text">Bu funksiyanı istifadə etmək üçün ' +
                            '<a href="/register" class="notification-link">qeydiyyatdan keçin</a></div>',
                    }).show();
            },
        }
    }
</script>
