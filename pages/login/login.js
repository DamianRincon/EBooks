if (Cookies.get('login')) {
  window.location = '../dashboard/';
}

$(document).ready(function () {
  $("#login_form").submit(function (event) {
    event.preventDefault();
    $.ajax({
      type: "POST",
      url: "../../core/controller/user_controller.php",
      data: {
        event: "login",
        email: $('#email').val(),
        password: $('#password').val()
      },
      success: function (response) {
        if (response.success && response.data) {
          Cookies.set('login', response.data);
          console.log(response.data)
          if (response.data.type == 1) {
            window.location = '../dashboard/';
          } else {

          }
        } else {
          $("#span").text("Usuario o contraseña incorrectos").show().fadeOut(3000);
        }
      }
    });

  });
});