
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">

    <?php foreach ($carousel as $key => $image): ?>

      <?php if ($key == 0): ?>
        <li data-target="#carousel-example-generic" data-slide-to="<?php echo $key; ?>" class="active"></li>
      <?php else: ?>
        <li data-target="#carousel-example-generic" data-slide-to="<?php echo $key; ?>"></li>
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
          <img src="../images/carousel/<?php echo $image['id_carousel']; ?>.jpeg" alt="<?php echo $image['alt']; ?>">
          <div class="carousel-caption">
            <h3><?php echo $image['titre']; ?></h3>
            <p><?php echo $image['description']; ?></p>
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
  <form action="index.php?page=carousel" method="POST" enctype="multipart/form-data">
    <table id="Sortable" class="table table-hover table-striped table-bordered">
      <thead>
        <tr>
          <th>Ordre</th>
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
              <input name="action_<?php echo $key; ?>" type="hidden" value="edit"/>
              <input name="id_carousel_<?php echo $key; ?>" type="hidden" value="<?php echo $image['id_carousel']; ?>"/>
              <input name="ordre_<?php echo $key; ?>" type="text" value="<?php echo $image['ordre']; ?>" class="weight " maxlength="10"/></td>
              <td>
                <a class="thumbnail">
                  <img src="../images/carousel/<?php echo $image['id_carousel']; ?>.jpeg" alt="<?php echo $image['alt']; ?>">
                </a>
              </td>
              <td>
                <input type="text" name="titre_<?php echo $key; ?>" value="<?php echo $image['titre']; ?>" class="form-control"/>
              </td>
              <td>
                <input type="text" name="description_<?php echo $key; ?>" value="<?php echo $image['description']; ?>" class="form-control"/>
              </td>
              <td>
                <input type="text" name="alt_<?php echo $key; ?>" value="<?php echo $image['alt']; ?>" class="form-control"/>
              </td>
            </tr>

          <?php endforeach; ?>

        </tbody>
      </table>
      <button type="submit" name="nb_carousel" value="<?php echo $key; ?>" class="btn btn-primary">Enregistrer</button>
      <button type="button" class="btn">Annuler</button>
    </form>
  </div>
  <script>
    $('#Sortable tbody').sortable({
      handle: ".handle",
      cancel: '',
      stop: function(event, ui) {
        $('#Sortable tbody>tr').each(function(index){
          $(this).find('.weight').val(index+1);
        });
      }
    });
  </script>
