<template>
	<div class="hub_follow">
		<span @click="follow(hub.id)" v-if="!hubs.follower_check && !loading" class="btn btn-success btn-sm"><i class="icon feather icon-plus"></i> İzləmək</span>
		<span @click="follow(hub.id)" v-if="hubs.follower_check && !loading" class="btn btn-success-outline btn-sm"><i class="icon feather icon-check"></i> İzləyirsiniz</span>
		<span v-if="loading" class="btn btn-success-outline btn-sm"><i class="icon iconmoon icon-spinner"></i> Gözləyin</span>
	</div>
</template>

<script>
	export default {
		props: ['hub'],
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
				this.loading = true;
			    axios.post('/hubs/follow/' + id, {
			        id:id,
			    })
			    .then(response => {
			        if (response.data.success) {
			            this.hubs.hub_followers_count++;
			            this.hubs.follower_check = true;
			        } else if(response.data.delete){
			            this.hubs.hub_followers_count--;
			            this.hubs.follower_check = false;
			        }
			        this.loading = false;
			    })
			    .catch(error => {
			    	console.log(error);
			        iziToast.error({
			            title: 'Xəta',
			            message: 'Qanunsuz əməliyyat',
			        })
			    });
			}
		}
	}
</script>
