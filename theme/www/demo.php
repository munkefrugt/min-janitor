<?php
$access_item = false;
if(isset($read_access) && $read_access) {
	return;
}

include_once($_SERVER["FRAMEWORK_PATH"]."/config/init.php");


$action = $page->actions();
$IC = new Items();
$itemtype = "demo";


$page->bodyClass("demo");
$page->pageTitle("Demo");



$page->page(array(
	"templates" => "pages/demo.php"
	)
);
exit();


?>
 