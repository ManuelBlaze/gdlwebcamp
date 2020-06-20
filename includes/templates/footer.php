<footer class="site-footer">
        <div class="contenedor clearfix">
            <div class="footer-informacion">
                <h3>Sobre <span>GloWebCamp</span></h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum temporibus nulla quasi beatae
                    laudantium eaque harum. Dicta provident tempore voluptatibus beatae dolorum ad quas, itaque,
                    inventore quam sit ipsa accusamus.</p>
            </div>
            <div class="ultimos-tweets">
                <h3>Ultimos <span>Tweets</span></h3>
                <ul>
                    <li>Tempore, dolore laboriosam. Earum doloremque quo perferendis, asperiores ratione consequatur
                        omnis.
                    </li>
                    <li>Tempore, dolore laboriosam. Earum doloremque quo perferendis, asperiores ratione consequatur
                        omnis.
                    </li>
                    <li>Tempore, dolore laboriosam. Earum doloremque quo perferendis, asperiores ratione consequatur
                        omnis.
                    </li>
                </ul>
            </div>
            <div class="menu">
                <h3>Redes <span>Sociales</span></h3>
                <nav class="redes-sociales">
                    <a href=""><i class="fab fa-facebook-f"></i></a>
                    <a href=""><i class="fab fa-twitter"></i></a>
                    <a href=""><i class="fab fa-pinterest-p"></i></a>
                    <a href=""><i class="fab fa-youtube"></i></a>
                    <a href=""><i class="fab fa-instagram"></i></a>
                </nav>
            </div>
        </div>

        <p class="copy">
            <a href="https://github.com/ManuelBlaze" target="_blank"><i class="fab fa-github"></i> Manuel Escobar </a>|
            2020
        </p>

        <div style="display:none;">
        <!-- Begin Mailchimp Signup Form -->
        <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
        <style type="text/css">
            #mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
            /* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
            We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
        </style>
        
            <div id="mc_embed_signup">
                <form action="https://app.us10.list-manage.com/subscribe/post?u=b72e6e0f4f38aad4dc0bbf599&amp;id=229e5d228b" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                    <div id="mc_embed_signup_scroll">
                    <h2>Suscribete al Newsletter para no perderte de todas las novedades!</h2>
                <div class="indicates-required"><span class="asterisk">*</span> Obligatorio</div>
                <div class="mc-field-group">
                    <label for="mce-EMAIL">Email<span class="asterisk">*</span>
                </label>
                    <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
                </div>
                    <div id="mce-responses" class="clear">
                        <div class="response" id="mce-error-response" style="display:none"></div>
                        <div class="response" id="mce-success-response" style="display:none"></div>
                    </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_b72e6e0f4f38aad4dc0bbf599_229e5d228b" tabindex="-1" value=""></div>
                    <div class="clear"><input type="submit" value="Suscribete" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                    </div>
                </form>
            </div>
            <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='ADDRESS';ftypes[3]='address';fnames[4]='PHONE';ftypes[4]='phone';fnames[5]='BIRTHDAY';ftypes[5]='birthday';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
            <!--End mc_embed_signup-->
        </div>
    </footer>

    <script src="js/vendor/modernizr-3.8.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\/script>')
    </script>
    <script src="js/plugins.js"></script>

    <?php 
        //Eliminar ".php"
        $archivo = basename($_SERVER['PHP_SELF']);
        $pagina = str_replace(".php", "", $archivo);

        //Usar estilos dependiendo de la pagina
        if ($pagina == 'invitados' || $pagina == 'index') {
            echo '<script src="js/jquery.colorbox-min.js"></script>';
        } else if ($pagina == 'conferencia') {
            echo '<script src="js/lightbox.js"></script>';
        }
    ?>    
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
    <script src="js/jquery.lettering.js"></script>
    <script src="js/Leaflet.js"></script>
    <script src="js/jquery.countdown.min.js"></script>   
    <script src="js/main.js"></script>

    <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
    <script>
        window.ga = function () {
            ga.q.push(arguments)
        };
        ga.q = [];
        ga.l = +new Date;
        ga('create', 'UA-XXXXX-Y', 'auto');
        ga('set', 'transport', 'beacon');
        ga('send', 'pageview')
    </script>
    <script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/b72e6e0f4f38aad4dc0bbf599/7e0dc7d67ca4071265a1a7330.js");</script>
    <script src="https://www.google-analytics.com/analytics.js" async></script>
</body>

</html>