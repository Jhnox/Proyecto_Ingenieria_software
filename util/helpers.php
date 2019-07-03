    <?php

    session_start();
    ob_start();

    include 'db/db_funciones.php';


    function is_valid_email($email)
    {
        return (false !== strpos($email, "@") && false !== strpos($email, "."));
    }

    function redirigir($pagina)
    {
        header('Location: http://localhost/apps/' . $pagina);
        ob_end_flush();
    }



    function imprimir_menu_acceso()
    {
        if (isset($_SESSION['RUT_USUARIO'])) {
            $RUT_USUARIO = $_SESSION['RUT_USUARIO'];
            $name = obtener_nombre($RUT_USUARIO);
            echo '<a class="w3-bar-item w3-button" href="logout.php">' . $name . ' (Salir)</a>';
        } else {
            echo '<a class="w3-bar-item w3-button" href="registro.php">Registrar</a>
                    ','<a class="w3-bar-item w3-button" href="login.php">Acceder</a>';
        }
    }
    

    function imprimir_menu_todos()
    {
        echo '<a class="w3-bar-item w3-button" href="index.php">Inicio</a>';
    }



    function imprimir_menu_privado()
    {
        if (isset($_SESSION['RUT_USUARIO'])) {
            $RUT_USUARIO = $_SESSION['RUT_USUARIO'];
            $id_rol = obtener_rol($RUT_USUARIO);
            if ($id_rol == 1) {
                echo '<a class="w3-bar-item w3-button" href="registro.php">Lista de Menus</a>';
                echo '<a class="w3-bar-item w3-button" href="registro.php">Pedidos</a>';
                echo '<a class="w3-bar-item w3-button" href="registro.php">Contacto</a>';
            } else {
                echo '<a class="w3-bar-item w3-button" href="registro.php">Lista de Menus</a>';
                echo '<a class="w3-bar-item w3-button" href="registro.php">Pedidos</a>';
                echo '<a class="w3-bar-item w3-button" href="registro.php">Contacto</a>';
            }
        }
    }

    function validar_admin()
    {
        if (isset($_SESSION['id_usuario'])) {
            $id_usuario = $_SESSION['id_usuario'];
            $id_rol = obtener_id_perfil($id_usuario);
            if ($id_rol != 1) {
                redirigir("user_home.php");
            }
        } else {
            redirigir("login.php");
        }
    }
    function recoverpass()
    {
        if (isset($_SESSION['id_usuario'])) {
            $id_usuario = $_SESSION['id_usuario'];
            $id_rol = obtener_id_perfil($id_usuario);
            if ($id_rol != 1) {
                redirigir("user_home.php");
            }
        } else {
            redirigir("login.php");
        }
    }

    function validar_usuario()
    {
        if (isset($_SESSION['id_usuario'])) {
            $id_usuario = $_SESSION['id_usuario'];
            $id_rol = obtener_id_perfil($id_usuario);
            if ($id_rol != 2) {
                redirigir("index.php");
            }
        } else {
            redirigir("login.php");
        }
    }
