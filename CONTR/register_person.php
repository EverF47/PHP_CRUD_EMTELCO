<?php
if(!empty($_POST["btnenviar"])){
    if (!empty($_POST["dni"])and !empty($_POST["nombre"])and !empty($_POST["fecha"])and !empty($_POST["dir"])and !empty($_POST["tel"])){
        $dni=$_POST["dni"];
        $nombre=$_POST["nombre"];
        $fecha=$_POST["fecha"];
        $dir=$_POST["dir"];
        $tel=$_POST["tel"];

        $sql=$conexion->query("insert into tbl_personas(DNI,NOMBRE,FECNAC,DIR,TFNO)values('$dni','$nombre',' $fecha', '$dir','$tel')");
        if($sql==1){
                echo'<div class="alert alert-success">Persona registrado correctamente</div>';
            }else{
                echo'<div class="alert alert-danger">error al persona</div>';
            }
    }else{
        echo'<div class="alert alert-warning">alguno de los campos esta vacio </div>';
    }
}
?>
<br>