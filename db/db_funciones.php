    <?php

    include 'conexion.php';

    function registrar($rut, $pass, $nombre, $apellido, $telefono, $email, $fech_naci, $monto_disp, $peso, $altura)
    {
        $conn = conectar();
        // $pass = crypt($pass, "bloqueo");
        //$correo_usuario = obtener_email($rut);
        $rut_usuario = obtener_rut($rut);
        


        $sql = "insert into usuario (RUT_USUARIO, NOMBRE_USUARIO, rol_ID, APELLIDO_USUARIO, MONTO_DISPONIBLE, FECHA_NACIMIENTO, PESO, ALTURA, PASS, TELEFONO, EMAIL)"
                . "values ('" . $rut . "','" . $nombre . "', 2 ,'" . $apellido . "'," . $monto_disp . ",'".$fech_naci."',".$peso.",".$altura.",'".$pass."',".$telefono.",'".$email."')";

        if ($conn->query($sql) === false) {
            if (($rut_usuario === $rut)) {
                echo '<div class="container d-flex justify-content-center card-body">';
                echo '<p class="alert alert-danger">';
                echo 'El rut ya se encuentra registrado ';
                echo '</p>';
                echo '</div>';
            } else {
                echo '<div class="container d-flex justify-content-center card-body">';
                echo '<p class="alert alert-danger">';
                echo 'Error al registrarse ' . $conn->error;
                echo '</p>';
                echo '</div>';
            }
        } else {
            echo '<div class="w3-text-white container d-flex justify-content-center ">';
            echo '<p class="">';
            echo '<a class="w3-bar-item w3-button" href="registrar_participante.php">Agregar Participantes</a>';
            echo '<a class="w3-bar-item w3-button" href="index.php">Login</a>';
            echo '</p>';
            echo '</div>';
            echo '<div class=" container d-flex justify-content-center card-body">';
            echo '<p class="alert alert-info">';
            echo 'El registro de ' . $nombre .' '.$apellido. ' se ha completado satisfactoriamente';
            echo '</p>';
            echo '</div>';
            
        }
        $conn->close();
    }

     function agregar_participante($rut_usuario, $rut, $nombre, $apellido, $fech_naci, $peso, $altura)
    {
        $conn = conectar(); 
        $rt_participante = recuperar_Participante($rut);
        


        $sql = "insert into participante (RUT_USUARIO, RUT, NOMBRE, APELLIDOS, FECHA_NACIMIENTO, PESO, ALTURA)"
                . "values ('" . $rut_usuario ."','".$rut. "','" . $nombre . "','" . $apellido . "','".$fech_naci."',".$peso.",".$altura.")";

        if ($conn->query($sql) === false) {
            if (($rt_participante === $rut)) {
                echo '<div class="container d-flex justify-content-center card-body">';
                echo '<p class="alert alert-danger">';
                echo 'El rut ya se encuentra registrado '.$rt_participante;
                echo '</p>';
                echo '</div>';
            } else {
                echo '<div class="container d-flex justify-content-center card-body">';
                echo '<p class="alert alert-danger">';
                echo 'Error al registrarse ' . $conn->error.' '.$rt_participante;
                echo '</p>';
                echo '</div>';
            }
        } else {
            echo '<div class="w3-text-white container d-flex justify-content-center ">';
            echo '<p class="">';
            echo '<a class="w3-bar-item w3-button" href="registrar_participante.php">Agregar Participantes</a>';
            echo '<a class="w3-bar-item w3-button" href="login.php">login</a>';
            echo '</p>';
            echo '</div>';
            echo '<div class=" container d-flex justify-content-center card-body">';
            echo '<p class="alert alert-info">';
            echo 'Se agregó a  ' . $nombre .' '.$apellido. ' como un nuevo participante';
            echo '</p>';
            echo '</div>';
            
        }
        $conn->close();
    }

    function update($rut, $pass)
    {
        $conn = conectar();


        $sql = "update usuario set PASS = '".$pass."' where RUT_USUARIO = '".$rut."'";

        if ($conn->query($sql) === false) {
                echo '<div class="container d-flex justify-content-center card-body">';
                echo '<p class="alert alert-danger">';
                echo 'Error al registrarse ' . $conn->error;
                echo '</p>';
                echo '</div>';
        } else {
            echo '<div class=" container d-flex justify-content-center card-body">';
            echo '<p class="alert alert-info">';
            echo 'Se actualizo la contraseña';
            echo '</p>';
            echo '</div>';

            echo '<div class=" container d-flex justify-content-center card-body">';
            echo '<a class="w3-panel w3-border-left w3-border-blue" href="login.php">Login</a>';
            echo '</div>';
        }
        $conn->close();
    }

    function obtener_email($rut)
    {
        $conn = conectar();
        $sql = "select * from usuario where RUT_USUARIO = '" . $rut."'" ;
        $result = $conn->query($sql);
        $conn->close();
        if ($result->num_rows > 0) {
            while ($fila = $result->fetch_assoc()) {
                $email = $fila["EMAIL"];
                return $email;
            }
        } else {
            return false;
        }
    }


    function recuperarpass($rut, $email)
    {

        $conn = conectar();
        $sql = "select * from usuario where RUT_USUARIO = '" . $rut."' and EMAIL = '".$email."'" ;
        $result = $conn->query($sql);
        $conn->close();
        if ($result->num_rows > 0) {
            while ($fila = $result->fetch_assoc()) {
                $rut = $fila["RUT_USUARIO"];
                return $rut;
            }
        } else {
            return false;
        }
    }





    function obtener_rut($rut)
    {
        $conn = conectar();
        $sql = "select * from usuario where RUT_USUARIO = '" . $rut."'" ;
        $result = $conn->query($sql);
        $conn->close();
        if ($result->num_rows > 0) {
            while ($fila = $result->fetch_assoc()) {
                $rut = $fila["RUT_USUARIO"];
                return $rut;
            }
        } else {
            return false;
        }
    }
function obtener_participante($rut)
    {
        $conn = conectar();
        $sql = "select * from participante where rut = '" . $rut."'" ;
        $result = $conn->query($sql);
        $conn->close();
        if ($result->num_rows > 0) {
            while ($fila = $result->fetch_assoc()) {
                $rut = $fila["rut"];
                
            }
            return $rut;
        } else {
            return false;
        }
    }
    

     
    function obtener_rol($RUT_USUARIO)
    {

        $conn = conectar();
        $sql="select rol_ID from USUARIO where RUT_USUARIO = '".$RUT_USUARIO."'";
       
        $result = $conn->query($sql);
        $conn->close();
        if ($result->num_rows > 0) {
            while ($fila = $result->fetch_assoc()) {
                $rol = $fila["rol_ID"];
                return $rol;
            }
        } else {
            return false;
        }
    }

    function obtener_nombre($rut)
    {
        $conn = conectar();
        $sql = "select * from usuario where RUT_USUARIO = '" . $rut."'" ;
        $result = $conn->query($sql);
        $conn->close();
        if ($result->num_rows > 0) {
            while ($fila = $result->fetch_assoc()) {
                $name = $fila["NOMBRE_USUARIO"];
                return $name;
            }
        } else {
            return false;
        }
    }

    function obtener_apellido($rut)
    {
        $conn = conectar();
        $sql = "select * from usuario where RUT_USUARIO = '" . $rut."'" ;
        $result = $conn->query($sql);
        $conn->close();
        if ($result->num_rows > 0) {
            while ($fila = $result->fetch_assoc()) {
                $surname = $fila["APELLIDO_USUARIO"];
                return $surname;
            }
        } else {
            return false;
        }
    }


    function iniciar_sesion($rut, $pass)
    {
        $conn = conectar();
        $sql = "select * from usuario where RUT_USUARIO = '" . $rut . "'"
                . "and PASS = '" . $pass . "'";
        $result = $conn->query($sql);
        $conn->close();
        if ($result->num_rows > 0) {
            while ($fila = $result->fetch_assoc()) {
                $rut = $fila["RUT_USUARIO"];
                return $rut;
            }
        } else {
            return false;
        }
    }

    function recuperarDatos(){
        $conn = conectar();
        $sql = "select * from menu";
        $result = $conn->query($sql);

        

        $conn->close();
        if ($result->num_rows > 0) {
            while ($fila = $result->fetch_assoc()) {
                $menu[] = $fila;
                
             }
            return $menu;
        } else {
            return false;
        }

    }



   

    function contadorMenu(){
        $conn = conectar();
        $sql = "select COUNT(*) n_reg from menu";
        $result = $conn->query($sql);

        #...$cont = count($result);

        $conn->close();
        if ($result->num_rows > 0) {
            while ($fila = $result->fetch_assoc()) {
                
                
                    return $fila["n_reg"];
                                
                
            }
        } else {
            return false;
        }

    }

    function recuperarProductos($id){
        $conn = conectar();
        $sql = "select ID_PRODUCTO from menu_producto where ID_MENU = ".$id;
        $result = $conn->query($sql);

        $conn->close();
        if ($result->num_rows > 0) {
            while ($fila = $result->fetch_assoc()) {
                $prod = $fila["ID_PRODUCTO"];
                
            }
            return $prod;  
        } else {
            return false;
        }

    }

    //Recuperar Todos los datos de los participantes

    
     function recuperar_Participante($rut){
        $conn = conectar();
        $sql = "select * from participante where rut_usuario = '".$rut."'";
        $result = $conn->query($sql);

        $conn->close();
        if ($result->num_rows > 0) {
            while ($fila = $result->fetch_assoc()) {
                $nombre_participante[] = $fila;
                
            }
            return $nombre_participante;  
        } else {
            return false;
        }

    }

    function contadorParticipantes($rut){
        $conn = conectar();
        $sql = "select COUNT(*) n_reg from participante WHERE rut_usuario = '".$rut."'";
        $result = $conn->query($sql);

        $conn->close();
        if ($result->num_rows > 0) {
            while ($fila = $result->fetch_assoc()) {
                
                return $fila["n_reg"];
                                
                
            }
        } else {
            return false;
        }

    }

     // FIN Recuperar Todos los datos de los participantes


        function contador_menu_produc($ID_MENU){
        $conn = conectar();
        $sql = "select COUNT(*) n_reg from menu_producto WHERE ID_MENU = ".$ID_MENU;
        $result = $conn->query($sql);

        $conn->close();
        if ($result->num_rows > 0) {
            while ($fila = $result->fetch_assoc()) {
                
                return $fila["n_reg"];
                                
                
            }
        } else {
            return false;
        }

    }



    function obtenerNomProducto($id){
        $conn = conectar();
        $sql = "select * from producto where ID_PRODUCTO = ".$id;
        $result = $conn->query($sql);

        $conn->close();
        if ($result->num_rows > 0) {
            while ($fila = $result->fetch_assoc()) {
                $nomP = $fila["NOMBRE_PRODUCTO"];
                
                   
            }
             return $nomP;
        } else {
            return false;
        }

    }
    function obtenerNomProducto2($id){
        $conn = conectar();
        $sql = "select NOMBRE_PRODUCTO from producto where ID_PRODUCTO = ".$id;
        $result = $conn->query($sql);

        $conn->close();
        if ($result->num_rows > 0) {
            while ($fila = $result->fetch_assoc()) {
                $nomP[] = $fila;
                
                
                   
            }print_r($id);
             return $nomP;
        } else {
            return false;
        }

    }

    function contadorproductos($id){
        $conn = conectar();
        $sql = "select * from producto where ID_PRODUCTO = ".$id;
        $result = $conn->query($sql);

        $conn->close();
        if ($result->num_rows > 0) {
            while ($fila = $result->fetch_assoc()) {
                $cont = count($fila);
                
                    return $cont;
                                
                
            }
        } else {
            return false;
        }

    }
