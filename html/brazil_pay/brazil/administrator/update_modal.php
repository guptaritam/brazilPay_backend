<!-- Modal -->
    <div id="#myModal3333" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
         <div class="modal-content" style="background-color: #111">
          <div class="modal-header" style="border-color: #03a9f4">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" style="color: #03a9f4">Updatfgfdfsdfsde User</h4>
          </div>
          <div class="modal-body">
            <div style="padding: 10px;">
             <form action="update_administrator.php" method="POST">
                  <div class="form-group">
                    <label class="control-label">Name</label>
                    <input class="form-control" style="border-radius: 0px;border:solid 1px #03a9f4;background-color: #222;color: #888" type="text" name="name" value="<?php echo $pdo_auth['name']; ?>" placeholder="Enter full name">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Email</label>
                    <input class="form-control" style="border-radius: 0px;border:solid 1px #03a9f4;background-color: #222;color: #888"  type="email" name="email" value="<?php echo $pdo_auth['email']; ?>" placeholder="Enter email address">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Enter Wallet Address</label>
                    <input class="form-control" style="border-radius: 0px;border:solid 1px #03a9f4;background-color: #222;color: #888"  type="text" name="tx_address" value="<?php echo $pdo_auth['tx_address']; ?>"  placeholder="Transaction Address">
                  </div>

                 <!--  <div class="form-group">
                    <label class="control-label">Enter Password</label>
                    <input class="form-control" style="border-radius: 0px;border:solid 1px #ddd;" name="password"  value="<?php echo md5($pdo_auth['password']); ?>" type="text" placeholder="Password">
                  </div> -->

                
                  <br/><br/>
                  <div class="form-group">
                      <input type="submit" class="btn btn-info" name="update_admin" value="Update Administrator">
                  </div>                  
                                 
                </form>
           </div>
          </div>
         
        </div>

      </div>
    </div>