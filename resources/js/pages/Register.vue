<template>
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Registrazione</h2>
                    <hr>
                </div>

                <div class="card-body">
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Nome</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="name" v-model="fields.name" required autocomplete="name" placeholder="Nome*">

                            <span v-if="errors.name" class="text-danger fs-20" role="alert">
                                <strong>{{ errors.name[0] }}</strong>
                            </span>
                        </div>
                    </div>

                    <div class="form-group row">
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

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Conferma Password*</label>

                        <div class="col-md-6"> 
                            <input id="password-confirm" v-model="fields.password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Conferma Password*">
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4 text-right">
                            <button type="button" class="btn btn-primary" @click.prevent="register">
                                Registrati
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
                fields: {}
            }
        },
        methods:
        {
            register()
            {
                axios.post('/api/register', this.fields)
                .then((res) => {
                    console.log(res.data);
                })
                .catch((error) => {
                    this.errors = error.response.data.errors;
                    console.log(this.errors)
                })
            }
        }
    }
</script>