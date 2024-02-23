<template>
    <div class="container-fluid p-5">
        <div class="p-5">
            <div class="register-container">
                <h2>Register</h2>
                <form @submit.prevent="register">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" v-model="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" v-model="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" v-model="password" required>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password:</label>
                        <input type="password" id="password_confirmation" v-model="password_confirmation" required>
                    </div>
                    <div class="form-group">
                        <label for="birthdate">Birthdate:</label>
                        <input type="date" id="birthdate" v-model="birthdate">
                    </div>
                    <div class="form-group">
                        <label for="image">Profile Image:</label>
                        <input type="file" id="image" accept="image/*" @change="handleImageUpload">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input type="text" id="phone" v-model="phone">
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" id="address" v-model="address">
                    </div>
                    <div class="form-group">
                        <label for="type">User Type:</label>
                        <select id="type" v-model="type">
                            <option value="client">Client</option>
                            <option value="depot">Depot</option>
                            <option value="deliveryman">Deliveryman</option>
                        </select>
                    </div>
                    <button type="submit">Register</button>
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
            name: '',
            email: '',
            password: '',
            password_confirmation: '',
            birthdate: '',
            image: null,
            phone: '',
            address: '',
            type: 'client'
        };
    },
    methods: {
        ...mapActions('auth', ['loginAction']),

        async register() {
            // Prepare form data to send to the server
            const formData = {
                name: this.name,
                email: this.email,
                password: this.password,
                password_confirmation: this.password_confirmation,
                birthdate: this.birthdate,
                image: this.image,
                phone: this.phone,
                address: this.address,
                type: this.type
            };

            try {
                // Send form data to backend
                const response = await axios.post('api/register', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                });
                // Handle response accordingly
                console.log('Server response:', response.data.user);
                this.loginAction(response.data.user)

                this.$router.push('/dashboard');
            } catch (error) {
                // Handle error
                console.error('Registration error:', error);
            }
        },
        handleImageUpload(event) {
            const file = event.target.files[0];
            this.image = file;
        }
    }
};
</script>

<style scoped>
.container-fluid {
    background-color: #FFF7D0;
    margin-bottom: 50px;
}
.register-container {
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
input[type="email"],
input[type="password"],
input[type="date"],
input[type="file"],
select {
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
  