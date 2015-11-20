<?php if(isset($SUCCESS) && $SUCCESS): ?>
  <div class="alert alert-success" role="alert">
    <strong>Mise à jour :</strong> La catégorie a bien été mise à jour.
  </div>
<?php elseif(isset($SUCCESS) && !$SUCCESS): ?>
  <div class="alert alert-danger" role="alert">
    <strong>Erreur :</strong> Il y a eu un problème lors de la mise à jour de la catégorie.
  </div>
<?php endif ?>

<button type="button" class="btn btn-default add" aria-label="Left Align">Ajouter une catégorie</button>
<br/><br/>
<div class="list-group">

  <?php foreach ($categories as $key => $categorie): ?>

    <li class="list-group-item">
      <h3>
        <?php if($categorie['type'] == 1): ?>
          Editer la catégorie <?php echo $categorie['id_categorie'] ?>
        <?php elseif($categorie['type'] == 2): ?>
          Editer le formulaire de contact
        <?php endif ?>
        <button type="button" class="btn btn-default btn-categorie" data-toggle="collapse" data-target="#id_categorie_<?php echo $key ?>" aria-controls="id_categorie_<?php echo $key ?>">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </button>
      </h3>
      <div class="collapse" id="id_categorie_<?php echo $key ?>">
        <br>
        <?php if($categorie['type'] == 2): ?>
          <label class="rcheckbox">
            Activer le formulaire de contact :
            <input type="checkbox" name="active"> Oui</label>
          <?php endif ?>
          <form action="categorie" method="POST" enctype="multipart/form-data">
            <!-- infos -->
            <input type="hidden" name="id_categorie" value="<?php echo $categorie['id_categorie']; ?>" class="form-control" />
            <input type="number" min="1" max="2" name="type" value="<?php echo $categorie['type']; ?>" class="form-control" />
            <!-- Color picker -->
            <div class="input-group colorpicker">
              <input type="text" name="color" value="<?php echo $categorie['color']; ?>" class="form-control" data-color-format="hex"/>
              <span class="input-group-addon"><i></i></span>
            </div>
            <!-- Ordre -->

            <select name="ordre" class="form-control">
              <?php for ($i=1; $i < count($categories)+1; $i++): ?>
                <option value="<?php echo $i ?>"

                  <?php if($i == $categorie['ordre']) : ?>
                    selected
                  <?php endif; ?>

                  >Position <?php echo $i ?></option>

                <?php endfor; ?>
              </select>

              <!-- summernote -->
              <textarea class="input-block-level summernote" name="code" rows="180"></textarea>

              <button name="action" value="edit" type="submit" class="btn btn-primary">Enregistrer</button>
              <?php if($categorie['type'] == 1): ?>
                <button name="action" value="delete" type="submit" class="btn btn-danger">Supprimer</button>
              <?php endif ?>
              <button type="button" class="btn">Annuler</button>
            </form>
          </div>

        </li>

      <?php endforeach; ?>

    </div>

    <script type="text/javascript">

  //+ et - du deroulant des ctaégories
  $(document).on('click', '.btn-categorie', function(e) {
    if($("span" , this ).hasClass('glyphicon-plus')){
      $("span" , this ).toggleClass('glyphicon-plus glyphicon-minus');
    }else{
      $("span" , this ).toggleClass('glyphicon-minus glyphicon-plus');
    }
  });

  //pour le summeernote
  $(document).ready(function() {
    $('.summernote').summernote({
      height: 500,
      /*onImageUpload: function(files, editor, welEditable) {
        sendFile(files[0], editor, welEditable);
      }*/
    });
  });

  //color picker
  $(document).ready(function() {
    $('.colorpicker').colorpicker({
    });
  });

  var key = <?php echo $key+1 ?>;

  //ajouter une categorie
  $(document).on('click', '.add', function(e) {
    $('.list-group').prepend(
      [
      '<li class="list-group-item">',
      '<h3>',
      'Editer la nouvelle catégorie',
      '<button type="button" class="btn btn-default btn-categorie" data-toggle="collapse" data-target="#id_categorie_'+key+'" aria-controls="id_categorie_'+key+'" style="margin-left:5px;">',
      '<span class="glyphicon glyphicon-minus" aria-hidden="true"></span>',
      '</button>',
      '</h3>',
      '<div class="collapse in" aria-expanded="true" id="id_categorie_'+key+'">',
      '<form action="index.php?page=categorie" method="POST" enctype="multipart/form-data">',
      '<input type="number" min="1" max="2" name="type" value="1" class="form-control" />',
      '<!-- Color picker -->',
      '<div class="input-group colorpicker">',
      '<input type="text" name="color" value="" class="form-control" />',
      '<span class="input-group-addon"><i></i></span>',
      '</div>',
      '<!-- Ordre -->',
      '<input type="number" name="ordre" value="" class="form-control" />',
      '<!-- summernote -->',
      '<textarea class="input-block-level summernote" name="code" rows="18"></textarea>',
      '<button style="margin-right:5px;" name="action" value="add" type="submit" class="btn btn-primary">Ajouter</button>',
      '<button type="button" class="btn">Annuler</button>',
      '</form>',
      '</div>',
      '</li>',
      ].join('')
      );
key++;

    //pour le summeernote
    $(document).ready(function() {
      $('.summernote').summernote({
        height: "500px",
      /*onImageUpload: function(files, editor, welEditable) {
        sendFile(files[0], editor, welEditable);
      }*/
    });
    });

  //color picker
  $(document).ready(function() {
    $('.colorpicker').colorpicker();
  });

});
/*
function sendFile(file, editor, welEditable) {
  data = new FormData();
  data.append("file", file);
  $.ajax({
    data: data,
    type: "POST",
    url: "controleurs/categorie.php",
    cache: false,
    contentType: false,
    processData: false,
    success: function(url) {
      editor.insertImage(welEditable, url);
    }
  });
}
*/
</script>
