<template>
    <div class="settings__content">
        <div class="settings__header">
            <h4 class="settings__header-title">Profil məlumatları</h4>
        </div>
        <div class="settings__profile">
            <img class="rounded-circle" :src="'/images/profile/' + auth.avatar"/>
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <input name="avatar" type="file" v-on:change="onImageChange" class="form-control-file"
                           @loaded="onLoad">
                    <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image
                        should
                        not be more than 2MB.</small>
                </div>
            </form>
            <!--            <button type="submit" class="btn btn-primary" @click="uploadImage">Submit</button>-->
        </div>
        <div class="settings__description">
            <div class="settigns__user-name">{{ fields.name }} {{ fields.surname }} {{ '@' + auth.username }}</div>
            <div class="settings__user-description">{{ fields.about }}</div>
        </div>
        <form @submit.prevent="submit">
            <div class="form-group">
                <label for="name" class="settings__label">Real ad</label>
                <span class="settings__lable-info">{{ name_count }}/40</span>
                <input type="text" class="settings__input" name="name" id="name" v-model="fields.name"
                       @keyup='nameCount()' :maxlength="namemaxcharacter"/>
                <div v-if="errors && errors.name" class="text-danger">{{ errors.name[0] }}</div>
            </div>

            <div class="form-group">
                <label for="surname" class="settings__label">Real familia</label>
                <span class="settings__lable-info">{{ surname_count }}/40</span>
                <input type="text" class="settings__input" name="surname" id="surname" v-model="fields.surname"
                       @keyup='surnameCount()' :maxlength="namemaxcharacter"/>
                <div v-if="errors && errors.surname" class="text-danger">{{ errors.surname[0] }}</div>
            </div>


            <div class="form-group">
                <p class="settings__lable-info">Sizin emailiniz: {{email}}</p>
                <label for="email" class="settings__label">Email</label>
                <input type="text" class="settings__input" name="email" id="email"
                       placeholder="Email ünvanı dəyişdir.." v-model="fields.email">
                <div v-if="errors && errors.email" class="text-danger">{{ errors.email[0] }}</div>
            </div>

            <div class="form-group">
                <label for="about" class="settings__label">İxtisas</label>
                <span class="settings__lable-info">{{ about_count }}/40</span>
                <input type="text" name="about" class="settings__input" id="about"
                       placeholder="İxtisasınızı yazın. Məsələn: Database Administrator" autocomplete="off"
                       @keyup='aboutCount()' :maxlength="namemaxcharacter"
                       v-model="fields.about">
                <div v-if="errors && errors.about" class="text-danger">{{ errors.about[0] }}</div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Profili yeniləmək</button>
            </div>
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
                avatar: '',
                email: "",
                success: false,
                loaded: true,
                username: this.auth.username,
                namemaxcharacter: 40,
                name_count: 0,
                surname_count: 0,
                about_count: 0,
                isChanged: false,
            }
        },
        created: function () {
            this.fields.name = this.auth.name
            this.fields.surname = this.auth.surname
            this.email = this.auth.email
            this.fields.about = this.auth.about
            this.about_count = this.auth.about.length
            this.name_count = this.auth.name.length
            this.surname_count = this.auth.surname.length
        },
        methods: {
            onImageChange(e) {
                if (!e.target.files.length) return;
                let file = e.target.files[0];
                let reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = e => {
                    let src = e.target.result;

                    this.$emit('loaded', {src, file});
                };
            },
            onLoad(avatar) {
                this.avatar = avatar.src;

                this.persist(this.auth.avatar.file);
            },
            persist(avatar) {
                let data = new FormData();

                data.append('avatar', avatar);

                axios.post('/@' + this.username + '/settings/avatar', {avatar: this.avatar}).then(response => {
                    console.log(response);
                });
                axios.post(`/api/users/${this.user.name}/avatar`, data)
                    .then(() => flash('Avatar uploaded!'));
            },
            createImage(file) {
                let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {
                    vm.avatar = e.target.result;
                };
                reader.readAsDataURL(file);
                console.log(reader.readAsDataURL(file))
            },

            uploadImage() {
                axios.post('/@' + this.username + '/settings/avatar', {avatar: this.avatar}).then(response => {
                    console.log(response);
                });
            },
            // avatar() {
            //     axios.post(, this.avatar).then(response => {
            //         notyf.success('Profil yenilənib');
            //     }).catch(error => {
            //         this.loaded = true;
            //         notyf.open({
            //             type: 'error',
            //             message: 'Server error'
            //         });
            //         if (error.response.status === 422) {
            //             this.errors = error.response.data.errors || {};
            //         }})
            // },
            submit() {
                if (this.loaded) {
                    const notyf = new Notyf();
                    this.loaded = false;
                    this.success = false;
                    this.errors = {}
                    axios.post('/@' + this.username + '/settings/profile', this.fields).then(response => {
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
                            type: 'error',
                            message: 'Server error'
                        });
                        if (error.response.status === 422) {
                            this.errors = error.response.data.errors || {};
                        }
                    });
                }
            },
            nameCount: function () {
                if (this.fields.name.length > this.namemaxcharacter) {
                    this.name_count = this.namemaxcharacter;
                } else {
                    const remainCharacters = this.fields.name.length;
                    this.name_count = remainCharacters;
                }
            },
            surnameCount: function () {
                if (this.fields.surname.length > this.namemaxcharacter) {
                    this.surname_count = this.namemaxcharacter;
                } else {
                    const remainCharacters = this.fields.surname.length;
                    this.surname_count = remainCharacters;
                }
            },
            aboutCount: function () {
                if (this.fields.about.length > this.namemaxcharacter) {
                    this.about_count = this.namemaxcharacter;
                } else {
                    const remainCharacters = this.fields.about.length;
                    this.about_count = remainCharacters;
                }
            }
        },
    }
</script>

<style scoped>

</style>
