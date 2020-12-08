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

            // Pour soumettre un formulaire vers un serveur PHP, le content-type doit être application/x-www-form-urlencoded (de la forme param1=val1&param2=val2....)

            // Pour encoder les paramètres pour une url (urlencoded), on va utiliser l'objet JavaScript URLSearchParams, qui s'occupe de cela pour nous
            let formParams = new URLSearchParams();
            formParams.append("login", this.login);
            formParams.append("password", this.password);
            
            const requestOptions = {
                method: "POST",
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: `login=${this.login}&password=${this.password}`//formParams
            };


            fetch('http://localhost:8080/backend/login.php', requestOptions)
                .then(response => response.json())
                .then(data => (this.connected = data.connected));
        }
    }
})