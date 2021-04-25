<?php

/**
 * Obtener la columna de un array
 * 
 * Obtener los nombres de la lista ordenados alfabeticamente
 */
include("DataExample.php");
 $nombres = array_column(ListaUsuarios,"nombre");
asort($nombres);

 foreach($nombres as $nombre){
    $nombreToPrint=trim($nombre);
    echo "nombre: $nombreToPrint".PHP_EOL;
 }

echo PHP_EOL;
echo PHP_EOL;
/**
 * realizar una funcion para buscar el nombre de usuario en un array utilizando solo una iteracion
 */

function searchNombre(string $nombreabuscar){

    //obtener los nombres de la lista
    $nombres = array_column(ListaUsuarios,"nombre");
    $nombreabuscar=strtoupper($nombreabuscar);
    $resultado=array_reduce($nombres,function($nombresEncontrados,$nombre) use ($nombreabuscar){
        $posFound = strpos($nombre," ");
        if($posFound!==false){
            $fixedName=str_replace(" ","|",$nombre);
            $arrayName=explode("|",$fixedName);
            if($arrayName[0]==$nombreabuscar){
                $nombresEncontrados[]=$nombre;
            }
        }else{
            if(trim($nombre)==$nombreabuscar){
                $nombresEncontrados[]=$nombre;
            }
        }
        return $nombresEncontrados;
    });

    return $resultado;
 }

echo "-------------------------------------------------".PHP_EOL;
 print_r(searchNombre("sergio"));

?>