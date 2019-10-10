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
                <h1 style="font-family: 'Century Gothic';color: #999;font-size: 25px;font-weight: normal;"><div style="font-weight: bold;color: #ddd">Registered </div>Users</h1>
                
              </div>
           </div>
           <div class="col-sm-9">
             <?php include 'price_panel.php';  ?>
           </div>
          
          </div>
        </div>
       <?php 
         see_status2($_REQUEST);
        ?>

        <div style="padding: 20px;"></div>        
          <div class="clearfix"></div>
          <div class="col-md-12">
            <div class="card">
              <h3 style="font-family: 'Century Gothic';font-weight: normal;font-size: 20px;color:#ddd;">
                Whitelisted Users 
                <!--<button class="btn btn-info btn-sm"  data-toggle="modal" data-target="#myModal_add">Add New</button>--></h3>
              <hr/>
              <div class="table-responsive">
                <table class="table table-hover table-striped" id="example">
                  <thead>
                    <tr style="color:#ddd">
                      <th>#</th>
                      <th> Username</th>
                      <th>Email</th>
                      <th>Wallet Address</th>
                      <th>File </th>
                      <th>Verify</th>
                      <th>Status</th>
                      <th>Tx Limit </th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                     
                      try {
                          $stmt = $pdo->prepare('SELECT * FROM `users` ORDER BY date DESC');
                      } catch(PDOException $ex) {
                          echo "An Error occured!"; 
                          print_r($ex->getMessage());
                      }
                      $stmt->execute();
                      $user = $stmt->fetchAll();
                      $i=1;
                      foreach ($user as $key => $value) {
                         $statusss='<a href="verify_user.php?id='.$value['id'].'" class="btn btn-sm btn-danger">Verify Here</a>';
                         //echo $value['verified'];
                         if($value['verified']=="Yes")
                         {
                             $statusss='<a  class="btn btn-sm btn-success">Verified</a>';
                         }
                        echo ' <tr>
                                <td>'.$i.'</td>
                                <td>'.$value['username'].'</td>
                                <td>'.$value['email'].'</td>
                                 <td><label class="label label-success">'.$value['tx_address'].'</label></td>
                               <td><img src="../profile/'.$value['file'].'" style="width:30px;"></td>
                                <td>'.$statusss.'</td>
                                <td>'.$value['verified'].'</td>
                                <td>
                                 <a href="update_tx_limit_user.php?id='.$value['id'].'"> <button class="btn btn-success btn-sm" title="Update Tx Limit"> '.$value['tx_limit'].' Tokens</button></a>
                                </td>
                                <td>
                                 <a href="delete_user.php?id='.$value['id'].'"> <button class="btn btn-info btn-sm" title="Delete"><i class="icon-remove-sign"></i></button></a>
                                </td>
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