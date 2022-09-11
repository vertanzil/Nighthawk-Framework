<?php

use App\classes\Database\Database;
use App\classes\Database\SQLhousing;
use App\classes\functions\Functions;


$housing = new SQLhousing();

if (count($_POST) > 0) {
    $result = mysqli_query($db->getConnection(), $housing->sqlselectUser());
    $row = mysqli_fetch_array($result);
    if (password_verify($_POST["currentPassword"], $row['password'])) {
        $sql = "UPDATE users SET password=" . "'" . password_hash($_POST["newPassword"], PASSWORD_DEFAULT) . "'" . " WHERE id = '1'";
        $result = $db->getConnection()->query($sql);
        $message = "Password Changed";
    }
}
?>
<!--suppress ALL -->
<body>
<?php
if (!isset($_SESSION['loggedin'])) {
    header("Location: index.php?url=Error&Result=NotLoggedIn");
}
?>

<?php
$functions = new Functions();
$db = Database::getInstance();
if (!$db->tableExist()) {
    header("Location: index.php?url=Error&Result=Setup");
} else {
    $db->installFldrcheck();
}
?>
<script>
    function displayPassword() {
        var x = document.getElementById("password");
        var y = document.getElementById("password1");
        var z = document.getElementById("password2");
        if (x.type === "password" || y.type === "password" || z.type === "password") {
            x.type = "text";
            y.type = "text";
            z.type = "text";
        } else {
            x.type = "password";
            y.type = "password";
            z.type = "password";
        }
    }
</script>

<div class="grid-x grid-margin-x">
    <div class="cell large-3"></div>
    <div class="cell large-6">
        <header>Login Form</header>
        <form name="frmChange" method="post" action="" onSubmit="return validatePassword()">

            <div class="field space">
                <span class="fa fa-lock" style="padding-left: 15px;"></span>
                <input type="password" name="currentPassword" id="password" class="txtField-form" required
                       placeholder="currentPassword">
            </div>
            <span id="currentPassword" class="required"></span>
            <div class="field space">
                <span class="fa fa-lock" style="padding-left: 15px;"></span>
                <input type="password" name="newPassword" id="password1" class="form-txtField" required
                       placeholder="newPassword">

            </div>
            <span id="newPassword" class="required"></span>

            <div class="field space">
                <span class="fa fa-lock" style="padding-left: 15px;"></span>
                <input type="password" name="confirmPassword" id="password2" class="txtField-control" required
                       placeholder="confirmPassword">

            </div>
            <span id="confirmPassword" class="required"></span>
            <div class="field">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>


        </form>
        <span onclick="displayPassword()">Show Password</span>


    </div>
</div>


</body>