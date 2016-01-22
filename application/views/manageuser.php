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
	<h1>Admin/Staff Users</h1>
	<p class="marginT10">Praesent eget euismod enim. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Quisque sed justo non lacus mollis viverra nec id lacus. Pellentesque a lorem ipsum, id placerat lacus. </p>
	<div class="clear"></div>

 	<div class="tableBox marginT10">
 		<div class="tableHeading">
 			<div class="wd30 floatL marginL10"><input name="" type="checkbox" value="" /></div>
 			<div class="wd200 floatL marginL10">Full Name</div>
			<div class="wd260 floatL marginL10">Primary Email</div>
			<div class="wd130 floatL marginL10">Primary Phone</div>
			<div class="wd120 floatL marginL10">Team/Group</div>
			<div class="wd100 floatL">Updated On</div>
			<div class="clear"></div>
 		</div>
 		<div class="clear"></div>

 		<?php if ( $max_users ) : ?>
		<?php $i = 0;	?>
		<?php foreach( $manageuser as $users ) : ?>
		<?php $tcss = ($i%2 == 0) ? "" : "odd"; ?>

		<div class="row <?php echo $tcss; ?>">
			<div class="wd30 floatL marginL10"><input name="" type="checkbox" value="" /></div>
			<div class="wd200 floatL marginL10"><?php echo $users['fullName'] ?></div>
			<div class="wd260 floatL marginL10"><?php echo $users['email'] ?></div>
			<div class="wd130 floatL marginL10"><?php echo ($users['phone']!="") ? $users['phone'] : "NA"; ?></div>
			<div class="wd120 floatL marginL10"><?php echo $users['isAdmin'] ?></div>
			<div class="wd100 floatL "><?php echo $users['updated'] ?></div>
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

<?php include ('template/footer.php'); ?>