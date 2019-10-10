<?php session_start();
    include 'pdo_class_data.php';
    include 'connection.php';
    $pdo_auth = authenticate_admin();
    $pdo = new PDO($dsn, $user, $pass, $opt);
    include 'function.php';

?>
<!DOCTYPE html>
<html>
<head>
  <?php include 'head.php'; ?>
  </head>
<body class="sidebar-mini fixed  pace-done sidebar-collapse">
    <div class="wrapper">
      <!-- Navbar-->
      <?php include 'navbar.php'; ?>

       <div class="content-wrapper " style="">
         <div class="page-title" style="padding: 32px;background-color: #0e1354;box-shadow: 0px 2px 10px rgba(0,0,0,.2);">
          <div class="row" style="width: 100%;margin-left:0px;">
           <div class="col-sm-3 lft">
            <div style="padding: 20px;" class="mobss"></div>
              <div class="lft_pad">
                <div style="padding: 10px;"></div>
                <h1 style="font-family: 'Century Gothic';color: #999;font-size: 25px;font-weight: normal;"><div style="font-weight: bold;color: #ddd">View Transfers</div></h1>
                
              </div>
           </div>
           <div class="col-sm-9">
             <?php include 'price_panel.php';  ?>
           </div>
          
          </div>
        </div>
           
           
       <?php   ?>

        <div style="padding: 20px;"></div>        
          <div class="clearfix"></div>
          <div class="col-md-12">
            <div class="card">
              <h3 class="" style="font-family: 'Century Gothic';font-weight: normal;font-size: 20px;Color:#555">
               View Transfers </h3>
               
              <hr/>
              <div class="table-responsive">
                <table class="table table-striped" id="example">
                 <thead>
                    <tr style="Color:#666">
                      <th>S.No</th>
                        <th>Names Ids</th>
                       <th>Pairs</th>
                      <th>Amount </th>
                      <th>Direction</th>
                      <th>Status</th>
                    </tr>
                 </thead>
                 <tbody  style="Color:#555">
                   <?php                      
                      try {
                          $stmt = $pdo->prepare('SELECT * FROM `transfer` ORDER BY date DESC ');
                      } catch(PDOException $ex) {
                          echo "An Error occured!"; 
                          print_r($ex->getMessage());
                      }
                      $stmt->execute();
                      $user = $stmt->fetchAll();
                      
                      //print_r($user);
                      $i=1;
                      foreach ($user as $key => $value) {
                        $status = '<label class="label label-danger" style="padding-right: 7px;">---</label>';
                        if($value['process']=="Sent Tokens"){
                          $status = '<label class="label label-info" style="padding-right: 7px;">Sent Tokens</label>';
                        } else if($value['process']=="Withdraw Tokens"){
                          $status = '<label class="label label-info" style="padding-right: 7px;">Withdraw Tokens</label>';
                        }
                        else if($value['process']=="BuyTokens"){
                          $status = '<label class="label label-info" style="padding-right: 7px;">BuyTokens</label>';
                        }      
                        
                        
                        $data = get_data_id_data_alll_mata("users",$value['to'] );
                        $data1 = get_data_id_data_alll_mata("users",$value['from'] );
                        
                        // $to = get_data_id_data("users", "tx_address", $value['to_address']);
                        //$from = get_data_id_data("users", "tx_address", $value['from_address']);
                                        
                                        
                                        
                        //print_r($data1);
                      //  print_r($data);
                                          
                        echo ' <tr>
                               <td>'.$i.'</td>
                               <td>to : '.$data['name'].'<br/> From : '.$data1['name'].'</td>
                                <td>To : '.$data['username'].'<br/><b>From : </b>'.$data1['username'].'<br/><b style="color:#162098">'.$value['tx_address'].'</b></td>
                               <td><b style="font-size:13px;text-transform:capitalize">SXT '.$value['tokens'].'</b></td>
                               <td>'.$value['process'].'</td>
                               <td><label class="label label-success">Success</lebel></td>
                             </tr>';
                              $i++;
                      }
                     ?>                   
                 </tbody>
                </table>
              </div>
            </div>
        </div>
       
        <?php include 'footer.php'; ?>        
      </div>
    </div>
    
    <!-- Javascripts-->

    <?php include 'add_modal.php';  ?>
    <?php include 'update_modal.php';  ?>

    <?php include 'modal.php'; ?>
    <?php include 'scripts.php'; ?>    
  </body>
</html>