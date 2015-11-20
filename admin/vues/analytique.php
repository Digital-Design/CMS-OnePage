<?php if(isset($SUCCESS) && $SUCCESS): ?>
<div class="alert alert-success" role="alert">
  Modification effectuée avec succès.
</div>
<?php elseif(isset($SUCCESS) && !$SUCCESS): ?>
<div class="alert alert-danger" role="alert">
  Il y a eu une problème lors des modifications.
</div>
<?php endif ?>

<p>Vous pouvez trier par colonne les informations de connexion.</p>
<br/>

<form action="analytique" method="POST">

  <table class="table table-bordered table-striped table-hover sortable-theme-bootstrap" data-sortable>
    <thead>
      <tr>
        <th data-sortable="false">Action</th>
        <th>IP</th>
        <th>Page</th>
        <th>Navigateur</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>

      <?php foreach ($analytiques as $key => $analytique): ?>
        <tr>
          <td>
            <button type="button" class="btn btn-default remove" aria-label="Left Align">
              <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
            </button>
            <input name="id_analytique_<?php echo $key ?>" type="hidden" value="<?php echo $analytique['id_analytique'] ?>"/>
            <input name="action_<?php echo $key ?>" type="hidden" value=""/>
          </td>
          <td><?php echo $analytique['ip'] ?></td>
          <td><?php echo $analytique['page'] ?></td>
          <td><?php echo $analytique['navigateur'] ?></td>
          <td><?php echo $analytique['date_creation'] ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <button type="submit" name="nb_analytique" value="<?php echo $key ?>" class="btn btn-primary">Enregistrer</button>
  <button type="button" class="btn">Annuler</button>
</form>

<script type="text/javascript">
  //pour le bouton supprimer
  $(document).on('click', '.remove', function(e) {
    if($(this).closest('tr').hasClass('danger')){
      $(this).closest('tr').removeClass('danger');
      $(this).siblings('input[name^=action]').val('');
    }else{
      $(this).closest('tr').addClass('danger');
      $(this).siblings('input[name^=action]').val('delete');
    }
  });
</script>