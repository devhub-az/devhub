<template>
    <div class="post-content__item">
        <div style="height: 90px">
            <h1 class="page-header__title">Profil parametrləri</h1>
        </div>
        <form @submit.prevent="submit">
            <div class="form-group">
                <label for="name">Real ad</label>
                <span style="float:right">{{ count }}/40</span>
                <input type="text" class="input_settings" name="name" id="name" v-model="fields.name"
                       @keyup='remaincharCount()' :maxlength="namemaxcharacter"/>
                <div v-if="errors && errors.name" class="text-danger">{{ errors.name[0] }}</div>
            </div>

            <div class="form-group">
                <label for="specialty">İxtisas</label>
                <input type="text" class="input_settings" name="specialty" id="specialty" v-model="fields.specialty"
                />
                <div v-if="errors && errors.specialty" class="text-danger">{{ errors.specialty[0] }}</div>
            </div>

            <div class="form-group">
                <label for="body">Cins</label>
                <textarea class="form-control" id="body" name="body" rows="5" v-model="fields.body"></textarea>
                <div v-if="errors && errors.body" class="text-danger">{{ errors.body[0] }}</div>
            </div>

            <button type="submit" class="btn btn-primary">Send message</button>
        </form>
    </div>
</template>

<script>
    import { Notyf } from 'notyf';

    export default {
        mixin: ['Notyf'],
        props: ['auth'],
        data() {
            return {
                fields: {},
                errors: {},
                success: false,
                loaded: true,
                action: this.auth.username,
                namemaxcharacter: 40,
                count: 0
            }
        },
        methods: {
            submit() {
                if (this.loaded) {
                    const notyf = new Notyf();
                    this.loaded = false;
                    this.success = false;
                    this.errors = {};
                    axios.post('/@' + this.action + '/settings', this.fields).then(response => {
                        this.fields = {}; //Clear input fields.
                        this.loaded = true;
                        this.success = true;
                        notyf.success('Profil yenilənib');
                    }).catch(error => {
                        this.loaded = true;
                        notyf.error('Profilde səhv');
                        if (error.response.status === 422) {
                            this.errors = error.response.data.errors || {};
                        }
                    });
                }
            },
            remaincharCount: function () {
                if (this.fields.name.length > this.namemaxcharacter) {
                    this.count = this.namemaxcharacter;
                } else {
                    const remainCharacters = this.fields.name.length;
                    this.count = remainCharacters;
                }
            },
        },
    }
</script>

<style scoped>

</style>
