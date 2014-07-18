<?php
	require_once("../Modelo/modelo.php");
	$accion=$_GET["action"];
	class loginClase {
		function login () {

			require_once("../Modelo/modelo.php");
			$nombre=$_POST["username"];
			$pass=$_POST["password"];
			$prueba=logearse($nombre,$pass);
			if ($prueba!="error"){
				if (isset($prueba['nombreUsuario'])){
					//session_start();
					$_SESSION['usuario']=$prueba['nombreUsuario'];
					$idUsuario = $prueba['id_usuario'];
					setcookie("IdCookie", $idUsuario);
					if($prueba['id_permiso'] == 1) {// permiso=1 es Admin, distinto de 1 usuario
						$_SESSION['permiso']=1;	
						$_SESSION['id_usuario']= $idUsuario;
						require_once("../ADMIN/cookBooksAdmin.php");
					}													
					else{
						if ($prueba['id_permiso'] == 2) {
							$_SESSION['permiso']=2;
							$_SESSION['id_usuario']=$idUsuario;
							$resultadoAutor=obtenerAutores();
				        $resultadoEtiqueta=obtenerEtiquetas();
				        $resultadoEditorial=obtenerEditoriales();
				        $arrayNe = array();
				        $i=0;
				        foreach ($resultadoAutor as $key ) {
				            $arrayNe[$i]=array('nombre' => $key['nombre']);
				            $i++;
				        }
				        $arrayNo = array();
				        $i=0;
				        foreach ($resultadoEtiqueta as $key ) {
				        $arrayNo[$i]=array('nombre' => $key['nombre']);
				            $i++;
				        }
				        $i=0;
				        $arrayNu = array();
				        foreach ($resultadoEditorial as $key ) {
				            $arrayNu[$i]=array('nombre' => $key['nombre']);
				            $i++;
				        }
		                $todo=filtrarTodosLosLibros();
		                $arrayNa = array();
		                $i=0;

		                $id_carrito= buscaIdCarritoPorIdUsuario($idUsuario);
		                $carrito= obtenerLibrosEnCarrito($id_carrito['id_carrito']); //esto obtiene todo lo del carrito
				        $arregloDeClaves= array();
				        $r=0;
				        foreach ($carrito as $key) {    //esto pone todas los id de los libros en un solo arreglo
				            $arregloDeClaves[$r]= $key['id_libro'];
				            $r++;
				        }
				       // var_dump($todo);
		                foreach ($todo as $key ) {
		                	if(in_array($key['id_libro'], $arregloDeClaves)){ //esto corrobora si existe o no para la marca respectiva
				                $marca=true;
				            }else{ 
				                $marca=false;
				            }
		                    $arrayNa[$i]=array('titulo' => $key[7] , 'editorial' => $key['nombre'] , 'autor'=>$key[20] ,
		                        'etiqueta' => $key[13] , 'precio' =>$key['precio'], 'referencia_foto'=>$key['referencia_foto'],
		                        'id_libro'=>$key['id_libro'], 'marca'=>$marca, 'detalle_libro'=>$key['detalle_libro'], 
		                        'detalle_autor'=>$key['detalle']);
		                    $i++;
		                }
						require_once("../cookbooksUsuario.php");
							//require_once ('./cookbooksUsuario.php');
							//LA VARIABLE PASADA POR HEADER NO ES LO MAS LINDO PERO ES LO UNICO QUE SE ME OCURRIO PARA SAFARLA
						}						
					}
				}
				else{
					$noUsuario=true;
					//require_once("../cookbooks.php");
					header( "Location: ../PORTI/llamadaController.php?action=filtrar&clase=entidad&tipo=todos&noUsuario=".$noUsuario."" );
			//		echo "no existe un usuario asi en la bd";
				}
			}
			else 
	 			echo "no anda la conexion a la base de datos";
		}

	    function logout () {
				session_start();
				//$tmp=$_SESSION['URI'];
				$_SESSION = array();
				session_destroy();
				header( "Location: ../PORTI/llamadaController.php?action=filtrar&clase=entidad&tipo=todos" );
				//require_once("JAMP/cookbooks.php");
				//DEBERIA HACE VAR_DUMP DE ALGO PARA SABER SI LLEGA POR EL LOGOUT A ESTA FUNCION
		}
	}
?>
