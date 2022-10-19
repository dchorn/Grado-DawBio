addEventListener('DOMContentLoaded', function() {

   document.getElementById("register").style.display="none";

// Funcion que pone display:block o display:none dependiendo del boton
		function displayElements() {
			document.getElementById("login-btn").addEventListener("click", function () {
				document.getElementById("login").style.display = "block"
				document.getElementById("register").style.display = "none"
			})
			document.getElementById("register-btn").addEventListener("click", function () {
				document.getElementById("login").style.display = "none"
				document.getElementById("register").style.display = "block"
			})
		}
    document.getElementById("login-submit").addEventListener("click", function() {
        var name   = document.getElementById("login-uname").value;    
        var passwd = document.getElementById("login-psw").value;
        let user = { // objeto js
            nom: name,
            contra: passwd
        };
        console.log(user);


	//enviar aquest objecte al servidor:
		let xhr = new XMLHttpRequest();
		xhr.open("POST", "./php/server.php");//obrir conexio
		xhr.send(JSON.stringify(user));//enviament de dades
		xhr.onload=function() { //esperar a rebre les dades
			if (xhr.status !=200) { // analiza el estado http
				alert(`ERROR! ${xhr.status}: ${xhr.statusText}`); // ej. 404: No encontrado
			} else {
				// xhr.response es un JSON que viene des de PHP.
				let responseServer = JSON.parse(xhr.response); // reconvertir la respuesta/ parsearla
				document.getElementById("response").innerHTML=responseServer;
			};
		};

	});
	displayElements();
});
