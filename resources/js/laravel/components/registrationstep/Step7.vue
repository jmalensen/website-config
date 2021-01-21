<template>
    <div class="row">
        <div class="d-none d-xl-block col-xl-2">
            <recapaside :company="currentDataCompany" :ekousage="currentDataEkoUsage"/>
        </div>
        <div class="col-12 col-xl-6 offset-xl-1 mt-4">
            <div class="d-none d-md-block mb-2 p-2">
                <ariane :step="7" />
            </div>
            <div class="row block block-rounded block-fx-shadow p-3">
                <h1 class="mb-4">Combien de personnes vont utiliser eKo CRM ?</h1>

                <div class="col-12 pt-2">
                    <form @submit.prevent="goNext()" id="infos_company" method="POST" accept-charset="UTF-8" autocomplete="off" >
                        <div class="row">

                            <div class="text-center col-12 mb-2">
                                <input type="text"
                                       id="nb_user"
                                       class="js-range-slider"
                                       :value="nb_user" />
                            </div>

                            <div class="col-12 col-md-4 offset-md-4 text-left">
                                <div class="form-group">
                                    <label for="nb_user_input" class="">
                                        Nombre d'utilisateurs
                                    </label>
                                    <input class="form-control"
                                           autocomplete="off"
                                           autofocus="autofocus"
                                           placeholder="Ex : 1..."
                                           v-model="nb_user"
                                           type="number"
                                           id="nb_user_input">
                                </div>
                            </div>

                            <div v-if="nb_user > 1" class="col-12">
                                <div class="row">
                                    <div class="col-2">
                                        <img src="/images/logos/monstreko2.png" alt="Aide monstrelio" style="width:80px" />
                                    </div>
                                    <div class="col-10">
                                        <p class="text-danger">
                                            Seul eKo CRM est disponible avec 2 utilisateurs et plus !
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 text-center mt-4">
                                <p>
                                    <img class="img-fluid"
                                         :src="image.source"
                                         :alt="image.altText"
                                         :style="image.style" />
                                </p>
                            </div>

                            <div class="text-right col-12">
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
        name: "step7",
        data(){
            return {
                nb_user : 1
            }
        },
        created(){
            this.$store.dispatch('setStep',7);
        },
        mounted(){
            let self = this;

            if(this.isValueExist(this.currentDataEkoUsage.data_eko.nb_user) ){
                this.nb_user = this.currentDataEkoUsage.data_eko.nb_user;
            }

            $(".js-range-slider").ionRangeSlider({
                skin: "round",
                type: "single",
                min: 1,
                max: 50,
                from: this.nb_user,
                onChange: function (data) {
                    self.nb_user = data.from;
                }
            });
            let my_range = $(".js-range-slider").data("ionRangeSlider");

            $('#nb_user_input').on('change', function(){
                let value = $(this).val();

                my_range.update({
                    from: value,
                });
            });
        },
        computed:{
            image: function(){
                if(this.nb_user == 1){
                    return {
                        source: '/images/logos/monstreko.png',
                        altText: 'Exemple 1 utilisateur',
                        style: 'width:200px;'
                    };
                }
                if(this.nb_user == 2){
                    return {
                        source: '/images/visus/2monstr.png',
                        altText: 'Exemple 2 utilisateurs',
                        style: 'width:300px;'
                    };
                }
                if(this.nb_user == 3){
                    return {
                        source: '/images/visus/3monstr.png',
                        altText: 'Exemple 3 utilisateurs',
                        style: 'width:400px;'
                    };
                }
                if(this.nb_user == 4){
                    return {
                        source: '/images/visus/4monstr.png',
                        altText: 'Exemple 4 utilisateurs',
                        style: 'width:450px;'
                    };
                }
                if(this.nb_user == 5){
                    return {
                        source: '/images/visus/5monstr.png',
                        altText: 'Exemple 5 utilisateurs',
                        style: 'width:500px;'
                    };
                }
                if(this.nb_user >= 6){
                    return {
                        source: '/images/visus/monstr.png',
                        altText: 'Exemple plusieurs utilisateurs',
                        style: 'width:550px;'
                    };
                }
            }
        },
        methods:{
            goNext: function() {
                let nbUser = $('#nb_user').val();

                let ekousage = this.currentDataEkoUsage;
                ekousage.data_eko.nb_user = nbUser;

                // Eko formula depends on nb_user
                if(this.nb_user < 2){
                    this.$store.dispatch('setCurrentDataEkoUsage',ekousage);
                    this.$store.dispatch('setEkoStep', {
                        'url': '/userconf/companies/storeStepEko',
                        'data_eko': ekousage
                    });

                    this.$router.push({ path:'8' });

                } else{
                    ekousage.eko_type = 'eko-CRM';
                    this.$store.dispatch('setCurrentDataEkoUsage',ekousage);
                    this.$store.dispatch('setEkoStep', {
                        'url': '/userconf/companies/storeStepEko',
                        'data_eko': ekousage
                    });

                    this.$router.push({ path:'9' });
                }
            }
        }
    }
</script>

<style scoped>

</style>