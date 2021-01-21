<template>
    <div class="row">
        <div class="d-none d-xl-block col-xl-2">
            <recapaside :company="currentDataCompany" :ekousage="currentDataEkoUsage"/>
        </div>
        <div class="col-12 col-xl-6 offset-xl-1 mt-4">
            <div class="d-none d-md-block mb-2 p-2">
                <ariane :step="4" />
            </div>
            <div class="row block block-rounded block-fx-shadow p-3">
                <h1 class="mb-4">
                    Transmettez-nous votre logo !
                </h1>

                <div class="col-12 col-md-6">
                    <input class="" autocomplete="off" name="logo" type="file" id="logo">
                    <p v-if="errorFile != ''" class="mb-0 text-danger">{{ errorFile }}</p>

                    <p class="text-muted mt-1">Le logo doit être en png ou jpg et ne doit pas excéder 2Mo en taille.</p>

                    <div class="text-right">
                        <button class="btn btn-choice-big" v-on:click="goNextSLogo();">Je n'ai pas de logo</button>
                    </div>
                </div>

                <div class="d-none d-md-block col-md-6 text-right">
                    <p>
                        <img class="img-fluid"
                             src="/images/visus/logo.png"
                             alt="Logo"
                             title="Logo" />
                    </p>
                </div>

                <div class="col-12 text-right">
                    <button v-if="currentDataCompany.path_logo" class="btn btn-choice-big mr-4" v-on:click="goNextSLogo();">J'ai déjà renseigné mon logo</button>
                    <button class="btn btn-choice-big" v-on:click="goNext();">Je continue</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "step4",
        data(){
          return {
              errorFile : '',
              fileReading : null
          }
        },
        created(){
            this.$store.dispatch('setStep',4);
            // this.$store.dispatch('fetchCompany').then(() => {
            //     this.loading = false;
            // });
        },
        mounted(){
            let self = this;
            this.fileReading = new FileReader();

            $('#logo').on('change', function(){
                self.fileReading.readAsDataURL( $(this).prop('files')[0] );

                self.fileReading.onload = function () {
                    if($('#logo').prop('files')[0].type != 'image/png'
                        && $('#logo').prop('files')[0].type != 'image/jpeg' ){
                        self.errorFile = 'L\'image n\'est pas au bon format (seuls jpg, png sont acceptés)!';
                    }
                    else if($('#logo').prop('files')[0].size >= 2200000 ){
                        self.errorFile = 'L\'image est de taille trop importante (2Mo max)!';
                    }
                    else{
                        self.errorFile = '';
                    }

                }.bind(self);
                self.fileReading.onerror = function (error) {
                };
            });
        },
        computed:{
        },
        methods: {
            goNext: function() {
                // console.log('état avant vérif', this.fileReading.readyState);
                let logo = {};
                let company = this.currentDataCompany;

                if(this.fileReading.readyState != 2){
                    this.errorFile = 'Aucune image n\'a été sélectionnée ou l\'image n\'est pas encore chargée !';

                } else{

                    if( ($('#logo').prop('files')[0].type == 'image/png'
                        || $('#logo').prop('files')[0].type == 'image/jpeg')
                        && $('#logo').prop('files')[0].size < 2200000
                    ){

                        logo = {
                            base64: this.fileReading.result,
                            filename: $('#logo').prop('files')[0].name
                        };
                        company.logo = logo;
                        company.step = 5;

                        // console.log('état après vérif', this.fileReading.readyState);
                        this.$store.dispatch('setCurrentDataCompany', company);
                        this.$store.dispatch('setCompanyStep', {
                            'url': '/userconf/companies/storeLogo',
                            'company': company
                        });
                        this.$router.push({ path:'5' });
                    }

                }
            },
            goNextSLogo: function() {
                this.$router.push({ path:'5' });
            }
        }
    }
</script>

<style scoped>

</style>