export default {
    state: {
        user : null,
        messageStep: 'Etape',
        step: 1,
        currentDataCompany: {},
        currentDataEkoUsage: {
            data_eko : new Object()
        },
    },
    getters: {
        isLoggedIn(state) {
            return state.user !== null;
        },
        getUser(state){
            return state.user;
        },
        welcome(state) {
            return state.messageStep;
        },
        getStep(state) {
            return state.step;
        },
        getCurrentDataCompany(state){
            return state.currentDataCompany;
        },
        getCurrentDataEkoUsage(state){
            return state.currentDataEkoUsage;
        }
    },
    mutations: {
        setAuthUser(state, user) {
            state.user = user;
        },
        setStep(state, nbStep){
            state.step = nbStep;
        },
        setCurrentDataCompany(state, data){
            state.currentDataCompany = data;
        },
        setCurrentDataEkoUsage(state, data){
            state.currentDataEkoUsage = data;

            let isJson = IsJsonString(data.data_eko);
            if(isJson){
                state.currentDataEkoUsage.data_eko = JSON.parse(data.data_eko);
            } else{
                state.currentDataEkoUsage.data_eko = data.data_eko;
            }
        },
    },
    actions: {
        getInfosFromNumber({dispatch, commit, getters}, number ){

            return axios({
                method: 'post',
                url: '//mapelio.conselio.com/api/societe/search',
                params: {
                    'fields[must][][match]': 'siret',
                    input: number
                },
                // data: {
                //     'fields[must][][match]': 'siret',
                //     input: number
                // },
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'x-api-key': '1iKrw.JAVbK2SuHfRCWyZqBVn'
                }

            }).then(response => {
                //console.log(response, response.data.results[0]._source);

                let result = response.data.results[0]._source;

                let company = getters.getCurrentDataCompany;
                company.siren = result.siren;
                company.siret = result.siret;
                company.address_line1 = result.numero +' '+ result.nom_voie;
                company.zipcode = result.code_postal;
                company.city = result.nom_commune;
                company.commercial_name = result.nom_societe;

                commit('setCurrentDataCompany', company );

            }).catch(error => {
                console.error(error, error.message);
            });
        },

        setCompanyStepIdNumber({dispatch, commit}, datas) {

            return axios({
                method: 'post',
                url: datas.url,
                data: datas.company
            }).then(response => {
                //console.log(response.data);

                if(response.data.success){
                    commit('setCurrentDataCompany', response.data.data.company );
                    commit('setCurrentDataEkoUsage', response.data.data.company.eko_usage );

                } else{
                    commit('setCurrentDataCompany', response.data );
                }
            }).catch(error => {
                // console.log(error);

                // Check if unauthorized error returned
                if (error.response.status === 401 || error.response.status === 419) {
                    window.location = "/login";
                }
            })//.finally(() => {
            //         dispatch('getInfosFromNumber', datas.company.siret);
            //     }
            // )
        },

        fetchCompany( {commit} ) {

            return axios({
                method: 'get',
                url: '/userconf/companies/getcompany'
            }).then(response => {
                commit('setCurrentDataCompany', response.data );

                if( typeof(response.data.eko_usage) != 'undefined'
                    && response.data.eko_usage != null ) {
                    commit('setCurrentDataEkoUsage', response.data.eko_usage );
                }

            }).catch(error => {
                // console.error(error.message);

                // Check if unauthorized error returned
                if (error.response.status === 401 || error.response.status === 419) {
                    window.location = "/login";
                }
            });
        },

        setStep({commit}, step){
            commit('setStep', step );
        },

        setCurrentDataCompany({commit}, data){
            commit('setCurrentDataCompany', data );
        },

        setCurrentDataEkoUsage({commit}, data){
            commit('setCurrentDataEkoUsage', data );
        },

        setCompanyStep({commit}, datas) {
            axios({
                method: 'post',
                url: datas.url,
                data: datas.company
            }).then(response => {
                //console.log(response.data);

                if(response.data.success){
                    commit('setCurrentDataCompany', response.data.data.company );
                    commit('setCurrentDataEkoUsage', response.data.data.company.eko_usage );
                } else{
                    commit('setCurrentDataCompany', response.data );
                }
            }).catch(error => {
                // console.log(error);

                // Check if unauthorized error returned
                if (error.response.status === 401 || error.response.status === 419) {
                    window.location = "/login";
                }
            })
        },

        setEkoStep({commit}, datas) {
            axios({
                method: 'post',
                url: datas.url,
                data: datas.data_eko
            }).then(response => {
                // console.log(response.data);

                if(response.data.success){
                    commit('setCurrentDataEkoUsage', response.data.data.company.eko_usage );
                } else{
                    commit('setCurrentDataEkoUsage', response.data );
                }
            }).catch(error => {
                // console.log(error);

                // Check if unauthorized error returned
                if (error.response.status === 401 || error.response.status === 419) {
                    window.location = "/login";
                }
            })
        },
    }
}

function IsJsonString(str) {
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }
    return true;
}

