<template>
    <div>
        <div class="navbar">
            <div>
                <router-link to="/">Home</router-link>
            </div>
            <div>
                <router-link to="/login">Login</router-link>
            </div>
            <div>
                <router-link to="/dash">Dashboard</router-link>
            </div>
        </div>
        <router-view></router-view>
    </div>
</template>
<script>
export default {
    name: "App"
};
</script>
<style scoped>
.navbar {
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: black;
    color: white;
}
.navbar div {
    padding: 10px 20px;
    margin: 5px;
}
</style>
