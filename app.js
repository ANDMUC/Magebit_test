let baltaisLoginLogs = document.querySelector(".baltais-login");
let baltaisSignUpLogs = document.querySelector(".baltais-signup");
let signupButton = document.getElementById("signUpButton");
let loginButton = document.getElementById("loginButton");

signupButton.addEventListener("click", () => {
  baltaisLoginLogs.style.animation = "baltaisLoginAnimation 0.4s ease forwards";
  baltaisSignUpLogs.style.animation = "baltaisSignUpAppears 0.6s ease forwards";
});

loginButton.addEventListener("click", () => {
  baltaisSignUpLogs.style.animation =
    "baltaisSignUpAnimation 0.4s ease forwards";
  baltaisLoginLogs.style.animation = "baltaisLoginAppears 0.6s ease forwards";
});
