<?php
// 
$access_item["/"] = true;
$access_item["/test1"] = true;
$access_item["/test2"] = false;

if(isset($read_access) && $read_access) {
	return;
}

include_once($_SERVER["FRAMEWORK_PATH"]."/config/init.php");


$action = $page->actions();


$page->bodyClass("test");
$page->pageTitle("test");

// notes about how the actions array works:
// here my main url is http://min-janitor.local/
// anything you put after the last "/" will look for a controller (a file in the "theme/wwww" folder with that name)
// fx: http://min-janitor.local/demo will run the controller file demo.php from the "wwww" folder. 
// the the demo.php will run a file from the templates/pages, fx. templates/pages/demo.php that contains html
// Everything after "http://min-janitor.local/demo/" is stored in the array and called a REST parameter
// Here below are an example of 3 REST parameters "index0" , "index1", "index2"
// like http://min-janitor.local/demo/index0/index1/index2
//  
// $action = { [0] =>  index0 , [1] =>  index1, [2] =>  index2 } 
// normally  $action doesn't contain more than 3 values.

// in this example of posts it doesn't care about what the first REST parameter is it load a page 



if( $action[0] == "test1") {

	$page->page(array(
		"templates" => "pages/test1.php"
	));
	exit();

}
// /test/test2
else if($action[0] == "test2") {

	$page->page(array(
		"templates" => "pages/test2.php"
	));
	exit();

}
// try to put 3 random string in the url after the "http://min-janitor.local/test/john/eric/ted"
else if(count($action) >= 3 ) {

	print_r($action);
	exit();

}
$page->page(array(
	"templates" => "pages/test.php"
));
exit();


?>