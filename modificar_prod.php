<?php

include "MOL/conexion.php";
$id=$_GET["id"];
$sql=$conexion->query("select * from tbl_personas where ID=$id ");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<form class="col-3 m-auto" method="POST">
        <h3 class="text-center">Censo</h3>

        <input type="hidden" name="id" value="<?=$_GET["id"]?>">

        <?php
        
        include "CONTR/modificar_prod.php";
        while ($datos=$sql->fetch_object()){ ?>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">DNI</label>
            <input type="text" class="form-control" name="dni" value="<?=$datos->DNI?>" >
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nombre de la persona</label>
            <input type="text" class="form-control" name="nombre" value="<?=$datos->NOMBRE?>" >
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Fecha de nacimiento</label>
            <input type="date" class="form-control" name="fecha" value="<?=$datos->FECNAC?>" >
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Dirección</label>
            <input type="text" class="form-control" name="dir" value="<?=$datos->DIR?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Teléfono</label>
            <input type="text" class="form-control" name="tel" value="<?=$datos->TFNO?>">
        </div>

        <?php }
        ?>
       
        <button type="submit" class="btn btn-primary" name="btnenviar" value="ok">Modificar Persona</button>
    </form>
</body>
</html>