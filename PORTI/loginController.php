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
						

					if($prueba['id_permiso'] == 1) {// permiso=1 es Admin, distinto de 1 usuario
						$_SESSION['permiso']=1;

						require_once("../ADMIN/cookBooksAdmin.php");
					}
													
					else{
						$_SESSION['permiso']=2;
						echo "todo bien :)";}
					}
				else
					echo "no existe un usuario asi en la bd";

				}
			else 
	 			echo "no anda la conexion a la base de datos";
		}

	    function logout () {
				session_start();
				//$tmp=$_SESSION['URI'];
				$_SESSION = array();
				session_destroy();
				header( "Location: /JAMP/cookbooks.php" );
		}
	}
?>
