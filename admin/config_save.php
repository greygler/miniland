<?php
  $file = '../config.json';
$current = file_get_contents($file);
//$current .= $json."\n\n";





   // Проверяем загружен ли файл
   if(is_uploaded_file($_FILES["pic"]["tmp_name"]))
   {
     // Если файл загружен успешно, перемещаем его
     // из временной директории в конечную
	   
	$path_parts = pathinfo($_FILES["pic"]["name"]);
//	echo $path_parts['extension'], "\n";
	$pic=$_POST['dir'].'.'.$path_parts['extension'];
     move_uploaded_file($_FILES["pic"]["tmp_name"], "../img/".$pic);
	// echo("<br>"."../img/".$_POST['dir'].'.'.$path_parts['extension']."<br>");
   } else {
      echo("Ошибка загрузки файла");
   }
   
    // Проверяем загружен ли файл
  
   
     // Если файл загружен успешно, перемещаем его
     // из временной директории в конечную
	   foreach($_FILES["pic_page"]["tmp_name"] as $key => $value)  if(is_uploaded_file($_FILES["pic_page"]["tmp_name"][$key]))
	   {
			$path_parts = pathinfo($_FILES["pic_page"]["name"][$key]);
//	echo $path_parts['extension'], "\n";
	$pic_page[$key]=$_POST['dir']."_".$key.'.'.$path_parts['extension'];
     move_uploaded_file($_FILES["pic_page"]["tmp_name"][$key], "../img/".$pic_page[$key]);
	//  echo("<br>"."../img/".$_POST['dir'].'.'.$path_parts['extension']."<br>");
	   }
    else {
      echo("Ошибка загрузки файла");
   }
   
 
   

   
   $cross_one=array(
   'name' => $_POST['name'],
   'name2' => $_POST['name2'],
   'id' => $_POST['id'],
   
   
   'dir' => $_POST['dir'],
   'price' => $_POST['price'],
   'desc' => $_POST['desc'],
   'pic' => $pic,
   'pic_page' => $pic_page,
   'onclick' => $_POST['onclick'],
   'active' => '1',
   );
  // echo $_POST['json'];
  //  echo("<br>-------------<br>");
   $cross=json_decode($_POST['json'], true);
  // print_r($cross);
   $cross[$_POST['dir']]=$cross_one;
   $current=json_encode($cross);
  // echo("<br>-------------<br>");
   //print_r($current);
   file_put_contents($file, $current);
  header("location: options.php?save=1");
?>