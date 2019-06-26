<?php

function conectar()
{
    $host = "localhost";
    $username = "root";
    $passwd = "12345678";
    $dbname = "aplicacionsaludable";
    $conn = new mysqli($host, $username, $passwd, $dbname);
    if ($conn->connect_error) {
        die('Error de conexión: ' . $conn->connect_error);
    }
    return $conn;
}
