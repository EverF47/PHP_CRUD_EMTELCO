<?php
if(!empty($_GET["id"])){
    $id=$_GET["id"];
    $sql=$conexion->query("delete from tbl_personas where ID=$id ");
    if($sql==1){
        echo'<div class="alert alert success">Persona eliminada correcta mente</div>';
    }else{
        echo'<div class="alert alert danger>Error al eliminar</div>';
    }
}
?>