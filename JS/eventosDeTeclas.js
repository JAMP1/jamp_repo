function presionaTecla(){

	if(window.event.altKey==1 && window.event.keyCode==76){
		var asco=" <form action=/JAMP/PORTI/llamadaController.php?action=altaLibro&clase=entidad method=post name=pindonga></form> ";
		document.getElementById('socalo').innerHTML=asco;
		document.pindonga.submit();

		//return confirm();
		//window.location.href ='/JAMP/vistaAltaLibro.php';
	}
	if(window.event.altKey==1 && window.event.keyCode==65){
		var asco=" <form action=/JAMP/PORTI/llamadaController.php?action=registroAdmin&clase=entidad method=post name=pindonga></form> ";
		document.getElementById('socalo').innerHTML=asco;
		document.pindonga.submit();
	}
	if(window.event.altKey==1 && window.event.keyCode==67){
		var asco=" <form action=/JAMP/PORTI/llamadaController.php?action=cargarCarritosAdmin&clase=entidad method=post name=pindonga></form> ";
		document.getElementById('socalo').innerHTML=asco;
		document.pindonga.submit();
	}
	if(window.event.altKey==1 && window.event.keyCode==86){
		var asco=" <form action=/JAMP/PORTI/llamadaController.php?action=verVentasGenerales&clase=entidad method=post name=pindonga></form> ";
		document.getElementById('socalo').innerHTML=asco;
		document.pindonga.submit();
	}
}