<?php
/*
 * Created on Jan 21, 2016
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

include ('template/header.php');
?>

<section class="content">

    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>150</h3>
                    <p>New Orders</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>53<sup style="font-size: 20px">%</sup></h3>
                    <p>Cash Back</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>44</h3>
                    <p>User Registrations</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>65</h3>
                    <p>Unique Visitors</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->
    </div><!-- /.row -->

</section>
<div class="clear"></div>
<div class="block marginT10">
    <h1>Contacts List</h1>
    <p class="marginT10">Praesent eget euismod enim. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Quisque sed justo non lacus mollis viverra nec id lacus. Pellentesque a lorem ipsum, id placerat lacus. </p>
    <div class="clear"></div>

    <div class="tableBox marginT10">
        <div class="tableHeading">
            <div class="wd30 floatL marginL10"><input name="" type="checkbox" value="" /></div>
            <div class="wd165 floatL marginL10">First Name</div>
            <div class="wd220 floatL marginL10">Last Name</div>
            <div class="wd260 floatL marginL10">Primary Email</div>
            <div class="wd130 floatL marginL10">Primary Phone</div>
            <div class="wd100 floatL">Updated On</div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>

        <?php if ($max_contacts) : ?>
            <?php $i = 0; ?>
            <?php foreach ($contacts as $contact) : ?>
                <?php $tcss = ($i % 2 == 0) ? "" : "odd"; ?>

                <div class="row <?php echo $tcss; ?>">
                    <div class="wd30 floatL marginL10"><input name="" type="checkbox" value="" /></div>
                    <div class="wd165 floatL marginL10"><?php echo $contact['fullName'] ?></div>
                    <div class="wd220 floatL marginL10"><?php echo $contact['company'] ?></div>
                    <div class="wd260 floatL marginL10"><?php echo $contact['primaryemail'] ?></div>
                    <div class="wd130 floatL marginL10"><?php echo ($contact['bphone'] != "") ? $contact['bphone'] : "NA"; ?></div>
                    <div class="wd100 floatL "><?php echo $contact['dateupdate'] ?></div>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
                <?php $i++; ?>
            <?php endforeach; ?>
            <div class="floatR pagination marginT15">
                <ul>
                    <li><a href="#" class="side"><img src="<?php echo base_url(); ?>images/next.png" alt="next" /></a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#" class="pageActive">1</a></li>
                    <li><a href="#" class="side"><img src="<?php echo base_url(); ?>images/prev.png" alt="next" /></a></li>
                </ul>
            </div>
            <div class="clear"></div>
        <?php else : ?>
            <div class="row">
                <h4>Currently not any user registered with the application!</h4>
            </div>
        <?php endif; ?>

    </div>
</div>

<?php
include ('template/footer.php');
?>