const { createApp } = Vue;

createApp({
    data() {
        return {
            todo: [],
        }
    },
    created() {
        axios.get('php/index.php')
        .then((response) => {
            console.log(response);
            this.todo = response.data;
        })
    },
}).mount('#app');