<!--HEADER-->
<?php include_once 'includes/templates/header.php'; ?>

    <section class="contenedor seccion">
        <h2>La mejor conferencia de diseño web en español</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi reiciendis ducimus quam deleniti maiores
            aliquid in laboriosam dolores, dolorum iusto ratione alias voluptates harum sunt velit iure aliquam ut
            consequatur.</p>
    </section>
    <!--seccion-->

    <section class="programa">
        <div class="contenedor-video">
            <video autoplay loop poster="img/bg-talleres.jpg">
                <source src="video/video.mp4" type="video/mp4">
                <source src="video/video.webm" type="video/webm">
                <source src="video/video.ogv" type="video/ogv">
            </video>
        </div>
        <!--contenedor video-->
        <div class="contenido-programa">
            <div class="contenedor">
                <div class="programa-evento">
                    <h2>Programa del evento</h2>

                    <?php
                        try {
                            require_once('includes/funciones/bd_conexion.php');
                            $sql = "SELECT * FROM categoria_evento";
                            $resultado = $conn->query($sql);
                        } catch (Exception $e) {
                            echo $e->getMessage();
                        }
                    ?>

                    <nav class="menu-programa">
                    <?php while ($cat = $resultado->fetch_array(MYSQLI_ASSOC)) { 
                        $cat_evento = $cat["cat_evento"]  ?>
                        
                        <a href="#<?php echo strtolower($cat_evento); ?>">
                            <i class="fas <?php echo $cat["icono"]; ?>"></i> <?php echo $cat_evento; ?>
                        </a>                        
                    <?php } ?>
                    </nav>

                    <?php
                        try {
                            require_once('includes/funciones/bd_conexion.php');
                            $sql = "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
                            $sql .= "FROM evento ";
                            $sql .= "INNER JOIN categoria_evento ";
                            $sql .= "ON evento.id_cat_evento = categoria_evento.id_categoria ";
                            $sql .= "INNER JOIN invitados ";
                            $sql .= "ON evento.id_inv = invitados.invitado_id ";
                            $sql .= "AND evento.id_cat_evento = 1 ";
                            $sql .= "ORDER BY evento_id LIMIT 2; ";
                            $sql .= "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
                            $sql .= "FROM evento ";
                            $sql .= "INNER JOIN categoria_evento ";
                            $sql .= "ON evento.id_cat_evento = categoria_evento.id_categoria ";
                            $sql .= "INNER JOIN invitados ";
                            $sql .= "ON evento.id_inv = invitados.invitado_id ";
                            $sql .= "AND evento.id_cat_evento = 2 ";
                            $sql .= "ORDER BY evento_id LIMIT 2; ";
                            $sql .= "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
                            $sql .= "FROM evento ";
                            $sql .= "INNER JOIN categoria_evento ";
                            $sql .= "ON evento.id_cat_evento = categoria_evento.id_categoria ";
                            $sql .= "INNER JOIN invitados ";
                            $sql .= "ON evento.id_inv = invitados.invitado_id ";
                            $sql .= "AND evento.id_cat_evento = 3 ";
                            $sql .= "ORDER BY evento_id LIMIT 2; ";
                        } catch (Exception $e) {
                            echo $e->getMessage();
                        }
                    ?>

                    <!--Multi query-->
                    <?php $conn->multi_query($sql); ?>

                    <?php
                        do {
                            $resultado = $conn->store_result();
                            $row = $resultado->fetch_all(MYSQLI_ASSOC); ?>
                            
                            <?php $i = 0; ?>
                            <?php foreach ($row as $evento): ?>
                                <?php if ($i % 2 == 0) { ?>
                                    <div id="<?php echo strtolower($evento["cat_evento"]); ?>" class="info-curso ocultar clearfix">
                                <?php } ?>
                                        <div class="detalle-evento">
                                            <h3><?php echo $evento["nombre_evento"]; ?></h3>
                                            <p><i class="far fa-clock"></i> <?php echo $evento["hora_evento"] . " hrs";?></p>
                                            <p><i class="fas fa-calendar-alt"></i> <?php echo $evento["fecha_evento"]; ?></p>
                                            <p><i class="fas fa-user"></i> 
                                                <?php echo $evento["nombre_invitado"] . " " . $evento["apellido_invitado"]; ?>
                                            </p>
                                        </div>               
                                <?php if ($i % 2 == 1) : ?>
                                        <a href="calendario.php" class="button float-rigth">Ver Todos</a>
                                    </div>
                                <?php endif; ?>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                            <?php $resultado->free() ?>
                        <?php } while ($conn->more_results() && $conn->next_result());
                    ?>
                </div>
                <!--Programa evento-->
            </div>
            <!--contenedor-->
        </div>
        <!--contenido programa-->
    </section>
    <!--programa-->

    <?php include_once 'includes/templates/invitados.php'; ?>
    <!--Invitados-->

    <div class="contador parallax">
        <div class="contenedor">
            <ul class="resumen-evento clearfix">
                <li>
                    <p class="numero"></p>
                    Invitados
                </li>
                <li>
                    <p class="numero"></p>
                    Talleres
                </li>
                <li>
                    <p class="numero"></p>
                    Días
                </li>
                <li>
                    <p class="numero"></p>
                    Conferencias
                </li>
            </ul>
        </div>
    </div>
    <!--Contador Parallax-->

    <section class="precios seccion">
        <h2>Precios</h2>
        <div class="contenedor">
            <ul class="lista-precios clearfix">

                <li>
                    <div class="tabla-precio">
                        <h3>Pase por día</h3>
                        <p class="numero">$30</p>
                        <ul>
                            <li><i class="fas fa-check"></i> Bocadillos Gratis</li>
                            <li><i class="fas fa-check"></i> Todas las conferencias</li>
                            <li><i class="fas fa-check"></i> Todos los talleres</li>
                        </ul>
                        <a href="registro.php" class="button hollow">Comprar</a>
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
                        <a href="registro.php" class="button">Comprar</a>
                    </div>
                </li>

                <li>
                    <div class="tabla-precio">
                        <h3>Pase por 2 días</h3>
                        <p class="numero">$45</p>
                        <ul>
                            <li><i class="fas fa-check"></i> Bocadillos Gratis</li>
                            <li><i class="fas fa-check"></i> Todas las conferencias</li>
                            <li><i class="fas fa-check"></i> Todos los talleres</li>
                        </ul>
                        <a href="registro.php" class="button hollow">Comprar</a>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!--Precios-->

    <div class="mapa" id="mapa">

    </div>
    <!--Mapa-->

    <section class="seccion">
        <h2>Testimoniales</h2>
        <div class="testimoniales contenedor clearfix">
            <div class="testimonial">
                <blockquote>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Blanditiis quibusdam sequi mollitia
                        ipsum veniam saepe nulla suscipit ab. Consectetur porro mollitia delectus sint laudantium
                        perspiciatis aspernatur voluptatibus? Hic, tempora
                        consequuntur.
                    <footer class="info-testimonial clearfix">
                        <img src="img/testimonial.jpg" alt="Testimonio">
                        <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
                    </footer>
                    </p>
                </blockquote>
            </div>
            <!--Testimonial-->
            <div class="testimonial">
                <blockquote>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Blanditiis quibusdam sequi mollitia
                        ipsum veniam saepe nulla suscipit ab. Consectetur porro mollitia delectus sint laudantium
                        perspiciatis aspernatur voluptatibus? Hic, tempora
                        consequuntur.
                    <footer class="info-testimonial clearfix">
                        <img src="img/testimonial.jpg" alt="Testimonio">
                        <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
                    </footer>
                    </p>
                </blockquote>
            </div>
            <!--Testimonial-->
            <div class="testimonial">
                <blockquote>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Blanditiis quibusdam sequi mollitia
                        ipsum veniam saepe nulla suscipit ab. Consectetur porro mollitia delectus sint laudantium
                        perspiciatis aspernatur voluptatibus? Hic, tempora
                        consequuntur.
                    <footer class="info-testimonial clearfix">
                        <img src="img/testimonial.jpg" alt="Testimonio">
                        <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
                    </footer>
                    </p>
                </blockquote>
            </div>
            <!--Testimonial-->
        </div>
    </section>
    <!--Testimonios-->

    <div class="newsletter parallax">
        <div class="contenido contenedor">
            <p>Registrate al Newsletter:</p>
            <h3>GloWebCamp</h3>
            <a href="#" class="button transparente">Registro</a>
        </div>
    </div>
    <!--Newsletter-->

    <section class="seccion">
        <h2>Faltan</h2>
        <div class="cuenta-regresiva contenedor">
            <ul class="clearfix">
                <li>
                    <p id="dias" class="numero"></p> Días
                </li>
                <li>
                    <p id="horas" class="numero"></p> Horas
                </li>
                <li>
                    <p id="minutos" class="numero"></p> Minutos
                </li>
                <li>
                    <p id="segundos" class="numero"></p> Segundos
                </li>
            </ul>
        </div>
    </section>
    <!--Cuenta regresiva-->

<!--FOOTER-->
<?php include_once 'includes/templates/footer.php'; ?>    