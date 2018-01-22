<?php
  $file = '../config.json';
$current = file_get_contents($file);
//print_r($_POST);

foreach($_POST['name'] as $key => $value) {
	
	//echo ("{$_POST['pic_page'][$key]}<br>");

	
	 $cross_one=array(
   'name' => $_POST['name'][$key],
   'name2' => $_POST['name2'][$key],
   'id' => $_POST['id'][$key],
   
   'dir' => $_POST['dir'][$key],
   'price' => $_POST['price'][$key],
   'desc' => $_POST['desc'][$key],
   'pic' => $_POST["pic"][$key],
   'pic_page' => unserialize($_POST['pic_page'][$key]),
   'onclick' => $_POST['onclick'][$key],
   'active' => $_POST['active'][$key],
   );

/* $cross_one=array(
   'name' => $value,
   'price' =>  $_POST['price'][$key],
   'pic' => $_POST["pic"][$key],
   'link' => $_POST['link'][$key],
   'onclick' => $_POST['onclick'][$key],
   'active' => $_POST['active'][$key],
   ); */
   $cross[$_POST['dir'][$key]]=$cross_one;
   
}
$current=json_encode($cross);
  // echo("<br>-------------<br>");
  // print_r($current);
   file_put_contents($file, $current);
 header("location: options.php?save=1");
   ?>