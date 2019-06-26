<?php include 'util/helpers.php';?>
<!DOCTYPE html>
<html>
<head>
    <title>login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!--Custom styles-->
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/Bootstrap.css">
    <link rel="stylesheet" href="css/fontawesome.css">


        
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
            background-repeat: no-repeat;
            height: 100%;
            font-family: 'Numans', sans-serif;
            }
        </style>
</head>
<body>
<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3>Login</h3>
                <div class="d-flex justify-content-end social_icon">
                    <!-- <span><i class="fab fa-facebook-square"></i></span>
                    <span><i class="fab fa-google-plus-square"></i></span>
                    <span><i class="fab fa-twitter-square"></i></span> -->
                </div>
            </div>
            <div class="card-body">
                <form method="post">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" name="rut" id="rut" placeholder="Nombre de usuario">

                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" name="pass" id="pass" class="form-control" placeholder="Contraseña">
                    </div>
                    <div class="row align-items-center remember">

                        <a href="registro.php">Registrase</a>
                    </div>
                    <br>
                    <div class="form-group">
                        <!-- <input type="submit" value="Login" class="btn float-right login_btn"> -->
                        <button class="btn btn-primary btn-block" type="submit">Login</button>
                        
                    </div>
                </form>
            </div>
            <div class="card-footer">
                
            </div>
        </div>
    </div>
</div>



<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $rut = $_POST["rut"];
    $pass = $_POST["pass"];
    $rt = iniciar_sesion($rut, $pass);
    if ($rt == false) {
        echo '<p class="alert alert-danger">';
        echo 'Rut y/o contraseña incorrectos';
        echo '</p>';
    } else {
        $_SESSION['RUT_USUARIO'] = $rt;
        $_SESSION['RUT_USUARIO'] = obtener_rut($rut);
        if ($_SESSION['id_perfil'] == 1) {
            // vamos a la página de administrador
            redirigir("index.php");
        } else {
            // vamos a la página de usuario normal
            redirigir("index.php");
        }
        redirigir("index.php");
    }
}
?>




</body>
</html>
