<template>
    <div class="row">
        <div class="d-none d-xl-block col-xl-2">
            <recapaside :company="currentDataCompany" :ekousage="currentDataEkoUsage"/>
        </div>
        <div class="col-12 col-xl-6 offset-xl-1 mt-4">
            <div class="d-none d-md-block mb-2 p-2">
                Pays > Votre société > Personnalisation utilisation eKo
            </div>
            <div class="row block block-rounded block-fx-shadow p-3">
                <h1 class="mb-4">Stockage de fichiers</h1>

                <div class="col-12 pt-4">
                    <form @submit.prevent="goNext()" id="infos_company" method="POST" accept-charset="UTF-8" autocomplete="off">
                        <p class="mb-0">
                            eKo CRM vous permet de sauvegarder différents fichiers électroniques de tous formats :
                        </p>
                        <ul>
                            <li>directement sur les fiches de vos contacts particuliers, sociétés, fournisseurs,…</li>
                            <li>au sein d’une bibliothèque vous permettant de créer différents dossiers comme sur votre ordinateur.</li>
                        </ul>

                        <div class="form-group row items-push mb-0">
                            <div class="custom-check-eko col-12 col-md-6">
                                <div class="custom-control custom-block custom-control-primary mb-1">
                                    <input type="radio"
                                           class="custom-control-input"
                                           id="nb_go_storage"
                                           name="nb_go_storage"
                                           value="5"
                                           v-model="nb_go_storage">
                                    <label class="custom-control-label" for="nb_go_storage">
                                            <span class="d-block font-w400 text-center my-3">
                                                <span class="font-size-h4 font-w600">5 Go</span>
                                                <span class="font-size-h5 font-w600">10 € HT / mois</span>
                                            </span>
                                    </label>
                                    <span class="custom-block-indicator">
                                        <i class="fa fa-check"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="custom-check-eko col-12 col-md-6">
                                <div class="custom-control custom-block custom-control-primary mb-1">
                                    <input type="radio"
                                           class="custom-control-input"
                                           id="nb_go_storage2"
                                           name="nb_go_storage"
                                           value="10"
                                           v-model="nb_go_storage">
                                    <label class="custom-control-label" for="nb_go_storage2">
                                            <span class="d-block font-w400 text-center my-3">
                                                <span class="font-size-h4 font-w600">10 Go</span>
                                                <span class="font-size-h5 font-w600">15 € HT / mois</span>
                                            </span>
                                    </label>
                                    <span class="custom-block-indicator">
                                        <i class="fa fa-check"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="text-right">
                            <button class="btn btn-choice-big">Je continue</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "step-storage",
        data(){
            return {
                nb_go_storage: 10
            }
        },
        created(){
            this.$store.dispatch('setStep','storage');
        },
        mounted(){
            if(this.isValueExist(this.currentDataEkoUsage.data_eko.nb_go_storage) ){
                this.nb_go_storage = this.currentDataEkoUsage.data_eko.nb_go_storage;
            }
        },
        computed:{
        },
        methods: {
            goNext: function(value) {

                let ekousage = this.currentDataEkoUsage;

                ekousage.data_eko.nb_go_storage = this.nb_go_storage;

                this.$store.dispatch('setEkoStep', {
                    'url': '/userconf/companies/storeStepEko',
                    'data_eko': ekousage
                });

                this.$router.push({ path:'customer-equipments' });
            }
        }
    }
</script>

<style scoped>

</style>