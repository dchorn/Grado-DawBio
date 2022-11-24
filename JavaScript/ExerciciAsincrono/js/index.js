addEventListener('DOMContentLoaded', function() {
// el codi que es posara en marxa quan carregui la meva web

//objecte
//var elMeuVol = new Vol(); //tradicional
    var flight={
        airline:"Ryanair",
        number: 545,
        departure: {
            time: "2022-10-04",
            city: "Barcelona"
        },
        fullFlight: function(){
            return this.airline+" "+this.number;
        }
    };

        var cat={};
        cat.name="Rufus";
        cat.species="cat";
        cat.age=10;
    document.getElementById("objectes").innerHTML=flight.departure.city;
    document.getElementById("objectes").innerHTML+="<br>"+flight.fullFlight();
    console.log(flight);
    console.log(document.getElementById("objectes"));

    //var avatar={"user": "Denys"};

    //JSON: javaScript Object Notation --> objecte JS "modificat" a string
    //var user=JSON.parse(avatar);//cadena JSON a objecte
    //console.log(user);
    //console.log(typeof user);

    var myCat=JSON.stringify(cat);//de objecte a JSON
    console.log(myCat);
    console.log(typeof myCat);

    ////// Comunicacion con el Servidor

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

});
