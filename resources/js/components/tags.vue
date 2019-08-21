<!-- <template>
	<div>
		<label for="text">Tegler:</label>
		<tags-input element-id="tags" 
		    v-model="selectedTags"
		    :existing-tags="tags"
		    :typeahead="true"
		    :only-existing-tags="true"
		    :typeahead-max-results="5"
		    :limit="5"
		    ></tags-input>
	</div>
</template>

<script>
	import VoerroTagsInput from '@voerro/vue-tagsinput';
	export default{
		components: { VoerroTagsInput },
		data() {
			return{
				selectedTags: [],
				tags: [],
			};
		},
		mounted: function() {
            this.getHubs();
        },
        methods: {
        	getHubs: function(){
        		axios.get("/api/hubs/all").then(response => {
        			this.tags = response.data;
        		});
        	},
        },
        computed: {
            taglistItems: function () {
					return this.tags.filter(i => {
						console.log("1");
				});
			}
        }
	};
</script> -->

<template>
	<div id="app">
		
	</div>
	
</template>

<script>
</script>