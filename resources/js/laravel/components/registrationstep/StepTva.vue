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
                <h1 class="mb-4">TVA – Taxe sur la Valeur Ajoutée</h1>

                <div class="col-12 pt-4">
                    <form @submit.prevent="goNext()" id="infos_company" method="POST" accept-charset="UTF-8" autocomplete="off">
                        <p class="mb-1">Quels sont les différents taux de TVA dont vous aurez besoin sur vos factures Clients ?</p>

                        <div v-if="currentDataCompany.country == 'FRANCE'" class="d-flex mb-1">
                            <div v-for="(tva_fr, index) in list_tva_fr" class="custom-check-eko form-group m-1" style="width:20%;">

                                <div class="custom-control custom-block custom-control-primary mb-1">
                                    <input type="checkbox"
                                           class="custom-control-input"
                                           :id="'tva_customer'+index"
                                           :value="tva_fr"
                                           v-model="tva_customer">
                                    <label class="custom-control-label" :for="'tva_customer'+index">
                                        <span class="d-block font-w400 text-center my-3">
                                            <span class="font-size-h4 font-w600">
                                                TVA {{ tva_fr }} %
                                            </span>
                                        </span>
                                    </label>
                                    <span class="custom-block-indicator">
                                        <i class="fa fa-check"></i>
                                    </span>
                                </div>

                            </div>
                        </div>

                        <div v-if="currentDataCompany.country == 'LUXEMBOURG'" class="d-flex mb-1">
                            <div v-for="(tva_lu, index) in list_tva_lu" class="custom-check-eko form-group m-1" style="width:20%;">

                                <div class="custom-control custom-block custom-control-primary mb-1">
                                    <input type="checkbox"
                                           class="custom-control-input"
                                           :id="'tva_customer'+index"
                                           :value="tva_lu"
                                           v-model="tva_customer">
                                    <label class="custom-control-label" :for="'tva_customer'+index">
                                        <span class="d-block font-w400 text-center my-3">
                                            <span class="font-size-h4 font-w600">
                                                TVA {{ tva_lu }} %
                                            </span>
                                        </span>
                                    </label>
                                    <span class="custom-block-indicator">
                                        <i class="fa fa-check"></i>
                                    </span>
                                </div>

                            </div>
                        </div>


                        <p class="mb-1">Le taux de TVA par défaut dont vous aurez besoin est ?</p>

                        <div v-if="currentDataCompany.country == 'FRANCE'" class="form-group col-4 mb-5">
                            <select v-model="default_tva" id="default_tva" class="form-control">
                                <option v-for="tva_fr in tva_customer" :value="tva_fr">
                                    TVA {{ tva_fr }} %
                                </option>
                            </select>
                        </div>

                        <div v-if="currentDataCompany.country == 'LUXEMBOURG'" class="form-group col-4 mb-5">
                            <select v-model="default_tva" id="default_tva" class="form-control">
                                <option v-for="tva_lu in tva_customer" :value="tva_lu">
                                    TVA {{ tva_lu }} %
                                </option>
                            </select>
                        </div>


                        <p class="mb-1">Quels sont les différents taux de TVA dont vous aurez besoin pour saisir vos commandes fournisseurs ?</p>

                        <div v-if="currentDataCompany.country == 'FRANCE'" class="d-flex mb-5">
                            <div v-for="(tva_fr, index) in list_tva_fr" class="custom-check-eko form-group m-1" style="width:20%;">

                                <div class="custom-control custom-block custom-control-primary mb-1">
                                    <input type="checkbox"
                                           class="custom-control-input"
                                           :id="'tva_provider'+index"
                                           :value="tva_fr"
                                           v-model="tva_provider">
                                    <label class="custom-control-label" :for="'tva_provider'+index">
                                        <span class="d-block font-w400 text-center my-3">
                                            <span class="font-size-h4 font-w600">
                                                TVA {{ tva_fr }} %
                                            </span>
                                        </span>
                                    </label>
                                    <span class="custom-block-indicator">
                                        <i class="fa fa-check"></i>
                                    </span>
                                </div>

                            </div>
                        </div>

                        <div v-if="currentDataCompany.country == 'LUXEMBOURG'" class="d-flex mb-5">
                            <div v-for="(tva_lu, index) in list_tva_lu" class="custom-check-eko form-group m-1" style="width:20%;">

                                <div class="custom-control custom-block custom-control-primary mb-1">
                                    <input type="checkbox"
                                           class="custom-control-input"
                                           :id="'tva_provider'+index"
                                           :value="tva_lu"
                                           v-model="tva_provider">
                                    <label class="custom-control-label" :for="'tva_provider'+index">
                                        <span class="d-block font-w400 text-center my-3">
                                            <span class="font-size-h4 font-w600">
                                                TVA {{ tva_lu }} %
                                            </span>
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
        name: "step-tva",
        data() {
            return {
                list_tva_fr: [
                    20,
                    10,
                    5.5,
                    2.1,
                    0
                ],
                list_tva_lu: [
                    17,
                    14,
                    8,
                    3,
                    0
                ],
                tva_customer : [],
                default_tva: null,
                tva_provider : [],
            }
        },
        created(){
            this.$store.dispatch('setStep','tva');
            // this.$store.dispatch('fetchCompany');
        },
        mounted(){
            if(this.currentDataCompany.country == 'FRANCE'){

                if(this.isValueExist(this.currentDataEkoUsage.data_eko.tva_customer) ){
                    this.tva_customer = this.currentDataEkoUsage.data_eko.tva_customer;
                } else{
                    this.tva_customer = [20, 10, 5.5, 2.1, 0];
                }

                if(this.isValueExist(this.currentDataEkoUsage.data_eko.default_tva) ){
                    this.default_tva = this.currentDataEkoUsage.data_eko.default_tva;
                } else{
                    this.default_tva = 20;
                }

                if(this.isValueExist(this.currentDataEkoUsage.data_eko.tva_provider) ){
                    this.tva_provider = this.currentDataEkoUsage.data_eko.tva_provider;
                } else{
                    this.tva_provider = [20, 10, 5.5, 2.1, 0];
                }

            } else if(this.currentDataCompany.country == 'LUXEMBOURG'){

                if(this.isValueExist(this.currentDataEkoUsage.data_eko.tva_customer) ){
                    this.tva_customer = this.currentDataEkoUsage.data_eko.tva_customer;
                } else{
                    this.tva_customer = [17, 14, 8, 3, 0];
                }

                if(this.isValueExist(this.currentDataEkoUsage.data_eko.default_tva) ){
                    this.default_tva = this.currentDataEkoUsage.data_eko.default_tva;
                } else{
                    this.default_tva = 17;
                }

                if(this.isValueExist(this.currentDataEkoUsage.data_eko.tva_provider) ){
                    this.tva_provider = this.currentDataEkoUsage.data_eko.tva_provider;
                } else{
                    this.tva_provider = [17, 14, 8, 3, 0];
                }
            }
        },
        computed:{
        },
        methods: {
            goNext: function() {

                let ekousage = this.currentDataEkoUsage;

                ekousage.data_eko.tva_customer = this.tva_customer;
                ekousage.data_eko.default_tva = this.default_tva;
                ekousage.data_eko.tva_provider = this.tva_provider;

                this.$store.dispatch('setEkoStep', {
                    'url': '/userconf/companies/storeStepEko',
                    'data_eko': ekousage
                });

                this.$router.push({ path:'company-organization' });
            }
        }
    }
</script>

<style scoped>

</style>