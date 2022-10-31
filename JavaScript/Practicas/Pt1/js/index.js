addEventListener('DOMContentLoaded', function() {

	function setCookie(cname, cvalue, exdays) {
		var date = new Date();
		date.setTime(date.getTime() + (exdays*24*60*60*1000));
		var expires = "expires="+ date.toUTCString();
		document.cookie = cname + "=" + cvalue + ";" + "SameSite=None; Secure" + ";path=/;";
	}

	function getCookie(cookieName) {
	  let cookie = {};
	  document.cookie.split(';').forEach(function(el) {
		let [key,value] = el.split('=');
		cookie[key.trim()] = value;
	  })
		if (cookie[cookieName]) {
	  		return true;
		} else {
			return false;
		}
	}

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

			document.getElementById("booking-btn").addEventListener("click", function () {
				document.getElementById("logged").style.display = "block"
			})
		}

		function logOut() {
			document.getElementById("logout-btn").addEventListener("click", function () {
			const clearCookies = document.cookie.split(';').forEach(cookie => document.cookie = cookie.replace(/^ +/, '').replace(/=.*/, `=;expires=${new Date(0).toUTCString()};path=/`));
			document.getElementById("logout-btn").style.display = "none";
			document.getElementById("booking-btn").style.display = "none"
			document.getElementById("logged").style.display = "none"
			document.getElementById("login").style.display = "block";
			});
		};
			
		function hideElements() {
				document.getElementById("login").style.display = "none";
				document.getElementById("register").style.display = "none";
				document.getElementById("booking-btn").style.display = "block";
				document.getElementById("logout-btn").style.display = "block";
		}

	if(getCookie("IdSession") === false) {
		document.getElementById("booking-btn").style.display = "none";
		document.getElementById("logout-btn").style.display = "none";
	};

	if(getCookie("IdSession") === true) {
		hideElements();
	};

	// Register to PHP
    document.getElementById("register-submit").addEventListener("click", function() {
        let registerUser = { // objeto js
			'operator': 'register',
			'username': document.getElementById("register-uname").value,
            'password': document.getElementById("register-psw").value,
			'name': document.getElementById("register-name").value
        };

	//enviar aquest objecte al servidor:
		let xhrReg = new XMLHttpRequest();
		xhrReg.open("POST", "./php/server.php");//obrir conexio 

		xhrReg.send(JSON.stringify(registerUser));//enviament de dades
		

		xhrReg.onload=function() { //esperar a rebre les dades
			if (xhrReg.status !=200) { // analiza el estado http
				alert(`ERROR! ${xhrReg.status}: ${xhrReg.statusText}`); // ej. 404: No encontrado
			} else {
				// xhr.response es un JSON que viene des de PHP.
				let responseServer = JSON.parse(xhrReg.response); // reconvertir la respuesta/ parsearla:
				document.getElementById("response").innerHTML=responseServer;
			};
		};

	});


	// Login to PHP
    document.getElementById("login-submit").addEventListener("click", function() {
        let user = { // objeto js
			'operator': 'login',
			'username': document.getElementById("login-uname").value,
			'password': document.getElementById("login-psw").value
		};

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
	
				if(responseServer[responseServer.length-1] === true) {
					setCookie("IdSession", responseServer[0] ,1);
					hideElements();
					document.getElementById("response").innerHTML=responseServer[0]+" "+responseServer[1];
				} else { 
					document.getElementById("response").innerHTML=responseServer[0];
				}};
		};

	});
	displayElements();
	logOut();
});
