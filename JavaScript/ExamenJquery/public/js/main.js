$(document).ready(function () {
	$("#contenedor").hide();


	//----------- Guarda en una variable el valor de validate del local storage ------------//
	var validate = localStorage.getItem("validate");

	//-----------button event------------//
	$("#aboutme_btn").click(function () {
		$("#contenedor").show();
		$("#aboutme_d").show().siblings().hide();
	});

	$("#myprojects_btn").click(function () {
		$("#contenedor").show();
		$("#projects_d").show().siblings().hide();
	});

	$("#intranet_btn").click(function () {
		$("#contenedor").show();
		$("#intranet_d").show().siblings().hide();
		$("#logged").hide();
	});

	$("#login-submit").click(function() {
		checkLogin();
	});


	//----------- Comproba si la variable del localStorage te contingut, si el te mostra el formulari ------------//
	if(validate != null) {
		$("#contenedor").show();
		$("#logged_d").show().siblings().hide();
	}

});


	//----------- Funcio que comproba el formulari del login ------------//
function checkLogin() {
	let username_check = false;
	let password_check = false;
	let username = $("#login-uname").val();
	let password = $("#login-psw").val();

	if (username == "projecte") {
		username_check = true;
	}
	if (password == "dawbio") {
		password_check = true;
	}
	if ((username_check == true && password_check == true)) {
		$("#logged").html("Estas dins!");
		localStorage.setItem("validate", "valid");
		$("#logged_d").show().siblings().hide();
	} else {
		$("#logged").html("Credencials incorrectes.");
		$("#logged").show();
	}
}
