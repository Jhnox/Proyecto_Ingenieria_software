<?php

$rt = obtener_rut($rut);

/*function validaRut($rut){
    if(strpos($rut,"-")==false){
        $RUT[0] = substr($rut, 0, -1);
        $RUT[1] = substr($rut, -1);
        $suma =null;
    }else{
        $RUT = explode("-", trim($rut));
    }
    $elRut = str_replace(".", "", trim($RUT[0]));
    $factor = 2;
    for($i = strlen($elRut)-1; $i >= 0; $i--):
        $factor = $factor > 7 ? 2 : $factor;
        $suma += $elRut{$i}*$factor++;
    endfor;
    $resto = $suma % 11;
    $dv = 11 - $resto;
    if($dv == 11){
        $dv=0;
    }else if($dv == 10){
        $dv="k";
    }else{
        $dv=$dv;
    }
   if($dv == trim(strtolower($RUT[1]))){
       return true;
   }else{
       return false;
   }
}*/





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
        registrar($rut, $pass, $nombre, $apellido, $telefono, $email, $fech_nacimiento, $monto_disp, $peso, $altura);
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
