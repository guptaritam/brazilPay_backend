<?php require 'includes/header_start.php'; ?>

    <!-- DataTables -->
    <link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css"/>
    <!-- Responsive datatable examples -->
    <link href="assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css"/>

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
                            <h4 class="page-title">Frequently Asked Questions</h4>
                            <ol class="breadcrumb p-0">
                                <li>
                                    <a href="#">Dashboard</a>
                                </li>
                                <li>
                                    <a href="#">Frequently Asked Questions</a>
                                </li>
                                <li class="active">
                                    Frequently Asked Questions
                                </li>
                            </ol>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <?php see_status2($_REQUEST); ?>
             

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            

                         

                        <div class="panel-group" id="accordion">
            			  <div class="panel panel-default">
            			    <div class="panel-heading" style="padding:10px;border:solid 1px #eee;">
            			      <h4 class="panel-title">
            			        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
            			        Q1. Is there any sort of a Blockchain explorer where everyone can see the transactions? </a>
            			      </h4>
            			    </div>
            			    <div id="collapse1" class="panel-collapse collapse in" style="padding:10px;">
            			      <div class="panel-body">Our fees are simple! User-to-user transactions within BrazilPay are free and have no transaction fee. They are also instant, with no confirmation delays. It's the best value!
                                All transactions into and out of BrazilPay have a one percent transaction fee to cover miner fees, storage and the cost of our service. During times of blockchain congestion, withdrawals may have an additional fee to ensure fast delivery.</div>
            			    </div>
            			  </div>
            			  <div class="panel panel-default">
            			    <div class="panel-heading" style="padding:10px;border:solid 1px #eee;">
            			      <h4 class="panel-title">
            			        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
            			         Q2.  What happens if someone lose their password? How can the admin help? </a>
            			      </h4>
            			    </div>
            			    <div id="collapse2" class="panel-collapse collapse" style="padding:10px;border:solid 1px #eee;">
            			      <div class="panel-body">Initially customer funds are pooled. We are working on optional individual storage with user accessible private keys, multi-sig withdrawals and insured storage. Our cold storage wallets are distributed in physical vaults throughout the country and require multiple people to access. Our cold storage wallets are not accessible via any system. There is no automatic replenish of the hot wallet from cold storage.</div>
            			    </div>
            			  </div>
            			  
            			  <div class="panel panel-default">
            			    <div class="panel-heading" style="padding:10px;border:solid 1px #eee;">
            			      <h4 class="panel-title">
            			        <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
            			         Q3. Is it possible for the admin to stop (or revert) a transaction?</a>
            			      </h4>
            			    </div>
            			    <div id="collapse4" class="panel-collapse collapse" style="padding:10px;border:solid 1px #eee;">
            			      <div class="panel-body">Our servers, load balancers and database are hosted by Amazon AWS. Our SHA-2 SSL is provided by Godaddy. Some of our development tools and our analytics are provided by Google. Every member of our development team has been involved with our founders' businesses for a minimum of 5 years. Our founders, Price Givens and Alex Charfen, have been business partners for 20+ years..</div>
            			    </div>
            			  </div>
            			  
            			  
            			  <div class="panel panel-default">
            			    <div class="panel-heading">
            			      <h4 class="panel-title" style="padding:10px;border:solid 1px #eee;">
            			        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
            			         Q4. Someone has logged into my account and my coins are no longer there, now what? </a>
            			      </h4>
            			    </div>
            			    <div id="collapse3" class="panel-collapse collapse" style="padding:10px;border:solid 1px #eee;">
            			      <div class="panel-body">Your BrazilPay account is accessible to anyone that has the correct email and password combination needed to log in. We have no way of knowing whether a correctly authenticated login is you or someone else that obtained your password and changed the email on the account. Similarly, if you complain to us we have no way of establishing that you are who you say you are, and that you didn't take the coins yourself. 

The bottom line is: protect your password, because there is nothing we can do to help you recover missing coins. If you are able to log into your account you can see the IP addresses of the most recent logins on your account page. You can see the blockchain address where withdrawals were sent to on the transaction detail page. We have no additional information to provide and we are not equipped to conduct investigations on your behalf. Provide the login and transaction activity to the law enforcement agency of your choice.</div>
            			    </div>
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

    <!-- Required datatable js -->
    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
    <script src="assets/plugins/datatables/jszip.min.js"></script>
    <script src="assets/plugins/datatables/pdfmake.min.js"></script>
    <script src="assets/plugins/datatables/vfs_fonts.js"></script>
    <script src="assets/plugins/datatables/buttons.html5.min.js"></script>
    <script src="assets/plugins/datatables/buttons.print.min.js"></script>
    <script src="assets/plugins/datatables/buttons.colVis.min.js"></script>
    <!-- Responsive examples -->
    <script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="assets/plugins/datatables/responsive.bootstrap4.min.js"></script>


    <script type="text/javascript">
        $(document).ready(function () {
            $('#datatable').DataTable();

            //Buttons examples
            var table = $('#datatable-buttons').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'colvis']
            });

            table.buttons().container()
                .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
        });

    </script>

<?php require 'includes/footer_end.php' ?>  
                        