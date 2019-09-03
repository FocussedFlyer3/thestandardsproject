<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        created() {
            //  Set user account's token if do not exit
            if (!localStorage.getItem('account')) {
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

            window.axios.get('/api/v1/classroom/1', {
                headers:{
                    'Authorization': JSON.parse(localStorage.getItem('account')).account.token,
                    'Accept': 'application/json'
                }
            }).then((response) => {
                console.log(response)
            }).catch((error) => {
                console.log(error)
            })
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
