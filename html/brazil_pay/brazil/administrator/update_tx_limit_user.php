<?php session_start();
    include 'pdo_class_data.php';
    include 'connection.php';
    $pdo_auth = authenticate_admin();
    $pdo = new PDO($dsn, $user, $pass, $opt);
    include 'function.php';
    $lata = get_data_id_data("users", "id", $_REQUEST['id']);
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
           <div class="col-sm-5 lft">
            <div style="padding: 20px;" class="mobss"></div>
              <div class="lft_pad">
                <div style="padding: 10px;"></div>
                <h1 style="font-family: 'Century Gothic';color: #999;font-size: 25px;font-weight: normal;"><div style="font-weight: bold;color: #ddd">Update Transaction Limit for </div><?php echo $lata['username']; ?></h1>
                
              </div>
           </div>
           <div class="col-sm-7">
             <?php include 'price_panel.php';  ?>
           </div>
          
          </div>
        </div>
       <?php  see_status2($_REQUEST);   ?>

        <div style="padding: 20px;"></div>        
          <div class="clearfix"></div>
          <div class="col-md-6">
            <div class="card">
              <h3 style="font-family: 'Century Gothic';font-weight: normal;font-size: 20px;color:#666"><b>Update Transaction Limit of : </b></b><?php echo $lata['username']; ?></h3>
              <hr/>
              <div class="table-responsive">
                
                 <form method="POST" action="update_transaction_limit_handle.php">
                               
                      <div class="form-group" >
                        <label>Enter Transaction Limit ( In Tokens ) </label>
                        <input type="text" class="form-control" name="tx_limit" style="font-size:20px;"  value="<?php echo $lata['tx_limit'];  ?>"  placeholder="Enter Transaction Limit ">
                     </div>
                    
                    
                    
                     <div style="padding:5px;"></div>
    
                    <input type="hidden" name="idd" value="<?php echo $_REQUEST['id']; ?>">
                     
                    <div style="padding:5px;"></div>
    
                     <button class="btn btn-success btn-lg" style="width: 100%" >Update Transaction Limit </button>
                   </form>
              </div>
            </div>
        </div>
       
        <?php include 'footer.php'; ?>        
      </div>
    </div>
    
    <!-- Javascripts-->

    

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