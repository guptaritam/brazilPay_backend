<?php require 'includes/header_start.php'; ?>

    <!-- Jquery filer css -->
    <link href="assets/plugins/jquery.filer/css/jquery.filer.css" rel="stylesheet" />
    <link href="assets/plugins/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css" rel="stylesheet" />

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
                                    <h4 class="page-title">File Uploads</h4>
                                    <ol class="breadcrumb p-0">
                                        <li>
                                            <a href="#">Uplon</a>
                                        </li>
                                        <li>
                                            <a href="#">Forms</a>
                                        </li>
                                        <li class="active">
                                            File Uploads
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-xs-12">
                                <div class="card-box">

                                    <div class="row">
                                        <div class="col-sm-12 col-xs-12">
                                            <h4 class="header-title m-t-0">Example 1</h4>
                                            <p class="text-muted font-13 m-b-30">
                                                In this example we designed our own file input and used our own theme -
                                                'dragdropbox'. We also added the file preview in our browser before
                                                uploading the file.
                                            </p>

                                            <div class="p-20">
                                                <div class="form-group clearfix">
                                                    <div class="col-sm-12 padding-left-0 padding-right-0">
                                                            <input type="file" name="files[]" id="filer_input1"
                                                               multiple="multiple">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->

                                    <div class="row m-t-50">
                                        <div class="col-xs-12 col-sm-6">
                                            <h4 class="header-title m-t-0">Example 2</h4>
                                            <p class="text-muted font-13 m-b-30">
                                                In this example we limit our users with maximal 3 number of files, all
                                                files together must have maximal 3MB's and the file's extensions should
                                                be matched in the array(ex: ['jpg', 'png', 'gif']). We are also changig
                                                the file input to jQuery.filer default design. We also need to show the
                                                file preview in our browser before uploading the file.
                                            </p>

                                            <div class="p-20">
                                                <div class="form-group clearfix">
                                                    <div class="col-sm-12 padding-left-0 padding-right-0">
                                                            <input type="file" name="files[]" id="filer_input2"
                                                               multiple="multiple">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    <!-- end row -->

                        		</div>
                            </div><!-- end col-->

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

    <!-- Jquery filer js -->
    <script src="assets/plugins/jquery.filer/js/jquery.filer.min.js"></script>

    <!-- page specific js -->
    <script src="assets/pages/jquery.fileuploads.init.js"></script>

<?php require 'includes/footer_end.php' ?>