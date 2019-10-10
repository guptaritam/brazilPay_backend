<?php require 'includes/header_start.php'; ?>
<!-- Extra css -->
<?php require 'includes/header_end.php'; ?>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Carousel</h4>
                        <ol class="breadcrumb p-0">
                            <li>
                                <a href="#">Uplon</a>
                            </li>
                            <li>
                                <a href="#">UI Kit</a>
                            </li>
                            <li class="active">
                                Carousel
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->


            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class=" m-t-0 header-title">Bootstrap Carousel</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">

                                <p class="text-muted m-b-30 font-13">Add captions to your slides easily with the <code>.carousel-caption</code>
                                    element within any <code>.carousel-item</code>. </p>

                                <!-- START carousel-->
                                <div id="carousel-example-captions" data-ride="carousel" class="carousel slide">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carousel-example-captions" data-slide-to="0"
                                            class="active"></li>
                                        <li data-target="#carousel-example-captions" data-slide-to="1"></li>
                                        <li data-target="#carousel-example-captions" data-slide-to="2"></li>
                                    </ol>
                                    <div role="listbox" class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="assets/images/big/1.jpg" alt="First slide image">
                                            <div class="carousel-caption">
                                                <h3 class="text-white font-600">First slide label</h3>
                                                <p>
                                                    Nulla vitae elit libero, a pharetra augue mollis interdum.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <img src="assets/images/big/2.jpg" alt="Second slide image">
                                            <div class="carousel-caption">
                                                <h3 class="text-white font-600">Second slide label</h3>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <img src="assets/images/big/3.jpg" alt="Third slide image">
                                            <div class="carousel-caption">
                                                <h3 class="text-white font-600">Third slide label</h3>
                                                <p>
                                                    Praesent commodo cursus magna, vel scelerisque nisl consectetur.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#carousel-example-captions" role="button" data-slide="prev"
                                       class="left carousel-control"> <span aria-hidden="true"
                                                                            class="fa fa-angle-left"></span> <span
                                            class="sr-only">Previous</span> </a>
                                    <a href="#carousel-example-captions" role="button" data-slide="next"
                                       class="right carousel-control"> <span aria-hidden="true"
                                                                             class="fa fa-angle-right"></span> <span
                                            class="sr-only">Next</span> </a>
                                </div>
                                <!-- END carousel-->
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 m-t-sm-40">

                                <p class="text-muted m-b-30 font-13">Add captions to your slides easily with the <code>.carousel-caption</code>
                                    element within any <code>.carousel-item</code>. </p>

                                <!-- START carousel-->
                                <div id="carousel-example-captions-1" data-ride="carousel" class="carousel slide">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carousel-example-captions-1" data-slide-to="0"
                                            class="active"></li>
                                        <li data-target="#carousel-example-captions-1" data-slide-to="1"></li>
                                        <li data-target="#carousel-example-captions-1" data-slide-to="2"></li>
                                    </ol>
                                    <div role="listbox" class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="assets/images/big/4.jpg" alt="First slide image">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="assets/images/big/5.jpg" alt="Second slide image">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="assets/images/big/6.jpg" alt="Third slide image">
                                        </div>
                                    </div>

                                </div>
                                <!-- END carousel-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->


        </div> <!-- container -->

    </div> <!-- content -->

</div>
<!-- End content-page -->


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->


<?php require 'includes/footer_start.php' ?>
<!-- put any extra js here -->
<?php require 'includes/footer_end.php' ?>
