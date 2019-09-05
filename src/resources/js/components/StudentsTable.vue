<template>
    <div class="card">
        <div class="card-header">Class name</div>
        <div class="card-body" v-if="students.length > 0">
            <table class = "table">
                <thead class = "thead-dark">
                    <tr>
                        <th>Student ID</th>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tr v-for="(student, index) in students" :key="index">
                    <th>{{student.id}}</th>
                    <th>{{student.name}}</th>
                    <th>{{student.email}}</th>
                </tr>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            students: 0,
            classDetails: null,
            classID: window.location.pathname.substring(window.location.pathname.lastIndexOf('/') + 1)
        }
    },
    created () {
        this.loadClassList()
    },
    methods: {
        loadClassList() {
            window.axios.get(`/api/v1/classroom/${this.classID}`, {
                headers:{
                    'Authorization': JSON.parse(localStorage.getItem('account')).account.token,
                    'Accept': 'application/json'
                }
            }).then((response) => {
                console.log(response)
                this.students = response.data.classroom.students
                this.classDetails = response.data.classroom.details
            }).catch((error) => {
                console.log(error)
            })
        }
    },
}
</script>