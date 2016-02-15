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
        <h1>Website Setting</h1>
        <p class="marginT10">You can configure global variables for the entire application. You can change admin password, website title, email address etc.</p>
        <div class="clear"></div>
        <?php foreach($error as $notice) { echo "<p class='error'>".$notice."</p>"; } ?>
        <?php echo form_open_multipart('dashboard/setting');?>
        <p><label>Password:</label><br />
           <input type="password" name="changepwd" id="changepwd" class="text small"></p>
        <p><label>Confirm Password:</label><br />
           <input type="password" name="confrmpwd" id="confrmpwd" class="text large"></p>
        <h2 class="borderBottom">Other Setting</h2>
        <p><label>Category Image</label><br />
           <input type="file" name="cat_image" id="cat_image" class="text large"></p>
        <p><input name="btnsubmit" type="submit" class="submit special" value="Submit"></p>
        <?php echo form_close(); ?>
    </div>
</div>

<?php include ('template/footer.php'); ?>