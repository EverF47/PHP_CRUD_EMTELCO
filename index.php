<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP Ever Felipe Lopez</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/60b17e5d8b.js" crossorigin="anonymous"></script>
</head>


    <script>
      function eliminar(){
        var respuesta=confirm("estas seguro de querer eliminar?");
        return respuesta
      }
    </script>
    
    <h1 class="text-center p-3">CRUD PHP MYSQL</h1>
    <?php
    include "MOL/conexion.php";
    include "CONTR/eliminar_person.php";
    ?>

    <div class="container-fluid row">
        
        <form class="col-3" method="POST">
        <h3 class="text-center">Censo</h3>

        <?php
            include "CONTR/register_person.php";
        ?>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">DNI</label>
            <input type="text" class="form-control" name="dni" >
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nombre de la persona</label>
            <input type="text" class="form-control" name="nombre" >
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Fecha de nacimiento</label>
            <input type="date" class="form-control" name="fecha" >
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Dirección</label>
            <input type="text" class="form-control" name="dir" >
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Teléfono</label>
            <input type="text" class="form-control" name="tel" >
        </div>
        
        <button type="submit" class="btn btn-primary" name="btnenviar" value="ok">Enviar</button>
        </form>

        <div class="col-8 p-4">
            <table class="table table-hover table-bordered shadow-sm">
              <thead class="table-primary">
                <tr>
                  <th scope="col">IDEN</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">DNI</th>
                  <th scope="col">Fecha de Nacimiento</th>
                  <th scope="col">Dirección</th>
                  <th scope="col">Teléfono</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
              <?php
                include "MOL/conexion.php"; 
                $sql = $conexion->query("select * from tbl_personas");
                while($datos = $sql->fetch_object()){ ?>
                <tr>
                  <td><?=$datos->ID; ?></td>
                  <td><?=$datos->NOMBRE; ?></td>
                  <td><?=$datos->DNI; ?></td> 
                  <td><?=$datos->FECNAC; ?></td>
                  <td><?=$datos->DIR; ?></td>
                  <td><?=$datos->TFNO; ?></td>
                  <td> 
                    <a href="modificar_prod.php?id=<?= $datos->ID?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a onclick="return eliminar()" href="index.php?id=<?= $datos->ID?>" class="btn btn-small btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                 </td> 
                </tr>
                <?php } 
                ?>

            
        <form method="get" action="exportar_csv.php">
            <button type="submit" class="btn btn-success" class="text-center">Exportar a CSV</button>
        </form>


          <div class="container-fluid row">

          <form id="form-horario">

                      <h4>Seleccionar Horario</h4>
          <div class="mb-3">
              <label for="fecha" class="form-label">Fecha</label>
              <input type="date" id="fecha" name="fecha" class="form-control" required>
          </div>
          <div class="mb-3">
              <label for="hora" class="form-label">Hora</label>
              <select id="hora" name="hora" class="form-control" required>
              </select>
          </div>
          <button type="submit" class="btn btn-success">Reservar Horario</button>
        </form>

        <div id="resultado"></div>

        <script>
        document.getElementById('fecha').addEventListener('change', function() {
          var fecha = this.value;
          var xhr = new XMLHttpRequest();
          xhr.open('POST', 'CONTR/obtene_hor.php', true);
          xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
          xhr.onload = function() {
              document.getElementById('hora').innerHTML = xhr.responseText;
          };
          xhr.send('fecha=' + fecha);
          });

          document.getElementById('form-horario').addEventListener('submit', function(e) {
              e.preventDefault();

              var formData = new FormData(this);
              var xhr = new XMLHttpRequest();
              xhr.open('POST', 'CONTR/reserv_hor.php', true);
              xhr.onload = function() {
                  document.getElementById('resultado').innerHTML = xhr.responseText;
              };
              xhr.send(formData);
          });
      </script>

              </tbody>
            </table>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
