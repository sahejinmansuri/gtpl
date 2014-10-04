<?php
define('DRUPAL_ROOT', 'I:\xampp\htdocs\drupal\gtpl\gtpl_local\gtpl_5_9');
require_once 'I:\xampp\htdocs\drupal\gtpl\gtpl_local\gtpl_5_9\includes\bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);
global $base_url;
$tid = @$_REQUEST['tid'];
$id = @$_REQUEST['id'];
$term = taxonomy_term_load($tid);
if($id == 1){
	$url = $base_url."/node/5/1";
}else if($id == 2){
	$url = $base_url."/node/5/1/2";
	$back_url = $base_url."/node/5";
}else if($id == 3){
	$url = $base_url."/node/5/1/2/3";
	$back_url = $base_url."/node/5/1";
}		
?>
<div class="plan_titleouter" id="plan_titleouter<?php echo $id; ?>">
			<div class="plan_title"><?php echo $term->name; ?></div>
			<?php if($id != 1){ ?>
				<div class="plan_button back_button"><a href="<?php echo $back_url; ?>">Back</a></div>
			<?php } ?>
			<div class="plan_button"><a href="<?php echo $url; ?>">Select</a></div>
		</div>
