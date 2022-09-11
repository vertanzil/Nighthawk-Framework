<?php

use App\controllers\Login;

?>
<body>

<div class="grid-x grid-margin-x">
    <div class="cell large-5"></div>
    <div class="cell large-6">
    </div>
</div>
<!--suppress ConstantOnRightSideOfComparisonJS -->
<script>
    function displayPassword() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>

<div class="grid-x grid-margin-x">
    <div class="cell large-3"></div>
    <div class="cell large-6">
        <header>Login Form</header>
        <form action='<?php Login::init() ?>' method="post" id="loginform" onclick="validate();">
            <div class="field">
                <span class="fa fa-user" style="padding-left: 15px;"></span>
                <input type="text" name="username" class="form-control" required placeholder="Username">
            </div>
            <div class="field space">
                <span class="fa fa-lock" style="padding-left: 15px;"></span>
                <input type="password" id="password" name="password" class="form-control" required
                       placeholder="Password">
            </div>
            <div class="pass">
                <span onclick="displayPassword()">Show Password</span>
                <a href="index.php?url=RecoverPassword">Forgot Password?</a>
            </div>
            <div class="field">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
        </form>
    </div>
</div>
</body>
