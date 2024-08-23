
    <?php
        include 'heading.php';
    ?>

    <body>

    <!-- Pop-up de Publicidad -->
        <!-- <div id="ad-popup" class="ad-popup">
            <div class="ad-popup-content">
                <span class="close-btn" onclick="closePopup()">&times;</span>
                <img src="images/aguirre.jpeg" alt="Publicidad" class="ad-popup-image">
            </div>
        </div> -->

        <section class="preloader">
            <div class="spinner">
                <span class="sk-inner-circle"></span>
            </div>
        </section>
    
        <main>

    <?php
        include 'navbar.php';
    ?>

            <section class="slick-slideshow">   
                <div class="slick-custom">
                    <!-- <img src="images/slideshow/medium-shot-business-women-high-five.jpeg" class="img-fluid" alt=""> -->
                    <video src="images/slideshow/slider.mp4" class="img-fluid" alt="" preload="metadata" autoplay muted loop></video>


                    <div class="slick-bottom">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 col-10">
                                    <h1 class="slick-title">Consultas Legales a Tu Alcance</h1>
                                    

                                    <p class="lead text-white mt-lg-3 mb-lg-5">ArxaTEC te ofrece asesoría legal amigable y accesible para todas tus necesidades.</p>

                                    <a href="contact.html" class="btn custom-btn">Consulta con Nosotros</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- <div class="slick-custom">
                    
                    <video src="images/slideshow/slider2.mp4" class="img-fluid" alt="" preload="metadata" autoplay muted></video>

                    <div class="slick-bottom">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 col-10">
                                    <h1 class="slick-title">Consultas Legales a Tu Alcance</h1>

                                    <p class="lead text-white mt-lg-3 mb-lg-5">ArxaTEC te ofrece asesoría legal amigable y accesible para todas tus necesidades.</p>

                                    <a href="contact.html" class="btn custom-btn">Consulta con Nosotros</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

                <!-- <div class="slick-custom">
                    <img src="images/slideshow/slider3.jpg" class="img-fluid" alt="">

                    <div class="slick-bottom">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 col-10">
                                    <h1 class="slick-title">Consultas Legales a Tu Alcance</h1>

                                    <p class="lead text-white mt-lg-3 mb-lg-5">ArxaTEC te ofrece asesoría legal amigable y accesible para todas tus necesidades.</p>

                                    <a href="contact.html" class="btn custom-btn">Consulta con Nosotros</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

            </section>

            <!-- Estoy agregando el about en el index  -->

            <?php
            include 'about-index.php';
            ?>

            <section class="front-product">
                <div class="container-fluid p-0">
                    <div class="row align-items-center">

                        <div class="col-lg-6 col-12">
                            <img src="images/servicios.jpg" class="img-fluid" alt="">
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="px-5 py-5 py-lg-0">
                                
                                <h2 class="mb-4">Conoce todos nuestros<span> servicios</span></h2>

                                <p class="lead mb-4">Credits go to Unsplash and FreePik websites for images used in this Little Fashion by Tooplate.</p>

                                <a href="products.html" class="custom-link">
                                    Explore Products
                                    <i class="bi-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <section class="featured-product section-padding">
                <div class="container">
                    <div class="row">
                        
                        <div class="col-12 text-center">
                            <h2 class="mb-5">Videos de tu <span>Interes</span> </h2>
                        </div>

                        <div class="col-lg-4 col-12 mb-3">
                            <div class="product-thumb">
                                <a href="https://www.facebook.com/reel/2234198293604509" target="_blank">
                                    <img src="images/nacibase.png" class="img-fluid product-image" alt="">
                                </a>

                                <div class="product-top d-flex">
                                    <span class="product-alert me-auto">Nuevo Video</span>

                                    <a href="#" class="bi-heart-fill product-icon"></a>
                                </div>

                                <div class="product-info d-flex">
                                    <div>
                                        <h5 class="product-title mb-0">
                                            <br>
                                            <a href="https://www.facebook.com/reel/2234198293604509" target="_blank" class="product-title-link">¿Como nacio LaBaseCowork?</a>
                                        </h5>

                                        <p class="product-p">Asi fue el nacimiento del mejor Cowork de Huancayo</p>
                                    </div>

                                    <small class="product-price text-muted ms-auto mt-auto mb-5"></small>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-12 mb-3">
                            <div class="product-thumb">
                                <a href="https://www.facebook.com/profile.php?id=100094472230413" target="_blank">
                                    <img src="images/taller1.jpg" class="img-fluid product-image" alt="" >
                                </a>

                                <div class="product-top d-flex">
                                    <span class="product-alert"></span>

                                    <a href="#" class="bi-heart-fill product-icon ms-auto"></a>
                                </div>

                                <div class="product-info d-flex">
                                    <div>
                                        <h5 class="product-title mb-0">
                                            <a href="https://www.facebook.com/profile.php?id=100094472230413" target="_blank" class="product-title-link">¿Que es el Coaching?</a>
                                        </h5>

                                        <p class="product-p">Coaching para tu emprendimiento</p>
                                    </div>

                                    <small class="product-price text-muted ms-auto mt-auto mb-5">Gratis</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-12">
                            <div class="product-thumb">
                                <a href="https://www.facebook.com/profile.php?id=100094472230413" target="_blank">
                                    <img src="images/taller2.jpg" class="img-fluid product-image" alt="">
                                </a>

                                <div class="product-top d-flex">
                                    <a href="#" class="bi-heart-fill product-icon ms-auto"></a>
                                </div>

                                <div class="product-info d-flex">
                                    <div>
                                        <h5 class="product-title mb-0">
                                            <a href="https://www.facebook.com/profile.php?id=100094472230413" target="_blank" class="product-title-link">Como registrar tu marca</a>
                                        </h5>

                                        <p class="product-p">Aprende a registrar tu marca</p>
                                    </div>

                                    <small class="product-price text-muted ms-auto mt-auto mb-5">Gratis</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 text-center">
                            <a href="servicios.php" class="view-all">Ver todos nuestros programas</a>
                        </div>

                    </div>
                </div>
            </section>

<!-- Mensaje a WhatsApp -->
        <a href="https://web.whatsapp.com/send?phone=51960700355&text=Hola,%20estoy%20interesado%20en%20más%20información%20sobre%20ArxaTEC." class="whatsapp_float" target="_blank">
            <img src="images/wsp.png" alt="WhatsApp" class="whatsapp-icon">
            <span class="whatsapp-text">Contáctanos</span>
        </a>

        </main>me 

        <?php
        include 'footer.php';
        ?>

        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/Headroom.js"></script>
        <script src="js/jQuery.headroom.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/custom.js"></script>

    </body>
</html>
