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
                <h1 style="font-family: 'Century Gothic';color: #999;font-size: 25px;font-weight: normal;"><div style="font-weight: bold;color: #ddd">Withdraw </div>requests</h1>
                
              </div>
           </div>
           <div class="col-sm-9">
             <?php include 'price_panel.php';  ?>
           </div>
          
          </div>
        </div>
           
           
       <?php 
          if(isset($_REQUEST['choice'])){
            if($_REQUEST['choice']=='success'){
              echo '<div style="padding: 10px;background-color: #666;color:#fff">'.$_REQUEST['value'].'</div>';
            }
          }
        ?>

        <div style="padding: 20px;"></div>        
          <div class="clearfix"></div>
          <div class="col-md-12">
            <div class="card">
              <h3 class="" style="font-family: 'Century Gothic';font-weight: normal;font-size: 20px;Color:#555">
               Withdraw Requests</h3>
               
              <hr/>
              <div class="table-responsive">
                <table class="table table-striped">
                 <thead>
                    <tr style="Color:#555">
                      <th>S.No</th>
                       <th>user_id</th>
                      <th>User Name</th>
                      <th>Amount </th>
                      <th>Date</th>
                      <th>Status</th>
                    </tr>
                 </thead>
                 <tbody  style="Color:#555">
                   <?php                      
                      try {
                          $stmt = $pdo->prepare('SELECT * FROM `withdraw`  ORDER BY date DESC ');
                      } catch(PDOException $ex) {
                          echo "An Error occured!"; 
                          print_r($ex->getMessage());
                      }
                      $stmt->execute();
                      $user = $stmt->fetchAll();
                      $i=1;
                      foreach ($user as $key => $value) {
                        $status = '<label class="label label-success" style="padding-right: 7px;">Approved</label>';
                        if($value['status']=="Pending"){
                          $status = '<label class="label label-danger" style="padding-right: 7px;">Pending</label>';
                        }
                        echo ' <tr>
                               <td>'.$i.'</td>
                                <td>'.$value['user_name'].'<br/><b>Withdraw Address : </b>'.$value['withdraw_wallet_address'].'</td>
                               <td><b style="font-size:12px;text-transform:capitalize">'.$value['amount'].'</b>
                               
                               </td>
                               <td>'.$value['date'].'</td>
                               <td>'.$status.'</td>
                               <td><a href="approve_withdraw.php?id='.$value['id'].'"><button class="btn btn-info btn-sm">Approve</button></a></td>
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