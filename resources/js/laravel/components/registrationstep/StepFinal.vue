<template>
    <div class="row">
        <div class="col-12 offset-md-3 col-md-6 text-center">
            <div class="row block block-rounded block-fx-shadow p-3">
                <div class="col-12">
                    <h3>Merci de votre patience</h3>

                    <h3>Un de nos commerciaux reviendra vers vous sous peu !</h3>

                    <p>
                        <img src="/images/logos/monstreko4.png" alt="Aide monstrelio" style="width:150px" />
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "step-final",
        created(){
            this.$store.dispatch('setStep','final');
        },
        computed:{
        },
        methods: {
        }
    }
</script>

<style scoped>

</style>