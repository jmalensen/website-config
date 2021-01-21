import Step1 from './components/registrationstep/Step1.vue';
import Step2 from './components/registrationstep/Step2.vue';
import Step3 from './components/registrationstep/Step3.vue';
import Step4 from './components/registrationstep/Step4.vue';
import Step5 from './components/registrationstep/Step5.vue';
import Step6 from './components/registrationstep/Step6.vue';
import Step7 from './components/registrationstep/Step7.vue';
import Step8 from './components/registrationstep/Step8.vue';
import Step9 from './components/registrationstep/Step9.vue';
import StepInfosUser            from './components/registrationstep/StepInfosUser.vue';
import StepPrefixes             from './components/registrationstep/StepPrefixes.vue';
import StepValidityEstimates    from './components/registrationstep/StepValidityEstimates.vue';
import StepDocNumbering         from './components/registrationstep/StepDocNumbering.vue';
import StepTva                  from './components/registrationstep/StepTva.vue';
import StepCompanyOrganization  from './components/registrationstep/StepCompanyOrganization.vue';
import StepStorage              from './components/registrationstep/StepStorage.vue';
import StepCustomerEquipments   from './components/registrationstep/StepCustomerEquipments.vue';
import StepTypeContract         from './components/registrationstep/StepTypeContract.vue';
import StepContractBirthday     from './components/registrationstep/StepContractBirthday.vue';
import StepContractIntervention from './components/registrationstep/StepContractIntervention.vue';
import StepContractHour         from './components/registrationstep/StepContractHour.vue';
import StepFinal                from './components/registrationstep/StepFinal.vue';

export const routes = [
    {
        path: '/userconf/step/1',
        name: 'step1',
        component: Step1
    },
    {
        path: '/userconf/step/2',
        name: 'step2',
        component: Step2
    },
    {
        path: '/userconf/step/3',
        name: 'step3',
        component: Step3
    },
    {
        path: '/userconf/step/4',
        name: 'step4',
        component: Step4
    },
    {
        path: '/userconf/step/5',
        name: 'step5',
        component: Step5
    },
    {
        path: '/userconf/step/6',
        name: 'step6',
        component: Step6
    },
    {
        path: '/userconf/step/7',
        name: 'step7',
        component: Step7
    },
    {
        path: '/userconf/step/8',
        name: 'step8',
        component: Step8
    },
    {
        path: '/userconf/step/9',
        name: 'step9',
        component: Step9
    },
    {
        path: '/userconf/step/infos-user',
        name: 'step-infos-user',
        component: StepInfosUser
    },
    {
        path: '/userconf/step/prefixes',
        name: 'step-prefixes',
        component: StepPrefixes
    },
    {
        path: '/userconf/step/validity-estimates',
        name: 'step-validity-estimates',
        component: StepValidityEstimates
    },
    {
        path: '/userconf/step/doc-numbering',
        name: 'step-doc-numbering',
        component: StepDocNumbering
    },
    {
        path: '/userconf/step/tva',
        name: 'step-tva',
        component: StepTva
    },
    {
        path: '/userconf/step/company-organization',
        name: 'step-company-organization',
        component: StepCompanyOrganization
    },
    {
        path: '/userconf/step/storage',
        name: 'step-storage',
        component: StepStorage
    },
    {
        path: '/userconf/step/customer-equipments',
        name: 'step-customer-equipments',
        component: StepCustomerEquipments
    },
    {
        path: '/userconf/step/type-contract',
        name: 'step-type-contract',
        component: StepTypeContract
    },
    {
        path: '/userconf/step/contract-birthday',
        name: 'step-contract-birthday',
        component: StepContractBirthday
    },
    {
        path: '/userconf/step/contract-intervention',
        name: 'step-contract-intervention',
        component: StepContractIntervention
    },
    {
        path: '/userconf/step/contract-hour',
        name: 'step-contract-hour',
        component: StepContractHour
    },
    {
        path: '/userconf/step/final',
        name: 'step-final',
        component: StepFinal
    }
];