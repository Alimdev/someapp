<template>
    <div>
        <h3>Registration</h3>
        <p v-if="error" style="color:red">{{ error }}</p>

        <div >
            <label for="name">Name</label>
            <input placeholder="Name" type="text" v-model="form.name" >
        </div>
        <div>
            <label for="email">Your e-mail</label>
            <input placeholder="Email" type="email" v-model="form.email">
        </div>
        <div>
            <label for="password">Password</label>
            <input placeholder="Password" type="password" v-model="form.password" name="password">
        </div>
        <div>
            <label for="confirm_password">Confirm Password</label>
            <input placeholder="Confirm Password" type="password" v-model="form.password_confirmation" name="password_confirmation">
        </div>
        <div>
            <button @click="register" type="submit" class="btn btn-primary">Register</button>
        </div>
    </div>
</template>
<script>
import repository from "../api/repository";

export default {
    data(){
        return{
            form:{
                name: '',
                email: '',
                password: '',
                password_confirmation: ''
            },
            errors:[],
            error: null
        }
    },
    methods:{
        async register() {
            this.error = null;

            try {
                let response = await repository.register(this.form);
                // await this.$store.dispatch('login', response.data);
                await this.$router.push({ name: 'Login' });
            } catch (error) {
                this.error = error;
            }
        }
    }
}
</script>