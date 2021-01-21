<template>
    <div class="row">
        <div class="d-none d-xl-block col-xl-2">
            <recapaside :company="currentDataCompany" :ekousage="currentDataEkoUsage"/>
        </div>
        <div class="col-12 col-xl-6 offset-xl-1 mt-4">
            <div class="d-none d-md-block mb-2 p-2">
                <ariane :step="3" />
            </div>
            <div class="row block block-rounded block-fx-shadow p-3">
                <h1 class="mb-4">
                    Dîtes-nous en plus sur votre entreprise
                </h1>

                <div class="col-12 pt-2">
                    <form @submit.prevent="goNext()" id="infos_company" method="POST" accept-charset="UTF-8" autocomplete="off">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <inputformgroup :infos_input='{
                                "name" : "social_reason",
                                "text" : "Raison sociale",
                                "type" : "text",
                                "required" : true,
                                "value" : currentDataCompany.social_reason,
                                "placeholder" : "Votre raison sociale"}' />
                            </div>
                            <div class="col-12 col-lg-6">
                                <inputformgroup :infos_input='{
                                "name" : "commercial_name",
                                "text" : "Nom commercial",
                                "type" : "text",
                                "value" : currentDataCompany.commercial_name,
                                "placeholder" : "Votre nom commercial"}' />
                            </div>

                            <div class="col-12 col-lg-6">
                                <inputformgroup :infos_input='{
                                    "name" : "address_line1",
                                    "text" : "Adresse : numéro et rue",
                                    "type" : "text",
                                    "required" : true,
                                    "value" : currentDataCompany.address_line1,
                                    "placeholder" : "Ex : 1 rue de la seine"}' />
                            </div>
                            <div class="col-12 col-lg-6">
                                <inputformgroup :infos_input='{
                                    "name" : "address_line2",
                                    "text" : "Complément adresse : ZI, ZA...",
                                    "type" : "text",
                                    "value" : currentDataCompany.address_line2,
                                    "placeholder" : "Ex : ZA Ouest..."}' />
                            </div>

                            <div class="col-12 col-lg-3">
                                <inputformgroup :infos_input='{
                                    "name" : "zipcode",
                                    "text" : "Code postal",
                                    "type" : "text",
                                    "required" : true,
                                    "value" : currentDataCompany.zipcode,
                                    "placeholder" : "Ex : Votre code postal..."}' />
                            </div>

                            <div class="col-12 col-lg-9">
                                <inputformgroup :infos_input='{
                                    "name" : "city",
                                    "text" : "Ville",
                                    "type" : "text",
                                    "required" : true,
                                    "value" : currentDataCompany.city,
                                    "placeholder" : "Ex : Votre ville..."}' />
                            </div>

                            <div class="col-12">
                                <div id="different-local" class="form-group">
                                    <div class="custom-control custom-checkbox custom-control-primary">
                                        <input id="hidden_1" class="form-control" type="hidden" value="0">
                                        <input class="custom-control-input form-control" autocomplete="off" name="1" type="checkbox" value="1" id="1">
                                        <label for="1" class="custom-control-label ">Si l'adresse de vos locaux est différente de celle du siège social</label>
                                    </div>
                                </div>
                            </div>

                            <div id="local-address" class="col-12">
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <inputformgroup :infos_input='{
                                        "name" : "local_address_line1",
                                        "text" : "Adresse (locaux)",
                                        "type" : "text",
                                        "value" : currentDataCompany.local_address_line1,
                                        "placeholder" : "Ex : 1 rue de la seine"}' />
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <inputformgroup :infos_input='{
                                        "name" : "local_address_line2",
                                        "text" : "Complément adresse (locaux)",
                                        "type" : "text",
                                        "value" : currentDataCompany.local_address_line2,
                                        "placeholder" : "Ex : ZA Ouest..."}' />
                                    </div>

                                    <div class="col-12 col-lg-3">
                                        <inputformgroup :infos_input='{
                                        "name" : "local_zipcode",
                                        "text" : "Code postal (locaux)",
                                        "type" : "text",
                                        "value" : currentDataCompany.local_zipcode,
                                        "placeholder" : "Ex : Votre code postal..."}' />
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <inputformgroup :infos_input='{
                                        "name" : "local_city",
                                        "text" : "Ville (locaux)",
                                        "type" : "text",
                                        "value" : currentDataCompany.local_city,
                                        "placeholder" : "Ex : Votre ville..."}' />
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-4">
                                <inputformgroup :infos_input='{
                                    "name" : "phone",
                                    "text" : "Téléphone",
                                    "type" : "text",
                                    "required" : true,
                                    "value" : currentDataCompany.phone,
                                    "placeholder" : "Ex : Votre téléphone..."}' />
                            </div>
                            <div class="col-12 col-lg-4">
                                <inputformgroup :infos_input='{
                                    "name" : "email",
                                    "text" : "Email",
                                    "type" : "email",
                                    "required" : true,
                                    "value" : currentDataCompany.email,
                                    "placeholder" : "Ex : monemail@gmail.com ..."}' />
                            </div>
                            <div class="col-12 col-lg-4">
                                <inputformgroup :infos_input='{
                                    "name" : "website",
                                    "text" : "Site internet",
                                    "type" : "text",
                                    "value" : currentDataCompany.website,
                                    "placeholder" : "Ex : www.monsite.com ..."}' />
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
        name: "step3",
        data(){
            return {
                iti : null
            }
        },
        created(){
            this.$store.dispatch('setStep',3);
            // this.$store.dispatch('fetchCompany').then(() => {
            //     this.loading = false;
            // });
        },
        mounted(){

            let inputPhone = document.querySelector("#phone");
            intlTelInput(inputPhone);
            inputPhone.addEventListener('keyup', formatIntlTelInput);
            inputPhone.addEventListener('change', formatIntlTelInput);

            $('#different-local').on('change', function(){
                if( $(this).find('input[type=checkbox]').prop('checked') ) {
                    $('#local-address').slideDown();
                } else{
                    $('#local-address').slideUp();
                }
            });


            $.validator.addMethod('validUrl', function(value, element) {
                let url = $.validator.methods.url.bind(this);
                return url(value, element) || url('http://' + value, element) || url('https://' + value, element);
            }, 'Please enter a valid URL');


            $("#infos_company").validate({
                rules: {
                    social_reason:{
                        required: true,
                        minlength:0,
                        maxlength:255
                    },
                    address_line1: {
                        required: true,
                        minlength:0,
                        maxlength:255
                    },
                    zipcode: {
                        required: true,
                        minlength:0,
                        maxlength:255
                    },
                    city: {
                        required: true,
                        minlength:0,
                        maxlength:255
                    },
                    phone: {
                        required: true,
                        minlength:0,
                        maxlength:255
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    website: {
                        validUrl: true
                    }
                },
                messages: {
                    social_reason: {
                        required: "Veuillez saisir une raison sociale !",
                        minlength: "Veuillez saisir plus d'un caractère !",
                        maxlength: "Veuillez saisir moins de 255 caractères !"
                    },
                    address_line1: {
                        required: "Veuillez saisir une adresse !",
                        minlength: "Veuillez saisir plus d'un caractère !",
                        maxlength: "Veuillez saisir moins de 255 caractères !"
                    },
                    zipcode: {
                        required: "Veuillez saisir un code postal !",
                        minlength: "Veuillez saisir plus d'un caractère !",
                        maxlength: "Veuillez saisir moins de 255 caractères !"
                    },
                    city: {
                        required: "Veuillez saisir une ville !",
                        minlength: "Veuillez saisir plus d'un caractère !",
                        maxlength: "Veuillez saisir moins de 255 caractères !"
                    },
                    phone: {
                        required: "Veuillez saisir un numéro de téléphone !",
                        minlength: "Veuillez saisir plus d'un caractère !",
                        maxlength: "Veuillez saisir moins de 255 caractères !"
                    },
                    email: {
                        required: "Veuillez saisir une adresse email !",
                        email: "Veuillez saisir une adresse email valide !"
                    },
                    website: {
                        validUrl: "Veuillez saisir une URL correcte !"
                    }
                },
            });
        },
        computed:{
        },
        methods: {
            goNext: function() {

                $.validator.addMethod('validUrl', function(value, element) {
                    let url = $.validator.methods.url.bind(this);
                    return url(value, element) || url('http://' + value, element) || url('https://' + value, element);
                }, 'Please enter a valid URL');

                let validator = $("#infos_company").validate();
                let formValid = validator.form();

                if(formValid){
                    let company = this.currentDataCompany;

                    // Required values
                    company.social_reason = $('#social_reason').val();
                    company.commercial_name = $('#commercial_name').val();
                    company.address_line1 = $('#address_line1').val();
                    company.zipcode = $('#zipcode').val();
                    company.city = $('#city').val();

                    // console.log(this.iti);
                    // company.phone = this.iti.getNumber();
                    company.phone = $('#phone').val();
                    company.email = $('#email').val();

                    // Optional values
                    let address_line2 = $('#address_line2').val();
                    let local_address_line1 = $('#local_address_line1').val();
                    let local_address_line2 = $('#local_address_line2').val();
                    let local_zipcode = $('#local_zipcode').val();
                    let local_city = $('#local_city').val();
                    let website = $('#website').val();
                    if( address_line2 != '' ){
                        company.address_line2 = address_line2;
                    }
                    if( local_address_line1 != '' ){
                        company.local_address_line1 = local_address_line1;
                    }
                    if( local_address_line2 != '' ){
                        company.local_address_line2 = local_address_line2;
                    }
                    if( local_zipcode != '' ){
                        company.local_zipcode = local_zipcode;
                    }
                    if( local_city != '' ){
                        company.local_city = local_city;
                    }
                    if( website != '' ){
                        company.website = website;
                    }
                    company.step = 4;

                    this.$store.dispatch('setCurrentDataCompany', company);
                    this.$store.dispatch('setCompanyStep', {
                        'url': '/userconf/companies/storeLegal1',
                        'company': company
                    });
                    this.$router.push({ path:'4' });
                }
            }
        }
    }
</script>

<style scoped>

</style>