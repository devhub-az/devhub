<template>
<dir>
    Hello world!

</dir>

</template>

<script>
    export default {
        data: function () {
            return{
                users: [],
                loading: false,
                pagination: {
                    'current_page': 1
                }
            }
        },
        mounted: function() {
            this.getUserList();
        },
        methods:{
            getUserList(){
                axios.get('/api/users/all').then(response => {
                    this.users = response.data.data;
                    console.log(this.users[0].sex);
                })
            }
        }

    }
</script>

<style scoped>

</style>

