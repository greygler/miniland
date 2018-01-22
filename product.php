<? 
$file = 'config.json';
$current = file_get_contents($file);
$cross = json_decode($current, TRUE);
//print_r($cross);
$product=$cross[$_GET['id']]['name'];
if ($product=="") header("Location: /");
$product2=$cross[$_GET['id']]['name2'];;
$price=$cross[$_GET['id']]['price'];
$pic_page=$cross[$_GET['id']]['pic_page'];
$id=$cross[$_GET['id']]['id']; ?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $product ?> <?= $product2 ?></title>
	<meta name="author" content="GreyGler" />
    <meta name="copyright" content="http://it-senior.pp.ua" />
    <meta name="keywords" content="<?= KEYWORDS ?>">
    <meta name="description" content="<?= DESCRIPTION ?>">
	<meta name="robots" content="<?= ROBOTS ?>">
	<?= favicon::favicons(FAVICON_PATH, FAVICON_G_PATH, FAVICON); // Favicon ?>
	<?// favicon::favicons('favicon', 'favicon', FAVICON); // Favicon ?>
	<meta property="og:title" content="<?= TITLE ?>" />
	<meta property="og:description" content="<?= DESCRIPTION ?>" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="http://<?= $_SERVER['SERVER_NAME'] ?>" />
	<meta property="og:image" content="http://<?= $_SERVER['SERVER_NAME']."/favicon/favicon.png" ?>" />
	
		
	<!-- Для товара  -->
	<meta property="og:price:amount" content="<?= $price ?>">
	<meta property="og:price:currency" content="UAH">


	<meta name="twitter:card" content="summary">

	<meta name="twitter:title" content="<?= TITLE ?>">
	<meta name="twitter:description" content="<?= DESCRIPTION ?>">
	<meta name="twitter:image" content="http://<?= $_SERVER['SERVER_NAME']."/favicon/favicon.png" ?>">
	<meta name="twitter:image:width" content="240">
	<meta name="twitter:image:height" content="240">

    <!-- Bootstrap -->
    <link href="<?= CSS_PATH ?>/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Alegreya+Sans|Play|Russo+One" rel="stylesheet">
	<link rel="stylesheet" href="<?= CSS_PATH ?>/font-awesome.min.css">
	<!-- <link rel="stylesheet" href="<?= CSS_PATH ?>/css/main.css" /> -->
	<link rel="stylesheet" href="<?= CSS_PATH ?>/main.css" />
	<link rel="stylesheet" href="<?= CSS_PATH ?>/slick.css" />
	<link rel="stylesheet" href="<?= CSS_PATH ?>/slick-theme.css" />
	<link rel="stylesheet" type="text/css" href="<?= CSS_PATH ?>/jquery.fancybox.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <div class="container">
  <div class="col-md-10 col-lg-10">
    <div class="page-header">
		<h1><?= $product ?><br><small><?= $product2 ?></small></h1>
	</div>
	</div>
	 <div class="col-md-2 col-lg-2"><div class="phone text-right"><a class="" href="tel:<?= preg_replace('~[^0-9]+~','',$contact_phone1) ?>"><?= $contact_phone1 ?></a></div></div>
</div>
<div class="container"> 
<div class="col-md-4 col-lg-4">
<div class="text-center">
<div class="slider slider-for ">
<? foreach($pic_page as $key => $value) { ?>
					<div><a href="img/<?= $value ?>" data-fancybox="images" data-caption="<?= TITLE ?>"><img class="img-thumbnail" src="img/<?= $value ?>"></a></div>
					
<? } ?>
					
				</div><br>
				<div class="slider slider-nav"> <? foreach($pic_page as $key => $value) { ?>
					<div><img class="img-thumbnail" src="img/<?= $value ?>"></div>
					<? } ?>
					
					
					</div>
				
</div>
</div>
<div class="col-md-4 col-lg-4 thumbnail"><?= $cross[$_GET['id']]['desc'] ?>
</div>
<div class="col-md-4 col-lg-4">
<form id="order" class="jumbotron" role="form" action="zakaz.php" method="POST"  onsubmit="if(name.value==''){alert('Введите Ваше имя');return false}if(phone.value==''){alert('Введите Ваш номер телефона');return false}return true;">
<fieldset>
    <legend>Цена: <?= $price ?> грн.</legend>
<div class="form-group">
<div class="input-group">
<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
<input type="text" class="form-control" name="name" placeholder="Ваше имя" required>
</div></div> 
<div class="form-group">
<div class="input-group">
<span class="input-group-addon"><span class="glyphicon glyphicon-earphone"></span></span>
<input type="tel" class="form-control" name="phone" placeholder="Ваш телефон" required>
</div></div>
<span class="help-block text-right"><small>В ближайшее время с Вами свяжется наш оператор для уточнения деталей</small></span>
<div class="form-group text-center">
<input class="form-control btn btn-primary" type="submit" value="Заказать со скидкой">
</div>
<input type="hidden" name="id" value="<?= $id ?>">
<input type="hidden" name="price" value="<?= $price ?>">
<input type="hidden" name="comment" value="<?= $product2 ?>">
<input type="hidden" name="product" value="<?= $product ?> <?= $product2 ?> ">
</fieldset>
</form>
</div>

</div>
<!--
<div class="container"> 
<div class="col-md-12 col-lg-12">
<div class="thumb-wrap">
            <iframe width="1280" height="720" src="https://www.youtube.com/embed/TTD6GpomKD8?rel=0" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe> 
        </div>
 </div>
<div class="col-md-6 col-lg-6"> 
<div class="thumb-wrap">
            <iframe width="854" height="480" src="https://www.youtube.com/embed/TTD6GpomKD8" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
        </div>
</div> 
<div class="col-md-4 col-lg-4"> 
<div class="thumb-wrap">
            <iframe width="854" height="480" src="https://www.youtube.com/embed/TTD6GpomKD8" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe> 
        </div> 
</div>
</div>-->

<div class="text-center">
<a href="#order" class="scrollto btn btn-primary">Заказать со скидкой</a>
</div>
<div class="sn text-center">Поделится в соцсетях:<div class="text-center share42init"></div></div>
	<footer class="footer text-center">
	 <div class="container">
	  <div class="confident-link">Политика конфиденциальности</div>
	 <p>&copy; <?= date("Y"); ?> <?= $seller ?> <?= $_SERVER['SERVER_NAME'] ?><br><?= $seller_adress ?>, <a class="aphone" href="tel:<?= preg_replace('~[^0-9]+~','',$contact_phone1) ?>"><?= $contact_phone1 ?></a></p>
	 <!--
	<div class="text-right"><small>Разработчик: GreyGler</small></div> -->
	 </div>
 </footer>
     <div class="hidden-conf">
            <div class="conf-overlay close-conf"></div>
            <div class="conf-info">
                <div class="conf-head">Политика конфиденциальности</div>
                <h5>Защита личных данных</h5>
                <p>Для защиты ваших личных данных у нас внедрен ряд средств защиты, которые действуют при введении, передаче или работе с вашими личными данными.</p>
                <h5>Разглашение личных сведений и передача этих сведений третьим лицам</h5>
                <p>Ваши личные сведения могут быть разглашены нами только в том случае это необходимо для: (а) обеспечения соответствия предписаниям закона или требованиям судебного процесса в нашем отношении ; (б) защиты наших прав или собственности (в) принятия срочных мер по обеспечению личной безопасности наших сотрудников или потребителей предоставляемых им услуг, а также обеспечению общественной безопасности. Личные сведения, полученные в наше распоряжение при регистрации, могут передаваться третьим организациям и лицам, состоящим с нами в партнерских отношениях для улучшения качества оказываемых услуг. Эти сведения не будут использоваться в каких-либо иных целях, кроме перечисленных выше. Адрес электронной почты, предоставленный вами при регистрации может использоваться для отправки вам сообщений или уведомлений об изменениях, связанных с вашей заявкой, а также рассылки сообщений о происходящих в компании событиях и изменениях, важной информации о новых товарах и услугах и т.д. Предусмотрена возможность отказа от подписки на эти почтовые сообщения.</p>
                <h5>Использование файлов «cookie»</h5>
                <p>Когда пользователь посещает веб-узел, на его компьютер записывается файл «cookie» (если пользователь разрешает прием таких файлов). Если же пользователь уже посещал данный веб-узел, файл «cookie» считывается с компьютера. Одно из направлений использования файлов «cookie» связано с тем, что с их помощью облегчается сбор статистики посещения. Эти сведения помогают определять, какая информация, отправляемая заказчикам, может представлять для них наибольший интерес. Сбор этих данных осуществляется в обобщенном виде и никогда не соотносится с личными сведениями пользователей.</p>
                <p>Третьи стороны, включая компании Google, показывают объявления нашей компании на страницах сайтов в Интернете. Третьи стороны, включая компанию Google, используют cookie, чтобы показывать объявления, основанные на предыдущих посещениях пользователем наших вебсайтов и интересах в веб-браузерах. Пользователи могут запретить компаниям Google использовать cookie. Для этого необходимо посетить специальную страницу компании Google по этому адресу: http://www.google.com/privacy/ads/</p>
                <h5>Изменения в заявлении о соблюдении конфиденциальности</h5>
                <p>Заявление о соблюдении конфиденциальности предполагается периодически обновлять. При этом будет изменяться дата предыдущего обновления, указанная в начале документа. Сообщения об изменениях в данном заявлении будут размещаться на видном месте наших веб-узлов</p>
                <p class="s1">Благодарим Вас за проявленный интерес к нашей системе! </p>
                <div class="close-conf closeconf-but"></div>
            </div>
        </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?= JS_PATH ?>bootstrap.min.js"></script>
	<script type="text/javascript" src="<?= JS_PATH ?>slick.min.js"></script>
    <script src="<?= JS_PATH ?>jquery.fancybox.min.js"></script>
	<script type="text/javascript" src="<?= JS_PATH ?>share42.js"  data-url="http://<?= $_SERVER['SERVER_NAME'] ?>" data-title="<?= TITLE ?>" data-image="http://<?= $_SERVER['SERVER_NAME']."/img/".$cross[$_GET['id']]['pic']; ?>" data-description="<?= DESCRIPTION ?>" ></script>
	<script> 
		 $('.slider-for').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: true,
  fade: true,
  asNavFor: '.slider-nav'
});
$('.slider-nav').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  asNavFor: '.slider-for',
  dots: true,
  centerMode: true,
  focusOnSelect: true
});
	</script>
  
  <script> 
  $(document).ready(function() {
  $("a.scrollto").click(function() {
    var elementClick = $(this).attr("href")
    var destination = $(elementClick).offset().top;
    jQuery("html:not(:animated),body:not(:animated)").animate({
      scrollTop: destination
    }, 800);
    return false;
  });
});
  
  </script>


	<script>
	 $(document).ready(function(){ 
        $('.confident-link').click(function(){$('.hidden-conf').show();if($(window).height() < 760){$('.conf-info').css({'height':  ($(window).height()-120),'overflow-y': 'scroll'});};});
        $('.close-conf').click(function(){$('.hidden-conf').hide();});
  });
  </script>
  </body>
</html>