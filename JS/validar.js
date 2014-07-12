function validar() {
	//valida que no haya espacios en blanco al principio y a final
	//pero no lo hace con los intermedios
	var patron= /^[a-zA-Z]+/;
	var patronfin= /[a-zA-Z]+$/;
	var nom=document.getElementById('nombre').value;
	var tam = nom.length;
	if ((patron.test(nom)) && (nom.length <= 20) && (patronfin.test(nom))){
		return true;
	}
	else{
		//("ERROR EN EL INGRESO DE DATOS");
		alert("Debe ingresar solo letras mayusculas y minusculas");
		return false;
	}
}    

function validaLibro(){
	//se valida que los campos de numeros sean numeros
	//y que el nombre no tenga espacios blancos al principio ni al final
	//pero no en el medio	
	var patron= /^[a-zA-Z0-9]+/;
	var patronfin= /[a-zA-Z0-9]+$/;
	var patronNomLibro= /^[a-zA-Z0-9\s?]+$/;
	var patronNumerico=/^[0-9]+$/; 
	var nom=document.getElementById('nom_libro').value;
	var tam = nom.length;
	if ( (patron.test(nom)) && (nom.length <= 50) && (patronfin.test(nom)) && (patronNomLibro.test(nom))  ){
		var nom=document.getElementById('isbn_libro').value;
		var tam = nom.length;
		if ( (patronNumerico.test(nom)) && (nom.length == 13) ){
			var nom=document.getElementById('cantHojas_libro').value;
			var tam = nom.length;
			if ( (patronNumerico.test(nom)) && (nom.length > 0) ){
				var nom=document.getElementById('precio_libro').value;
				patronNumerico=/^\d*,?\d+$/;
				var tam = nom.length;
				if ( (patronNumerico.test(nom)) && (nom.length > 0) ){					
					return true;
				}
				else{
					alert("CAMPO PRECIO: Debe ingresar solo numeros, para decimales utilice el caracter ','");
					return false;
				}
			}
			else{
				alert("CAMPO TOTAL DE PAGINAS: Debe ingresar solo numeros enteros");
				return false;
			}
		}
		else{
			alert("CAMPO ISBN: Debe ingresar solo numeros enteros, exactamente 13 digitos");
			return false;
		}
	}
	else{
		alert("CAMPO NOMBRE: Debe ingresar solo numeros y/o letras mayusculas y/o minusculas, sin espacios blancos al inicio ni al final, maximo de 50 caracteres");
		return false;
	}	
}

function validaUsuario(){
	var patron=/^\s+$/;
	var patronNomApe= /^[a-zA-Z]+\s*[a-zA-Z]+$/;
	var patronNumerico=/^[0-9]+$/;
	var patronNomUsu= /^[a-zA-Z0-9]+$/;
	//var regexp= new RegExp('^[a-z0-9]{1,10}$');
	var nom=document.getElementById('nombre').value;
	var tam = nom.length;
	if ((patronNomApe.test(nom)) && (nom.length <= 30) && (nom.length > 2)){
		var nom=document.getElementById('apellido').value;
		var tam = nom.length;
		if ((patronNomApe.test(nom))	&&	(nom.length <= 30)	&&	(nom.length > 2)){
			var nom=document.getElementById('telefono').value;
			var tam = nom.length;
			if ((patronNumerico.test(nom)) && (nom.length < 20) && (nom.length > 6)){
				var nom=document.getElementById('dni').value;
				var tam = nom.length;
				if ((patronNumerico.test(nom)) && (nom.length > 3) && (nom.length < 15)){
					var nom=document.getElementById('nombreUsuario').value;
					var tam = nom.length;
					if ((patronNomUsu.test(nom)) && (nom.length < 15) && (nom.length > 2)){
						//return confirm('HOLA?');
						nom= document.getElementById('contrasena').value;
						tam=nom.length;
						if(patronNomUsu.test(nom) && (nom.length <15) && (nom.length > 2)){
							return true;
						}else{
							alert("CAMPO CONTRASENA: Debe letras mayusculas y/o minusculas y/o digitos del 0 al 9, minimo de 3, maximo de 14");
							return false;
						}						
					}
					else{
						//("ERROR EN EL INGRESO DE DATOS");
						alert("CAMPO NOMBRE DE USUARIO: Debe letras mayusculas y/o minusculas y/o digitos del 0 al 9, minimo de 3, maximo de 14");
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
			alert("CAMPO APELLIDO: Debe ingresar hasta 2 apellidos, solo letras mayusculas y minusculas, minimo de 3 caracteres, maximo de 30");
			return false;
		}
	}
	else{
		//("ERROR EN EL INGRESO DE DATOS");
		alert("CAMPO NOMBRE: Debe ingresar hasta 2 nombres, solo letras mayusculas y minusculas, minimo de 3 caracteres, maximo de 30");
		return false;
	}	
}

function validarBaja(){
	var confirmar=confirm("¿Está seguro que desea darse de Baja del Sistema?"); 
	alert(confirmar);
	if (confirmar){ 
		return true;
	}else{
		false;
	}
}

function validarRecuperaEmail(){
	var patron= /^[a-zA-Z0-9_\-\.~]{2,}@[a-zA-Z0-9_\-\.~]{2,}\.[a-zA-Z]{2,4}$/;
	var patronNomUsu= /^[a-zA-Z0-9]+$/;
	var email= document.getElementById('email').value;
	if(patron.test(email)){
		var nombre_usuario= document.getElementById('nombre_usuario').value;
		if( (patronNomUsu.test(nombre_usuario)) && (nombre_usuario.length <=30) && (nombre_usuario.length >2)){
			return true;
		}else{
			alert("Error ortografico en el Nombre de Usuario, se aceptan letras mayusculas y/o minusculas y/o digitos numericos");
			return false;
		}
	}
	alert("Error ortografico en la direccion de email");
	return false;
}

function confirmar(){
	confirmar= confirm("¿Está seguro que desea realizar esta operacion?");

	if(confirmar){
		return true;
	}else{
		return false;
	}
}

function validarAutor(){
	var patron= /^[a-zA-Z]+/;
	var patronfin= /[a-zA-Z]+$/;
	var patronTexto= /^[a-z\sA-Z]+$/;
	var nom=document.getElementById('nom_autor').value;
	var tam = nom.length;
	if ((patron.test(nom)) && (nom.length <= 20) && (patronfin.test(nom))){
		nom = document.getElementById('detalle_autor').value;
		if(	patron.test(nom)	&&	patronfin.test(nom)	&&	patronTexto.test(nom) && (nom.length <= 200) ){
			return true;			
		}else{
			if(nom.length == 0){
				confirmar=confirm("Por defecto el detalle será 'no posee'");
				return confirmar;
			}else{
				alert("El detalle no puede empezar ni terminar con espacios en blanco, y solamente acepta letras mayusculas y minusculas, con un maximo de 200 caracteres");
				return false;
			}
		}
	}
	else{
		//("ERROR EN EL INGRESO DE DATOS");
		alert("Debe ingresar solo letras mayusculas y minusculas en el nombre");
		return false;
	}	
}