<?php  session_start();
  include 'connection.php';
  include 'administrator/function.php';
  $pdo = new PDO($dsn, $user, $pass, $opt);
  //print_r($_REQUEST);
  
  try {
      $stmt = $pdo->prepare('SELECT * FROM `pay_request` WHERE `id`='.base64_decode($_REQUEST['0x6302f8774a817747d4a0b90f7cb2fcf46c3c5b12Doplat']));
  } catch(PDOException $ex) {
      echo "An Error occured!"; 
      print_r($ex->getMessage());
  }
  $stmt->execute();
  $rayta = $stmt->fetch();
  
  
  //print_r($user);


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <?php include 'connection.php'; include 'random_function.php';  include 'pdo_class_data.php'; ?>
    <title><?php include 'title.php'; ?></title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Didact+Gothic" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rajdhani:400,600,700" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="tyle.css">
    <link rel="stylesheet" type="text/css" href="hover.css">
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <style type="text/css">
      #particles-js {
      position: absolute;
      width: 100%;
      height: 100%;
      background: $background
    }
    
    body{
      overflow:hidden;
    }

    .modal-backdrop
    {
        opacity:.9 !important;
    }

    .poik{
      padding: 10px 20px;
      font-size: 14px;
      border-radius: 30px;
      margin:6px;
      background-color: #204dfb;
      z-index: 1000;
      border:solid 1px #4dd1ff;
      transition: all .2s ease-in-out 0s;
      width: 200px;
      overflow: hidden;
    }

    .poik:hover{
      padding: 10px 30px;
      font-size: 14px;
      margin:6px;
      background-color: #204dfb;
      border:solid 1px #204dfb;
      transition: all .2s ease-in-out 0s;
      overflow: hidden;
    }

    .flip-clock {
        display: inline-block;
        width: auto;        
    }

    .clock{
      zoom:1;
    }

     @media only screen and (max-width: 980px) {
     .clock{zoom:.60;}
}

   @media only screen and (max-width: 480px) {
     .clock{zoom:.40;}
}

    </style>
    <!-- <link rel="stylesheet" type="text/css" href="counter1.css">
    <link rel="stylesheet" type="text/css" href="counter2.css"> -->
   <!--  <link rel="stylesheet" type="text/css" href="counter3.css"> -->
    <link rel="stylesheet" type="text/css" href="css/flipclock.css">
    <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5d4559b53387b20012d764ad&product='inline-share-buttons' async='async'></script>
  </head>
  <?php $rand = mt_rand(1,4); ?>
  <body style="background-image: url('img/poi3.jpg');background-size: cover;overflow:scroll">
     
    <div style="height: 15vh"></div>
       
    <div class="container" >
     <form method="POST" action="payrequest_handle.php" autocomplete="off">
         <?php see_status2($_REQUEST); ?>
        <?php 
            $username  = tx_to_username($rayta['from_user']);
            $to_username  = tx_to_username($rayta['to_user']);
            
            $datay = get_data_id_data("users", "username", $to_username['username']);
            //print_r($datay);
        ?>
        <div style="padding: 20px;text-align: center;position: relative;z-index: 10;background-color:#fff;width:300px;margin:0 auto;">
            <label class="label label-success"><?php echo $username['username']; ?></label> > <label class="label label-info"><?php echo $to_username['username'];  ?></label>
            
            <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=https://nonceblox.com<?php echo $_SERVER['REQUEST_URI']; ?>&choe=UTF-8" title="Link to Paymet Page" style="width:100%" />
            
            <div class="row">
              <div class="col-sm-12" style="text-align:left">
                  <label>Amount Requested</label>
                <input type="text" style="font-size:20px;"  class="form-control inputs" value="<?php echo $rayta['amount'];  ?>" readonly name="amount" id="dataraamount" required="" placeholder="Amount requested">
                <div id="email_error" style="color: red;font-size: px;display: none;">Enter Correct Amount</div>
                <div style="padding:4px;"></div>
                <?php //echo $_SERVER['REQUEST_URI']; ?>
              </div>
            </div>
            <hr/>
            <div class="row">
              <div class="col-sm-12" style="text-align:left">
                  <label>Enter Credentials</label>
                  <input type="hidden" name="0x6302f8774a817747d4a0b90f7cb2fcf46c3c5b12Doplat" value="<?php echo $_REQUEST['0x6302f8774a817747d4a0b90f7cb2fcf46c3c5b12Doplat']; ?>" />
                <input type="text" value="<?php echo $datay['email']; ?>"  class="form-control inputs"  autocomplete="off" name="datarra" id="dataraemail" required="" placeholder="Enter Brazil Pay Username">
                <div id="email_error" style="color: red;font-size: 12px;display: none;">Enter Correct Email Address</div>
                <div style="padding:4px;"></div>
              </div>
            </div>
            
            <div class="row">
               <div class="col-sm-12">
                  
                 <input type="password" class="form-control inputs" name="password" id="datarapassword" required=""  autocomplete="off" placeholder="Enter Transaction Password ">
                 <div id="password_error" style="color: red;font-size: 12px;display: none;">Enter Password</div>
                 <div style="padding:4px;"></div>
                 <?php 
                    if($rayta['status']!='Available'){
                        echo '<button type="submit"  class="btn btn-success btn-lg" style="width:100%;border-radius:0px;">Pay Requested Amount </button>';
                    }
                    else{
                        echo '<button type="submit" disabled  class="btn btn-danger btn-lg" style="width:100%;border-radius:0px;">Amount Already Paid </button>';
                    }
                 ?>
                 
                 <hr/>
                 <div class="sharethis-inline-share-buttons"></div>
                
              </div>
            </div>
            <div style="padding: 5px;"></div>
        </div>

        
     
      </form>
      <div style="padding: 1px;"></div>

    

    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
   
    <!-- <script type="text/javascript" src="counter.js"></script>
    <script>
    $('.counter').counter({});
    </script> -->
    <script type="text/javascript" src="js/flipclock.js"></script>
   <script type="text/javascript">
      var clock;
      
      $(document).ready(function() {
        // Set dates.
        var futureDate  = new Date("April 30, 2018 12:59 PM EDT");
        var currentDate = new Date();

        // Calculate the difference in seconds between the future and current date
        var diff = futureDate.getTime() / 1000 - currentDate.getTime() / 1000;

        // Calculate day difference and apply class to .clock for extra digit styling.
        function dayDiff(first, second) {
          return (second-first)/(1000*60*60*24);
        }

        if (dayDiff(currentDate, futureDate) < 100) {
          $('.clock').addClass('twoDayDigits');
        } else {
          $('.clock').addClass('threeDayDigits');
        }

        if(diff < 0) {
          diff = 0;
        }

        // Instantiate a coutdown FlipClock
        clock = $('.clock').FlipClock(diff, {
          clockFace: 'DailyCounter',
          countdown: true
        });
      });
    </script>
    
  </body>
</html>