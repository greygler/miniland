<? session_start();
include('config.php');

$header="Content-type: text/html;charset=utf-8\r\nFrom: {$sender}\r\n";
$name = stripslashes(htmlspecialchars($_POST['name']));
$phone = stripslashes(htmlspecialchars($_POST['phone']));
$product = stripslashes(htmlspecialchars($_POST['product']));
$price = stripslashes(htmlspecialchars($_POST['price']));
$id = stripslashes(htmlspecialchars($_POST['id']));
$comment = stripslashes(htmlspecialchars($_POST['comment']));
$_SESSION['name']=$name;
$_SESSION['phone']=$phone;
$sender = "{$product} <noreply@{$_SERVER['HTTP_HOST']}>";
$subject = "Заказ товара - {$product}";

if(empty($phone)){
echo '<h1 style="color:red;">Пожалуйста заполните все поля</h1>';
echo '<meta http-equiv="refresh" content="2; url=http://'.$_SERVER['SERVER_NAME'].'">';
}
else{
	
	// формируем массив с товарами в заказе (если товар один - оставляйте только первый элемент массива)
$products_list = array(
    1 => array( 
            'product_id' => $id,    //код товара (из каталога CRM)
            'price'      => $price, //цена товара 1
            'count'      => '1'                      //количество товара 1
    ),  
    
);
$products = urlencode(serialize($products_list));
 
// параметры запроса
$data = array(
    'key'             => CRM_KEY, //Ваш секретный токен
    'order_id'        => number_format(round(microtime(true)*10),0,'.',''), //идентификатор (код) заказа (*автоматически*)
    'country'         => 'UA',                      // Географическое направление заказа
    'office'          => '1',                   // Офис (id в CRM)
    'products'        => $products,                 // массив с товарами в заказе
    'bayer_name'      => $name,             // покупатель (Ф.И.О)
    'phone'           => $phone,           // телефон
    'comment'         => $comment,    // комментарий
    'site'            => $_SERVER['SERVER_NAME']."/termos/",  // сайт отправляющий запрос
    'ip'              => $_SERVER['REMOTE_ADDR'],  // IP адрес покупателя
    'delivery'        => '1',        // способ доставки (id в CRM)
    'delivery_adress' => $_GET['delivery_adress'], // адрес доставки
    'payment'         => '4',          // вариант оплаты (id в CRM)
    'utm_source'      => $_SESSION['utms']['utm_source'],  // utm_source 
    'utm_medium'      => $_SESSION['utms']['utm_medium'],  // utm_medium 
    'utm_term'        => $_SESSION['utms']['utm_term'],    // utm_term   
    'utm_content'     => $_SESSION['utms']['utm_content'], // utm_content    
    'utm_campaign'    => $_SESSION['utms']['utm_campaign'] // utm_campaign
);
 
// запрос
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'http://'.CRM.'.lp-crm.biz/api/addNewOrder.html');
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
$out = curl_exec($curl);
curl_close($curl);
//$out – ответ сервера в формате JSON
$jout=json_decode($out); $m1=$jout -> status; foreach($jout ->message as $val) { $m2=$m2.$val; } $mess="Ответ LP-СРМ: {$m1},\nСообщение: {$m2}";	
	
$success_url = 'form-ok.php';

$message = "<table border=\"0\">
<tr><td colspan=\"2\" ><b>Товар:</b><font size=\"5\" color=\"#FF0000\"> {$product}</font></td></tr><tr><td><b>Цена:&nbsp; </b></td><td >{$price} грн.</td></tr>

<tr><td ><b>Покупатель:</b></td><td>{$name}</td></tr><tr><td ><b>Телефон: </b></td><td>{$phone}</td></tr><tr><td ><b>Сайт продажи:</b></td><td>{$_SERVER['HTTP_HOST']}</td></tr>
<tr><td ><b>Время: </b></td><td>".date('m.d.Y H:i:s')."</td></tr><tr></table>
<table border='0'><td colspan='2' height='40' ><p align='center'><i>Информация о покупателе:</i></td></tr><tr><td><b>IP покупателя:</b></td><td>{$_SERVER['REMOTE_ADDR']}</td></tr>

<tr><td><b>Реферер:</b></td><td>{$_SESSION['server']['referer']}</td></tr><tr><td colspan='2'><p align='center'><b>UTM-метки: </b></p>\nutm_source= {$_POST['utm_source']}\nutm_medium= {$_POST['utm_medium']}\nutm_term= {$_POST['utm_term']}\nutm_content= {$_POST['utm_content']}\nutm_campaign={$_POST['utm_campaign']} </td></tr></table>{$mess}";
$verify = mail($email,$subject,$message,$header);
if ($verify == 'true'){
    header('Location: '.$success_url);
    echo '<h1 style="color:green;">Поздравляем! Ваш заказ принят!</h1>';
    exit;
}
else 
    {
    echo '<h1 style="color:red;">Произошла ошибка!</h1>';
    }
}
?>