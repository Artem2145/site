<?php
$token = '6804060756:AAGP0MP3zut8a3mNuX2eDa4_FAiQDfgmbQ8';
$chat_id = '-1002063015366';

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

if (!$error) {
    $dob = isset($_POST['dob']) ? $_POST['dob'] : '';
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $status = isset($_POST['status']) ? $_POST['status'] : '';
    $prev = isset($_POST['prev-company']) ? $_POST['prev-company'] : '';
    $start = isset($_POST['start-date']) ? $_POST['start-date'] : '';

    if (!empty($name) && !empty($phone) && !empty($email)) {
        $arr = array(
            "dob " => $dob,
            "name " => $name,
            "phone " => $phone,
            "email " => $email,
            "status-info " => $status,
            "prev-company " => $prev,
            "start-date " => $start,
        );

        $txt = 'DRIVER FORM%0A';
        foreach ($arr as $key => $value) {
            $txt .= "<b>" . $key . "</b> " . $value . "%0A";
        }

        $sendToTelegram = fopen("http://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}", "r");

        if (isset($_FILES['mvr']) && $_FILES['mvr']['error'] == UPLOAD_ERR_OK) {
            $filePath = $_FILES['mvr']['tmp_name'];
            $fileName = $_FILES['mvr']['name'];

            $url = "https://api.telegram.org/bot{$token}/sendDocument";
            $postFields = array(
                'chat_id' => $chat_id,
                'document' => new CURLFile($filePath, $_FILES['mvr']['type'], $fileName),
                'caption' => 'Motor Vehicle Report'
            );

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                "Content-Type:multipart/form-data"
            ));
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
            $result = curl_exec($ch);
            curl_close($ch);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ESP Freight Driver</title>
    <script src="https://www.google.com/recaptcha/api.js"></script>
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
            <form class="form-dilivery" action="driver.php" method="POST" enctype="multipart/form-data">
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
                    <label for="status">Legal Status:</label>
                    <br>
                    <select id="status" name="status">
                        <option value="Citizen">Citizen</option>
                        <option value="Green Card">Green Card</option>
                        <option value="Work Authorization">Work Authorization</option>
                        <option value="Other">Other</option>
                    </select>
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

                <div class="g-recaptcha" data-sitekey="6Lcvz-IpAAAAAHyLCK9nQx0Eyz2wZ6WoRfVvRgjC" data-callback="recaptchaCallback"></div>
                <button type="submit" class="button" id="submit-btn" style="background-color: #4CAF50; color: white; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer; width: 100%; margin-top: 15px; font-size: 16px; text-decoration: none;" disabled>Submit</button>

            </form>
            <br>
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

        menu_button.onclick = function () {
            menu_button.classList.toggle('active');
            menu_itself.classList.toggle('active');
            body.classList.toggle('lock');
        };

        menu_list.onclick = function () {
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
