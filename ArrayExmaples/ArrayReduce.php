<?php

/**
 * Ejemplo de array reduce
 */


 include ("DataExample.php");

 /**
  * Contar cuantos apellidos se encuentran en la lista con una sola iteracion
  */

  echo "Lsita de apellidos repetidos";

  $Apellidos= array_reduce(ListaUsuarios,function($acumulador,$item){

    if(isset($item["apellido"])){
        $apellido=$item["apellido"];
        if(isset($acumulador[$apellido])){
            $acumulador[$apellido] +=1;
        }else{
            $acumulador[$apellido]=1;
        }
    }

    return $acumulador;
  });

 arsort($Apellidos);
  
  foreach($Apellidos as $apellido=>$veces){
      if ($veces>1){
        echo "El apellido $apellido esta $veces veces repetido".PHP_EOL;
      }
  }


/**
 * Obtener los objetos de los apellidos repetidos
 */

echo "Personas que tienen el mismo apellido".PHP_EOL;

$Apellidos= array_reduce(ListaUsuarios,function($Objetos,$item){
    if (isset($item["apellido"])) {
        $apellido = $item["apellido"];
        if (isset($Objetos[$apellido])) {
            $Objetos[$apellido]["counter"]+=1;
            if($Objetos[$apellido]["counter"]>1){
                $Objetos[$apellido][] = $item;
            }
        } else {
            $Objetos[$apellido]["counter"]=1;
            $Objetos[$apellido][] = $item;
        }
    }

    return $Objetos;
});

arsort($Apellidos);

foreach($Apellidos as $apellidos=>$objeto){

    print("Apellido $apellidos ----------".PHP_EOL);
    if($objeto["counter"]>1){
        
        print_r($objeto);
    }
}

?>