let user = JSON.parse(Cookies.get('login'));
$("#user_name").text(user.name + ' ' + user.last_name);
$("#user_email").text(user.email);

$.ajax({
    type: "POST",
    url: "../../core/controller/default_controller.php",
    data: {
        event : "query",
        query: 'select count(id) as total from users' 
    },
    success: function (response) {
      if(response.success && response.data){
        $("#users").text(response.data[0].total);
      }
    }
  });

  $.ajax({
    type: "POST",
    url: "../../core/controller/default_controller.php",
    data: {
        event : "query",
        query: 'select count(id) as total from book' 
    },
    success: function (response) {
      if(response.success && response.data){
        $("#books").text(response.data[0].total);
      }
    }
  });

  $.ajax({
    type: "POST",
    url: "../../core/controller/default_controller.php",
    data: {
        event : "query",
        query: 'select count(id) as total from book_borrow' 
    },
    success: function (response) {
      if(response.success && response.data){
        $("#books_borrow").text(response.data[0].total);
      }
    }
  });


$(document).ready(function () {
    $('.tabs').tabs();
    $('.sidenav').sidenav();

    $('#books_table').DataTable( {
      ajax: {
        url: "../../core/controller/book_controller.php?event=fetchAll",
      },
      columns: [
        { data: 'id' },
        { data: 'name' },
        { data: 'autor' },
        { data: 'language' },
        { data: 'category' },
        { data: 'publisher' }
      ]
  });

  $('#users_table').DataTable( {
    ajax: {
      url: "../../core/controller/user_controller.php?event=fetchAll",
    },
    columns: [
      { data: 'id' },
      { data: 'name' },
      { data: 'last_name' },
      { data: 'email' },
      { data: 'type' }
    ]
});

  $("select").val('10'); //seleccionar valor por defecto del select
  $('select').addClass("browser-default"); //agregar una clase de materializecss de esta forma ya no se pierde el select de numero de registros.
  $('select').material_select(); //inicializar el select de materialize pagination
  $('#books_table_paginate').addClass('red')
});
