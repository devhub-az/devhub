<template>
	<div>
		<vue-taggable-select
		    :taggable="true"
			v-model="values" 
			:options="tags"
			the-post-has-a-title="make sure to show these"
			option-label="name"
			option-key="id"></vue-taggable-select>
	</div>
</template>

<script>
	import VueTaggableSelect from "vue-taggable-select";

	export default{
		components: {
			VueTaggableSelect,
		},
		data() {
			return{
				values: null,
				tags: [],
			};
		},
		mounted: function() {
            this.getHubs();
        },
        methods: {
        	getHubs: function(){
        		axios.get("/api/hubs/all").then(response => {
        			this.tags = response.data.data;
        		});
        	},
        },
	};
</script>