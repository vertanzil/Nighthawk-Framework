// noinspection JSLint
function validatePassword() {
    // noinspection JSLint
    let currentPassword, newPassword, confirmPassword, output = true; // jshint ignore:line // jshint ignore:line // jshint ignore:line
    // noinspection JSLint
    currentPassword = document.frmChange.currentPassword;
    // noinspection JSLint
    newPassword = document.frmChange.newPassword;
    confirmPassword = document.frmChange.confirmPassword;

    if (!currentPassword.value) {
        currentPassword.focus();
        document.getElementById("currentPassword").innerHTML = "required";
        output = false;
    }
    else { // noinspection JSLint
        if (!newPassword.value) {
            newPassword.focus();
            document.getElementById("newPassword").innerHTML = "required";
            output = false;
        }
        else if (!confirmPassword.value) {
            confirmPassword.focus();
            // noinspection JSLint
            document.getElementById("confirmPassword").innerHTML = "required";
            output = false;
        }
    }
    if (newPassword.value !== confirmPassword.value) {
        newPassword.value = "";
        confirmPassword.value = "";
        newPassword.focus();
        document.getElementById("confirmPassword").innerHTML = "not same";
        output = false;
    }
    return output;
}