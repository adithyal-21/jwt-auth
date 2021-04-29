<template>
    <div>
        <div v-if="loading">
            <div class="spinner-border" role="status">
                <span class="sr-only">loading...</span>
            </div>
        </div>
        <div class="login" v-else>
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input
                        type="email"
                        class="form-control"
                        id="exampleInputEmail1"
                        aria-describedby="emailHelp"
                        placeholder="Enter email"
                        v-model="data.email"
                    />
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input
                        type="password"
                        class="form-control"
                        id="exampleInputPassword1"
                        placeholder="Password"
                        v-model="data.password"
                    />
                </div>

                <button
                    type="submit"
                    class="btn btn-primary"
                    @click.prevent="login"
                >
                    Submit
                </button>
            </form>
        </div>
    </div>
</template>
<script>
import axios from "axios";
export default {
    name: "Login",
    data() {
        return {
            data: {
                email: "",
                password: ""
            },
            loading: true
        };
    },
    mounted() {
        if (this.$store.state.token !== "") {
            axios
                .post("/api/checktoken", { token: this.$store.state.token })
                .then(res => {
                    if (res) {
                        this.loading = false;
                        this.$router.push("/dash");
                    }
                })
                .catch(err => {
                    this.loading = false;
                    this.$store.commit("cleartoken");
                });
        } else {
            this.loading = false;
        }
    },
    methods: {
        login() {
            axios
                .post("/api/login", this.data)
                .then(response => {
                    if (response.data.success) {
                        this.$store.commit("settoken", response.data.token);
                        this.$router.push("/dash");
                        console.log(response.data);
                    }
                })
                .catch(err => {
                    console.log(err);
                });
        }
    }
};
</script>
