<?php if(isset($SUCCESS) && $SUCCESS): ?>
<div class="alert alert-success" role="alert">
  <strong>Mise à jour :</strong> Votre profil a été mise à jour avec succès.
</div>
<?php elseif(isset($SUCCESS) && !$SUCCESS): ?>
<div class="alert alert-danger" role="alert">
  <strong>Erreur :</strong> Il y a eu un problème lors de la mise à jour de votre profil.
</div>
<?php endif; ?>

<form class="form-horizontal" action="profil" method="POST" enctype="multipart/form-data">

  <div class="form-group">
    <label class="control-label col-xs-2">Mail</label>
    <div class="col-xs-9">
      <input type="email" name="mail" class="form-control" value="">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-xs-2">Mot de passe</label>
    <div class="col-xs-9">
      <input name="pwd" type="password" class="form-control" value="">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-xs-2">IP</label>
    <div class="col-xs-9">
      <input name="ip" type="text" class="form-control" value="">
    </div>
  </div>

  <div class="col-xs-offset-2 col-xs-9">
    <br/><br/>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
    <button class="btn">Annuler</button>
  </div>

</form>