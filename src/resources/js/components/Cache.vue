<template>
</template>

<script>
    export default {
        created() {
            //  Set user account's info if do not exit
            if (!localStorage.getItem('account')) {
                this.cacheInfo()
            }
            this.login()
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            cacheInfo () {
                window.axios.get('/api/v1/account').then((response) => {
                    let account = {
                        'account': {
                            'token': 'Bearer ' + response.data.account.api_token,
                            'email': response.data.account.email,
                            'id': response.data.account.id,
                            'name': response.data.account.name,
                            'role': response.data.account.role,
                            'username': response.data.account.username
                        }
                    }

                    localStorage.setItem('account', JSON.stringify(account))
                }).catch((error) => {
                    console.log(error)
                })
            },
            login () {
                let info = {
                    'account':{
                        'email': 'johnbeck@email.com',
                        'password': 'passwordone'
                    }
                }
                window.axios.post('/api/v1/account/login', JSON.stringify(info), {
                    headers:{
                        'Content': 'application/json'
                    }
                }).then((response) => {
                    let account = {
                        'account': {
                            'token': 'Bearer ' + response.data.account.api_token,
                            'email': response.data.account.email,
                            'id': response.data.account.id,
                            'name': response.data.account.name,
                            'role': response.data.account.role,
                            'username': response.data.account.username
                        }
                    }

                    localStorage.setItem('account', JSON.stringify(account))
                }).catch((error) => {
                    console.log(error)
                })
            }
        },
    }
</script>
