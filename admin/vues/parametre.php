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

<form class="form-horizontal">

  <div class="form-group">
    <label class="control-label col-xs-2">Titre du site</label>
    <div class="col-xs-9">
      <input type="text" class="form-control" value="">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-xs-2">Favicon</label>
    <div class="col-xs-9">
      <input name="favicon" value="" id="favicon2" type="file" data-min-file-count="0">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-xs-2">Autres</label>
    <div class="col-xs-9">
      <input type="text" class="form-control" value="">
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