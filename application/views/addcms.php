<?php
/*
 * Created on Jan 21, 2016
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

include ('template/header.php');

?>

<div class="wdFull marginT10">
	<div class="block marginT10">
		<h1>Add New Page</h1>
        <p class="marginT10">Forms are great for collecting informatoin or simply for use in your web application. With Reality Admin, you get stylish form elements ready to use straight out the box. They're already skinned, pre-sized adn formatted for you so you can simply get on and use them as you choose. </p>
        <div class="clear"></div>
        <?php echo form_open('cms/create') ?>
			<p><label>Page Title:</label><br><input type="text" name="title" id="title" class="text small"></p>
			<p><label>Page Content:</label><br><textarea cols="8" rows="5" name="body" id="body"></textarea></p>
			<p><input type="submit" class="submit special" name="button" value="Submit"></p>
		</form>
	</div>
</div>

<?php

include ('template/footer.php');

?>