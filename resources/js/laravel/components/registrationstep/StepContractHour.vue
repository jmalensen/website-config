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
                                    Combien d’heures d’intervention comprend ce type de contrat ?
                                </p>
                                <div class="mb-5">
                                    <inputformgroup :infos_input='{
                                        "name" : "engagement_nb_hours",
                                        "text" : "Nombre d`heures",
                                        "type" : "text",
                                        "required" : true,
                                        "value" : currentDataEkoUsage.data_eko.engagement_nb_hours,
                                        "placeholder" : "Le nombre d`heures (ex: 4 ...)"}' />
                                </div>

                                <p class="mb-1">
                                    A combien d’heures avant le terme souhaiterez-vous être informé de la fin de contrat qui approche ?
                                </p>
                                <div class="mb-5">
                                    <inputformgroup :infos_input='{
                                        "name" : "reminder_nb_hours",
                                        "text" : "Nombre d`heures avant la fin de l`engagement",
                                        "type" : "text",
                                        "required" : true,
                                        "value" : currentDataEkoUsage.data_eko.reminder_nb_hours,
                                        "placeholder" : "La nombre d`heures avant la fin de l`engagement (ex: 24 ...)"}' />
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
        name: "step-contract-hour",
        created(){
            this.$store.dispatch('setStep','contract-hour');
        },
        computed:{
        },
        methods: {
            goNext: function() {

                let ekousage = this.currentDataEkoUsage;

                ekousage.data_eko.contract_name = $('#type_contract_name').val();
                ekousage.data_eko.engagement_nb_hours = $('#engagement_nb_hours').val();
                ekousage.data_eko.reminder_nb_hours = $('#reminder_nb_hours').val();
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