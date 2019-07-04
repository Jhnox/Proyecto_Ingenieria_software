        <?php include 'util/helpers.php';
        if (!isset($_SESSION['RUT_USUARIO'])) {
          redirigir('login.php');
        }
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
          <title>Lista de Menu</title>
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

              <!-- Lista de menu a la Izquierda -->

              <div class="w3-twothird w3-container">
                <h1 class="w3-text-teal">Lista de Menus</h1>
                <div class="container">
                  <div class="w3-third w3-container">
                    <ul class="w3-ul w3-hoverable">
                      <li onclick="document.getElementById('id01').style.display='block'" >Menu 1</li>
                      <li onclick="document.getElementById('id02').style.display='block'">Menu 2</li>
                      <li onclick="document.getElementById('id03').style.display='block'">Menu 3</li>
                    </ul>
                  </div>


                </div>
              </div>

              <!-- Fin Lista de menu a la Izquierda -->

              <!-- Calendario a la derecha -->

              <div class="w3-third w3-container">
                <br>
                <br>
                <div id="calendar"></div>

              </div> 

              <!-- FIN Calendario a la derecha -->

              <!-- Modal de informacion de los menus -->
              
              <div id="id01" class="w3-modal">
               <div class="w3-modal-content w3-card-4 w3-animate-zoom">
                <header class="w3-container w3-blue"> 
                 <span onclick="document.getElementById('id01').style.display='none'" 
                 class="w3-button w3-blue w3-xlarge w3-display-topright">&times;</span>
                 <h2>Menu de 3500 calorias</h2>
               </header>

               <div class="w3-bar w3-border-bottom">
                 <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'London')">London</button>
                 <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'Paris')">Paris</button>
                 <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'Tokyo')">Tokyo</button>
               </div>

               <div id="London" class="w3-container city">
                 <h1>London</h1>
                 <p>London is the most populous city in the United Kingdom, with a metropolitan area of over 9 million inhabitants.</p>
                 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
               </div>

               <div id="Paris" class="w3-container city">
                 <h1>Paris</h1>
                 <p>Paris is the capital of France.</p>
                 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
               </div>

               <div id="Tokyo" class="w3-container city">
                 <h1>Tokyo</h1>
                 <p>Tokyo is the capital of Japan.</p><br>
               </div>

               <div class="w3-container w3-light-grey w3-padding">
                 <button class="w3-button w3-right w3-white w3-border" 
                 onclick="document.getElementById('id01').style.display='none'">Close</button>
               </div>
             </div>
           </div>

           <!-- Fin Modal de informacion de los menus -->


           <div id="id02" class="w3-modal">
             <div class="w3-modal-content w3-card-4 w3-animate-zoom">
              <header class="w3-container w3-blue"> 
               <span onclick="document.getElementById('id02').style.display='none'" 
               class="w3-button w3-blue w3-xlarge w3-display-topright">&times;</span>
               <h2> Menu de 2000 calorias</h2>
             </header>

             <div class="w3-bar w3-border-bottom">
               <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'Chile')">Chile</button>
               <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'Argentica')">Argentica</button>
               <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'Zimbambuew')">Zimbambuew</button>
             </div>

             <div id="Chile" class="w3-container city">
               <h1>Chile</h1>
               <p>London is the most populous city in the United Kingdom, with a metropolitan area of over 9 million inhabitants.</p>
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
             </div>

             <div id="Argentica" class="w3-container city">
               <h1>Argentica</h1>
               <p>Paris is the capital of France.</p>
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
             </div>

             <div id="Zimbambuew" class="w3-container city">
               <h1>Zimbambuew</h1>
               <p>Tokyo is the capital of Japan.</p><br>
             </div>

             <div class="w3-container w3-light-grey w3-padding">
               <button class="w3-button w3-right w3-white w3-border" 
               onclick="document.getElementById('id02').style.display='none'">Close</button>
             </div>
           </div>
         </div>

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