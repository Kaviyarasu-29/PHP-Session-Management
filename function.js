
var Login_div = document.getElementById("PersonalLogin");
Login_div.style.display = "block";

var Signup_div = document.getElementById("PersonalSignup");
Signup_div.style.display = "none";

function SwitchSignup() {
    Login_div.style.display = "none";
    Signup_div.style.display = "block";
}
function SwitchLogin() {
    Login_div.style.display = "block";
    Signup_div.style.display = "none";
}