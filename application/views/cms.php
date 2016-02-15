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
    <p class="marginT10 valid" id="delmsg"></p>
    <p class="marginT10">You can manage i.e. Add, update and delete the records. There is also some other activity you can do like search, pagination, sorting etc. To add new page<a href="<?php echo site_url('cms/create'); ?>" class="valid">Click Here</a></p>
    <div class="clear"></div>
    <div class="tableBox marginT10">
        <div class="tableHeading">
            <div class="wd30 floatL marginL10">#</div>
            <div class="wd200 floatL marginL10">Page Name</div>
            <div class="wd160 floatL marginL10">Slug</div>
            <div class="wd180 floatL marginL10">Template</div>
            <div class="wd100 floatL marginL10">Created On</div>
            <div class="wd100 floatL marginL10">Status</div>
            <div class="wd120 floatL marginL10">Action</div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>

        <?php if ($max_cmspage) : ?>

            <?php $i = ($cur_cmspage != 0 || $cur_cmspage) ? (($cur_cmspage - 1) * 5) : 0; ?>

            <?php foreach ($managecms as $pages) : ?>

                <?php $tcss = ($i % 2 == 0) ? "" : "odd"; ?>
                <?php $acss = ($pages['isActive'] == 1) ? "valid" : "error"; ?>

                <div class="row <?php echo $tcss; ?>">
                    <div class="wd30 floatL marginL10"><?php echo ($i + 1); ?></div>
                    <div class="wd200 floatL marginL10"><?php echo $pages['title'] ?></div>
                    <div class="wd160 floatL marginL10"><?php echo ($pages['slug'] != "") ? $pages['slug'] : "--" ?></div>
                    <div class="wd180 floatL marginL10"><?php echo ($pages['template'] != "") ? $pages['template'] : "--" ?></div>
                    <div class="wd100 floatL marginL10"><?php echo ($pages['dateCreated'] != "") ? $pages['dateCreated'] : "NA"; ?></div>
                    <div class="wd100 floatL marginL10"><span class="<?php echo $acss; ?>"><?php echo ($pages['isActive'] == 1) ? "Active" : "Deactive" ?></span></div>
                    <div class="wd120 floatL marginL10"><a class="icon fa-lock fa-lg" data-id="<?php echo $pages['id'] ?>"></a> <a class="icon fa-pencil-square-o fa-lg" href="#"></a>  <a class="icon fa-times fa-lg deletePost" data-url="<?php echo site_url('cms/deletepage'); ?>" data-id="<?php echo $pages['id'] ?>"></a></div>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>

                <?php $i++; ?>
            <?php endforeach; ?>
            Showing <?php echo $i; ?> of <?php $total_count; ?>
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