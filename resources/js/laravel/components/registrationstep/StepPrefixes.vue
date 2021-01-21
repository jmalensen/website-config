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

                <div class="col-12">
                    <p>Choisissez les préfixes de numérotation de vos documents commerciaux</p>

                    <form @submit.prevent="goNext()" id="infos_company" method="POST" accept-charset="UTF-8" autocomplete="off">

                        <div class="row">
                            <div class="col-12 col-md-6">

                                <inputformgroup v-if="isValueExist(currentDataEkoUsage.data_eko)
                                                    && isValueExist(currentDataEkoUsage.data_eko.choices)
                                                    && currentDataEkoUsage.data_eko.choices.includes('need_estimates')"
                                                :infos_input='{
                                                "name" : "prefix_estimates",
                                                "text" : "Préfixe pour vos Devis",
                                                "type" : "text",
                                                "value" : currentDataEkoUsage.data_eko.prefix_estimates ? currentDataEkoUsage.data_eko.prefix_estimates : "DV",
                                                "placeholder" : "DV"}' />
                                <inputformgroup v-if="isValueExist(currentDataEkoUsage.data_eko)
                                                    && isValueExist(currentDataEkoUsage.data_eko.choices)
                                                    && currentDataEkoUsage.data_eko.choices.includes('need_estimates')
                                                    && currentDataEkoUsage.eko_type == 'eko-CRM'"
                                                :infos_input='{
                                                "name" : "prefix_customer_orders",
                                                "text" : "Préfixe pour vos Commandes client",
                                                "type" : "text",
                                                "value" : currentDataEkoUsage.data_eko.prefix_customer_orders ? currentDataEkoUsage.data_eko.prefix_customer_orders : "CC",
                                                "placeholder" : "CC"}' />
                                <inputformgroup v-if="isValueExist(currentDataEkoUsage.data_eko)
                                                    && isValueExist(currentDataEkoUsage.data_eko.choices)
                                                    && currentDataEkoUsage.data_eko.choices.includes('need_estimates')
                                                    && currentDataEkoUsage.eko_type == 'eko-CRM'"
                                                :infos_input='{
                                                "name" : "prefix_delivery_forms",
                                                "text" : "Préfixe pour vos Bons de livraison",
                                                "type" : "text",
                                                "value" : currentDataEkoUsage.data_eko.prefix_delivery_forms ? currentDataEkoUsage.data_eko.prefix_delivery_forms : "BL",
                                                "placeholder" : "BL"}' />


                                <inputformgroup v-if="isValueExist(currentDataEkoUsage.data_eko)
                                                    && isValueExist(currentDataEkoUsage.data_eko.choices)
                                                    && currentDataEkoUsage.data_eko.choices.includes('need_billing')"
                                                :infos_input='{
                                                "name" : "prefix_invoices",
                                                "text" : "Préfixe pour vos Factures",
                                                "type" : "text",
                                                "value" : currentDataEkoUsage.data_eko.prefix_invoices ? currentDataEkoUsage.data_eko.prefix_invoices : "FA",
                                                "placeholder" : "FA"}' />
                                <inputformgroup v-if="isValueExist(currentDataEkoUsage.data_eko)
                                                    && isValueExist(currentDataEkoUsage.data_eko.choices)
                                                    && currentDataEkoUsage.data_eko.choices.includes('need_billing')"
                                                :infos_input='{
                                                "name" : "prefix_advances",
                                                "text" : "Préfixe pour vos Accomptes",
                                                "type" : "text",
                                                "value" : currentDataEkoUsage.data_eko.prefix_advances ? currentDataEkoUsage.data_eko.prefix_advances : "AC",
                                                "placeholder" : "AC"}' />
                                <inputformgroup v-if="isValueExist(currentDataEkoUsage.data_eko)
                                                    && isValueExist(currentDataEkoUsage.data_eko.choices)
                                                    && currentDataEkoUsage.data_eko.choices.includes('need_billing')"
                                                :infos_input='{
                                                "name" : "prefix_credits",
                                                "text" : "Préfixe pour vos Avoirs",
                                                "type" : "text",
                                                "value" : currentDataEkoUsage.data_eko.prefix_credits ? currentDataEkoUsage.data_eko.prefix_credits : "AV",
                                                "placeholder" : "AV"}' />
                            </div>
                            <div class="col-12 col-md-6 text-center text-md-right d-flex align-items-center">
                                <p>
                                    <img class="img-fluid"
                                         src="/images/visus/prefixes.png"
                                         alt="Exemple préfixes"
                                         title="Exemple préfixes" />
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
        name: "step-prefixes",
        created(){
            this.$store.dispatch('setStep','prefixes');
        },
        computed:{
        },
        methods: {
            goNext: function() {

                let ekousage = this.currentDataEkoUsage;

                let prefix_estimates = $('#prefix_estimates').val();
                let prefix_customer_orders = $('#prefix_customer_orders').val();
                let prefix_delivery_forms = $('#prefix_delivery_forms').val();
                let prefix_invoices = $('#prefix_invoices').val();
                let prefix_advances = $('#prefix_advances').val();
                let prefix_credits = $('#prefix_credits').val();
                if(prefix_estimates != ''){
                    ekousage.data_eko.prefix_estimates = prefix_estimates;
                }
                if(prefix_customer_orders != ''){
                    ekousage.data_eko.prefix_customer_orders = prefix_customer_orders;
                }
                if(prefix_delivery_forms != ''){
                    ekousage.data_eko.prefix_delivery_forms = prefix_delivery_forms;
                }
                if(prefix_invoices != ''){
                    ekousage.data_eko.prefix_invoices = prefix_invoices;
                }
                if(prefix_advances != ''){
                    ekousage.data_eko.prefix_advances = prefix_advances;
                }
                if(prefix_credits != ''){
                    ekousage.data_eko.prefix_credits = prefix_credits;
                }

                this.$store.dispatch('setEkoStep', {
                    'url': '/userconf/companies/storeStepEko',
                    'data_eko': ekousage
                });

                // Only if estimates has been selected
                // if(ekousage.data_eko.need_estimates){
                if(ekousage.data_eko.choices.includes('need_estimates') ){
                    this.$router.push({ path:'validity-estimates' });
                } else{
                    this.$router.push({ path:'doc-numbering' });
                }
            }
        }
    }
</script>

<style scoped>

</style>