<?php if(isset($SUCCESS) && $SUCCESS): ?>
<div class="alert alert-success" role="alert">
  <strong>Mise à jour :</strong> Vos paramètres ont été mise à jour avec succès.
</div>
<?php elseif(isset($SUCCESS) && !$SUCCESS): ?>
<div class="alert alert-danger" role="alert">
  <strong>Erreur :</strong> Il y a eu un problème lors de la mise à jour.
</div>
<?php endif; ?>

<form class="form-horizontal" action="parametre" method="POST" enctype="multipart/form-data">

  <div class="form-group">
    <label class="control-label col-xs-2">Titre du site</label>
    <div class="col-xs-9">
      <input type="text" name="parametres[0][valeur]" class="form-control" value="<?php echo $parametres[0]['valeur'] ?>">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-xs-2">Favicon</label>
    <div class="col-xs-9">
      <input name="favicon" value="" id="favicon2" type="file" data-min-file-count="0">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-xs-2">Temps des sliders en seconde</label>
    <div class="col-xs-9">
      <input name="parametres[1][valeur]" type="number" class="form-control" value="<?php echo $parametres[1]['valeur'] ?>">
    </div>
  </div>

  <div class="col-xs-offset-2 col-xs-9">
    <br/><br/>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
    <button class="btn">Annuler</button>
  </div>

</form>

<script type="text/javascript">
  $("#favicon2").fileinput({
    allowedFileExtensions : ['ico'],
    language: 'fr',
    maxFileSize: 100,
    required: false,
    showUpload: false,
    height:'20px',
    initialPreview: [
    "<img src='../favicon.ico' ",
    ],
    initialCaption: [
    '../favicon.ico',
    ],
  });


</script>