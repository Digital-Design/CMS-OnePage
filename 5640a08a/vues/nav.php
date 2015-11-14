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
      <h1>Edition de la barre de navigation</h1>

      <form action="index.php?page=nav" method="POST" enctype="multipart/form-data">
        <table id="Sortable" class="table table-hover table-striped">
          <thead>
            <tr>
              <th>Ordre</th>
              <th>Lien</th>
              <th>Titre</th>
            </tr>
          </thead>
          <tbody>

            <?php foreach ($nav as $key => $lien): ?>

              <tr>
                <td class="handle">
                  <button type="button" class="btn btn-default" aria-label="Left Align">
                    <span class="glyphicon glyphicon-move" aria-hidden="true"></span>
                  </button>
                  <input name="action" type="text" value="edit"/>
                  <input name="id_nav_<?php echo $key; ?>" type="text" value="<?php echo $lien['id_nav']; ?>"/>
                  <input name="ordre_<?php echo $key; ?>" type="text" value="<?php echo $lien['ordre']; ?>" class="weight"/>
                </td>
                <td>
                  <input name="lien_<?php echo $key; ?>" type="text" value="<?php echo $lien['lien']; ?>"/>
                </td>
                <td>
                  <input name="titre_<?php echo $key; ?>" type="text" value="<?php echo $lien['titre']; ?>"/>
                </td>
              </tr>

            <?php endforeach; ?>

          </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <button type="button" class="btn">Annuler</button>
      </form>
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