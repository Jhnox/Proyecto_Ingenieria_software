<?php


if (isset($_POST['submit'])) {
    if (empty($pass) or empty($pass2)) {
        echo '<div class=" container d-flex justify-content-center card-body">';
        echo '<p class="alert alert-danger" align="center">';
        echo 'No deben haber campos vacios ';
        echo '</p>';
        echo '</div>';
    } if ($pass === $pass2) {
        update($rtt, $pass);
    } else {
        echo '<div class=" container d-flex justify-content-center card-body">';
        echo '<p class="alert alert-danger" align="center">';
        echo 'Las contraseñas Deben ser iguales ';
        echo '</p>';
        echo '</div>';
    }
}
