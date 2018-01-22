<!doctype html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title><?= TITLE  ?></title>
	<meta name="author" content="GreyGler" />
    <meta name="copyright" content="http://it-senior.pp.ua" />
    <meta name="keywords" content="<?= KEYWORDS ?>">
    <meta name="description" content="<?= DESCRIPTION ?>">
	<meta name="robots" content="<?= ROBOTS ?>">
	<?= favicon::favicons(FAVICON_PATH, FAVICON_G_PATH, FAVICON); // Favicon ?>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">

<meta property="og:title" content="<?= TITLE ?>" />
	<meta property="og:description" content="<?= DESCRIPTION ?>" />
	<meta property="og:site_name" content="<?= DESCRIPTION ?>">
	<meta property="og:type" content="website" />
	<meta property="og:url" content="https://<?= $_SERVER['SERVER_NAME'] ?>" />
	<meta property="og:image" content="https://<?= $_SERVER['SERVER_NAME'] ?>/lshop.png" />
	<meta property="og:image:secure_url" content="http://<?= $_SERVER['SERVER_NAME']."/favicon/favicon.png" ?>">
	<!-- Для товара  -->



	<meta name="twitter:card" content="summary">

	<meta name="twitter:title" content="<?= TITLE ?>">
	<meta name="twitter:description" content="<?= DESCRIPTION ?>">
	<meta name="twitter:image" content="http://<?= $_SERVER['SERVER_NAME']."/favicon/favicon.png" ?>">
	<meta name="twitter:image:width" content="240">
	<meta name="twitter:image:height" content="240">

<style type="text/css">
body{font-family: 'Roboto', sans-serif;}
.thumbnails {margin: -3em 0 0 -2em; text-align: center;}
.thumbnail {text-decoration: none; display: -moz-inline-box; display: inline-block; vertical-align: top;text-align: left; margin: 3em 0 0 2em;}
.thumbnail .r {width: 14em; float: left;}
.img_cross{max-width: 200px;}
</style>
</head>
<body>
	

<center><h1><?= TITLE  ?> </h1></center>
<div class="thumbnails">
<? 
 $file = 'config.json';
$json = file_get_contents($file);
$obj = json_decode($json, TRUE);
if ($obj!="") foreach($obj as $key => $value) if ($value['active']=='1') {?>
    <ins class="thumbnail">
        <div class="r">
            <a onclick="<?= $value['oncklick'] ?>" href="/<?= $value['dir'] ?><?='?utm_source='.$_GET['utm_source'].'&utm_medium='.$_GET['utm_medium'].'&utm_term='.$_GET['utm_term'].'&utm_content='.$_GET['utm_content'].'&utm_campaign='.$_GET['utm_campaign']; ?>"><img class="img_cross" src="img/<?= $value['pic'] ?>" alt="<?= $value['name'] ?>"></a><br />
           <a onclick="<?= $value['oncklick'] ?>" href="/<?= $value['dir'] ?><?='?utm_source='.$_GET['utm_source'].'&utm_medium='.$_GET['utm_medium'].'&utm_term='.$_GET['utm_term'].'&utm_content='.$_GET['utm_content'].'&utm_campaign='.$_GET['utm_campaign']; ?>"><?= $value['name'] ?></a> 
        </div>
    </ins>
<? }?>
</div>
</body>
</html>