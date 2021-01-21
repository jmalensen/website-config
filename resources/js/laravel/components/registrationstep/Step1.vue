<template>
    <div class="row">
        <div class="col-12 col-md-6 offset-md-3">
            <h1 class="m-0 text-center">
                Laissez-vous guider pour créer votre compte
            </h1>
            <p class="mb-3 text-center">
                <img class="img-fluid"
                     src="/images/logos/ekocrm.png"
                     alt="eKo CRM"
                     title="eKo CRM" style="width:200px;" />
            </p>

            <h3>Dans quel pays est implantée votre entreprise ?</h3>

            <form id="step1" method="POST" action="#" accept-charset="UTF-8" autocomplete="off">
                <input class="form-control" name="_token" type="hidden" value="gy3aaA6FpJqqu8WrObFpktIxjFVNYccIg7eaaJ2d">

                <div class="row">
                    <div class="col-12" id="country-choice">
                        <div class="col-12 col-md-6 text-center">
                            <div>
                                <a href="#"
                                   class="link-pays"
                                   id="france"
                                   @click.prevent="goNext('FRANCE')">
                                    <img src="/images/pays/france.png" alt="logo_france" style="width:350px" />
                                </a>
                            </div>
                            <div>
                                <a href="#"
                                   @click.prevent="goNext('FRANCE')">
                                    FRANCE
                                </a>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 text-center country">
                            <div>
                                <a href="#"
                                   class="link-pays"
                                   id="luxembourg"
                                   @click.prevent="goNext('LUXEMBOURG')">
                                    <img src="/images/pays/luxembourg.png" alt="logo_luxembourg" style="width:350px" />
                                </a>
                            </div>
                            <div>
                                <a href="#"
                                   @click.prevent="goNext('LUXEMBOURG')">
                                    LUXEMBOURG
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        name: "step1",
        created(){
            this.$store.dispatch('setStep',1);
            // this.$store.dispatch('fetchCompany').then(() => {
            //     this.loading = false;
            // });
        },
        computed:{
        },
        methods: {
            goNext: function(country) {
                let company = this.currentDataCompany;

                // If user change country
                if(company.country != country){
                    company = new Object();
                    company.country = country;
                    company.step = 4;
                }

                this.$store.dispatch('setCurrentDataCompany', company);
                this.$store.dispatch('setCompanyStep', {
                    'url': '/userconf/companies/storeCountry',
                    'company': company
                });
                this.$router.push({ path:'2' });
            }
        }
    }
</script>

<style scoped>

</style>