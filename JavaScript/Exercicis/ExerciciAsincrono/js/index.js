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


});
