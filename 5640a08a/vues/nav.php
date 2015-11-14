
<form action="index.php?page=nav" method="POST">
  <table id="Sortable" class="table table-hover table-striped table-bordered">
    <thead>
      <tr>
        <th>Ordre</th>
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
  <button type="submit" class="btn btn-primary">Enregistrer</button>
  <button type="button" class="btn">Annuler</button>
</form>
<script>
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
