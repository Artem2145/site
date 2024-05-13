<?php
$token = '5538201129:AAF2NZ3pqWt5AMZcU0t6huAoqUUGMn8fmWy';


$chat_id = '-756248532';


$dob = ($_POST['dob']);
$name = ($_POST['name']);
$phone = ($_POST['phone']);
$email = ($_POST['email']);
$status = ($_POST['status-info']);
$prev = ($_POST['prev-company']);
$start = ($_POST['start-date']);
$arr = array(



    "dob " => $dob,
    "name " => $name,
    "phone " => $phone,
    "email " => $email,
    "status-info " => $status,
    "prev-company " => $prev,
    "start-date " => $start,
);

foreach ($arr as $key => $value) {
    $txt .= "<b>" . $key . "</b> " . $value . "%0A";
};

//Передаем данные боту
$sendToTelegram = fopen("http://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}", "r");

//Выводим сообщение об успешной отправке

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ESP Freight Driver</title>
    <script src="telegramform.js"></script>
    <link rel="stylesheet" href="style/driver.css">
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

        <div class="form-container">
            <h4 class="form-job">Drive for ESP FREIGHT</h4>
            <form class="form-dilivery" action="#" method="POST">

                <div class="form-group">
                    <label for="dob">Date of Birth:</label>
                    <br>
                    <input type="text" id="dob" name="dob" placeholder="Enter your date of birth">
                </div>

                <div class="form-group">
                    <label for="name">Name:</label>
                    <br>
                    <input type="text" id="name" name="name" placeholder="Enter your name">
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number:</label>
                    <br>
                    <input type="tel" id="phone" name="phone" placeholder="Enter your phone number">
                </div>

                <div class="form-group">
                    <label for="email">Email Address:</label>
                    <br>
                    <input type="email" id="email" name="email" placeholder="Enter your email address">
                </div>

                <div class="form-group">
                    <label for="legal-status">Legal Status:</label>
                    <br>
                    <div id="legal-status">
                        <input type="radio" id="citizen" name="legal-status" value="citizen" onclick="showSingleInput('citizen')">
                        <label for="citizen">Citizen</label><br>
                        <input type="radio" id="green-card" name="legal-status" value="green-card" onclick="showSingleInput('green-card')">
                        <label for="green-card">Green Card</label><br>
                        <input type="radio" id="work-authorization" name="legal-status" value="work-authorization" onclick="showSingleInput('work-authorization')">
                        <label for="work-authorization">Work Authorization</label><br>
                        <input type="radio" id="other" name="legal-status" value="other" onclick="showSingleInput('other')">
                        <label for="other">Other</label><br>
                    </div>
                </div>

                <div id="input-container" class="hidden">
                    <label for="status-info">Your text:</label>
                    <input type="text" id="status-info" name="status-info">
                </div>

                <div class="form-group">
                    <label for="prev-company">Previous Company Worked for:</label>
                    <br>
                    <input type="text" id="prev-company" name="prev-company" placeholder="Enter previous company name">
                </div>

                <div class="form-group">
                    <label for="mvr">Motor Vehicle Report:</label>
                    <br>
                    <input type="file" id="mvr" name="mvr">
                </div>

                <div class="form-group">
                    <label for="start-date">When can you start working?</label>
                    <br>
                    <input type="date" id="start-date" name="start-date">
                </div>


                <form class="form-container">
                    <form action="#">
                        <label for="gender">Gender:</label>
                        <select id="gender" name="gender">

                            <option value="male">male</option>
                            <option value="female">female</option>
                            <option value="not">not specified</option>

                        </select>
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
                    </form>
                </form>
            </form>





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
        const other = document.querySelector('#other');
        const radios = document.querySelectorAll('input[type="radio"]');
        const container = document.querySelector('#input-container');

        radios.forEach(input => {
            input.addEventListener('click', () => {
                if (input === other && input.checked) {
                    container.classList.remove('hidden');
                } else {
                    container.classList.add('hidden');
                }
            });
        });


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