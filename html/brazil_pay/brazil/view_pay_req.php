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
                            <h4 class="page-title">Request Tokens</h4>
                            <ol class="breadcrumb p-0">
                                <li>
                                    <a href="#">Dashboard</a>
                                </li>
                                <li>
                                    <a href="#">Request Tokens</a>
                                </li>
                                <li class="active">
                                    Request Tokens
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
                            <h4 class="m-t-0 header-title"><b>View Tokens requested From  You</b></h4>
                            <hr/>
                           

                            <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0"
                                   width="100%" style="color: #333">
                                <thead>
                                    <tr>
                                      <th style="color:#000;opacity: .4">S.No</th>
                                     
                                       <th style="color:#000;opacity: .4">To User</th>
                                        <th style="color:#000;opacity: .4">From User</th>
                                      <th style="color:#000;opacity: .4">Amount </th>
                                      <th style="color:#000;opacity: .4">Date</th>
                                      <th style="color:#000;opacity: .4">Status</th>
                                      <th style="color:#000;opacity: .4">Action</th>
                                    </tr>
                                 </thead>
                                 <tbody style="color: #333">
                                   <?php                      
                                      try {
                                          $stmt = $pdo->prepare('SELECT * FROM `pay_request` WHERE `to_user`="'.$pdo_auth['tx_address'].'" ORDER BY date DESC ');
                                        // echo 'SELECT * FROM `pay_request` WHERE `from_user`="'.$pdo_auth['tx_address'].'" ORDER BY date DESC ';
                                      } catch(PDOException $ex) {
                                          echo "An Error occured!"; 
                                          print_r($ex->getMessage());
                                      }
                                      $stmt->execute();
                                      $user = $stmt->fetchAll();
                                      $i=1;
                                      foreach ($user as $key => $value) {
                                          
                                       $username  = tx_to_username($value['from_user']);
                                        $btn = '<a href="pay_it.php?id='.$value['id'].'"  class="btn btn-success btn-sm"><i class="zmdi zmdi-check-circle"></i></a> <a href="reject_it.php?id='.$value['id'].'"  class="btn btn-danger btn-sm"><i class="zmdi zmdi-close-circle"></i></a>';
                                        if($value['status']=="Available"){
                                            $btn = '<button class="btn btn-default btn-sm">Paid</button>';
                                        }
                                        else if($value['status']=="Rejected"){
                                            $btn = '<button class="btn btn-danger btn-sm">Rejected</button>';
                                        }
                                        else{
                                            $btn = '<a href="pay_it.php?id='.$value['id'].'"  class="btn btn-success btn-sm"><i class="zmdi zmdi-check-circle"></i></a> <a href="reject_it.php?id='.$value['id'].'"  class="btn btn-danger btn-sm"><i class="zmdi zmdi-close-circle"></i></a>';
                                        }
                                        
                                        
                                        
                                        $status = '<label class="label label-success" style="padding-right: 7px;">Approved</label>';
                                        if($value['status']=="Pending"){
                                          $status = '<label class="label label-warning" style="padding-right: 7px;">Pending</label>';
                                        }
                                        else if($value['status']=="Rejected"){
                                          $status = '<label class="label label-danger" style="padding-right: 7px;">Rejected</label>';
                                        }
                                        else{
                                            $status = '<label class="label label-success" style="padding-right: 7px;">Approved</label>';
                                        }
                                        echo ' <tr style="color:#333">
                                               <td>'.$i.'</td>
                                               
                                               <td><label class="label label-primary">'.$username['username'].'</label><br/><span style="font-size:12px;">'.$value['to_user'].'</span></td>
                                               <td><label class="label label-success">'.$pdo_auth['username'].'</label><br/><span style="font-size:12px;">'.$pdo_auth['tx_address'].'</span></td>
                                               <td><b style="font-size:12px;text-transform:capitalize">'.$value['amount'].' SXT</b>
                                               </td>
                                               <td>'.$value['date'].'</td>
                                               <td>'.$status.'</td>
                                               <td>'.$btn.'</td>
                                             </tr>';
                                              $i++;
                                      }
                                     ?>                   
                                 </tbody>
                            </table>
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