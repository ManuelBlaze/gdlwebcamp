<?php if(isset($_POST["submit"])): 
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $email = $_POST["email"];
    $regalo = $_POST["regalo"];
    $total = $_POST["total_pedido"];
    $fecha = date('Y-m-d H:i:s');
    //Pedidos
    $boletos = $_POST["boletos"];
    $camisas = $_POST["pedido_camisas"];
    $etiquetas = $_POST["pedido_etiquetas"];
    include_once 'includes/funciones/funciones.php'; 
    $pedido = productos_json($boletos, $camisas, $etiquetas);           
    //Eventos
    $eventos = $_POST["registro"];
    $registro = eventos_json($eventos);
    //Inserción en la base de datos
    try {
        require_once('includes/funciones/bd_conexion.php');
        //Prepared Statements
        $stmt = $conn->prepare("INSERT INTO registrados (nombre_registrado, apellido_registrado, email_registrado, fecha_registro, pases_articulos, talleres_registrados, regalo, total_pagado) VALUES (?,?,?,?,?,?,?,?)");
        $stmt->bind_param("ssssssis", $nombre, $apellido, $email, $fecha, $pedido, $registro, $regalo, $total);
        $stmt->execute();
        $id = $stmt->insert_id;
        $stmt->close();
        $conn->close();
        header('Location: validar_registro.php?exitoso=1&id='.$id);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
endif; ?>


<!--HEADER-->
<?php include_once 'includes/templates/header.php'; ?>

<section class="seccion contenedor resumen-registro">
    <h2>Resumen de registro</h2>

    <?php if (isset($_GET['exitoso'])):
        $id = $_GET["id"];
        if ($_GET['exitoso'] == "1") { 
            require_once('includes/funciones/bd_conexion.php');
            try {
                $sql = "SELECT registrados.*, regalos.nombre_regalo FROM registrados ";
                $sql .= " JOIN regalos ";
                $sql .= " ON registrados.regalo = regalos.id_regalo WHERE id_registrado = $id";
                $resultado = $conn->query($sql);
                
            } catch (Exception $e) {
                $error = $e->getMessage();
                echo $error;
            }
            while($registrado = $resultado->fetch_assoc()) { ?>
                
                <div class="grid-father">
                    <div class="cnt">
                        <h3>Contacto</h3>
                        <ul>
                            <li><span>Nombre: </span><?=$registrado['nombre_registrado'] ." ". $registrado['apellido_registrado'] ."<br>"; ?> </li>
                            <li><span>Email: </span><?php echo $registrado['email_registrado'] ."<br>"; ?></li>
                            <li><span>Fecha: </span><?php echo $registrado['fecha_registro']."<br>"; ?></li>
                        </ul>
                        <h3>Resumen Pedido</h3>
                        <ul>
                            <li>
                                <?php  

                                $articulos = json_decode($registrado['pases_articulos'], true);
                                $arr_articulos = array (
                                    'un_dia' => 'Pase 1 día',
                                    'pase_2dias' => 'Pase 2 días',
                                    'pase_completo' => 'Pase Completo',
                                    'camisas' => 'Camisa(s)',
                                    'etiquetas' => 'Etiquetas',
                                );
                                foreach ($articulos as $llave => $articulo) {
                                    echo $arr_articulos[$llave]. ": ". $articulo ."<br>";
                                }
                                ?>
                            </li>
                            <li>
                                <span>Regalo: </span><?php echo $registrado['nombre_regalo']; ?>
                            </li>
                            <li>
                                <span>Total: </span>$ <?php echo $registrado['total_pagado']; ?>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h3>Talleres Inscritos</h3>
                        <?php 
                                
                            $eventos_resultado = $registrado['talleres_registrados'];
                            $talleres = json_decode($eventos_resultado, true);
                            $talleres = implode("', '", $talleres['eventos']);
                            $sql_talleres = "SELECT nombre_evento, fecha_evento, hora_evento FROM evento WHERE evento_id IN ('$talleres')";
                                // echo"<pre>";
                                //   var_dump($sql_talleres);
                                // echo"</pre>";
                            $result = $conn->query($sql_talleres);

                            while ($eventos = $result->fetch_assoc()) {
                                echo $eventos['nombre_evento']. " ". $eventos['fecha_evento']. " ". $eventos['hora_evento']. "<br>";
                            }

                        ?>
                    </div>
                </div>
            <?php } ?>
            
            <div class="volver">
                <a href="index.php" class="button ">Volver al Inicio</a>
            </div>
        <?php }
    endif; ?>    
</section>

<!--FOOTER-->
<?php include_once 'includes/templates/footer.php'; ?>   