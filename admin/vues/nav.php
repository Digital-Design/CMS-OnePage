<?php if(isset($SUCCESS) && $SUCCESS): ?>
<div class="alert alert-success" role="alert">
  <strong>Mise à jour :</strong> Les liens de la barre de navigation ont bien été mise à jour.
</div>
<?php elseif(isset($SUCCESS) && !$SUCCESS): ?>
<div class="alert alert-danger" role="alert">
  <strong>Erreur :</strong> Il y a eu un problème lors de la mise à jour des liens de la barre de navigation.
</div>
<?php endif ?>

<button type="button" class="btn btn-default add" aria-label="Left Align">Ajouter un lien</button>
<br/><br/>
<form action="index.php?page=nav" method="POST">
  <table id="Sortable" class="table table-hover table-striped table-bordered">
    <thead>
      <tr>
        <th style="width: 300px;">Actions</th>
        <th>Lien</th>
        <th>Titre</th>
      </tr>
    </thead>
    <tbody>

      <?php foreach ($nav as $key => $lien): ?>

        <tr>
          <td style="display:flex;width: 300px;">
          <td>
            <button type="button" class="btn btn-default handle" aria-label="Left Align">
              <span class="glyphicon glyphicon-move" aria-hidden="true"></span>
            </button>
            <button type="button" class="btn btn-default remove" aria-label="Left Align">
              <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
            </button>
            <input name="action_<?php echo $key ?>" type="hidden" value="edit"/>
            <input name="id_nav_<?php echo $key ?>" type="hidden" value="<?php echo $lien['id_nav'] ?>"/>
            <input class="ordre form-control " name="ordre_<?php echo $key ?>" type="text" value="<?php echo $lien['ordre'] ?>" readonly/>
            </td>
          </td>
          <td>
            <input type="text" name="lien_<?php echo $key ?>" value="<?php echo $lien['lien'] ?>" class="form-control"/>
          </td>
          <td>
            <input type="text" name="titre_<?php echo $key ?>" value="<?php echo $lien['titre'] ?>" class="form-control"/>
          </td>
        </tr>

      <?php endforeach; ?>

    </tbody>
  </table>
  <button type="submit" name="nb_lien" value="<?php echo $key ?>" class="btn btn-primary">Enregistrer</button>
  <button type="button" class="btn">Annuler</button>
</form>
<script>

  var key = <?php echo $key+1 ?>;

  //pour le bouton supprimer
  $(document).on('click', '.remove', function(e) {
    if($(this).closest('tr').hasClass('danger')){
      $(this).closest('tr').removeClass('danger');
      $(this).siblings('input[name^=action]').val('edit');
    }else{
      $(this).closest('tr').addClass('danger');
      $(this).siblings('input[name^=action]').val('delete');
    }
  });

  //pour rajouter une ligne dans le tableau
  $(document).on('click', '.add', function(e) {
    $('#Sortable').append(
      [
      '<tr>',
      '<td>',
      '<button type="button" class="btn btn-default handle" aria-label="Left Align">',
      '<span class="glyphicon glyphicon-move" aria-hidden="true"></span>',
      '</button>',
      '<button type="button" class="btn btn-default remove" aria-label="Left Align">',
      '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>',
      '</button>',
      '<input name="action_'+key+'" type="hidden" value="add"/>',
      '<input name="ordre_'+key+'" type="text" value="" class="ordre form-control" readonly/>',
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
