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
      background-color: #0a3161;
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
  </head>
  <?php $rand = mt_rand(1,4); ?>
  <body style="background-image: url('img/poi3.jpg');background-size: cover;">
     <canvas id="c" style="position: absolute; top: 0; left: 0; width:100%; height:100%;z-index: 1"></canvas>
      <script type="text/javascript" src="jqq.js"></script>
    <div style="height: 15vh"></div>
       
    <div class="container" >
     <div style="">

        <div style="padding: 20px;text-align: center;position: relative;z-index: 10">
          <a href="index.php"><img src="Logo.png" style="width:120px"></a>       
          <div style="padding:0px"></div>
           <?php see_status2($_REQUEST); ?>
          <h1 class="century" style="color: #fff;margin-bottom: 4px;font-size: 30px;text-shadow: 0px 3px 10px #031f27;line-height: 1.3em;"> Join the next generation <br/> <b><span style="color: #4c71ff;font-size: 45px;">Brazil Pay</span></b> </h1>
          
          <div style="padding:20px"></div>
          <div class="container2" style="text-align: center;zoom:.8">
           <center> <div class="clock" style="margin:2em;"></div></center>
          </div>
          <div style="padding:20px"></div>

          <center>
            <button class="btn btn-info poik hvr-bounce-to-right"  data-toggle="modal" data-target="#myModal" style="font-weight: bold;">BUY TOKENS</button>
            <button class="btn btn-info poik hvr-bounce-to-right" data-toggle="modal" data-target="#myModal2" style="background-color: transparent;font-weight: bold;">LOGIN</button>
            
          </center>
        </div>

        
     
      </div>
      <div style="padding: 1px;"></div>

     <div id="myModal" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="margin-top: 20vh">
        <div class="modal-dialog modal-sm" style="width:400px">
          <div class="modal-content">
            <form method="POST" action="register_handle.php" novalidate onsubmit="return validate();">
             <div style="padding: 40px;background-color: #fff">
                 <img src="Logo.png" style="width:100px;">
                  <div style="padding: 20px;"></div>

                    <div class="row">
                      <div class="col-sm-12">
                        <input type="text" class="form-control inputs" name="email" id="email" required="" placeholder="Enter Email Address">
                        <div id="email_error" style="color: red;font-size: 12px;display: none;">Enter Correct Email Address</div>
                        <div style="padding: 14px;" class="mobs"></div>
                      </div>
                    </div>
                      <div style="padding: 5px;"></div>

                    <div class="row">

                       <div class="col-sm-12">
                         <input type="password" class="form-control inputs" name="password" id="password" required="" placeholder="Enter Password">
                         <div id="password_error" style="color: red;font-size: 12px;display: none;">Enter Password</div>
                         <div style="padding: 14px;" class="mobs"></div>
                      </div>
                    </div>
                    <div style="padding: 5px;"></div>

                   <input type="hidden" name="tx_address" >
                  <!-- <div style="padding: 10px;"></div>-->
                   <!--div class="g-recaptcha" data-sitekey="6LcVE1YUAAAAABnLtRy9kgvkyyL-4OE0gWOcrsot"></div-->
                    <div style="padding: 16px;"></div>
               
              

                <div class="row">
                  <div class="col-sm-12">
                   <button class="inputss  hvr-bounce-to-right" style="width: 100%;background-color:#0a3161" type="submit" name="add_user">Register</button>
                  </div>
                </div>

              <br/>
            </div>

            </form>
          </div>
        </div>
      </div>
     

     <div id="myModal2" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="margin-top: 20vh">
        <div class="modal-dialog modal-sm" style="width:400px">
          <div class="modal-content">
            <form method="POST" action="login_redirect.php"  novalidate onsubmit="return validate();">
             <div style="padding: 40px;background-color: #fff">
                 <img src="Logo.png" style="width:100px;">
                <div style="padding: 5px;"></div>
                <div style="padding: 10px;"></div>

                <div class="row">
                  <div class="col-sm-12">
                    <input type="text" class="form-control inputs" name="user" placeholder="Enter Email Address">
                      <input type="hidden" name="role" value="User-Agent-x">
                    <div id="email_error" style="color: red;font-size: 12px;display: none;">Enter Correct Email Address</div>
                    <div style="padding: 14px;" class="mobs"></div>
                  </div>
                </div>
                  <div style="padding: 5px;"></div>

                <div class="row">

                   <div class="col-sm-12">
                     <input type="password" class="form-control inputs" name="pass" placeholder="Enter Password">
                     <div id="password_error" style="color: red;font-size: 12px;display: none;">Enter Password</div>
                     <div style="padding: 14px;" class="mobs"></div>
                  </div>
                </div>
                <div style="padding: 5px;"></div>

               <input type="hidden" name="tx_address" >
              <!-- <div style="padding: 10px;"></div>-->
               <!--div class="g-recaptcha" data-sitekey="6LcVE1YUAAAAABnLtRy9kgvkyyL-4OE0gWOcrsot"></div-->
                <div style="padding: 16px;"></div>
               
               

                <div class="row">
                  <div class="col-sm-12">
                   <button class="inputss hvr-bounce-to-right" name="login" style="width: 100%;background-color: #0a3161">LogIn</button>
                  </div>
                </div>
                <br/>
                 <!--<center><a href="forgot_password.php">Forgot Password? Click Here </a></center>-->
            </div>

            </form>
          </div>
        </div>
      </div>


    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="particle.js"></script>
    <script type="text/javascript">
      particlesJS("particles-js", {
  "particles": {
    "number": {
      "value": 71,
      "density": {
        "enable": true,
        "value_area": 800
      }
    },
    "color": {
      "value": "#0f2888"
    },
    "shape": {
      "type": "circle",
      "stroke": {
        "width": 5,
        "color": "#0f2888"
      },
      "polygon": {
        "nb_sides": 7
      },
      "image": {
        "src": "img/github.svg",
        "width": 80,
        "height": 100
      }
    },
    "opacity": {
      "value": 0.8177401510414166,
      "random": false,
      "anim": {
        "enable": false,
        "speed": 1,
        "opacity_min": 0.1,
        "sync": false
      }
    },
    "size": {
      "value": 3,
      "random": true,
      "anim": {
        "enable": false,
        "speed": 60.905790922600886,
        "size_min": 0.1,
        "sync": false
      }
    },
    "line_linked": {
      "enable": true,
      "distance": 150,
      "color": "01abab",
      "opacity": 0.4,
      "width": 1.687847739990702
    },
    "move": {
      "enable": true,
      "speed": 6,
      "direction": "none",
      "random": false,
      "straight": false,
      "out_mode": "out",
      "bounce": false,
      "attract": {
        "enable": false,
        "rotateX": 600,
        "rotateY": 1200
      }
    }
  },
  "interactivity": {
    "detect_on": "canvas",
    "events": {
      "onhover": {
        "enable": true,
        "mode": "grab"
      },
      "onclick": {
        "enable": true,
        "mode": "remove"
      },
      "resize": true
    },
    "modes": {
      "grab": {
        "distance": 400,
        "line_linked": {
          "opacity": 1
        }
      },
      "bubble": {
        "distance": 400,
        "size": 40,
        "duration": 2,
        "opacity": 8,
        "speed": 3
      },
      "repulse": {
        "distance": 200,
        "duration": 0.4
      },
      "push": {
        "particles_nb": 4
      },
      "remove": {
        "particles_nb": 2
      }
    }
  },
  "retina_detect": false
});
    </script>
    <!-- <script type="text/javascript" src="counter.js"></script>
    <script>
    $('.counter').counter({});
    </script> -->
    <script type="text/javascript" src="js/flipclock.js"></script>
   <script type="text/javascript">
      var clock;
      
      $(document).ready(function() {
        // Set dates.
        var futureDate  = new Date("June 30, 2019 12:59 PM EDT");
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