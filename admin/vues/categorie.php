
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


<button type="button" class="btn btn-default add" aria-label="Left Align">Ajouter une catégorie</button>
<br/><br/>
<div class="list-group">

  <?php foreach ($categories as $key => $categorie): ?>

    <li class="list-group-item">
      <h3>
        Editer la catégorie <?php echo $categorie['id_categorie'] ?>
        <button type="button" class="btn btn-default btn-categorie" data-toggle="collapse" data-target="#id_categorie_<?php echo $key ?>" aria-controls="id_categorie_<?php echo $key ?>">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </button>
      </h3>
      <div class="collapse" id="id_categorie_<?php echo $key ?>">
        <form action="index.php?page=categorie" method="POST" enctype="multipart/form-data">
          <!-- infos -->
          <input type="hidden" name="id_categorie" value="<?php echo $categorie['id_categorie']; ?>" class="form-control" />
          <!-- Color picker -->
          <div class="input-group colorpicker">
            <input type="text" name="color" value="<?php echo $categorie['color']; ?>" class="form-control" />
            <span class="input-group-addon"><i></i></span>
          </div>
          <!-- Ordre -->
          <input type="number" name="ordre" value="<?php echo $categorie['ordre']; ?>" class="form-control" />
          <!-- summernote -->
          <textarea class="input-block-level summernote" name="code" rows="18"><?php echo $categorie['code']; ?></textarea>

          <button name="action" value="edit" type="submit" class="btn btn-primary">Enregistrer</button>
          <button name="action" value="delete" type="submit" class="btn btn-danger">Supprimer</button>
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
      height: "500px"
    });
  });

  //color picker
  $(function(){
    $('.colorpicker').colorpicker();
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
      '<!-- Color picker -->',
      '<div class="input-group colorpicker">',
      '<input type="text" name="color" value="" class="form-control" />',
      '<span class="input-group-addon"><i></i></span>',
      '</div>',
      '<!-- Ordre -->',
      '<input type="number" name="ordre" value="" class="form-control" />',
      '<!-- summernote -->',
      '<textarea class="input-block-level summernote" name="code" rows="18"></textarea>',
      '<button name="action" value="add" type="submit" class="btn btn-primary">Ajouter</button>',
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
      height: "500px"
    });
  });

  //color picker
  $(function(){
    $('.colorpicker').colorpicker();
  });

  });
</script>
