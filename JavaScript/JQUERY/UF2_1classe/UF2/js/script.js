// document.addEventListener("DOMContentLoaded",function(){
//    var paragraf=document.getElementById("id1").innerHTML;
//    paragraf=document.querySelector("#id1");//recollir ids
//    var hs=document.querySelector("h2");//recollir tags
//    var clase=document.querySelector(".error");//recollir classe error
//var input=document.querySelector("#id2").value;//recull el que hi ha dins de la caixa de texte
// })

/////////////////////
$(document).ready(function(){
  var paragraf=$("#id1").html();//recollint el texte que hi ha dins del paragraf
  //console.log(paragraf);

  var hs=$("h2:first");
  console.log(hs.html());
  var clase=$(".error");
  //console.log(clase);

  var input=$("#id2").val();//recollir el que hi ha dins
  $("#id2").val("Adeu");//escric dintre d'una caixa de texte

  $("#id0").html("Bones!");//escric texte dins de l'h2 amb id0
  //console.log(input);

  // $("#id3").click(function(){
  //   alert("Has clicat al botó");
  // })

  // $("#id3").click(()=>{
  //   alert("Has clicat al botó");
  // })
  $("#id3").click(clicantBoto);





  
})

function clicantBoto(){
  alert("Hola")
}