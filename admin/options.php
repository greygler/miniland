<? 
session_start();
include ("logins.php");
if (($_SESSION['login']==$login) AND ($_SESSION['password'])==$password) { ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
  <head>
    <? include("head.php") ?>
 <style>
.form{width: 850px; margin: <? if ($_POST['product']=="password") echo "100px"; else echo("0"); ?> auto auto auto;}
.form input, textarea {width: 549px;}
</style>  

 
  
  <script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
 <script>tinymce.init({
  selector: "textarea",
  height: 150,
  plugins: [
    "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak",
    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
    "table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker textpattern"
  ],
language : "ru",
  toolbar1: "cut copy paste | bold italic underline strikethrough | fontselect fontsizeselect | bullist numlist", 
  toolbar2: "undo redo | link unlink anchor image media code | insertdatetime preview | forecolor backcolor",
   content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i'],

  menubar: false,
  toolbar_items_size: 'small',

  style_formats: [{
    title: 'Bold text',
    inline: 'b'
  }, {
    title: 'Red text',
    inline: 'span',
    styles: {
      color: '#ff0000'
    }
  }, {
    title: 'Red header',
    block: 'h1',
    styles: {
      color: '#ff0000'
    }
  }, {
    title: 'Example 1',
    inline: 'span',
    classes: 'example1'
  }, {
    title: 'Example 2',
    inline: 'span',
    classes: 'example2'
  }, {
    title: 'Table styles'
  }, {
    title: 'Table row 1',
    selector: 'tr',
    classes: 'tablerow1'
  }],

  templates: [{
    title: 'Test template 1',
    content: 'Test 1'
  }, {
    title: 'Test template 2',
    content: 'Test 2'
  }],
  
  init_instance_callback: function () {
    window.setTimeout(function() {
      $("#div").show();
     }, 1000);
  }
});</script>
  </head>
  <body>
  <div class="exit"><a href="exit.php" title="Выйти из конфигуратора."> <i class="fa fa-power-off fa-lg"></i> Выйти</a></div>
 <? $include=$_SESSION['product'].".php";
 $save=$_SESSION['product']."_save.php";
if ($_POST['product']=="password") $th1="Настройки доступа для"; else $th1="Основные настройки для";
 ?>
  <h1><?= $th1."<br><strong>".$_SERVER['SERVER_NAME'] ?></strong></h1>
 
    <form class="form" role="form" action="<?= $save ?>" enctype="multipart/form-data" method="POST">
 <? if ($_GET['save']=='1') echo ('<div class="ok">Данные успешно сохранены!</div>');
include("{$include}") ?>
<p><input class="save" type="submit" value="&#10004; Обновить"></p><br>
</form>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.js"></script>

      </body>
</html>
<? }
else
header("Location: index.php?pass=1"); ?>