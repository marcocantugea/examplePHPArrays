<?php

/**
 * ejemplo de array_count
 */


 /**
  * Sacar una lista de los apellidos que se repitan si utilizar ninguna iteracion
  */

include("DataExample.php");

$resultado=array_count_values(array_column(ListaUsuarios,'apellido'));
arsort($resultado);
print_r($resultado);


?>