<div class="alert alert-success" role="alert">
  <strong>Well done!</strong> You successfully read this important alert message.
</div>
<div class="alert alert-info" role="alert">
  <strong>Heads up!</strong> This alert needs your attention, but it's not super important.
</div>
<div class="alert alert-warning" role="alert">
  <strong>Warning!</strong> Better check yourself, you're not looking too good.
</div>
<div class="alert alert-danger" role="alert">
  <strong>Oh snap!</strong> Change a few things up and try submitting again.
</div>

<button type="button" class="btn btn-default add" aria-label="Left Align">Ajouter un lien</button>
<br/><br/>
<form action="index.php?page=nav" method="POST">
  <table id="Sortable" class="table table-hover table-striped table-bordered">
    <thead>
      <tr>
        <th>Actions</th>
        <th>Lien</th>
        <th>Titre</th>
      </tr>
    </thead>
    <tbody>

      <?php foreach ($nav as $key => $lien): ?>

        <tr>
          <td>
            <button type="button" class="btn btn-default handle" aria-label="Left Align">
              <span class="glyphicon glyphicon-move" aria-hidden="true"></span>
            </button>
            <button type="button" class="btn btn-default remove" aria-label="Left Align">
              <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
            </button>
            <input name="action" type="hidden" value="edit"/>
            <input name="id_nav_<?php echo $key; ?>" type="hidden" value="<?php echo $lien['id_nav']; ?>"/>
            <input name="ordre_<?php echo $key; ?>" type="text" value="<?php echo $lien['ordre']; ?>" class="ordre"/>
          </td>
          <td>
            <input type="text" name="lien_<?php echo $key; ?>" value="<?php echo $lien['lien']; ?>" class="form-control"/>
          </td>
          <td>
            <input type="text" name="titre_<?php echo $key; ?>" value="<?php echo $lien['titre']; ?>" class="form-control"/>
          </td>
        </tr>

      <?php endforeach; ?>

    </tbody>
  </table>
  <button type="submit" name="nb_lien" value="<?php echo $key; ?>" class="btn btn-primary">Enregistrer</button>
  <button type="button" class="btn">Annuler</button>
</form>
<script>

  var key = <?php echo $key+1 ?>;

  //pour le bouton supprimer
  $(document).on('click', '.remove', function(e) {
    if($(this).closest('tr').hasClass('danger')){
      $(this).closest('tr').removeClass('danger');
      $(this).siblings('input[name=action]').val('edit');
    }else{
      $(this).closest('tr').addClass('danger');
      $(this).siblings('input[name=action]').val('remove');
    }
  });

  //pour rajouter une ligne dans le tableau
  $(document).on('click', '.add', function(e) {
    $('#Sortable').append( 
      [
      '<tr>',
      '<td>',
      '<button type="button" class="btn btn-default handle" aria-label="Left Align" style="margin-right:5px;">',
      '<span class="glyphicon glyphicon-move" aria-hidden="true"></span>',
      '</button>',
      '<button type="button" class="btn btn-default remove" aria-label="Left Align" style="margin-right:5px;">',
      '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>',
      '</button>',
      '<input name="action" type="hidden" value="add"/>',
      '<input name="ordre_'+key+'" type="text" value="" class="ordre"/>',
      '</td>',
      '<td>',
      '<input type="text" name="lien_'+key+'" value="" class="form-control"/>',
      '</td>',
      '<td>',
      '<input type="text" name="titre_'+key+'" value="" class="form-control"/>',
      '</td>',
      '</tr>',
      ].join('')
    ); 
    
    //on indique le nb de input
    $("button[name='nb_lien']").val(key++);
    //on reaffiche l'ordre
    $('#Sortable tbody>tr').each(function(index){
        $(this).find('.ordre').val(index+1);
    });
  });

  //pour trier le tableau par ligne
  $('#Sortable tbody').sortable({
    handle: ".handle",
    cancel: '',
    stop: function(event, ui) {
      $('#Sortable tbody>tr').each(function(index){
        $(this).find('.ordre').val(index+1);
      });
    }
  });
</script>
