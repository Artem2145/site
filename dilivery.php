<?php

$token = '6804060756:AAGP0MP3zut8a3mNuX2eDa4_FAiQDfgmbQ8';
$chat_id = '-1002063015366';


$adres = isset($_POST['adres']) ? $_POST['adres'] : '';
$date = isset($_POST['date']) ? $_POST['date'] : '';
$time = isset($_POST['time']) ? $_POST['time'] : '';
$Quantity = isset($_POST['Quantity']) ? $_POST['Quantity'] : '';
$Dimensions = isset($_POST['Dimensions']) ? $_POST['Dimensions'] : '';
$Commodity = isset($_POST['Commodity']) ? $_POST['Commodity'] : '';
$Weight = isset($_POST['Weight']) ? $_POST['Weight'] : '';
$Diliveryto = isset($_POST['Diliveryto']) ? $_POST['Diliveryto'] : '';
$dateto = isset($_POST['dateto']) ? $_POST['dateto'] : '';
$timeto = isset($_POST['timeto']) ? $_POST['timeto'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';

if(!empty($_POST)) {
$arr = array(
	"adres " => $adres,
	"date " => $date,
	"time " => $time,
	"Quantity " => $Quantity,
	"Dimensions " => $Dimensions,
	"Commodity " => $Commodity,
	"Weight " => $Weight,
	"Diliveryto " => $Diliveryto,
	"dateto " => $dateto,
	"timeto " => $timeto,
    "Email " => $email,
    "Phone " => $phone,
    "Lift gate " => isset($_POST['lift-gate']) ? $_POST['lift-gate'] : 'false',
    "Pallet jack " => isset($_POST['pallet-jack']) ? $_POST['pallet-jack'] : 'false',
    "Air ride " => isset($_POST['air-ride']) ? $_POST['air-ride'] : 'false',
    "White glove service " => isset($_POST['glove']) ? $_POST['glove'] : 'false'
);

$txt = 'GET A QUOTE FORM%0A';

foreach ($arr as $key => $value) {
	$txt .= "<b>" . $key . "</b> " . $value . "%0A";
};

$sendToTelegram = fopen("http://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}", "r");
}

$error = true;
    $secret = '6Lcvz-IpAAAAACA-gn2eXQ_MUcAUy5dRVS5P9aD7';
   
    if (!empty($_POST['g-recaptcha-response'])) {
        $curl = curl_init('https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, 'secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
        $out = curl_exec($curl);
        curl_close($curl);
        
        $out = json_decode($out);
        if ($out->success == true) {
            $error = false;
        } 
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
	<title>ESP Freight Delivery</title>
	<script src="telegramform.js"></script>
	<link rel="stylesheet" href="style/dilivery.css">

</head>
<script src="https://www.google.com/recaptcha/api.js"></script>

<body>




	<header class="header">
		<div class="container">
			<div class="header__body">
				<a href="index.html" class="header__logo">
					<img src="image/logo.png" alt="logo">
				</a>
				<div class="header__burger">
					<span></span>
				</div>
				<nav class="header__menu">
					<ul class="header__list">
						<li>
							<a href="index.html" class="header__link">HOME</a>
						</li>
						<li>
							<a href="about.html" class="header__link">ABOUT US</a>
						</li>
						<li>
							<a href="contact.php" class="header__link">CONTACT</a>
						</li>
						<li>
							<a href="driver.php" class="header__link">DRIVERS</a>
						</li>
						<li>
							<a href="dilivery.php" class="header__link">GET A QUOTE</a>
						</li>
					</ul>
				</nav>
			</div>
	</header>

	<main class="main">
		<div class="wrapper">

			<br><br>
		</div>

		<div class="form-dilivery">
			<h4>Quote</h4>

			<br>

			<form class="second-form" method="POST">
    <p>Pick up address</p>
    <input type="text" name="adres"> <br> <br>

    <p>Your email</p>
    <input type="email" name="email"> <br> <br>

    <p>Your phone number</p>
    <input type="text" name="phone"> <br> <br>

    <p>Date</p>
    <input type="date" id="date" placeholder="dd/mm/yyyy" name="date" /> <br> <br>

    <p>Time</p>
    <input type="time" id="time" name="time" /> <br> <br>

    <p>Quantity of pallets:</p>
    <input type="text" name="Quantity" id="Quantity"> <br> <br>

    <p>Dimensions</p>
    <input type="text" name="Dimensions" id="Dimensions"> <br> <br>

    <p>Commodity:</p>
    <input type="text" name="Commodity" id="Commodity"> <br> <br>

    <p>Weight:</p>
    <input type="text" name="Weight" id="Weight"> <br> <br>

    <p>Dilivery Address</p>
    <input type="text" name="Diliveryto"> <br> <br>

    <p>Date</p>
    <input type="date" id="dateto" name="dateto" placeholder="dd/mm/yyyy" /> <br> <br>

    <p>Time</p>
    <input type="time" id="timeto" name="timeto" />

    <div id="legal-status">
        <input type="checkbox" id="lift-gate" name="lift-gate" value="true">
        <label for="lift-gate">Lift gate</label><br>
        <input type="checkbox" id="pallet-jack" name="pallet-jack" value="true">
        <label for="pallet-jack">Pallet jack</label><br>
        <input type="checkbox" id="air-ride" name="air-ride" value="true">
        <label for="air-ride">Air ride</label><br>
        <input type="checkbox" id="glove" name="glove" value="true">
        <label for="glove">White glove service</label><br>
    </div>

    <br><br><br>
	<div class="g-recaptcha" data-sitekey="6Lcvz-IpAAAAAHyLCK9nQx0Eyz2wZ6WoRfVvRgjC"></div>

    <button type="submit" class="button" id="submit-btn" disabled>Submit</button>
</form>


<br>






		</div>



	</main>
	<br><br><br>


	<footer class="footer">
		<div class="wrapper">
			<div class="foote-top">

				<div class="footer-car">
					<img src="image/track.png" alt="track">
					<p>Expedited Solutions Partner</p>
				</div>


				<div class="goto">

					<h5>GO TO</h5>

					<ul>
						<li class="gotop"><a href="index.html">HOME</a></li>
						<li class="goab"><a href="about.html">ABOUT US</a></li>
						<li class="goon"><a href="contact.php">CONTACT</a></li>
					</ul>

					<p>ESPfreight - Express Ship Plus, Inc.</p>
				</div>


			</div>


			<div class="footer-line"></div>
			<div class="footer-bootom-contain">
				<div class="footer-bootom-contain-text">
					<p>Copyright © 2019. Express Ship Plus Inc. All rights reserved</p>
				</div>

				<div class="footer-bootom-contain-button">
					<a href="tel:+1234567890" class="phone-button"><img src="image/phone.png" alt="logo-footer2"></a>
					<a href="mailto:info@example.com" class="email-button"><img src="image/email.png" alt="logo-footer"></a>
				</div>


			</div>

		</div>
	</footer>



	<script>
		let menu_button = document.querySelector('.header__burger');
		let menu_itself = document.querySelector('.header__menu');
		let menu_list = document.querySelector('.header__list');
		let body = document.querySelector('body');

		menu_button.onclick = function() {
			menu_button.classList.toggle('active');
			menu_itself.classList.toggle('active');
			body.classList.toggle('lock');
		};

		menu_list.onclick = function() {
			menu_button.classList.toggle('active');
			menu_itself.classList.toggle('active');
			body.classList.toggle('lock');
		};

		function recaptchaCallback() {
			document.getElementById('submit-btn').disabled = false;
		}
	</script>





</body>

</html>