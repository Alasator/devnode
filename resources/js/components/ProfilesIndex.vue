<template>
    <div>
        <div class="form-group">
            <router-link :to="{name: 'createProfile'}" class="btn btn-success">Create new profile</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">profiles list</div>
            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Website</th>
                        <th>Email</th>
                        <th width="100">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="profile, index in profiles">
                        <td>{{ profile.name }}</td>
                        <td>{{ profile.address }}</td>
                        <td>{{ profile.website }}</td>
                        <td>{{ profile.email }}</td>
                        <td>
                            <router-link :to="{name: 'editProfile', params: {id: profile.id}}" class="btn btn-xs btn-default">
                                Edit
                            </router-link>
                            <a href="#"
                               class="btn btn-xs btn-danger"
                               v-on:click="deleteEntry(profile.id, index)">
                                Delete
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                profiles: []
            }
        },
        mounted() {
            var app = this;
            axios.get('/api/v1/profiles')
                .then(function (resp) {
                    app.profiles = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load profiles");
                });
        },
        methods: {
            deleteEntry(id, index) {
                if (confirm("Do you really want to delete it?")) {
                    var app = this;
                    axios.delete('/api/v1/profiles/' + id)
                        .then(function (resp) {
                            app.profiles.splice(index, 1);
                        })
                        .catch(function (resp) {
                            alert("Could not delete profile");
                        });
                }
            }
        }
    }
</script>
