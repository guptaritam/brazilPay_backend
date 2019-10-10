<?php require 'includes/header_start.php'; ?>
<!--Morris Chart CSS -->
<link rel="stylesheet" href="assets/plugins/morris/morris.css">

<?php require 'includes/header_end.php'; ?>
<script src="assets/js/jquery.min.js"></script>

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
     });
    </script>



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
                        <h4 class="page-title">Dashboard</h4>
                        <ol class="breadcrumb p-0">                           
                            <li> <a href="#">Brazil Pay</a> </li>
                            <li class="active">  Dashboard  </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
           
            <?php  see_status2($_REQUEST); ?>

            
            <div class="row">
                <div class="col-xl-5 col-xs-12">

                  <div class="row">
                            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="card-box tilebox-one">
                                    <i class="icon-layers pull-xs-right text-muted"></i>
                                    <h6 class="text-muted text-uppercase m-b-20">Wallet Balance</h6>
                                    <?php  
                                    $curl = curl_init();
                                    $username = $pdo_auth['username'];

                                    curl_setopt_array($curl, array(
                                      CURLOPT_PORT => "3001",
                                      CURLOPT_URL => "http://18.217.132.185:3001/api/dataManager/get/userWalletBalance",
                                      CURLOPT_RETURNTRANSFER => true,
                                      CURLOPT_ENCODING => "",
                                      CURLOPT_MAXREDIRS => 10,
                                      CURLOPT_TIMEOUT => 30,
                                      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                      CURLOPT_CUSTOMREQUEST => "POST",
                                      CURLOPT_POSTFIELDS => "{\n  \"_userName\": \"$username\"\n}",
                                      CURLOPT_HTTPHEADER => array(
                                        "Content-Type: application/json",
                                        "Postman-Token: 056015ac-a11b-4ebc-891e-d5f0f3ce73df",
                                        "cache-control: no-cache"
                                      ),
                                    ));

                                    $response = curl_exec($curl);
                                    $err = curl_error($curl);

                                    curl_close($curl);
                                    $rda = 0;

                                    if ($err) {
                                      echo "cURL Error #:" . $err;
                                    } else {
                                      $rda = json_decode($response,true);
                                    }
                                   // echo $response; 
                                    ?>
                                    <h2 class="m-b-20" data-plugin="counterup"><?php echo $rda['walletBalance']; ?></h2>
                                    <span class="label label-success"> Brazil Pay </span> <span class="text-muted">No Recent Records</span>
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-6">
                                <a href="transfer.php">
                                  <div class="card-box tilebox-one">
                                      <i class="icon-rocket pull-xs-right text-muted"></i>
                                      <h6 class="text-muted text-uppercase m-b-20">Total Transfers</h6>
                                      <?php 
                                     
                                      try {
                                          $stmt = $pdo->prepare('SELECT * FROM `transfer` WHERE `to` LIKE "'.$pdo_auth['tx_address'].'" OR `from` LIKE "'.$pdo_auth['tx_address'].'" ORDER BY date DESC');
                                         // echo 'SELECT * FROM `transfer` WHERE `to` LIKE "'.$pdo_auth['tx_address'].'" OR `from` LIKE "'.$pdo_auth['tx_address'].'" ORDER BY date DESC';
                                         
                                      } catch(PDOException $ex) {
                                          echo "An Error occured!"; 
                                          print_r($ex->getMessage());
                                      }
                                      $stmt->execute();
                                      $user = $stmt->fetchAll();
                                      $i=1;
                                      $sum= 0;
                                      foreach ($user as $key => $value) {
                                          $sum+=$value['tokens'];
                                      }

                                      $curl = curl_init();

                                      curl_setopt_array($curl, array(
                                        CURLOPT_PORT => "3001",
                                        CURLOPT_URL => "http://18.217.132.185:3001/api/dataManager/get/userTotalTransfers",
                                        CURLOPT_RETURNTRANSFER => true,
                                        CURLOPT_ENCODING => "",
                                        CURLOPT_MAXREDIRS => 10,
                                        CURLOPT_TIMEOUT => 30,
                                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                        CURLOPT_CUSTOMREQUEST => "POST",
                                        CURLOPT_POSTFIELDS => "{\n  \"_userName\": \"rit1204\"\n}",
                                        CURLOPT_HTTPHEADER => array(
                                          "Accept: */*",
                                          "Accept-Encoding: gzip, deflate",
                                          "Cache-Control: no-cache",
                                          "Connection: keep-alive",
                                          "Content-Length: 28",
                                          "Content-Type: application/json",
                                          "Cookie: connect.sid=s%3As9jhZR8iq-hQnNHcnyK3cDbquTrjhCFW.C0PHBIykD56y2P859rElDNkIt4N%2BMpyc0pCWpN642gc",
                                          "Host: 18.217.132.185:3001",
                                          "Postman-Token: faa7c043-b1ca-489a-9260-b2b45ac0760a,e9fc92e7-cd1f-4de6-be9c-04488f96acfc",
                                          "User-Agent: PostmanRuntime/7.16.3",
                                          "cache-control: no-cache"
                                        ),
                                      ));

                                      $response = curl_exec($curl);
                                      $err = curl_error($curl);

                                      curl_close($curl);
                                      $rft = 0;

                                      if ($err) {
                                        echo "cURL Error #:" . $err;
                                      } else {
                                        $rft = json_decode($response,true);
                                      }
                                     ?>          
                                      <h2 class="m-b-20" data-plugin="counterup"><?php echo number_format($rft, true);  ?></h2>
                                      <span class="label label-warning"> All Time </span> <span class="text-muted">From Your Joining</span>
                                  </div>
                                </a>
                            </div>
                        </div>


                    <div class="card-box items">
                         <center> <img src="profile/<?php echo $pdo_auth['file']; ?>" style="width: 170px; ">

                         <div style="padding:7px;"></div>
                          <div class="century" style="font-weight: bold;font-size: 24px;color: #79a4ec;text-transform: uppercase;"><?php echo $pdo_auth['name']; ?></div>
                          
                          <hr style="width: 60%;opacity: .1" />
                          <a href="" class="btn btn-primary btn-sm btn-primary" data-toggle="modal" data-target="#myModal" data-step="3" data-intro="You can Update Profile Here" data-position='right' >Update Profile</a>
                          <a href="change_photo.php"><button class="btn btn-sm btn-success"  data-step="1" data-intro="Here You can Change Your Profile Photo " >Update Photo</button></a> <a href="update_transaction_password.php"><button class="btn btn-sm btn-info"  data-step="1" data-intro="Here You can Change Your transaction Password " >Update Tx Password</button></a>

                         
                          <div style="padding:3px;"></div>
                          <div style="font-size:12px;color: #444;">Last Visited on <?php echo date("D-m-y : H:i:s"); ?></div>
                          <hr style="opacity: .1;background-color:#888;margin:10px 0px;" />
                           
                          <b class="century" style="color: #33aece">Account Address : </b>
                          <div data-step="5" data-intro="This is your wallet Address, You can change i from Update Profile Button" data-position='right' style="color: #999;word-wrap: break-word;"><?php echo $pdo_auth['tx_address']; ?></div>
                         
                          <div style="padding:8px;"></div> 
                          <b style="color:green">Transaction Limit : </b> <?php echo $pdo_auth['tx_limit']; ?> Tokens
                           
                        </div>
                </div><!-- end col-->


                <div class="col-xl-7 col-xs-12">
                    <div class="card-box items" style="height:640px">
                        <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0"
                                   width="100%" style="color: #333">
                                <thead>
                                    <tr>
                                      <th style="color:#000;opacity: .4">Request</th>
                                      <th style="color:#000;opacity: .4">From User</th>
                                      <th style="color:#000;opacity: .4">Amount </th>
                                      <th style="color:#000;opacity: .4">Status</th>
                                      <th style="color:#000;opacity: .4">Action</th>
                                    </tr>
                                 </thead>
                                 <tbody style="color: #333">
                                   <?php                      
                                      try {
                                          $stmt = $pdo->prepare('SELECT * FROM `pay_request` WHERE `to_user`="'.$pdo_auth['tx_address'].'" OR `from_user`="'.$pdo_auth['tx_address'].'" ORDER BY date DESC LIMIT 6 ');
                                        // echo 'SELECT * FROM `pay_request` WHERE `from_user`="'.$pdo_auth['tx_address'].'" ORDER BY date DESC ';
                                      } catch(PDOException $ex) {
                                          echo "An Error occured!"; 
                                          print_r($ex->getMessage());
                                      }
                                      $stmt->execute();
                                      $user = $stmt->fetchAll();
                                      $i='<label class="label label-warning">Debit</label>';
                                      foreach ($user as $key => $value) {
                                          if($value['from_user']==$pdo_auth['tx_address']){
                                              $i='<label class="label label-success">Credit</label>';
                                          }
                                         // print_r($value);
                                          
                                        $username  = tx_to_username($value['from_user']);
                                        $to_username  = tx_to_username($value['to_user']);
                                        $btn = '<a href="pay_it.php?id='.$value['id'].'"  class="btn btn-success btn-sm"><i class="zmdi zmdi-check-circle"></i></a> <a href="reject_it.php?id='.$value['id'].'"  class="btn btn-danger btn-sm"><i class="zmdi zmdi-close-circle"></i></a>';
                                        
                                        if($value['to_user']==$pdo_auth['tx_address'])
                                        {
                                            if($value['status']=="Available"){
                                                $btn = '<button class="btn btn-default btn-sm">Paid</button>';
                                            }
                                            else if($value['status']=="Rejected"){
                                                $btn = '<button class="btn btn-danger btn-sm">Rejected</button>';
                                            }
                                            else{
                                                $btn = '<a href="pay_it.php?id='.$value['id'].'"  class="btn btn-success btn-sm"><i class="zmdi zmdi-check-circle"></i></a> <a href="reject_it.php?id='.$value['id'].'"  class="btn btn-danger btn-sm"><i class="zmdi zmdi-close-circle"></i></a>';
                                            }
                                        }else{
                                            if($value['status']=="Available"){
                                                $btn = '<button class="btn btn-default btn-sm">Paid</button>';
                                            }
                                            else if($value['status']=="Rejected"){
                                                $btn = '<button class="btn btn-danger btn-sm">Rejected</button>';
                                            }
                                            else{
                                                $btn = '<a href="reject_it.php?id='.$value['id'].'"  class="btn btn-danger btn-sm"><i class="zmdi zmdi-close-circle"></i></a>';
                                            }
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
                                               <td>'.$i.'<br/>
                                                <a href="share_request.php?0x6302f8774a817747d4a0b90f7cb2fcf46c3c5b12Doplat='.base64_encode($value['id']).'" target="_blank">Share This</a>
                                               </td>
                                               <td><label class="label label-primary">'.$username['username'].'</label> > <label class="label label-info">'.$to_username['username'].'</label><br/><span style="font-size:12px;"> Tx Date : '.$value['date'].'</span></td>
                                               <td><b style="font-size:12px;text-transform:capitalize">'.$value['amount'].' SXT</b>
                                               
                                               </td>
                                               <td>'.$status.'</td>
                                               <td>'.$btn.'</td>
                                             </tr>';
                                              $i++;
                                      }
                                     ?>                   
                                 </tbody>
                            </table>
                       
                    </div>
                </div><!-- end col-->


            </div>
            <!-- end row -->
           

            <div class="row">
                <div class="col-xs-12 col-lg-12 col-xl-12">
                   
                        <div class="card-box">
                                <h4 class="header-title m-t-0 m-b-20">Blockchain Transactions</h4>

                               <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0"
                                   width="100%" style="color: #333">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th style="width:400px">Username</th>
                                    <th>To Froms</th>
                                    <th>Token Amount</th>
                                    <th>Direction </th>                   
                                  </tr>
                                </thead>
                                <tbody>
                               <?php 
                                   
                                    try {
                                        $stmt = $pdo->prepare('SELECT * FROM `transfer` WHERE `to` LIKE "'.$pdo_auth['tx_address'].'" OR `from` LIKE "'.$pdo_auth['tx_address'].'" ORDER BY date DESC LIMIT 10');
                                       
                                    } catch(PDOException $ex) {
                                        echo "An Error occured!"; 
                                        print_r($ex->getMessage());
                                    }
                                    $stmt->execute();
                                    $user = $stmt->fetchAll();
                                    $i=1;
                                    foreach ($user as $key => $value) {
                                        
                                        $statys = '<label class="label label-info" style="color:#fff">'.$value['process'].'</label>';
                                        $to = get_data_id_data("users", "tx_address", $value['to']);
                                        $from = get_data_id_data("users", "tx_address", $value['from']);
                                       // print_r($to);
                                      echo ' <tr>
                                              <td>'.$i.'</td>
                                               <td>'.$pdo_auth['name'].'<br/>
                                                    <span style="font-size:12px;color:#888">'.$value['remark'].'</td>
                                              <td><b>To : </b>'.$to['username'].'<br/> <b>from : </b> '.$from['username'].'<br/><label class="label label-success">'.$value['tx_address'].'</label> </td>
                                              <td>'.round($value['tokens'],2).'</td>
                                              <td>'.$statys.' <br/> '.$value['date'].'</td>                                                              
                                            </tr>';
                                            $i++;
                                    }
                                   ?>          
                                </tbody>
                            </table>
                            
                    </div>
                </div><!-- end col-->
            </div>
            <!-- end row -->


        </div> <!-- container -->

    </div> <!-- content -->


</div>
<div class="modal" id="myModalssss">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <h4>Please Chose a Username</h4><hr/>
        
        <form method="POST" action="update_user_name.php">
            <div class="form-group">
                <label>Enter Desired Username </label>
                <input type="text" id="username" class="form-control" name="username" placeholder="Choose a Username" />
            </div>
            <button class="btn btn-success" id="vty" disabled type="submit" style="width:100%">Keep this Username</button>
            <div id="batakh"></div>
            <hr/>
            <div style="font-size:12px;">Username will always be permanent, That means once you chose the username it can never be changed</div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php require 'includes/footer_start.php' ?>
<script>
     
    $(document).ready(function(){
        $("#username").blur(function(){
            $("#vty").html("Checking ... Please Wait ");
            var username = $("#username").val();
            if (username.match(/[^a-zA-Z0-9 ]/g)) {
                    $("#batakh").html('<span style="width:100%;display:inline-block;margin-top:10px;padding:4px;background-color:red;color:#fff;font-size:12px;">Alphaneumeric Names Only</span>');
                    $("#vty").html("Keep this Username");
                     $("#vty").prop("disabled", true);
            }else{
                $("#batakh").load("check_username.php", {"username":username},function(){
                    var value = $("#batakh").html();
                    if(value=="1"){
                        $("#batakh").html('<span style="width:100%;display:inline-block;margin-top:10px;padding:4px;background-color:red;color:#fff;font-size:12px;">Username Already Exisit, Please Try again with a new One.</span>');
                        $("#vty").html("Keep this Username");
                         $("#vty").prop("disabled", true);
                    }else{
                        $("#batakh").html('<span style="width:100%;display:inline-block;margin-top:10px;padding:4px;background-color:green;color:#fff;font-size:12px;">Voilla! The username is Available.</span>');
                         $("#vty").removeAttr("disabled");
                         $("#vty").prop("disabled", false);
                        $("#vty").html("Keep this Username");
                    }
                });
            }
        });
    });
</script>

<!-- Page specific js -->
<script src="assets/pages/jquery.dashboard.js"></script>

<script>
    $(window).on('load',function(){
        <?php 
            if($pdo_auth['username']==""){
                echo "$('#myModalssss').modal({backdrop: 'static', keyboard: false});";
            }
        ?>
    });
   
</script>
<?php require 'includes/footer_end.php' ?>
