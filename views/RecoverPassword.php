<?php

use App\classes\Config;

$config = new Config();
$function = new Functions();
if (isset($_POST) & !empty($_POST)) {
    $username = mysqli_escape_string($db->getConnection(), $_POST['username']);
    $sql = "SELECT * FROM `users` WHERE username = '$username'";
    $res = mysqli_query($db->getConnection(), $sql);
    $count = mysqli_num_rows($res);
    echo mysqli_num_rows($res);
    if ($count == 1) {
        $r = mysqli_fetch_assoc($res);
        $password = $function->generatePwd("10", false, "luds");
        $to = $config->recoveryEmail();
        $subject = "Your Recovered Password";
        $message = "Please use this password to login " . $password;
        $headers = "From : NightHawk@Framework";
        if (mail($to, $subject, $message, $headers)) {
            echo "Your Password has been sent to your email id";
            $sql2 = "UPDATE users SET password=" . "'" . password_hash($password, PASSWORD_DEFAULT) . "'" . " WHERE id = '1'";
            $result = $db->getConnection()->query($sql2);

        } else {
            echo "Failed to Recover your password, try again";
        }
    } else {
        echo "User name does not exist in database";
    }
}
?>
<html>
<body>
<div class="grid-x grid-margin-x">
    <div class="cell large-3"></div>
    <div class="cell large-6">
        <header>Recover password Form</header>
        <form class="form-signin" onSubmit="return ValidateActInsert()" method="POST">
            <div class="field">
                <span class="fa fa-user" style="padding-left: 15px;"></span>
                <input type="text" name="username" class="form-control" required placeholder="Username">
            </div>
            <div class="field">
                <input type="submit" class="btn btn-primary" value="Recover password">
            </div>
        </form>
    </div>
</div>

</body>
</html>