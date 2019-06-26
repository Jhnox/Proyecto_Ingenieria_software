<?php
include 'util/helpers.php';

session_start();
session_unset();
session_destroy();

redirigir("login.php");
