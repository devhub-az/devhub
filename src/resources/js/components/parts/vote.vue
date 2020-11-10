<template>
    <div class="post-votes" :aria-label="posts.attributes.votes_sum + ':  ↑ ' + [posts.attributes.upvotes === 0 ? '0' : posts.attributes.upvotes ] + ' ↓ ' + [posts.attributes.downvotes === 0 ? '0' :posts.downvotes]" data-balloon-pos="left">
        <span class="mdi mdi-thumb-up-outline" :class="{upvoted: posts.attributes.upvoted}"
              @click="upvote(posts.id)"/>
        <span :style="{color: colorStatus}" class="rating">
            {{ posts.attributes.votes }}
        </span>
        <span class="mdi mdi-thumb-down-outline" :class="{downvoted: posts.attributes.downvoted}"
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
            if (this.posts.attributes.votes > 0) {
                this.colorStatus = 'var(--color-primary-main)';
            } else if (this.posts.attributes.votes === 0) {
                this.colorStatus = 'inherit';
            } else if (this.posts.attributes.votes < 0) {
                this.colorStatus = 'var(--color-error-main)';
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
                    if (this.posts.attributes.upvoted == false && this.posts.attributes.downvoted == false) {
                        this.posts.attributes.upvoted = true;
                        upvotes++;
                        votes_sum++;
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
                    } else if (this.posts.attributes.upvoted == true && this.posts.attributes.downvoted == false) {
                        this.posts.attributes.upvoted = false;
                        upvotes--;
                        votes_sum--;
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
                    } else if (this.posts.attributes.upvoted == false && this.posts.attributes.downvoted == true) {
                        this.posts.attributes.upvoted = true;
                        upvotes = upvotes + 1;
                        downvotes = downvotes - 1;
                        vote = vote + 2;
                        votes_sum = votes_sum + 2;
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
                    if (this.posts.attributes.downvoted == false && this.posts.attributes.upvoted == false) {
                        this.posts.attributes.downvoted = true;
                        downvotes++;
                        votes_sum--;
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
                    } else if (this.posts.attributes.downvoted == true && this.posts.attributes.upvoted == false) {
                        this.posts.attributes.downvoted = false;
                        downvotes--;
                        votes_sum++;
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
                    } else if (this.posts.attributes.downvoted == false && this.posts.attributes.upvoted == true) {
                        this.posts.attributes.downvoted = true;
                        upvotes = upvotes - 1;
                        downvotes = downvotes + 1;
                        vote = vote - 2;
                        votes_sum = votes_sum - 2;
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
                            '<a href="/register" class="notification-link">qeydiyyatdan keçin</a></div>',
                    }).show();
            },
        }
    }
</script>
