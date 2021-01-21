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
                <h1 class="mb-4">Les équipements en clientèle sur lesquels vous désirez assurer un suivi</h1>

                <div class="col-12 pt-4">
                    <form @submit.prevent="goNext()" id="infos_company" method="POST" accept-charset="UTF-8" autocomplete="off">

                        <div class="row">
                            <div v-for="(equipment, index) in equipments" class="col-12 col-md-4">
                                <div class="form-group">
                                    <input class="form-control"
                                           :id="'equipment'+index"
                                           v-model="equipment.value"
                                           name="equipment[]"
                                           placeholder="Un type d'équipement (ex: laptop...)"
                                           autocomplete="off"
                                           autofocus="autofocus"
                                           type="text"/>
                                </div>
                            </div>

                            <div class="col-12">
                                <a class="btn btn-secondary text-white" @click.prevent="addEquipment">
                                    <i class="fa fa-plus"></i> Ajouter un type d'équipement
                                </a>

                                <div class="text-right">
                                    <button class="btn btn-choice-big">Je continue</button>
                                </div>
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
        name: "step-customer-equipments",
        data(){
            return {
                equipments: [{ value: '' }]
            }
        },
        created(){
            this.$store.dispatch('setStep','customer-equipments');
        },
        mounted(){
            if(this.isValueExist(this.currentDataEkoUsage.data_eko.customer_equipments) ){
                this.equipments = this.currentDataEkoUsage.data_eko.customer_equipments;
            }
        },
        computed:{
        },
        methods: {
            addEquipment: function () {
                this.equipments.push({ value: '' });
            },
            goNext: function() {

                let ekousage = this.currentDataEkoUsage;

                let result = this.equipments.filter(this.filterByValue);
                ekousage.data_eko.customer_equipments = result;

                this.$store.dispatch('setEkoStep', {
                    'url': '/userconf/companies/storeStepEko',
                    'data_eko': ekousage
                });

                if(ekousage.data_eko.choices.includes('need_contracts_services') ){
                    this.$router.push({ path:'type-contract' });

                } else{
                    this.$router.push({ path:'infos-user' });
                }
            },
            filterByValue(obj){
                // If value is not null
                if (obj.value !== undefined
                    && obj.value !== '') {
                    return true;

                } else {
                    return false;
                }
            }
        }
    }
</script>

<style scoped>

</style>