<template>
    <div>
        Etapes :
        <p class="m-0 text-warning">1 > 2 >
            <span :class="isValueExist(step) && (step < 3) ? 'text-muted' : ''">3 ></span>
            <span :class="isValueExist(step) && (step < 4) ? 'text-muted' : ''">4 ></span>
            <span :class="isValueExist(step) && (step < 5) ? 'text-muted' : ''">5 ></span>
            <span :class="isValueExist(step) && (step < 6) ? 'text-muted' : ''">6 ></span>
            <span :class="isValueExist(step) && (step < 7) ? 'text-muted' : ''">7 ></span>
            <span :class="isValueExist(step) && (step < 8) ? 'text-muted' : ''">Personnalisation utilisation eKo</span>
        </p>
    </div>
</template>

<script>
    export default {
        name: "ariane",
        props:['step'],
    }
</script>

<style scoped>

</style>