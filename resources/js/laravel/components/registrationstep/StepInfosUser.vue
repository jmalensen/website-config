<template>
    <div class="row">
        <div class="d-none d-xl-block col-xl-2">
            <recapaside :company="currentDataCompany" :ekousage="currentDataEkoUsage"/>
        </div>
        <div class="col-12 col-xl-6 offset-xl-1 mt-4">
            <div class="d-none d-md-block mb-2 p-2">
                Pays > Votre société > Personnalisation utilisation eKo
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="block block-rounded block-fx-shadow p-3">
                        <h1 class="mb-4">Les informations sur les utilisateurs</h1>

                        <div class="col-12 pt-4">
                            <form @submit.prevent="goNext()" id="infos_company" method="POST" accept-charset="UTF-8" autocomplete="off">

                                <div class="row">

                                    <div class="col-12 offset-md-3 col-md-6">
                                        <div class="block block-rounded block-fx-shadow block-link-pop text-center link-fx">
                                            <div class="block-content block-content-full">
                                                <img class="img-avatar" src="/images/logos/logo.png" alt="">
                                                <h4 class="mb-1">Utilisateur :</h4>
                                            </div>
                                            <div class="block-content block-content-full bg-body-light">
                                                <input type="hidden" v-model="ident" />
                                                <div class="form-group">
                                                    <label for="'userl'" class="font-w600 mb-0">
                                                        Nom : {{lastname}}
                                                    </label>
                                                    <input class="form-control"
                                                           :id="'userl'"
                                                           v-model="lastname"
                                                           placeholder="Nom utilisateur..."
                                                           autocomplete="off"
                                                           autofocus="autofocus"
                                                           type="text"/>
                                                </div>

                                                <div class="form-group">
                                                    <label for="'userp'" class="font-w600 mb-0">
                                                        Prénom : {{firstname}}
                                                    </label>
                                                    <input class="form-control"
                                                           :id="'userp'"
                                                           v-model="firstname"
                                                           placeholder="Prénom utilisateur..."
                                                           autocomplete="off"
                                                           autofocus="autofocus"
                                                           type="text"/>
                                                </div>

                                                <div class="form-group">
                                                    <label for="'usere'" class="font-w600 mb-0">
                                                        Email : {{email}}
                                                    </label>
                                                    <input class="form-control"
                                                           :id="'usere'"
                                                           v-model="email"
                                                           placeholder="Email utilisateur..."
                                                           autocomplete="off"
                                                           autofocus="autofocus"
                                                           type="email"/>
                                                </div>

                                                <p v-if="errorMessage != ''" class="mb-0 text-danger">{{ errorMessage }}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center col-12">
                                        <a class="btn btn-secondary text-white" @click.prevent="addUser">
                                            <span v-if="getIndexUser() != -1">
                                                Sauvegarder modifications
                                            </span>
                                            <span v-else>
                                                <i class="fa fa-plus"></i> Ajouter un utilisateur
                                            </span>
                                        </a>
                                    </div>

                                    <div class="text-right col-12">
                                        <button class="btn btn-choice-big">Je continue</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-xl-3 mt-4">
            <div class="row block block-rounded block-fx-shadow p-3">
                <h2 class="mb-4">Liste des utilisateurs</h2>

                <div v-for="(user, index) in users" class="col-12">
                    <a class="block block-rounded block-fx-shadow block-link-pop link-fx" @click.prevent="selectUser(index)">
                        <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                            <img class="img-avatar" src="/images/logos/logo.png" alt="">
                            <div class="ml-3 text-right">
                                <p class="font-w600 mb-0">Nom : {{user.lastname}}</p>
                                <p class="font-size-sm font-italic text-muted mb-0">
                                    Prénom : {{user.firstname}}
                                </p>
                                <p class="font-size-sm font-italic text-muted mb-0">
                                    Email : {{user.email}}
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "step-infos-user",
        data(){
            return {
                // users: [{ lastname: '', firstname: '', email: '' }],
                errorMessage : '',
                users: [],
                ident:1,
                lastname: null,
                firstname: null,
                email: null
            }
        },
        created(){
            this.$store.dispatch('setStep','infos-user');
        },
        mounted(){
            if(this.users.length == 0 && this.isValueExist(this.currentUser) ){
                this.lastname = this.isValueExist(this.currentUser.name) ? this.currentUser.name : null;
                this.firstname = this.isValueExist(this.currentUser.firstname) ? this.currentUser.firstname : null;
                this.email = this.isValueExist(this.currentUser.email) ? this.currentUser.email : null;
            }

            if(this.isValueExist(this.currentDataEkoUsage.data_eko.users) ){
                this.users = this.currentDataEkoUsage.data_eko.users;
                this.ident = this.users.length + 1;
            }
        },
        computed:{
        },
        methods: {
            addUser: function () {
                console.log('iohhl', this.users.length < this.currentDataEkoUsage.data_eko.nb_user );
                if(this.users.length < this.currentDataEkoUsage.data_eko.nb_user){

                    // If fields aren't empty
                    if(this.lastname != ''
                        && this.firstname != ''
                        && this.email != '') {

                        // Try to find ident in array of users
                        let index = this.getIndexUser();

                        // If index exist, update user
                        if (index != -1) {
                            this.users[index] = {
                                ident: this.ident,
                                lastname: this.lastname,
                                firstname: this.firstname,
                                email: this.email
                            }
                            this.ident = this.users.length + 1;

                        } else {
                            // Create new user
                            this.users.push({
                                ident: this.ident,
                                lastname: this.lastname,
                                firstname: this.firstname,
                                email: this.email
                            });

                            this.ident++;
                        }

                        this.lastname = null;
                        this.firstname = null;
                        this.email = null;
                        this.errorMessage = '';
                    }

                }
            },
            getIndexUser: function(){
                let self = this;
                return this.users.findIndex(obj => {
                    return obj.ident == self.ident;
                });
            },
            selectUser: function(index){
                this.ident = this.users[index].ident;
                this.lastname = this.users[index].lastname;
                this.firstname = this.users[index].firstname;
                this.email = this.users[index].email;
            },
            goNext: function() {

                let ekousage = this.currentDataEkoUsage;

                if(this.users.length > 0){
                    ekousage.data_eko.users = this.users.filter(this.filterByValue);

                    this.$store.dispatch('setEkoStep', {
                        'url': '/userconf/companies/storeStepEko',
                        'data_eko': ekousage
                    });

                    this.$router.push({path: 'final'});
                } else{
                    this.errorMessage = 'Veuillez saisir au moins 1 utilisateur !';
                }
            },
            filterByValue(obj){
                // If value is not null
                if (obj.email !== undefined
                    && obj.email !== '') {
                    return true;

                } else {
                    return false;
                }
            }
        }
    }
</script>

<style scoped>

</style>