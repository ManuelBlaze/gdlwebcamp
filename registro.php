<!--HEADER-->
<?php include_once 'includes/templates/header.php'; ?>

    <section class="seccion contenedor">
        <h2>Registro de Usuarios</h2>
        <form method="POST" action="validar_registro.php" id="registro" class="registro">
            <div class="registro caja clearfix" id="datos_usuario">
                <div class="campo">
                    <label for="Nombe:">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" placeholder="Tu Nombre">
                </div>
                <div class="campo">
                    <label for="Apellido:">Apellido:</label>
                    <input type="text" name="apellido" id="apellido" placeholder="Tu Apellido">
                </div>
                <div class="campo">
                    <label for="email:">Email:</label>
                    <input type="email" name="email" id="email" placeholder="Tu Email">
                </div>
                <div class="error" id="error"></div>
            </div>
            <!--#datos_usuarios-->

            <div class="paquetes" id="paquetes">
                <h3>Elige el número de boletos</h3>

                <ul class="lista-precios clearfix">

                    <li>
                        <div class="tabla-precio">
                            <h3>Pase por día (viernes)</h3>
                            <p class="numero">$30</p>
                            <ul>
                                <li><i class="fas fa-check"></i> Bocadillos Gratis</li>
                                <li><i class="fas fa-check"></i> Todas las conferencias</li>
                                <li><i class="fas fa-check"></i> Todos los talleres</li>
                            </ul>
                            <div class="orden">
                                <label for="pase_dia">Boletos deseados:</label>
                                <input type="number" min="0" placeholder="0" id="pase_dia" size="3" name="boletos[]">
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="tabla-precio">
                            <h3>Todos los días</h3>
                            <p class="numero">$50</p>
                            <ul>
                                <li><i class="fas fa-check"></i> Bocadillos Gratis</li>
                                <li><i class="fas fa-check"></i> Todas las conferencias</li>
                                <li><i class="fas fa-check"></i> Todos los talleres</li>
                            </ul>
                            <div class="orden">
                                <label for="pase_completo">Boletos deseados:</label>
                                <input type="number" min="0" placeholder="0" id="pase_completo" size="3" name="boletos[]">
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="tabla-precio">
                            <h3>Pase por 2 días (viernes y sábado)</h3>
                            <p class="numero">$45</p>
                            <ul>
                                <li><i class="fas fa-check"></i> Bocadillos Gratis</li>
                                <li><i class="fas fa-check"></i> Todas las conferencias</li>
                                <li><i class="fas fa-check"></i> Todos los talleres</li>
                            </ul>
                            <div class="orden">
                                <label for="pase_dosdias">Boletos deseados:</label>
                                <input type="number" min="0" placeholder="0" id="pase_dosdias" size="3" name="boletos[]">
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <!--#paquetes-->

            <div id="eventos" class="eventos clearfix">
                <h3>Elige tus talleres</h3>
                <div class="caja">
                    <?php 
                    
                        try {
                            require_once('includes/funciones/bd_conexion.php');
                            $sql = "SELECT evento.*, categoria_evento.cat_evento, invitados.nombre_invitado, invitados.apellido_invitado ";
                            $sql .= " FROM evento ";
                            $sql .= " JOIN categoria_evento ";
                            $sql .= " ON evento.id_cat_evento = categoria_evento.id_categoria ";
                            $sql .= " JOIN invitados ";
                            $sql .= " ON evento.id_inv = invitados.invitado_id ";
                            $sql .= " ORDER BY evento.fecha_evento, evento.id_cat_evento, evento.hora_evento";

                            $resultado = $conn->query($sql);
                        } catch (Exception $e) {
                            echo $e->getMessage();
                        }
                        
                        $eventos_dias = array();
                        while ($eventos = $resultado->fetch_assoc()) {
                            $fecha = $eventos['fecha_evento'];
                            $dia_semana = strftime("%A", strtotime($fecha));

                            switch ($dia_semana) {
                                case 'Thursday':
                                    $dia_semana = 'Viernes';
                                    break;

                                case 'Friday':
                                    $dia_semana = 'Sábado';
                                    break;

                                case 'Saturday':
                                    $dia_semana = 'Domingo';
                                    break;
                                
                                default:
                                    # code...
                                    break;
                            }
                            
                            $categoria = $eventos['cat_evento'];

                            $dia = array(
                                'nombre_evento' => $eventos['nombre_evento'],
                                'hora' => $eventos['hora_evento'],
                                'id' => $eventos['evento_id'],
                                'nombre_invitado' => $eventos['nombre_invitado']." ".$eventos['apellido_invitado']
                            );
                            $eventos_dias[$dia_semana]['eventos'][$categoria][] = $dia;
                        }
                    ?>
                    <?php foreach ($eventos_dias as $dia => $eventos) { ?>
                        <div id="<?=$dia?>" class="contenido-dia clearfix">
                            <h4><?=$dia?></h4>

                            <?php foreach ($eventos['eventos'] as $tipo => $evento_dia) : ?>
                                    
                                <div>
                                    <p><?= $tipo ?>:</p>

                                    <?php foreach ($evento_dia as $evento) { ?>

                                        <label>
                                            <input type="checkbox" name="registro[]" id="<?=$evento['id']?>" value="<?=$evento['id']?>">
                                            <time><?=$evento['hora']?></time>
                                            <?=$evento['nombre_evento']?>
                                            <br>
                                            <span class="autor"><?=$evento['nombre_invitado']?></span>
                                        </label>
                                    
                                    <?php } ?>
                                </div>

                            <?php endforeach; ?>
                        </div><!--.contenido dia-->
                    <?php } ?>
                </div>
                <!--.caja-->
            </div>
            <!--#eventos-->

            <div class="resumen" id="resumen">
                <h3>Pago y extras</h3>
                <div class="caja clearfix">
                    <div class="extras">
                        <div class="orden">
                            <label for="camisa_evento">Camisa del evento $10 <small>(promoción 7% dto.)</small></label>
                            <input type="number" min="0" size="3" placeholder="0" id="camisa_evento" name="pedido_camisas">
                        </div>
                        <!--orden-->
                        <div class="orden">
                            <label for="etiquetas">Paquete de 10 etiquetas $2 <small>(HTML5, CSS3, JavaScript,
                                    Chrome)</small></label>
                            <input type="number" min="0" size="3" placeholder="0" id="etiquetas" name="pedido_etiquetas">
                        </div>
                        <!--orden-->
                        <div class="orden">
                            <label for="regalo">Seleccione un regalo</label> <br>
                            <select id="regalo" name="regalo" required>
                                <option value="">- Seleccione un regalo -</option>
                                <option value="2">Etiquetas</option>
                                <option value="1">Pulsera</option>
                                <option value="3">Plumas</option>
                            </select>
                        </div>
                        <!--orden-->
                        <input type="button" value="Calcular" class="button" id="calcular">
                    </div>
                    <!--.extras-->
                    <div class="total">
                        <p>Resumen:</p>
                        <div id="lista-productos">

                        </div>
                        <p>Total:</p>
                        <div id="suma-total">

                        </div>
                        <input type="hidden" name="total_pedido" id="total_pedido">
                        <input type="submit" name="submit" value="Pagar" id="btnRegistro" class="button">
                    </div>
                    <!--pagar-->
                </div>
                <!--caja-->
            </div>
            <!--#resumen-->
        </form>
    </section>

<!--FOOTER-->
<?php include_once 'includes/templates/footer.php'; ?>   