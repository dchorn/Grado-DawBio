addEventListener('DOMContentLoaded', function () {

	function setCookie(cname, cvalue, exdays) {
		var date = new Date();
		date.setTime(date.getTime() + (exdays * 24 * 60 * 60 * 1000));
		var expires = "expires=" + date.toUTCString();
		document.cookie = cname + "=" + cvalue + ";" + "SameSite=None; Secure" + ";path=/;";
	}

	function getCookie(cookieName) {
		let cookie = {};
		document.cookie.split(';').forEach(function (el) {
			let [key, value] = el.split('=');
			cookie[key.trim()] = value;
		})
		if (cookie[cookieName]) {
			return true;
		} else {
			return false;
		}
	}

	document.getElementById("register").style.display = "none";

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
			const clearCookies = document.cookie.split(';').forEach(cookie => document.cookie = cookie.replace(/^ +/, '').replace(/=.*/, `=;expires=${new Date(0).toUTCString()};SameSite=None; Secure;path=/`));
			document.getElementById("logout-btn").style.display = "none";
			document.getElementById("booking-btn").style.display = "none"
			document.getElementById("logged").style.display = "none"
			document.getElementById("login").style.display = "block";
			document.getElementById("response").style.display = "none";
		});
	};

	function hideElements() {
		document.getElementById("login").style.display = "none";
		document.getElementById("register").style.display = "none";
		document.getElementById("booking-btn").style.display = "block";
		document.getElementById("logout-btn").style.display = "block";
		document.getElementById("response").style.display = "block";
	}

	if (getCookie("IdSession") === false) {
		document.getElementById("booking-btn").style.display = "none";
		document.getElementById("logout-btn").style.display = "none";
	};

	if (getCookie("IdSession") === true) {
		hideElements();
	};

	// Register to PHP
	document.getElementById("register-submit").addEventListener("click", function () {
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


		xhrReg.onload = function () { //esperar a rebre les dades
			if (xhrReg.status != 200) { // analiza el estado http
				alert(`ERROR! ${xhrReg.status}: ${xhrReg.statusText}`); // ej. 404: No encontrado
			} else {
				// xhr.response es un JSON que viene des de PHP.
				let responseServer = JSON.parse(xhrReg.response); // reconvertir la respuesta/ parsearla:
				document.getElementById("response").innerHTML = responseServer;
			};
		};

	});

	// Login to PHP
	document.getElementById("login-submit").addEventListener("click", function () {
		let user = { // objeto js
			'operator': 'login',
			'username': document.getElementById("login-uname").value,
			'password': document.getElementById("login-psw").value
		};

		//enviar aquest objecte al servidor:
		let xhr = new XMLHttpRequest();
		xhr.open("POST", "./php/server.php");//obrir conexio 

		xhr.send(JSON.stringify(user));//enviament de dades


		xhr.onload = function () { //esperar a rebre les dades
			if (xhr.status != 200) { // analiza el estado http
				alert(`ERROR! ${xhr.status}: ${xhr.statusText}`); // ej. 404: No encontrado
			} else {
				// xhr.response es un JSON que viene des de PHP.
				let responseServer = JSON.parse(xhr.response); // reconvertir la respuesta/ parsearla

				if (responseServer[responseServer.length - 1] === true) {
					setCookie("IdSession", responseServer[0], 1);
					hideElements();
					document.getElementById("response").innerHTML = responseServer[0] + " " + responseServer[1];
				} else {
					document.getElementById("response").innerHTML = responseServer[0];
				}
			};
		};

	});

	// Get info from php, put it into the select tags in html.
	let xhrReq = new XMLHttpRequest()
	xhrReq.open("GET", "./php/booking.php") // get array from php
	xhrReq.send()
	xhrReq.onload = function () {
		selects = document.getElementsByTagName("select") // get the element select from html
		let response = JSON.parse(xhrReq.response)
		if (!(selects[0].hasChildNodes())) { // if the select have no options then enter the if
			response.forEach(element => { // iterate the array from php
				option = document.createElement("option"); // create and option element in the select
				option.value = element["iata_code"]; // add the iata to the value of the option
				option.innerHTML = element["iata_code"] + " - " + element["city"]; // write iata and city to the option 
				let options = [option, option.cloneNode(true)]; //create an array of all modified options
				for (let i = 0; i < selects.length; i++) {
					selects[i].appendChild(options[i]); //push the options to the select
				}
			})
		}
	}

	// get data from html form
	function checkSubmit() {
		var origen = document.getElementById("sOrigen").value;
		var destino = document.getElementById("sDestino").value;
		var dateFrom = Date.parse(document.getElementById("datefrom").value);
		var dateTo = Date.parse(document.getElementById("dateto").value);
		var numPass = document.getElementsByName('numPass');

		// check the quantity of passengers
		for (var i = 0; i < numPass.length; i++) {
			if (numPass[i].checked) {
				var totalPass = numPass[i].value;
			}
		}

		// Check if the date from is bigger than today and lower than the date to. Check if the origin and the destination are different
		// Check if the Total Passangers are checked
		// Enable or disable the submit button if all the checks are correct
		if (dateFrom >= Date.now() && dateFrom < dateTo && origen !== destino && totalPass !== undefined) {
			document.getElementById("submit_booking").disabled = false;
		} else {
			document.getElementById("submit_booking").disabled = true;
		}
		setTimeout(checkSubmit, 500);
	}

	// put max and min values to the dates +6 and -6 month from now.
	minMaxDates("datefrom", 6);
	minMaxDates("dateto", 6);

	checkSubmit();
	displayElements();
	logOut();
});
