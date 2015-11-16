<?php if(isset($SUCCESS) && $SUCCESS): ?>
<div class="alert alert-success" role="alert">
  <strong>Mise à jour :</strong> Le carousel a bien été mise à jour.
</div>
<?php elseif(isset($SUCCESS) && !$SUCCESS): ?>
<div class="alert alert-danger" role="alert">
  <strong>Erreur :</strong> Il y a eu un problème lors de la mise à jour du carousel.
</div>
<?php endif ?>

<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">

    <?php foreach ($carousel as $key => $image): ?>

      <?php if ($key == 0): ?>
        <li data-target="#carousel-example-generic" data-slide-to="<?php echo $key ?>" class="active"></li>
      <?php else: ?>
        <li data-target="#carousel-example-generic" data-slide-to="<?php echo $key ?>"></li>
      <?php endif; ?>

    <?php endforeach; ?>

  </ol>
  <div class="carousel-inner" role="listbox" >

    <?php foreach ($carousel as $key => $image): ?>

      <?php if ($key == 0): ?>
        <div class="item active">
        <?php else: ?>
          <div class="item">
          <?php endif; ?>
          <img src="../images/carousel/<?php echo $image['id_carousel'] ?>.<?php echo $image['extension'] ?>" alt="<?php echo $image['alt'] ?>">
          <div class="carousel-caption">
            <h3><?php echo $image['titre'] ?></h3>
            <p><?php echo $image['description'] ?></p>
          </div>
        </div>

      <?php endforeach; ?>

    </div>

    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <br/>
  <button type="button" class="btn btn-default add" aria-label="Left Align">Ajouter une image dans le carousel</button>
  <br/><br/>
  <form action="index.php?page=carousel" method="POST" enctype="multipart/form-data">
    <table id="Sortable" class="table table-hover table-striped table-bordered">
      <thead>
        <tr>
          <th>Actions</th>
          <th>Image</th>
          <th>Titre</th>
          <th>Description</th>
          <th>Alt</th>
        </tr>
      </thead>
      <tbody>

        <?php foreach ($carousel as $key => $image): ?>

          <tr>
            <td>
              <button type="button" class="btn btn-default handle" aria-label="Left Align">
                <span class="glyphicon glyphicon-move" aria-hidden="true"></span>
              </button>
              <button type="button" class="btn btn-default remove" aria-label="Left Align">
                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
              </button>
              <input name="action_<?php echo $key ?>" type="hidden" value="edit"/>
              <input name="id_carousel_<?php echo $key ?>" type="hidden" value="<?php echo $image['id_carousel'] ?>"/>
              <input name="ordre_<?php echo $key ?>" type="text" value="<?php echo $image['ordre'] ?>" class="ordre form-control" maxlength="10" readonly/>
              </td>
              <td>
                <input name="image_<?php echo $key ?>" id="file_<?php echo $key ?>" value="" type="file" data-min-file-count="0">
              </td>
              <td>
                <input type="text" name="titre_<?php echo $key ?>" value="<?php echo $image['titre'] ?>" class="form-control"/>
              </td>
              <td>
                <input type="text" name="description_<?php echo $key ?>" value="<?php echo $image['description'] ?>" class="form-control"/>
              </td>
              <td>
                <input type="text" name="alt_<?php echo $key ?>" value="<?php echo $image['alt'] ?>" class="form-control"/>
              </td>
            </tr>

          <?php endforeach; ?>

        </tbody>
      </table>
      <button type="submit" name="nb_carousel" value="<?php echo $key ?>" class="btn btn-primary">Enregistrer</button>
      <button type="button" class="btn">Annuler</button>
    </div>
    <script>
      var key = <?php echo $key+1 ?>;

      //file upload on charge chaque image pour chaque input
        <?php foreach ($carousel as $key => $image): ?>

      $("#file_<?php echo $key ?>").fileinput({
        allowedFileExtensions : ['jpeg', 'jpg', 'png','gif'],
        language: 'fr',
        maxFileSize: 10000,
        required: false,
        showUpload: false,
        initialPreview: [
          "<img src='../images/carousel/<?php echo $image['id_carousel'] ?>.<?php echo $image['extension'] ?>' class='file-preview-image' alt='<?php echo $image['alt'] ?>'",
        ],
        initialCaption: [
          '../images/carousel/<?php echo $image['id_carousel'] ?>.jpeg',
        ],
      });

        <?php endforeach; ?>

      //le bouton supprimer
      $(document).on('click', '.remove', function(e) {
        if($(this).closest('tr').hasClass('danger')){
          $(this).closest('tr').removeClass('danger');
          $(this).siblings('input[name=action]').val('edit');
        }else{
          $(this).closest('tr').addClass('danger');
          $(this).siblings('input[name^=action]').val('delete');
        }
      });

      //ajouter une ligne dans le tableau
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
          '<input name="action" type="hidden" value="add"/>',
          '<input name="ordre_'+key+'" type="text" value="" class="ordre form-control" readonly/>',
          '</td>',
          '<td>',
          '<label class="control-label">Sélectionnez une image</label>',
          '<input name="image_'+key+'" class="file" type="file" data-min-file-count="1">',
          '</td>',
          '<td>',
          '<input type="text" name="titre_'+key+'" value="" class="form-control"/>',
          '</td>',
          '<td>',
          '<input type="text" name="description_'+key+'" value="" class="form-control"/>',
          '</td>',
          '<td>',
          '<input type="text" name="alt_'+key+'" value="" class="form-control"/>',
          '</td>',
          '</tr>',
          ].join('')

          );
        //on indique le nb de input
        $("button[name='nb_carousel']").val(key++);

        //on reactualise l'ordre des lignes du tableau
        $('#Sortable tbody>tr').each(function(index){
          $(this).find('.ordre').val(index+1);
        });

        //on relance le file input
        $(".file").fileinput({
          'allowedFileExtensions' : ['jpg', 'png','gif'],
          language: 'fr',
          maxFileSize: 1000,
          //uploadUrl: '#',
        });
      });

    //permet d'ordoner le tableau
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
