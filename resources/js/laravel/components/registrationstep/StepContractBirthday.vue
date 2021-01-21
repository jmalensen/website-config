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
                <h1 class="mb-4">Contrats de services</h1>

                <div class="col-12 pt-4">
                    <form @submit.prevent="goNext()" id="infos_company" method="POST" accept-charset="UTF-8" autocomplete="off">

                        <div class="row">
                            <div class="col-12 col-md-6">
                                <p class="mb-1">
                                    Comment voulez-vous nommer votre type de contrat ?
                                </p>
                                <div class="mb-5">
                                    <inputformgroup :infos_input='{
                                        "name" : "type_contract_name",
                                        "text" : "Nom type de contrat",
                                        "type" : "text",
                                        "required" : true,
                                        "value" : currentDataEkoUsage.data_eko.contract_name,
                                        "placeholder" : "Le nom du type de contrat ..."}' />
                                </div>

                                <p class="mb-1">
                                    Vos périodes sont en jours ou en mois ?
                                </p>
                                <div class="form-group row items-push mb-4">
                                    <div class="custom-check-eko col-12 col-md-6">
                                        <div class="custom-control custom-block custom-control-primary mb-1">
                                            <input type="radio"
                                                   class="custom-control-input"
                                                   id="unit_mesure"
                                                   name="unit_mesure"
                                                   value="Jours"
                                                   v-model="unit_mesure">
                                            <label class="custom-control-label" for="unit_mesure">
                                                <span class="d-block font-w400 text-center my-3">
                                                    <span class="font-size-h4 font-w600">*</span>
                                                    <span class="font-size-h5 font-w600">Jours</span>
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
                                                   id="unit_mesure2"
                                                   name="unit_mesure"
                                                   value="Mois"
                                                   v-model="unit_mesure">
                                            <label class="custom-control-label" for="unit_mesure2">
                                                <span class="d-block font-w400 text-center my-3">
                                                    <span class="font-size-h4 font-w600">*</span>
                                                    <span class="font-size-h5 font-w600">Mois</span>
                                                </span>
                                            </label>
                                            <span class="custom-block-indicator">
                                            <i class="fa fa-check"></i>
                                        </span>
                                        </div>
                                    </div>
                                </div>

                                <p class="mb-1">
                                    Quelle est la durée d’engagement pour laquelle votre client est engagé ?
                                </p>
                                <div class="mb-5">
                                    <inputformgroup :infos_input='{
                                        "name" : "engagement_period",
                                        "text" : "Période en chiffre",
                                        "type" : "text",
                                        "required" : true,
                                        "value" : currentDataEkoUsage.data_eko.engagement_period,
                                        "placeholder" : "La durée de l`engagement (ex: 4 ...)"}' />
                                </div>

                                <p class="mb-1">
                                    A combien de temps avant le terme souhaiterez-vous être informé de l’échéance qui approche ?
                                </p>
                                <div class="mb-5">
                                    <inputformgroup :infos_input='{
                                        "name" : "reminder_period",
                                        "text" : "Période avant la fin de l`engagement",
                                        "type" : "text",
                                        "required" : true,
                                        "value" : currentDataEkoUsage.data_eko.reminder_period,
                                        "placeholder" : "La durée avant la fin de l`engagement (ex: 6 ...)"}' />
                                </div>

                                <p class="mb-1">
                                    Si vous désirez que les contrats de ce type soient numérotés automatiquement, merci de préciser le préfixe que vous choisissez :
                                </p>
                                <div class="mb-5">
                                    <inputformgroup :infos_input='{
                                        "name" : "prefix_contract",
                                        "text" : "Préfixe du contrat",
                                        "type" : "text",
                                        "value" : currentDataEkoUsage.data_eko.prefix_contract,
                                        "placeholder" : "Le préfix que vous souhaitez pour le contrat..."}' />
                                </div>
                            </div>

                            <div class="col-12 col-md-6 text-center text-md-right">
                                <p>
                                    <img class="img-fluid"
                                         src="/images/visus/visu-agenda.png"
                                         alt="Visuel" style="width:300px;" />
                                </p>
                            </div>
                            <div class="col-12 text-right">
                                <button class="btn btn-choice-big">Je continue</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "step-contract-birthday",
        data(){
            return {
                unit_mesure: null
            }
        },
        created(){
            this.$store.dispatch('setStep','contract-birthday');
        },
        mounted(){
            if(this.isValueExist(this.currentDataEkoUsage.data_eko.unit_mesure) ) {
                this.unit_mesure = this.currentDataEkoUsage.data_eko.unit_mesure;
            }
        },
        computed:{
        },
        methods: {
            goNext: function() {

                let ekousage = this.currentDataEkoUsage;

                ekousage.data_eko.contract_name = $('#type_contract_name').val();
                ekousage.data_eko.unit_mesure = this.unit_mesure;
                ekousage.data_eko.engagement_period = $('#engagement_period').val();
                ekousage.data_eko.reminder_period = $('#reminder_period').val();
                ekousage.data_eko.prefix_contract = $('#prefix_contract').val();

                this.$store.dispatch('setEkoStep', {
                    'url': '/userconf/companies/storeStepEko',
                    'data_eko': ekousage
                });

                this.$router.push({ path:'infos-user' });
            }
        }
    }
</script>

<style scoped>

</style>