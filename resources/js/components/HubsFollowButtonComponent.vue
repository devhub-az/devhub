<template>
	<div class="hub_follow">
		<span @click="follow(hub.id)" v-if="!hubs.follower_check" class="btn btn-success btn-sm">{{ hubs.hub_followers_count }} İzləmək</span>
		<span @click="follow(hub.id)" v-if="hubs.follower_check" class="btn btn-success-outline btn-sm">{{ hubs.hub_followers_count }} İzləyirsiniz</span>
	</div>
</template>

<script>
	export default {
		props: ['hub'],
		data: function() {
            return {
                hubs: '',
            }
        },
        mounted: function() {
            this.hubs = this.hub;
        },
		methods: {
			follow: function(id){
			    axios.post('/hubs/follow/' + id, {
			        id:id,
			    })
			    .then(response => {
			        if (response.data.success) {
			            this.hubs.followers++;
			            this.hubs.follower_check = true;
			        } else if(response.data.delete){
			            this.hubs.followers--;
			            this.hubs.follower_check = false;
			        }
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