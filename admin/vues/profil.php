<?php if(isset($SUCCESS) && $SUCCESS): ?>
<div class="alert alert-success" role="alert">
  <strong>Mise à jour :</strong> Votre profil a été mise à jour avec succès.
</div>
<?php elseif(isset($SUCCESS) && !$SUCCESS): ?>
<div class="alert alert-danger" role="alert">
  <strong>Erreur :</strong> Il y a eu un problème lors de la mise à jour de votre profil.
</div>
<?php endif; ?>

<form class="form-horizontal" onsubmit="return validateForm()" action="profil" method="POST" enctype="multipart/form-data">

  <div class="form-group">
    <label class="control-label col-xs-2">Mail</label>
    <div class="col-xs-9">
      <input type="email" name="mail" class="form-control" value="">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-xs-2">Mot de passe</label>
    <div class="col-xs-9">
      <input name="pwd1" id="pwd1" type="password" class="form-control" value="">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-xs-2">Confirmer le mot de passe</label>
    <div class="col-xs-9">
      <input name="pwd2" id="pwd2" type="password" class="form-control" value="">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-xs-2">IP</label>
    <div class="col-xs-9">
      <input name="ip" type="text" class="form-control" value="<?php echo $_SERVER['REMOTE_ADDR'] ?>">
    </div>
  </div>

  <div class="col-xs-offset-2 col-xs-9">
    <br/><br/>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
    <button class="btn">Annuler</button>
  </div>

</form>

<script>
//on check l'input password2 = password1 du form
$(document).ready(function() {
  $("#pwd2").keyup(function() {
    if($(this).val() === $("#pwd1").val()) $(this).parent().parent().removeClass("has-error");
    else $(this).parent().parent().addClass("has-error");
  });
});
</script>