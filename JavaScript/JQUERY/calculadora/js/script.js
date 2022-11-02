
$(document).ready(function(){


    $("#btn-calc").click(calculator);
    
	//$("#btn-calc").click(function() {
	//	calculator(num1,num2,operator);
	//});
    //$(document).on('click','#btn-calc',calculator(num1,num2,operator));
})
function calculator(){
	var num1=$("#id1").val();//recollir el que hi ha dins
	var num2=$("#id2").val();//recollir el que hi ha dins

	var operator=$("#operators").val();
	switch (operator) {
		case "+":
		var result = parseInt(num1)+parseInt(num2);
			break;
		case "-":
		var result = parseInt(num1)-parseInt(num2);
			break;
		case "*":
		var result = parseInt(num1)*parseInt(num2);
			break;
		case "/":
		var result = parseInt(num1)/parseInt(num2);
			break;
		default:
			console.log("No furula");
			break;
	}
    console.log(result);
	$("#res").html("El resultat es: " + result);
}

