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
                <h1 class="mb-4">Parlez-nous de l'organisation de votre quotidien</h1>

                <div class="col-12 pt-4">
                    <form @submit.prevent="goNext()" id="infos_company" method="POST" accept-charset="UTF-8" autocomplete="off">
                        <div class="row">

                            <div class="col-12">
                                <p class="mb-2">
                                    Votre agenda doit être géré ...
                                </p>
                                <div class="form-group row items-push mb-0">
                                    <div class="custom-check-eko col-12 col-md-6">
                                        <div class="custom-control custom-block custom-control-primary mb-1">
                                            <input type="radio"
                                                   class="custom-control-input"
                                                   id="nb_days_week"
                                                   name="nb_days_week"
                                                   value="5"
                                                   v-model="nb_days_week">
                                            <label class="custom-control-label" for="nb_days_week">
                                                    <span class="d-block font-w400 text-center my-3">
                                                        <span class="font-size-h4 font-w600">... sur 5 jours (Lu-Ven)</span>
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
                                                   id="nb_days_week2"
                                                   name="nb_days_week"
                                                   value="7"
                                                   v-model="nb_days_week">
                                            <label class="custom-control-label" for="nb_days_week2">
                                                    <span class="d-block font-w400 text-center my-3">
                                                        <span class="font-size-h4 font-w600">... sur 7 jours (Lu-Dim)</span>
                                                    </span>
                                            </label>
                                            <span class="custom-block-indicator">
                                                <i class="fa fa-check"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <p class="mb-2">
                                    A quelle heure assurez-vous au plus tôt votre premier rendez-vous de la journée ?
                                </p>
                                <div class="row">
                                    <div class="form-group col-4 mb-5">
                                        <select v-model="first_hour_day" id="first_hour_day" class="form-control">
                                            <option v-for="hour in list_hour" :value="hour">
                                                {{ hour }}
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <p class="mb-2">
                                    Quels sont les types d’évènements que vous suivrez dans votre calendrier ? Il peut s’agir de rendez-vous, de rappel téléphonique, de déjeuner d’affaire, réunion, dépannage, intervention, livraison...
                                </p>

                                <div class="row mb-2">
                                    <div v-for="(event, index) in events" class="col-12 col-md-4">
                                        <div class="form-group">
                                            <input class="form-control"
                                                   :id="'event'+index"
                                                   v-model="event.value"
                                                   name="event[]"
                                                   placeholder="Un type d'évènement (ex: réunion...)"
                                                   autocomplete="off"
                                                   autofocus="autofocus"
                                                   type="text"/>
                                        </div>
                                    </div>
                                </div>
                                <a class="btn btn-secondary text-white" @click.prevent="addEvent">
                                    <i class="fa fa-plus"></i> Ajouter un type d'évènement
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
        name: "step-company-organization",
        data(){
            return {
                list_hour: ['00h00', '01h00', '02h00', '03h00', '04h00', '05h00', '06h00', '07h00', '08h00', '09h00', '10h00', '11h00', '12h00', '13h00', '14h00', '15h00', '16h00', '17h00', '18h00', '19h00', '20h00'],
                nb_days_week: 7,
                first_hour_day: '08h00',
                events: [{ value: '' }]
            }
        },
        created(){
            this.$store.dispatch('setStep','company-organization');
        },
        mounted(){
            if(this.isValueExist(this.currentDataEkoUsage.data_eko.nb_days_week) ){
                this.nb_days_week = this.currentDataEkoUsage.data_eko.nb_days_week;
            }

            if(this.isValueExist(this.currentDataEkoUsage.data_eko.first_hour_day) ){
                this.first_hour_day = this.currentDataEkoUsage.data_eko.first_hour_day;
            }

            if(this.isValueExist(this.currentDataEkoUsage.data_eko.event_type) ){
                this.events = this.currentDataEkoUsage.data_eko.event_type;
            }
        },
        computed:{
        },
        methods: {
            addEvent: function () {
                this.events.push({ value: '' });
            },
            goNext: function(value) {

                let ekousage = this.currentDataEkoUsage;

                ekousage.data_eko.nb_days_week = this.nb_days_week;
                ekousage.data_eko.first_hour_day = $('#first_hour_day').val();

                let result = this.events.filter(this.filterByValue);
                ekousage.data_eko.event_type = result;

                this.$store.dispatch('setEkoStep', {
                    'url': '/userconf/companies/storeStepEko',
                    'data_eko': ekousage
                });

                if(ekousage.eko_type === 'eko-CRM'
                    && ekousage.data_eko.choices.includes('more_storage')) {
                    this.$router.push({path: 'storage'});

                } else{
                    this.$router.push({path: 'customer-equipments'});
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