<?php

$business = "enter paypal account email address here";
$amount = 1;

$arr = array(
"take5" => array("discount" => "0.50"),
"take10" => array("discount" => "0.75")
);

foreach ($arr as $key => $value) {

if ($key == $_POST["couponCode"])
{
$discount = $value["discount"];
$amount = ($amount - $discount);
break;
}
}

?>


<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Coupon Code</title>

<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>

<div id="apDiv1">
<h3>Slick Tie $<?php echo $amount; ?></h3>
<img src="tie.png" width="72" height="130">
</div>
<div id="apDiv2">
A tie by any other name would still look as sweet. But a tie at a lower price ...
<br><br>
<form action="coupon-code.php" method="post">
<input type="text" name="couponCode" placeholder="coupon code" >
<input type="submit" name="submitCouponCode" value="apply coupon">
</form>
<br><br>

<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="<?php echo $business; ?>">
<input type="hidden" name="item_name" value="my test item">
<input type="hidden" name="amount" value="<?php echo $amount; ?>">
<input type="hidden" name="return" value="http://www.paypal.com">
<input type="hidden" name="cancel_return" value="http://www.paypal.com">
<input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
</form>

</div>

</body>
</html>
