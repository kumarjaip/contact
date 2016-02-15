<?php
/*
 * Created on Jan 21, 2016
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

include ('template/header.php');

?>

<div class="block marginT10">
	<h1>Manage Categories</h1>
        <p class="marginT10">You can manage (add, update and delete) the category from here. You can also make the category featured/unfeatured and active/deactive from here. <p>To add new category, <a href="<?php echo site_url('categories/create'); ?>" class="bold">Click Here</a></p>
	<div class="clear"></div>

 	<div class="tableBox marginT10">
 		<div class="tableHeading">
 			<div class="wd30 floatL marginL10"><input name="" type="checkbox" value="" /></div>
 			<div class="wd100 floatL marginL10">CategoryId</div>
			<div class="wd260 floatL marginL10">Category Name</div>
			<div class="wd160 floatL marginL10">Category Image</div>
			<div class="wd260 floatL marginL10">Parent Category</div>
			<div class="wd100 floatL">Action</div>
			<div class="clear"></div>
 		</div>
 		<div class="clear"></div>

 		<?php if ( $max_cats ) : ?>
		<?php $i = 0;	?>
		<?php foreach( $managecat as $catArrs ) : ?>
		<?php $tcss = ($i%2 == 0) ? "" : "odd"; ?>

		<div class="row <?php echo $tcss; ?>">
			<div class="wd30 floatL marginL10"><input name="" type="checkbox" value="" /></div>
			<div class="wd100 floatL marginL10"><?php echo $catArrs['category_id'] ?></div>
			<div class="wd260 floatL marginL10"><?php echo $catArrs['category_name'] ?></div>
			<div class="wd160 floatL marginL10"><?php echo ($catArrs['category_image']!="") ? $catArrs['category_image'] : "NA"; ?></div>
			<div class="wd260 floatL marginL10"><?php 
                        
                        if($catArrs['main_category'] != 0) {
                            $parentCat = $this->store_category->getCategoryById($catArrs['main_category']);
                            echo $parentCat['category_name'];
                        }
                        else {
                            echo "<span class='center'>NA</span>";
                        }
                        ?></div>
			<div class="wd100 floatL ">
                            <?php if($catArrs['isActive'] == 1) {   ?>
                                <a class="icon fa-lock fa-lg status_checks" data-id="<?php echo $catArrs['category_id'] ?>" data-url="<?php echo site_url('categories/status');?>"></a> 
                            <?php }else {    ?>
                                <a class="icon fa-unlock fa-lg status_checks" data-id="<?php echo $catArrs['category_id'] ?>" data-url="<?php echo site_url('categories/status');?>"></a> 
                            <?php } ?>
                                <a class="icon fa-pencil-square-o fa-lg" href="<?php echo site_url('categories/update/'.$catArrs['category_id']);?>"></a>  
                                <a class="icon fa-times fa-lg deleteCat" data-id="<?php echo $catArrs['category_id'] ?>" data-url="<?php echo site_url('categories/deletecat');?>"></a>
                        </div>
			<div class="clear"></div>
		</div>
 		<div class="clear"></div>
 		<?php	$i++ ;?>
		<?php endforeach; ?>
                <div class="floatL marginT15">Showing <?php echo count($managecat);?> out of <?php echo $this->store_category->get_count_category();?> Records</div>
                <div class="floatR pagination marginT15">
                    <ul>
			<li><a href="#" class="side"><img src="<?php echo base_url();?>images/next.png" alt="next" /></a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#" class="pageActive">1</a></li>
			<li><a href="#" class="side"><img src="<?php echo base_url();?>images/prev.png" alt="next" /></a></li>
                    </ul>
                </div>
                <div class="clear"></div>
 		<?php else : ?>
        <div class="row">
          <h4>You have not any contacts added yet!</h4>
        </div>
      	<?php endif; ?>

	</div>
</div>

<?php include ('template/footer.php'); ?>