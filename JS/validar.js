
function validar() {
	var patron=/^[a-z\sñA-Z]+$/;
	var nom=document.getElementById('nombre').value;
	var tam = nom.length;
	if ((patron.test(nom)) && (nom.length <= 20)){
	
		return true;
	}
	else{
		//("ERROR EN EL INGRESO DE DATOS");
		alert("Debe ingresar solo letras mayusculas y minusculas");
		return false;
	}
}

function validaLibro(){
	var patron=/^[a-z\sñA-Z]+$/;
	var patronNumerico=/^[0-9]+$/;
	var nom=document.getElementById('nom_libro').value;
	var tam = nom.length;
	if ((patron.test(nom)) && (nom.length <= 30)){
		var nom=document.getElementById('isbn_libro').value;
		var tam = nom.length;
		if ((patronNumerico.test(nom)) && (nom.length > 0)){
			var nom=document.getElementById('cantHojas_libro').value;
			var tam = nom.length;
			if ((patronNumerico.test(nom)) && (nom.length > 0)){
				var nom=document.getElementById('cant_libro').value;
				var tam = nom.length;
				if ((patronNumerico.test(nom)) && (nom.length > 0)){
					var nom=document.getElementById('precio_libro').value;
					var tam = nom.length;
					if ((patronNumerico.test(nom)) && (nom.length > 0)){
					
						return true;
					}
					else{
						//("ERROR EN EL INGRESO DE DATOS");
						alert("CAMPO PRECIO: Debe ingresar solo numeros");
						return false;
					}
				}
				else{
					//("ERROR EN EL INGRESO DE DATOS");
					alert("CAMPO STOCK: Debe ingresar solo numeros enteros");
					return false;
				}
			}
			else{
				//("ERROR EN EL INGRESO DE DATOS");
				alert("CAMPO TOTAL DE PAGINAS: Debe ingresar solo numeros enteros");
				return false;
			}
		}
		else{
			//("ERROR EN EL INGRESO DE DATOS");
			alert("CAMPO ISBN: Debe ingresar solo numeros enteros");
			return false;
		}
	}
	else{
		//("ERROR EN EL INGRESO DE DATOS");
		alert("CAMPO NOMBRE: Debe ingresar solo letras mayusculas y minusculas");
		return false;
	}	
}

function validaUsuario(){
	var patron=/^[a-z\sñA-Z]+$/;
	var patronNumerico=/^[0-9]+$/;
	var nom=document.getElementById('nombre').value;
	var tam = nom.length;
	if ((patron.test(nom)) && (nom.length <= 30) && (nom.length > 2)){
		var nom=document.getElementById('apellido').value;
		var tam = nom.length;
		if ((patron.test(nom)) && (nom.length <= 30) && (nom.length > 2)){
			var nom=document.getElementById('telefono').value;
			var tam = nom.length;
			if ((patronNumerico.test(nom)) && (nom.length < 20) && (nom.length > 6) ){
				var nom=document.getElementById('dni').value;
				var tam = nom.length;
				if ((patronNumerico.test(nom)) && (nom.length > 3) && (nom.length < 9)){
					var nom=document.getElementById('nombreUsuario').value;
					var tam = nom.length;
					if ((patron.test(nom)) && (nom.length < 15) && (nom.length > 2)){
					
						return true;
					}
					else{
						//("ERROR EN EL INGRESO DE DATOS");
						alert("CAMPO NOMBRE DE USUARIO: Debe ingresar solo letras mayusculas y minusculas, minimo de 3");
						return false;
					}
				}
				else{
					//("ERROR EN EL INGRESO DE DATOS");
					alert("CAMPO DNI: Debe ingresar solo numeros enteros y una cantidad menor a 9");
					return false;
				}
			}
			else{
				//("ERROR EN EL INGRESO DE DATOS");
				alert("CAMPO TELEFONO: Debe ingresar solo numeros enteros, minimo de 7, maximo de 20 digitos");
				return false;
			}
		}
		else{
			//("ERROR EN EL INGRESO DE DATOS");
			alert("CAMPO APELLIDO: Debe ingresar solo letras mayusculas y minusculas, minimo de 3 caracteres, maximo de 30");
			return false;
		}
	}
	else{
		//("ERROR EN EL INGRESO DE DATOS");
		alert("CAMPO NOMBRE: Debe ingresar solo letras mayusculas y minusculas, minimo de 3 caracteres, maximo de 30");
		return false;
	}	
}

function validarBaja(){

	confirmar=confirm("¿Está seguro que desea darse de Baja del Sistema?"); 
	if (confirmar) 
		return true;
	else
		false;
}