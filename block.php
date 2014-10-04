<?php
global $base_url;
$query = "SELECT node.title AS node_title, node.nid AS nid, node.language AS node_language, weight_weights.weight AS weight_weights_weight
FROM 
{node} node
INNER JOIN {field_data_field_type_of_package} field_data_field_type_of_package ON node.nid = field_data_field_type_of_package.entity_id AND (field_data_field_type_of_package.entity_type = 'node' AND field_data_field_type_of_package.deleted = '0')
INNER JOIN {taxonomy_index} taxonomy_index_value_0 ON node.nid = taxonomy_index_value_0.nid AND taxonomy_index_value_0.tid = '27'
INNER JOIN {taxonomy_index} taxonomy_index_value_1 ON node.nid = taxonomy_index_value_1.nid AND taxonomy_index_value_1.tid = '71'
INNER JOIN {taxonomy_index} taxonomy_index_value_2 ON node.nid = taxonomy_index_value_2.nid AND taxonomy_index_value_2.tid = '28'
LEFT JOIN {weight_weights} weight_weights ON node.nid = weight_weights.entity_id
WHERE (( (node.status = '1') AND (node.type IN  ('channel_packages')) AND (field_data_field_type_of_package.field_type_of_package_value = '0') AND( (taxonomy_index_value_0.tid = '27') AND (taxonomy_index_value_1.tid = '71') AND (taxonomy_index_value_2.tid = '28') )))
ORDER BY weight_weights_weight ASC";

$packages = db_query($query);
$node_all = "";
$length = 0;
foreach($packages as $package){
	if($length == 0){
		$node_all .= $package->nid;
	}else{
		$node_all .= "|".$package->nid;
	}
	$length++;
}

$packages = db_query($query);
$ijk = 0;
?>
<div class="fta_pack">
	<div class="wrapper">
		<div class="wrapper_pack">
			<div class="fta_pack_list">
				<?php
				$taxonomy_val = array();
				$genre_count = array();
				
				foreach($packages as $package){
					$ijk++;
					$node = node_load($package->nid);
					$channel_tid = array();
					$channels = $node->field_channels['und'];
					$i = 0;
					if(is_array($channels)){
						foreach($channels as $kye=>$val){
							$i++;
							$node_channel = node_load($val['target_id']);
							
							if(isset($node_channel->field_genre_package)){
								$fields = field_get_items('node', $node_channel, 'field_genre_package');
								if(is_array($fields)){
									foreach($fields as $field1) {
										$fc = array();
										$field2 = array();
										$fc = field_collection_field_get_entity($field1);
										if(is_array(@$fc->field_package['und'])){
											foreach(@$fc->field_package['und'] as $package1) {
												if($package1['target_id'] == $package->nid){
													//$tid = @$node_channel->field_genre['und'][0]['tid'];
													$tid = @$fc->field_genre1['und'][0]['tid'];
													
													$channel_tid[] = $tid;
												}
											}
										}
									}
								}
							}
						}
					}

					$final_array = array();
					if(is_array($channel_tid)){
						foreach($channel_tid as $key=>$val){
							if(array_key_exists($val,$final_array)){
								$final_array[$val] = $final_array[$val] + 1;
							}else{
								$final_array[$val] = 1;
							}
						}
					}

					if(is_array($final_array)){
						foreach($final_array as $key=>$val){
							$term = taxonomy_term_load($key);
							$weight = $term->weight;
							$final_array_weight[$key]['value'] = $val;
							$final_array_weight[$key]['weight'] = $weight;
						}
					}
					
					$key = 'weight';
					$sorter=array();
					$final_array_sort=array();
					reset($final_array_weight);
					foreach ($final_array_weight as $ii => $va) {
						$sorter[$ii]=$va[$key];
					}
					asort($sorter);
					foreach ($sorter as $ii => $va) {
						$final_array_sort[$ii]=$final_array_weight[$ii];
					}

					
					$i = 0;
					$channel_count = 0;
					foreach($final_array_sort as $key=>$val){
						$term = taxonomy_term_load($key);
						$name = @$term->name;
						$taxonomy_val[$node->nid][$i]['name'] = $name;
						$taxonomy_val[$node->nid][$i]['count'] = $val['value'];
						$channel_count = $channel_count + $val['value'];
						$i++;
					}
					$genre_count[$node->nid]['genre'] = $i;
					$genre_count[$node->nid]['channels'] = $channel_count;
					$class = 'pack_bg';
					if($ijk == 1){
						$class = 'pack_bg pack_bg_white';
					}
					if(($ijk%4) == 1){
						$style = 'style="background:url(\''.$base_url.'/sites/all/themes/gtpl/images/ftapack_bg1.png\') repeat scroll 0 0 rgba(0, 0, 0, 0)"';
					}
					elseif(($ijk%4) == 2){
						$style = 'style="background:url(\''.$base_url.'/sites/all/themes/gtpl/images/ftapack_bg2.png\') repeat scroll 0 0 rgba(0, 0, 0, 0)"';
					}
					elseif(($ijk%4) == 3){
						$style = 'style="background:url(\''.$base_url.'/sites/all/themes/gtpl/images/ftapack_bg3.png\') repeat scroll 0 0 rgba(0, 0, 0, 0)"';
					}
					elseif(($ijk%4) == 0){
						$style = 'style="background:url(\''.$base_url.'/sites/all/themes/gtpl/images/ftapack_bg4.png\') repeat scroll 0 0 rgba(0, 0, 0, 0)"';
					}
					?>
					<div class="<?php echo $class; ?>" id="pack_bg_<?php echo $node->nid; ?>" onclick="return display_package('<?php echo $node->nid; ?>','<?php echo $node_all; ?>')" <?php echo $style; ?>>
						<p>
							<?php echo $node->title; ?><br>
							<span>`</span> <?php echo $node->field_package_price['und'][0]['value']; ?> +<br>
							Applicable<br>
							Taxes
						</p>
					</div> 
					<?php
				}
				?>
			</div>
			<?php
			$packages = db_query($query);
			$i = 0;
			foreach($packages as $package){
				if($i == 0){
					$style = ' style="display:block;"';
				}else{
					$style = ' style="display:none;"';
				}
				$node = node_load($package->nid);
				?>
				<div id="fta_pack_list_<?php echo $node->nid ?>" <?php echo $style; ?>>
					<div class="channels" >
						<div class="package_title"><?php echo $node->title; ?></div>
						<table width="100%" cellspacing="0" cellpadding="0" border="0">
							<tbody>
								<tr>
								  <th width="80%">GENRE(<?php echo $genre_count[$node->nid]['genre'] ?>)</th>
								  <th width="20%" align="center">CHANNELS(<?php echo $genre_count[$node->nid]['channels'] ?>)</th>
								</tr>
							</tbody>
						</table>
						<?php
						if($length <= 3){
							$height_mq = $length * 130;
						}else{
							$height_mq = '400';
						}
						?>
						<marquee height="<?php echo $height_mq; ?>" direction="up">
						  <table width="100%" cellspacing="0" cellpadding="0" border="0">
							<tbody>
								<tr>
								  <td width="80%"></td>
								  <td width="20%" align="center"></td>
								</tr>
								<?php 
								$j = 0;
								foreach($taxonomy_val[$node->nid] as $key=>$val){
									?>
									<tr>
									  <td><?php echo $val['name']; ?></td>
									  <td  align="center">(<?php echo $val['count']; ?>)</td>
									</tr>
									<?php
								}
								?>
							</tbody>
						  </table>
						</marquee>
					</div>
					<div class="channe_buttons">
						<div class="fta_view">
							<a class="button colorbox-load" href="<?php echo $base_url."/node/333/".$node->nid."?width=600&height=500&iframe=true"; ?>">View Channels</a>
						</div>
						<form action="<?php echo $base_url."/node/".$node->nid; ?>" method="post">
							<?php
							$states = taxonomy_get_tree(5);
							foreach($states as $key=>$val){}
							?>
							<input type="hidden" name="area_selecte" id="area_selected_<?php echo $node->nid; ?>" value="<?php echo "27";?>" />
							<div class="fta_select">
								<input type="submit" name="submit" id="submit" value="Select" class="button" />
							</div>
						</form>
					</div>
				</div>
				<?php 
				$i++;
			}
			?>
		</div>
	</div>
</div>
<div class="clear"></div>
<style>
.fta_pack_list {
  height: <?php echo $length * 170; ?>px;
  width: 250px;
  float:left;
}
.wrapper_pack {
  height: <?php echo $length * 170; ?>px;
}
</style>