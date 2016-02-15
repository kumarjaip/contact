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
        <h1>Update Category</h1>
        <p class="marginT10">From here, you can update category info, including category icon and parent category.</p>
        <div class="clear"></div>
        <?php foreach ($icat as $category): ?>
        <?php echo form_open_multipart('categories/do_upload');?>
              <p>
                <label>Category Name:</label><br />
                <input type="text" name="cat_name" id="cat_name" class="text small" value="<?php echo $category->category_name; ?>">
              </p>
              <p>
                <label>Category Description:</label><br />
                <input type="text" name="cat_desc" id="cat_desc" class="text large" value="<?php echo $category->category_description; ?>">
              </p>
              <p>
                <label>Category Image</label><br />
                <input type="file" name="cat_image" id="cat_image" class="text large">
                <?php if($category->category_image) { ?>
                <img src="<?php echo base_url(); ?>uploads/<?php echo $category->category_image;?>" class="img-rounded center" valign="top" width="35" height="35">
                <?php } ?>
              </p>
              <p>
                <!-- COMBO SELECT BOX -->
                <label for="cbo">Parent Category:</label>
                <select name="parent_cat" id="parent_cat" class="select">
                  <option value="">---Select Any One---</option>
                  <?php
                    if (count($mcat)) {
                        foreach ($mcat as $key => $list) {
                            if($list['category_id'] === $category->main_category) {            
                                echo "<option value='". $list['category_id'] . "' selected>" . $list['category_name'] . "</option>";
                            }else {
                                echo "<option value='". $list['category_id'] . "'>" . $list['category_name'] . "</option>";
                            }    
                        }
                    }
                  ?>
                </select>
              </p>
              <p><input name="btnsubmit" type="submit" class="submit special" value="Update Category"></p>
            </form>
            <?php endforeach; ?>
          </div>
        </div>

<?php include ('template/footer.php'); ?>
