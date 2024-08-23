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

            <?php
            require 'navbar.php'
            ?>

            <header class="site-header section-padding d-flex justify-content-center align-items-center">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-10 col-12">
                            <h1>
                                <span class="d-block text-primary">Introducción al</span>
                                <span class="d-block text-dark">Derecho Laboral</span>
                            </h1>
                        </div>
                    </div>
                </div>
            </header>

            <section class="product-detail section-padding">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-12">
                            <div class="product-thumb">
                                <img src="images/laboral.jpg" class="img-fluid product-image" alt="">
                            </div>
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="product-info d-flex">
                                <div>
                                    <h2 class="product-title mb-0">Derecho Laboral</h2>

                                    <p class="product-p">Original package design from house</p>
                                </div>

                                <small class="product-price text-muted ms-auto mt-auto mb-5">$25</small>
                            </div>

                            <div class="product-description">

                                <strong class="d-block mt-4 mb-2">Descripcion</strong>

                                <p class="lead mb-5">Over three years in business, We’ve had the chance to work on a variety of projects, with companies Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur consequuntur nobis velit itaque nam cumque nesciunt dolorem, impedit aspernatur atque consequatur sequi, praesentium nulla illum iure amet maiores reiciendis et. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod aperiam illum delectus pariatur ullam quisquam tempora placeat reprehenderit ipsa deleniti soluta eius ex, sit, molestias totam sint voluptate error nesciunt?</p>
                            </div>

                            <div class="product-cart-thumb row">
                                <div class="col-lg-6 col-12">
                                    
                                    <select class="form-select cart-form-select" id="inputGroupSelect01">
                                        <option selected>Quantity</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>

                                <div class="col-lg-6 col-12 mt-4 mt-lg-0">
                                    <button type="submit" class="btn custom-btn cart-btn" data-bs-toggle="modal" data-bs-target="#cart-modal">COMPRAR CURSO</button>
                                </div>

                                <p>
                                    <a href="#" class="product-additional-link">Details</a>

                                    <a href="#" class="product-additional-link">Delivery and Payment</a>
                                </p>
                            </div>

                        </div>

                    </div>
                </div>
            </section>
            <?php
    include 'talleres.php';
?>
            

        </main>

        <?php
    include 'footer.php';
?>

        <!-- CART MODAL -->
        <div class="modal fade" id="cart-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content border-0">
                    <div class="modal-header flex-column">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6 col-12 mt-4 mt-lg-0">
                                <img src="images/product/evan-mcdougall-qnh1odlqOmk-unsplash.jpeg" class="img-fluid product-image" alt="">
                            </div>

                            <div class="col-lg-6 col-12 mt-3 mt-lg-0">
                                <h3 class="modal-title" id="exampleModalLabel">Tree pot</h3>

                                <p class="product-price text-muted mt-3">$25</p>

                                <p class="product-p">Quatity: <span class="ms-1">4</span></p>

                                <p class="product-p">Colour: <span class="ms-1">Black</span></p>

                                <p class="product-p pb-3">Size: <span class="ms-1">S/S</span></p>

                                <div class="border-top mt-4 pt-3">
                                    <p class="product-p"><strong>Total: <span class="ms-1">$100</span></strong></p>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="row w-50">
                            <button type="button" class="btn custom-btn cart-btn ms-lg-4">Checkout</button>
                        </div>
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