<?php


if (isset($_POST['submit'])) {
    if (empty($rut) or empty($nombre) or empty($apellido) or empty($telefono) or empty($email) or empty($fech_naci) or empty($monto_disp) or empty($peso) or empty($altura)) {
        echo '<div class=" container d-flex justify-content-center card-body">';
        echo '<p class="alert alert-danger" align="center">';
        echo 'No deben haber campos vacios ';
        echo '</p>';
        echo '</div>';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<div class=" container d-flex justify-content-center card-body">';
        echo '<p class="alert alert-danger" align="center">';
        echo 'El email no  es valido';
        echo '</p>';
        echo '</div>';
    } elseif (empty($pass) or empty($pass2)) {
        echo '<div class=" container d-flex justify-content-center card-body">';
        echo '<p class="alert alert-danger" align="center">';
        echo 'Las Contraseña no debe estar vacia';
        echo '</p>';
        echo '</div>';
    } elseif ($rut === $rt) {
        echo 'El Rut ingresado ya se encuentra registrado';
    } else {
        $rutvalido= RutValidate($rut);
        if ($rutvalido) {
           registrar($rut, $pass, $nombre, $apellido, $telefono, $email, $fech_nacimiento, $monto_disp, $peso, $altura);
        }else{
            echo '<div class=" container d-flex justify-content-center card-body">';
        echo '<p class="alert alert-danger" align="center">';
        echo 'Debe ingresar un Rut Valido';
        echo '</p>';
        echo '</div>';
        }
        
        
    }




/*
        if ($_POST['rut']) {
            if (validaRut($_POST['rut']) == true  ) {
                echo 'El rut '.$_POST['rut'].' es Valido';
            }else{
                echo 'El rut '.$_POST['rut'].' es invalido';
            }
        }




        if (empty($pass) or empty($pass2)) {
            echo '<div class=" container d-flex justify-content-center card-body">';
            echo '<p class="alert alert-danger" align="center">';
            echo 'Las Contraseña no debe estar vacia';
            echo '</p>';
            echo '</div>';
        }
    */

    /*



        if (empty($nombre)) {
            echo '<div class=" container d-flex justify-content-center card-body">';
            echo '<p class="alert alert-danger" align="center">';
            echo 'El nombre no debe estar vacio';
            echo '</p>';
            echo '</div>';
        }

        if (empty($apellido)) {
            echo '<div class=" container d-flex justify-content-center card-body">';
            echo '<p class="alert alert-danger" align="center">';
            echo 'El apellido no debe estar vacio';
            echo '</p>';
            echo '</div>';
        }

        if (empty($telefono)) {
            echo '<div class=" container d-flex justify-content-center card-body">';
            echo '<p class="alert alert-danger" align="center">';
            echo 'El telefono no debe estar vacio';
            echo '</p>';
            echo '</div>';
        }



        if (empty($fech_naci)) {
            echo '<div class=" container d-flex justify-content-center card-body">';
            echo '<p class="alert alert-danger" align="center">';
            echo 'La fecha de nacimiento no debe estar vacio';
            echo '</p>';
            echo '</div>';
        }

        if (empty($monto_disp)) {
            echo '<div class=" container d-flex justify-content-center card-body">';
            echo '<p class="alert alert-danger" align="center">';
            echo 'El Monto Disponible no debe estar vacio';
            echo '</p>';
            echo '</div>';
        }

        if (empty($peso)) {
            echo '<div class=" container d-flex justify-content-center card-body">';
            echo '<p class="alert alert-danger" align="center">';
            echo 'El peso no debe estar vacio';
            echo '</p>';
            echo '</div>';
        }

        if (empty($altura)) {
            echo '<div class=" container d-flex justify-content-center card-body">';
            echo '<p class="alert alert-danger" align="center">';
            echo 'La altura no debe estar vacia';
            echo '</p>';
            echo '</div>';
    }*/
}
