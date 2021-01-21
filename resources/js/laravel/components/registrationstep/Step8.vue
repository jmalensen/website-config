<template>
    <div class="row">
        <div class="d-none d-xl-block col-xl-2">
            <recapaside :company="currentDataCompany" :ekousage="currentDataEkoUsage"/>
        </div>
        <div class="col-12 col-xl-8">
            <div class="d-none d-md-block mb-2 p-2">
                <ariane :step="8" />
            </div>

            <div id="eko-choice" class="block block-rounded block-fx-shadow">
                <h1 class="mb-4">Les formules possibles pour eKo CRM</h1>

                <div>
                    <table class="col-12 table table-hover table-vcenter">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 50%"></th>
                            <th v-if="currentDataEkoUsage.data_eko.nb_user == 1" class="text-center" style="width: 25%">
                                <img src="/images/logos/ekocrmlite.png" alt="eKo CRM Lite" style="width:120px" />
                            </th>
                            <th class="text-center" style="width: 25%">
                                <img src="/images/logos/ekocrm.png" alt="eKo CRM Full" style="width:120px" />
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th class="" scope="row">
                                <ul class="p-0 m-0">
                                    <li>Accès sécurisé</li>
                                    <li>Sauvegarde de vos données</li>
                                    <li>Accès mobile et fixe 24/7</li>
                                    <li>Mises à jour</li>
                                    <li>Compatible PC/Mac/Linux</li>
                                    <li>Droits utilisateur</li>
                                </ul>
                            </th>
                            <td v-if="currentDataEkoUsage.data_eko.nb_user == 1" class="text-center">
                                <i class="text-success fa fa-check-circle"></i>
                            </td>
                            <td class="text-center">
                                <i class="text-success fa fa-check-circle"></i>
                            </td>
                        </tr>
                        <tr>
                            <th class="" scope="row">Mémo</th>
                            <td v-if="currentDataEkoUsage.data_eko.nb_user == 1" class="text-center">
                                <i class="text-success fa fa-check-circle"></i>
                            </td>
                            <td class="text-center">
                                <i class="text-success fa fa-check-circle"></i>
                            </td>
                        </tr>
                        <tr>
                            <th class="" scope="row">Gestion de contacts et des entreprises</th>
                            <td v-if="currentDataEkoUsage.data_eko.nb_user == 1" class="text-center">
                                <i class="text-success fa fa-check-circle"></i>
                            </td>
                            <td class="text-center">
                                <i class="text-success fa fa-check-circle"></i>
                            </td>
                        </tr>
                        <tr>
                            <th class="" scope="row">Gestion commerciale
                                <i class="text-warning fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="devis, facture, acompte, avoir, encaissement"></i>
                            </th>
                            <td v-if="currentDataEkoUsage.data_eko.nb_user == 1" class="text-center">
                                <i class="text-success fa fa-check-circle"></i>
                            </td>
                            <td class="text-center">
                                <i class="text-success fa fa-check-circle"></i>
                            </td>
                        </tr>
                        <tr>
                            <th class="" scope="row">Bibliothèque articles</th>
                            <td v-if="currentDataEkoUsage.data_eko.nb_user == 1" class="text-center">
                                <i class="text-success fa fa-check-circle"></i>
                            </td>
                            <td class="text-center">
                                <i class="text-success fa fa-check-circle"></i>
                            </td>
                        </tr>
                        <tr>
                            <th class="" scope="row">Gestion documentaire</th>
                            <td v-if="currentDataEkoUsage.data_eko.nb_user == 1" class="text-center">
                                <i class="text-success fa fa-check-circle"></i>
                            </td>
                            <td class="text-center">
                                <i class="text-success fa fa-check-circle"></i>
                            </td>
                        </tr>
                        <tr>
                            <th class="" scope="row">Envoi des documents commerciaux par mail</th>
                            <td v-if="currentDataEkoUsage.data_eko.nb_user == 1" class="text-center">
                                <i class="text-success fa fa-check-circle"></i>
                            </td>
                            <td class="text-center">
                                <i class="text-success fa fa-check-circle"></i>
                            </td>
                        </tr>
                        <tr>
                            <th class="" scope="row">Export comptable</th>
                            <td v-if="currentDataEkoUsage.data_eko.nb_user == 1" class="text-center">
                                <i class="text-success fa fa-check-circle"></i>
                            </td>
                            <td class="text-center">
                                <i class="text-success fa fa-check-circle"></i>
                            </td>
                        </tr>
                        <tr>
                            <th class="" scope="row">Stockage
                                <i class="text-warning fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="2 Go de données + 2 Go de pièces jointes mail"></i>
                            </th>
                            <td v-if="currentDataEkoUsage.data_eko.nb_user == 1" class="text-center">
                                <i class="text-success fa fa-check-circle"></i>
                            </td>
                            <td class="text-center">
                                <i class="text-success fa fa-check-circle"></i>
                            </td>
                        </tr>
                        <tr>
                            <th class="" scope="row">Gestion de contacts fournisseurs
                                <i class="text-warning fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="commande, bon de réception"></i>
                            </th>
                            <td v-if="currentDataEkoUsage.data_eko.nb_user == 1" class="text-center">
                            </td>
                            <td class="text-center">
                                <i class="text-success fa fa-check-circle"></i>
                            </td>
                        </tr>
                        <tr>
                            <th class="" scope="row">Dates anniversaires de contact</th>
                            <td v-if="currentDataEkoUsage.data_eko.nb_user == 1" class="text-center">
                            </td>
                            <td class="text-center">
                                <i class="text-success fa fa-check-circle"></i>
                            </td>
                        </tr>
                        <tr>
                            <th class="" scope="row">Gestion de stock
                                <i class="text-warning fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="bon de livraison, bibliothèque articles et inventaire"></i>
                            </th>
                            <td v-if="currentDataEkoUsage.data_eko.nb_user == 1" class="text-center">
                            </td>
                            <td class="text-center">
                                <i class="text-success fa fa-check-circle"></i>
                            </td>
                        </tr>
                        <tr>
                            <th class="" scope="row">Agenda partagé
                                <i class="text-warning fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="synchronisable avec Microsoft Exchange®"></i>
                            </th>
                            <td v-if="currentDataEkoUsage.data_eko.nb_user == 1" class="text-center">
                            </td>
                            <td class="text-center">
                                <i class="text-success fa fa-check-circle"></i>
                            </td>
                        </tr>
                        <tr>
                            <th class="" scope="row">Synchronisation des mails
                                <i class="text-warning fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Via Microsoft Exchange®"></i>
                            </th>
                            <td v-if="currentDataEkoUsage.data_eko.nb_user == 1" class="text-center">
                            </td>
                            <td class="text-center">
                                <i class="text-success fa fa-check-circle"></i>
                            </td>
                        </tr>
                        <tr>
                            <th class="" scope="row">Statistiques et aide à la décision</th>
                            <td v-if="currentDataEkoUsage.data_eko.nb_user == 1" class="text-center">
                            </td>
                            <td class="text-center">
                                <i class="text-success fa fa-check-circle"></i>
                            </td>
                        </tr>
                        <tr>
                            <th class="" scope="row">Tickets et gestion de tâches</th>
                            <td v-if="currentDataEkoUsage.data_eko.nb_user == 1" class="text-center">
                            </td>
                            <td class="text-center">
                                <i class="text-success fa fa-check-circle"></i>
                            </td>
                        </tr>
                        <tr>
                            <th class="" scope="row">Suivi des interactions
                                <i class="text-warning fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="prospects, clients et fournisseurs"></i>
                            </th>
                            <td v-if="currentDataEkoUsage.data_eko.nb_user == 1" class="text-center">
                            </td>
                            <td class="text-center">
                                <i class="text-success fa fa-check-circle"></i>
                            </td>
                        </tr>
                        <tr>
                            <th class="" scope="row">Gestion des salariés</th>
                            <td v-if="currentDataEkoUsage.data_eko.nb_user == 1" class="text-center">
                            </td>
                            <td class="text-center">
                                <i class="text-success fa fa-check-circle"></i>
                            </td>
                        </tr>
                        <tr>
                            <th class="" scope="row">Gestion de projets et chantiers</th>
                            <td v-if="currentDataEkoUsage.data_eko.nb_user == 1" class="text-center">
                            </td>
                            <td class="text-center">
                                <i class="text-success fa fa-check-circle"></i>
                            </td>
                        </tr>
                        <tr>
                            <th class="" scope="row">Moteur de recherche et ciblage</th>
                            <td v-if="currentDataEkoUsage.data_eko.nb_user == 1" class="text-center">
                            </td>
                            <td class="text-center">
                                <i class="text-success fa fa-check-circle"></i>
                            </td>
                        </tr>
                        <tr>
                            <th class="" scope="row"></th>
                            <td v-if="currentDataEkoUsage.data_eko.nb_user == 1" class="text-center">
                                <button class="btn btn-choice-big" v-on:click="goNext('eko-CRM-lite');">Je choisis eKo CRM Lite</button>
                            </td>
                            <td class="text-center">
                                <button class="btn btn-choice-big" v-on:click="goNext('eko-CRM');">
                                    <span v-if="currentDataEkoUsage.data_eko.nb_user == 1">Je choisis eKo CRM</span>
                                    <span v-else>Je configure mon eKo CRM</span>
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        name: "step8",
        created(){
            this.$store.dispatch('setStep',8);
            // this.$store.dispatch('fetchCompany').then(() => {
            //     this.loading = false;
            // });
        },
        computed:{
        },
        methods: {
            goNext: function(eko_type) {
                let ekousage = this.currentDataEkoUsage;
                ekousage.eko_type = eko_type;

                this.$store.dispatch('setCurrentDataEkoUsage',ekousage);
                this.$store.dispatch('setEkoStep', {
                    'url': '/userconf/companies/storeEkoChoice',
                    'data_eko': ekousage
                });
                this.$router.push({ path:'9' });
            }
        }
    }
</script>

<style scoped>

</style>