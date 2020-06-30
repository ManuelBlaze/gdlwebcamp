<!--HEADER-->
<?php include_once 'includes/templates/header.php'; ?>


    <section class="seccion contenedor">
        <h2>Calendario de eventos</h2>
        
        <?php
            try {
                require_once('includes/funciones/bd_conexion.php');
                $sql = "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
                $sql .= " FROM evento ";
                $sql .= " INNER JOIN categoria_evento ";
                $sql .= " ON evento.id_cat_evento = categoria_evento.id_categoria ";
                $sql .= " INNER JOIN invitados ";
                $sql .= " ON evento.id_inv = invitados.invitado_id ";
                $sql .= " ORDER BY evento_id ";
                $resultado = $conn->query($sql);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        ?>

        <div class="calendario">
            <?php 
                $calendario = array();
                while ($eventos = $resultado->fetch_assoc() ) { 

                    //Obtiene fecha del evento
                    $fecha = $eventos["fecha_evento"];

                    $evento = array(
                        'titulo' => $eventos["nombre_evento"],
                        'fecha' => $eventos["fecha_evento"],
                        'hora' => $eventos["hora_evento"],
                        'categoria' => $eventos["cat_evento"],
                        'icono' => 'fas '. $eventos["icono"],
                        'invitado' => $eventos["nombre_invitado"] . " " . $eventos["apellido_invitado"]
                    );

                    $calendario[$fecha][] = $evento;
                    ?>

                <?php }//While fetch_assoc ?>
            
            <?php
                //Imprimir los eventos
                foreach ($calendario as $dia => $lista_eventos) { ?>
                    <h3 class="dias-evento">
                        <i class="fas fa-calendar-alt"></i>
                        <?php 
                            //unix
                            setlocale(LC_TIME, "es_ES.UTF-8");
                            //windows
                            setlocale(LC_TIME, "spanish");

                            echo strftime("%d de %B, %Y", strtotime($dia)); 
                        ?>
                    </h3>
                    <?php 
                        foreach ($lista_eventos as $evento) { ?>
                            <div class="dia ">
                                <p class="titulo"><?php echo $evento["titulo"] ?></p>
                                <p class="hora">
                                    <i class="far fa-clock"></i>
                                    <?php echo $evento["hora"] . " hrs" ?>
                                </p>
                                <p class="categoria">
                                <i class="<?php echo $evento["icono"]; ?>"></i>
                                    <?php echo $evento["categoria"] ?>
                                </p>
                                <p class="invitado">
                                    <i class="fas fa-user"></i>
                                    <?php echo $evento["invitado"] ?>
                                </p>
                            </div>
                    <?php }//for each eventos ?>
            <?php }//for each días?>
        
        </div>

        <?php
            $conn->close();
        ?>

    </section>

<!--FOOTER-->
<?php include_once 'includes/templates/footer.php'; ?>   
    