<link rel="stylesheet" href="css/reset.css">
<!-- CSS reset -->
<link rel="stylesheet" href="css/style.css">
<!-- Resource style -->
<link rel="icon" href="img/logo.jpg">

<style>
    <?php
        $textc=$_COOKIE['cookietextc'];
        $backgound=$_COOKIE['cookiebackgound'];
        echo "body{
        color: ".$textc.";
        background: ".$backgound.";
        }";
    ?>
</style>
