
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
          <input type="hidden" name="action" value="edit" class="form-control" />
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

          <button type="submit" class="btn btn-primary">Enregistrer</button>
          <button type="button" class="btn">Annuler</button>
        </form>
      </div>

    </li>

  <?php endforeach; ?>

</div>

<script type="text/javascript">
  //+ et - du deroulant des ctaégories
  $('.btn-categorie').on('click', function(){
    if($("span" , this ).hasClass('glyphicon-plus')){
      $("span" , this ).toggleClass('glyphicon-plus glyphicon-minus');
    }else{
      $("span" , this ).toggleClass('glyphicon-minus glyphicon-plus');
    }
  });
  $(document).ready(function() {
    $('.summernote').summernote({
      height: "500px"
    });
  });
  //color picker
  $(function(){
    $('.colorpicker').colorpicker();
  });
</script>
