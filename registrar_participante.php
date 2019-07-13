        <?php include 'util/helpers.php';?>
        <?php
        if (isset($_POST['submit'])) {
            $rut = $_POST['rut'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $fech_naci = $_POST['fech_naci'];
            $peso = $_POST['peso'];
            $altura = $_POST['altura'];

        }

        


        ?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="css/style.css">
            <link rel="stylesheet" href="css/Bootstrap.css">
            <link rel="stylesheet" href="w3/w3.css">
            <style>
                html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif;}
                .w3-sidebar {
                  z-index: 3;
                  width: 250px;
                  top: 45px;
                  bottom: 0;
                  height: inherit;
              }
              html,body{
                  background-image: url('img/fondo.jpg');
                  background-size: cover;
                  background-repeat: repeat-y;
                  height: 100%;
                  font-family: 'Numans', sans-serif;
              }
          </style>

          <title>Registrar Participante</title>
      </head>

      <body >


       <!-- Sidebar (hidden by default) -->
       <nav class="w3-sidebar w3-bar-block w3-card w3-top w3-medium w3-animate-left" style="display:none;z-index:2;width:45%;min-width:200px" id="mySidebar">
        <a href="javascript:void(0)" onclick="w3_close()"
        class="w3-bar-item w3-button">Cerrar Menu</a>
        <? imprimir_menu_privado(); ?>
        <? imprimir_menu_todos(); ?>
        <? imprimir_menu_acceso(); ?>
    </nav>

    <!-- Top menu -->
    <div class="w3-top">
        <div class="w3-white w3-xlarge" style="max-width:1200px;margin:auto">
          <div class="w3-button w3-padding-16 w3-left" onclick="w3_open()">☰</div>
          <div class="w3-right w3-padding-16"></div>
          <div class="w3-center w3-padding-16"><img src="img/icon.png" alt=""></div>
      </div>
  </div>    

  <!-- End Navbar -->


  <div class="my-4">
    <div class="row w3-padding-64">
        <div class="col-md-8 offset-md-2 my-4">
            <div class="card" style="background-color: rgb(0,0,0,0.5); opacity: 2.0;">
                <div class="card-header"><h4>Registrar</h4></div>
                <div class="card-body">
                    <form  method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" >
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label>Rut</label>
                                <input type="" class="form-control" id="rut" name="rut" 
                                value="<?php if (isset($rut)) {
                                    echo($rut);
                                } ?>" placeholder="12345678-9">

                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Juan" value="<?php if (isset($nombre)) {
                                    echo($nombre);
                                } ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Apellidos</label>
                                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Perez Perez" value="<?php if (isset($apellido)) {
                                    echo($apellido);
                                } ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="">Peso (kg)</label>
                                <input type="number" class="form-control" id="peso" name="peso" placeholder="73" value="<?php if (isset($peso)) {
                                    echo($peso);
                                } ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Altura (cm)</label>
                                <input type="number" class="form-control" id="altura" name="altura" placeholder="175" value="<?php if (isset($altura)) {
                                    echo($altura);
                                } ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="">Fecha de Nacimiento</label>
                                <input type="date" class="form-control" id="fech_naci" name="fech_naci" value="<?php if (isset($fech_naci)) {
                                    echo($fech_naci);
                                } ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <center>
                                    
                                <button 
                                    type="submit" 
                                    name="submit"
                                    class="btn btn-primary">
                                    Registrarse
                                </button>


                                <button type="reset" class="btn btn-primary">Limpiar</button>
                            </center>

                        </div>

                        <?php
                            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                                $rut = $_POST["rut"];
                                $nombre =$_POST["nombre"];
                                $apellidos = $_POST["apellido"];
                                $fech_naci = $_POST["fech_naci"];
                                $peso = $_POST["peso"];
                                $altura = $_POST['altura'];
                                $rt = $_SESSION['rut'];
                                $rut_participante = recuperar_Participante($rut);
                                if ($rut_participante === $rut) {
                                    echo '<div class="container d-flex justify-content-center card-body">';
                                    echo '<p class="alert alert-danger">';
                                    echo 'El rut ya se encuentra registrado '.$rut_participante;
                                    echo '</p>';
                                    echo '</div>';
                                }else{
                                  $rutvalido= RutValidate($rut);
                                  if ($rutvalido) {
                                    agregar_participante($rt, $rut, $nombre, $apellido, $fech_naci, $peso, $altura);
                                  }else{
                                      echo '<div class=" container d-flex justify-content-center card-body">';
                                  echo '<p class="alert alert-danger" align="center">';
                                  echo 'Debe ingresar un Rut Valido';
                                  echo '</p>';
                                  echo '</div>';
                                  }
                                    
                                    
                                }

                                
                                    
                                
                            }
                        ?>
                    </form>

                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
</div>

<script>
            // Script to open and close sidebar
            function w3_open() {
              document.getElementById("mySidebar").style.display = "block";
          }

          function w3_close() {
              document.getElementById("mySidebar").style.display = "none";
          }

          function salir(){
         var respuesta=confirm("¿Desea usted realmente salir?");
         if(respuesta==true)
             window.location="logout.php";
        else
             return 0;
        }
      </script>

      










                                <!-- Optional JavaScript -->
                                <!-- jQuery first, then Popper.js, then Bootstrap JS -->
                                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
                                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
                            </body>

                            </html>
