addEventListener('DOMContentLoaded', function() {

    //document.getElementById("register").style.display="none";

// Funcion que pone display:block o display:none dependiendo del boton

// Funcion para que la hora se actualice a tiempo real 
	function showTime(){
		var date = new Date();
		var h = date.getHours(); // 0 - 23
		var m = date.getMinutes(); // 0 - 59
		var s = date.getSeconds(); // 0 - 59
		
		if(h == 0){
			h = 24;
		}
		
		h = (h < 10) ? "0" + h : h;
		m = (m < 10) ? "0" + m : m;
		s = (s < 10) ? "0" + s : s;
		
		var time = h + ":" + m + ":" + s + " " ;
		document.getElementById("MyClockDisplay").innerText = time;
		document.getElementById("MyClockDisplay").textContent = time;
		
		setTimeout(showTime, 1000);
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

	showTime();

});
