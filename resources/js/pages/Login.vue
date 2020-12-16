<template>
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Login</h2>
                    <hr>
                </div>

                <div class="card-body">
                    <div class="form-group row">
                        <div v-if="credential_error" class="col-12 text-center">
                            <div class="alert alert-danger">
                                <span>
                                <b> Attenzione - </b> {{ credential_error }}</span>
                            </div>
                        </div>
                        <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" v-model="fields.email" required autocomplete="email" placeholder="Email*">

                            <span v-if="errors.email" class="text-danger fs-20" role="alert">
                                    <strong>{{ errors.email[0] }}</strong>
                                </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">Password*</label>

                        <div class="col-md-6">
                            <input id="password" v-model="fields.password" type="password" class="form-control" name="password" required autocomplete="new-password" placeholder="Password*">

                            <span v-if="errors.password" class="text-danger fs-20" role="alert">
                                    <strong>{{ errors.password[0] }}</strong>
                                </span>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4 text-right">
                            <button type="button" class="btn btn-primary" @click.prevent="login">
                                Login
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>
<script>
    export default 
    {
        data()
        {
            return{
                errors: [],
                fields: {},
                credential_error: ''
            }
        },
        methods:
        {
            login()
            {
                axios.post('/api/login', this.fields)
                .then((res) => {
                    if(res.data.message)
                    {
                        this.$root.auth_check = true;
                        this.$root.auth_user = res.data.user;

                        this.$router.push({name:'Dashboard'})
                    }
                    else if(res.data.error)
                    {
                        this.credential_error = res.data.error;
                    }
                })
                .catch((error) => {
                    console.log(error)
                    this.errors = error.response.data.errors;
                })
            }
        }
    }
</script>