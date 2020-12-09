<template>
	<div class="ui category search">
		<div class="ui icon input">
            <label>
                <input class="prompt" type="text" placeholder="Search animals...">
            </label>
            <i class="search icon"></i>
		</div>
		<div class="results"></div>
	</div>
</template>

<script>
	export default {
	 	data() {
	    	return {
	         	content: [],
	    	}
	  	},
        mounted: function() {
        	let semantic = document.createElement('script');
        	semantic.setAttribute('src',"https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js");
        	document.head.appendChild(semantic);
            this.getPosts();
            $('.ui.search').search();
        },
        methods: {
            getPosts: function(){
            	axios.get('/api/hubs/all').then(response => {
            		this.content = response.data;
            		// console.log(response.data);
            	})
            	.catch(error => {
            	});
            },
        }
	};
	// $('.ui.search').search({
	// 	source: this.content
	// });
</script>
