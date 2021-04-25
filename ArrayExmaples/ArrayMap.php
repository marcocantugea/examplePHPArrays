<?php

/**
 * ejemplo con array map
 */

 /**
  * Tomar la lista de cilindros de data example y calcular el volumen del cilindro con solo una iteracion con una funcion
  * formula Volumen=PI*R^2*A
  * crear archivo cvs con el resultado con el siguiente formato
  * cilindro,radiocm,alturacm,volumen
  */

include ("DataExample.php");

$resultado = array_map(function($item){
    $item['volumen']=pi() * pow($item["RadioCm"], 2) * $item["alturaCm"];
    return $item;
}, ListaCilindros);

$out = fopen('cilindrosResultado.csv', 'w');
fputcsv($out,["cilindro","radiocm","alturacm","volumen"]);
foreach($resultado as $fila){
    fputcsv($out,$fila);
}
fclose($out);

?>