<template>
    <div class="col-12">
        <router-view></router-view>
    </div>
</template>

<script>
    export default {
        name: "mainappuserconf",
        mounted() {
            this.$store.commit('setAuthUser', window.auth_user);
        }
    }
</script>

<style scoped>

</style>