<?php



function exporJson(string $fileName,array $listacilindros):void{
    file_put_contents($fileName,json_encode($listacilindros));
}


function exportListas(){
    include("DataExample.php");
    exporJson("DataExampleUsuarios.json",ListaUsuarios);
    exporJson("DataExampleCilindros.json",ListaCilindros);
    exporJson("DataExampleCilindrosAveriados.json",ListaCilindrosAveriados);
    exporJson("DataExampleCilindrosVerificar.json",ListaCilindrosVerificar);
}

exportListas();

?>