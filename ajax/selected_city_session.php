<?php
define('DRUPAL_ROOT', 'I:\xampp\htdocs\drupal\gtpl\gtpl_local\gtpl_5_9');
require_once 'I:\xampp\htdocs\drupal\gtpl\gtpl_local\gtpl_5_9\includes\bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);
@session_start();
global $base_url;
$city = @$_REQUEST['city'];
$_SESSION['city_selected'] = $city;
?>