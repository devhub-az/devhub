<template>
    <div class="post-votes">
        <i class="icon feather icon-thumbs-up" :class="{upvoted: posts.data.upvoted}"
           @click="upvote(posts.data.id)"/>
        <span id="raiting" :style="{color: colorStatus}" style="font-family: 'Roboto',Tahoma; cursor: default;">{{ posts.data.votes }}</span>
        <i class="icon feather icon-thumbs-down" :class="{downvoted: posts.data.downvoted}"
           @click="downvote(posts.data.id)"/>
    </div>
</template>

<script>
    export default {
        props: ['posts', 'auth_check'],
        data: function () {
            return {
                post: '',
                colorStatus: 'inherit',
                upvoted: false,
                downvoted: false,
                vote_status: true,
            }
        },
        created: function () {
            this.post = this.posts;
            if (this.post.data.votes > 0) {
                this.colorStatus = 'var(--color-green)';
            } else if (this.post.data.votes == 0) {
                this.colorStatus = 'inherit';
            } else if (this.post.data.votes < 0) {
                this.colorStatus = 'var(--color-red)';
            }
            if (this.auth_check == 1) {
                this.vote_status = false;
            }
        },
        methods: {
            upvote: function (id) {
                if (this.auth_check) {
                    let vote = this.post.data.votes;
                    if (this.post.data.upvoted == false && this.post.data.downvoted == false) {
                        this.post.data.upvoted = true;
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
                            text: '<div class="notification-image"><i class="icon feather icon-thumbs-up"></i></div> Səs verildi',
                        }).show();
                    } else if (this.post.data.upvoted == true && this.post.data.downvoted == false) {
                        this.post.data.upvoted = false;
                        vote--;
                        axios.post('/upvote', {
                            id: id,
                            vote: vote,
                            change_rating: '-1',
                            status
                        })
                            .catch(error => {
                                console.log(error);
                            });
                        new Noty({
                            type: 'error',
                            text: '<div class="notification-image" style="color: #ea5f6d"><i class="icon feather icon-minus-circle"></i></div> Səs ləğv olundu',
                        }).show();
                    } else if (this.post.data.upvoted == false && this.post.data.downvoted == true) {
                        this.post.data.upvoted = true;
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
                            text: '<div class="notification-image"><i class="icon feather icon-thumbs-up"></i></div> Səs verildi',
                        }).show();
                    }

                    if (vote > 0) {
                        this.colorStatus = 'var(--color-green)';
                    } else if (vote == 0) {
                        this.colorStatus = 'inherit';
                    } else if (vote < 0) {
                        this.colorStatus = 'var(--color-red)';
                    }
                    this.post.data.downvoted = false;
                    this.post.data.votes = vote;
                }
            },
            downvote: function (id) {
                if (this.auth_check) {
                    let vote = this.post.data.votes;
                    if (this.post.data.downvoted == false && this.post.data.upvoted == false) {
                        this.post.data.downvoted = true;
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
                            text: '<div class="notification-image"><i class="icon feather icon-thumbs-down"></i></div> Səs verildi',
                        }).show();
                    } else if (this.post.data.downvoted == true && this.post.data.upvoted == false) {
                        this.post.data.downvoted = false;
                        vote++;
                        axios.post('/upvote', {
                            id: id,
                            vote: vote,
                            change_rating: '1',
                            status
                        })
                            .catch(error => {
                                console.log(error);
                            });
                        new Noty({
                            type: 'error',
                            text: '<div class="notification-image" style="color: #ea5f6d"><i class="icon feather icon-minus-circle"></i></div> Səs ləğv olundu',
                        }).show();
                    } else if (this.post.data.downvoted == false && this.post.data.upvoted == true) {
                        this.post.data.downvoted = true;
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
                            text: '<div class="notification-image"><i class="icon feather icon-thumbs-down"></i></div> Səs verildi',
                        }).show();
                    }
                    if (vote > 0) {
                        this.colorStatus = 'var(--color-green)';
                    } else if (vote === 0) {
                        this.colorStatus = 'inherit';
                    } else if (vote < 0) {
                        this.colorStatus = 'var(--color-red)';
                    }
                    this.post.data.upvoted = false;
                    this.post.data.votes = vote;
                }
            },
        }
    }
</script>
