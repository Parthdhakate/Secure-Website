function validatePassword() {
    var Opassword, Npassword, Cpassword, output = true;

    Opassword = document.frmChange.Opassword;
    Npassword = document.frmChange.Npassword;
    Cpassword = document.frmChange.Cpassword;

    if (!Opassword.value) {
        Opassword.focus();
        document.getElementById("Opassword").innerHTML = "required";
        output = false;
    } else if (!Npassword.value) {
        Npassword.focus();
        document.getElementById("Npassword").innerHTML = "required";
        output = false;
    } else if (!Cpassword.value) {
        Cpassword.focus();
        document.getElementById("Cpassword").innerHTML = "required";
        output = false;
    }
    if (Npassword.value != Cpassword.value) {
        Npassword.value = "";
        Cpassword.value = "";
        Npassword.focus();
        document.getElementById("Cpassword").innerHTML = "not same";
        output = false;
    }
    return output;
}