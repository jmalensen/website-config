<template>
    <div class="row">
        <div class="d-none d-xl-block col-xl-2">
            <recapaside :company="currentDataCompany" :ekousage="currentDataEkoUsage"/>
        </div>
        <div class="col-12 col-xl-6 offset-xl-1 mt-4">
            <div class="d-none d-md-block mb-2 p-2">
                <ariane :step="2" />
            </div>
            <div class="row block block-rounded block-fx-shadow p-3">
                <div class="col-12">
                    <h1 class="mb-4">Votre entreprise ...</h1>
                </div>

                <div class="col-12 pt-6">
                    <form @submit.prevent="goNext()" id="infos_company" method="POST" accept-charset="UTF-8" autocomplete="off">
                        <div class="row mb-3">

                            <div class="col-12 col-md-6 nb-company">
                                <p>
                                    ... existe déjà, renseignez votre numéro de
                                    <span v-if="currentDataCompany.country == 'FRANCE'">SIRET</span>
                                    <span v-if="currentDataCompany.country == 'LUXEMBOURG'">RCSL</span>
                                </p>
                                <inputformgroup v-if="currentDataCompany.country == 'FRANCE'" :infos_input='{
                                        "name" : "siret",
                                        "type" : "text",
                                        "value" : currentDataCompany.siret,
                                        "placeholder" : "Numéro de SIRET (14 chiffres)"}' />

                                <inputformgroup v-if="currentDataCompany.country == 'LUXEMBOURG'" :infos_input='{
                                        "name" : "rcsl",
                                        "type" : "text",
                                        "value" : currentDataCompany.rcsl,
                                        "placeholder" : "Numéro de RCSL"}' />
                            </div>
                            <div class="col-12 col-md-6">
                                <p>
                                    ... est en cours de création
                                </p>
                            </div>
                        </div>

                        <div class="col-12 text-right">
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
        name: "step2",
        created(){
            this.$store.dispatch('setStep',2);
        },
        mounted(){
            $("#infos_company").validate({
                rules: {
                    siret:{
                        number: true,
                        minlength:14,
                        maxlength:14
                    },
                    rcsl:{
                        number: true,
                        minlength:20,
                        maxlength:20
                    }
                },
                messages: {
                    siret: {
                        number: "Veuillez saisir un nombre !",
                        minlength: "Veuillez saisir au moins 14 caractères !",
                        maxlength: "Veuillez saisir moins de 15 caractères !"
                    },
                    rcsl: {
                        number: "Veuillez saisir un nombre !",
                        minlength: "Veuillez saisir au moins 20 caractères !",
                        maxlength: "Veuillez saisir moins de 21 caractères !"
                    }
                },
            });
        },
        computed:{
        },
        methods: {
            goNext: function() {
                let validator = $("#infos_company").validate();
                let formValid = validator.form();
                if(formValid) {
                    let company = this.currentDataCompany;

                    let siret = $('#siret').val();
                    let rcsl = $('#rcsl').val();
                    if (siret != '') {
                        company.siret = siret;
                        //this.$store.dispatch('getInfosFromNumber', siret);
                    }
                    if (rcsl != '') {
                        company.rcsl = rcsl;
                    }

                    this.$store.dispatch('setCurrentDataCompany', company);
                    Promise.all([
                        this.$store.dispatch('setCompanyStepIdNumber', {
                            'url': '/userconf/companies/storeIdNumber',
                            'company': company
                        })
                    ]).finally(() => {
                        if (siret != '') {
                            this.$store.dispatch('getInfosFromNumber', siret);
                        }
                    });

                    this.$router.push({path: '3'});
                }
            }
        }
    }
</script>

<style scoped>

</style>