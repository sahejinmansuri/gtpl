<?php
define('DRUPAL_ROOT', 'F:\xampp\htdocs\drupal\gtpl\gtpl_local\gtpl_5_9');
require_once 'I:\xampp\htdocs\drupal\gtpl\gtpl_local\gtpl_5_9\includes\bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);
//echo DRUPAL_BOOTSTRAP_FULL;
@session_start();	 
	  $node_id = @$_REQUEST['nid'];
	  $checkbox_id = @$_REQUEST['checkbox_id'];
	  $_SESSION['node'] = $node_id;
	  $node = node_load($node_id);
	  
	  $tid = @$_REQUEST['area_selecte'];
	  if(!isset($tid)){
		$tid = $_SESSION['location'];
		if(!isset($tid)){
			$tid = 27;
		}
	  }
	  $_SESSION['location'] = $tid;

		$term = taxonomy_term_load($tid);
	  
	  //$entertainment_tax = '6.00';
	  $entertainment_tax = $term->field_entertainment_tax_texomomy['und'][0]['value'];
	  $service_tax = @$node->field_service_tax['und'][0]['value'];
	  $package_price = @$node->field_package_price['und'][0]['value'];
	  $channels = @$node->field_channels['und'];
	  $channel_pass = array();
	  foreach($channels as $key=>$val){
		$channel_pass[] = $val['target_id'];
	  }
	  $_SESSION['channels_current_pack'] = $channel_pass;
	  //$total_tax = $service_tax + $entertainment_tax;
  
	 
	 
	  //print_r(@$SESSION['addon_package']);
	  if(isset($_REQUEST['new_package'])){
		 $new_package = $_REQUEST['new_package'];
		 //$SESSION['addon_package'][$new_package] = $new_package;
		 lists_session($new_package,$new_package,'addons');
	  }
	  $addon_selected = retrieve_session('addons'); 
	  
	  if(isset($_REQUEST['Submit_channels'])){
		$_SESSION['channel'] = '';
		foreach($_REQUEST as $key=>$val){
			$str_include = strpos($key,'ala_carte_channel_');
			if($str_include !== False){
				$new_channel = substr($key,18);
				lists_session($new_channel,$new_channel,'channel');
			}
		};
	  }
	  if(isset($_REQUEST['all_channels'])){
		//echo $_REQUEST['all_channels'];
		$checkbox = @$_REQUEST['checkbox'];
		$channels = @$_REQUEST['channel_array'];
		$channels_array = explode(',',$channels);
		if($checkbox == 'true'){
			foreach($channels_array as $key=>$val){
				lists_session($val,$val,'channel');
			}
		}else if($checkbox == 'false'){
			unset($_SESSION['channel']);
		}
	  }
	  else if(isset($checkbox_id)){
		$new_channel = $checkbox_id;
		$checkbox = @$_REQUEST['checkbox'];
		if($checkbox == 'false'){
			unset($_SESSION['channel'][$new_channel]);
		}else{
			lists_session($new_channel,$new_channel,'channel');
		}
	  }
	  $channel_selected = retrieve_session('channel'); 	  
	  ?>
<div id="ajax_alacart">  
<?php 
$table_first = '<table width="30%" cellspacing="0" cellpadding="0" border="0" class="package_detail">';
$table_first .= '<tbody><tr class="heading">
      <td width="31%">Your Selection</td>
      <td width="10%" align="center">Price</td>
    </tr>
    <tr class="odd">
      <td>'.$node->title .'</td>
      <td align="center" class="price_format">'.number_format($package_price,2).'</td>
    </tr>';

	$i = 0;
	$total_price = $package_price;
	if(!empty($addon_selected)){
		foreach($addon_selected as $val){
			$addon_node = node_load($val);
			$addon_price = @$addon_node->field_package_price['und'][0]['value'];
			$addon_tax = @$addon_node->field_package_price['und'][0]['value'];
			if(($i % 2) == 0){
				$class = 'even';
			}else{
				$class = 'odd';
			}
			$table_first .= "<tr class='".$class."'>";
			$table_first .= '<td width="31%">'.@$addon_node->title.'</td>';
			$table_first .= '<td width="10%" align="center" class="price_format">'.number_format($addon_price,2).'</td>';
			$table_first .= "</tr>";
			$total_price = $total_price + $addon_price;
			$service_tax = $service_tax + $addon_tax;
			$i++;
		}
	}
			//echo "<pre>";
			//print_r($channel_selected);
			//echo "</pre>";
	$channel_array = array();
	$alacarte_price = 0;
	if(!empty($channel_selected)){
		foreach($channel_selected as $val){
			$addon_node = node_load($val);
			$addon_price = @$addon_node->price;
			//$addon_tax = @$addon_node->field_package_price['und'][0]['value'];
			if(($i % 2) == 0){
				$class = 'even';
			}else{
				$class = 'odd';
			}
			$channel_array[] = $val;
			$table_first .= "<tr class='".$class."'>";
			$table_first .= '<td width="31%">'.@$addon_node->title.'</td>';
			$table_first .= '<td width="10%" align="center" class="price_format">'.number_format($addon_price,2).'</td>';
			$table_first .= "</tr>";
			$total_price = $total_price + $addon_price;
			$alacarte_price = $alacarte_price + $addon_price;
			$i++;
			//$total_tax = $total_tax + $addon_tax;
		}
	}
	
	if($i != 0){
		if($total_price < 150){
			$total_price = 150;
		}
	}
	$class = 'odd';
	if($class == 'even'){
				$class = 'odd';
			}else{
				$class = 'even';
			}
			$service_tax = number_format($total_price * 12.36/100,2);
	$total_tax = $service_tax + $entertainment_tax;
$table_first .= '<tr class="'.$class.'">
      <td>Total (Per Month)</td>
      <td align="center" class="price_format">'.$total_price.'</td>
    </tr>
  </tbody></table>';
	
 if($node_id == '205'){
		$node_popular = node_load('206');
		$package_price_popular = @$node_popular->field_package_price['und'][0]['value'];
		$price_final_compare = $package_price + $alacarte_price;
		if($price_final_compare > $package_price_popular){
		
			$channels_compare_1 = $node_popular->field_channels['und'];
			$channels_compare = array();
			foreach($channels_compare_1 as $key=>$val){
				$channels_compare[] = $val['target_id'];
			}
			$array_channel_count = array();
			$k = 0;
			foreach($channel_array as $key=>$val){
				if(in_array($val,$channels_compare)){
					$array_channel_count[$k]['val'] = $val;
					$array_channel_count[$k]['compare'] = 1;
				}else{
					$array_channel_count[$k]['val'] = $val;
					$array_channel_count[$k]['compare'] = 0;
				}
				$k++;
			}
			//print_r($array_channel_count);
			$flag = 1;
			foreach($array_channel_count as $key=>$val){
				if($val['compare'] == 0){
					$flag = 0;
				}
			}
			if($flag == 1){
				?>
<script>
$(function() {
$( "#dialog_confirm1" ).dialog({
resizable: false,
height:200,
width:400,
modal: true,
buttons: {
"Yes": function() {
$( this ).dialog( "close" );
},
"No": function() {
$( this ).dialog( "close" );
	
window.location.assign('<?php echo $base_url; ?>/node/206?session=1');
}
}
});
});
</script>
<div id="dialog_confirm1" title="Change Package">
<p>All these channels are available in our Popular Pack at Rs. 217.<br>Do you still want to go for A-la-Carte??</p>
</div> 
				<?php
				echo "<div class='message_selection'>Selected Ala Carte channels are already available in ".$node_popular->title.". Instead of selecting ".$node->title.", you can go with ".$node_popular->title."</div>";
			}
			
		}
	}
echo $table_first;
?> 
  <table width="30%" cellspacing="0" cellpadding="0" border="0" class="tax_detail">
    <tbody><tr class="heading">
      <td width="31%">Tax Type</td>
      <td width="10%" align="center">Price</td>
    </tr>
    <tr class="odd">
      <td>Service Tax</td>
      <td align="center" class="price_format"><?php echo $service_tax; ?></td>
    </tr>
	<tr class="even">
      <td>Entertainment Tax</td>
      <td align="center" class="price_format"><?php echo number_format($entertainment_tax,2); ?></td>
    </tr>
	<tr class="odd">
      <td>Total Tax (Per Month)</td>
      <td align="center" class="price_format"><?php echo $total_tax; ?></td>
    </tr>
	<tr class="even">
      <td>Grand Total (Per Month)</td>
      <td align="center" class="price_format"><?php
	  $grand_total = $total_tax + $total_price;
	  echo $grand_total; ?></td>
    </tr>
  </tbody></table>
  <div class="package_description">
	Inclusive of all taxes(Service Tax 12.36%, Entertainment Tax for Gujarat = Rs 6)<br><br>
	Note : As Per TRAI if a subscriber chhoses one or more pay channels subscription fees would be Rs 150 + applicable taxes
  </div>
  </div>
  <?php

function lists_session($key, $value = NULL,$type) {
  static $storage;
  if ($value) {
    $storage[$key] = $value ;
    $_SESSION[$type][$key] = $value;   // I use 'lists' in case some other module uses 'type' in $_SESSION
  }
  else if (empty($storage[$key]) && isset($_SESSION[$type][$key])) {
    $storage[$key] = $_SESSION[$type][$key];
  }
  return $storage[$key];
}
  
function retrieve_session($type) {
  static $storage;
  $storage = @$_SESSION[$type];
  return $storage;
}
?>
