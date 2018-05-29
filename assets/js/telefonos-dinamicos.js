//----- Jquery para teléfonos dinámicos
var tels = ["55 5416 3979", "55 7012 2023", "55 1379 3901"];
aleatorio = tels[Math.floor(Math.random() * (tels.length))];
$(".tel-aleatorio").text(aleatorio)
$('.linkTel').attr('href', "tel:" + aleatorio);