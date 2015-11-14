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
  <script src="../js/summernote.min.js" type="text/javascript"></script>
  <script src="../js/bootstrap-colorpicker.min.js" type="text/javascript"></script>
  <link href="../css/bootstrap-colorpicker.min.css" type="text/css" rel="stylesheet" />
  <link href="../css/font-awesome.min.css" type="text/css" rel="stylesheet" />
  <link href="../css/summernote.css" type="text/css" rel="stylesheet" />
  <link href="../css/summernote-bs3.css" type="text/css" rel="stylesheet">
</head>
<body>
  <div class="flex-container">
    <aside class="w20 mrs pam aside">
      <?php echo $navadmin; ?>
    </aside>
    <div id="main" role="main" class="flex-item-fluid pam">

      <h1>Edition des catégories</h1>
      <div class="list-group">

        <?php foreach ($categories as $key => $categorie): ?>

          <li class="list-group-item">
            <h2>
              Editer la catégorie <?php echo $categorie['id_categories']; ?>
              <button type="button" class="btn btn-default boutton-categorie" data-toggle="collapse" data-target="#categorie<?php echo $categorie['id_categories']; ?>" aria-expanded="false" aria-controls="categorie<?php echo $categorie['id_categories']; ?>">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
              </button>
            </h2>
            <div class="collapse" id="categorie<?php echo $categorie['id_categories']; ?>">
            <form id="postForm" action="index.php?page=categorie" method="POST" enctype="multipart/form-data">
                <!-- ID -->
                <input type="text" name="action" value="edit" class="form-control" />
                <input type="text" name="id_categories" value="<?php echo $categorie['id_categories']; ?>" class="form-control" />
                <!-- Color picker -->
                <div class="input-group colorpicker">
                  <input type="text" name="color" value="<?php echo $categorie['color']; ?>" class="form-control" />
                  <span class="input-group-addon"><i></i></span>
                </div>
                <!-- Ordre -->
                <input type="number" name="ordre" value="<?php echo $categorie['ordre']; ?>" class="form-control" />
                <!-- summernote -->
                <textarea class="input-block-level summernote" name="code" rows="18">
                  <?php echo $categorie['code']; ?>
                </textarea>
                <button type="submit" name="type" value="categorie" class="btn btn-primary">Enregistrer</button>
                <button type="button" class="btn">Annuler</button>
              </form>
            </div>

          </li>

        <?php endforeach; ?>

      </div>
    </div>
  </div>
  <script type="text/javascript">
    $('.boutton-categorie').on('click', function(){
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
    $(function(){
      $('.colorpicker').colorpicker();
    });
  </script>
</body>
</html>