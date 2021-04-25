<?php



function exportListaUsuarios(array $listaUsuarios):void{
    file_put_contents("DataExampleUsuarios.json",json_encode($listaUsuarios));
}

function exportListaCilindros(array $listacilindros):void{
    file_put_contents("DataExampleCilindros.json",json_encode($listacilindros));

}

function exportListas(){
    include("DataExample.php");
    exportListaUsuarios(ListaUsuarios);
    exportListaCilindros(ListaCilindros);
}

exportListas();

?>