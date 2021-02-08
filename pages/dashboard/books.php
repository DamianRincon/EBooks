<div style="margin: 15px">
    <table id="books_table" class="striped" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Autor</th>
                <th>Idioma</th>
                <th>Categoría</th>
                <th>Publicado en</th>
            </tr>
        </thead>
    </table>


  <div class="fixed-action-btn">
    <a href="#modal_books" class="btn-floating btn-large modal-trigger" style="background-color: <?php echo primary_color ?>;">
      <i class="large material-icons">add</i>
    </a>
  </div>

  <div id="modal_books" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Modal Header</h4>
      <p>A bunch of text</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
  </div>
      
</div>