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
                        <h4 class="page-title">Sell Brazil Pay Tokens</h4>
                        <ol class="breadcrumb p-0">
                           
                            <li>
                                <a href="#">Brazil Pay</a>
                            </li>
                            <li class="active">
                                Sell Brazil Pay
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
                       <div class="century" style="font-size: 24px;color: #333">Send Brazil Pay Token to another Brazil Pay Token address</div>
                          <div class="century" style="font-size: 15px;color: #666">You can now Send  <b style="color: #ddd">Brazil Pay Token</b> From Below.</div>
                          <hr style="opacity: 1" />
                          <div style="padding: 10px;"></div>
                          
                          
                       
                           <form method="POST" action="send_handle.php">
                               
                              <div class="form-group" >
                                <label>Enter Username </label>
                                <input type="text" class="form-control" name="username" id="username" autocomplete="off" placeholder="Enter Username of User ">
                             </div>
                            
                            
                            
                              <div class="form-group" >
                                <label>Enter Brazil Pay Token Address</label>
                                <input type="text" class="form-control" name="to_address" id="to_address" readonly  placeholder="Enter Brazil PayX Token Address address">
                             </div>
                            
                             <div class="form-group" >
                                <label>Your Brazil Pay Token Address</label>
                                <input type="text" class="form-control" name="tx_addresss"  readonly="" value="<?php echo $pdo_auth['tx_address']; ?>" placeholder="Your Brazil Pay Token Address">
                             </div>
                            
                             <div class="form-group" >
                                <label>No. of Brazil Pay Token To Send <span  style="color: cream;">(You have : <?php
                                  $curl = curl_init();
                                  $username = $pdo_auth['username'];
                                  $datas = "{\n  \"_userName\": \"$username\"\n}";
                                  $saz = strlen($datas);

                                  curl_setopt_array($curl, array(
                                    CURLOPT_PORT => "3001",
                                    CURLOPT_URL => "http://18.217.132.185:3001/api/dataManager/get/userWalletBalance",
                                    CURLOPT_RETURNTRANSFER => true,
                                    CURLOPT_ENCODING => "",
                                    CURLOPT_MAXREDIRS => 10,
                                    CURLOPT_TIMEOUT => 30,
                                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                    CURLOPT_CUSTOMREQUEST => "POST",
                                    CURLOPT_POSTFIELDS => $datas,
                                    CURLOPT_HTTPHEADER => array(
                                      "Accept: */*",
                                      "Accept-Encoding: gzip, deflate",
                                      "Cache-Control: no-cache",
                                      "Connection: keep-alive",
                                      "Content-Length: $saz",
                                      "Content-Type: application/json",
                                      "Cookie: connect.sid=s%3As9jhZR8iq-hQnNHcnyK3cDbquTrjhCFW.C0PHBIykD56y2P859rElDNkIt4N%2BMpyc0pCWpN642gc",
                                      "Host: 18.217.132.185:3001",
                                      "Postman-Token: 092f298c-1be2-4388-85a3-e3bc08a9efcf,fdc0f471-10d8-4213-b051-30aff73c50bf",
                                      "User-Agent: PostmanRuntime/7.16.3",
                                      "cache-control: no-cache"
                                    ),
                                  ));

                                  $rad = 0;
                                  $response = curl_exec($curl);
                                  $err = curl_error($curl);

                                  curl_close($curl);

                                  if ($err) {
                                    echo "transaction Error #:" . $err;
                                  } else {
                                    //print_r($response);
                                    $rad = json_decode($response,true);
                                  }
                                 echo $rad['walletBalance']; ?> Brazil Pay Token)</span></label><br/>
                                <input type="number" min="0" class="form-control"  step=".0001" name="token_no" max="<?php echo $rad['walletBalance']; ?>"  placeholder="Enter No. of Brazil Pay Token to Send">
                             </div>
                             
                             <div class="form-group" >
                                <label>Any Remarks / Message </label><br/>
                                <textarea name="remarks" class="form-control" rows="5" placeholder="Any Remarks or Message" ></textarea>
                             </div>
                             
                             <div class="form-group" style="padding:10px;background-color:#f6f6f6" >
                                <label>Enter Your Transaction Password </label><br/>
                                <input type="password" class="form-control" required  name="pass"   placeholder="Enter Password Here ">
                             </div>
                             
                             <div style="padding:5px;"></div>

                             <input type="hidden" name="balance" value="<?php echo $rad['walletBalance']; ?>">
                             
                            <div style="padding:5px;"></div>

                             <button class="btn btn-primary btn-lg" style="width: 100%" >SEND Brazil Pay Token</button>
                           </form>
                            <div style="color: #999;">Brazil Pay Transaction Fee: <?php echo $ratas['sell_transaction_fees'];  ?> Brazil Pay Token </div> 
                        

                         <div style="padding:20px;"></div>                     
                   </div>
                </div><!-- end col-->


                <div class="col-xl-6 col-xs-12">
                    <div class="card-box items">
                        <h4 class="header-title m-t-0 m-b-20">Things to be kept in mind before sending Brazil Pay Tokens to someone</h4>
                         <h3  style="font-family: 'Didact Gothic', sans-serif;font-weight:bold;color:#3445bf;font-size: 20px;">Caution! </h3>
                         <h4  style="font-family: 'Didact Gothic', sans-serif;color: #777;font-size: 16px;">Please use the following while logging in to Brazil Pay Token account:</h4>
                         <hr/>
                         <ul style="font-family: 'Didact Gothic', sans-serif;color: #444;font-size: 16px;">
                            <li style="padding: 4px;"> Ensure that your Brazil Pay Token Address ID and the associated Sender ID are correct.</li>
                            <li style="padding: 4px;"> Ensure that there are no white spaces in the Brazil Pay Token ID and the Sender ID.</li>
                            <li style="padding: 4px;">Ensure that there are no white spaces while you enter the dynamic access code.</li>
                            <li style="padding: 4px;">In case of any other difficulty, contact Brazil Pay Token Support</li>                            
                         </ul>
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
