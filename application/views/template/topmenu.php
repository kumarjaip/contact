<?php
/*
 * Created on Jan 21, 2016
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<!-- Menu Start -->
<div class="menu marginT15">
    <ul>
        <li><a href="<?php echo site_url('dashboard/show_main'); ?>" class="active">Dashboard</a></li>
        <li><a href="<?php echo site_url('users/manage'); ?>">Manage Users</a></li>
        <li><a href="<?php echo site_url('orders/manage'); ?>">Manage Orders</a>
            <div class="submenu">
                <ul>
                    <li><a href="<?php echo site_url('categories/manage'); ?>">Category</a></li>
                    <li><a href="#">Pending Orders</a></li>
                    <li><a href="#">Confirm Orders</a></li>
                </ul>
            </div>
        </li>
        <li><a href="<?php echo site_url('country/manage'); ?>">Manage Cashback</a>
            <div class="submenu">
                <ul>
                    <li><a href="#">Manage Cashback</a></li>
                    <li><a href="#">Manage Affiliates</a></li>                    
                    <li><a href="#">Manage Badges</a></li>
                    <li><a href="#">Manage Points</a></li>
                </ul>
            </div>
        </li>
        <li><a href="<?php echo site_url('cms/manage'); ?>">Manage CMS</a>
            <div class="submenu">
                <ul>
                    <li><a href="<?php echo site_url('emailtemplate/manage'); ?>">Manage Email Templates</a></li>
                    <li><a href="<?php echo site_url('country/manage'); ?>">Manage Country</a></li>
                </ul>    
            </div>
        </li>
        <li><a href="<?php echo site_url('emailtemplate/manage'); ?>">Manage Admin/Staff</a></li>
        <li><a href="#">Others</a></li>
    </ul>
    <div class="clear"></div>
</div>
<!-- Menu Ends -->