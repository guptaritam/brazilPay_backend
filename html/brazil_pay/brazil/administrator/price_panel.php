 <div class="col-sm-12 rgt">
              <div class="rgt_pad">
              	<?php $fatay = get_data_id2("entrc_price"); ?>

              	<?php 
              		$ether = file_get_contents("https://api.coinmarketcap.com/v1/ticker/ethereum/?convert=USD");
			            $data = json_decode($ether, TRUE);
			            $ether = $data[0]['price_usd'];
			            
			            $price_bbt = $fatay['price'];

			            $no_of_bbt_by_ether = ($ether/$price_bbt);  


			              $btc = file_get_contents("https://api.coinmarketcap.com/v1/ticker/bitcoin/?convert=USD");
				            $price_bbt = get_data_id("entrc_price");
				            $data = json_decode($btc, TRUE);
				            //print_r($data);
				            $btc = $data[0]['price_usd'];
				            
				            $price_bbt = $fatay['price'];
				            //echo $price_bbt;

				            $no_of_bbt_by_btc = ($btc/$price_bbt); 
              	 ?>

              	<div class="ticket">1<i class="fa fa-fw" aria-hidden="true" title="Copy to use bitcoin"></i> = <?php echo round($no_of_bbt_by_btc,2); ?> Bzazil Pay</div>

              	<div class="ticket">1 Ether = <?php echo round($no_of_bbt_by_ether,2); ?>  Bzazil Pay</div>
              	<div class="ticket">1  Bzazil Pay = $<?php echo round($fatay['price'],2); ?></div>
              	<div class="clearfix"></div>
              </div>
           </div>