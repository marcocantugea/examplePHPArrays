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

echo ' buscar de la lista los cilindros  dublicados con el campo de cilindro de la informacion de ListaCilindrosVerificar'.PHP_EOL;
/**
 * buscar de la lista los cilindros  dublicados con el campo de cilindro de la informacion de ListaCilindrosVerificar
 */

//obtenemos la columna de los cilindros a verificar
$CilindrosVerificar=array_column(ListaCilindrosVerificar,"cilindro");

//revisamos si exista mas de n veces
$ContadorDeCilindros=array_reduce($CilindrosVerificar,function($retunArray,$item){
    if(isset($retunArray[$item])){
        $retunArray[$item]['contador']++;
    }else{
        $retunArray[$item]['contador']=1;
    }
    return $retunArray;
});

//filtramos cuales esetan repetidos
$CilindrosRepetidos=array_filter($ContadorDeCilindros,function($item){
    return $item['contador']>1;
});

$DatosCilindros=array_filter(ListaCilindros,function($item) use ($CilindrosRepetidos){
    return in_array($item['cilindro'],array_keys($CilindrosRepetidos));
});

echo "cilindro repetidos...".PHP_EOL;
// imprimimos los cilindros repetidos
foreach($DatosCilindros as $cilindro){
    echo "Cilindro: ".$cilindro["cilindro"]." RadioCm:".$cilindro["RadioCm"]." alturaCm:".$cilindro['alturaCm'].PHP_EOL;
}

?>