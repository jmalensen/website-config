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
                <h1 class="mb-4">Gestion commerciale</h1>

                <div class="col-12 pt-4">
                    <form @submit.prevent="goNext()" id="infos_company" method="POST" accept-charset="UTF-8" autocomplete="off">

                        <p>Quel type de numérotation de documents commerciaux souhaitez-vous ?</p>

                        <div class="form-group row items-push mb-0">
                            <div class="custom-check-eko col-12 col-md-4">
                                <div class="custom-control custom-block custom-control-primary mb-1">
                                    <input type="radio"
                                           class="custom-control-input"
                                           id="document_numbering"
                                           name="document_numbering"
                                           value="Annuelle"
                                           v-model="document_numbering">
                                    <label class="custom-control-label" for="document_numbering">
                                        <span class="d-block font-w400 text-center my-3">
                                            <span class="font-size-h4 font-w600 d-block">
                                                <i class="fa fa-2x fa-calendar-alt"></i>
                                            </span>
                                            <span class="font-size-h2 font-w600">Annuelle</span>
                                        </span>
                                        <span class="d-block text-center">(AA00001)</span>
                                    </label>
                                    <span class="custom-block-indicator">
                                        <i class="fa fa-check"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-12 col-md-8">
                                <p class="text-danger">
                                    La numérotation au format annuel se construira de la façon suivante : les deux derniers chiffres qui composent l’année en cours et le numéro unique du document généré de façon incrémental tout au long de l’année. La remise à 0 se fera chaque année.
                                </p>
                            </div>


                            <div class="custom-check-eko col-12 col-md-4">
                                <div class="custom-control custom-block custom-control-primary mb-1">
                                    <input type="radio"
                                           class="custom-control-input"
                                           id="document_numbering2"
                                           name="document_numbering"
                                           value="Mensuelle"
                                           v-model="document_numbering">
                                    <label class="custom-control-label" for="document_numbering2">
                                        <span class="d-block font-w400 text-center my-3">
                                            <span class="font-size-h4 font-w600 d-block">
                                                <i class="fa fa-2x fa-calendar-week"></i>
                                            </span>
                                            <span class="font-size-h2 font-w600">Mensuelle</span>
                                        </span>
                                        <span class="d-block text-center">(AAMM00001)</span>
                                    </label>
                                    <span class="custom-block-indicator">
                                        <i class="fa fa-check"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-12 col-md-8">
                                <p class="text-danger">
                                    La numérotation au format mensuel se construira de la façon suivante : les deux derniers chiffres qui composent l’année en cours, le numéro du mois en cours et le numéro unique du document généré de façon incrémental tout au long du mois en cours. La remise à 0 se fera chaque mois.
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
        name: "step-doc-numbering",
        data(){
              return {
                  document_numbering: null
              }
        },
        created(){
            this.$store.dispatch('setStep','doc-numbering');
        },
        mounted(){
            if(this.isValueExist(this.currentDataEkoUsage.data_eko.document_numbering) ){
                this.document_numbering = this.currentDataEkoUsage.data_eko.document_numbering;
            }
        },
        computed:{
        },
        methods: {
            goNext: function() {

                let ekousage = this.currentDataEkoUsage;

                ekousage.data_eko.document_numbering = this.document_numbering;

                this.$store.dispatch('setEkoStep', {
                    'url': '/userconf/companies/storeStepEko',
                    'data_eko': ekousage
                });

                this.$router.push({ path:'tva' });
            }
        }
    }
</script>

<style scoped>

</style>