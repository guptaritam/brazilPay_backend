<?php session_start();
    include 'pdo_class_data.php';
    include 'connection.php';
    $pdo_auth = authenticate_admin();
    $pdo = new PDO($dsn, $user, $pass, $opt);
    include 'function.php';

?><!DOCTYPE html>
<html>
<head>
    <?php include 'head.php'; ?>
    <title><?php include 'title.php'; ?></title>   
    
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
                <h1 style="font-family: 'Century Gothic';color: #999;font-size: 25px;font-weight: normal;"><div style="font-weight: bold;color: #55b3dd">Brazil Pay </div><span style="font-size: 14px;">Sale Dashboard</span></h1>
                
              </div>
           </div>
           <div class="col-sm-9">
             <?php include 'price_panel.php';  ?>
           </div>
          
          </div>
        </div>

        
        <?php see_status2($_REQUEST); ?>
        <?php include 'dashboard_stats.php'; ?>          
        <?php include 'dashboard_chart.php'; ?>
         <?php  

	        $data = file_get_contents("http://ropsten.etherscan.io/api?module=account&action=txlist&address=0x667f110349157d495d432234eb0d101bf836849b&startblock=0&endblock=99999999&sort=asc&apikey=KN6UV25CEHMII57MUZ9BNZPTG8IXPNJF71");	        
	          $mata = json_decode($data, true);
	          $pata = array_reverse($mata['result']);
	         // print_r($pata);
	          $count =  count($pata);
        ?>

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <h3 style="font-family: 'Century Gothic';font-weight: normal;font-size: 20px;color:#444;">Transaction Details</h3>
              <div class="table-responsive">
                 <table class="table table-hover table-striped" id="example">
                  <thead>
                    <tr style="color:#888;">
                      <th>#</th>
                      <th>Block</th>
                      <th>Age</th>
                      <th>Transactions</th>
                     <th>TValue</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php 
                     function humanTiming ($time)
          		        {
          		
          		            $time = time() - $time; // to get the time since that moment
          		            $time = ($time<1)? 1 : $time;
          		            $tokens = array (
          		                31536000 => 'year',
          		                2592000 => 'month',
          		                604800 => 'week',
          		                86400 => 'day',
          		                3600 => 'hour',
          		                60 => 'minute',
          		                1 => 'second'
          		            );
          		
          		            foreach ($tokens as $unit => $text) {
          		                if ($time < $unit) continue;
          		                $numberOfUnits = floor($time / $unit);
          		                return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
          		            }
          		
          		        }
                    $i=1;
                    $non_zero = array();

                    $array1 = array();
                    $array2 = array();
                    $array3 = array();
                    $array4 = array();
                    $array5 = array();

                     for($i=0;$i<$count;$i++){
                        $current_time = date("U");
                        $timestamp = $pata[$i]['timeStamp'];

                         $marak = ($pata[$i]['value']/1000000000000000000);
                        // echo $current_time;
                        $secs = number_format((($current_time-$timestamp)/3600),2); 

                        if($marak!=0){
                          $non_zero[] = ($pata[$i]['value']/1000000000000000000);
                        }

                        if($marak>0 && $marak<1){ $array1[]=$marak; }
                        if($marak>1 && $marak<3){ $array2[]=$marak; }
                        if($marak>3 && $marak<4){ $array3[]=$marak; }
                        if($marak>4 && $marak<5){ $array4[]=$marak; }
                        if($marak>5){ $array5[]=$marak; }
                        
                         $status =  '<label class="label label-success">Success</label>'; 
                        if($pata[$i]['txreceipt_status']==0){
                            $status =  '<label class="label label-danger">Failed</label>';
                          } 
                          
                                                 
                        echo '<tr>
                              <td>'.$i.'</td>
                              <td>'.$pata[$i]['blockNumber'].'</td>
                              <td>'.humanTiming ($timestamp).' Ago </td>
                              <td title="'.$pata[$i]['hash'].'"><b>Hash : </b>'.$pata[$i]['hash'].'<br/> <b>From : </b>'.$pata[$i]['from'].'<br/> <b>To: </b> : '.$pata[$i]['to'].'</td>                              
                              <td>'.$marak.'</td>
                              <td>'.$status.'</td>
                            </tr>'; 
                      }

                      //print_r($array5);
                      $non_zero = array_reverse($non_zero);
                     ?>                                     
                  </tbody>
                </table>
              </div>
            </div>
          </div>
           <div class="clearfix"></div>
          <div class="col-md-12">
            <div class="card">
              <h3 style="font-family: 'Century Gothic';font-weight: normal;font-size: 20px;color:#666;">Whitelisted Users</h3>
              <div class="table-responsive">
                <table class="table table-hover table-striped  dataTable no-footer" id="example23">
                  <thead>
                    <tr style="color:#888;">
                      <th>#</th>
                      <th> Name</th>
                      <th>Email</th>
                      <th>Tx Address</th>
                      <th>File </th>
                      <th>Gender </th>
                      <th>Status</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                     
                      try {
                          $stmt = $pdo->prepare('SELECT * FROM `users`  ORDER BY date DESC');
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
                                <td>'.$value['name'].'</td>
                                <td>'.$value['email'].'</td>
                                 <td><label class="label label-success">'.$value['tx_address'].'</label></td>
                               <td><img src="../profile/'.$value['file'].'" style="width:30px;"></td>
                                <td>'.$statusss.'</td>
                                <td>'.$value['verified'].'</td>
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
        </div>
      
     <?php include 'footer.php'; ?>
      
      
      </div>
    </div>
    <div id="gora" ></div>
    


<?php include 'update_modal.php'; ?>
    

    <!-- Javascripts-->
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/pace.min.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript" src="js/plugins/chart.js"></script>
    
    <script type="text/javascript">
    <?php 
          $table = "buy_token";
          try {
              $stmt = $pdo->prepare('SELECT * FROM `'.$table.'`  ORDER BY date DESC LIMIT 10');
          } catch(PDOException $ex) {
              echo "An Error occured!"; 
              print_r($ex->getMessage());
          }
          $stmt->execute();
          $user = $stmt->fetchAll();
        $label = '';
        $data = array();
        foreach($user as $row=>$value){
            $data[]=$value['no_of_tokens'];
            $label.='"'.$value['date'].'",';
        }
        $data = implode(",", $data);
    ?>
      var data = {
        labels: [<?php echo $label; ?>],
        datasets: [
          
          {
            label: "My Second dataset",
            fillColor: "rgba(151,187,205,0.2)",
            strokeColor: "#091496",
            pointColor: "#2196f3",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(151,187,205,1)",
            data: [<?php echo $data; ?>]
          }
        ]
      };

    <?php 
          $table = "sell_requests";
          try {
              $stmt = $pdo->prepare('SELECT * FROM `'.$table.'` WHERE `status`="Success"  ORDER BY date DESC LIMIT 10');
          } catch(PDOException $ex) {
              echo "An Error occured!"; 
              print_r($ex->getMessage());
          }
          $stmt->execute();
          $user = $stmt->fetchAll();
        $label = '';
        $data = array();
        foreach($user as $row=>$value){
            $data[]=$value['token'];
            $label.='"'.$value['date'].'",';
        }
        $data = implode(",", $data);
    ?>
      var mata = {
        labels: [<?php echo $label; ?>],
        datasets: [
          
          {
            label: "My Second dataset",
            fillColor: "rgba(200,200,205,0.2)",
            strokeColor: "#091496",
            pointColor: "rgba(151,187,205,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(151,187,205,1)",
            data: [<?php echo $data; ?>]
          }
        ]
      };

    // pie chart code here 
      var pdata = [
        {
          value: <?php echo  intval($tokens_sold); ?>,
          color: "#0a7d79",
          highlight: "#213956",
          label: "Sold Tokens"
        },
        {
          value: <?php echo  intval($tokens_left); ?>,
          color: "#ddd",
          highlight: "#0e538e",
          label: "Available Tokens"
        }
      ]
      
      var ctxl = $("#lineChartDemo").get(0).getContext("2d");      
      var lineChart = new Chart(ctxl).Line(data);
      
      var ctxb = $("#barChartDemo").get(0).getContext("2d");
      var barChart = new Chart(ctxb).Bar(mata);
      
    
      var ctxp = $("#pieChartDemo").get(0).getContext("2d");
      var barChart = new Chart(ctxp).Pie(pdata);
      
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/buttons/1.4.2/js/buttons.flash.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/buttons/1.4.2/js/buttons.print.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
          $('#example').DataTable( {
              dom: 'Bfrtip',
              buttons: [
                  'copy', 'csv', 'excel', 'pdf', 'print'
              ]
          } );


          $('#example23').DataTable( {
              dom: 'Bfrtip',
              buttons: [
                  'copy', 'csv', 'excel', 'pdf', 'print'
              ]
          } );


          $("#mota").click(function(){
            //alert("hello");
            $("#gora").load("change_notif_status.php");
          });

      } );
    </script>    
  </body>


</html>