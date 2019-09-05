<template>
</template>

<script>
    export default {
        created() {
            //  Set user account's token if do not exit
            if (!localStorage.getItem('account')) {
                this.cacheToken()
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            cacheToken () {
                window.axios.get('/api/v1/account').then((response) => {
                    let account = {
                        'account': {
                            'token': 'Bearer ' + response.data.account.token
                        }
                    }
                    console.log(JSON.stringify(account))
                    localStorage.setItem('account', JSON.stringify(account))
                }).catch((error) => {
                    console.log(error)
                })
            }
        },
    }
</script>
