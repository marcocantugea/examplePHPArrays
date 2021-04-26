<?php

/**
 * ejemplo de array diff
 */

 /**
  * Obtener los cilindros que no esten averiados. 
  */
include("DataExample.php");

$averiados=array_column(ListaCilindrosAveriados, 'cilindro');
$listaCilindros=array_column(ListaCilindros, 'cilindro');

$CilindrosEnfuncionamiento = array_diff($listaCilindros, $averiados);

foreach ($CilindrosEnfuncionamiento as $cilindo) {
    echo "cilindro en funcionamiento $cilindo" . PHP_EOL;
}



/**
 * obtener el listado de los cilindros en funcionamiento pero su volumen sea mayor a 300
 */
$listaCilindrosAveriados=array_column(ListaCilindrosAveriados,'cilindro');

$CilindrosAConsiderar = array_udiff(ListaCilindros,ListaCilindros,function($cilindro) use ($listaCilindrosAveriados){
    //obtener el volumen
    $volumen=pi() * pow($cilindro["RadioCm"], 2) * $cilindro["alturaCm"];

    //si esta averiado no obtengo el objeto
    if(in_array($cilindro['cilindro'],$listaCilindrosAveriados)){
        return 0;
    }

    // si es mayor a 300 no obtengo el objeto
    if($volumen<300){
        return 0;
    }

    return 1;
});

foreach ($CilindrosAConsiderar as $cilindro) {
    $volumen=pi() * pow($cilindro["RadioCm"], 2) * $cilindro["alturaCm"];
    echo $cilindro['cilindro'].",".$volumen.PHP_EOL;
}

?>