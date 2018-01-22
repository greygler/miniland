<? 
$file = '../config.json';
$current = file_get_contents($file);
$cross = json_decode($current, TRUE);
 ?>
<fieldset>
    <legend><h2>&#160;<i class="fa fa-money"></i>&#160;Добавить офер:&#160; </h2></legend>
	<label for="name">Название: <span></span> <em>*</em></label><input required id="name" type="text" name="name" value="" placeholder="Название офера"></br>
	<label for="name2">Подраздел: <span></span> <em>*</em></label><input required id="name2" type="text" name="name2" value="" placeholder="Подраздел офера"></br>
	<label for="id">ID: <span></span> <em>*</em></label><input required id="id" type="text" name="id" value="" placeholder="ID товара в LP-CRM"></br>
	<label for="dir">Имя папки: <span></span> <em>*</em></label><input required id="dir" type="text" name="dir" value="" placeholder="Имя папки ЛАТИНИЦА И ЦИФРЫ БЕЗ ПРОБЕЛОВ И СИМВОЛОВ!"></br>
	<label for="price">Цена: <span></span> <em>*</em></label><input required id="price" type="text" name="price" value="" placeholder="Цена на офер"></br>
	<label for="pic">Картинка на витрине: <span></span> <em>*</em></label>
	<input id="pic" type="file" name="pic" accept=" image/*" required size="20" required>
	 <!-- <label for="link">Ссылка: <span></span> <em>*</em></label><input required id="link" type="text" name="link" value="" placeholder="Ссылка на офер"></br> -->
	 
	 <label for="pic_page">Картинки на странице: <em>*</em><br><span>Допускается несколько картинок</span> </label>
	<input id="pic_page" type="file" name="pic_page[]" multiple="multiple" accept="image/*" required size="20" required>
	<div id="div">
	<label for="desc">Описание: <em>*</em><br><span></span> </label>
	<center>
	<textarea style="width: 95%;"  name="desc" id="desc" cols="30" rows="10"></textarea></center></div>
	</br>
	
	
	
			
	
	 <label for="onclick">Действие при нажатии: </label><input id="onclick" type="text" name="onclick" value="" placeholder="JS-действие при клике на витрине"></br>
	 <input type="submit" value="&#10004; Добавить">
	 <input type="hidden" name="json" value='<?= $current ?>'>
	  </fieldset>
	</form>
<form class="form" action="update_save.php" method="POST">	

	  
	
	
 
  <fieldset>
    <legend><h2>&#160;<i class="fa fa-money"></i>&#160;Существующие офферы:&#160; </h2></legend>
 <table border="1" width="100%">
    <tr>
        <td>#</td>
        <td>Картинка</td>
        <td>Название</td>
       <!-- <td>Ссылка</td>
        <td>Действие</td>-->
        <td>Активность</td> 
    </tr>
	<? $i=1; foreach($cross as $key => $cross_one) {
		//print_r($cross_one['pic_page']);
		$pic_page=serialize($cross_one['pic_page']);	?>
    <tr>
        <td><?= $i ?></td>
        <td><img width="100" src="../img/<?= $cross_one['pic'] ?>" alt="<?= $cross_one['name'] ?>"> 
		<input type="hidden" name="pic[<?= $key ?>]" value="<?= $cross_one['pic'] ?>">
		
		<input type="hidden" name="pic_page[<?= $key ?>]" value='<?= $pic_page ?>'>
		
		</td>
        <td><label style="text-align: left" for="name_<?= $key ?>">Название: <span></span> <em>*</em></label><input id="name_<?= $key ?>" type="text" name="name[<?= $key ?>]" value="<?= $cross_one['name'] ?>"></br>
		<label style="text-align: left" for="name2_<?= $key ?>">Подраздел: <span></span> <em>*</em></label><input id="name2_<?= $key ?>" type="text" name="name2[<?= $key ?>]" value="<?= $cross_one['name2'] ?>"></br>
		<label for="id_<?= $key ?>">ID: <span></span> <em>*</em></label><input required id="id_<?= $key ?>" type="text" name="id[<?= $key ?>]" value="<?= $cross_one['id'] ?>" placeholder="ID товара в LP-CRM"></br>
		<label style="text-align: left" for="dir_<?= $key ?>">Имя папки: <span></span> <em>*</em></label>
        <input id="dir_<?= $key ?>" style="text-align: left" type="text" name="dir[<?= $key ?>]" value="<?= $cross_one['dir'] ?>"></a></br>
		<label style="text-align: left" for="price_<?= $key ?>">Цена: <span></span> <em>*</em></label><input type="text" name="price[<?= $key ?>]" value="<?= $cross_one['price'] ?>"></br>
		<label for="desc_<?= $key ?>">Описание: <em>*</em><br><span></span> </label>
	<center>
	<textarea style="width: 95%;" name="desc[<?= $key ?>]" id="desc_<?= $key ?>" cols="30" rows="10"><?= $cross_one['desc']; ?></textarea></center><br>
		<label style="text-align: left" for="onclick_<?= $key ?>">Действие при нажатии: </label>
        <input id="onclick_<?= $key ?>"type="text" name="onclick[<?= $key ?>]" value="<?= $cross_one['onclick'] ?>"></br></br></td>
        <td><input type="checkbox" name="active[<?= $key ?>]" value="1" <? if ($cross_one['active']=='1') echo("checked") ?>></td>
    </tr>
    <? $i++; } ?>
</table>
</fieldset>