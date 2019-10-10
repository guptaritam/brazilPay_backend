<?php require 'includes/header_start.php'; ?>
<!--Morris Chart CSS -->
<link rel="stylesheet" href="assets/plugins/morris/morris.css">
<?php require 'includes/header_end.php'; ?>
<?php $ratas = get_data_id("entrc_price"); ?>

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
                        <h4 class="page-title">Withdraw Brazil Pay Tokens</h4>
                        <ol class="breadcrumb p-0">
                           
                            <li>
                                <a href="#">Brazil Pay</a>
                            </li>
                            <li class="active">
                                Withdraw Tokens
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
           

            <?php  see_status2($_REQUEST); ?>
            <div class="row">               

                <div class="col-xl-6 col-xs-12">
                    <div class="card-box items">
                      <div style="padding: 10px;"></div>
                      
                      
                      <ul class="nav nav-tabs m-b-10" id="myTab" role="tablist">
                          <li class="nav-item">
                              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-expanded="true">Withdraw to BTC Wallet</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-expanded="false">Withdraw to ETH Wallet</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" id="gatar-tab" data-toggle="tab" href="#gatar" role="tab" aria-controls="gatar" aria-expanded="false">Withdraw to Bank Account</a>
                          </li>
                      </ul>
                      
                       <div class="tab-content" id="myTabContent">
                          <div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab" aria-expanded="true">
                              <div style="padding: 10px;text-align: left;">
                                   
                                   <div class="century" style="font-size: 24px;color: #444">WITHDRAW Brazil Pay Tokens to BTC Wallet</div>
                                   <div class="century" style="font-size: 12px;color: #444">You can Withdraw Tokens from Brazil Pay Wallet anytime When You Require</div>
                                   <hr style="opacity: 1" />
                                  <center>
                                     <form method="POST" action="withdraw_handle.php">
                                       <div class="form-group" style="text-align: left;color: #444;">
                                        <label>Wallet Balance</label><br/>
                                        <?php
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
                                          ?>
            
                                          <input type="number" min="0" class="form-control" value="<?php  echo $rad['walletBalance']; ?>" disabled  placeholder="Your Wallet Ballance">
                                       </div>
                                       
            
                                       <div class="form-group" style="text-align: left;color: #444;">
                                        <label>Tokens to Withdraw</label><br/>
                                          <input type="text" class="form-control"  name="token_no"  placeholder="Token to Withdraw">
                                       </div>
                                      <input type="hidden" name="transfer_to" value="Bitcoin Wallet" />
                                      
                                       <div class="form-group" style="text-align: left;color: #444;">
                                         <label>Withdraw Wallet Address</label><br/>
                                          <input type="text" class="form-control"  name="withdraw_wallet_address"  placeholder="Withdraw BTC Wallet Address">
                                          <div style="font-size: 11px;color: cream;padding-top:20px;">Make Sure You Enter Correct Withdraw Address, Token Once Transferred cannot be Recovered any how, So Please Make Sure You are Entering Correct Token Address To withdraw</div>
                                       </div>
                                      
                                         <div class="form-group" style="padding:10px;background-color:#f6f6f6;text-align:left" >
                                            <label>Enter Your Password </label><br/>
                                            <input type="password" class="form-control" required  name="pass"   placeholder="Enter Password Here ">
                                         </div>
                                         
                                         <hr/>
                                       <button class="btn btn-primary btn-lg" style="width: 100%">WITHDRAW TOKENS</button>
                                     </form>
                                     <div style="padding: 10px;"></div>
                                     <div style="color: #444;">*Brazil PayT Fee : Fee: <?php echo $ratas['withdraw_transaction_fees']; ?> Brazil PayT </div>
                                   </center>
                              </div>
                          </div>
                          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab" aria-expanded="false">
                             <div style="padding: 10px;text-align: left;">
                                   
                                   <div class="century" style="font-size: 24px;color: #444">WITHDRAW Brazil Pay Tokens to ETH Wallet</div>
                                   <div class="century" style="font-size: 12px;color: #444">You can Withdraw Tokens from Brazil Pay Wallet anytime When You Require</div>
                                   <hr style="opacity: 1" />
                                  <center>
                                     <form method="POST" action="withdraw_handle.php">
                                       <div class="form-group" style="text-align: left;color: #444;">
                                        <label>Wallet Balance</label><br/>
            
                                          <input type="number" min="0" class="form-control" value="<?php  echo $rad['walletBalance']; ?>" disabled  placeholder="Your Wallet Ballance">
                                       </div>
                                       
            
                                       <div class="form-group" style="text-align: left;color: #444;">
                                        <label>Tokens to Withdraw</label><br/>
                                          <input type="text" class="form-control"  name="token_no"  placeholder="Token to Withdraw">
                                       </div>
                                      <input type="hidden" name="transfer_to" value="Etherium Wallet" />
                                      
                                       <div class="form-group" style="text-align: left;color: #444;">
                                         <label>Withdraw Wallet Address</label><br/>
                                          <input type="text" class="form-control"  name="withdraw_wallet_address"  placeholder="Withdraw ETH Wallet Address">
                                          <div style="font-size: 11px;color: cream;padding-top:20px;">Make Sure You Enter Correct Withdraw Address, Token Once Transferred cannot be Recovered any how, So Please Make Sure You are Entering Correct Token Address To withdraw</div>
                                       </div>
                                      
                                         <div class="form-group" style="padding:10px;background-color:#f6f6f6;text-align:left" >
                                            <label>Enter Your Password </label><br/>
                                            <input type="password" class="form-control" required  name="pass"   placeholder="Enter Password Here ">
                                         </div>
                                         
                                         <hr/>
                                       <button class="btn btn-primary btn-lg" style="width: 100%">WITHDRAW TOKENS</button>
                                     </form>
                                     <div style="padding: 10px;"></div>
                                     <div style="color: #444;">*Brazil PayT Fee : Fee: <?php echo $ratas['withdraw_transaction_fees']; ?> Brazil PayT </div>
                                   </center>
                              </div>
                          </div>

                          <div class="tab-pane fade" id="gatar" role="tabpanel" aria-labelledby="gatar-tab" aria-expanded="false">
                              <div style="padding: 10px;text-align: left;">
                                   
                                   <div class="century" style="font-size: 24px;color: #444">WITHDRAW Brazil Pay Tokens to Bank Account</div>
                                   <div class="century" style="font-size: 12px;color: #444">You can Withdraw Tokens from Brazil Pay Wallet anytime When You Require</div>
                                   <hr style="opacity: 1" />
                                  <center>
                                     <form method="POST" action="withdraw_handle.php">
                                       <div class="form-group" style="text-align: left;color: #444;">
                                        <label>Wallet Balance</label><br/>
            
                                          <input type="number" min="0" class="form-control" value="<?php echo $rad['walletBalance']; ?>" disabled  placeholder="Your Wallet Ballance">
                                       </div>
                                       
            
                                       <div class="form-group" style="text-align: left;color: #444;">
                                        <label>Tokens to Withdraw</label><br/>
                                          <input type="text" class="form-control"  name="token_no"  placeholder="Token to Withdraw">
                                       </div>
                                      <input type="hidden" name="transfer_to" value="Bank Account" />
                                      
                                       <div class="form-group" style="text-align: left;color: #444;">
                                         <label>Withdraw Wallet Address</label><br/>
                                          <textarea class="form-control"  name="withdraw_wallet_address"  placeholder="Withdraw Account Informations"></textarea>
                                          <div style="font-size: 11px;color: cream;padding-top:20px;">Provide Company A/c Name, Account Address, Bank Name, City, Account N0. and Swift Code.</div>
                                       </div>
                                      
                                         <div class="form-group" style="padding:10px;background-color:#f6f6f6;text-align:left" >
                                            <label>Enter Your Password </label><br/>
                                            <input type="password" class="form-control" required  name="pass"   placeholder="Enter Password Here ">
                                         </div>
                                         
                                         <hr/>
                                       <button class="btn btn-primary btn-lg" style="width: 100%">WITHDRAW TOKENS</button>
                                     </form>
                                     <div style="padding: 10px;"></div>
                                     <div style="color: #444;">*Brazil PayT Fee : Fee: <?php echo $ratas['withdraw_transaction_fees']; ?> Brazil PayT </div>
                                   </center>
                              </div>
                          </div>

                      </div>
                      
                       

                       <div style="padding:10px;"></div>
                    
                   </div>
                </div><!-- end col-->


                <div class="col-xl-3 col-xs-12">
                    <div class="card-box items">
                        <h4 class="header-title m-t-0 m-b-20">Things to be kept in mind before Withdrwaing Brazil Pay Tokens to Your Etrhereum Wallet Address</h4>
                         <h3  style="font-family: 'Didact Gothic', sans-serif;font-weight:bold;color:#3445bf;font-size: 20px;">Caution! </h3>
                         <h4  style="font-family: 'Didact Gothic', sans-serif;color: #777;font-size: 16px;">Please use the following while Withdrawing in to ETH Token account:</h4>
                         <hr/>
                         <ul style="font-family: 'Didact Gothic', sans-serif;color: #444;font-size: 14px;">
                            <li style="padding: 4px;"> Ensure that your Brazil Pay Token Address ID and the associated Sender ID are correct.</li>
                            <li style="padding: 4px;"> Ensure that there are no white spaces in the Brazil Pay Token ID and the Sender ID.</li>
                            <li style="padding: 4px;">Ensure that there are no white spaces while you enter the dynamic access code.</li>
                            <li style="padding: 4px;">In case of any other difficulty, contact Brazil Pay Token Support</li>                            
                         </ul>

                         <p>If you have done everything correctly, the next screen will show you your new public wallet address which you will need to receive your Brazil Pay tokens. If you receive an error of any kind, please start again and repeat until you fully understood this process. </p>
                    </div>
                </div><!-- end col-->


            </div>
           

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
     });
    </script>
<!-- Page specific js -->
<script src="assets/pages/jquery.dashboard.js"></script>    
<?php require 'includes/footer_end.php' ?>
