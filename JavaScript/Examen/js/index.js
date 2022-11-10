document.addEventListener("DOMContentLoaded", function () {

	var ubicacio;
	var espai;
	var idInventari;
	var textArea;
	var data;
	var myEmail;
	var prioritat;
	var errorEmail = true; //control dels errors de cada camp

	function setCookie(cname, cvalue, exdays) {
		var date = new Date();
		date.setTime(date.getTime() + (exdays * 24 * 60 * 60 * 1000));
		var expires = "expires=" + date.toUTCString();
		document.cookie = cname + "=" + cvalue + ";" + "SameSite=None; Secure" + ";path=/;";
		
	}

	document.getElementById("textIncidencia").style.display = "none";

	// Funcion que pone display:block o display:none dependiendo del boton
	function displayElements() {
		document.getElementById("btIncidencia").addEventListener("click", function () {

			document.getElementById("divIncidencia").style.display = "none";
			document.getElementById("textIncidencia").style.display = "block";
			checkSubmit();
		})
	}

	function displayElements2() {
		document.getElementById("btIncidenciaText").addEventListener("click", function () {
			document.getElementById("textIncidencia").style.display = "none";
			checkSubmit2();
		})
	}

	function creacioObjecte() {
		let objecteIncidencia = { // objeto js
			'ubicacio': ubicacio,
			'espai': espai,
			'idInventari': idInventari,
			'textArea': textArea,
			'data': data,
			'email': myEmail,
			'prioritat': prioritat,
		};
		console.log(objecteIncidencia);
		setCookie("Examen",JSON.stringify(objecteIncidencia),7);
		printEnd(objecteIncidencia);
	}

	function printEnd(objecteIncidencia) {
		document.getElementById("end1").innerHTML = "Ubicacio: "+objecteIncidencia["ubicacio"];	
		document.getElementById("end2").innerHTML = "Espai: "+objecteIncidencia["espai"];	
		document.getElementById("end3").innerHTML = "idInventari: "+objecteIncidencia["idInventari"];	
		document.getElementById("end4").innerHTML = "Text Incidencia: "+objecteIncidencia["textArea"];	
		document.getElementById("end5").innerHTML = "Data: "+objecteIncidencia["data"];	
		document.getElementById("end6").innerHTML = "Email: "+objecteIncidencia["email"];	
		document.getElementById("end7").innerHTML = "Prioritat: "+objecteIncidencia["prioritat"];	
	}

	function checkSubmit2() {
		document.getElementById("respuestas").style.display = "none";
		textArea = document.getElementById("textArea").value;
		data = document.getElementById("dataInc").value;
		myEmail = document.getElementById("tuEmail").value;
		var prior = document.getElementsByName('prioritat');
		for (var i = 0; i < prior.length; i++) {
			if (prior[i].checked) {
				prioritat = prior[i].value;
			}
		}
		creacioObjecte();
	}

	function checkSubmit() {
		ubicacio = document.getElementById("sUbi").value;
		idInventari = document.getElementById("idInventari").value;
		espai = document.getElementById("sEspai").value;

		document.getElementById("respuesta1").innerHTML = "Espai: " + espai;
		document.getElementById("respuesta2").innerHTML = "ID: " + idInventari;
	}

	function comprovaBoto() {

		if (!errorEmail) {
			document.getElementById("btIncidenciaText").disabled = false;
			p.innerHTML = "Afegeix aquí el missatge que vulguis concatenant amb les variables que vulguis";
		} else {
			document.getElementById("btRegistro").disabled = true;
		}
	}

	document.getElementById("idInventari").addEventListener("focusout", function () {
		var pattern = /\w?(\d{4}[AZ-az])(\w[:])(\w{3}[1-9])/;
		if (pattern.test(idInventari)) {//passa el test
		}
		});

	document.getElementById("tuEmail").addEventListener("blur", function () {
		myEmail = document.getElementById("tuEmail").value;//recojo lo que hay dentro del campo nombre
		var pattern = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/;//valido
		//compruebo

		if (pattern.test(myEmail)) {//correcto
			document.getElementById("errorE").innerHTML = "";
			errorEmail = false;

		} else {//si hay problemas con el nombre introducido
			document.getElementById("errorE").innerHTML = "Vuelve a introducir tu email. Formato incorrecto";
			errorEmail = true;
		}
		comprovaBoto();
	});

	let xhrReq = new XMLHttpRequest()
	xhrReq.open("GET", "./php/ubicacio.php") // get array from php
	xhrReq.send()
	xhrReq.onload = function () {
		selects = document.getElementsByTagName("select") // get the element select from html
		let response = JSON.parse(xhrReq.response)
		if (!(selects[0].hasChildNodes())) { // if the select have no options then enter the if
			for (let i = 0; i < selects.length; i++) {
				if (selects[i].id == "sUbi") {
					response.forEach(element => { // iterate the array from php
						option = document.createElement("option"); // create and option element in the select
						option.value = element["ubicacio"]; // add the iata to the value of the option
						option.innerHTML = element["ubicacio"]; // write iata and city to the option 
						let options = [option, option.cloneNode(true)]; //create an array of all modified options
						for (let i = 0; i < selects.length; i++) {
							if (selects[i].id == "sUbi") {
								if (option.value != "") {
									selects[i].appendChild(options[i]); //push the options to the select
								}
							}
						}
					})
				}
				if (selects[i].id == "sEspai") {
					response.forEach(element => { // iterate the array from php
						option = document.createElement("option"); // create and option element in the select
						option.value = element["espai"]; // add the iata to the value of the option
						option.innerHTML = element["espai"]; // write iata and city to the option 
						let options = [option, option.cloneNode(true)]; //create an array of all modified options
						for (let i = 0; i < selects.length; i++) {
							if (selects[i].id == "sEspai") {
								selects[i].appendChild(options[i]); //push the options to the select
							}
						}
					})
				}

			}
		}
	}

	displayElements();
	displayElements2();
});
