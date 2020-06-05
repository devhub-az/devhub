<template>
    <div class="settings__content">
        <form @submit.prevent="submit">
            <div class="settings__header">
                ŞƏXSİ MƏLUMAT
            </div>

            <div class="settings-list">
                <div class="form-group">
                    <label for="name" class="settings__label">Əsl adınız {{ name_count }}/40</label>
                    <input type="text" class="settings__input" name="name" id="name" v-model="fields.name"
                           @keyup='nameCount()' :maxlength="namemaxcharacter" placeholder="Əsl adınızı yazın"
                           @keydown.space.prevent/>
                    <div v-if="errors && errors.name" class="text-danger">{{ errors.name[0] }}</div>
                </div>

                <div class="form-group">
                    <label for="surname" class="settings__label">Əsl familiyanız {{ surname_count }}/40</label>
                    <input type="text" class="settings__input" name="surname" id="surname" v-model="fields.surname"
                           @keyup='surnameCount()' :maxlength="namemaxcharacter" placeholder="Əsl familiyanızı yazın"
                           @keydown.space.prevent/>
                    <div v-if="errors && errors.surname" class="text-danger">{{ errors.surname[0] }}</div>
                </div>

                <div class="form-group">
                    <label for="about" class="settings__label">İxtisas {{ about_count }}/40</label>
                    <input type="text" name="about" class="settings__input" id="about"
                           placeholder="İxtisasınızı yazın. Məsələn: Database Administrator" autocomplete="off"
                           @keyup='aboutCount()' :maxlength="namemaxcharacter"
                           v-model="fields.about">
                    <div v-if="errors && errors.about" class="text-danger">{{ errors.about[0] }}</div>
                </div>
            </div>

            <div class="settings__header">
                REGİONAL Parametrlər
            </div>

            <div class="settings-list">
                <div class="form-group">
                    <p class="settings__label">Dil</p>
                    <span>
                        <i class="mdi input-wrapper__icon mdi-chevron-down"></i>
                        <select name="user_bday_day" class="settings__input-select">
                            <option value="az" selected>Azərbaycan</option>
                            <option value="ru">Русский</option>
                        </select>
                    </span>
                </div>

                <div class="form-group">
                    <p class="settings__label">Sizin emailiniz: {{email}}</p>
                    <input type="text" class="settings__input" name="email" id="email"
                           placeholder="Email ünvanı dəyişdir.." v-model="fields.email">
                    <div v-if="errors && errors.email" class="text-danger">{{ errors.email[0] }}</div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Profili yeniləmək</button>
        </form>
    </div>
</template>

<script>
    export default {
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
            submit() {
                if (this.loaded) {
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
                        new Noty({
                            type: 'success',
                            text: '<div class="notification-image">' +
                                '<i class="mdi mdi-account-check-outline"></i>' +
                                '</div> ' +
                                '<div class="text">Profil yenilənib</div>',
                        }).show();
                    }).catch(error => {
                        this.loaded = true;
                        new Noty({
                            type: 'error',
                            text: '<div class="notification-image"><span class="mdi mdi-x"/></div> Xəta',
                        }).show();
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
