<template>
    <nav v-if="$root.auth_check" class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/">
                Laravel
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <router-link class="nav-link" :to="'/'" exact>Welcome</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" :to="'/home'">Home</router-link>
                    </li>
                        <li class="nav-item">
                        <router-link class="nav-link" :to="'/about'">About</router-link>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                        
                    <li class="nav-item">
                        <a class="nav-link clickable"  @click.prevent="logout">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>
<script>
export default {
    methods:
    {
        logout()
        {
            console.log('logout')
            axios.post('/api/logout', )
            .then(() => {
                this.$root.auth_user = null;
                this.$root.auth_check = false;

                this.$router.push({name: 'Welcome'})
            })
            .catch()
        }
    }
}
</script>