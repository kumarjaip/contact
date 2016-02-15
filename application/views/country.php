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
    <h1>Manage Country</h1>
    <p class="marginT10 valid" id="delmsg"></p>
    <p class="marginT10">You can manage i.e. Add, update and delete the country. There is also some other activity you can do like search, pagination, sorting etc. To add new country<a href="<?php echo site_url('country/create'); ?>" class="valid">Click Here</a></p>
    <div class="clear"></div>
    <div class="tableBox marginT10">
        <div class="tableHeading">
            <div class="wd30 floatL marginL10">#</div>
            <div class="wd400 floatL marginL10">Country Name</div>
            <div class="wd100 floatL marginL10">Country Code</div>
            <div class="wd200 floatR marginL10">Action</div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>

        <?php if ($max_cont) : ?>

            <?php $i = ($cur_conpage != 0 || $cur_conpage) ? (($cur_conpage - 1) * 5) : 0; ?>

            <?php foreach ($managecountry as $country) : ?>

                <?php $tcss = ($i % 2 == 0) ? "" : "odd"; ?>

                <div class="row <?php echo $tcss; ?>">
                    <div class="wd30 floatL marginL10"><?php echo ($i + 1); ?></div>
                    <div class="wd400 floatL marginL10"><?php echo $country['country_name'] ?></div>
                    <div class="wd100 floatL marginL10"><?php echo $country['country_code'] ?></div>
                    <div class="wd200 floatR marginL10">
                        <a class="icon fa-lock fa-lg" data-id="<?php echo $country['id'] ?>"></a> 
                        <a class="icon fa-pencil-square-o fa-lg" href="#"></a>  
                        <a class="icon fa-times fa-lg deletePost" data-url="<?php echo site_url('cms/deletepage'); ?>" data-id="<?php echo $country['id'] ?>"></a>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>

                <?php $i++; ?>
            <?php endforeach; ?>
            <div class="floatL marginT15">`Showing <?php echo count($managecountry); ?> out of <?php echo $this->country_m->get_count_country(); ?></div>
            <?php echo $this->pagination->create_links(); ?>

            <div class="clear"></div>

        <?php else : ?>
            <div class="row">
                <h4>Sorry, no any records found!</h4>
            </div>
        <?php endif; ?>


    </div>
</div>

<?php
include ('template/footer.php');
?>