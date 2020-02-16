<template>
	<div class="hub_follow">
		<span @click="follow(hub.id)" v-if="!hubs.follower_check && !loading" class="btn btn-success btn-outline"><i class="mdi mdi-plus"></i> İzləmək</span>
		<span @click="follow(hub.id)" v-if="hubs.follower_check && !loading" class="btn btn-success-outline btn-outline"><i class="mdi mdi-check"></i> İzləyirsiniz</span>
		<span v-if="loading" class="btn btn-success-outline btn-outline"><i class="mdi mdi-loading mdi-spin"></i> Gözləyin</span>
	</div>
</template>

<script>
	export default {
		props: ['hub', 'auth_check'],
		data: function() {
            return {
                hubs: '',
                loading: false,
            }
        },
        mounted: function() {
            this.hubs = this.hub;
        },
		methods: {
			follow: function(id){
				if(this.auth_check) {
					this.loading = true;
					axios.post('/hubs/follow/' + id, {
						id: id,
					})
							.then(response => {
								if (response.data.success) {
									this.hubs.hub_followers_count++;
									this.hubs.follower_check = true;
								} else if (response.data.delete) {
									this.hubs.hub_followers_count--;
									this.hubs.follower_check = false;
								}
								this.loading = false;
							})
							.catch(error => {
								console.log(error);
								new Noty({
									type: 'error',
									text: '<div class="notification-image"><span class="mdi mdi-x"/></div> Xəta',
								}).show();
								this.loading = false;
							});
				} else
					new Noty({
						type: 'success',
						text: '<div class="notification-image"><i class="mdi mdi-account-box"></i></div> ' +
								'<div class="text">Bu funksiyanı istifadə etmək üçün ' +
								'<a href="/register" class="notification-link">qeydiyyatdan keçin</a></div>',
					}).show();
			}
		}
	}
</script>

<style>
	.mdi-check{
		color: var(--color-info-main);
	}
</style>
