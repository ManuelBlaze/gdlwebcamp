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
                    <nav class="menu-programa">
                        <a href="#talleres"><i class="fas fa-code"></i> Talleres</a>
                        <a href="#conferencias"><i class="fas fa-comment"></i> Conferencias</a>
                        <a href="#seminarios"><i class="fas fa-university"></i> Seminarios</a>
                    </nav>

                    <div id="talleres" class="info-curso ocultar clearfix">
                        <div class="detalle-evento">
                            <h3>HTML5, CSS3 y JavaScript</h3>
                            <p><i class="far fa-clock"></i> 16:00 hrs</p>
                            <p><i class="fas fa-calendar-alt"></i> 10 de Dic</p>
                            <p><i class="fas fa-user"></i> Juan Pablo De La Torre</p>
                        </div>
                        <div class="detalle-evento">
                            <h3>Responsive Web Design</h3>
                            <p><i class="far fa-clock"></i> 20:00 hrs</p>
                            <p><i class="fas fa-calendar-alt"></i> 10 de Dic</p>
                            <p><i class="fas fa-user"></i> Juan Pablo De La Torre</p>
                        </div>
                        <a href="registro.html" class="button float-rigth">Ver Todos</a>
                    </div>
                    <!--Talleres-->
                    <div id="conferencias" class="info-curso ocultar clearfix">
                        <div class="detalle-evento">
                            <h3>Cómo ser Freelancer</h3>
                            <p><i class="far fa-clock"></i> 10:00 hrs</p>
                            <p><i class="fas fa-calendar-alt"></i> 10 de Dic</p>
                            <p><i class="fas fa-user"></i> Gregorio Sanchéz</p>
                        </div>
                        <div class="detalle-evento">
                            <h3>Tecnologías del Futuro</h3>
                            <p><i class="far fa-clock"></i> 17:00 hrs</p>
                            <p><i class="fas fa-calendar-alt"></i> 10 de Dic</p>
                            <p><i class="fas fa-user"></i> Susan Sanchéz</p>
                        </div>
                        <a href="registro.html" class="button float-rigth">Ver Todos</a>
                    </div>
                    <!--Conferencias-->
                    <div id="seminarios" class="info-curso ocultar clearfix">
                        <div class="detalle-evento">
                            <h3>Diseño UI/UX para móviles</h3>
                            <p><i class="far fa-clock"></i> 17:00 hrs</p>
                            <p><i class="fas fa-calendar-alt"></i> 11 de Dic</p>
                            <p><i class="fas fa-user"></i>Harold García/p>
                        </div>
                        <div class="detalle-evento">
                            <h3>Aprende a programar en una mañana</h3>
                            <p><i class="far fa-clock"></i> 10:00 hrs</p>
                            <p><i class="fas fa-calendar-alt"></i> 11 de Dic</p>
                            <p><i class="fas fa-user"></i> Susana Rivera</p>
                        </div>
                        <a href="registro.html" class="button float-rigth">Ver Todos</a>
                    </div>
                    <!--Seminarios-->
                </div>
                <!--Programa evento-->
            </div>
            <!--contenedor-->
        </div>
        <!--contenido programa-->
    </section>
    <!--programa-->

    <section class="invitados contenedor seccion">
        <h2>Nuesros Invitados</h2>
        <ul class="lista-invitados clearfix">
            <li>
                <div class="invitado">
                    <img src="img/invitado1.jpg" alt="Invitado 1">
                    <p>Rafael Bautista</p>
                </div>
            </li>
            <li>
                <div class="invitado">
                    <img src="img/invitado2.jpg" alt="Invitado 2">
                    <p>Shari Herrera</p>
                </div>
            </li>
            <li>
                <div class="invitado">
                    <img src="img/invitado3.jpg" alt="Invitado 3">
                    <p>Gregorio Sanchez</p>
                </div>
            </li>
            <li>
                <div class="invitado">
                    <img src="img/invitado4.jpg" alt="Invitado 4">
                    <p>Susana Rivera</p>
                </div>
            </li>
            <li>
                <div class="invitado">
                    <img src="img/invitado5.jpg" alt="Invitado 5">
                    <p>Harold García</p>
                </div>
            </li>
            <li>
                <div class="invitado">
                    <img src="img/invitado6.jpg" alt="Invitado 6">
                    <p>Susan Sanchez</p>
                </div>
            </li>
        </ul>
    </section>
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
                        <a href="registro.html" class="button hollow">Comprar</a>
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
                        <a href="registro.html" class="button">Comprar</a>
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
                        <a href="registro.html" class="button hollow">Comprar</a>
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