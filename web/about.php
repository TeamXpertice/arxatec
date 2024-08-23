<?php
            include 'heading.php';
        ?>
    
    <body>

        <section class="preloader">
            <div class="spinner">
                <span class="sk-inner-circle"></span>
            </div>
        </section>
    
        <main>

            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <a class="navbar-brand" href="index.html">
                        <strong><span>Little</span> Fashion</strong>
                    </a>

                    <div class="d-lg-none">
                        <a href="sign-in.html" class="bi-person custom-icon me-3"></a>

                        <a href="product-detail.html" class="bi-bag custom-icon"></a>
                    </div>

                    <?php
            include 'navbar.php';
            ?>
                </div>
            </nav>

            <header class="site-header section-padding-img site-header-image">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-12 header-info">
                            <h1>
                                <span class="d-block text-primary">Sobre</span>
                                <span class="d-block text-dark">NOSOTROS</span>
                            </h1>
                        </div>
                    </div>
                </div>

                <img src="images/nosotros.jpg" class="header-image img-fluid" alt="">
            </header>

            <section class="team section-padding">
                <div class="container">
                    <div class="row">

                        <div class="col-12">
                            <h2 class="mb-5">Nuestro <span>equipo</span></h2>
                        </div>

                        <div class="col-lg-4 mb-4 col-12">
                            <div class="team-thumb d-flex align-items-center">
                                <img src="images/people/senior-man-wearing-white-face-mask-covid-19-campaign-with-design-space.jpeg" class="img-fluid custom-circle-image team-image me-4" alt="">

                                <div class="team-info">
                                    <h5 class="mb-0">Rafael Aguirre</h5>
                                    <strong class="text-muted">Fundador</strong>

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn custom-modal-btn" data-bs-toggle="modal" data-bs-target="#don">
                                      <i class="bi-plus-circle-fill"></i>
                                    </button>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mb-4 col-12">
                            <div class="team-thumb d-flex align-items-center">
                                <img src="images/people/portrait-british-woman.jpeg" class="img-fluid custom-circle-image team-image me-4" alt="">

                                <div class="team-info">
                                    <h5 class="mb-0">Kelly Aguirre</h5>
                                    <strong class="text-muted">Coordinador</strong>

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn custom-modal-btn" data-bs-toggle="modal" data-bs-target="#kelly">
                                      <i class="bi-plus-circle-fill"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mb-lg-0 mb-4 col-12">
                            <div class="team-thumb d-flex align-items-center">
                                <img src="images/people/beautiful-woman-face-portrait-brown-background.jpeg" class="img-fluid custom-circle-image team-image me-4" alt="">

                                <div class="team-info">
                                    <h5 class="mb-0">Maria</h5>
                                    <strong class="text-muted">Contadora</strong>

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn custom-modal-btn" data-bs-toggle="modal" data-bs-target="#marie">
                                      <i class="bi-plus-circle-fill"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <section class="testimonial section-padding">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-9 mx-auto col-11">
                            <h2 class="text-center">Comentarios de nuestros<br> <span>Clientes</span></h2>

                            <div class="slick-testimonial">
                                <div class="slick-testimonial-caption">
                                    <p class="lead">Over three years in business, We’ve had the chance to work on a variety of projects, with companies Lorem ipsum dolor sit amet</p>

                                    <div class="slick-testimonial-client d-flex align-items-center mt-4">
                                        <img src="images/people/senior-man-wearing-white-face-mask-covid-19-campaign-with-design-space.jpeg" class="img-fluid custom-circle-image me-3" alt="">

                                        <span>George, <strong class="text-muted">Digital Art Fashion</strong></span>
                                    </div>
                                </div>

                                <div class="slick-testimonial-caption">
                                    <p class="lead">Over three years in business, We’ve had the chance to work on a variety of projects, with companies Lorem ipsum dolor sit amet</p>

                                    <div class="slick-testimonial-client d-flex align-items-center mt-4">
                                        <img src="images/people/beautiful-woman-face-portrait-brown-background.jpeg" class="img-fluid custom-circle-image me-3" alt="">

                                        <span>Sandar, <strong class="text-muted">Zoom Fashion Idea</strong></span>
                                    </div>
                                </div>

                                <div class="slick-testimonial-caption">
                                    <p class="lead">Over three years in business, We’ve had the chance to work on a variety of projects, with companies Lorem ipsum dolor sit amet</p>

                                    <div class="slick-testimonial-client d-flex align-items-center mt-4">
                                        <img src="images/people/portrait-british-woman.jpeg" class="img-fluid custom-circle-image me-3" alt="">

                                        <span>Marie, <strong class="text-muted">Art Fashion Design</strong></span>
                                    </div>
                                </div>

                                <div class="slick-testimonial-caption">
                                    <p class="lead">Over three years in business, We’ve had the chance to work on a variety of projects, with companies Lorem ipsum dolor sit amet</p>

                                    <div class="slick-testimonial-client d-flex align-items-center mt-4">
                                        <img src="images/people/woman-wearing-mask-face-closeup-covid-19-green-background.jpeg" class="img-fluid custom-circle-image me-3" alt="">

                                        <span>Catherine, <strong class="text-muted">Dress Fashion</strong></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

        </main>

        <?php
        include 'footer.php';
        ?>

        <!-- TEAM MEMBER MODAL -->
        <div class="modal fade" id="don" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content border-0">
                    <div class="modal-header flex-column">
                        <h3 class="modal-title" id="exampleModalLabel">Rafael Aguirre</h3>

                        <h6 class="text-muted">Product, VP</h6>

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                <h5 class="mb-4">Con más de tres años de experiencia en el campo legal, Rafael ha tenido la oportunidad de trabajar en una variedad de proyectos y ofrecer asesoría legal a numerosas empresas y clientes.</h5>

                <div class="row mb-4">
                    <div class="col-lg-6 col-12">
                        <p>Rafael Aguirre es el fundador de ArxaTEC, especializado en brindar soluciones legales personalizadas y efectivas. Su experiencia y dedicación lo han posicionado como un referente en el ámbito legal.</p>
                    </div>

                    <div class="col-lg-6 col-12">
                        <p>Con un enfoque en la excelencia y el compromiso con sus clientes, Rafael lidera el equipo de ArxaTEC ofreciendo un servicio de alta calidad y profesionalismo.</p>
                    </div>
                </div>

                <ul class="social-icon">
                    <li class="me-3"><strong>Quieres contactarte con Rafael?</strong></li>

                    <li><a href="#" class="social-icon-link bi-linkedin"></a></li>

                    <li><a href="#" class="social-icon-link bi-whatsapp"></a></li>

                    <li><a href="#" class="social-icon-link bi-twitter"></a></li>
                </ul>
            </div>
                </div>

            </div>
        </div>

        <!-- TEAM MEMBER MODAL -->
        <div class="modal fade" id="kelly" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content border-0">
                    <div class="modal-header flex-column">
                        <h3 class="modal-title" id="exampleModalLabel">Kelly Lisa</h3>

                        <h6 class="text-muted">Global, Head of Marketing</h6>

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <h5 class="mb-4">Over three years in business had the chance to work on variety of projects, with companies</h5>

                        <div class="row mb-4">
                            <div class="col-lg-6 col-12">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>

                            <div class="col-lg-6 col-12">
                                <p>Incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse commodo viverra.</p>
                            </div>
                        </div>

                        <ul class="social-icon">
                            <li class="me-3"><strong>Where to find?</strong></li>

                            <li><a href="#" class="social-icon-link bi-facebook"></a></li>

                            <li><a href="#" class="social-icon-link bi-instagram"></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

        <!-- TEAM MEMBER MODAL -->
        <div class="modal fade" id="marie" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content border-0">
                    <div class="modal-header flex-column">
                        <h3 class="modal-title" id="exampleModalLabel">Marie Sam</h3>

                        <h6 class="text-muted">Founder & CEO</h6>

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <h5 class="mb-4">Over three years in business had the chance to work on variety of projects, with companies</h5>

                        <div class="row mb-4">
                            <div class="col-lg-6 col-12">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>

                            <div class="col-lg-6 col-12">
                                <p>Incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse commodo viverra.</p>
                            </div>
                        </div>

                        <ul class="social-icon">
                            <li class="me-3"><strong>Where to find?</strong></li>

                            <li><a href="#" class="social-icon-link bi-twitter"></a></li>

                            <li><a href="#" class="social-icon-link bi-linkedin"></a></li>

                            <li><a href="#" class="social-icon-link bi-envelope"></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/Headroom.js"></script>
        <script src="js/jQuery.headroom.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/custom.js"></script>

    </body>
</html>
