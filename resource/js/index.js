$.ajax({
  type: "GET",
  url: "core/controller/category_controller.php",
  data: { event : "fetchAll" },
  success: function (response) {
    if(response.success){
      response.data.forEach(element => {
        $("#category_bar ul").append('<li><a href="#'+element.id+'">'+element.name+'</a></li>');
      });
    }
  }
});

$.ajax({
  type: "GET",
  url: "core/controller/book_controller.php",
  data: { event : "fetchAll" },
  success: function (response) {
    if(response.success){
      $("#content").append('<div class="b e" id="books"></div>')
      response.data.forEach(element => {
        $("#books").append(getItem(element));
      });
      $.getScript("resource/js/materialize.min.opt.js");
    }
  }
});

function getBorrow(book_id) {
  Cookies.set('book_id', book_id);
  if (Cookies.get('login')) {
    window.location= 'pages/borrow/';  
  } else {
    window.location= 'pages/login/';
  }
}

function getItem(book) {
  return '<div class="d hx hf gu gallery-item gallery-expand ce '+book.id_category+'"> \
    <div class="gallery-curve-wrapper"> \
      <a class="gallery-cover gray"> \
        <img class="responsive-img" src="http://localhost/Ebooks/'+book.image+'" alt="placeholder" crossOrigin="anonymous">\
      </a>\
      <div class="gallery-header">\
        <b><h5>'+book.name+'</h5></b>\
      </div>\
      <div class="gallery-body">\
        <div class="title-wrapper">\
          <h3>'+book.name+'</h3>\
          <span class="gj">Por: '+book.autor+'</span><br>\
          <span class="gj">Publicado: '+book.publisher+'</span><br>\
          <span class="gj">Idioma: '+book.language+'</span>\
        </div>\
        <p class="fi">'+book.description+'</p> \
      </div>\
      <div class="gallery-action">\
        <a href="#" onClick="getBorrow('+book.id+')" class="btn-large waves-effect waves-light" style="background-color: #000 !important;"><span style="color: black">PRESTAR</span></a>\
      </div>\
    </div>\
  </div>';
}