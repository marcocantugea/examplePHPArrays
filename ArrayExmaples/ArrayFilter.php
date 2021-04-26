<?php

/**
 * Ejemplo de array filter
 *
 */

 /**
  * Buscar los cilindros averiados y obtener sus datos del los datos definidos con una sola iteracion
  */

  include("DataExample.php");

  $listaCilindrosaveriados=array_column(ListaCilindrosAveriados,'cilindro');
  $cilindrosAveriados=array_filter(ListaCilindrosVerificar,function($item) use ($listaCilindrosaveriados) {
    return in_array($item['cilindro'],$listaCilindrosaveriados);
  });

  print_r($cilindrosAveriados);

?>