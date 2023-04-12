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
            const data = {
                newTodo: this.newTodo,
            }
            axios.post('php/index.php',data,{
                headers: {'Content-Type' : 'multipart/form-data'}
            })
            .then((response) => {
                this.todo = response.data;
            })
            this.newTodo = '';
        },
        // Metodo che fa fare il toggle fatto/Da fare sulla ToDo
        done(index){
            axios.get('php/index.php',{
              params: {  
                done: index
            }
            })
            .then((response) => {
                this.todo = response.data;
            })
        },
        // Metodo che permette di cancellare un elemento della lista
        deleteTodo(index){
            axios.get('php/index.php',{
              params: {  
                delete: index
            }
            })
            .then((response) => {
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