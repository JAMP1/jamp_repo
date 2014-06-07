
function validar() {
	var patron=/^[a-z\sñA-Z]+$/;
	var nom=document.getElementById('nombre').value;
	var tam = nom.length;
	if ((patron.test(nom)) && (nom.length <= 20)){
	
		return true;
	}
	else{
		return false;
	}
}

