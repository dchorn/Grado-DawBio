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
    document.getElementById("valida").addEventListener("click", function() {
        var name=document.getElementById("myName").value;    
        var course=document.getElementById("myCourse").value;
        let user = { // objeto js
            nom: name,
            curs: course,
            edat: age
        };
        //console.log(user);
        
        //enviar aquest objecte al servidor:
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "./php/server.php");//obrir conexio

        xhr.send(JSON.stringify(user));//enviament de dades
        xhr.onload=function(){ //esperar a rebre les dades

            if (xhr.status !=200) { // analiza el estado http
                alert(`ERROR! ${xhr.status}: ${xhr.statusText}`); // ej. 404: No encontrado
            } else {
                alert(`Hecho, obtenidos ${xhr.response.lenght} bytes`); // Respuesta
                // xhr.response es un JSON que viene des de PHP.
                console.log(xhr.response);
                let responseServer = JSON.parse(xhr.response); // reconvertir la respuesta/ parsearla
                document.getElementById("response").innerHTML=responseServer;
            };
        };
    });
});
