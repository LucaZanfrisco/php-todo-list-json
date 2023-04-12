const { createApp } = Vue;

createApp({
    data() {
        return {
            todo: [],
            newTodo: '',
        }
    },
    methods: {
        // Metodo che permette di aggiungere un nuovo ToDo
        Add(){
            console.log('aggiunto');
            const data = {
                newTodo: this.newTodo,
            }
            axios.post('php/index.php',data,{
                headers: {'Content-Type' : 'multipart/form-data'}
            })
            .then((response) => {
                console.log(response);
                this.todo = response.data;
            })
        }
    },
    created() {
        // Chiamata originale all'API
        axios.get('php/index.php')
        .then((response) => {
            this.todo = response.data;
        })
    },
}).mount('#app');