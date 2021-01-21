<template>
    <div class="row">
        <div class="d-none d-xl-block col-xl-2">
            <recapaside :company="currentDataCompany" :ekousage="currentDataEkoUsage"/>
        </div>
        <div class="col-12 col-xl-8">
            <div class="d-none d-md-block mb-2 p-2">
                <ariane :step="8" />
            </div>

            <div class="row block block-rounded block-fx-shadow p-3">
                <h1>Sélectionnez vos options</h1>

                <div class="col-12">
                    <h4>Généralités</h4>
                </div>

                <div id="common-part" class="row mb-4 align-items-stretch">
                    <div class="common-block col-12 col-md-6 col-lg-4 mb-3">
                        <div class="inner-block">
                            <p class="title">
                                Accès sécurisé https
                            </p>
                            <p class="detail">
                                Vos données cryptées en SSL 256 Bits
                            </p>
                            <div class="row" style="width:100%;">
                                <div class="col-4">
                                    <i class="icone text-white fa fa-3x fa-lock"></i>
                                </div>
                                <div class="col-8 d-flex justify-content-end">
                                    <i class="state text-success fa fa-2x fa-check-circle"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="common-block col-12 col-md-6 col-lg-4 mb-3">
                        <div class="inner-block">
                            <p class="title">
                                Sauvegarde
                            </p>
                            <p class="detail">
                                Vos données sauvegardées sans action de votre part
                            </p>
                            <div class="row" style="width:100%;">
                                <div class="col-4">
                                    <i class="icone text-white fa fa-3x fa-database"></i>
                                </div>
                                <div class="col-8 d-flex justify-content-end">
                                    <i class="state text-success fa fa-2x fa-check-circle"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="common-block col-12 col-md-6 col-lg-4 mb-3">
                        <div class="inner-block">
                            <p class="title">
                                Accès mobile et fixe 24/7
                            </p>
                            <p class="detail">
                                Connectez-vous depuis n’importe quel accès internet
                            </p>
                            <div class="row" style="width:100%;">
                                <div class="col-4">
                                    <i class="icone text-white fa-3x fas fa-phone-laptop"></i>
                                </div>
                                <div class="col-8 d-flex justify-content-end">
                                    <i class="state text-success fa fa-2x fa-check-circle"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="common-block col-12 col-md-6 col-lg-4 mb-3">
                        <div class="inner-block">
                            <p class="title">
                                Mises à jour
                            </p>
                            <p class="detail">
                                Les mises à jour se font sans action de votre part
                            </p>
                            <div class="row" style="width:100%;">
                                <div class="col-4">
                                    <i class="icone text-white fa fa-3x fa-redo"></i>
                                </div>
                                <div class="col-8 d-flex justify-content-end">
                                    <i class="state text-success fa fa-2x fa-check-circle"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="common-block col-12 col-md-6 col-lg-4 mb-3">
                        <div class="inner-block">
                            <p class="title">
                                Compatible PC/Mac/Linux
                            </p>
                            <p class="detail">
                                Idéal si votre parc informatique n’est pas homogène
                            </p>
                            <div class="row" style="width:100%;">
                                <div class="col-4">
                                    <i class="icone text-white fab fa-3x fa-linux"></i>
                                </div>
                                <div class="col-8 d-flex justify-content-end">
                                    <i class="state text-success fa fa-2x fa-check-circle"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="common-block col-12 col-md-6 col-lg-4 mb-3">
                        <div class="inner-block">
                            <p class="title">
                                Gestion droits utilisateur
                            </p>
                            <p class="detail">
                                Pour personnaliser les accès utilisateurs
                            </p>
                            <div class="row" style="width:100%;">
                                <div class="col-4">
                                    <i class="icone text-white fa fa-3x fa-users-cog"></i>
                                </div>
                                <div class="col-8 d-flex justify-content-end">
                                    <i class="state text-success fa fa-2x fa-check-circle"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-12">
                    <h4>Options disponibles pour <span v-if="lite_also">eKo CRM Lite et </span>eKo CRM</h4>
                </div>
                <div class="text-left mb-3">
                    <button class="btn btn-choice-big mr-3" @click="selectAll">
                        <span v-if="allSelected">Désélectionner tout</span>
                        <span v-else>Sélectionner tout</span>
                    </button>
                </div>

                <div id="part-eko-lite" class="row mb-4 align-items-stretch">

                    <checkboxcustom v-model="choices" :infos_input='{
                        "name" : "memo",
                        "class" : "eko-lite-block col-12 col-md-6 col-lg-4 mb-4",
                        "title" : "Mémo",
                        "detail" : "Un outil très pratique de pense-bête. Un aide-mémoire très utile.",
                        "fa_icon" : "fa fa-sticky-note",
                        "lite_also" : lite_also}' />

                    <checkboxcustom v-model="choices" :infos_input='{
                        "name" : "contact_individual",
                        "class" : "eko-lite-block col-12 col-md-6 col-lg-4 mb-4",
                        "title" : "Contacts particuliers",
                        "detail" : "Prospects et clients, personnes physiques",
                        "fa_icon" : "fa fa-user",
                        "lite_also" : lite_also}' />

                    <checkboxcustom v-model="choices" :infos_input='{
                        "name" : "contact_pro",
                        "class" : "eko-lite-block col-12 col-md-6 col-lg-4 mb-4",
                        "title" : "Contacts entreprises",
                        "detail" : "Prospects et clients, personnes morales",
                        "fa_icon" : "fa fa-user-tie",
                        "lite_also" : lite_also}' />

                    <checkboxcustom v-model="choices" :infos_input='{
                        "name" : "need_estimates",
                        "class" : "eko-lite-block col-12 col-md-6 col-lg-4 mb-4",
                        "title" : "Saisie de devis",
                        "detail" : "Vos cotations avec numérotation automatique",
                        "fa_icon" : "fa fa-file-signature",
                        "lite_also" : lite_also}' />

                    <checkboxcustom v-model="choices" :infos_input='{
                        "name" : "need_billing",
                        "class" : "eko-lite-block col-12 col-md-6 col-lg-4 mb-4",
                        "title" : "Saisie de factures",
                        "detail" : "Acomptes, avoirs et suivi des encaissements",
                        "fa_icon" : "fa fa-euro-sign",
                        "lite_also" : lite_also}' />

                    <checkboxcustom v-model="choices" :infos_input='{
                        "name" : "billing_by_mail",
                        "class" : "eko-lite-block col-12 col-md-6 col-lg-4 mb-4",
                        "title" : "Vos factures par email",
                        "detail" : "Les transmettre en un clic à vos clients",
                        "fa_icon" : "fa fa-envelope-open-text",
                        "lite_also" : lite_also}' />

                    <checkboxcustom v-model="choices" :infos_input='{
                        "name" : "export",
                        "class" : "eko-lite-block col-12 col-md-6 col-lg-4 mb-4",
                        "title" : "Export comptable",
                        "detail" : "A transmettre chaque fin de mois",
                        "fa_icon" : "fa fa-file-download",
                        "lite_also" : lite_also}' />

                    <checkboxcustom v-model="choices" :infos_input='{
                        "name" : "storage",
                        "class" : "eko-lite-block col-12 col-md-6 col-lg-4 mb-4",
                        "title" : "Stockage supplémentaire",
                        "detail" : "Pour vos pièces jointes et tous types de fichiers",
                        "fa_icon" : "fa fa-disc-drive",
                        "lite_also" : lite_also}' />

                    <checkboxcustom v-model="choices" :infos_input='{
                        "name" : "articles",
                        "class" : "eko-lite-block col-12 col-md-6 col-lg-4 mb-4",
                        "title" : "Bibliothèque articles",
                        "detail" : "Ne les saisir qu’une seule fois",
                        "fa_icon" : "fa fa-folder-open",
                        "lite_also" : lite_also}' />

                    <checkboxcustom v-model="choices" :infos_input='{
                        "name" : "need_docs",
                        "class" : "eko-lite-block col-12 col-md-6 col-lg-4 mb-4",
                        "title" : "Gestion documentaire",
                        "detail" : "Le suivi de vos pièces commerciales",
                        "fa_icon" : "fa fa-file-alt",
                        "lite_also" : lite_also}' />
                </div>


                <div v-if="lite_also" class="col-12">
                    <h4>Options uniquement disponibles avec eKo CRM</h4>
                </div>
                <div id="part-eko" class="row align-items-stretch mb-3">
                    <checkboxcustom v-model="choices" :infos_input='{
                        "name" : "need_stock",
                        "class" : "eko-crm-block col-12 col-md-6 col-lg-4 mb-4",
                        "title" : "Gestion de stock",
                        "detail" : "Bon de livraison, bibliothèque articles et inventaire",
                        "fa_icon" : "fa fa-box-full"}' />

                    <checkboxcustom v-model="choices" :infos_input='{
                        "name" : "need_providers",
                        "class" : "eko-crm-block col-12 col-md-6 col-lg-4 mb-4",
                        "title" : "Contacts fournisseurs ",
                        "detail" : "Pour gérer vos commandes et réception de commande",
                        "fa_icon" : "fa fa-address-card"}' />

                    <checkboxcustom v-model="choices" :infos_input='{
                        "name" : "need_birthday",
                        "class" : "eko-crm-block col-12 col-md-6 col-lg-4 mb-4",
                        "title" : "Anniversaires des contacts",
                        "detail" : "La petite attention qui fait toujours super plaisir",
                        "fa_icon" : "fa fa-birthday-cake"}' />

                    <checkboxcustom v-model="choices" :infos_input='{
                        "name" : "need_calendar",
                        "class" : "eko-crm-block col-12 col-md-6 col-lg-4 mb-4",
                        "title" : "Agenda partagé",
                        "detail" : "Synchronisable avec Microsoft Exchange®",
                        "fa_icon" : "fa fa-calendar-alt"}' />

                    <checkboxcustom v-model="choices" :infos_input='{
                        "name" : "need_mail",
                        "class" : "eko-crm-block col-12 col-md-6 col-lg-4 mb-4",
                        "title" : "Boîte mail",
                        "detail" : "Synchronisable avec Microsoft Exchange®",
                        "fa_icon" : "fa fa-envelope"}' />

                    <checkboxcustom v-model="choices" :infos_input='{
                        "name" : "need_chart",
                        "class" : "eko-crm-block col-12 col-md-6 col-lg-4 mb-4",
                        "title" : "Statistiques et décision",
                        "detail" : "Une vision claire de vos efforts sur du court, moyen, long terme",
                        "fa_icon" : "fa fa-chart-bar"}' />

                    <checkboxcustom v-model="choices" :infos_input='{
                        "name" : "need_tickets",
                        "class" : "eko-crm-block col-12 col-md-6 col-lg-4 mb-4",
                        "title" : "Tickets et gestion de tâches",
                        "detail" : "Suivi efficace des demandes clients",
                        "fa_icon" : "fa fa-ballot-check"}' />

                    <checkboxcustom v-model="choices" :infos_input='{
                        "name" : "need_gestion_employee",
                        "class" : "eko-crm-block col-12 col-md-6 col-lg-4 mb-4",
                        "title" : "Gestion des salariés",
                        "detail" : "Suivi des équipes",
                        "fa_icon" : "fa fa-users"}' />

                    <checkboxcustom v-model="choices" :infos_input='{
                        "name" : "need_gestion_projects",
                        "class" : "eko-crm-block col-12 col-md-6 col-lg-4 mb-4",
                        "title" : "Projets et chantiers",
                        "detail" : "Suivi des dossiers et de la rentabilité",
                        "fa_icon" : "fa fa-project-diagram"}' />

                    <checkboxcustom v-model="choices" :infos_input='{
                        "name" : "need_search_engine",
                        "class" : "eko-crm-block col-12 col-md-6 col-lg-4 mb-4",
                        "title" : "Recherche et ciblage",
                        "detail" : "Préparation des actions à mener",
                        "fa_icon" : "fa fa-file-search"}' />

                    <checkboxcustom v-model="choices" :infos_input='{
                        "name" : "need_category",
                        "class" : "eko-crm-block col-12 col-md-6 col-lg-4 mb-4",
                        "title" : "Catégories",
                        "detail" : "Créer des champs d’infos sur vos cibles",
                        "fa_icon" : "fa fa-tags"}' />

                    <checkboxcustom v-model="choices" :infos_input='{
                        "name" : "need_contracts_services",
                        "class" : "eko-crm-block col-12 col-md-6 col-lg-4 mb-4",
                        "title" : "Contrats de services",
                        "detail" : "Avec relance automatique à échéance",
                        "fa_icon" : "fa fa-business-time"}' />

                    <checkboxcustom v-model="choices" :infos_input='{
                        "name" : "more_storage",
                        "class" : "eko-crm-block col-12 col-md-6 col-lg-4 mb-4",
                        "title" : "Stockage étendu",
                        "detail" : "Stockez 5 ou 10 Go de pièces jointes complémentaires",
                        "fa_icon" : "fa fa-disc-drive"}' />

                    <checkboxcustom v-model="choices" :infos_input='{
                        "name" : "need_parc",
                        "class" : "eko-crm-block col-12 col-md-6 col-lg-4 mb-4",
                        "title" : "Parc et matériel",
                        "detail" : "Liste des équipements clients à maintenir",
                        "fa_icon" : "fa fa-network-wired"}' />

                </div>

                <div class="text-right col-12">
                    <button class="btn btn-choice-big" v-on:click="goNext();">Je continue</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "step9",
        data(){
          return{
              allSelected: false,
              choices: [],
              lite_also: false,
              possibleChoices: [
                  'memo', 'contact_individual', 'contact_pro', 'need_estimates', 'need_billing', 'billing_by_mail', 'export', 'storage', 'articles', 'need_docs', 'need_stock', 'need_providers', 'need_birthday', 'need_calendar', 'need_mail', 'need_chart', 'need_tickets', 'need_gestion_employee', 'need_gestion_projects', 'need_search_engine', 'need_category', 'need_contracts_services', 'more_storage', 'need_parc'
              ],
              eko_full:[
                  'need_stock', 'need_providers', 'need_birthday', 'need_calendar', 'need_mail', 'need_chart', 'need_tickets', 'need_gestion_employee', 'need_gestion_projects', 'need_search_engine', 'need_category', 'need_contracts_services', 'more_storage', 'need_parc'
              ]
          }
        },
        created(){
            this.$store.dispatch('setStep',10);
            this.lite_also = (this.currentDataEkoUsage.eko_type === 'eko-CRM-lite');

            if(this.isValueExist(this.currentDataEkoUsage.data_eko.choices)
                && this.currentDataEkoUsage.data_eko.choices.length > 0){
                this.allSelected = true;
            }
        },
        mounted(){
            if(this.isValueExist(this.currentDataEkoUsage.data_eko.choices) ){
                this.choices = this.currentDataEkoUsage.data_eko.choices;
            }
        },
        computed:{
        },
        methods: {
            selectAll: function(){
                let self = this;

                if(!this.allSelected){
                    this.choices = this.possibleChoices;
                    this.allSelected = true;

                } else{
                    this.choices = [];
                    this.allSelected = false;
                }
            },
            goNext: function() {

                let ekousage = this.currentDataEkoUsage;

                ekousage.data_eko.choices = this.choices;

                // If user had eko lite but choose options in eko full
                let testEkoFull = this.eko_full.some(el => this.choices.includes(el));
                if(testEkoFull){
                    ekousage.eko_type = 'eko-CRM';
                }

                if( !jQuery.isEmptyObject(this.choices) ){
                    this.$store.dispatch('setEkoStep', {
                        'url': '/userconf/companies/storeStepEko',
                        'data_eko': ekousage
                    });

                    // If we need the prefix step
                    if(this.choices.includes('need_estimates')
                        || this.choices.includes('need_billing') ){
                        this.$router.push({ path:'prefixes' });

                    } else if( this.choices.includes('need_calendar') ) {
                        this.$router.push({path: 'company-organization'});

                    } else if(ekousage.eko_type === 'eko-CRM'
                            && this.choices.includes('more_storage')){
                            this.$router.push({path: 'storage'});

                    } else if( this.choices.includes('need_parc') ){
                        this.$router.push({path: 'customer-equipments'});

                    } else if(this.choices.includes('need_contracts_services') ){
                        this.$router.push({ path:'type-contract' });

                    } else{
                        this.$router.push({ path:'infos-user' });
                    }
                }
            }
        }
    }
</script>

<style scoped>

</style>