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
        <h1>Add Category</h1>
        <p class="marginT10">From here, you can create/add new category into the database.</p>
        <div class="clear"></div>
        <?php foreach($error as $notice) { echo "<p class='error'>".$notice."</p>"; } ?>
        <?php echo form_open_multipart('categories/do_upload');?>
              <p>
                <label>Category Name:</label><br />
                <input type="text" name="cat_name" id="cat_name" class="text small">
                <span class="valid">This is a validation message</span> </p>
              <p>
                <label>Category Description:</label><br />
                <input type="text" name="cat_desc" id="cat_desc" class="text large">
                <span class="error">This is an error message</span> </p>
              <p>
                <label>Category Image</label><br />
                <input type="file" name="cat_image" id="cat_image" class="text large">
              </p>
              <p>
                <!-- COMBO SELECT BOX -->
                <label for="cbo">Parent Category:</label>
                <select name="parent_cat" id="parent_cat" class="select">
                  <option value="">---Select Any One---</option>
                  <?php
                    if (count($mcat)) {
                        foreach ($mcat as $key => $list) {
                            echo "<option value='". $list['category_id'] . "'>" . $list['category_name'] . "</option>";
                        }
                    }
                  ?>
                </select>
              </p>
              <p><input name="btnsubmit" type="submit" class="submit special" value="Create Category"></p>
            </form>
          </div>
        </div>

<?php include ('template/footer.php'); ?>
