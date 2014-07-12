<?php
require_once("../Modelo/modelo.php");
require_once("entidadController.php");
$nombre=$_GET["action"];
class user {
    function  volverInicio () {
    	$resultadoEtiqueta=obtenerEtiquetas();
        $resultadoEditorial=obtenerEditoriales();
        $resultadoAutor= obtenerAutores();
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
        //DEBO INCLUIR UNA MARCA PARA MOSTRAR EL LIBRO MARCADO

        $id_carrito= buscaIdCarritoPorIdUsuario($_SESSION['id_usuario']);
        $carrito= obtenerLibrosEnCarrito($id_carrito['id_carrito']); //esto obtiene todo lo del carrito
        $arregloDeClaves= array();
        $r=0;
        foreach ($carrito as $key) {    //esto pone todas los id de los libros en un solo arreglo
            $arregloDeClaves[$r]= $key['id_libro'];
            $r++;
        }

        foreach ($todo as $key ) {
            if(in_array($key['id_libro'], $arregloDeClaves)){ //esto corrobora si existe o no para la marca respectiva
                $marca=true;
            }else{ 
                $marca=false;
            }
            $arrayNa[$i]=array('titulo' => $key[7] , 'editorial' => $key['nombre'] , 'autor'=>$key[19] ,
                'etiqueta' => $key[12] , 'precio' =>$key['precio'], 'referencia_foto'=>$key['referencia_foto'],
                'id_libro'=>$key['id_libro'], 'marca'=>$marca);
            $i++;
        }

		require_once("../cookbooksUsuario.php");
        //require_once("../cookBooksUsuario.php");
        
	}
}
?>
