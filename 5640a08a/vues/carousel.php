<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Administration</title>
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/admin.css" rel="stylesheet">
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src='../js/jquery-sortable.js'></script>
</head>
<body>
  <div class="flex-container">
    <aside class="w20 mrs pam aside">
      <?php echo $navadmin; ?>
    </aside>
    <div id="main" role="main" class="flex-item-fluid pam">
      <h1>Edition du crousel</h1>
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
          <input name="action" type="text" value="edit"/>
          <table id="Sortable" class="table table-hover table-striped">
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
                  <td class="handle">
                    <button type="button" class="btn btn-default" aria-label="Left Align">
                      <span class="glyphicon glyphicon-move" aria-hidden="true"></span>
                    </button>
                    <input name="id_carousel_<?php echo $key; ?>" type="text" value="<?php echo $image['id_carousel']; ?>"/>
                    <input name="ordre_<?php echo $key; ?>" type="text" value="<?php echo $image['ordre']; ?>" class="weight" maxlength="5"/></td>
                    <td>
                      <a class="thumbnail">
                        <img src="../images/carousel/<?php echo $image['id_carousel']; ?>.jpeg" alt="<?php echo $image['alt']; ?>">
                      </a>
                    </td>
                    <td>
                      <input name="titre_<?php echo $key; ?>" type="text" value="<?php echo $image['titre']; ?>"/>
                    </td>
                    <td>
                      <input name="description_<?php echo $key; ?>" type="text" value="<?php echo $image['description']; ?>"/>
                    </td>
                    <td>
                      <input name="alt_<?php echo $key; ?>" type="text" value="<?php echo $image['alt']; ?>"/>
                    </td>
                  </tr>

                <?php endforeach; ?>

              </tbody>
            </table>
            <button type="submit" name="type" value="carousel" class="btn btn-primary">Enregistrer</button>
            <button type="button" class="btn">Annuler</button>
          </form>
        </div>
      </div>
      <script>
        $('#Sortable tbody').sortable({
          handle: ".handle",
          stop: function(event, ui) {
            $('#Sortable tbody>tr').each(function(index){
              $(this).find('.weight').val(index+1);
            });
          }
        });
      </script>

    </body>
    </html>