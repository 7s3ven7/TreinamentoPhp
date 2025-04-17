<?php
    if(isset($_POST["email"]))
    {
        $email = $_POST["email"];
        var_dump($email);
    }
?>
<!--6Ldw7xsrAAAAAFPdlsLjmHNG0mN8x6tfL2AvDQMr

//6Ldw7xsrAAAAAC8NDsDfI7kdgbEoRiJcuQKMi4L9-->
<script src="https://www.google.com/recaptcha/api.js"></script>
<form method="POST">
    <input name="email" type="email">
    <button type="submit">Enviar</button>
</form>
