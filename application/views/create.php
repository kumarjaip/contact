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
		<h1>Form Example</h1>
        <p class="marginT10">Forms are great for collecting informatoin or simply for use in your web application. With Reality Admin, you get stylish form elements ready to use straight out the box. They're already skinned, pre-sized adn formatted for you so you can simply get on and use them as you choose. </p>
        <div class="clear"></div>
        <form action="" method="post">

              <p>
                <label>Small Input Box:</label>
                <br>
                <input type="text" class="text small">
                <span class="valid">This is a validation message</span> </p>
              <p>
                <label>Medium Input Box:</label>
                <br>
                <input type="text" class="text medium">
                <span class="error">This is an error message</span> </p>
              <p>
                <label>Large Input Box</label>
                <br>
                <input type="text" class="text large">
              </p>
              <!-- CHECKBOXES -->
              <p>
                <input type="checkbox" class="checkbox" checked="checked" id="cbdemo1">
                <label for="cbdemo1">Checkbox label</label>
                <input type="checkbox" class="checkbox" id="cbdemo2">
                <label for="cbdemo2">Checkbox label</label>
                <!-- COMBO SELECT BOX -->
                <label for="cbo">Dropdown/Combo Box:</label>
                <select name="cbo" id="cbo" class="select">
                  <option value="One">One</option>
                  <option value="Two">Two</option>
                  <option value="Three">Three</option>
                  <option value="Four">Four</option>
                  <option value="Five">Five</option>
                </select>
              </p>
              <p>
                <label>Text Area Without Editor:</label>
                <br>
                <textarea cols="8" rows="5"></textarea>
              </p>

              <p>
                <input type="submit" class="submit" value="Button">
                <input name="Submit2" type="submit" class="submit" value="Another Button">
                <input name="Reset2" type="submit" class="submit special" value="Special Button">
              </p>
            </form>
          </div>
        </div>

<?php
include ('template/footer.php');
?>
