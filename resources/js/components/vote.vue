<template>
    <div class="post-votes">
        <i class="icon feather icon-thumbs-up" :disabled="vote_status" :class="{upvoted: posts.data.upvoted}"
           @click="upvote(posts.data.id)"></i>
        <span id="raiting" :style="{color: colorStatus}" style="font-family: 'Roboto',Tahoma; cursor: default;">{{ posts.data.votes }}</span>
        <i class="icon feather icon-thumbs-down" :disabled="vote_status" :class="{downvoted: posts.data.downvoted}"
           @click="downvote(posts.data.id)"></i>
    </div>
</template>

<script>
    import {Notyf} from 'notyf';
    import 'notyf/notyf.min.css';

    const notyf = new Notyf({
        types: [
            {
                type: 'warning',
                backgroundColor: 'orange'
            }
        ]
    });

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
        mounted: function () {
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
                var vote = this.post.data.votes;
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
                    notyf.success('Səs verildi');
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
                    notyf.open({
                        type: 'warning',
                        message: '<i class="icon feather icon-info"></i> Səs ləğv edildi'
                    });
                } else if (this.post.data.upvoted == false && this.post.data.downvoted) {
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
                    notyf.success('Səs verildi');
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
            },
            downvote: function (id) {
                var vote = this.post.data.votes;
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
                    notyf.success('Səs verildi');
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
                    notyf.open({
                        type: 'warning',
                        message: '<i class="icon feather icon-info"></i> Səs ləğv edildi'
                    });
                } else if (this.post.data.downvoted == false && this.post.data.upvoted) {
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
                    notyf.success('Səs verildi');
                }
                if (vote > 0) {
                    this.colorStatus = 'var(--color-green)';
                } else if (vote == 0) {
                    this.colorStatus = 'inherit';
                } else if (vote < 0) {
                    this.colorStatus = 'var(--color-red)';
                }
                this.post.data.upvoted = false;
                this.post.data.votes = vote;
            },
        }
    }
</script>
