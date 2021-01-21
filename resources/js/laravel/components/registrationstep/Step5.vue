<template>
    <div class="row">
        <div class="d-none d-xl-block col-xl-2">
            <recapaside :company="currentDataCompany" :ekousage="currentDataEkoUsage"/>
        </div>
        <div class="col-12 col-xl-6 offset-xl-1 mt-4">
            <div class="d-none d-md-block mb-2 p-2">
                <ariane :step="5" />
            </div>
            <div class="row block block-rounded block-fx-shadow p-3">
                <h1 class="mb-4">Dîtes-nous en plus sur votre entreprise</h1>

                <div class="col-12 pt-2">
                    <form @submit.prevent="goNext()" id="infos_company" method="POST" accept-charset="UTF-8" autocomplete="off">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="form-group">
                                    <label for="legal_form">Forme juridique&nbsp;<span class="text-danger">*</span></label>
                                    <select v-model="legal_formS" :value="legal_formS" name="legal_form" id="legal_form" class="js-select2 form-control">
                                        <option v-if="currentDataCompany.country == 'LUXEMBOURG'"
                                                v-for="legal_form in legal_form_lu"
                                                :value="legal_form">
                                            {{ legal_form }}
                                        </option>
                                        <option v-if="currentDataCompany.country == 'FRANCE'"
                                                v-for="legal_form in legal_form_fr"
                                                :value="legal_form">
                                            {{ legal_form }}
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div v-if="currentDataCompany.country == 'FRANCE' || currentDataCompany.country == 'LUXEMBOURG'" class="col-12">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <inputformgroup :infos_input='{
                                        "name" : "share_capital",
                                        "text" : "Capital (en €)",
                                        "type" : "text",
                                        "value" : currentDataCompany.share_capital,
                                        "placeholder" : "Ex : 15000 ..."}' />
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <inputformgroup :infos_input='{
                                        "name" : "tva_intracom",
                                        "text" : "TVA Intracommunautaire",
                                        "type" : "text",
                                        "value" : currentDataCompany.tva_intracom,
                                        "placeholder" : "Ex : FR 12486487956, LU 23486487956 ..."}' />
                                    </div>
                                </div>
                            </div>

                            <div v-if="currentDataCompany.country == 'FRANCE'" class="col-12">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <inputformgroup :infos_input='{
                                        "name" : "city_registration",
                                        "text" : "Ville enregistrement du registre du commerce",
                                        "type" : "text",
                                        "value" : currentDataCompany.city_registration,
                                        "placeholder" : "Ex : Metz ..."}' />
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <inputformgroup :infos_input='{
                                        "name" : "job_number",
                                        "text" : "Numéro du répertoire des métiers (le cas échéant)",
                                        "type" : "text",
                                        "value" : currentDataCompany.job_number,
                                        "placeholder" : "Votre numéro ..."}' />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <inputformgroup :infos_input='{
                                        "name" : "siren",
                                        "text" : "RCS - SIREN (9 chiffres)",
                                        "type" : "text",
                                        "value" : currentDataCompany.siren,
                                        "placeholder" : "Votre numéro de SIREN ..."}' />
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <inputformgroup :infos_input='{
                                        "name" : "siret",
                                        "text" : "SIRET (14 chiffres)",
                                        "type" : "text",
                                        "value" : currentDataCompany.siret,
                                        "placeholder" : "Votre numéro de SIRET ..."}' />
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <inputformgroup :infos_input='{
                                        "name" : "naf_code",
                                        "text" : "Code NAF",
                                        "type" : "text",
                                        "value" : currentDataCompany.naf_code,
                                        "placeholder" : "Votre code NAF ..."}' />
                                    </div>
                                </div>
                            </div>

                            <div v-if="currentDataCompany.country == 'LUXEMBOURG'" class="col-12">
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <inputformgroup :infos_input='{
                                        "name" : "rcs_number",
                                        "text" : "Numéro RCS",
                                        "type" : "text",
                                        "value" : currentDataCompany.rcs_number,
                                        "placeholder" : "Ex : 654 987 321..."}' />
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <inputformgroup :infos_input='{
                                        "name" : "number_auth_establishment",
                                        "text" : "Numéro autorisation",
                                        "type" : "text",
                                        "value" : currentDataCompany.number_auth_establishment,
                                        "placeholder" : "Votre numéro ..."}' />
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <inputformgroup :infos_input='{
                                        "name" : "nace_code",
                                        "text" : "Code NACE",
                                        "type" : "text",
                                        "value" : currentDataCompany.nace_code,
                                        "placeholder" : "Votre code NACE ..."}' />
                                    </div>

                                    <div class="col-12 text-center">
                                        <div class="form-group row items-push mb-0">
                                            <div class="custom-check-eko col-12 col-md-6">
                                                <div class="custom-control custom-block custom-control-primary mb-1">
                                                    <input type="radio"
                                                           class="custom-control-input"
                                                           id="job_type"
                                                           name="job_type"
                                                           value="Artisan"
                                                           v-model="job_type">
                                                    <label class="custom-control-label" for="job_type">
                                                    <span class="d-block font-w400 text-center my-3">
                                                        <span class="font-size-h4 font-w600">
                                                            Artisan
                                                        </span>
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
                                                           id="job_type2"
                                                           name="job_type"
                                                           value="Commerçant en nom propre"
                                                           v-model="job_type">
                                                    <label class="custom-control-label" for="job_type2">
                                                    <span class="d-block font-w400 text-center my-3">
                                                        <span class="font-size-h4 font-w600">
                                                            Commerçant en nom propre
                                                        </span>
                                                    </span>
                                                    </label>
                                                    <span class="custom-block-indicator">
                                                        <i class="fa fa-check"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-2">
                                        <img src="/images/logos/monstreko2.png" alt="Aide monstrelio" style="width:80px" />
                                    </div>
                                    <div class="col-10">
                                        <p class="text-danger">
                                            Ces informations vont nous permettre de créer la trame de vos documents commerciaux. En cas de non-respect des mentions obligatoires vous encourez une amende de 1500 euros, 3000 euros en cas de récidive.
                                        </p>
                                    </div>
                                </div>
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
        name: "step5",
        data(){
            return {
                job_type: null,
                legal_formS: null,
                legal_form_lu : [
                    'Entreprise individuelle',
                    'Sàrl Unipersonnelle',
                    'Sàrl Société à responsabilité limitée',
                    'SA Société Anonyme',
                    'SNC Société en nom collectif',
                    'SCS Société en Commandite Simple',
                    'Société Coopérative',
                    'GIE Groupement d\'Intérêt Economique',
                    'SC Société Civile',
                    'SCI Société Civile Immobilière',
                    'SE Société Européenne',
                    'Société en Commandite par Actions',
                    'Groupement Européen d\'Intérêt Economique'
                ],
                legal_form_fr : [
                    'Artisan Commerçant',
                    'Commerçant',
                    'Artisan',
                    'Officier public ou ministériel',
                    'Profession libérale',
                    'Exploitant agricole',
                    'Agent commercial',
                    'Associé Gérant de société',
                    '(Autre) personne physique',
                    'Indivision',
                    'Société créée de fait',
                    'Société en participation',
                    'Paroisse hors zone concordataire',
                    'Autre groupement de droit privé non doté de la personnalité morale',
                    'Personne morale de droit étranger, immatriculée au RCS',
                    'Personne morale de droit étranger, non immatriculée au RCS',
                    'Etablissement public ou régie à caractère industriel ou commercial',
                    'Société coopérative commerciale particulière',
                    'Société en nom collectif',
                    'Société en commandite',
                    'Société à responsabilité limitée (SARL)',
                    'Société anonyme à conseil d\'administration',
                    'Société anonyme à directoire',
                    'Société par actions simplifiée',
                    'Entreprise Unipersonnelle à Responsabilité Limitée (EURL)',
                    'Caisse d\'épargne et de prévoyance',
                    'Groupement d\'intérêt économique (GIE)',
                    'Société coopérative agricole',
                    'Société non commerciale d\'assurances',
                    'Société civile',
                    'Autres personnes de droit privé inscrites au RCS',
                    'Administration de l\'état',
                    'Collectivité territoriale',
                    'Etablissement public administratif',
                    'Autre personne morale de droit public administratif',
                    'Organisme gérant régime de protection social à adhésion obligatoire',
                    'Organisme mutualiste',
                    'Comité d\'entreprise',
                    'Organisme professionnel',
                    'Organisme de retraite à adhésion non obligatoire',
                    'Syndicat de propriétaires',
                    'Association loi 1901 ou assimilé',
                    'Fondation',
                    'Autre personne morale de droit privé',
                    'Société anonyme d\'économie mixte à conseil d\'administration',
                    'Société par actions simplifiée unipersonnelle',
                    'Micro Entreprise',
                    'Société en nom collectif'
                ]
            }
        },
        created(){
            this.$store.dispatch('setStep',5);
        },
        mounted(){
            Dashmix.helpers('select2');

            if(this.isValueExist(this.currentDataCompany.job_type) ){
                this.job_type = this.currentDataCompany.job_type;
            }

            if(this.isValueExist(this.currentDataCompany.legal_form) ){
                this.legal_formS = this.currentDataCompany.legal_form;
            }

            $('#different-local').on('change', function(){
                if( $(this).find('input[type=checkbox]').prop('checked') ) {
                    $('#local-address').slideDown();
                } else{
                    $('#local-address').slideUp();
                }
            });

            $("#infos_company").validate({
                rules: {
                    legal_form:{
                        required: true,
                        minlength:0,
                        maxlength:255
                    },
                    rcs_number: {
                        minlength:0,
                        maxlength:10
                    },
                    share_capital: {
                        minlength:0,
                        maxlength:255
                    },
                    tva_intracom: {
                        minlength:0,
                        maxlength:255
                    },
                    city_registration: {
                        minlength:0,
                        maxlength:255
                    },
                    job_number: {
                        minlength:0,
                        maxlength:255
                    },
                    number_auth_establishment: {
                        minlength:0,
                        maxlength:255
                    }
                },
                messages: {
                    legal_form: {
                        required: "Veuillez saisir une forme juridique !",
                        minlength: "Veuillez saisir plus d'un caractère !",
                        maxlength: "Veuillez saisir moins de 255 caractères !"
                    },
                    rcs_number: {
                        minlength: "Veuillez saisir plus d'un caractère !",
                        maxlength: "Veuillez saisir moins de 10 caractères !"
                    },
                    share_capital: {
                        minlength: "Veuillez saisir plus d'un caractère !",
                        maxlength: "Veuillez saisir moins de 255 caractères !"
                    },
                    tva_intracom: {
                        minlength: "Veuillez saisir plus d'un caractère !",
                        maxlength: "Veuillez saisir moins de 255 caractères !"
                    },
                    city_registration: {
                        minlength: "Veuillez saisir plus d'un caractère !",
                        maxlength: "Veuillez saisir moins de 255 caractères !"
                    },
                    job_number: {
                        minlength: "Veuillez saisir plus d'un caractère !",
                        maxlength: "Veuillez saisir moins de 255 caractères !"
                    },
                    number_auth_establishment: {
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

                    // Required value
                    company.legal_form = this.legal_formS;

                    // Optional values
                    let rcs_number = $('#rcs_number').val();
                    let share_capital = $('#share_capital').val();
                    let tva_intracom = $('#tva_intracom').val();
                    let city_registration = $('#city_registration').val();
                    let job_number = $('#job_number').val();
                    let number_auth_establishment = $('#number_auth_establishment').val();
                    let job_type = this.job_type;
                    let siren = $('#siren').val();
                    let siret = $('#siret').val();
                    let naf_code = $('#naf_code').val();
                    let nace_code = $('#nace_code').val();

                    if(rcs_number != ''){
                        company.rcs_number = rcs_number;
                    }
                    if(share_capital != ''){
                        company.share_capital = share_capital;
                    }
                    if(tva_intracom != ''){
                        company.tva_intracom = tva_intracom;
                    }
                    if(city_registration != ''){
                        company.city_registration = city_registration;
                    }
                    if(job_number != ''){
                        company.job_number = job_number;
                    }
                    if(number_auth_establishment != ''){
                        company.number_auth_establishment = number_auth_establishment;
                    }
                    if(job_type != ''){
                        company.job_type = job_type;
                    }
                    if(siren != ''){
                        company.siren = siren;
                    }
                    if(siret != ''){
                        company.siret = siret;
                    }
                    if(naf_code != ''){
                        company.naf_code = naf_code;
                    }
                    if(nace_code != ''){
                        company.nace_code = nace_code;
                    }
                    company.step = 6;

                    this.$store.dispatch('setCompanyStep', {
                        'url': '/userconf/companies/storeLegal2',
                        'company': company
                    });

                    this.$router.push({path: '6'});
                }
            }
        }
    }
</script>

<style scoped>

</style>