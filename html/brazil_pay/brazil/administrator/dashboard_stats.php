     
       <?php //$data = file_get_contents("http://api.etherscan.io/api?module=account&action=tokenbalance&contractaddress=0xAf55F3B7DC65c8f9577cf00C8C5CA7b6E8Cc4433&address=0xe34f89153495cc29c02b8b863e5bf44af9cd26cb&tag=latest&apikey=KN6UV25CEHMII57MUZ9BNZPTG8IXPNJF71");              
         // $mata = json_decode($data, true);          
         // print_r($mata); 
 ?>
 
 <?php
    //stats Data
    // find totals users
  try {
          $stmt = $pdo->prepare('SELECT id FROM `users`');
      } catch(PDOException $ex) {
          echo "An Error occured!"; 
          print_r($ex->getMessage());
      }
      $stmt->execute();
      $user = count($stmt->fetchAll());  

      // Find Total Sold Tokens
       try {
          $stmt = $pdo->prepare('SELECT sum(no_of_tokens) as tokenss FROM `buy_token`');
      } catch(PDOException $ex) {
          echo "An Error occured!"; 
          print_r($ex->getMessage());
      }
      $stmt->execute();
      $tokens = ($stmt->fetchAll());   
      //print_r($tokens);
      
      
    
    $dara =  get_data_id("entrc_price");
    
       try {
          $stmt = $pdo->prepare('SELECT sum(balance) as tokens_sold FROM `users`');
      } catch(PDOException $ex) {
          echo "An Error occured!"; 
          print_r($ex->getMessage());
      }
      $stmt->execute();
      $tokens_sold = ($stmt->fetch()); 
      
   // print_r($tokens_sold);
    
    $total_supply = $dara['total_supply'];
    $total_users = $user;
    $tokens_sold = $tokens_sold['tokens_sold']; 
    $tokens_left = $total_supply - $tokens_sold;
       

  ?>
  
  
        <div class="row">


          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card">
              <div class="row">
                <div class="col-sm-4 lft">
                  <img src="img/available.svg" class="ico" style="opacity: .8">
                </div>
                <div class="col-sm-8 rgt">
                  <div style="padding: 10px;"></div>
                  <div style="font-size: 12px;color: #000db3;">AVAILABLE</div>
                  <?php

                      $curl = curl_init();

                      curl_setopt_array($curl, array(
                        CURLOPT_PORT => "3001",
                        CURLOPT_URL => "http://18.217.132.185:3001/api/dataManager/get/remainingSupply",
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => "",
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 30,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => "GET",
                        CURLOPT_HTTPHEADER => array(
                          "Accept: */*",
                          "Accept-Encoding: gzip, deflate",
                          "Cache-Control: no-cache",
                          "Connection: keep-alive",
                          "Content-Type: application/json",
                          "Cookie: connect.sid=s%3As9jhZR8iq-hQnNHcnyK3cDbquTrjhCFW.C0PHBIykD56y2P859rElDNkIt4N%2BMpyc0pCWpN642gc",
                          "Host: 18.217.132.185:3001",
                          "Postman-Token: a56bc272-283e-42b2-acbb-74aa3b8311c2,17a04cde-5797-4dac-bcc0-6b79d1c106e4",
                          "User-Agent: PostmanRuntime/7.16.3",
                          "cache-control: no-cache"
                        ),
                      ));

                      $response = curl_exec($curl);
                      $err = curl_error($curl);

                      curl_close($curl);
                      $data = "";

                      if ($err) {
                        echo "cURL Error #:" . $err;
                      } else {
                         $data = json_decode($response, true);
                      }
                      //print_r($data);
                      $tokens_left = $data['remainingSupply'];

                      ?>
                  <div style="font-size: 25px;color: #777;font-family: 'Century Gothic';font-weight: bold;"><?php echo number_format((float)$tokens_left, 2, '.', '');; ?></div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card">
              <div class="row">
                <div class="col-sm-4 lft">
                  <img src="img/sold.svg" class="ico" style="opacity: .8">
                </div>
                <div class="col-sm-8 rgt">
                  <div style="padding: 10px;"></div>
                  <div style="font-size: 12px;color: #000db3;">SOLD</div>
                  <div style="font-size: 25px;color: #777;font-family: 'Century Gothic';font-weight: bold;"><?php 
                  $curl = curl_init();
                  curl_setopt_array($curl, array(
                    CURLOPT_PORT => "3001",
                    CURLOPT_URL => "http://18.217.132.185:3001/api/dataManager/get/totalTokensSold",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_HTTPHEADER => array(
                      "Content-Type: application/json",
                      "Postman-Token: ea961af9-666b-440e-ab23-9ccf6649396e",
                      "cache-control: no-cache"
                    ),
                  ));

                  $response = curl_exec($curl);
                  $err = curl_error($curl);

                  curl_close($curl);
                      $data = "";

                      if ($err) {
                        echo "cURL Error #:" . $err;
                      } else {
                         $data = json_decode($response, true);
                      }
                      $tokens_sold = $data['totalTokensSold'];
                  echo number_format((float)$tokens_sold, 2, '.', '');; ?></div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card">
              <div class="row">
                <div class="col-sm-4" style="text-align: center;">
                  <img src="img/profits.svg" class="ico" style="opacity: 1">
                </div>
                <div class="col-sm-8 rgt">
                  <div style="padding: 10px;"></div>
                  <div style="font-size: 12px;color: #000db3;">TOTAL SUPPLY</div>
                  <div style="font-size: 25px;color: #777;font-family: 'Century Gothic';font-weight: bold;"><?php 
                    $curl = curl_init();
                  curl_setopt_array($curl, array(
                    CURLOPT_PORT => "3001",
                    CURLOPT_URL => "http://18.217.132.185:3001/api/dataManager/get/lifetimeTotalSupply",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_HTTPHEADER => array(
                      "Accept: */*",
                      "Accept-Encoding: gzip, deflate",
                      "Cache-Control: no-cache",
                      "Connection: keep-alive",
                      "Content-Type: application/json",
                      "Cookie: connect.sid=s%3AFjJ-NIEm6_EPyKRgZgiGOfm-vy4Qw8QO.hZwQrlMxUDj0h2dFtI7DMv8tZqZqRIYifKEKh6ENzQ8",
                      "Host: 18.217.132.185:3001",
                      "Postman-Token: ee0ffcc6-59fc-4b9d-baf3-e00b0ce2a378,7ce99a29-4453-4b62-a3e3-5dd3c5b032c8",
                      "User-Agent: PostmanRuntime/7.16.3",
                      "cache-control: no-cache"
                    ),
                  ));

                  $response = curl_exec($curl);
                  $err = curl_error($curl);

                  curl_close($curl);
                  $data = json_decode($response, true);
                  $total_supply = $data['lifetimeTotalSupply'];

                  echo number_format((float)$data['lifetimeTotalSupply'], 2, '.', '');; ?></div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card">
              <div class="row">
                <div class="col-sm-4 lft">
                  <img src="img/use.svg" class="ico" style="opacity: .8">
                </div>
                <div class="col-sm-8 rgt">
                  <div style="padding: 10px;"></div>
                  <div style="font-size: 12px;color: #000db3;">USERS/CONTRIBUTORS</div>
                  <div style="font-size: 25px;color: #777;font-family: 'Century Gothic';font-weight: bold;"><?php echo $total_users; ?></div>
                </div>
              </div>
            </div>
          </div>

        </div>

