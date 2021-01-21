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
                <h1 class="mb-4">Gestion commerciale Client</h1>

                <div class="col-12 pt-4">
                    <form @submit.prevent="goNext()" id="infos_company" method="POST" accept-charset="UTF-8" autocomplete="off">
                        <div class="row">
                            <div class="col-12">
                                <p>De façon générale, combien de temps sont valables vos devis ?</p>
                            </div>
                            <div class="col-12 col-md-6">
                                <inputformgroup :infos_input='{
                                    "name" : "validity_period_estimates",
                                    "text" : "Temps validité devis (en jours)",
                                    "type" : "text",
                                    "value" : currentDataEkoUsage.data_eko.validity_period_estimates,
                                    "placeholder" : "Ex : 30 ...."}' />

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-4">
                                            <img src="/images/logos/monstreko2.png" alt="Aide monstrelio" style="width:80px" />
                                        </div>
                                        <div class="col-8">
                                            <p class="text-danger">
                                                La loi vous oblige à communiquer la validité de toute proposition commerciale que vous soumettez à vos clients. La durée de validité reste modifiable à chaque document que vous créerez.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 text-center text-md-right">
                                <p>
                                    <img class="img-fluid"
                                         src="/images/visus/visu-facture.png"
                                         alt="Visuel" style="width:200px;" />
                                </p>
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
</template>

<script>
    export default {
        name: "step-validity-estimates",
        data() {
            return {
                validity_period_list: []
            }
        },
        created(){
            this.$store.dispatch('setStep','validity-estimates');
        },
        mounted(){
            $("#infos_company").validate({
                rules: {
                    validity_period_estimates:{
                        required: true,
                        number: true,
                        minlength:0,
                        maxlength:255
                    }
                },
                messages: {
                    validity_period_estimates: {
                        required: "Veuillez saisir une durée de validité !",
                        number: "Veuillez saisir un nombre !",
                        minlength: "Veuillez saisir plus d'un caractère !",
                        maxlength: "Veuillez saisir moins de 255 caractères !"
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

                    let validity_period_estimates = $('#validity_period_estimates').val();
                    if (validity_period_estimates != '') {

                        let ekousage = this.currentDataEkoUsage;

                        ekousage.data_eko.validity_period_estimates = validity_period_estimates;

                        this.$store.dispatch('setEkoStep', {
                            'url': '/userconf/companies/storeStepEko',
                            'data_eko': ekousage
                        });
                    }

                    this.$router.push({path: 'doc-numbering'});
                }
            }
        }
    }
</script>

<style scoped>

</style>