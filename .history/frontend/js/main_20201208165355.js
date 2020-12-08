let app = new Vue({
    el: '#app',
    data: {
        connected:false,
        login:null, 
        password:null
    }, 


    methods: {
        submit(ev) {
            ev.preventDefault();

            // Pour soumettre un formulaire vers un serveur PHP, 

            let formParams = new URLSearchParams();
            formParams.append("login", "robin");
            formParams.append("password", "ILuvBatman");
            
            const requestOptions = {
                method: "GET",
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8'
                },
                body: formParams
            };


            fetch('http://localhost:8080/backend/login.php', requestOptions)
                .then(response => response.json())
                .then(data => (this.connected = data.connected));
        }
    }
})