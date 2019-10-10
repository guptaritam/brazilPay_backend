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
                        <h4 class="page-title">Buy Brazil Pay</h4>
                        <ol class="breadcrumb p-0">
                           
                            <li>
                                <a href="#">Brazil Pay</a>
                            </li>
                            <li class="active">
                                Buy Tokens
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
           

            <?php  see_status2($_REQUEST); ?>
            <div class="row">               

                <div class="col-xl-6 col-xs-3">
                    <div class="card-box items">
                       <ul class="nav nav-tabs m-b-10" id="myTab" role="tablist">
                          <li class="nav-item">
                              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-expanded="true">Buy Via Wire Transfer</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-expanded="false">Buy Via Wire Bitcoin</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" id="gatar-tab" data-toggle="tab" href="#gatar" role="tab" aria-controls="gatar" aria-expanded="false">Buy Via Wire Ethereum</a>
                          </li>

                      </ul>
                      <div class="tab-content" id="myTabContent">
                          <div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab" aria-expanded="true">
                              <div style="padding: 10px;text-align: left;">
                                  <h3 style="font-family: 'Didact Gothic', sans-serif;color: #444;font-size: 24px;">Bank WIRE Transfer</h3>
                                  <hr style="opacity: .1" />
                                  <p style="font-family: 'Didact Gothic', sans-serif;color: #3445bf;font-size: 16px;"><b>Min. 10,000 USD and Max 50,000,000 USD</b></p>
                                  <p style="font-family: 'Didact Gothic', sans-serif;color: #444;font-size: 16px;font-weight: bold;">Processing Time : 1 to 5 Working Days</p>
                                  <hr style="opacity: .1" />
                                  <table class="table table-hover table-striped">
                                      <thead>
                                          <tr style="font-family: 'Didact Gothic', sans-serif;color: #444;font-size: 12px;">
                                              <td>Company </td>
                                              <td>BRAZIL PAY CORPORATION LIMITED</td>
                                          </tr>
                                      </thead>
                                      <tbody style="font-size: 12px;">
                                          <tr>
                                              <td>Company Address</td>
                                              <td>Crystal Design Center (CDC), 1448/4, J2 Building, 2nd Floor Suite 201-203, Ladprao 87 Pradit Manutham Rd. , Klongchan Bangkapi, Bangkok Thailand 10240</td>
                                          </tr>
                                          <tr style="font-family: 'Didact Gothic', sans-serif;color: #444;font-size: 12px;">
                                              <td>Bank Address</td>
                                              <td>NO. 1 QUEEN'S ROAD CENTRAL HONG KONG </td>
                                          </tr>
                                          <tr>
                                              <td>Bank Name</td>
                                              <td>HSBC HONG KONG</td>
                                          </tr>
                                          <tr style="font-family: 'Didact Gothic', sans-serif;color: #444;font-size: 12px;">
                                              <td>Account No. </td>
                                              <td>787896789698765487658764785647386534</td>
                                          </tr>
                                          <tr>
                                              <td>SWIFT Code. </td>
                                              <td>8756745675675GGJHFGHN</td>
                                          </tr>
                                      </tbody>
                                  </table>

                                  <hr style="opacity: .1" />
                                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal22">Deposit Amount</button>
                              </div>
                          </div>
                          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab" aria-expanded="false">
                              <div style="color: #444;">
                                <center>
                                  <img src="img/qr_btc.png" width="200px" />
                                  <br/>
                                  <br/>
                                  <b>Brazil Pay Address</b> : 1FTy1aBNS954qPhVDTyyhpfUPdYAwKQCHE
                                  <br/>
                                  <br/>
                                  <div style="padding: 14px;background-color: #064971;color:#fff;width: 80%">
                                      Please Transfer your BTC to Above Address, and Update the Amount Sent and Brazil Pay Token Requested. Once We Get BTC in Our Wallet we will Recharge you wallet with equivelent amount of Brazil Pay Token.
                                  </div>

                                  <hr style="opacity: .1" />
                                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal224">Transfer BTC</button>
                                </center>
                              </div>
                          </div>

                          <div class="tab-pane fade" id="gatar" role="tabpanel" aria-labelledby="gatar-tab" aria-expanded="false">
                              <div style="text-align: center;color: #333;">
                                  <center>
                                      <img src="img/qr_eth.png" width="200px" />
                                      <br/>
                                      <br/>
                                      <b>Ethereum Address</b> : 0x48a01b8A07E8B667340A3dAD403d7775Ccb6eF47
                                      <br/>
                                      <br/>
                                      <div style="padding: 14px;background-color: #064971;width: 80%;color: #fff;">
                                          Please Transfer your ETH to Above Address, and Update the Amount Sent and Brazil Pay Token Requested. Once We Get BTC in Our Wallet we will Recharge you wallet with equivelent amount of Brazil Pay Token.
                                      </div>

                                      <hr style="opacity: .1" />
                                      <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#myModal223">Transfer ETH</button>

                                  </center>
                              </div>
                          </div>

                      </div>
                   </div>
                </div><!-- end col-->


                <div class="col-xl-6 col-xs-3">
                    <div class="card-box items">

                        <h4 class="header-title m-t-0 m-b-20">RECENT Brazil Pay TOKEN Transactions</h4>
                          <table class="table table-striped table-hover">
                            <thead  style="font-family: 'Didact Gothic', sans-serif;color: #ddd;font-size: 16px;">
                               <tr>
                                 <th>S.No.</th>
                                 <th>Amount</th>
                                 <th>Tokens</th>
                                 <th>Status</th>
                               </tr>
                            </thead>
                            <tbody>
                              <?php 
                              try {
                                    $stmt = $pdo->prepare('SELECT * FROM `buy_token` WHERE `user_id`="'.$pdo_auth['id'].'" ORDER BY date DESC');
                                } catch(PDOException $ex) {
                                    echo "An Error occured!"; 
                                    print_r($ex->getMessage());
                                }
                                $stmt->execute();
                                $user = $stmt->fetchAll();   
                                $i=1; 
                                foreach($user as $key=>$value){
                                    $statys = '<label class="label label-danger">Pending</label>';
                                    if($value['status']!="Pending"){
                                    $statys = '<label class="label label-success">Approved</label>';
                                  }

                                  echo '<tr>
                                      <td>'.$i.'</td>
                                      <td title="'.$value['tx_address'].'">'.$value['amount']." ".$value['currency'].'</td>
                                      <td>'.round($value['no_of_tokens'],2).'</td>
                                      <td>'.$statys.'</td>                              
                                    </tr>';
                                    $i++;
                              }           
                            ?>                    
                          </tbody>
                     </table>
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

<!--Morris Chart-->
<script src="assets/plugins/morris/morris.min.js"></script>
<script src="assets/plugins/raphael/raphael-min.js"></script>


<!-- Page specific js -->
<script src="assets/pages/jquery.dashboard.js"></script>

 <!-- Modal -->
      <div id="myModal22" class="modal fade" role="dialog">
        <div class="modal-dialog">
           <?php    
            $btc = file_get_contents("https://api.coinmarketcap.com/v1/ticker/bitcoin/?convert=USD");
            $price_bbt = get_data_id("entrc_price");
            $data = json_decode($btc, TRUE);
           // print_r($price_bbt);
            $btc = $data[0]['price_usd'];
            //echo $btc;
            $price_bbt = $price_bbt['price'];
            //echo $price_bbt;

            $no_of_bbt_by_btc = ($btc/$price_bbt);            
        ?>

          <!-- Modal content-->
          <div class="modal-content" style="border-radius: 0px;">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Please Enter Details</h4>
              <p>1 Brazil Pay Token = <?php echo round($price_bbt,2); ?> USD</p>
            </div>
            <div class="modal-body">
             <form action="buy_handle.php" method="POST">
               <div style="padding: 30px;">
                 <div class="form-group">
                   <label>Enter Amount</label>
                   <input type="text" name="amount" id="amty" value="000" class="form-control" placeholder="Enter Amount Here">
                 </div>
                 <div class="form-group">
                   <label>Total Brazil Pay Token</label>
                   <input type="text" name="bbt" value="000" id="bbty" class="form-control" placeholder="Enter No. of SX Token to Buy">
                 </div>
                 <input type="hidden" name="currency" value="Dollar">

                   <div class="form-group">
                   <label>Enter Transaction Id</label>
                   <input type="text" name="tx_idd" id="tx_idd"  class="form-control" placeholder="Enter Transaction Id Here">
                 </div>


                  <div class="form-group">
                   <button type="submit" class="btn btn-primary" >Request Buy Token </button>
                 </div>
               </div>
             </form>
            </div>
           
          </div>

        </div>
      </div>


      <!-- Etherium  -->
       <!-- Modal -->
      <div id="myModal223" class="modal fade" role="dialog">
        <div class="modal-dialog">
           <?php    
            $ether = file_get_contents("https://api.coinmarketcap.com/v1/ticker/ethereum/?convert=USD");
            $data = json_decode($ether, TRUE);
            //print_r($data);
            $ether = $data[0]['price_usd'];
           // print_r($ether);
            $price_bbt = $price_bbt;

            $no_of_bbt_by_ether = ($ether/$price_bbt);   

        ?>
          <!-- Modal content-->
          <div class="modal-content" style="border-radius:0px;">  
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Please Enter Details</h4>
              <p>1 Ether = <?php echo  round($no_of_bbt_by_ether,2); ?> SX Token</p>
            </div>
            <div class="modal-body">
             <form action="buy_handle.php" method="POST">
               <div style="padding: 30px;">
                 <div class="form-group">
                   <label>Enter Amount</label>
                   <input type="text" name="amount" id="eamty" value="000" class="form-control" placeholder="Enter Ethereum Here">
                 </div>
                 <div class="form-group">
                   <label>Total SX Token</label>
                   <input type="text" name="bbt" value="000" id="ebbty" class="form-control" placeholder="Enter No. of SX Token to Buy">
                 </div>
                 <input type="hidden" name="currency" value="Ethereum">

                   <div class="form-group">
                   <label>Enter Transaction Id</label>
                   <input type="text" name="tx_idd" id="tx_idd"  class="form-control" placeholder="Enter Transaction Id Here">
                 </div>



                  <div class="form-group">
                   <button type="submit" class="btn btn-primary" >Request Buy Token </button>
                 </div>
               </div>
             </form>
            </div>
           
          </div>

        </div>
      </div>

      <!-- Etherium Ends Here -->


       <!-- Modal -->
      <div id="myModal224" class="modal fade" role="dialog">
        <div class="modal-dialog">
           <div class="modal-dialog">
            <?php    
                $btc = file_get_contents("https://api.coinmarketcap.com/v1/ticker/bitcoin/?convert=USD");
                $price_bbt = get_data_id("entrc_price");
                $data = json_decode($btc, TRUE);
                //print_r($data);
                $btc = $data[0]['price_usd'];
                
                $price_bbt = $price_bbt['price'];
                //echo $price_bbt;

                $no_of_bbt_by_btc = ($btc/$price_bbt);            
            ?>
          <!-- Modal content-->
          <div class="modal-content" style="border-radius:0px;">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Please Enter Details</h4>
              <p>1 BTC = <?php echo round($no_of_bbt_by_btc,2); ?> SX Token</p>
            </div>
            <div class="modal-body">
             <form action="buy_handle.php" method="POST">
               <div style="padding: 30px;">
                 <div class="form-group">
                   <label>Enter Amount</label>
                   <input type="text" name="amount" id="bamty" value="000" class="form-control" placeholder="Enter Bitcoin Here">
                 </div>
                 <div class="form-group">
                   <label>Total SX Token</label>
                   <input type="text" name="bbt" value="000" id="bbbty" class="form-control" placeholder="Enter No. of SX Token to Buy">
                 </div>
                 <input type="hidden" name="currency" value="Bitcoin">

                   <div class="form-group">
                   <label>Enter Transaction Id</label>
                   <input type="text" name="tx_idd" id="tx_idd"  class="form-control" placeholder="Enter Transaction Id Here">
                 </div>


                  <div class="form-group">
                   <button type="submit" class="btn btn-primary" >Request Buy Token </button>
                 </div>
               </div>
             </form>
            </div>
           
          </div>

        </div>
      </div>

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
     <script type="text/javascript">

     
      $(document).ready(function(){
       $("#nots_btn").click(function(){
          $("#nots").slideToggle("fast");
        });

       $('html').click(function() {
         $("#nots").slideUp("fast");
       });

       $('#nots, #lopp').click(function(event){
           event.stopPropagation();
       });

       $("#amty").keyup(function(){
        var price = parseFloat(<?php echo $price_bbt; ?>);
        //alert(price);
        var amt = $("#amty").val(); 
        var bbt = amt/price;
        $("#bbty").val(bbt.toFixed(2));
       });

       $("#bbty").keyup(function(){
        var price = parseFloat(<?php echo $price_bbt; ?>);
        //alert(price);
        var bbt = $("#bbty").val(); 
        var amt = bbt*price;
        $("#amty").val(amt.toFixed(2));
       });


       // ether Starts Here
        $("#eamty").keyup(function(){
          var price = parseFloat(<?php echo $no_of_bbt_by_ether; ?>);
          //alert(price);
          var amt = $("#eamty").val(); 
          var bbt = price*amt;
          $("#ebbty").val(bbt.toFixed(2));
         });

         $("#ebbty").keyup(function(){
          var price = parseFloat(<?php echo $no_of_bbt_by_ether; ?>);
          //alert(price);
          var bbt = $("#ebbty").val(); 
          var amt = bbt/price;
          $("#eamty").val(amt.toFixed(2));
         });
       //Ether Ends Here

       // Bitcoin Starts Here
        $("#bamty").keyup(function(){
          var price = parseFloat(<?php echo $no_of_bbt_by_btc; ?>);
          //alert(price);
          var amt = $("#bamty").val(); 
          var bbt = amt*price;
          $("#bbbty").val(bbt.toFixed(2));
         });

         $("#bbbty").keyup(function(){
          var price = parseFloat(<?php echo $no_of_bbt_by_btc; ?>);
          //alert(price);
          var bbt = $("#bbbty").val(); 
          var amt = bbt/price;
          $("#bamty").val(amt.toFixed(2));
         });
       //Bitcoin Ends Here
        
      });
    </script>
<?php require 'includes/footer_end.php' ?>
