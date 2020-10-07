function login() {
  var email = document.querySelector("#nav-login-form #email");
  var passwd = document.querySelector("#nav-login-form #password");

  $.ajax({
    url: "http://localhost/php_2/php-mvc/postLogin",
    dataType: "json",
    type: "POST",
    data: {
      email: email.value,
      passwd: passwd.value,
    },
    success: function (response) {

    },
  });
}
