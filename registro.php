    <?php include 'util/helpers.php';?>
    <?php
        if (isset($_POST['submit'])) {
            $rut = $_POST['rut'];
            $pass = $_POST['pass'];
            $pass2 = $_POST['pass2'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $telefono = $_POST['telefono'];
            $email = $_POST['email'];
            $fech_naci = $_POST['fech_naci'];
            $monto_disp = $_POST['monto_disp'];
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
            color: white;
            }
            

    </style>

    <title>Registro</title>
</head>

<body >
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Aplicacion Saludable</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" aria-disabled="true" href="index.php">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="registro.php">Registro</a>
                </li>
            </ul>
           
                
                <a href="login.php" class="btn btn-outline-success my-2 my-sm-0" role="button" >Login</a>
            
        </div>
    </nav>
    
    <div class="row">
        <div class="col-md-8 offset-md-2 my-4">
            <div class="card" style="background-color: rgb(0,0,0,0.5); opacity: 2.0;">
                <div class="card-header"><h4>Registrar</h4></div>
                <div class="card-body">
                    <form  method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" >
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label>Rut</label>
                                <input type="" class="form-control" id="rut" name="rut" 
                                value="<?php if(isset($rut)) echo($rut) ?>" placeholder="123456789">
                                
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Contraseña</label>
                                <input type="password" class="form-control" id="pass" name="pass" placeholder="Contraseña">
                                <span id="msj-pass"></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Repetir contraseña</label>
                                <input type="password" class="form-control" id="pass2" name="pass2" placeholder="Repetir Contraseña">
                                <span id="msj-pass2"></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Juan" value="<?php if(isset($nombre)) echo($nombre) ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Apellidos</label>
                                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Perez Perez" value="<?php if(isset($apellido)) echo($apellido) ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="">Telefono</label>
                                <input type="number" class="form-control" id="telefono" name="telefono" placeholder="912345678" value="<?php if(isset($telefono)) echo($telefono) ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">E-mail</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="juan@gmail.com" value="<?php if(isset($email)) echo($email) ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="">Fecha de Nacimiento</label>
                                <input type="date" class="form-control" id="fech_naci" name="fech_naci" value="<?php if(isset($fech_naci)) echo($fech_naci) ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Monto Disponible ($)</label>
                                <input type="number" class="form-control" id="monto_disp" name="monto_disp" placeholder="250000" value="<?php if(isset($monto_disp)) echo($monto_disp) ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="">Peso (kg)</label>
                                <input type="number" class="form-control" id="peso" name="peso" placeholder="73" value="<?php if(isset($peso)) echo($peso) ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Altura (cm)</label>
                                <input type="number" class="form-control" id="altura" name="altura" placeholder="175" value="<?php if(isset($altura)) echo($altura) ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <center>
                                <button type="submit" name="submit" class="btn btn-primary">Registrarse</button>
                                <button type="reset" class="btn btn-primary">Limpiar</button>
                            </center>

                        </div>
                        
                        <?php include('util/validaciones.php'); ?>
                        
                        </form>

                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>


 






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>