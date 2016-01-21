<?php
/*
 * Created on Jan 21, 2016
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Admin Panel ::</title>
<link href="<?php echo base_url();?>css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/common.js"></script>
</head>
<body class="loginBg">
    <div id="adminLogin">
        <h1>Welcome. Please Sign In</h1>
		<?php echo form_open('login/login_user') ?>
        <ul class="margin10">
            <li><input name="username" id="username" type="text" class="email wd247" value="Email" onblur="clickrecall(this,'Email')" onclick="clickclear(this, 'Email')" /></li>
            <li><input name="password" id="password" type="password" class="pass wd247" value="password" onblur="clickrecall(this,'password')" onclick="clickclear(this, 'password')" /></li>
            <li><label><span class="floatL marginR5"><input name="" type="checkbox" value="" /></span>  <span class="floatL font11">Remember me</span></label><div class="clear"></div></li>
            <li><span class="floatL"><input name="submit" type="submit" class="login" value="Sign In" /></span>
                <span class="floatR marginT7"><a href="#" class="underline">Forgot your password?</a></span>
                <div class="clear"></div>
            </li>
        </ul>
        </form>
        <?php if (isset($error) && $error): ?>
          <div class="alert alert-error">
            <a class="close" data-dismiss="alert" href="#">—</a>Incorrect Username or Password!
          </div>
        <?php endif; ?>
    </div>
</body>
</html>