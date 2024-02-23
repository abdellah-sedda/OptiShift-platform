<template>
    <div class="container-fluid">
        <div class="p-5">
            <div class="login-container">
                <h2>Login</h2>
                <form @submit.prevent="login">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" id="email" v-model="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" v-model="password" required>
                    </div>
                    <button type="submit">Login</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import { mapActions } from 'vuex';

export default {
data() {
    return {
        email: '',
        password: ''
    };
},
methods: {
    ...mapActions('auth', ['loginAction']),

    async login() {
        await axios.post('/api/login', {
            email: this.email,
            password: this.password
        }).then(response => {
            this.loginAction(response.data.user);
            this.$router.push({ name: 'Dashboard' });
        }).catch(error => {
            console.log(error);
        });
    }
}
};
</script>

<style scoped>

.container-fluid {
    background-color: #FFF7D0;
    padding: 50px;
}

.login-container {
    max-width: 600px;
    margin: auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
}

.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    font-weight: bold;
}

input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
    box-sizing: border-box;
}

button {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 3px;
    background-color: #007bff;
    color: #fff;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}
</style>  