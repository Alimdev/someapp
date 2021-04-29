<template>
  <div id="app">
    <div id="nav">
      <router-link v-if="!authenticated" :to="{ name: 'Login' }">Login  </router-link>
      <router-link  :to="{ name: 'Currencies' }">Currencies </router-link>
      <router-link  :to="{ name: 'History' }">History </router-link>
      <router-link v-if="authenticated" :to="{ name: 'Cabinet' }">Cabinet </router-link>
      <router-link :to="{ name: 'Documentation' }">Documentation </router-link>
      <button v-if="authenticated" @click="logout">logout</button>
      <button v-if="!authenticated" @click="register">Register</button>

      <p v-if="loading">loading...</p>
      <p v-if="error" style="color: red;">{{ error }}</p>
    </div>
    <router-view/>
  </div>
</template>

<script>
import { mapGetters } from 'vuex';
export default {
  data() {
    return {
      loading: false,
      error: false,
    }
  },
  computed: {
    ...mapGetters({
      authenticated: 'authenticated'
    })
  },

  methods: {
    async logout() {
        this.loading = true;

        try {
            await this.$store.dispatch('logout');
            await this.$router.push({ name: 'Login' })
        } catch (error) {
            this.error = error;
        } finally {
            this.loading = false;
        }
    },
    async register(){
        await this.$router.push({ name: 'Register' })

    }
  }

}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

#nav {
  padding: 30px;
}

#nav a {
  font-weight: bold;
  color: #2c3e50;
}

#nav a.router-link-exact-active {
  color: #42b983;
}

#nav div {
  display: inline-block;
}

.link-logout:hover {
  cursor: pointer;
  text-decoration: underline;
}

</style>
