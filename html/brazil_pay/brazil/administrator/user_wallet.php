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
                <h1 style="font-family: 'Century Gothic';color: #999;font-size: 25px;font-weight: normal;"><div style="font-weight: bold;color: #ddd">Wallet </div>for users</h1>
                
              </div>
           </div>
           <div class="col-sm-9">
             <?php include 'price_panel.php';  ?>
           </div>
          
          </div>
        </div>
       <?php  see_status2($_REQUEST);   ?>

        <div style="padding: 20px;"></div>        
          <div class="clearfix"></div>
          <div class="col-md-12">
            <div class="card">
              <h3 style="font-family: 'Century Gothic';font-weight: normal;font-size: 20px;color:#666">
                User wallet
                <button class="btn btn-info btn-sm"  data-toggle="modal" data-target="#myModal_add">Add Token to user</button></h3>
              <hr/>
              <div class="table-responsive">
                <table class="table table-hover table-striped  dataTable no-footer" id="example">
                  <thead>
                    <tr style="color:#ddd">
                      <th>#</th>
                      <th> Name</th>
                      <th> Email</th>
                      <th> Tx Address</th>
                     <th>Balance</th>
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
                        echo ' <tr>
                                <td>'.$i.'</td>
                                <td>'.$value['name'].'</td>
                                <td>'.$value['email'].'</td>
                                 <td>'.$value['tx_address'].'</td>
                                 <td>'.$value['balance'].'</td>
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

    <!-- Modal -->
    <div id="myModal_add" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content"  style="border-radius: 0px;">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add Balance to User</h4>
          </div>
          <div class="modal-body">
            <div style="padding: 30px;">

              <h2>Your Balance is : <span class="value"></span></h2>
             <form action="add_user_value_handle.php" method="POST">
                  <div class="form-group">
                    <label class="control-label">Select Name </label>
                    <select class="form-control" id="user_id" style="border-radius: 0px;border:solid 1px #ddd;" required=""  name="user_id">
                      <option value="">Select User</option>
                    <?php                      
                      try {
                          $stmt = $pdo->prepare('SELECT id,name  FROM `users` ORDER BY date DESC');
                      } catch(PDOException $ex) {
                          echo "An Error occured!"; 
                          print_r($ex->getMessage());
                      }
                      $stmt->execute();
                      $user = $stmt->fetchAll();
                      $i=1;
                      foreach ($user as $key => $value) {
                      //print_r($value);
                        echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
                      }
                     ?>
                    </select>
                  </div>
                 
                  <div class="form-group">
                    <label class="control-label">Tx Address</label>
                    <input class="form-control" id="txn_address" style="border-radius: 0px;border:solid 1px #ddd;"  type="text" name="tx_address" placeholder="Enter Tx Address">
                  </div>
                  

                  <div class="form-group">
                    <label class="control-label">Enter Value</label>
                    <input class="form-control"  style="border-radius: 0px;border:solid 1px #ddd;"  type="number" name="value"  placeholder="Enter Amount">
                  </div>
                  <input type="hidden" name="user_id" id="users_id" value="">
                  <input type="hidden" name="user_name" id="user_name">
                  <input type="hidden" name="balance" id="value">

               
                  <div class="form-group">
                      <input type="submit" class="btn btn-info" name="add_balance" value="Add Balance to User">
                  </div>                  
                                 
                </form>
           </div>
          </div>
         
        </div>

      </div>
    </div>

    <div id="myDiv" style="visibility:hidden"></div>
    
    <?php include 'modal.php'; ?>
    <?php include 'scripts.php'; ?>    
    <script>
    	$(document).ready(function(){
    		$("#user_id").change(function(){
    		   var user_id = $("#user_id").val();
    		   $("#myDiv").load("load_value.php", {user_id:user_id},function(){
  		     var data = $("#myDiv").html();
  		      		  

		    var tata = JSON.parse(data);
		   
	             $("#txn_address").val(tata.tx_address);
	              $("#user_name").val(tata.name);
	              $("#value").val(tata.balance);
                $(".value").html(tata.balance);
                $("#users_id").val(tata.id);
    		   });   		   
    		   
    		});
    	});
    </script>
  </body>
</html>