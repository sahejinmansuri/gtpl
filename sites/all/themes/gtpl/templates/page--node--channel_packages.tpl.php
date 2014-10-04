<?php @session_start();
if(isset($_REQUEST['session'])){
	$_SESSION['channel'] = "";
}
?>
<?php global $base_url; ?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" type="text/css" />
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script>
$(function() {
	var node = document.getElementById("package_change").value;
	$( "#dialog-confirm" ).dialog({
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
				window.location.assign('<?php echo $base_url; ?>/node/'+node+'?session=1');
			}
		}
	});
});
</script>

<div id="page-wrapper"><div id="page">
<div id="fixed_header">
  <div id="header" class="<?php print $secondary_menu ? 'with-secondary-menu': 'without-secondary-menu'; ?>"><div class="section clearfix">
  

    <?php if ($logo): ?>
      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
        <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
      </a>
    <?php endif; ?>

    <?php if ($site_name || $site_slogan): ?>
      <div id="name-and-slogan"<?php if ($hide_site_name && $hide_site_slogan) { print ' class="element-invisible"'; } ?>>

        <?php if ($site_name): ?>
          <?php if ($title): ?>
            <div id="site-name"<?php if ($hide_site_name) { print ' class="element-invisible"'; } ?>>
              <strong>
                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
              </strong>
            </div>
          <?php else: /* Use h1 when the content title is empty */ ?>
            <h1 id="site-name"<?php if ($hide_site_name) { print ' class="element-invisible"'; } ?>>
              <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
            </h1>
          <?php endif; ?>
        <?php endif; ?>

        <?php if ($site_slogan): ?>
          <div id="site-slogan"<?php if ($hide_site_slogan) { print ' class="element-invisible"'; } ?>>
            <?php print $site_slogan; ?>
          </div>
        <?php endif; ?>

      </div> <!-- /#name-and-slogan -->
    <?php endif; ?>
	
    <?php print render($page['header']); ?>

    <?php if ($main_menu): ?>
      <div id="main-menu" class="navigation">
        <?php print theme('links__system_main_menu', array(
          'links' => $main_menu,
          'attributes' => array(
            'id' => 'main-menu-links',
            'class' => array('links', 'clearfix'),
          ),
          'heading' => array(
            'text' => t('Main menu'),
            'level' => 'h2',
            'class' => array('element-invisible'),
          ),
        )); ?>
      </div> <!-- /#main-menu -->
    <?php endif; ?>

    <?php if ($secondary_menu): ?>
      <div id="secondary-menu" class="navigation">
        <?php print theme('links__system_secondary_menu', array(
          'links' => $secondary_menu,
          'attributes' => array(
            'id' => 'secondary-menu-links',
            'class' => array('links', 'inline', 'clearfix'),
          ),
          'heading' => array(
            'text' => t('Secondary menu'),
            'level' => 'h2',
            'class' => array('element-invisible'),
          ),
        )); ?>
      </div> <!-- /#secondary-menu -->
    <?php endif; ?>
  </div>
  	<div class="main_menu">
	<?php print render($page['mainmenu']); ?>
	</div>	
  </div> <!-- /.section, /#header -->
  </div>
    	<div class="banner">
	<?php print render($page['banner']); ?>
	</div>


  <?php if ($messages): ?>
    <div id="messages"><div class="section clearfix">
      <?php print $messages; ?>
    </div></div> <!-- /.section, /#messages -->
  <?php endif; ?>

  <?php if ($page['featured']): ?>
    <div id="featured"><div class="section clearfix">
      <?php print render($page['featured']); ?>
    </div></div> <!-- /.section, /#featured -->
  <?php endif; ?>

  <div id="main-wrapper" class="clearfix"><div id="main" class="clearfix">

    <?php /*<?php if ($breadcrumb): ?>
      <div id="breadcrumb"><?php print $breadcrumb; ?></div>
    <?php endif; ?> */ ?>

    <?php if ($page['sidebar_first']): ?>
      <div id="sidebar-first" class="column sidebar"><div class="section">
        <?php print render($page['sidebar_first']); ?>
      </div></div> <!-- /.section, /#sidebar-first -->
    <?php endif; ?>

    <div id="content" class="column"><div class="section">
      <?php if ($page['highlighted']): ?><div id="highlighted"><?php print render($page['highlighted']); ?></div><?php endif; ?>
      <a id="main-content"></a>
      <?php print render($title_prefix); ?>
      <?php /* if ($title): ?>
        <h1 class="title" id="page-title">
          <?php print $title; ?>
        </h1>
      <?php endif; */?>
      <?php print render($title_suffix); ?>
      <?php if ($tabs): ?>
        <div class="tabs">
          <?php print render($tabs); ?>
        </div>
      <?php endif; ?>
      <?php print render($page['help']); ?>
      <?php if ($action_links): ?>
        <ul class="action-links">
          <?php print render($action_links); ?>
        </ul>
      <?php endif; ?>
	  <?php
	  
	  $node_id = arg(1);
	  
	  if(($_SESSION['register_package1'] != "")){
		$_SESSION['register_package'] = $node_id;
	  }else{
		$_SESSION['register_package'] = "";
	  }

	  $node = node_load(arg(1));
	  $_SESSION['node'] = arg(1);;
	  
	  $tid = @$_REQUEST['area_selecte'];
	  if(!isset($tid)){
		$tid = @$_SESSION['location'];
		if(!isset($tid)){
			$tid = 27;
		}
	  }
	  $_SESSION['location'] = $tid;

		$term = taxonomy_term_load($tid);
		//echo "<pre>";
		//print_r($term);
		//echo "</pre>";
		$tname = $term->name;
		$ttax = $term->field_entertainment_tax_texomomy['und'][0]['value'];
	  /*$entertainment_tax = '6.00';*/
	  $entertainment_tax = $term->field_entertainment_tax_texomomy['und'][0]['value'];
	  $service_tax = @$node->field_service_tax['und'][0]['value'];
	  $package_price = @$node->field_package_price['und'][0]['value'];
	  $channels = @$node->field_channels['und'];
	  $channel_pass = array();
	  foreach($channels as $key=>$val){
		$channel_pass[] = $val['target_id'];
	  }
	  $channel_ses = json_encode($channel_pass);
	  //print_r($channel_pass);
	  //print_r($channel_ses);
	  $_SESSION['channels_current_pack'] = $channel_pass;
	  //$total_tax = $service_tax + $entertainment_tax;

	  
	 
	 
	  //print_r(@$SESSION['addon_package']);
	  if(isset($_REQUEST['new_package'])){
		 $new_package = $_REQUEST['new_package'];
		 //$SESSION['addon_package'][$new_package] = $new_package;
		 lists_session($new_package,$new_package,'addons');
	  }
	  $addon_selected = retrieve_session('addons'); 
	  //print_r($_REQUEST);
	  //print_r($_COOKIE);
	  if(isset($_REQUEST['Submit_channels'])){
		$_SESSION['channel'] = '';
		foreach($_REQUEST as $key=>$val){
			$str_include = strpos($key,'ala_carte_channel_');
			if($str_include !== False){
				$new_channel = substr($key,18);
				$_SESSION['channel'][$new_channel] = $new_channel;
				//lists_session($new_channel,$new_channel,'channel');
			}
		};
	  }
	  if(isset($_COOKIE['submit'])){
		$_SESSION['channel'] = '';
		foreach($_REQUEST as $key=>$val){
			$str_include = strpos($key,'ala_carte_channel_');
			if($str_include !== False){
				$new_channel = substr($key,18);
				lists_session($new_channel,$new_channel,'channel');
			}
		}
		setcookie('submit','',time()-1000);
	  }
	  if(isset($_REQUEST['new_channel'])){
		$new_channel = $_REQUEST['new_channel'];
		lists_session($new_channel,$new_channel,'channel');
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
			/*$addon_tax = @$addon_node->field_package_price['und'][0]['value'];*/
			$addon_tax = @$addon_node->field_service_tax['und'][0]['value'];
			if(($i % 2) == 0){
				$class = 'even';
			}else{
				$class = 'odd';
			}
			$table_first .= "<tr class='".$class."'>";
			$table_first .= '<td width="31%">'.$addon_node->title.'</td>';
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
	$channel_count = 0;
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
			$channel_count++;
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
      <td align="center" class="price_format">'.number_format($total_price,2).'</td>
    </tr>
  </tbody></table>';
  
	//code for alert box suggestion 
	$node_current = node_load($node_id);
	$node_states = @$node_current->field_package_for_state['und'];
	$node_weight = @$node_current->weight_weight;
	if(is_array($node_states)){
		$query = new EntityFieldQuery();
		$query->entityCondition('entity_type', 'node')
		  ->entityCondition('bundle', 'channel_packages')
		  ->propertyCondition('status', 1)
		  ->fieldCondition('field_package_for_state', 'target_id', $node_states, 'IN');
		  
		$result = $query->execute();
		$nodes_all = $result['node'];
		$nodes_final = array();
		
		foreach($nodes_all as $key=>$val){
			$node_id_fetch = $val->nid;
			
			$select = db_select('node', 'n');
			$select->join('weight_weights', 'w', 'w.entity_id = n.nid');
			$select->fields('w', array('weight'))
				->condition('n.nid', $node_id_fetch);
			$nids = $select->execute()->fetchCol();
			$node_fetch_weight = $nids[0];
			if($node_fetch_weight > $node_weight){
				$nodes_final[$key]['nid'] = $nodes_all[$key]->nid;
				$nodes_final[$key]['weight'] = $node_fetch_weight;
			}
		}
		
		$nodes_final = aasort($nodes_final,"weight");
		$nodes_final = array_reverse($nodes_final);
		
		$price_final_compare = $package_price + $alacarte_price;
		$count_nodes = count($nodes_final);
		$count_n = $count_nodes;
		
		foreach($nodes_final as $key1=>$val1){
			$node_id_fetch = $val1['nid'];
			$node_detail_fetch = node_load($node_id_fetch);
			if($count_nodes == $count_n){
				$alert_channels_three = $node_detail_fetch;
				$alert_price_popular = @$node_detail_fetch->field_package_price['und'][0]['value'];
			}
			$count_nodes =  $count_nodes - 1;
			
			if($node_detail_fetch->weight_weight > $node_weight){
				$package_price_popular = @$node_detail_fetch->field_package_price['und'][0]['value'];
				
				if($price_final_compare > $package_price_popular){
					$channels_compare_1 = $node_detail_fetch->field_channels['und'];
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
					$flag = 1;
					foreach($array_channel_count as $key=>$val){
						if($val['compare'] == 0){
							$flag = 0;
						}
					}
					if(($flag == 1)){
						?>
						<input type="hidden" name="package_change" id="package_change" value="<?php echo $node_id_fetch; ?>" />
						<div id="dialog-confirm" title="Change Package">
							<p>All these channels are available in our <?php echo @$node_detail_fetch->title ." at Rs. ". $package_price_popular; ?>.<br>Do you still want to go for A-la-Carte??</p>
						</div>
						<?php
						break;
					}
				}
				if($count_nodes == 0){
					$count_channels = count($channel_array);
					if($count_channels >= 3){
						?>
						<input type="hidden" name="package_change" id="package_change" value="<?php echo $alert_channels_three->nid; ?>" />
						<div id="dialog-confirm" title="Change Package">
							<p>All these channels are available in our <?php echo @$alert_channels_three->title ." at Rs. ". $alert_price_popular; ?>.<br>Do you still want to go for A-la-Carte??</p>
						</div>
						<?php
						break;
					}
				}
			}
		}
	}
	//code for alert box suggestion
	
echo $table_first;
?> 
  <table width="30%" cellspacing="0" cellpadding="0" border="0" class="tax_detail">
    <tbody><tr class="heading">
      <td width="31%">Tax Type</td>
      <td width="10%" align="center" >Price</td>
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
	Inclusive of all taxes(Service Tax 12.36%, Entertainment Tax for <?php echo $tname." = Rs ".$ttax; ?>)<br><br>
	Note : As Per TRAI if a subscriber chooses one or more pay channels subscription fees would be Rs 150 + applicable taxes<br><br>
	Bills will be raised through network operator. GTPL provides packages and rates as per TRAI rules.
  </div>
  </div>
  <div class="clear"></div>
  <?php
  $arg_2 = arg(2);
		
  ?>
  <?php
			$states = taxonomy_get_tree(5);
					foreach($states as $key=>$val){
						if($val->tid ==75){
							$term = taxonomy_term_load($val->tid);
							$kk = $term->field_redirect_link['und'][0]['value'];
						}
					}
			?>
  <div class="state">
	<span class="custom-dropdown custom-dropdown--emerald custom-dropdown--large">
				Select your location 
				<?php /*<select id="area_selection" name="area_selection" class="custom-dropdown__select custom-dropdown__select--emerald" onchange="return redirect_page_function('<?php echo $base_url;?>','<?php echo $kk ?>')">*/ ?>
				<select id="area_selection" name="area_selection" class="custom-dropdown__select custom-dropdown__select--emerald">
					<?php
					$states = taxonomy_get_tree(5);
					foreach($states as $key=>$val){	
						$select = "";
						if($val->tid == $tid){
							$select = 'selected="selected"';
							?><option <?php echo $select; ?> value="<?php echo $val->tid;?>"><?php echo $val->name;?></option><?php
						}
						/*if(($tid == 27) || ($tid == 28) || ($tid == 71)){
							if(($val->tid == 27) || ($val->tid == 28) || ($val->tid == 71)){
								?><option <?php echo $select; ?> value="<?php echo $val->tid;?>"><?php echo $val->name;?></option><?php
							}
						}elseif(($tid == 72) || ($tid == 73) ){
							if(($val->tid == 72) || ($val->tid == 73)){
								?><option <?php echo $select; ?> value="<?php echo $val->tid;?>"><?php echo $val->name;?></option><?php
							}
						}*/
						
					}
					?>
				</select>
	</span>
  </div>
<?php 

		if(isset($arg_2)){
			$url2 = $base_url.'/node/215';
			$urlw = $base_url.'/node/433/5';
			$url = $base_url.'/node/'.arg(1);
			$image = "step3.png"; ?>
<div class="steps" style="background:url(<?php echo $base_url.'/sites/all/themes/gtpl/images/'.$image; ?>); height:53px; width:641px;">

	<?php if(($_SESSION['register_package'] != "")){ ?>
	<p class="third_p2"><a class="next" href="<?php echo $urlw;?>">a</a></p>
	<?php } 
	else { ?>
	<p class="third_p2"><a class="next" href="<?php echo $url2;?>">a</a></p>
	<?php } ?>
	<p class="third_p1"><a class="prev" href="<?php echo $url;?>">a</a></p>
</div>
<!--<div  ><a href="http://client.attuneinfocom.com/gtpl_drupal/gtpl/node/334?width=700&height=500&iframe=true" class="colorbox-load" >Channels</a></div>-->
<?php

		}else{
			$url = $base_url.'/node/'.arg(1).'/100';
			$image = "step2.png"; ?>
<div class="steps" style="background:url(<?php echo $base_url.'/sites/all/themes/gtpl/images/'.$image; ?>); height:53px; width:641px;">
	<p class="second_p"><a class="second" href="<?php echo $url;?>">a</a></p>
</div><?php

		}
		
?>


<style>
.steps p.second_p {
  left: 312px;
  position: relative;
  width: 1px;
}

.steps p a.second {
  display: block;
  font-size: 0;
  padding: 15px 82px;
}
.steps p.third_p1 {
  left: 160px;
  position: relative;
  width: 1px;
}

.steps p a.prev {
  display: block;
  font-size: 0;
  padding: 15px 77px;
}

.steps p.third_p2 {
  right: 160px;
  position: relative;
  width: 1px;
  float:right;
}

.steps p a.next {
  display: block;
  font-size: 0;
  padding: 15px 77px;
}

.message_selection {
  font-size: 15px;
  margin-bottom: 20px;
  margin-top: 20px;
  text-decoration: blink;
}
</style>	

  
<!--<form action="<?php //echo $url; ?>" method="post">
<div class="fta_select"><input type="submit" value="Next" class="button" /></div>
</form>-->
      <?php print render($page['content']); ?>
      <?php print $feed_icons; ?>

    </div></div> <!-- /.section, /#content -->

    <?php if ($page['sidebar_second']): ?>
      <div id="sidebar-second" class="column sidebar"><div class="section">
        <?php print render($page['sidebar_second']); ?>
      </div></div> <!-- /.section, /#sidebar-second -->
    <?php endif; ?>

  </div></div> <!-- /#main, /#main-wrapper -->  
	<div class="content2">
	<?php
		
		if(isset($arg_2)){
			print render($page['content_channel']);
		}else{
			 print render($page['content2']);
		}
	?>
	</div>
	<div class="clear"></div>
  <?php if ($page['triptych_first'] || $page['triptych_middle'] || $page['triptych_last']): ?>
    <div id="triptych-wrapper"><div id="triptych" class="clearfix">
      <?php print render($page['triptych_first']); ?>
      <?php print render($page['triptych_middle']); ?>
      <?php print render($page['triptych_last']); ?>
    </div></div> <!-- /#triptych, /#triptych-wrapper -->
  <?php endif; ?>

  <div id="footer-wrapper"><div class="section">

    <?php if ($page['footer_firstcolumn'] || $page['footer_secondcolumn'] || $page['footer_thirdcolumn'] || $page['footer_fourthcolumn']): ?>
      <div id="footer-columns" class="clearfix">
        <?php print render($page['footer_firstcolumn']); ?>
        <?php print render($page['footer_secondcolumn']); ?>
        <?php print render($page['footer_thirdcolumn']); ?>
        <?php print render($page['footer_fourthcolumn']); ?>        
      </div> <!-- /#footer-columns -->
    <?php endif; ?>

    <?php if ($page['footer']): ?>
      <div id="footer" class="clearfix">
        <?php print render($page['footer']); ?>
      </div> <!-- /#footer -->
    <?php endif; ?>

  </div></div> <!-- /.section, /#footer-wrapper -->

</div></div> <!-- /#page, /#page-wrapper -->
<?php
//echo $msg;
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
function aasort (&$array, $key) {
	$sorter=array();
	$ret=array();
	reset($array);
	foreach ($array as $ii => $va) {
		$sorter[$ii]=$va[$key];
	}
	asort($sorter);
	foreach ($sorter as $ii => $va) {
		$ret[$ii]=$array[$ii];
	}
	return $ret;
}
?>