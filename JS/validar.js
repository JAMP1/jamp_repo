function validar() {
	//valida que no haya espacios en blanco al principio y a final
	//pero no lo hace con los intermedios
	var patron= /^[a-zA-Z]+/;
	var patronfin= /[a-zA-Z]+$/;
	var patronNombre= /^[a-zA-Z]+$/;
	var nom=document.getElementById('nombre').value;
	var tam = nom.length;
	if ((patron.test(nom)) && (nom.length <= 20) && (patronfin.test(nom) && (patronNombre.test(nom)))){
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
				if ( (patronNumerico.test(nom)) && (nom.length > 0) && (nom.length <11) ){		
					nom=document.getElementById('detalle_libro').value;
					if(nom.length== 0){
						return confirm("ATENCION! Por defecto el detalle del libro sera 'NO POSEE', ¿desea continuar?");
					}else{			
						if(nom.length>=400){
							alert("CAMPO DETALLE: debe tener una longitud maxima de 400 caracteres, contando espacios en blanco");
							return false;
						}else{
							return true;
						}
					}	
				}
				else{
					alert("CAMPO PRECIO: Debe ingresar solo numeros, hasta 10 digitos, para decimales utilice el caracter ','");
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
				confirmar=confirm("Por defecto el detalle sera 'no posee'");
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

function validarTarjeta(){
	var patronNumerico=/^[0-9]+$/;
	var patronFecha= new RegExp("(((0[123456789]|10|11|12)/(([2][0-1][1-9][0-9]))))");
	var num= document.getElementById('numero_tarjeta').value;
	if(patronNumerico.test(num) && num.length>11 && num.length<17){
		num= document.getElementById('numero_seguridad').value;
		if(patronNumerico.test(num) && num.length>2 && num.length<7){
			num= document.getElementById('fecha_vencimiento').value;
			if(patronFecha.test(num)){
				return confirm("Datos correctos, ¿desea confirmar la compra?");
			}else{
				alert("FECHA: debe ingresar un mes y un año con el formato 'mm/aaaa' ");
				return false;
			}
		}else{
			alert("NUMERO DE SEGURIDAD: debe tener de 3 a 6 digitos numericos");
			return false;
		}
	}else{
		alert("NUMERO DE TARJETA: debe tener entre 12 y 16 digitos numericos");
		return false;
	}
}

function confirmaCompra(){
	return confirm("¿Desea efectuar la compra por el total establecido?");
}

function validarFechaParaBusqueda(){
	/*var patronFecha= new RegExp(" ( ([2][01][01][0123456789])/(0[123456789]|10|11|12)/([0][123456789]|[12][0123456789]|[3][01]) ) ");
	var num= new RegExp("([2][0][0-1][0-9])");*/
	/*var fechaIni= document.getElementById('fecha_inicial');
	var fechaFin= document.getElementById('fecha_final');
	alert(fechaIni>fechaFin);
	alert(fechaFin>fechaIni);
	if (fechaIni >= fechaFin) {
		alert("ERROR! La fecha de inicio debe ser menor que la fecha de fin");
		return false;
	}else{
		return true;
	}*/
}


/*function actualizar(){
	var array=document.getElementsByClassName('hola');
	var suma=0;
	var umpalumpa="<input type=text value="
	for (var i = 0; i < array.length; i++) {
	  suma=parseInt(array[i].value)+suma ;
	}
	var res = umpalumpa.concat(suma);
	var res2=res.concat(">")
	document.getElementById("myDiv").innerHTML=res2;
}*/

function actualizar(){
	var array=document.getElementsByClassName('cantidadLibroEnCarrito');
	var precios=document.getElementsByClassName('precios');
	var suma=0;
	var stringCantidades= "";
	var stringPrecios= "";
	var precio=0;
	var umpalumpa="Precio total <span class='glyphicon glyphicon-usd'></span><p>";
	for (var i = 0; i < array.length; i++) {
		var str= precios[i].value;
		precio= str.replace(",",".");
		cantidad= parseFloat(array[i].value);
		if(! isNaN(cantidad)){
			stringCantidades = stringCantidades.concat(cantidad);
			stringCantidades = stringCantidades.concat(" ");
			stringPrecios = stringPrecios.concat(precio);
			stringPrecios = stringPrecios.concat(" ");
			suma=(parseFloat(array[i].value)*parseFloat(precio)) +suma ;
		}
	}
	var str= suma.toString();
	var indiceDeComa= str.indexOf(".");
	if(indiceDeComa != -1){
		var cachoEntero= str.substr(0, indiceDeComa);
		var cachoDecimal= str.substr(indiceDeComa, 3);
		str = cachoEntero.concat(cachoDecimal);
	}
	var res = umpalumpa.concat(str);
	var res2=res.concat("</p><input type=hidden name=precioTotal value=");
	res = res2.concat(str);
	res2 = res.concat(">");
	res = res2.concat("<input type=hidden name=stringCantidades value='");
	res = res.concat(stringCantidades);
	res2= res.concat("'>");
	res = res2.concat("<input type=hidden name=stringPrecios value='");
	res = res.concat(stringPrecios);
	res2= res.concat("'>");
	document.getElementById("total").innerHTML=res2;
}
