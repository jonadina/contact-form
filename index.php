<?php session_start();session_unset();session_destroy();$_SESSION = array();?>
<html>
<head class="no-js">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Contact Form Assignment PHP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<!--[if lt IE 8]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->


<div class="container">

    <h1>Contact Form Assignment PHP</h1>

    <div class="requirements">
        <ul>
            <li>PHP 5.3 or greater - PHP 5.5</li>
            <li>No frameworks (assuming no frontend libraries/frameworks as well. Keeping it simple)</li>
        </ul>
    </div>

    <div class="errors">
        <ul>
            <?php

                session_start();    //  you cannot start a session after content has already been sent, you will get a headers error
                foreach($_SESSION['validation'] as $error => $value){
                    echo "<li>" . $error . " is invalid" . "<li>";
                }

            ?>
        </ul>
    </div>

    <div class="contact-form">
        <form id="contact-form" action="onSubmit.php" method="post">

            <label>
                Name
                <input name="name" type="text" placeholder="Name"/>
            </label>

            <label>
                Phone
                <input name="phone" type="tel" placeholder="Phone"/>
            </label>

            <label>
                Email
                <input name="email" type="email" placeholder="Email"/>
            </label>

            <label>
                Message
                <textarea name="message" placeholder="Your message to us here." rows="5" cols="30"></textarea>
            </label>

            <label>
                Opt into our Newsletter?
                <input name="newsletter" type="radio">
            </label>

            <input type="button" value="Submit" onclick="validateForm();"/>

        </form>

    </div>

</div>




<script type="text/javascript">
    function downloadJSAtOnload() {
        var element = document.createElement("script");
        element.src = "script.js";
        document.body.appendChild(element);
    }
    if (window.addEventListener)
        window.addEventListener("load", downloadJSAtOnload, false);
    else if (window.attachEvent)
        window.attachEvent("onload", downloadJSAtOnload);
    else window.onload = downloadJSAtOnload;
</script>

</body>
</html>
