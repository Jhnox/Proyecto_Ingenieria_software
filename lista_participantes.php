        <?php include 'util/helpers.php';
        if (!isset($_SESSION['RUT_USUARIO'])) {
          redirigir('login.php');
        }




        ?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
          <title>Lista Participantes</title>
          <!-- Required meta tags -->
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">

          <!-- Bootstrap CSS -->
          <link rel="stylesheet" href="css/Bootstrap.css">
          <link rel="stylesheet" href="w3/fontawesome.css">
          <link rel="stylesheet" href="w3/google-apis.css">
          <link rel="stylesheet" href="w3/w3-theme-black.css">
          <link rel="stylesheet" href="w3/w3.css">
          <script type="text/javascript" src="js/jquery-1.2.3.min.js"></script>
          <script type="text/javascript" src="js/jquery.func.js"></script>


          <link rel="stylesheet" href="css/calendar.css" media="screen">

          <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

          <style>
            html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif;}
            .w3-sidebar {
              z-index: 3;
              width: 250px;
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

          <style type="text/css">#calendar{margin:25px auto; width: auto;}</style>
          

          
        </head>

        <body>

          <!-- Sidebar (hidden by default) -->
          <nav class="w3-sidebar w3-bar-block w3-card w3-top w3-medium w3-animate-left" style="display:none;z-index:2;width:35%;min-width:150px" id="mySidebar">
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

          <!-- Coontenido -->


          <div class="container my-4">



            <div class="w3-row">

             

              <!-- Calendario a la derecha -->

              <div class="w3-third w3-container mt-5">
                <hr>
                <a href="participante_registrar.php" type="button"  class="btn btn-primary">Agregar Participante</a>

              </div> 

              <!-- FIN Calendario a la derecha -->

              <!-- Modal de informacion de los menus -->

              

                <div class="w3-container table-responsive">
                <h2>Lista de Participantes</h2>
                <p>Aqui se muestran los datos de los participantes que estan en esta cuenta.</p>

                <table class="w3-table-all w3-card-4">
                  <tr>
                    <th>Rut</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Peso</th>
                    <th>Altura</th>
                    <th>Fecha de nacimiento</th>
                  </tr>

                  <?php 
                  $rut_usuario = $_SESSION['RUT_USUARIO'];

                      $rec = recuperar_Participante($rut_usuario);
                      $cont = contadorParticipantes($rut_usuario);

              for ($i=0; $i < $cont ; $i++) { 

                $name = obtener_nombre($rut_usuario);
                $surname = obtener_apellido($rut_usuario);


                $rrt = $rec[$i]['rut'];
                $nombre = $rec[$i]['nombre'];
                $apellidos = $rec[$i]['apellidos'];
                $fech_nacimiento = $rec[$i]['fecha_nacimiento'];
                $peso = $rec[$i]['peso'];
                $altura = $rec[$i]['altura'];
                

                $j = $i+1;
                ?>


                  <tr>
                    <td><?php echo "$rtt" ?></td>
                    <td><?php echo "$nombre" ?></td>
                    <td><?php echo "$apellidos" ?></td>
                    <td><?php echo "$peso" ?></td>
                    <td><?php echo "$altura" ?></td>
                    <td><?php echo "$fech_nacimiento" ?></td>
                  </tr>


                  <?php 
                     }
                  ?>

                  
                </table>
              </div>

                

             


           <!-- Fin Modal de informacion de los menus -->




         </div>


       </div>

       <div class="w3-row w3-padding-64">
        <div class="w3-twothird w3-container">

        </div>
        <div class="w3-third w3-container">

        </div> 
      </div>



      <!-- Fin Contenido -->

      <!-- Footer -->

      <!-- Footer -->
      <footer class="w3-center w3-black w3-padding-64 w3-opacity w3-hover-opacity-off">

        <div class="w3-xlarge w3-section">
          <i class="fa fa-facebook-official w3-hover-opacity"></i>
          <i class="fa fa-instagram w3-hover-opacity"></i>
          <i class="fa fa-snapchat w3-hover-opacity"></i>
          <i class="fa fa-pinterest-p w3-hover-opacity"></i>
          <i class="fa fa-twitter w3-hover-opacity"></i>
          <i class="fa fa-linkedin w3-hover-opacity"></i>
        </div>
        <p>Powered by Juan</p>
      </footer>
      <!-- Fin Footer -->





      <!-- Script del calendario -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
      <script src="js/jquery-ui-datepicker.min.js"></script>
      <script>
        $('#calendar').datepicker({
          inline: true,
          firstDay: 1,
          showOtherMonths: true,
          dayNamesMin: ['Dom', 'Lun', 'Mar', 'Mier', 'Jue', 'Vie', 'Sab']
        });
      </script>




      <script>
            // Script para abrir y cerrar el menu lateral
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



         <!-- Script para abrir el modal de los menus -->
         <script>
          document.getElementsByClassName("tablink")[0].click();

          function openCity(evt, cityName) {
            var i, x, tablinks;
            x = document.getElementsByClassName("city");
            for (i = 0; i < x.length; i++) {
              x[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < x.length; i++) {
              tablinks[i].classList.remove("w3-light-grey");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.classList.add("w3-light-grey");
          }
        </script>


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      </body>

      </html>