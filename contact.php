﻿<?php

// Ваші токен і chat_id
$token = '6804060756:AAGP0MP3zut8a3mNuX2eDa4_FAiQDfgmbQ8';
$chat_id = '-1002063015366';

$name = isset($_POST['name']) ? $_POST['name'] : '';
$position = isset($_POST['position']) ? $_POST['position'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
$message = isset($_POST['message']) ? $_POST['message'] : '';

// Перевірка, що всі необхідні поля заповнені
if (!empty($name) && !empty($position) && !empty($email) && !empty($phone) && !empty($message)) {
    $arr = array(
        "name" => $name,
        "position" => $position,
        "email" => $email,
        "phone" => $phone,
        "message" => $message,
    );

    $txt = 'CONTACT FORM%0A';
    foreach ($arr as $key => $value) {
        $txt .= "<b>" . $key . "</b> " . $value . "%0A";
    }

    // Передаємо дані боту
    $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}", "r");

} else {
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
    <title>ESP Freight Contact</title>
    <script src="telegramform.js"></script>
    <link rel="stylesheet" href="style/contact.css">
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
            <h4 class="h">Contact:</h4>
            <div class="input-block-contact">
                <form action="contact.php" method="post">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name"><br>

                    <label for="position">Position:</label>
                    <input type="text" id="position" name="position"><br>

                    <label for="email">Email address:</label>
                    <input type="email" id="email" name="email"><br>

                    <label for="phone">Phone number:</label>
                    <input type="tel" id="phone" name="phone"><br>

                    <label for="message">Text:</label><br>
                    <textarea id="message" name="message" rows="4" cols="50"></textarea><br>

                    <div class="g-recaptcha" data-sitekey="6Lcvz-IpAAAAAHyLCK9nQx0Eyz2wZ6WoRfVvRgjC"></div>
                    <button type="submit" class="button" id="submit-btn" disabled>Submit</button>
                </form>
            </div>
            <br>
        </div>
    </main>

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
