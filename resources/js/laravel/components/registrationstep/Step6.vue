<template>
    <div class="row">
        <div class="d-none d-xl-block col-xl-2">
            <recapaside :company="currentDataCompany" :ekousage="currentDataEkoUsage"/>
        </div>
        <div class="col-12 col-xl-6 offset-xl-1 mt-4">
            <div class="d-none d-md-block mb-2 p-2">
                <ariane :step="6" />
            </div>
            <div class="row block block-rounded block-fx-shadow p-3">
                <h1 class="mb-4">Renseignez vos coordonnées bancaires !</h1>

                <div class="col-12 pt-2">
                    <form @submit.prevent="goNext()" id="infos_company" method="POST" accept-charset="UTF-8" autocomplete="off">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <inputformgroup :infos_input='{
                                    "name" : "iban",
                                    "text" : "IBAN",
                                    "type" : "text",
                                    "required" : true,
                                    "value" : currentDataCompany.iban,
                                    "placeholder" : "Ex : FR7630006000011234567890189 ..."}' />

                                <inputformgroup :infos_input='{
                                    "name" : "bic_swift",
                                    "text" : "BIC/SWIFT",
                                    "type" : "text",
                                    "required" : true,
                                    "value" : currentDataCompany.bic_swift,
                                    "placeholder" : "Ex : BNPAFRPPXXX ..."}' />
                            </div>
                            <div class="col-12 col-md-6 text-center text-md-right">
                                <p>
                                    <img class="img-fluid"
                                         src="/images/visus/le-rib.gif"
                                         alt="Exemple IBAN"
                                         title="Exemple IBAN" />
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-2">
                                        <img src="/images/logos/monstreko2.png" alt="Aide monstrelio" style="width:80px" />
                                    </div>
                                    <div class="col-10">
                                        <p class="text-danger">
                                            Vos coordonnées bancaires figureront sur vos documents commerciaux pour un règlement plus aisé de la part de vos clients.
                                        </p>
                                    </div>
                                </div>
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
        name: "step6",
        created(){
            this.$store.dispatch('setStep',6);
        },
        mounted(){
            $("#infos_company").validate({
                rules: {
                    iban:{
                        required: true,
                        minlength:0,
                        maxlength:255
                    },
                    bic_swift: {
                        required: true,
                        minlength:0,
                        maxlength:255
                    }
                },
                messages: {
                    iban: {
                        required: "Veuillez saisir un IBAN !",
                        minlength: "Veuillez saisir plus d'un caractère !",
                        maxlength: "Veuillez saisir moins de 255 caractères !"
                    },
                    bic_swift: {
                        required: "Veuillez saisir un BIC SWIFT !",
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
                    let company = this.currentDataCompany;

                    company.iban = $('#iban').val();
                    company.bic_swift = $('#bic_swift').val();

                    company.step = '7';

                    this.$store.dispatch('setCurrentDataCompany', company);
                    this.$store.dispatch('setCompanyStep', {
                        'url': '/userconf/companies/storeLegal3',
                        'company': company
                    });

                    this.$router.push({ path:'7' });
                }
            }
        }
    }
</script>

<style scoped>

</style>