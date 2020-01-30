
<?php

include "auth_check.php";

?>

<!--
Author: Colorlib
Author URL: https://colorlib.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
    <title>KuaRand</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Custom Theme files -->
    <link href="../styles/signup_style.css" rel="stylesheet" type="text/css" media="all" />
    <!-- //Custom Theme files -->
    <!-- web font -->
    <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
    <!-- //web font -->
</head>
<body>
<!-- main -->
<div class="main-w3layouts wrapper">
    <h1>Create Hairdresser</h1>
    <div class="main-agileinfo">
        <button><a href="index.php">Back To Home</a></button>
        <div class="agileits-top">
            <form action="../api_routes/panel_routes/signup_hd_route.php" method="post">
                <input class="text" type="text" name="hd_name" placeholder="Hairdersser Name" required="">
                <input class="text email" type="email" name="hd_email" placeholder="Email" required="">
                <br>
                <input class="text" type="password" name="hd_password" placeholder="Password" required="">
                <input class="text w3lpass" type="password" name="hd_password_confirm" placeholder="Confirm Password" required="">

                <input class="text" type="text" name="address_city" placeholder="Address City" required="">
                <input class="text" type="text" name="address_region" placeholder="Address Region" required="">
                <input class="text" type="text" name="address_neigh" placeholder="Address Neigh" required="">
                <input class="text" type="text" name="address_street" placeholder="Address Street" required="">
                <input class="text" type="text" name="address_other" placeholder="Address Other" required="">

                <br><br>

                <select name="hd_type" required>
                    <option value="0">Kuaför</option>
                    <option value="1">Berber</option>
                </select>
                <br><br>

                <br><br>

                <div class="wthree-text">
                    <label class="anim">
                        <input type="checkbox" class="checkbox" required="">
                        <span>I Agree To The Terms & Conditions</span>
                    </label>
                    <div class="clear"> </div>
                </div>
                <input type="submit" value="SIGNUP">
            </form>
            <p>Already have an Account? <a href="../nedmin/index.php"> Login Now!</a></p>
            <p>If you are a customer <a href="signup.php"> Click Here</a></p>
        </div>
    </div>
    <!-- copyright -->
    <div class="colorlibcopy-agile">
        <p>© 2018 Colorlib Signup Form. All rights reserved | Design by <a href="https://colorlib.com/" target="_blank">Colorlib</a></p>
    </div>
    <!-- //copyright -->
    <ul class="colorlib-bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</div>
<!-- //main -->
</body>
</html>