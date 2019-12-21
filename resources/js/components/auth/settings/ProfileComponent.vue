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
                <label for="surname">Real familia</label>

                <input type="text" class="input_settings" name="surname" id="surname" v-model="fields.surname"/>

                <div v-if="errors && errors.surname" class="text-danger">{{ errors.surname[0] }}</div>
            </div>


            <div class="form-group">
                <label for="email">Email</label>
                <p>Sizin emailiviz: {{email}}</p>
                <input type="text" class="input_settings" name="email" id="email"
                       placeholder="Əgər poçtu dəyişdirmək istəyirsinizsə.." v-model="fields.email">
                <div v-if="errors && errors.email" class="text-danger">{{ errors.email[0] }}</div>
            </div>

            <div class="form-group">
                <label for="about">Ozum haqqda</label>
                <textarea rows="10" cols="45" name="about" id="about" v-model="fields.about">
                </textarea>
                <div v-if="errors && errors.about" class="text-danger">{{ errors.about[0] }}</div>
            </div>

            <button type="submit" class="btn btn-primary">Profili yeniləmək</button>
        </form>
    </div>
</template>

<script>
    import {Notyf} from 'notyf';

    const notyf = new Notyf({
        duration: 1000,
        types: [
            {
                type: 'info',
                backgroundColor: 'blue',
                icon: false
            }
        ]
    });

    export default {
        mixin: ['Notyf'],
        props: ['auth'],
        data() {
            return {
                fields: {},
                errors: {},
                email: "",
                success: false,
                loaded: true,
                action: this.auth.username,
                namemaxcharacter: 40,
                count: 0,
                isChanged: false,
            }
        },
        created: function () {
            this.fields.name = this.auth.name
            this.fields.surname = this.auth.surname
            this.email = this.auth.email
            this.fields.about = this.auth.about
            this.count = this.auth.name.length
        },
        methods: {
            submit() {
                if (this.loaded) {
                    const notyf = new Notyf();
                    this.loaded = false;
                    this.success = false;
                    this.errors = {}
                    axios.post('/@' + this.action + '/settings', this.fields).then(response => {
                        this.loaded = true;
                        this.success = true;
                        if ("email" in this.fields) {
                            this.email = this.fields.email
                            delete this.fields.email
                        }
                        notyf.success('Profil yenilənib');
                    }).catch(error => {
                        this.loaded = true;
                        notyf.open({
                            type: 'info',
                            message: 'Send us <b>an email</b> to get support'
                        });
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
