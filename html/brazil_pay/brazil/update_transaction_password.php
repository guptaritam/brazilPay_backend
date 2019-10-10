<?php require 'includes/header_start.php'; ?>
<!--Morris Chart CSS -->
<link rel="stylesheet" href="assets/plugins/morris/morris.css">
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
                        <h4 class="page-title">Update Transaction Password</h4>
                        <ol class="breadcrumb p-0">
                            <li>
                                <a href="#">Brazil Pay</a>
                            </li>
                            <li class="active">
                                Update Transaction Password
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
           

            <?php  see_status2($_REQUEST); $ratas = get_data_id("entrc_price"); ?>
            <div class="row">               

                <div class="col-xl-6 col-xs-12">
                    <div class="card-box items">
                       <div class="century" style="font-size: 24px;color: #333">Update Transaction Password</div>
                          <div class="century" style="font-size: 15px;color: #666">Your Transaction password is same as your Login password unless u change this</div>
                          <hr style="opacity: 1" />
                          <div style="padding: 10px;"></div>
                          
                          
                       
                           <form method="POST" action="update_tx_pass_handle.php">
                               
                              <div class="form-group" >
                                <label>Change Tx Password </label>
                                <input type="text" class="form-control" name="tx_password" value="<?php echo $pdo_auth['tx_pass']; ?>"   placeholder="Transaction Password">
                             </div>
                            
                              
                             <div style="padding:5px;"></div>

                             <input type="hidden" name="balance" value="<?php echo $pdo_auth['balance']; ?>">
                             
                            <div style="padding:5px;"></div>

                             <button class="btn btn-primary btn-lg" style="width: 100%" >Update Transaction Password</button>
                           </form>
                            
                        

                         <div style="padding:20px;"></div>                     
                   </div>
                </div><!-- end col-->

            </div>
           
        <div id="molka" style="visibility:hidden"></div>
        </div> <!-- container -->

    </div> <!-- content -->


</div>
<!-- End content-page -->


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->


<?php require 'includes/footer_start.php' ?>

  <script type="text/javascript" src="match.js"></script>
    <script type="text/javascript">
     $(document).ready(function(){
       $(function() {
        $('.items').matchHeight({
          byRow: true,
          property: 'height',
          target: null,
          remove: false
      });
      });
      
      $("#username").change(function(){
          var username  = $(this).val();
          $("#molka").load("load_address.php", {"username":username}, function(){
              var tx_address = $("#molka").html();
              $("#to_address").val(tx_address);
          });
          
      });
     });
    </script>
<!-- Page specific js -->
<script src="assets/pages/jquery.dashboard.js"></script>    
<?php require 'includes/footer_end.php' ?>
