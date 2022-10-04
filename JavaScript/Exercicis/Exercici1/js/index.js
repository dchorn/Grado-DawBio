document.addEventListener("DOMContentLoaded", function(){
    
    //visibilidad de los divs
    document.getElementById("btEx1").addEventListener("click", function(){
    document.getElementById("exercici3").style.display="none";
    document.getElementById("exercici2").style.display="none";
    document.getElementById("exercici1").style.display="block";
    
    //calculo del factorial de 10
    let factorial=10;
    let result = factorial;
    for(let i=factorial-1;i>=2;i--){
        result=result*i;
        //console.log(factorial);
    }
    document.getElementById("p1").innerHTML="El factorial de " + factorial + " es "+result;});

    document.getElementById("btEx2").addEventListener("click", function(){
        document.getElementById("exercici3").style.display="none";
        document.getElementById("exercici1").style.display="none";
        document.getElementById("exercici2").style.display="block"});

    document.getElementById("btSum").addEventListener("click", suma);
    document.getElementById("btRes").addEventListener("click", resta);
    document.getElementById("btMult").addEventListener("click", mult);
    document.getElementById("btDiv").addEventListener("click", div);

    document.getElementById("btEx3").addEventListener("click", function(){
        document.getElementById("exercici2").style.display="none";
        document.getElementById("exercici1").style.display="none";
        document.getElementById("exercici3").style.display="block";
    });
    document.getElementById("btDni").addEventListener("click", dni);
});

function dni(){
    document.getElementById("pDni").innerHTML="";
    document.getElementById("pDni2").innerHTML="";
    var dni          = document.getElementById("dni").value;
    var splitDni     = dni.match(/([0-9]{8})+|([A-Z])/g);
    var nums         = splitDni[0];
    var letter       = splitDni[1];
    var verificacion = ["T","R","W","A","G","M","Y","F","P","D","X","B",
                        "N","J","Z","S","Q","V","H","L","C","K","E"];
    var resDiv       = nums%23;
    var letterConf = searchLetter(letter, verificacion);
    
    if (/([0-9]{8})([A-Z])/.exec(dni) == null) {
        document.getElementById("pDni").innerHTML+="EL DNI ES INCORRECTO!";
        console.log("DNI INCORRECTO");
    } else {

        if (verificacion[resDiv] == verificacion[letterConf]) {
            document.getElementById("pDni").innerHTML+="Tu DNI: " + dni +" es correcto!";
        } else {
            document.getElementById("pDni").innerHTML+="Tu DNI: " + dni +" es incorrecto!";
            document.getElementById("pDni2").innerHTML+="El DNI valido deberia ser:"+nums+verificacion[resDiv];
    }
}

    

    //console.log(splitDni);
    //console.log(nums, letter);
    //console.log(resDiv);
    //console.log(verificacion);
}

function searchLetter(letter, array){
    var number = 0;
    for(i=0;i<array.length;i++) {
        if (letter == array[i]) {
            number = i;
        }    
    }
    return number;
}

function suma(){
    var num1 = document.getElementById("num1").value;
    var num2 = document.getElementById("num2").value;

    if(isNaN(num1) || isNaN(num2)) {
        document.getElementById("res").innerHTML="Tienes que poner numeros :c";
    } else {
    var result = parseInt(num1)+parseInt(num2);

    console.log(result);
    document.getElementById("res").innerHTML="El resultat de la suma es: " + result;
    }
}

function resta(){
    var num1 = document.getElementById("num1").value;
    var num2 = document.getElementById("num2").value;

    if(isNaN(num1) || isNaN(num2)) {
        document.getElementById("res").innerHTML="Tienes que poner numeros :c";
    } else {
    var result = parseInt(num1)-parseInt(num2);

    console.log(result);
    document.getElementById("res").innerHTML="El resultat de la suma es: " + result;
    }
}

function mult(){
    var num1 = document.getElementById("num1").value;
    var num2 = document.getElementById("num2").value;

    if(isNaN(num1) || isNaN(num2)) {
        document.getElementById("res").innerHTML="Tienes que poner numeros :c";
    } else {
    var result = parseInt(num1)*parseInt(num2);

    console.log(result);
    document.getElementById("res").innerHTML="El resultat de la suma es: " + result;
    }
}

function div(){
    var num1 = document.getElementById("num1").value;
    var num2 = document.getElementById("num2").value;

    if(isNaN(num1) || isNaN(num2)) {
        document.getElementById("res").innerHTML="Tienes que poner numeros :c";
    } else {
    var result = parseInt(num1)/parseInt(num2);

    console.log(result);
    document.getElementById("res").innerHTML="El resultat de la suma es: " + result;
    }
}
