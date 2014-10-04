<?php
define('DRUPAL_ROOT', 'I:\xampp\htdocs\drupal\gtpl\gtpl_local\gtpl_5_9');
require_once 'I:\xampp\htdocs\drupal\gtpl\gtpl_local\gtpl_5_9\includes\bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);
@session_start();
$tid = @$_REQUEST['tid'];
$id = @$_REQUEST['id'];
$term = taxonomy_term_load($tid);

$category_name = @$_SESSION['bb']['category_name'];
$budget_name = @$_SESSION['bb']['budget_name'];
$speed_name = @$_SESSION['bb']['speed_name'];
?>
<div id="selected_bb_plan">
	<ul>
		
			<?php
			if($id == 1){
				echo "<li>".$term->name."</li>";
				$_SESSION['bb']['category_id'] = $tid;
				$_SESSION['bb']['category_name'] = $term->name;
			}else if($category_name != ""){
				echo "<li>".$category_name."</li>";
			}
			?>
		
		
			<?php
			if($id == 2){
				echo "<li>".$term->name;
				$_SESSION['bb']['budget_id'] = $tid;
				$_SESSION['bb']['budget_name'] = $term->name;
			}else if($budget_name != ""){
				echo "<li>".$budget_name."</li>";
			}
			?>
		
		
			<?php
			if($id == 3){
				echo "<li>".$term->name."</li>";
				$_SESSION['bb']['speed_id'] = $tid;
				$_SESSION['bb']['speed_name'] = $term->name;
			}else if($speed_name != ""){
				echo "<li>".$speed_name."</li>";
			}
			?>
		
	</ul>
	<div id="ajax_load_ajax" style="display:none"><img onload="return disable_ajax();" src="<?php echo $base_url; ?>/sites/all/themes/gtpl/images/ajax.gif" id="ajax_image_load" /></div>
</div>
