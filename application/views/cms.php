<?php
/*
 * Created on Jan 22, 2016
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

include ('template/header.php');

?>
<div class="block marginT10">
	<h1>CMS Page List</h1>
	<p class="marginT10">Praesent eget euismod enim. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Quisque sed justo non lacus mollis viverra nec id lacus. Pellentesque a lorem ipsum, id placerat lacus. </p>
	<div class="clear"></div>

 	<div class="tableBox marginT10">
 		<div class="tableHeading">
 			<div class="wd30 floatL marginL10"><input name="" type="checkbox" value="" /></div>
 			<div class="wd220 floatL marginL10">Page Name</div>
			<div class="wd150 floatL marginL10">Slug</div>
			<div class="wd130 floatL marginL10">Created On</div>
			<div class="wd120 floatL marginL10">Status</div>
			<div class="wd200 floatL marginL10">Action</div>
			<div class="clear"></div>
 		</div>
 		<div class="clear"></div>

 		<?php if ( $max_cmspage ) : ?>
		<?php $i = 0;	?>
		<?php foreach( $managecms as $pages ) : ?>
		<?php $tcss = ($i%2 == 0) ? "" : "odd"; ?>
		<?php $acss = ($pages['isActive'] == 1) ? "valid" : "error"; ?>

		<div class="row <?php echo $tcss; ?>">
			<div class="wd30 floatL marginL10"><input name="" type="checkbox" value="" /></div>
			<div class="wd220 floatL marginL10"><?php echo $pages['title'] ?></div>
			<div class="wd150 floatL marginL10"><?php echo ($pages['slug']!="") ? $pages['slug'] : "--" ?></div>
			<div class="wd130 floatL marginL10"><?php echo ($pages['dateCreated']!="") ? $pages['dateCreated'] : "NA"; ?></div>
			<div class="wd120 floatL marginL10"><span class="<?php echo $acss; ?>"><?php echo ($pages['isActive'] == 1) ? "Active" : "Deactive" ?></span></div>
			<div class="wd200 floatL marginL10">[UPDATE]  [DELETE]</div>
			<div class="clear"></div>
		</div>
 		<div class="clear"></div>
 		<?php	$i++ ;?>
		<?php endforeach; ?>
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

<?php
include ('template/footer.php');
?>