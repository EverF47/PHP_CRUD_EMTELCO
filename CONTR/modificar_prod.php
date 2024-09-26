<?php

if(!empty($_POST["btnenviar"])){
    if(!empty($_POST["dni"])and !empty($_POST["nombre"])and !empty($_POST["fecha"]) and !empty($_POST["tel"])){   
        $id=$_POST["id"];
        $dni=$_POST["dni"];
        $nombre=$_POST["nombre"];
        $fecha=$_POST["fecha"];
        $dir=$_POST["dir"];
        $tel=$_POST["tel"];
        $sql=$conexion->query("update tbl_personas set DNI='$dni',NOMBRE='$nombre',FECNAC='$fecha',DIR='$dir',TFNO=$tel where ID=$id");
        if($sql==1){
            header("location:index.php");
        }else{
            echo"<div class=' alert alert-danger'>Error al modificar persona </div>";
        }
        
    }else{
        echo"<div class=' alert alert-warning'>Campos Vacios </div>";
    }
}