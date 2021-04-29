<template>
    <div>
        <div v-if="loading">
            <div class="spinner-border" role="status">
                <span class="sr-only">loading...</span>
            </div>
        </div>

        <div>
            you are logged in

            <button class="btn btn-danger" @click="logout">Logout</button>
        </div>
    </div>
</template>
<script>
export default {
    name: "dashboard",
    data() {
        return {
            loading: true
        };
    },
    mounted() {
        if (this.$store.state.token !== "") {
            axios
                .post("/api/checktoken", { token: this.$store.state.token })
                .then(res => {
                    this.loading = false;
                })
                .catch(err => {
                    (this.loading = false), this.$store.commit("cleartoken");
                    alert("Session Timed Out");
                    this.$router.push("/login");
                });
        } else {
            (this.loading = false), this.$router.push("/login");
        }
    },
    methods: {
        logout() {
            axios
                .post("/api/logout", { token: this.$store.state.token })
                .then(res => {
                    this.$store.commit("cleartoken");
                    this.$router.push("/");
                });
        }
    }
};
</script>
