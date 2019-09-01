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
            window.axios.get('/api/v1/classroom/1', {
                headers:{
                    'Authorization': 'Bearer El3IyF06ATkdMDEHaDBa6Jn8TK1nYZR0Yr2kNhboIEyLOJEYQBgBdf6bnvz4',
                    'Accept': 'application/json'
                }
            }).then((response) => {
                console.log(response)
            })
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
