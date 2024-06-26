﻿﻿<?php
$token = '5538201129:AAF2NZ3pqWt5AMZcU0t6huAoqUUGMn8fmWy';


$chat_id = '-756248532';


$name = ($_POST['name']);
$position = ($_POST['position']);
$email = ($_POST['email']);
$phone = ($_POST['phone']);
$message = ($_POST['message']);
$arr = array(



    "name " => $name,
    "position " => $position,
    "email " => $email,
    "phone " => $phone,
    "message " => $message,
);

foreach ($arr as $key => $value) {
    $txt .= "<b>" . $key . "</b> " . $value . "%0A";
};

//Передаем данные боту
$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}", "r");

//Выводим сообщение об успешной отправке

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ESP Freight Contact</title>
    <link rel="stylesheet" href="style/contact.css">
</head>

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
                            <a href="contact.html" class="header__link">CONTACT</a>
                        </li>
                        <li>
                            <a href="driver.html" class="header__link">DRIVERS</a>
                        </li>
                        <li>
                            <a href="dilivery.html" class="header__link">GET A QUOTE</a>
                        </li>
                    </ul>
                </nav>
            </div>
    </header>

    <main class="main">
        <div class="wrapper">


            <h4 class="h">Contact:</h4>
            <div class="input-block-contact">


                <label for="name">Name:</label>
                <input type="text" id="name" name="name"><br>

                <label for="position">Position:</label>
                <input type="text" id="position" name="position"><br>

                <label for="email">Email address:</label>
                <input type="email" id="email" name="email"><br>

                <label for="phone">Phone number:</label>
                <input type="tel" id="phone" name="phone"><br>

                <label for="message">Text:</label><br>
                <textarea id="message" name="message" rows="4" cols="50"></textarea>


                <input style="    display: inline-block;
    background-color: #1e90ff;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 15px;
    font-size: 16px;
    text-align: center;
    text-decoration: none;
    transition: background-color 0.3s;" type="submit" name="submit" value="Submit">
            </div>
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
                        <li class="goon"><a href="contact.html">CONTACT</a></li>
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
    </script>




</body>

</html>