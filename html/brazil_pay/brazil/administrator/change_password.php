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
  <title>Update User Administration Credentials </title>
  </head>
 <body class="sidebar-mini fixed  pace-done sidebar-collapse">
    <div class="wrapper">
      <!-- Navbar-->
      <?php include 'navbar.php'; ?>

       <div class="content-wrapper ">
         <div class="page-title" style="padding: 32px;background-color: #101d85;box-shadow: 0px 2px 10px rgba(0,0,0,.2);">
          <div class="row" style="width: 100%;margin-left:0px;">
           <div class="col-sm-3 lft">
            <div style="padding: 20px;" class="mobss"></div>
              <div class="lft_pad">
                <div style="padding: 10px;"></div>
                <h1 style="font-family: 'Century Gothic';color: #999;font-size: 25px;font-weight: normal;"><div style="font-weight: bold;color: #ddd">Update </div>Credentials</h1>
                
              </div>
           </div>
           <div class="col-sm-9">
             <?php include 'price_panel.php';  ?>
           </div>
          
          </div>
        </div>

        

        <div style="padding: 20px;"></div>
        <?php see_status2($_REQUEST); ?>
         <div class="clearfix"></div>
          <div class="col-md-6">
            <div class="card">
              <div class="table-responsive">
                <!--<h3>Buy Requests </h3><hr/>-->
                  <form action="update_administrator.php" method="POST">
                      <div class="form-group">
                        <label class="control-label">Name</label>
                        <input class="form-control" style="border-radius: 0px;border:solid 1px #03a9f4;" type="text" name="name" value="<?php echo $pdo_auth['name']; ?>" placeholder="Enter full name">
                      </div>
                      <div class="form-group">
                        <label class="control-label">Email</label>
                        <input class="form-control" style="border-radius: 0px;border:solid 1px #03a9f4;"  type="email" name="email" value="<?php echo $pdo_auth['email']; ?>" placeholder="Enter email address">
                      </div>
                      <div class="form-group">
                        <label class="control-label">Enter Wallet Address</label>
                        <input class="form-control" style="border-radius: 0px;border:solid 1px #03a9f4;"  type="text" name="tx_address" value="<?php echo $pdo_auth['tx_address']; ?>"  placeholder="Transaction Address">
                      </div>
    
                       <div class="form-group">
                        <label class="control-label">Enter Password</label>
                        <input class="form-control" style="border-radius: 0px;border:solid 1px #ddd;" name="password"  value="<?php echo $pdo_auth['password']; ?>" type="text" placeholder="Password">
                      </div>
    
                    
                      <br/><br/>
                      <div class="form-group">
                          <input type="submit" class="btn btn-info" name="update_admin" value="Update Administrator">
                      </div>                  
                                     
                    </form>
              </div>
            </div>
        </div>
       
        <?php include 'footer.php'; ?>        
      </div>
    </div>
    
    <!-- Javascripts-->
    <?php// include 'modal.php'; ?>
    <?php include 'scripts.php'; ?>    
  </body>
</html>