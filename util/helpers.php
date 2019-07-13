    <?php

    session_start();
    ob_start();

    include 'db/db_funciones.php';


    function is_valid_email($email)
    {
        return (false !== strpos($email, "@") && false !== strpos($email, "."));
    }



// Validar rut Chileno
    function RutValidate($rut) {
        $rut=str_replace('.', '', $rut);
        if (preg_match('/^(\d{1,9})-((\d|k|K){1})$/',$rut,$d)) {
            $s=1;$r=$d[1];for($m=0;$r!=0;$r/=10)$s=($s+$r%10*(9-$m++%6))%11;
            return chr($s?$s+47:75)==strtoupper($d[2]);
        }
    }

    // FIN Validar rut Chileno


    function redirigir($pagina)
    {
        header('Location: http://192.168.1.23/apps/' . $pagina);
        ob_end_flush();
    }



    function imprimir_menu_acceso()
    {
        if (isset($_SESSION['RUT_USUARIO'])) {
            $RUT_USUARIO = $_SESSION['RUT_USUARIO'];
            $name = obtener_nombre($RUT_USUARIO);
            echo '<a  class="w3-bar-item w3-button" onclick="salir()">' . $name . ' (Salir)</a>';
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
                echo '<a class="w3-bar-item w3-button" href="list_menu.php">Lista de Menus</a>';
                echo '<a class="w3-bar-item w3-button" href="lista_participantes.php">Participantes</a>';
                echo '<a class="w3-bar-item w3-button" href="crear_menu.php">Crear Menu</a>';
                echo '<a class="w3-bar-item w3-button" href="registro.php">Pedidos</a>';
                echo '<a class="w3-bar-item w3-button" href="registro.php">Contacto</a>';
            } else {
                echo '<a class="w3-bar-item w3-button" href="list_menu.php">Lista de Menus</a>';
                echo '<a class="w3-bar-item w3-button" href="lista_participantes.php">Participantes</a>';
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


    class calendario{
        var $nombre_dias = array('Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado');
        function calendario(){
            
        }
        
        function mostrarBarra(){
        //proximamente
            ?>
            <div id="barcal">
            </div>
            <?php
        }
        
        function mostrar(){
            date_default_timezone_set('America/Santiago');
            $mes=date('m',time());
            $anio=date('Y',time());
        //dias mes anterior
            if($mes==1){ $mes_anterior=12; $anio_anterior = $anio-1; }
            else{ $mes_anterior = $mes-1; $anio_anterior = $anio; }
            
            $ultimo_dia_mes_anterior = date('t',mktime(0,0,0,$mes_anterior,1,$anio_anterior));
            
            $dia=1;
            if(strlen($mes)==1) $mes='0'.$mes;
            ?>
            <table id="minical" cellpadding="0" cellspacing="0">
                <thead>
                   <tr >
                      <th><?php echo $this->nombre_dias[0]?></th>
                      <th><?php echo $this->nombre_dias[1]?></th>
                      <th><?php echo $this->nombre_dias[2]?></th>
                      <th><?php echo $this->nombre_dias[3]?></th>
                      <th><?php echo $this->nombre_dias[4]?></th>
                      <th><?php echo $this->nombre_dias[5]?></th>
                      <th><?php echo $this->nombre_dias[6]?></th>
                  </tr>
              </thead>
              <tbody>
                <?php
                
                
        $numero_primer_dia = date('w', mktime(0,0,0,$mes,$dia,$anio)); //numero dia en semana
        
        $ultimo_dia = date('t', mktime(0,0,0,$mes,$dia,$anio));
        
        $diferencia_mes_anterior = $ultimo_dia_mes_anterior - ($numero_primer_dia-1);
        
        $total_dias=$numero_primer_dia+$ultimo_dia;
        $diames=1;
        //$j dias totales (dias que empieza a contarse el 1º + los dias del mes)
        $j=1;
        while($j<=$total_dias){
            //if($j%2==0) echo "<tr class=\"odd\"> \n";
            //else 
            echo "<tr> \n";
            //$i contador dias por semana
            $i=0;
            $k=1; //dias proximo mes
            while($i<7){
                if($j<=$numero_primer_dia){
                    echo "<td class=\"disabled\"> \n";
                    echo "<div class=\"headbox\"> \n";
                    echo $diferencia_mes_anterior;
                    echo "</div>";
                    echo "<div class=\"bodybox\"></div> \n";
                    echo "</td> \n";
                    $diferencia_mes_anterior++;
                }elseif($diames>$ultimo_dia){
                    echo "<td class=\"disabled\"> \n";
                    echo "<div class=\"headbox\"> \n";
                    echo $k;
                    echo "</div>";
                    echo "<div class=\"bodybox\"></div> \n";
                    echo"</td> \n";
                    $k++; //dias proximo mes
                }else{
                    if($diames<10) $diames_con_cero='0'.$diames;
                    else $diames_con_cero=$diames;
                    
                    echo "<td>";
                    echo "<div class=\"headbox\"> \n";
                    echo $diames;
                    echo "</div> \n";
                    echo "<div class=\"bodybox\"></div> \n";
                    echo "</td> \n";
                    $diames++;
                }
                $i++;
                $j++;
            }
            echo "</tr> \n";
        }
        ?>
    </tbody>
</table>
<?php
}

}
