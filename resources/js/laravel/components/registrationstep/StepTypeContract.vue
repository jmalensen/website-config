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
                <h1 class="mb-4">Contrats de services (si module Contrats de service)</h1>

                <div class="col-12 pt-4">
                    <form @submit.prevent="goNext()" id="infos_company" method="POST" accept-charset="UTF-8" autocomplete="off">

                        <p class="mb-3">
                            eKo CRM vous permet d’enregistrer les contrats de services qui vous lient à vos clients et d’être avertis quand les échéances arrivent.
                        </p>
                        <p class="mb-3">
                            eKo CRM propose trois modes de fonctionnement :
                        </p>

                        <div class="form-group row items-push mb-2">
                            <div class="custom-check-eko col-12 col-md-4">
                                <div class="custom-control custom-block custom-control-primary mb-1">
                                    <input type="radio"
                                           class="custom-control-input"
                                           id="type_contract"
                                           name="type_contract"
                                           value="Date anniversaire"
                                           v-model="type_contract">
                                    <label class="custom-control-label" for="type_contract">
                                        <span class="d-block font-w400 text-center my-3">
                                            <span class="font-size-h4 font-w600 d-block">
                                                <i class="fa fa-2x fa-birthday-cake"></i>
                                            </span>
                                            <span class="font-size-h2 font-w600">Date anniversaire</span>
                                        </span>
                                        <span class="d-block text-center">Les contrats de service gérés à date anniversaire.</span>
                                    </label>
                                    <span class="custom-block-indicator">
                                        <i class="fa fa-check"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-12 col-md-8">
                                <h3>Les contrats de service gérés à date anniversaire.</h3>
                                <p>
                                    Exemple : un chauffagiste propose un contrat de maintenance de chaudière pour un an. eKo CRM peut être paramétré pour qu’au dixième mois de vie du contrat, un email soit envoyé pour penser à la reconduction de celui-ci.
                                </p>
                            </div>


                            <div class="custom-check-eko col-12 col-md-4">
                                <div class="custom-control custom-block custom-control-primary mb-1">
                                    <input type="radio"
                                           class="custom-control-input"
                                           id="type_contract2"
                                           name="type_contract"
                                           value="Intervention"
                                           v-model="type_contract">
                                    <label class="custom-control-label" for="type_contract2">
                                        <span class="d-block font-w400 text-center my-3">
                                            <span class="font-size-h4 font-w600 d-block">
                                                <i class="fa fa-2x fa-wrench"></i>
                                            </span>
                                            <span class="font-size-h2 font-w600">Intervention</span>
                                        </span>
                                        <span class="d-block text-center">Les contrats de service intégrant un nombre d’intervention.</span>
                                    </label>
                                    <span class="custom-block-indicator">
                                        <i class="fa fa-check"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-12 col-md-8">
                                <h3>Les contrats de service intégrant un nombre d’intervention.</h3>
                                <p>
                                    Exemple : un client a acheté 20 interventions de support de vos services. Suivez au fur et à mesure de vos interventions, combien il lui en reste et laissez eKo CRM vous prévenir quand il ne restera plus que 5 interventions à planifier pour réengager votre client.
                                </p>
                            </div>


                            <div class="custom-check-eko col-12 col-md-4">
                                <div class="custom-control custom-block custom-control-primary mb-1">
                                    <input type="radio"
                                           class="custom-control-input"
                                           id="type_contract3"
                                           name="type_contract"
                                           value="Horaire"
                                           v-model="type_contract">
                                    <label class="custom-control-label" for="type_contract3">
                                        <span class="d-block font-w400 text-center my-3">
                                            <span class="font-size-h4 font-w600 d-block">
                                                <i class="fa fa-2x fa-hourglass-half"></i>
                                            </span>
                                            <span class="font-size-h2 font-w600">Horaire</span>
                                        </span>
                                        <span class="d-block text-center">Les contrats de service intégrant un nombre d’heures.</span>
                                    </label>
                                    <span class="custom-block-indicator">
                                        <i class="fa fa-check"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-12 col-md-8">
                                <h3>Les contrats de service intégrant un nombre d’heures.</h3>
                                <p>
                                    Exemple : un client a acheté 20 heures de support de vos services. Suivez au fur et à mesure de vos interventions, combien il lui en reste et laissez eKo CRM vous prévenir quand il ne restera plus que 5 heures à planifier pour réengager votre client.
                                </p>
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
        name: "step-type-contract",
        data(){
            return {
                type_contract: null
            }
        },
        created(){
            this.$store.dispatch('setStep','type-contract');
        },
        mounted() {
            if(this.isValueExist(this.currentDataEkoUsage.data_eko.type_contract) ) {
                this.type_contract = this.currentDataEkoUsage.data_eko.type_contract;
            }
        },
        computed:{
        },
        methods: {
            goNext: function() {

                let ekousage = this.currentDataEkoUsage;

                // If change type of contract
                if(ekousage.data_eko.type_contract != this.type_contract){
                    ekousage.data_eko.type_contract = this.type_contract;

                    // Remove older infos
                    delete ekousage.data_eko.unit_mesure;
                    delete ekousage.data_eko.engagement_period;
                    delete ekousage.data_eko.reminder_period;

                    delete ekousage.data_eko.engagement_nb_hours;
                    delete ekousage.data_eko.reminder_nb_hours;

                    delete ekousage.data_eko.engagement_nb_intervention;
                    delete ekousage.data_eko.reminder_nb_intervention;
                }

                this.$store.dispatch('setEkoStep', {
                    'url': '/userconf/companies/storeStepEko',
                    'data_eko': ekousage
                });

                if(this.type_contract == 'Date anniversaire'){
                    this.$router.push({ path:'contract-birthday' });

                } else if(this.type_contract == 'Intervention'){
                    this.$router.push({ path:'contract-intervention' });

                } else if(this.type_contract == 'Horaire'){
                    this.$router.push({ path:'contract-hour' });

                }
            }
        }
    }
</script>

<style scoped>

</style>