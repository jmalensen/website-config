<template>
    <div id="recap" class="block block-rounded block-fx-shadow">
        <p class="m-0" v-if="isValueExist(company.path_logo)">
            <img :src="'/'+company.path_logo" alt="Logo entreprise" style="width:120px" />
        </p>

        <div class="mb-1">
            <p class="m-0" v-if="isValueExist(ekousage.eko_type)">{{ ekousage.eko_type }}</p>

            <p class="m-0" v-if="isValueExist(company.social_reason)">{{ company.social_reason }}</p>
        </div>

        <div class="mb-1">
            <p class="m-0" v-if="isValueExist(company.address_line1)">{{ company.address_line1 }}</p>
            <p class="m-0" v-if="isValueExist(company.address_line2)">{{ company.address_line2 }}</p>
            <p class="m-0" v-if="isValueExist(company.zipcode) && isValueExist(company.city)">{{ company.zipcode }} {{ company.city }}</p>
            <p class="m-0" v-if="isValueExist(company.country)">{{ company.country }}</p>

            <hr v-if="isValueExist(company.address_line1)
            || isValueExist(company.address_line2)
            || isValueExist(company.zipcode)
            || isValueExist(company.country)" />
        </div>

        <div class="mb-1">
            <p class="m-0" v-if="isValueExist(company.local_address_line1)">
                <span class="d-block font-weight-bold">Adresse (locaux) :</span>
                {{ company.local_address_line1 }}
            </p>
            <p class="m-0" v-if="isValueExist(company.local_address_line2)">
                <span class="d-block font-weight-bold">Complément adresse (locaux) :</span>
                {{ company.local_address_line2 }}
            </p>
            <p class="m-0" v-if="isValueExist(company.local_zipcode)">
                <span class="d-block font-weight-bold">Code postal (locaux) :</span>
                {{ company.local_zipcode }}
            </p>
            <p class="m-0" v-if="isValueExist(company.local_city)">
                <span class="d-block font-weight-bold">Ville (locaux) :</span>
                {{ company.local_city }}
            </p>

            <hr v-if="isValueExist(company.local_address_line1)
            || isValueExist(company.local_address_line2)
            || isValueExist(company.local_zipcode)
            || isValueExist(company.local_city)" />
        </div>

        <div class="mb-1">
            <p class="m-0" v-if="isValueExist(company.phone)">
                <span class="d-block font-weight-bold">Téléphone :</span>
                {{ company.phone }}
            </p>
            <p class="m-0" v-if="isValueExist(company.email)">
                <span class="d-block font-weight-bold">E-mail :</span>
                {{ company.email }}
            </p>
            <p class="m-0" v-if="isValueExist(company.website)">
                <span class="d-block font-weight-bold">Site internet :</span>
                {{ company.website }}
            </p>

            <hr v-if="isValueExist(company.phone)
            || isValueExist(company.email)
            || isValueExist(company.website)" />
        </div>
    </div>
</template>

<script>
    export default {
        name: "RecapAside",
        props:['company', 'ekousage'],
        methods:{
        }
    }
</script>

<style scoped>

</style>