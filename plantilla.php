<?php include 'util/helpers.php';?>
<!DOCTYPE html>
  <html lang="en">

  <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="css/Bootstrap.css">
      <link rel="stylesheet" href="css/styles.css">
      <link rel="stylesheet" href="w3/w3.css">

      <title>Plantilla</title>
  </head>

  <body>

    <!-- Sidebar (hidden by default) -->
<nav class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-left" style="display:none;z-index:2;width:35%;min-width:150px" id="mySidebar">
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

 


      <div class="container my-4">
      
      <div class="w3-row w3-padding-64">
            <div class="w3-twothird w3-container">
              
            </div>
            <div class="w3-third w3-container">
              <p class="w3-border w3-padding-large w3-padding-32 w3-center">AD</p>
              <p class="w3-border w3-padding-large w3-padding-64 w3-center">AD</p>
            </div>
          </div>

          <div class="w3-row">
            <div class="w3-twothird w3-container">
              <h1 class="w3-text-teal">Heading</h1>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum
                dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <div class="w3-third w3-container">
              <p class="w3-border w3-padding-large w3-padding-32 w3-center">AD</p>
              <p class="w3-border w3-padding-large w3-padding-64 w3-center">AD</p>
            </div>
          </div>

          <div class="w3-row w3-padding-64">
            <div class="w3-twothird w3-container">
              <h1 class="w3-text-teal">Heading</h1>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum
                dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <div class="w3-third w3-container">
              <p class="w3-border w3-padding-large w3-padding-32 w3-center">AD</p>
              <p class="w3-border w3-padding-large w3-padding-64 w3-center">AD</p>
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
</script>

      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>

  </html>
